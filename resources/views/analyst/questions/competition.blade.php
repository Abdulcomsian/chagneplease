@extends('analyst.main_investee')
@section('main-content')
    <div class="qs_title d-flex align-items-center">
      <img src="{{asset('img/sl.png')}}" alt="sl">
      <h2>GOOD LOOP</h2>
    </div>
    <div class="qs_sec">
      <div class="qs_box">
        <p>
          <span>Question 1: </span>Who are you competitors?
        </p>
        <p>
          <span>Answer: </span>{{ isset($competitionDetail) ? $competitionDetail->competitors : "--" }}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 2: </span>What are your strength and advantages over your competitors?
        </p>
        <p>
          <span>Answer: </span>{{ isset($competitionDetail) ? $competitionDetail->advantages : "--" }}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 3: </span>What are your weakness or disadvantages?
        </p>
        <p>
          <span>Answer: </span>{{ isset($competitionDetail) ? $competitionDetail->disadvantages : "--" }}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 4: </span>What barriers to entry or scale are there for you?
        </p>
        <p>
          <span>Answer: </span>{{ isset($competitionDetail) ? $competitionDetail->barriers : "--" }}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 5: </span>Where is the competition letting down customers?
        </p>
        <p>
          <span>Answer: </span>{{ isset($competitionDetail) ? $competitionDetail->letting_down : "--" }}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 6: </span>Why haven't your competitors done this yet?
        </p>
        <p>
          <span>Answer: </span>{{ isset($competitionDetail) ? $competitionDetail->competitors_not_done : "--" }}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 7: </span>How do your features differ?
        </p>
        <p>
          <span>Answer: </span>{{ isset($competitionDetail) ? $competitionDetail->differ_feature : "--" }}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 8: </span>How do you compare on price?
        </p>
        <p>
          <span>Answer: </span>{{ isset($competitionDetail) ? $competitionDetail->compare_price : "--" }}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 9: </span>How do you compare on service?
        </p>
        <p>
          <span>Answer: </span>{{ isset($competitionDetail) ? $competitionDetail->compare_service : "--" }}
        </p>
      </div>
    </div>
    <div class="qs_box">
        <p>
          <span>Question 10: </span>How do you compare on customer satisfaction?
        </p>
        <p>
          <span>Answer: </span>{{ isset($competitionDetail) ? $competitionDetail->customer_satisfaction : "--" }}
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
    let planableType = "competition";
    let planId = document.getElementById("planId").value;

    $.ajax({
        url : "{{route('add.competition.rating')}}",
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