@extends('analyst.main_investee')
@section('main-content')
    <div class="qs_title d-flex align-items-center">
      <img src="{{asset('img/sl.png')}}" alt="sl">
      <h2>GOOD LOOP</h2>
    </div>
    <div class="qs_sec">
      <div class="qs_box">
        <p>
          <span>Question 1: </span>How is the company organized?
        </p>
        <p>
          <span>Answer: </span>{{isset($corporateStructureDetail) ? $corporateStructureDetail->organized_company : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 2: </span>Who hold which titles?
        </p>
        <p>
          <span>Answer: </span>{{isset($corporateStructureDetail) ? $corporateStructureDetail->hold_titles : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 3: </span>How are shares split?
        </p>
        <p>
          <span>Answer: </span>{{isset($corporateStructureDetail) ? $corporateStructureDetail->split_shares : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 4: </span>Is there any existing board or advisors?
        </p>
        <p>
          <span>Answer: </span>{{isset($corporateStructureDetail) ? $corporateStructureDetail->existing_board : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 5: </span>Where is the company registered?
        </p>
        <p>
          <span>Answer: </span>{{isset($corporateStructureDetail) ? $corporateStructureDetail->registered_company : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 6: </span>Who handles accounting?
        </p>
        <p>
          <span>Answer: </span>{{isset($corporateStructureDetail) ? $corporateStructureDetail->account_handling : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 7: </span>What unique skills and talents does each owner contribute?
        </p>
        <p>
          <span>Answer: </span>{{isset($corporateStructureDetail) ? $corporateStructureDetail->talent_skills : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 8: </span>Name someone you chose not to include as a founder and why?
        </p>
        <p>
          <span>Answer: </span>{{isset($corporateStructureDetail) ? $corporateStructureDetail->selected_founder : "--"}}
        </p>
      </div>
      <div class="qs_box">
        <p>
          <span>Question 9: </span>Who filed the company?
        </p>
        <p>
          <span>Answer: </span>{{isset($corporateStructureDetail) ? $corporateStructureDetail->employee_selector : "--"}}
        </p>
      </div>
    </div>
    <div class="qs_box">
        <p>
          <span>Question 10: </span>Who is the registered agent on record?
        </p>
        <p>
          <span>Answer: </span>{{isset($corporateStructureDetail) ? $corporateStructureDetail->registered_agent : "--"}}
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
    let planableType = "corporate-structure";
    let planId = document.getElementById("planId").value;

    $.ajax({
        url : "{{route('add.corporate.structure.rating')}}",
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