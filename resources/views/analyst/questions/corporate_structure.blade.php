@extends('analyst.main_investee')
@section('main-content')
@if($corporateDetail->corporateAiQuestion)
  <div class="modal modal2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">AI Rationale</h5>
          <button type="button" class="close close-report-modal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{$corporateDetail->corporateAiQuestion->aiReport->report}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-report-modal" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endif


    {{-- <input type="hidden" name="planable" id="planableId" value="{{ $marketDetail ? $marketDetail->id : "" }}" > --}}
    <div class="qs_title d-flex align-items-center">
      <img class="company_logo" src="{{asset('uploads/'.$corporateDetail->company_logo)}}"  alt="sl">
      <div class="d-flex justify-content-between w-100">
        <h2>{{$corporateDetail->company_name}}</h2>
        @if($corporateDetail->corporateAiQuestion)
        <h4 class="mt-2">
          {{$corporateDetail->corporateAiQuestion->ai_rating}} / 10
        </h4>
        @endif
      </div>
    </div>
    @php    
      $index = 0;
    @endphp
    <div class="qs_sec">
      @foreach($corporateDetail->corporateAnswer as  $answer)
      <div class="qs_box">
        <p>
          <span>Question {{++$index}}: </span>{{$answer->question->question}}
        </p>
        <p>
          <span>Answer: </span>{{ $answer->answer ?? "--" }}
        </p>
      </div>

      @endforeach

      @if($corporateDetail->corporateAiQuestion)
        @php
          $aiQuestion = json_decode($corporateDetail->corporateAiQuestion->question);
          $aiAnswer = json_decode($corporateDetail->corporateAiQuestion->answer);
        @endphp 

        @for($i =0 ; $i<sizeof($aiQuestion); $i++)
        <div class="qs_box">
          <p>
            <span>Question {{++$index}}: </span>{{$aiQuestion[$i]}}
          </p>
          <p>
            <span>Answer: </span>{{ $aiAnswer[$i] ?? "--" }}
          </p>
        </div>
        @endfor

     @else
        <div>Ai Question Not Submitted Yet!</div>
     @endif

     
    <div class="d-flex justify-content-between">
        @if($corporateDetail->corporateAiQuestion)
          <div class="qs_btns d-flex justify-content-between align-content-center">
            <div class="btns d-flex">
              <a href="#" class="btn btn-blue-outline" data-bs-toggle="modal" data-bs-target="#model1">Rate</a>
            </div>
          </div>
          <div class="qs_btns d-flex justify-content-between align-content-center">
            <div class="btns d-flex report-modal">
                <a href="#" class="btn btn-blue-outline" data-bs-toggle="modal" data-bs-target="#model2">AI Rationale</a>
            </div>
        </div>
          @endif
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
    let planableType = "market";
    let planId = document.getElementById("planId").value;

    $.ajax({
        url : "{{route('add.ai.rating')}}",
        type : "post",
        data : {
          _token : '{{csrf_token()}}',
          score: score,
          feedback : feedback,
          planId : planId,
          questionCategory : 9,
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

  $(".report-modal").on("click" , function(){
    $(".modal2").modal("show");
  })

  $(".close-report-modal").on("click" , function(){
     $(".modal2").modal("hide");
  })
</script>
@endsection