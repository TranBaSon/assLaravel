<?php

namespace App\Http\Controllers;

use App\studentFeedback;
use Illuminate\Http\Request;


class feedbackController extends Controller
{
    public function surveyPost(Request $request){


        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:student_feedback',
            'telephone' => 'required',
            'feedback' => 'required'
            ]);
             
            $data = request()->except(['_token']);
            $check = studentFeedback::insert($data);
            $arr = array('msg' => 'Something goes to wrong. Please try again lator', 'status' => false);
            if($check){ 
            $arr = array('msg' => 'Successfully', 'status' => true);
            }
            
            return  Response()->json($arr);


    }

}
