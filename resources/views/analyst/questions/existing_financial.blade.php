@extends('analyst.main_investee')
@section('main-content')
    {{-- <input type="hidden" name="planable" id="planableId" value="{{ $marketDetail ? $marketDetail->id : "" }}" > --}}
    <div class="qs_title d-flex align-items-center">
      <img src="{{asset('img/sl.png')}}" alt="sl">
      <div class="d-flex justify-content-between w-100">
        <h2>GOOD LOOP</h2>
        @if($investmentDetail->investmentAiQuestion)
        <h4 class="mt-2">
          {{$investmentDetail->investmentAiQuestion->ai_rating}} / 10
        </h4>
        @endif
      </div>
    </div>
    @php    
      $index = 0;
    @endphp
    <div class="qs_sec">
      @foreach($investmentDetail->investmentAnswer as  $answer)
      <div class="qs_box">
        <p>
          <span>Question {{++$index}}: </span>{{$answer->question->question}}
        </p>
        <p>
          <span>Answer: </span>{{ $answer->answer ?? "--" }}
        </p>
      </div>

      @endforeach

      @if($investmentDetail->investmentAiQuestion)
        @php
          $aiQuestion = json_decode($investmentDetail->investmentAiQuestion->question);
          $aiAnswer = json_decode($investmentDetail->investmentAiQuestion->answer);
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


     @if($investmentDetail->investmentAiQuestion)
      <div class="qs_btns d-flex justify-content-between align-content-center">
        <div class="btns d-flex">
          <a href="#" class="btn btn-blue-outline" data-bs-toggle="modal" data-bs-target="#model1">Rate</a>
        </div>
      </div>
      @endif


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
          questionCategory : 10,
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