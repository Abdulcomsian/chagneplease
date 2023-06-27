@extends('analyst.main_investee')
@section('main-content')
    <div class="qs_title d-flex align-items-center">
      <img src="{{asset('img/sl.png')}}" alt="sl">
      <h2>GOOD LOOP</h2>
    </div>
    <div class="qs_sec">
      <div class="qs_box">
        <p>
          <span>Question 1: </span>Which specific marketing channels are you using?
        </p>
        <p>
          <span>Answer: </span>{{isset($businessModelDetail) ? $businessModelDetail->specific_channels : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 2: </span>Why are you using these marketing channels?
        </p>
        <p>
          <span>Answer: </span>{{isset($businessModelDetail) ? $businessModelDetail->marketing_channels : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 3: </span>What is your plan B, if these sales channels are interrupted?
        </p>
        <p>
          <span>Answer: </span>{{isset($businessModelDetail) ? $businessModelDetail->plan_b : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 4: </span>What profit margins are you operating on?
        </p>
        <p>
          <span>Answer: </span>{{isset($businessModelDetail) ? $businessModelDetail->profit_margin : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 5: </span>How will scalling impact profit margins?
        </p>
        <p>
          <span>Answer: </span>{{isset($businessModelDetail) ? $businessModelDetail->scalling_impact : "--"}}
      </div>
      <div class="qs_box">
        <p>
          <span>Question 6: </span>What pivots have you already made up until now?
        </p>
        <p>
          <span>Answer: </span>{{isset($businessModelDetail) ? $businessModelDetail->pivots : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 7: </span>Can you tell me a story about how a customer has decided to choose you and their experience with your product?
        </p>
        <p>
          <span>Answer: </span>{{isset($businessModelDetail) ? $businessModelDetail->customer_story : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 8: </span>Who in the organization is most replaceable?
        </p>
        <p>
          <span>Answer: </span>{{isset($businessModelDetail) ? $businessModelDetail->replaceable : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 9: </span>What unique features are you working on?
        </p>
        <p>
          <span>Answer: </span>{{isset($businessModelDetail) ? $businessModelDetail->unique_feature : "--"}}
        </p>
      </div>
    </div>
    <div class="qs_box">
        <p>
          <span>Question 10: </span>What other streams of revenue can be added to this?
        </p>
        <p>
          <span>Answer: </span>{{isset($businessModelDetail) ? $businessModelDetail->revenue_stream : "--"}}
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
    let planableType = "business-model";
    let planId = document.getElementById("planId").value;

    $.ajax({
        url : "{{route('add.business.model.rating')}}",
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