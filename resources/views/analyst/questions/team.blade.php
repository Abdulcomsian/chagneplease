@extends('analyst.main_investee')
@section('main-content')
    <div class="qs_title d-flex align-items-center">
      <img src="{{asset('img/sl.png')}}" alt="sl">
      <h2>GOOD LOOP</h2>
    </div>
    <div class="qs_sec">
      <div class="qs_box">
        <p>
          <span>Question 1: </span>Where are your headquarters?
        </p>
        <p>
          <span>Answer: </span>{{isset($teamDetail) ? $teamDetail->headquarter : "--" }}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 2: </span>Who are the founders?
        </p>
        <p>
          <span>Answer: </span>{{isset($teamDetail) ? $teamDetail->founders : "--" }}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 3: </span>Who are key team members?
        </p>
        <p>
          <span>Answer: </span>{{isset($teamDetail) ? $teamDetail->team_members : "--" }}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 4: </span>Any existing board members?
        </p>
        <p>
          <span>Answer: </span>{{isset($teamDetail) ? $teamDetail->board_members : "--" }}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 5: </span>What key roles may need to be hired for soon?
        </p>
        <p>
          <span>Answer: </span>{{isset($teamDetail) ? $teamDetail->roles : "--" }}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 6: </span>What experience do you have in the industry?
        </p>
        <p>
          <span>Answer: </span>{{isset($teamDetail) ? $teamDetail->experience : "--" }}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 7: </span>Why are you the right person to bet on to achieve this?
        </p>
        <p>
          <span>Answer: </span>{{isset($teamDetail) ? $teamDetail->right_person : "--" }}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 8: </span>What motivates you?
        </p>
        <p>
          <span>Answer: </span>{{isset($teamDetail) ? $teamDetail->motivation : "--" }}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 9: </span>Are any of the founder willing to be bought out now?
        </p>
        <p>
          <span>Answer: </span>{{isset($teamDetail) ? $teamDetail->founder : "--" }}
        </p>
      </div>
    </div>
    <div class="qs_box">
        <p>
          <span>Question 10: </span>Are there any other people who may claim they are owed or responsible for your ideas?
        </p>
        <p>
          <span>Answer: </span>{{isset($teamDetail) ? $teamDetail->responsible_idea : "--" }}
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
    let planableType = "team";
    let planId = document.getElementById("planId").value;

    $.ajax({
        url : "{{route('add.team.rating')}}",
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