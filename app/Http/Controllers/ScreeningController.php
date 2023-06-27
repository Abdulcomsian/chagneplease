<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\{Screening};
use Illuminate\Support\Facades\Validator;

class ScreeningController extends Controller
{
    protected $screening;

    public function __construct(Screening $screening)
    {
        $this->screening = $screening;
    }

    public function add_screening(Request $request)
    {
        $validator = Validator::make($request->all() , [
            "planId" => "required|numeric",
            "screeningAnswers" => "required|array"
        ]);

        if($validator->fails())
        {
            return response()->json(["success" => false , "msg" => "Something Went Wrong!" , "error" => $validator->getMessageBag()]);
        }else{
            return $this->screening->add_screening_answer($request);
        }

    }

}
