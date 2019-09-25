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
            'telephone' => 'required|unique:student_feedback'
            ]);
             
            $data = request()->except(['_token']);
            $check = studentFeedback::insert($data);
            $arr = array('msg' => 'Something goes to wrong. Please try again lator', 'status' => false);
            if($check){ 
            $arr = array('msg' => 'Successfully submit form using ajax', 'status' => true);
            }
            
            return  Response()->json($arr);




        // $messages = [
        //     "required" => "Bắt buộc phải nhập thông tin",
        //     "string"    => "Phải nhập vào 1 chuỗi",
        //     "numeric"   => "Phải nhập vào 1 số",
        //     "min"   => "Giá trị tối 6 ký tự",
        //     "max"   => "Tối đa 255 ký tự",
        //     "unique" => "Đã tồn tại giá trị này"
        // ];
        // $rules = [
        //     "name" => "required|string|max:255",
        //     "email"   => "required|email",
        //     "telephone"=> "required|numeric|min:10",
        //     "feedback"=>"required"
        // ];
        // $this->validate($request,$rules,$messages);

        // try{
        //     studentFeedback::create([
        //         "name"=> $request->get("name"),
        //         "email"=> $request->get("email"),
        //         "telephone"=> $request->get("telephone"),
        //         "feedback"=> $request->get("feedback"),
        //     ])->save();
        // }catch (\Exception $e){
        //     die($e->getMessage());
        // }
        // return redirect("survey");
    }

}
