<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Report extends Model
{
    protected $table = 'reports';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function get_main_image($reportId){
        
        $mainImage = DB::table("report_images")->where(array("report_id"=>$reportId, "image_type"=>"main_image"))->first();
        $imageUrl = '';
        //echo "<pre>"; print_r($mainImage); exit;
        if(!empty($mainImage)){
            $imageUrl = $mainImage->url;
        }
        return $imageUrl;
    }

    public static function get_images_by_report_id($reportId, $vehicleTypes){
        $imagesArray = array();
        foreach($vehicleTypes as $key=>$val){
            $imagesArray[$val] = DB::table("report_images")->where("report_id", $reportId)->where("image_type", $key)->get();
            
        }
        return $imagesArray;
    }

    public static function reportsTypeAndImages($reportType){
        if($reportType=="trailer"){
            $imageHeading = "Trailer";
            $imagesType = array(
                "trailer_left_front"=>"Left Front Wheel",
                "trailer_right_front"=>"Right Front Wheel",
                "trailer_left_rear"=>"Left Rear Wheel",
                "trailer_right_rear"=>"Right Rear Wheel"
            );
        }elseif($reportType=="power_unit"){
            $imageHeading = "Power Unit";
            $imagesType = array(
                    "power_unit_left_stear"=>"Left Steer Wheel",
                "power_unit_right_stear"=>"Right Steer Wheel",
                "power_unit_left_front"=>"Left Front Wheel",
                "power_unit_right_front"=>"Right Front Wheel",
                "power_unit_left_rear"=>"Left Rear Wheel",
                "power_unit_right_rear"=>"Right Rear Wheel"
            );
        }

        $data = array(
            "title" => $reportType,
            "imageHeading" => $imageHeading,
            "imagesType" => $imagesType            
        );
        return $data;
        
    }


}
