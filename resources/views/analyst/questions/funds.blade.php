@extends('analyst.main_investee')
@section('main-content')
    <div class="qs_title d-flex align-items-center">
      <img src="{{asset('img/sl.png')}}" alt="sl">
      <h2>GOOD LOOP</h2>
    </div>
    <div class="qs_sec">
      <div class="qs_box">
        <p>
          <span>Question 1: </span>How will these funds be allocated?
        </p>
        <p>
          <span>Answer: </span>{{isset($fundsDetail) ? $fundsDetail->funds_allocated : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 2: </span>How much will be spent on founders salaries?
        </p>
        <p>
          <span>Answer: </span>{{isset($fundsDetail) ? $fundsDetail->spent : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 3: </span>How much will be spent on overhead versus expansion?
        </p>
        <p>
          <span>Answer: </span>{{isset($fundsDetail) ? $fundsDetail->expansion : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 4: </span>What if you don't get all the money you are asking for?
        </p>
        <p>
          <span>Answer: </span>{{isset($fundsDetail) ? $fundsDetail->not_recieved_money : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 5: </span>What assets will be invested in with this capital?
        </p>
        <p>
          <span>Answer: </span>{{isset($fundsDetail) ? $fundsDetail->asset_invested : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 6: </span>What are your milestones?
        </p>
        <p>
          <span>Answer: </span>{{isset($fundsDetail) ? $fundsDetail->milestones : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 7: </span>What are the biggest risks to my investment?
        </p>
        <p>
          <span>Answer: </span>{{isset($fundsDetail) ? $fundsDetail->biggest_risks : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 8: </span>Why are you choosing this method of raising capital?
        </p>
        <p>
          <span>Answer: </span>{{isset($fundsDetail) ? $fundsDetail->raising_capitals : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 9: </span>How much this money will be used for future fundraising efforts?
        </p>
        <p>
          <span>Answer: </span>{{isset($fundsDetail) ? $fundsDetail->fundraising_efforts : "--"}}
        </p>
      </div>
    </div>
    <div class="qs_box">
        <p>
          <span>Question 10: </span>How much are you personal expenses each month?
        </p>
        <p>
          <span>Answer: </span>{{isset($fundsDetail) ? $fundsDetail->personal_expenses : "--"}}
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
    let planableType = "funds";
    let planId = document.getElementById("planId").value;

    $.ajax({
        url : "{{route('add.funds.rating')}}",
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