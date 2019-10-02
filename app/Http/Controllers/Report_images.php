<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use App\Report_image;
use Auth;
use DB;

class Report_images extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function saveImage($data){
        $image                   = new Report_image; 
        $image->report_id        = $data['report_id'];
        $image->image_type       = $data['image_type'];
        $image->url              = $data['url'];
        $image->created_by       = Auth::user()->id;
        $image->save();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'file'=>'required',
           'report_id'=>'required',
           'image_type'=>'required'
        ]);


        $file                   = $request->file('file')->getRealPath();
        $cloud                  = Cloudder::upload($file, null);
        $c                      = Cloudder::getResult();
        $url                    = $c["url"];

        $image                  = new Report_image; 
        $image->report_id       = $request->report_id;
        $image->url             = $url;
        //$image->image_type      = $request->file->getClientOriginalExtension();
        $image->image_type      = $request->image_type;
        $image->created_by      = Auth::user()->id;
        $image->save();
        $id = DB::getPdo()->lastInsertId();
        $image = Report_image::find($id);
        $upload_image = $image->url;
        return response()->json(['image' => '<img src="'.$upload_image.'" class="img-fluid"  alt="">']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
