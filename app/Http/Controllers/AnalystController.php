<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Analyst;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class AnalystController extends Controller
{
    public function authenticate(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::guard('analyst')->attempt(['email' => $request->email , 'password' => $request->password ], $request->get('remember')))
        {
            return redirect()->route('analyst.dashboard');
        }else{
            session()->flash('attemptError','Either Email/Password Incorrect');
            return back()->withInput($request->only('email'))->with('attemptError' , 'Either Email/Password Incorrect');
        }
    }

    public function login()
    {
        return view('analyst_auth.login');
    }

    public function logout()
    {
        Auth::guard('analyst')->logout();
        return redirect()->route('analyst.login');
    }

    public function get_analyst()
    {
        $analyst = Analyst::paginate(15);
        return view('admin.analyst')->with(['analysts' => $analyst]);
    }

    public function add_analyst(Request $request)
    {
        try{

        $validator = Validator::make( $request->all() ,[
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'email' => 'required|min:3|unique:analyst',
            'password' => 'required|min:3',
            'status' => 'required'
        ]);
        
            if($validator->fails()){
                return response()->json(['success' => false , 'msg' => 'Something Went Wrong' , 'errors' => $validator->getMessageBag()]);
            }
            else
            {
                $firstName = $request->firstname;
                $lastName  = $request->lastname;
                $email     = $request->email;
                $password  = Hash::make($request->password);
                $status    = $request->status;
                //inserting analyst
                Analyst::insert([
                    'email' => $email,
                    'firstname' => $firstName,
                    'lastname'  => $lastName,
                    'password'  => $password,
                    'status'    => $status
                ]);
            
                return response()->json(['success' => true , 'msg' => 'Analyst added successfully']);
            }
        }
        catch(\Exception $e){

            return response()->json(['success' => false , 'msg' => 'Something went wrong' , 'error' => $e->getMessage()]);
        
        }


        
    }

}
