<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\{ User , Plan };

class InvesteeController extends Controller
{
    public function get_investee()
    {
        return view('analyst.investee');
    }

    public function get_investee_list()
    {
        $users = User::where( 'role', 1 )->orderBy('id' , 'desc')->get();
        
        return DataTables::of($users)
                          ->addColumn('name' , function($user){
                            return $user->name;
                          })
                          ->addColumn('email' , function($user){
                            return $user->email;
                          })
                          // ->addColumn('status' , function($user){
                          //    return $user->status == "approved" ? '<strong class="text-success investee-status">'.$user->status.'</strong>' : '<strong class="text-danger investee-status">'.$user->status.'</strong>';
                          // })
                          ->addColumn('action' , function($user){
                            return '<a href="javascript:void(0)"><i class="fas fa-trash-alt delete-investee text-danger" data-investee-id="'.$user->id.'"></i></a><a href="javascript:void(0)"><a class="investee-plan" href="'.url("analyst/investee-plan/$user->id").'"> <i class="fas fa-eye view-investee-plan" data-investee-id="'.$user->id.'"></i></a>';
                          })
                          ->rawColumns(['name','email','action'])
                          ->make(true);
    }


    public function get_investee_plan(Request $request)
    {

      $investeeId = $request->id;

      return view('analyst.investeePlan')->with(['investeeId' => $investeeId]);

    }


    public function investee_plan_list(Request $request)
    {
  
      $clientId = $request->investeeId;

      $plans = Plan::where('user_id' , $clientId)->orderBy('id' ,'desc')->get();
      
      return DataTables::of($plans)
                          ->addIndexColumn()
                          ->addColumn('cname' , function($plan){
                            return $plan->company_name;
                          })
                          ->addColumn('investment' , function($plan){
                            return $plan->investment;
                          })
                          ->addColumn('amount' , function($plan){
                            return $plan->amount;
                          })
                          ->addColumn('country' , function($plan){
                            return $plan->country;
                          })
                          ->addColumn('city' , function($plan){
                            return $plan->city;
                          })
                          ->addColumn('status' , function($plan){
                             return $plan->status == "accepted" ? '<strong class="text-success investee-status">'.$plan->status.'</strong>' : '<strong class="text-danger investee-status">'.$plan->status.'</strong>';
                          })
                          ->addColumn('action' , function($plan){
                            return '<a href="javascript:void(0)"><i class="fas fa-trash-alt delete-plan text-danger" data-plan-id="'.$plan->id.'"></i></a>
                                    <a href="'.url("analyst/edit-investee-plan/$plan->id").'"><i class="fas fa-edit edit-plan text-success" data-investee-id="'.$plan->id.'"></i></a>
                                    <a class="investee-plan" href="'.url("analyst/investee/market/$plan->id").'"> <i class="fas fa-eye view-investee-plan" data-investee-id="'.$plan->id.'"></i></a>';
                          })
                          ->rawColumns(['cname','investment','amount','country' ,'city' ,'status' ,'action'])
                          ->make(true);
    }



    public function get_edit_investee_plan(Request $request)
    {
        $planId = $request->id;

        $plan = Plan::with('investee')->where('id' , $planId)->first();

        return view('analyst.investeePlanEdit')->with(['plan' => $plan]);
    }

    public function update_investee_plan_status(Request $request)
    {
      try{
        
        $planId = $request->planId;

        $value = $request->value;

        Plan::where('id' , $planId )->update(['status' => $value]);

        return response()->json(['success' => true , "msg" => "Plan updated Successfully"]);
      
      }catch(\Exception $e){

        return response()->json(["success" => false , "msg" => "Something Went Wrong" , "error" => $e->getMessage()]);

      }
    }


}
