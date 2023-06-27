@extends('analyst.main_investee')
@section('main-content')
    <div class="qs_title d-flex align-items-center">
      <img src="{{asset('img/sl.png')}}" alt="sl">
      <h2>GOOD LOOP</h2>
    </div>
    <div class="qs_sec">
      <div class="qs_box">
        <p>
          <span>Question 1: </span>How much feedback you have recieved so far?
        </p>
        <p>
          <span>Answer: </span>{{isset($tractionDetail) ? $tractionDetail->feedback : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 2: </span>What changes have you made based on that feedback?
        </p>
        <p>
          <span>Answer: </span>{{isset($tractionDetail) ? $tractionDetail->changes : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 3: </span>How many actual users do you have?
        </p>
        <p>
          <span>Answer: </span>{{isset($tractionDetail) ? $tractionDetail->actual_user : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 4: </span>How long do users stay on average?
        </p>
        <p>
          <span>Answer: </span>{{isset($tractionDetail) ? $tractionDetail->average_stay : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 5: </span>How many actual sales you have made?
        </p>
        <p>
          <span>Answer: </span>{{isset($tractionDetail) ? $tractionDetail->actual_sales : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 6: </span>What is the annual growth rate?
        </p>
        <p>
          <span>Answer: </span>{{isset($tractionDetail) ? $tractionDetail->annual_growth : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 7: </span>Total rate of growth?
        </p>
        <p>
          <span>Answer: </span>{{isset($tractionDetail) ? $tractionDetail->growth_rate : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 8: </span>Has growth been linear and consistent?
        </p>
        <p>
          <span>Answer: </span>{{isset($tractionDetail) ? $tractionDetail->growth_linear_consistent : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 9: </span>What has held back your growth?
        </p>
        <p>
          <span>Answer: </span>{{isset($tractionDetail) ? $tractionDetail->held_back : "--"}}
        </p>
      </div>
    </div>
    <div class="qs_box">
        <p>
          <span>Question 10: </span>can you provide a demonstration of the product or service now?
        </p>
        <p>
          <span>Answer: </span>{{isset($tractionDetail) ? $tractionDetail->demonstration : "--"}}
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
    let planableType = "traction";
    let planId = document.getElementById("planId").value;

    $.ajax({
        url : "{{route('add.traction.rating')}}",
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