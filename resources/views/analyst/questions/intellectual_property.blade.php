@extends('analyst.main_investee')
@section('main-content')
    <div class="qs_title d-flex align-items-center">
      <img src="{{asset('img/sl.png')}}" alt="sl">
      <h2>GOOD LOOP</h2>
    </div>
    <div class="qs_sec">
      <div class="qs_box">
        <p>
          <span>Question 1: </span>What is unique about the company?
        </p>
        <p>
          <span>Answer: </span>{{isset($intellectualPropertyDetail) ? $intellectualPropertyDetail->unique_company : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 2: </span>What Big problem does it solve?
        </p>
        <p>
          <span>Answer: </span>{{isset($intellectualPropertyDetail) ? $intellectualPropertyDetail->problem_solve : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 3: </span>What legal risks do you see?
        </p>
        <p>
          <span>Answer: </span>{{isset($intellectualPropertyDetail) ? $intellectualPropertyDetail->legal_risk : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 4: </span>Are you aware of any product liability risks?
        </p>
        <p>
          <span>Answer: </span>{{isset($intellectualPropertyDetail) ? $intellectualPropertyDetail->product_liability : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 5: </span>What regulatory risks could impact this business?
        </p>
        <p>
          <span>Answer: </span>{{isset($intellectualPropertyDetail) ? $intellectualPropertyDetail->regulatory_risk : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 6: </span>What intellectual property do you own?
        </p>
        <p>
          <span>Answer: </span>{{isset($intellectualPropertyDetail) ? $intellectualPropertyDetail->intellectual_property : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 7: </span>Who developed any intellectual property owned?
        </p>
        <p>
          <span>Answer: </span>{{isset($intellectualPropertyDetail) ? $intellectualPropertyDetail->developed_intellectual_property : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 8: </span>Have any employees or partners have left who may challenge these rights?
        </p>
        <p>
          <span>Answer: </span>{{isset($intellectualPropertyDetail) ? $intellectualPropertyDetail->person_left	 : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 9: </span>Are there any additional patents pending or planned?
        </p>
        <p>
          <span>Answer: </span>{{isset($intellectualPropertyDetail) ? $intellectualPropertyDetail->additional_partner : "--"}}
        </p>
      </div>
    </div>
    <div class="qs_box">
        <p>
          <span>Question 10: </span>How are any current intellectual assets owned?
        </p>
        <p>
          <span>Answer: </span>{{isset($intellectualPropertyDetail) ? $intellectualPropertyDetail->current_intellectual_assets : "--"}}
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
    let planableType = "intellectual-property";
    let planId = document.getElementById("planId").value;

    $.ajax({
        url : "{{route('add.intellectual.property.rating')}}",
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