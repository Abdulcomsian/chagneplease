@extends('analyst.main_investee')
@section('main-content')
    <div class="qs_title d-flex align-items-center">
      <img src="{{asset('img/sl.png')}}" alt="sl">
      <h2>GOOD LOOP</h2>
    </div>
    <div class="qs_sec">
      <div class="qs_box">
        <p>
          <span>Question 1: </span>What is your exit goal?(i.e IPO, M&A)
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->exit_goal : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 2: </span>What is your expected time frame for this?
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->expected_time_frame : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 3: </span>Who do you imagine will help you exit?
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->help_exit : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 4: </span>When do you expect you will be conducting a follow up round of fundraising?
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->follow_up_round : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 5: </span>How much money is your pre-money valuation?
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->valuation : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 6: </span>how are you determining current valuation?
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->current_valuation : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 7: </span>How much are you trying to raise now?
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->current_raisings : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 8: </span>How many previous investors will participate in this round?
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->previous_investor : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 9: </span>What is the next milestone this money will take you to?
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->next_milestone : "--"}}
        </p>
      </div>
    </div>
    <div class="qs_box">
        <p>
          <span>Question 10: </span>How else do you hope an investor will help beyond money?
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->investor_help : "--"}}
        </p>
    </div>
    <div class="qs_box">
        <p>
          Numbers of customer
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->total_customer : "--"}}
        </p>
    </div>
    <div class="qs_box">
        <p>
          What country based in?
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->operation_country : "--"}}
        </p>
    </div>
    <div class="qs_box">
        <p>
          What countries do you operate in?
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->founded_date : "--"}}
        </p>
    </div>
    <div class="qs_box">
        <p>
          Date Founded
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->full_time_employee : "--"}}
        </p>
    </div>
    <div class="qs_box">
        <p>
            Stage of maturity
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->maturity : "--"}}
        </p>
    </div>
    <div class="qs_box">
        <p>
          Number of full-time employees
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->full_time_employee : "--"}}
        </p>
    </div>
    <div class="qs_box">
        <p>
          Annual revenue 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->annual_revenue : "--"}}
        </p>
    </div>
    <div class="qs_box">
        <p>
          Projected revenue 2023, 2024, 2025, 2026, 2027
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->projected_revenue : "--"}}
        </p>
    </div>
    <div class="qs_box">
        <p>
          Net Profit 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->net_profit : "--"}}
        </p>
    </div>
    <div class="qs_box">
        <p>
          Cach Balance (31 Dec 2021)
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->cach_balance : "--"}}
        </p>
    </div>
    <div class="qs_box">
        <p>
          Funding request
        </p>
        <p>
          <span>Answer: </span>{{isset($existingFinancialDetail) ? $existingFinancialDetail->funding_request : "--"}}
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
    let planableType = "existing-financial";
    let planId = document.getElementById("planId").value;

    $.ajax({
        url : "{{route('add.existing.financial.rating')}}",
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