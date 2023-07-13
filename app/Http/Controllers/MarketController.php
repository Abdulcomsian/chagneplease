<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\Market;

class MarketController extends Controller
{
    protected $market;

    protected $rule = ['planId' => 'required|integer'];

    public function __construct(Market $market)
    {
        $this->market = $market;
    }


    public function get_market(Request $request)
    {
      return  $this->market->get_market_plan_detail($request);
    }
    
    public function add_market(Request $request)
    {
        $request->validate($this->rule);

        return $this->market->add_market_plan($request);        
    }

    public function add_market_rating(Request $request)
    {
        return $this->market->market_rating($request);
    }
}
