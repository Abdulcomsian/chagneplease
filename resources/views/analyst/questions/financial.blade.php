@extends('analyst.main_investee')
@section('main-content')
    <div class="qs_title d-flex align-items-center">
      <img src="{{asset('img/sl.png')}}" alt="sl">
      <h2>GOOD LOOP</h2>
    </div>
    <div class="qs_sec">
      <div class="qs_box">
        <p>
          <span>Question 1: </span>How are you marketing your product or service?
        </p>
        <p>
          <span>Answer: </span>{{isset($financialDetail) ? $financialDetail->product_marketing : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 2: </span>How much is your marketing budget?
        </p>
        <p>
          <span>Answer: </span>{{isset($financialDetail) ? $financialDetail->marketing_budget : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 3: </span>What are your per customer acquisition costs?
        </p>
        <p>
          <span>Answer: </span>{{isset($financialDetail) ? $financialDetail->acquisition_cost : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 4: </span>How much is your customer lifetime value?
        </p>
        <p>
          <span>Answer: </span>{{isset($financialDetail) ? $financialDetail->lifetime_value : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 5: </span>How much equity and debt has been raised in the past?
        </p>
        <p>
          <span>Answer: </span>{{isset($financialDetail) ? $financialDetail->equity_debt : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 6: </span>Who participated in earlier round of fundraising?
        </p>
        <p>
          <span>Answer: </span>{{isset($financialDetail) ? $financialDetail->fundraising : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 7: </span>What is your burn rate?
        </p>
        <p>
          <span>Answer: </span>{{isset($financialDetail) ? $financialDetail->burn_rate : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 8: </span>How long will it take to become profitable?
        </p>
        <p>
          <span>Answer: </span>{{isset($financialDetail) ? $financialDetail->time_period : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 9: </span>What are the key metrics your team is focused on?
        </p>
        <p>
          <span>Answer: </span>{{isset($financialDetail) ? $financialDetail->metrics_key : "--"}}
        </p>
      </div>
    </div>
    <div class="qs_box">
        <p>
          <span>Question 10: </span>What stock options have been given already? What is the distribution of equity between founders?
        </p>
        <p>
          <span>Answer: </span>{{isset($financialDetail) ? $financialDetail->stock_options : "--"}}
        </p>
      </div>
      <!-- btns -->
      <div class="qs_btns d-flex justify-content-between align-content-center">
        {{-- <a href="#" class="link">save</a> --}}
        <div class="btns d-flex">
          <a href="#" class="btn btn-blue-outline" data-bs-toggle="modal" data-bs-target="#model1">Rate</a>
          {{-- <a href="#" class="btn btn_blue">Done</a> --}}
        </div>
      </div>
    </div>

@endsection

@section('script')
<script>
  let rateButton = document.getElementById("rate");
  rateButton.addEventListener("click" , function(e){
    let scoreRadio = document.querySelector("input[name='score']:checked");
    let check = [undefined , null , ""]
    if(check.includes(scoreRadio))
    {
      toast.error("Please select score");
      return;
    }

    let score = scoreRadio.value;
    let feedback = document.getElementById("comment").value;
    let planableType = "financial";
    let planId = document.getElementById("planId").value;

    $.ajax({
        url : "{{route('add.financial.rating')}}",
        type : "post",
        data : {
          score: score,
          feedback : feedback,
          planableType : planableType,
          planId : planId,
          _token : '{{csrf_token()}}'
        },
        success : function(res){
          if(res.success == true)
          {
            toastr.success(res.msg);
            $("#model1").modal("toggle");
          }else{
            toastr.error(res.msg);
          }
        } 
    });

  })
</script>
@endsection