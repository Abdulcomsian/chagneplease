<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\Plan;
use App\Http\Repository\Home;
use Illuminate\Validation\Rule;


class PlanController extends Controller
{
    protected $plan;
    protected $home;

    public function __construct(Plan $plan , Home $home)
    {
        $this->plan = $plan;
        $this->home = $home;
    }

     protected $rule = [
                "company_name" => "required",
                "size" => "required",
                "country" => "required",
                "city" => "required",
                "logo" => "required|file|mimes:jpg,png,jpeg,jfif,gif,hevc,heif,JPG,PNG,JPEG,jfif,GIF,HEVC,HEIF",
                "investment" => "required",
                "amount" => 'required|numeric|lt:investment',
                "description" => "required"
            ];

    public function add_plan(Request $request)
    {   

        $request->validate($this->rule);

        return $this->plan->add_user_plan($request);

    }

    public function get_user_plans(Request $request)
    {   
        return view('user.plan');
    }

    public function get_user_plan_list(Request $request)
    {
        return $this->plan->get_plan_list($request);
    }

    public function delete_user_plan(Request $request)
    {
        return $this->plan->delete_plan($request);
    }
    
    public function load_more_plan(Request $request)
    {
        try{
        
        $totalPlan = $request->totalPlan;
        $plan = $this->home->get_home_details($totalPlan);
        Plan::where('id' , $planId)->delete();
        return response()->json(['projects' => view('components.planList',['plans' => $plan])->render() , 'success' => true ]);    
        
        }catch(\Exception $e) {
            return response()->json(['success' => false , 'msg' => 'Something Went Wrong' , 'error' => $e->getMessage()]);
        }
    }

    public function analyst_delete_plan(Request $request)
    {
        try{

            return $this->plan->analyst_delete_plan($request);

        }catch(\Exception $e){
            return response()->json(["success" => false , "msg" => "Something Went Wrong" , "error" => $e->getMessage()]);
        }
    }

}
