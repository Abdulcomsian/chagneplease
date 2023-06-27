<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Plan , PlanConclusion};
use App\Http\Repository\Home;
use App\Models\{ User , ScreeningQuestion , GeneralQuestion };
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DataTables;

class UserController extends Controller
{
    public $home;

    public function __construct(Home $home)
    {
        $this->home = $home;
    }
    public function get_signed_up()
    {
        return view('user.sign_complete');
    }
    public function get_investee_question_form(Request $request)
    {
        $plan = Plan::with('Market', 'Team', 'Traction', 'Competition', 'BusinessModel', 'CorporateStructure', 'ExistingFinancial', 'Financial', 'Fund', 'IntellectualProperty' , 'marketAnswer.question')
                    ->where('id' , $request->planId)
                    ->first();

        $marketQuestion = GeneralQuestion::market()->get();
        $tractionQuestion = GeneralQuestion::traction()->get();
        $teamQuestion = GeneralQuestion::team()->get();
        $competitionQuestion = GeneralQuestion::competition()->get();
        $financialQuestion = GeneralQuestion::financial()->get();
        $intellectualQuestion = GeneralQuestion::intellectual()->get();
        $fundQuestion = GeneralQuestion::fund()->get();
        $businessQuestion = GeneralQuestion::business()->get();
        $corporateQuestion = GeneralQuestion::corporate()->get();
        $investmentQuestion = GeneralQuestion::investment()->get();


        return view('user.questions.investee_questions')
                    ->with([
                        'planId' => $request->planId , 
                        'plan' => $plan,
                        'marketQuestion' => $marketQuestion,
                        'tractionQuestion' => $tractionQuestion,
                        'teamQuestion' => $teamQuestion,
                        'competitionQuestion' => $competitionQuestion,
                        'financialQuestion' => $financialQuestion,
                        'intellectualQuestion' => $intellectualQuestion,
                        'fundQuestion' => $fundQuestion,
                        'businessQuestion' => $businessQuestion,
                        'corporateQuestion' => $corporateQuestion,
                        'investmentQuestion' => $investmentQuestion 
                    ]);
    }
    public function get_general_information()
    {
        return view('user.questions.general_information');
    }
    public function get_business_information(Request $request)
    {
        $planId = $request->id;
        $screeningQuestion = ScreeningQuestion::get();
        return view('user.questions.business_information')->with(['screeningQuestion' => $screeningQuestion , 'planId'=> $planId]);
    }

    public function get_done()
    {
        return view('user.done');
    }
    public function get_service()
    {
        return view('user.services');
    }
    public function get_offerings()
    {
        return view('user.offerings');
    }
    public function get_home()
    {
        $plans = $this->home->get_home_details(0);
        return view('user.home')->with(['plans' => $plans]);
    }
    public function get_filter()
    {
        return view('user.filter');
    }
    public function get_invester()
    {
        return view('user.invester_general_information');
    }
    public function get_plan_statistics()
    {
        return view('user.plan');
    }
    public function get_investee_profile()
    {
        return view('user.investee_profile');
    }
    public function get_investee_answers()
    {
        return view('user.answer');
    }

    public function get_project_details(Request $request)
    {
        $plan = $this->home->get_project_details($request->id);
        return view('user.details')->with([ "plan" => $plan ]);
    }
    public function analyst_delete_investee(Request $request)
    {
        try{
        $userId = $request->investeeId;

        User::where('id' , $userId)->delete();

        return response()->json(['success' => true , 'msg' => 'Investee Deleted Successfully']);

        } catch(\Exception $e){

            return response()->json(['success' => false , 'msg' => 'Something Went Wrong' , 'error' => $e->getMessage()]);
        }
    }

    public function get_user_profile()
    {
        return view('user.user_profile');
    }

    public function update_username(Request $request)
    {
        try{
            $validate = Validator::make($request->all() , [
                'id' => 'integer|required',
                'name' => 'required'
            ]);

            if($validate->fails())
            {
                return response()->json(['success' => false , 'msg'=> 'Something Went Wrong' , 'error' => $validate->getMessageBag()]);
            }else{

                $userId = $request->id;
                $username = $request->name;
                User::where('id',$userId)->update(['name' => $username]);
                return response()->json(['success' => true , 'msg'=> 'User name updated successfully']);
            }
        
        }
        catch(\Exception $e){
            return response()->json(['success' => false , 'msg'=> 'Something Went Wrong' , 'error' => $e->getMessage()]);
        }


    }

    public function update_password(Request $request)
    {
        // dd($request->all());
        try{
            $validate = Validator::make($request->all() , [
                'id'          => 'required|integer',
                'old_password' => 'required',
                'password' => 'required|confirmed'
            ]);
            // dd($request->all());

            if($validate->fails())
            {
                return response()->json(['success' => false , 'msg'=> 'Something Went Wrong' , 'error' => $validate->getMessageBag()]);
            }else{
                $password = $request->old_password;
                $newPassword = $request->password;
                $userId = $request->id;
                if(Hash::check($password , auth()->user()->password))
                {
                    // $2y$10$NIzzYK3cvQ0LZYCWAWb0suWQF1r2Z09sbGJIbzVXabruNO2EuHUbq
                    User::where('id',$userId)->update(['password' => Hash::make($newPassword)]);
                    return response()->json(['success' => true , 'msg'=> 'Password updated successfully']);
                }else{
                    return response()->json(['success' => false , 'msg' => "You have entered a wrong password"]);
                }
            
               
            }
        
        }
        catch(\Exception $e){
            return response()->json(['success' => false , 'msg'=> 'Something Went Wrong' , 'error' => $e->getMessage()]);
        }
    }

    public function get_investee_page()
    {
        return view('admin.investee');
    }

    public function get_invester_page()
    {
        return view('admin.invester');
    }


    public function get_investee_list()
    {
        $investees = User::where("role", \AppConst::INVESTEE_ROLE)->get();
        
        return DataTables::of($investees)

            ->addColumn('name' , function($investee){
                return $investee->name;
            })

            ->addColumn('email' , function($investee){
                return $investee->email;
            })

            ->addColumn('status' , function($investee){
                return $investee->status == "approved" ? '<strong class="text-success investee-status">'.$investee->status.'</strong>' : '<strong class="text-danger investee-status">'.$investee->status.'</strong>';
            })

            ->addColumn('action' , function($investee){
                return '<a href="javascript:void(0)"><i class="fas fa-trash-alt delete-investee text-danger" data-investee-id="'.$investee->id.'"></i></a><a href="javascript:void(0)"><a class="investee-plan mx-2" href="javascript:void(0)"> <i class="fas fa-edit edit-investee" data-investee-id="'.$investee->id.'"></i></a>';
            })

            ->rawColumns(['name','email','status','action'])
            
            ->make(true);
    }

    public function get_invester_list()
    {
        $investers = User::where("role", \AppConst::INVESTER_ROLE)->get();
        
        return DataTables::of($investers)

            ->addColumn('name' , function($invester){
                return $invester->name;
            })

            ->addColumn('email' , function($invester){
                return $invester->email;
            })

            ->addColumn('status' , function($invester){
                return $invester->status == "approved" ? '<strong class="text-success investee-status">'.$invester->status.'</strong>' : '<strong class="text-danger investee-status">'.$invester->status.'</strong>';
            })

            ->addColumn('action' , function($invester){
                return '<a href="javascript:void(0)"><i class="fas fa-trash-alt delete-invester text-danger" data-invester-id="'.$invester->id.'"></i></a><a href="javascript:void(0)"><a class="investee-plan mx-2" href="javascript:void(0)"> <i class="fas fa-edit edit-invester" data-invester-id="'.$invester->id.'"></i></a>';
            })

            ->rawColumns(['name','email','status','action'])
            
            ->make(true);
    }

    public function update_investee(Request $request)
    {
        try{
            $investeeId = $request->investeeId;
            
            $status = $request->status;
            
            User::where('id' , $investeeId)->update(['status' => $status]);
            
            return response()->json(['success' => true , 'msg' => 'Investee Updated Successfully']);

        }catch(\Exception $e){

            return response()->json(['success' => false , 'msg' => 'Something Went Wrong' , 'error' => $e->getMessage() ]);

        }

    }

    public function update_invester(Request $request)
    {   
        try{
            $investerId = $request->investerId;
            
            $status = $request->status;
            
            User::where('id' , $investerId)->update(['status' => $status]);
            
            return response()->json(['success' => true , 'msg' => 'Investee Updated Successfully']);

        }catch(\Exception $e){

            return response()->json(['success' => false , 'msg' => 'Something Went Wrong' , 'error' => $e->getMessage() ]);

        }
    }

    public function delete_investee(Request $request)
    {
        try{
            $id = $request->investeeId;

            User::where('id' , $id)->delete();

            return response()->json(['success' => true , 'msg' => 'Investee deleted successfully']);

        }catch(\Exception $e)
        {

            return response()->json(['success' => false , 'msg' => 'Something Went Wrong!' , 'error' => $e->getMessage()]);

        }
   
    }

    public function delete_invester(Request $request)
    {
        try{
            $id = $request->investerId;

            User::where('id' , $id)->delete();

            return response()->json(['success' => true , 'msg' => 'Invester deleted successfully']);

        }catch(\Exception $e)
        {

            return response()->json(['success' => false , 'msg' => 'Something Went Wrong!' , 'error' => $e->getMessage()]);

        }
    }

    public function get_user_detail(Request $request)
    {
        try{
            $userId = $request->id;

            $userDetail = User::where('id' , $userId)->first();

            return response()->json(['success' => true , 'msg' => "User Found" , "user" => $userDetail]);
        }
        catch(\Exception $e){
            return response()->json(['success' => false , 'msg' => "Something Went Wrong" , "error" => $e->getMessage()]);
        }
    }


    public function get_plan_conclusion(Request $request)
    {
        $planId = $request->planId;
        return view('user.questions.conclusion')->with([ 'planId' => $planId]);
    }

    public function plan_conclusion(Request $request)
    {
        try{
            $request->validate([
                'video' => 'required|mimes:mp4,mov,ogg | max:20000'
            ]);
    
            $planId = $request->planId;
            $file = $request->file('video');
            $fileName = time().'-'.$file->getClientOriginalName();
            if($file->move(public_path('uploads/video/', $fileName)))
            {
                PlanConclusion::updateOrCreate(
                    ['plan_id' => $planId ],
                    ['plan_id' => $planId , 'video_url' => $fileName]);
                return redirect()->route('user.done');
            }else{
                session()->flash('uplaod','Error while uploading file');
                return redirect()->back();
            }

        }catch(\Exception $e){
            session()->flash('uplaod',$e->getMessage());
            return redirect()->back();
        }



    }


}
