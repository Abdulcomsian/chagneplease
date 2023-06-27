<?php
namespace App\Http\Repository;
use App\Models\Plan as UserPlan;
use DataTables;

class Plan{

    public function add_user_plan($request)
    {
        try{
            $extensions = ['jpg' , 'png' , 'jpeg' , 'jfif' , 'gif' , 'hevc' , 'heif' , 'JPG' , 'PNG' , 'JPEG' , 'jfif', 'GIF', 'HEVC' , 'HEIF'];
            
            $attachment = $request->file('logo');

            $attachmentExtension = $attachment->getClientOriginalExtension();


            if(!in_array($attachmentExtension , $extensions))
            {
                return redirect()->back()->with(['error' => true , 'msg'=>'File must be of type jpg, png, jpeg, jfif, gif, hevc, heif']);
            }

            $attachmentName = $attachment->getClientOriginalName();
    
            $destinationPath = "uploads";
            //giving New Name
            $newName = strtotime(date('Y/m/d h:i:s')).$attachmentName;

            $attachment->move($destinationPath , $newName);

            $planId = UserPlan::insertGetId([
                "user_id" => auth()->user()->id,
                "company_name" => $request->company_name,
                "size" =>   $request->size,
                "investment" => $request->investment,
                "amount"     => $request->amount,
                "country"   => $request->country,
                "city"  => $request->city,
                "address" => $request->address,
                "postal_code" => $request->postal_code,
                "company_logo" => $newName,
                "category"  => $request->category,
                "status"    => "pending",
                "description" => $request->description,
                "video" => $request->video,
            ]);

            return redirect('/business-information/'.$planId);
        //    return redirect('/investee-questions/'.$planId);

        }catch(\Exception $e)
        {
            return redirect()->back()->with("error" , "something went wrong");
        }
    }

    public function get_plan_list($request)
    {
        $status = $request->status;

        $query = UserPlan::query();

        $query->when(isset($status) && !empty($status) , function($q) use ($status) {
            $q->where('status' , $status);
        });

        $userPlan = $query->where('user_id' , auth()->user()->id)->orderBy('id' , 'desc')->get();
       
        return \DataTables::of($userPlan)
                    ->addColumn('company' , function($plan){
                        return $plan->company_name;
                    })
                    ->addColumn('size', function($plan){
                        return $plan->size;
                    })
                    ->addColumn('category', function($plan){
                        return $plan->category;
                    })
                    ->addColumn('logo', function($plan){
                        return '<img style="width:50px" src="'.asset('uploads').'/'.$plan->company_logo.'" >'; 
                    })
                    ->addColumn('status', function($plan){
                        return $plan->status;
                    })
                    ->addColumn('action', function($plan){
                        return "<div class='d-flex justify-content-between'>
                                    <a type='button'  class='text-light btn btn-primary ml-2' href='".url('/investee-questions/'.$plan->id)."'>View</a>
                                    <a type='button'  class='text-light btn btn-danger' href='".url('/delete-plan/'.$plan->id)."'>Delete</a>
                                </div>";
                    })
                    ->rawColumns(['company' ,'size' ,'category','logo','status','action'])
                    ->make(true);
        // return view()
    }

    public function delete_plan($request)
    {
        try{
        
            $id = $request->id;
            
            UserPlan::where('id' , $request->id)->delete();
            
            return redirect()->back()->with('success' ,'Successfully removed plan');

        }catch(Exception $e){
            
            return redirect()->back()->with('error','Something Went Wrong');
        }   
    }

    public function analyst_delete_plan($request)
    {
        $planId = $request->planId;

        UserPlan::where("id",$planId)->delete();

        return response()->json(['success' => true , 'msg' => "Plan Deleted Successfully "]);

    }


}