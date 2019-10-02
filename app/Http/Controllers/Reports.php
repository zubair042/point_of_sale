<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;
use App\Report;
use App\Location;
use Illuminate\Support\Facades\Mail;
use JD\Cloudder\Facades\Cloudder;
//use App\Mail\SendEmail;
use App\Comment;
use App\Report_image;
use Auth;
use DB;
//use Mail;

class Reports extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','permission']);
    }

    public function uniqify($array, $key) { 
        $temp_array = array(); 
        $i = 0; 
        $key_array = array(); 
        
        foreach($array as $val) { 
            if (!in_array($val->$key, $key_array)) { 
                $key_array[$i] = $val->$key;
                $temp_array[$i] = $val; 
            } 
            $i++; 
        } 
        return $temp_array; 
    } 
    
    public function index()
    {   
        return view('reports/index');
    }

    // public function RawQueryReports(){
    //     $locations = json_decode(Auth::user()->location_id);

    //     $WHERE = '(';
    //     if(count($locations)>0):
    //         foreach($locations as $key=>$val):
    //             if(count($locations)-1==$key){
    //                 $WHERE .= "users.location_id LIKE '%".$val."%'";
    //             }else{
    //                 $WHERE .= "users.location_id LIKE '%".$val."%' OR ";
    //             }
                
    //         endforeach;
    //     endif;
    //     $WHERE .= ') OR wheel_tire.users.id = '.Auth::user()->id.'';
    //     $QUERY = "JOIN wheel_tire.users ON wheel_tire.users.id = wheel_tire.reports.manager_id WHERE ".$WHERE."";
    //     //$result = DB::select(DB::raw($QUERY));
    //     return $QUERY;
    // }
	
	public function reports_view(){
		$table = 'reports_view';
		$primaryKey = 'id';
		$columns = array(
			array(
				'db'        => 'id',
				'dt'        => 0,
				'formatter' => function( $d, $row ) {
					return '<a href="'.url('report/view/'.$d).'" class="btn btn-success btn-sm legitRipple m-2">View</a>';
				}
			),
			array(
				'db'        => 'created_at',
				'dt'        => 1,
				'formatter' => function( $d, $row ) {
					return date( 'm/d/Y H:i A', strtotime($d));
				}
			),
			array( 'db' => 'report_unit_num',  'dt' => 2 ),
			array( 'db' => 'location_name',   'dt' => 3 ),
			array( 'db' => 'name',     'dt' => 4 ),
			array( 'db' => 'weight',     'dt' => 5 ),
            array( 'db' => 'signature',     'dt' => 6 ),
            //array( 'db' => 'signature_on',     'dt' => 7 ),

            array(
                'db'        => 'signature_on',
                'dt'        => 7,
                'formatter' => function($d, $row){
                    if ($d != "") {
                        return date('m/d/Y H:i A', strtotime($d));
                    }else{
                        return "";
                    }
                }
            ),
			array( 'db' => 'last_user_comments',     'dt' => 8 )
		);
		 
		// SQL server connection information
		$sql_details = array(
			'user' => env('DB_USERNAME'),
			'pass' => env('DB_PASSWORD'),
			'db'   => env('DB_DATABASE'),
			'host' => env('DB_HOST')
		);
		
		$where = '';
        if (Auth::user()->user_role == 3) {
            
            $locations = json_decode(Auth::user()->location_id);
            $res = implode(",", $locations);
			$where = "where manager_id = '".Auth::user()->id."' OR location_id IN (".$res.")";
        }else if (Auth::user()->user_role == 2) { //Other than Global Admin
			$where = 'where account_id = '.Auth::user()->account_id;
        }
		 
		require( base_path('ssp.class.php') );
		echo json_encode(
			\SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $where )
		);		
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account_id         = Auth::user()->account_id;
        if(Auth::user()->user_role != 1){
            $manager_detail = DB::table('users')
                                ->where('user_role',3)
                                ->where('account_id',$account_id)
                                ->get();
        }else{
            $manager_detail = DB::table('users')
                                ->where('user_role',3)
                                ->get();
        }
        $user               = DB::table('users')
                            ->where('user_role',Auth::user()->user_role)
                            ->where('id',Auth::user()->id)
                            ->first();
        $data['trailer'] = \App\Report::reportsTypeAndImages('trailer');
        $data['power_unit'] = \App\Report::reportsTypeAndImages('power_unit');

        return view('reports/add_report')->with('manager_detail',$manager_detail)->with('data', $data)->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $power_unit_left_stear  = $request->file('power_unit_left_stear');
        $power_unit_right_stear = $request->file('power_unit_right_stear');
        $power_unit_left_front  = $request->file('power_unit_left_front');
        $power_unit_right_front = $request->file('power_unit_right_front');
        $power_unit_left_rear   = $request->file('power_unit_left_rear');
        $power_unit_right_rear  = $request->file('power_unit_right_rear');
        $trailer_left_front     = $request->file('trailer_left_front');
        $trailer_right_front    = $request->file('trailer_right_front');
        $trailer_left_rear      = $request->file('trailer_left_rear');
        $trailer_right_rear     = $request->file('trailer_right_rear');
        
        $location = Location::where('user_id',Auth::user()->id)->first();
       // dd($location);
        $report = new Report;
        $report->created_by             = Auth::user()->id;
        $report->account_id             = Auth::user()->account_id;
        $report->location_id            = 0;

        if(Auth::user()->user_role == 4){
            $report->location_id            = $location->id;
        }
        $report->vehicle_type           = $request->input('vehicle_type');
        $report->steer_wheel_position   = $request->input('small_wheel');
        $report->front_wheel_position   = $request->input('front_wheel');
        $report->rear_wheel_position    = $request->input('rear_wheel');
        $report->weight                 = $request->input('weight');
        $report->report_unit_num        = $request->input('unit_number');
        $report->name                   = $request->input('name');
        $report->manager_id             = $request->input('manager_id');
        $report->comment                = $request->input('comments');
        // Get User
        $manager_info                   = User::find($report->manager_id);
        
        $manager_email                  = $manager_info->email;
        //dd($report);
        $report->save();
        $reportId                       = $report->id;
        $report_detail                  = $report;

        Mail::send('emails.add_report_email', ["report_detail"=>$report_detail,"manager_info"=>$manager_info], function($message) use ($manager_email,$report_detail){    
            $message->to($manager_email)->subject("New ".$report_detail->vehicle_type." report ".$report_detail->id." has been created");
            $message->from('info@mobilemaintenance.com', 'Wheel Tire');
        });
        var_dump( Mail:: failures());
       
        //upload photo to cloudnairy
        $picArr = array();

        //trailer array
        $picArr['trailer_left_front']         = $this->uploadCloudinary($trailer_left_front);
        $picArr['trailer_right_front']        = $this->uploadCloudinary($trailer_right_front);
        $picArr['trailer_left_rear']          = $this->uploadCloudinary($trailer_left_rear);
        $picArr['trailer_right_rear']         = $this->uploadCloudinary($trailer_right_rear);

        //power unit
        $picArr['power_unit_left_stear']      = $this->uploadCloudinary($power_unit_left_stear);
        $picArr['power_unit_right_stear']     = $this->uploadCloudinary($power_unit_right_stear);
        $picArr['power_unit_left_front']      = $this->uploadCloudinary($power_unit_left_front);
        $picArr['power_unit_right_front']     = $this->uploadCloudinary($power_unit_right_front);
        $picArr['power_unit_left_rear']       = $this->uploadCloudinary($power_unit_left_rear);
        $picArr['power_unit_right_rear']      = $this->uploadCloudinary($power_unit_right_rear);
       
        foreach($picArr as $type =>$typeArr){
            foreach($typeArr as $pic){
                if($pic != null){
                    $data['report_id']        = $reportId;
                    $data['image_type']       = $type;
                    $data['url']              = $pic;
                    $data['create_by']        = Auth::user()->id;
                    $image = new Report_images;
                    $image->saveImage($data);
                }
            }
        }
        $reporturl = '/report/view/'.$reportId;
        //return redirect($reporturl)->with('success','Reports Added Successfully');
        return redirect()->back()->with('success','Reports Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $report_detail  = DB::table('reports')
                            ->join('users','reports.signature_by','=','users.id','left outer')
                            ->join('locations','reports.location_id','=','locations.id','left outer')
                            ->where('reports.id',$id)
                            ->select('reports.*','users.first_name','users.last_name','locations.location_name')
                            ->first();

        $user           = DB::table('users')
                            ->where('user_role',Auth::user()->user_role)
                            ->where('id',Auth::user()->id)
                            ->first();

        $comments        = DB::table('comments')
                            ->join('users','users.id','=','comments.created_by')
                            ->where('report_id',$report_detail->id)
                            ->get();

        // $images         = DB::table('report_images')
        //                     ->where('report_id',$report_detail->id)
        //                     ->get();
        $reportType = \App\Report::reportsTypeAndImages($report_detail->vehicle_type);
        
        $reportType['images'] = \App\Report::get_images_by_report_id($report_detail->id, $reportType['imagesType']);
        $reportType['main_image'] = \App\Report::get_main_image($report_detail->id);

        //dd($reportType['imageHeading']);
        return view('reports/view_report',compact(['report_detail','user','comments','reportType']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {  
        // $report = Report::find($_POST['id']);
        // $report->delete();
    }

    public function signature()
    {
        $signed     = DB::table('reports')
                        ->where('id',$_POST['id'])
                        ->update(['signature' => 1 , 'signature_by'=> Auth::user()->id , 'signature_on' => date('Y-m-d H:i:s')]);

    }
    // config('cloudder.video_transformation') for video optimization
    public function uploadCloudinary($fileArr){
        $returnVal      = array();
        if ($fileArr!=null){
            foreach($fileArr as $file){
                $cloudFile  = $file->getRealPath();
                $size  = $file->getSize();
                //dd($size);
                $type       = $file->getClientOriginalExtension();
                if ($type == 'mp4'|| $type == 'flv'|| $type == 'avi'|| $type == 'mkv') {
                    Cloudder::uploadVideo($cloudFile, null,config('cloudder.video_transformation'));
                }else if($type == 'png' || $type == 'jpeg' || $type == 'jpg' || $type == 'gif' || $type == 'tiff'){
                    Cloudder::upload($file->getRealPath(), null, config('cloudder.image_transformation'));
                }
                $c          = Cloudder::getResult();
                $url        = $c["url"];
                array_push($returnVal, $url);
            }
        }
        return $returnVal;
    }
}
