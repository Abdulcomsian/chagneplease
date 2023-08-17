@extends('user.main')
@section('style')
<style>
  button.save_link {
    border: none;
}
.overlay{
  position : absolute;
  width: 100%;
  height: 100%;
  z-index: 5;
}

.loading-area{
  position: relative;
  width: 100%;
  height: 100%;
  opacity: 0.5;
  background: rgb(192,192,192);
}
.spinner-area{
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 999;
}

.form-container{
  position: relative;
}

.spinner {
       position: absolute;
       left: 50%;
       top: 50%;
       height:60px;
       width:60px;
       margin:0px auto;
       -webkit-animation: rotation .6s infinite linear;
       -moz-animation: rotation .6s infinite linear;
       -o-animation: rotation .6s infinite linear;
       animation: rotation .6s infinite linear;
       border-left:6px solid rgba(0,174,239,.15);
       border-right:6px solid rgba(0,174,239,.15);
       border-bottom:6px solid rgba(0,174,239,.15);
       border-top:6px solid rgba(0,174,239,.8);
       border-radius:100%;
       opacity: 1;
    }
    
    @-webkit-keyframes rotation {
       from {-webkit-transform: rotate(0deg);}
       to {-webkit-transform: rotate(359deg);}
    }
    @-moz-keyframes rotation {
       from {-moz-transform: rotate(0deg);}
       to {-moz-transform: rotate(359deg);}
    }
    @-o-keyframes rotation {
       from {-o-transform: rotate(0deg);}
       to {-o-transform: rotate(359deg);}
    }
    @keyframes rotation {
       from {transform: rotate(0deg);}
       to {transform: rotate(359deg);}
    }
</style>
@endsection
@section('main-content')
{{-- modal starts here --}}
<div class="modal fade" id="bonus-question" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bonus Question</h5>
        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" class="question-category-id" name="question_category_id">
        <div class="bonus-question-list">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-blue add-bonus-question">Save changes</button>
      </div>
    </div>
  </div>
</div>
{{-- modal ends here --}}



<div class="container">
  <input type="hidden" name="planId" id="planId" value="{{$planId}}">
    <div class="text_content text-center my-lg-5 my-3">
      <h2 class="section_title">Answer following questions</h2>
      <p class="section_para">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
        maecenas aliquam aliquam non.
      </p>
    </div>

    {{-- steps starts here --}}
    <div class="stepper-wrapper">

      <div class="stepper-item @if(isset($plan->marketAiQuestion) && !is_null($plan->marketAiQuestion)) completed @endif">
        <div class="step-counter num">1</div>
        <div class="step-counter check">
          <img src="{{asset('img/check.png')}}" alt="check">
        </div>
        <div class="step-name">Market & <br> Impact</div>
      </div>
      <div class="stepper-item @if(isset($plan->marketAiQuestion) && !is_null($plan->marketAiQuestion) && !isset($plan->tractionAiQuestion) && is_null($plan->tractionAiQuestion)) next @endif @if(isset($plan->tractionAiQuestion) && !is_null($plan->tractionAiQuestion)) completed @endif">
        <div class="step-counter num">2</div>
        <div class="step-counter check">
          <img src="{{asset('img/check.png')}}" alt="check">
        </div>
        <div class="step-counter bi_check">
          <img src="{{asset('img/bi_check.png')}}" alt="check">
        </div>
        <div class="step-name">Traction <br> Sustainability</div>
      </div>
      <div class="stepper-item @if(isset($plan->tractionAiQuestion) && !is_null($plan->tractionAiQuestion) && !isset($plan->teamAiQuestion) && is_null($plan->teamAiQuestion)) next @endif @if(isset($plan->teamAiQuestion) && !is_null($plan->teamAiQuestion)) completed @endif">
        <div class="step-counter num">3</div>
        <div class="step-counter check">
          <img src="{{asset('img/check.png')}}" alt="check">
        </div>
        <div class="step-counter bi_check">
          <img src="{{asset('img/bi_check.png')}}" alt="check">
        </div>
        <div class="step-name">Team <br> Governance</div>
      </div>
      <div class="stepper-item @if(isset($plan->teamAiQuestion) && !is_null($plan->teamAiQuestion) && !isset($plan->competitionAiQuestion) && is_null($plan->competitionAiQuestion)) next @endif @if(isset($plan->competitionAiQuestion) && !is_null($plan->competitionAiQuestion)) completed @endif">
        <div class="step-counter num">4</div>
        <div class="step-counter check">
          <img src="{{asset('img/check.png')}}" alt="check">
        </div>
        <div class="step-counter bi_check">
          <img src="{{asset('img/bi_check.png')}}" alt="check">
        </div>
        <div class="step-name">Competition &  <br> Differentiation</div>
      </div>
      <div class="stepper-item @if(isset($plan->competitionAiQuestion) && !is_null($plan->competitionAiQuestion) && !isset($plan->financialAiQuestion) && is_null($plan->financialAiQuestion)) next @endif @if(isset($plan->financialAiQuestion) && !is_null($plan->financialAiQuestion)) completed @endif">
        <div class="step-counter num">5</div>
        <div class="step-counter check">
          <img src="{{asset('img/check.png')}}" alt="check">
        </div>
        <div class="step-counter bi_check">
          <img src="{{asset('img/bi_check.png')}}" alt="check">
        </div>
        <div class="step-name">Financials &<br> Resilience</div>
      </div>
      <div class="stepper-item @if(isset($plan->financialAiQuestion) && !is_null($plan->financialAiQuestion) && !isset($plan->intellectualAiQuestion) && is_null($plan->intellectualAiQuestion)) next @endif @if(isset($plan->intellectualAiQuestion) && !is_null($plan->intellectualAiQuestion)) completed @endif">
        <div class="step-counter num">6</div>
        <div class="step-counter check">
          <img src="{{asset('img/check.png')}}" alt="check">
        </div>
        <div class="step-counter bi_check">
          <img src="{{asset('img/bi_check.png')}}" alt="check">
        </div>
        <div class="step-name">
          Intellectual <br>
          Property
        </div>
      </div>
      <div class="stepper-item @if(isset($plan->intellectualAiQuestion) && !is_null($plan->intellectualAiQuestion) && !isset($plan->businessAiQuestion) && is_null($plan->businessAiQuestion)) next @endif @if(isset($plan->businessAiQuestion) && !is_null($plan->businessAiQuestion)) completed @endif">
        <div class="step-counter num">7</div>
        <div class="step-counter check">
          <img src="{{asset('img/check.png')}}" alt="check">
        </div>
        <div class="step-counter bi_check">
          <img src="{{asset('img/bi_check.png')}}" alt="check">
        </div>
        <div class="step-name">
          Business<br>
          Model
        </div>
      </div>
      <div class="stepper-item @if(isset($plan->businessAiQuestion) && !is_null($plan->businessAiQuestion) && !isset($plan->fundAiQuestion) && is_null($plan->fundAiQuestion)) next @endif @if(isset($plan->fundAiQuestion) && !is_null($plan->fundAiQuestion)) completed @endif">
        <div class="step-counter num">8</div>
        <div class="step-counter check">
          <img src="{{asset('img/check.png')}}" alt="check">
        </div>
        <div class="step-counter bi_check">
          <img src="{{asset('img/bi_check.png')}}" alt="check">
        </div>
        <div class="step-name">
          Use of <br>
          Funds
        </div>
      </div>
      <div class="stepper-item @if(isset($plan->fundAiQuestion) && !is_null($plan->fundAiQuestion) && !isset($plan->corporateAiQuestion) && is_null($plan->corporateAiQuestion)) next @endif @if(isset($plan->corporateAiQuestion) && !is_null($plan->corporateAiQuestion)) completed @endif">
        <div class="step-counter num">9</div>
        <div class="step-counter check">
          <img src="{{asset('img/check.png')}}" alt="check">
        </div>
        <div class="step-counter bi_check">
          <img src="{{asset('img/bi_check.png')}}" alt="check">
        </div>
        <div class="step-name">
          Corporate <br>
          Structure
        </div>
      </div>
      <div class="stepper-item ">
        <div class="step-counter num">10</div>
        <div class="step-counter check">
          <img src="{{asset('img/check.png')}}" alt="check">
        </div>
        <div class="step-counter bi_check">
          <img src="{{asset('img/bi_check.png')}}" alt="check">
        </div>
        <div class="step-name">
          Existing Financial <br>
          Round
        </div>
      </div>
    </div>
    {{-- step ends here --}}

    {{-- market question code starts here --}}

<div class="container form-container">
  <div class="row">
    <div class="overlay d-none">
      <div class="spinner-area">
        <span class="spinner"></span>
      </div>
      <div class="loading-area"></div>
    </div>
   
      <!-- progress steps start -->
    <div class="form_box @if(isset($plan->marketAiQuestion) && !is_null($plan->marketAiQuestion)) d-none @endif">
      <h2 class="form_box_title">Market</h2>
        <form class="form">
          <input type="hidden" class="questionType" name="questionType" value="market">
          <input type="hidden" class="questionCategory" name="questionCategory" value="1">

          @if($plan->marketAnswer->isNotEmpty())
        
            @foreach($plan->marketAnswer as $index => $answer)
    
            <div class="col-lg-12 colL question-section">
              <div class="mb-3">
                <label class="form-label form_box_label market-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$answer->question->id}}">{{$answer->question->question}}</span></label>
                <input type="text" class="form-control form_box_input" disabled value="{{$answer->answer}}">
              </div>
            </div>
    
            @endforeach
          @else
            @foreach($marketQuestion as $index => $question)
    
            <div class="col-lg-12 colL question-section">
              <div class="mb-3">
                <label class="form-label form_box_label market-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$question->id}}">{{$question->question}}</span></label>
                <input type="text" class="form-control form_box_input" value="">
              </div>
            </div>
    
            @endforeach
          @endif

          <div class="extra-question">
            @if($plan->marketAiQuestion)

            <div>
              <h3>Extra Generated Question</h3>
            </div>
              @php
                $aiQuestions = json_decode($plan->marketAiQuestion->question);
                $aiAnswer = json_decode($plan->marketAiQuestion->answer);
              @endphp

              @for($i=0; $i< sizeof($aiQuestions); $i++)

              <div class="col-lg-12 colL extra-question-section">
                  <div class="mb-3">
                    <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                    <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
                  </div>
              </div>

              @endfor
              
            @endif
            

          </div>

          {{-- <div class="extra-bonus-question">
            
            @if($plan->marketBonusQuestion)

            <div>
              <h3>Bonus Questions</h3>
            </div>
              @php
                $aiQuestions = json_decode($plan->marketBonusQuestion->question);
                $aiAnswer = json_decode($plan->marketBonusQuestion->answer);
              @endphp

              @for($i=0; $i< sizeof($aiQuestions); $i++)

              <div class="col-lg-12 colL extra-question-section">
                  <div class="mb-3">
                    <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                    <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
                  </div>
              </div>

              @endfor
              
            @endif

          </div> --}}

          <div class="form_bottom_links d-flex justify-content-between">
            <button type="button" class="btn btn-danger clear_form">Clear</button>
            <div class="d-flex">
              <a href="javascript:void(0)" id="market-step" class="btn btn-blue next-step">Next Step <i class="fas fa-spinner fa-spin d-none"></i></a>
            </div>
          </div>
      </form>



    </div>

    {{-- market code ends here --}}






    {{-- traction code ends here --}}
    <div class="form_box @if(( !isset($plan->marketAiQuestion) || is_null($plan->marketAiQuestion) ) || (isset($plan->tractionAiQuestion) && !is_null($plan->tractionAiQuestion))  ) d-none @endif">
      <h2 class="form_box_title">Traction</h2>
      <form class="form">
        <input type="hidden" class="questionType" name="questionType" value="traction">
        <input type="hidden" class="questionCategory" name="questionCategory" value="2">
        @if($plan->tractionAnswer->isNotEmpty())
        
        @foreach($plan->tractionAnswer as $index => $answer)

        <div class="col-lg-12 colL question-section">
          <div class="mb-3">
            <label class="form-label form_box_label market-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$answer->question->id}}">{{$answer->question->question}}</span></label>
            <input type="text" class="form-control form_box_input" disabled value="{{$answer->answer}}">
          </div>
        </div>

        @endforeach
      @else
        @foreach($tractionQuestion as $index => $question)

        <div class="col-lg-12 colL question-section">
          <div class="mb-3">
            <label class="form-label form_box_label traction-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$question->id}}">{{$question->question}}</span></label>
            <input type="text" class="form-control form_box_input" value="">
          </div>
        </div>

        @endforeach
      @endif
        <div class="extra-question">
          @if($plan->tractionAiQuestion)

          <div>
            <h3>Extra Generated Question</h3>
          </div>
            @php
              $aiQuestions = json_decode($plan->tractionAiQuestion->question);
              $aiAnswer = json_decode($plan->tractionAiQuestion->answer);
            @endphp

            @for($i=0; $i< sizeof($aiQuestions); $i++)

            <div class="col-lg-12 colL extra-question-section">
                <div class="mb-3">
                  <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                  <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
                </div>
            </div>

            @endfor
            
          @endif
        </div>

        {{-- <div class="extra-bonus-question">
          @if($plan->tractionBonusQuestion)

            <div>
              <h3>Bonus Questions</h3>
            </div>
              @php
                $aiQuestions = json_decode($plan->tractionBonusQuestion->question);
                $aiAnswer = json_decode($plan->tractionBonusQuestion->answer);
              @endphp

              @for($i=0; $i< sizeof($aiQuestions); $i++)

              <div class="col-lg-12 colL extra-question-section">
                  <div class="mb-3">
                    <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                    <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
                  </div>
              </div>

              @endfor
              
            @endif
        </div> --}}
        <div class="form_bottom_links d-flex justify-content-between">
          <button type="button" class="btn btn-danger clear_form">Clear</button>
          <div class="d-flex">
            <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
            <a href="javascript:void(0)" id="tration-step" class="btn btn-blue next-step">Next Step <i class="fas fa-spinner fa-spin d-none"></i></a>
          </div>
        </div>
    </form>
    </div>

    {{-- traction code ends here --}}

    {{-- Team code starts here --}}
    <div class="form_box @if(!isset($plan->tractionAiQuestion) || is_null($plan->tractionAiQuestion) || (isset($plan->teamAiQuestion) && !is_null($plan->teamAiQuestion))) d-none @endif">
     <h2 class="form_box_title">Team</h2>
     <form class="form">
      <input type="hidden" class="questionType" name="questionType" value="team">
      <input type="hidden" class="questionCategory" name="questionCategory" value="3">
      @if($plan->teamAnswer->isNotEmpty())
        
        @foreach($plan->teamAnswer as $index => $answer)

        <div class="col-lg-12 colL question-section">
          <div class="mb-3">
            <label class="form-label form_box_label market-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$answer->question->id}}">{{$answer->question->question}}</span></label>
            <input type="text" class="form-control form_box_input" disabled value="{{$answer->answer}}">
          </div>
        </div>

        @endforeach
      @else
      @foreach($teamQuestion as $index => $question)

      <div class="col-lg-12 colL question-section">
        <div class="mb-3">
          <label class="form-label form_box_label team-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$question->id}}">{{$question->question}}</span></label>
          <input type="text" class="form-control form_box_input" value="">
        </div>
      </div>

      @endforeach
      @endif


      <div class="extra-question">
        @if($plan->teamAiQuestion)

        <div>
          <h3>Extra Generated Question</h3>
        </div>
          @php
            $aiQuestions = json_decode($plan->teamAiQuestion->question);
            $aiAnswer = json_decode($plan->teamAiQuestion->answer);
          @endphp

          @for($i=0; $i< sizeof($aiQuestions); $i++)

          <div class="col-lg-12 colL extra-question-section">
              <div class="mb-3">
                <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
              </div>
          </div>

          @endfor
          
        @endif
      </div>

      {{-- <div class="extra-bonus-question">
        @if($plan->teamBonusQuestion)

        <div>
          <h3>Bonus Questions</h3>
        </div>
          @php
            $aiQuestions = json_decode($plan->teamBonusQuestion->question);
            $aiAnswer = json_decode($plan->teamBonusQuestion->answer);
          @endphp

          @for($i=0; $i< sizeof($aiQuestions); $i++)

          <div class="col-lg-12 colL extra-question-section">
              <div class="mb-3">
                <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
              </div>
          </div>

          @endfor
          
        @endif
      </div> --}}
      <div class="form_bottom_links d-flex justify-content-between">
        <button type="button" class="btn btn-danger clear_form">Clear</button>
        <div class="d-flex">
          <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
          <a href="javascript:void(0)" id="market-step" class="btn btn-blue next-step">Next Step <i class="fas fa-spinner fa-spin d-none"></i></a>
        </div>
      </div>
  </form>
    </div>
    

    {{-- Team code ends here --}}

    
    {{-- Competition code starts here --}}

    <div class="form_box @if( (!isset($plan->teamAiQuestion) || is_null($plan->teamAiQuestion)) || (isset($plan->competitionAiQuestion) && !is_null($plan->competitionAiQuestion))) d-none @endif">
     <h2 class="form_box_title">Competition</h2>
     <form class="form">
      <input type="hidden" class="questionType" name="questionType" value="competition">
      <input type="hidden" class="questionCategory" name="questionCategory" value="4">
      @if($plan->competitionAnswer->isNotEmpty())
        
        @foreach($plan->competitionAnswer as $index => $answer)

        <div class="col-lg-12 colL question-section">
          <div class="mb-3">
            <label class="form-label form_box_label market-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$answer->question->id}}">{{$answer->question->question}}</span></label>
            <input type="text" class="form-control form_box_input" disabled value="{{$answer->answer}}">
          </div>
        </div>

        @endforeach
      @else
      @foreach($competitionQuestion as $index => $question)

      <div class="col-lg-12 colL question-section">
        <div class="mb-3">
          <label class="form-label form_box_label competition-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$question->id}}">{{$question->question}}</span></label>
          <input type="text" class="form-control form_box_input" value="">
        </div>
      </div>

      @endforeach
      @endif
      <div class="extra-question">
        @if($plan->competitionAiQuestion)

        <div>
          <h3>Extra Generated Question</h3>
        </div>
          @php
            $aiQuestions = json_decode($plan->competitionAiQuestion->question);
            $aiAnswer = json_decode($plan->competitionAiQuestion->answer);
          @endphp

          @for($i=0; $i< sizeof($aiQuestions); $i++)

          <div class="col-lg-12 colL extra-question-section">
              <div class="mb-3">
                <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
              </div>
          </div>

          @endfor
          
        @endif
      </div>

      {{-- <div class="extra-bonus-question">
        @if($plan->competitionBonusQuestion)

        <div>
          <h3>Bonus Questions</h3>
        </div>
          @php
            $aiQuestions = json_decode($plan->competitionBonusQuestion->question);
            $aiAnswer = json_decode($plan->competitionBonusQuestion->answer);
          @endphp

          @for($i=0; $i< sizeof($aiQuestions); $i++)

          <div class="col-lg-12 colL extra-question-section">
              <div class="mb-3">
                <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
              </div>
          </div>

          @endfor
          
        @endif
      </div> --}}
      <div class="form_bottom_links d-flex justify-content-between">
        <button type="button" class="btn btn-danger clear_form">Clear</button>
        <div class="d-flex">
          <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
          <a href="javascript:void(0)" id="market-step" class="btn btn-blue next-step">Next Step <i class="fas fa-spinner fa-spin d-none"></i></a>
        </div>
      </div>
  </form>
    </div>

    {{-- Competition code ends here --}}


    {{-- Financial code starts here --}}
    <div class="form_box @if(!isset($plan->competitionAiQuestion) || is_null($plan->competitionAiQuestion) || (isset($plan->financialAiQuestion) && !is_null($plan->financialAiQuestion)) ) d-none @endif">
     <h2 class="form_box_title">Financials</h2>
     <form class="form">
      <input type="hidden" class="questionType" name="questionType" value="financial">
      <input type="hidden" class="questionCategory" name="questionCategory" value="5">
      @if($plan->financialAnswer->isNotEmpty())
        
        @foreach($plan->financialAnswer as $index => $answer)

        <div class="col-lg-12 colL question-section">
          <div class="mb-3">
            <label class="form-label form_box_label market-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$answer->question->id}}">{{$answer->question->question}}</span></label>
            <input type="text" class="form-control form_box_input" disabled value="{{$answer->answer}}">
          </div>
        </div>

        @endforeach
      @else
      @foreach($financialQuestion as $index => $question)

      <div class="col-lg-12 colL question-section">
        <div class="mb-3">
          <label class="form-label form_box_label financial-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$question->id}}">{{$question->question}}</span></label>
          <input type="text" class="form-control form_box_input" value="">
        </div>
      </div>

      @endforeach
      @endif
      <div class="extra-question">
        @if($plan->financialAiQuestion)

        <div>
          <h3>Extra Generated Question</h3>
        </div>
          @php
            $aiQuestions = json_decode($plan->financialAiQuestion->question);
            $aiAnswer = json_decode($plan->financialAiQuestion->answer);
          @endphp

          @for($i=0; $i< sizeof($aiQuestions); $i++)

          <div class="col-lg-12 colL extra-question-section">
              <div class="mb-3">
                <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
              </div>
          </div>

          @endfor
          
        @endif
      </div>

      {{-- <div class="extra-bonus-question">
        @if($plan->financialBonusQuestion)

        <div>
          <h3>Bonus Questions</h3>
        </div>
          @php
            $aiQuestions = json_decode($plan->financialBonusQuestion->question);
            $aiAnswer = json_decode($plan->financialBonusQuestion->answer);
          @endphp

          @for($i=0; $i< sizeof($aiQuestions); $i++)

          <div class="col-lg-12 colL extra-question-section">
              <div class="mb-3">
                <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
              </div>
          </div>

          @endfor
          
        @endif
      </div> --}}
      <div class="form_bottom_links d-flex justify-content-between">
        <button type="button" class="btn btn-danger clear_form">Clear</button>
        <div class="d-flex">
          <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
          <a href="javascript:void(0)" id="market-step" class="btn btn-blue next-step">Next Step <i class="fas fa-spinner fa-spin d-none"></i></a>
        </div>
      </div>
  </form>
    </div>

    {{-- Financial code ends here --}}


    {{-- Intellectual Property code starts here --}}

    <div class="form_box @if((!isset($plan->financialAiQuestion) || is_null($plan->financialAiQuestion)) || (isset($plan->intellectualAiQuestion) && !is_null($plan->intellectualAiQuestion))) d-none @endif">
     <h2 class="form_box_title">Intellectual Property</h2>
     <form class="form">
      <input type="hidden" class="questionType" name="questionType" value="intellectual-property">
      <input type="hidden" class="questionCategory" name="questionCategory" value="6">
      @if($plan->intellectualAnswer->isNotEmpty())
        
        @foreach($plan->intellectualAnswer as $index => $answer)

        <div class="col-lg-12 colL question-section">
          <div class="mb-3">
            <label class="form-label form_box_label market-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$answer->question->id}}">{{$answer->question->question}}</span></label>
            <input type="text" class="form-control form_box_input" disabled value="{{$answer->answer}}">
          </div>
        </div>

        @endforeach
      @else
      @foreach($intellectualQuestion as $index => $question)

      <div class="col-lg-12 colL question-section">
        <div class="mb-3">
          <label class="form-label form_box_label intellectual-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$question->id}}">{{$question->question}}</span></label>
          <input type="text" class="form-control form_box_input" value="">
        </div>
      </div>

      @endforeach
      @endif
      <div class="extra-question">
        @if($plan->intellectualAiQuestion)

        <div>
          <h3>Extra Generated Question</h3>
        </div>
          @php
            $aiQuestions = json_decode($plan->intellectualAiQuestion->question);
            $aiAnswer = json_decode($plan->intellectualAiQuestion->answer);
          @endphp

          @for($i=0; $i< sizeof($aiQuestions); $i++)

          <div class="col-lg-12 colL extra-question-section">
              <div class="mb-3">
                <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
              </div>
          </div>

          @endfor
          
        @endif
      </div>

      {{-- <div class="extra-bonus-question">
        @if($plan->intellectualBonusQuestion)

        <div>
          <h3>Bonus Questions</h3>
        </div>
          @php
            $aiQuestions = json_decode($plan->intellectualBonusQuestion->question);
            $aiAnswer = json_decode($plan->intellectualBonusQuestion->answer);
          @endphp

          @for($i=0; $i< sizeof($aiQuestions); $i++)

          <div class="col-lg-12 colL extra-question-section">
              <div class="mb-3">
                <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
              </div>
          </div>

          @endfor
          
        @endif
      </div> --}}
      <div class="form_bottom_links d-flex justify-content-between">
        <button type="button" class="btn btn-danger clear_form">Clear</button>
        <div class="d-flex">
          <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
          <a href="javascript:void(0)" id="market-step" class="btn btn-blue next-step">Next Step <i class="fas fa-spinner fa-spin d-none"></i></a>
        </div>
      </div>
  </form>
    </div>

    {{-- Intellectual Property code ends here --}}


    
{{-- Business Model code starts here --}}
<div class="form_box @if((!isset($plan->intellectualAiQuestion) || is_null($plan->intellectualAiQuestion)) || (isset($plan->businessAiQuestion) && !is_null($plan->businessAiQuestion))) d-none @endif">
     <h2 class="form_box_title">Business Model</h2>
     <form class="form">
      <input type="hidden" class="questionType" name="questionType" value="business-model">
      <input type="hidden" class="questionCategory" name="questionCategory" value="8">
      @if($plan->businessAnswer->isNotEmpty())
        
        @foreach($plan->businessAnswer as $index => $answer)

        <div class="col-lg-12 colL question-section">
          <div class="mb-3">
            <label class="form-label form_box_label market-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$answer->question->id}}">{{$answer->question->question}}</span></label>
            <input type="text" class="form-control form_box_input" disabled value="{{$answer->answer}}">
          </div>
        </div>

        @endforeach
      @else
      @foreach($businessQuestion as $index => $question)

      <div class="col-lg-12 colL question-section">
        <div class="mb-3">
          <label class="form-label form_box_label business-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$question->id}}">{{$question->question}}</span></label>
          <input type="text" class="form-control form_box_input" value="">
        </div>
      </div>

      @endforeach
      @endif
      <div class="extra-question">
        @if($plan->businessAiQuestion)

        <div>
          <h3>Extra Generated Question</h3>
        </div>
          @php
            $aiQuestions = json_decode($plan->businessAiQuestion->question);
            $aiAnswer = json_decode($plan->businessAiQuestion->answer);
          @endphp

          @for($i=0; $i< sizeof($aiQuestions); $i++)

          <div class="col-lg-12 colL extra-question-section">
              <div class="mb-3">
                <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
              </div>
          </div>

          @endfor
          
        @endif
      </div>

      {{-- <div class="extra-bonus-question">
        @if($plan->businessBonusQuestion)

        <div>
          <h3>Bonus Questions</h3>
        </div>
          @php
            $aiQuestions = json_decode($plan->businessBonusQuestion->question);
            $aiAnswer = json_decode($plan->businessBonusQuestion->answer);
          @endphp

          @for($i=0; $i< sizeof($aiQuestions); $i++)

          <div class="col-lg-12 colL extra-question-section">
              <div class="mb-3">
                <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
              </div>
          </div>

          @endfor
          
        @endif
      </div> --}}
      <div class="form_bottom_links d-flex justify-content-between">
        <button type="button" class="btn btn-danger clear_form">Clear</button>
        <div class="d-flex">
          <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
          <a href="javascript:void(0)" id="market-step" class="btn btn-blue next-step">Next Step <i class="fas fa-spinner fa-spin d-none"></i></a>
        </div>
      </div>
  </form>
    </div>
{{-- Business Model code ends here --}}
    

    {{-- Use of funds code starts here --}}
    <div class="form_box @if((!isset($plan->businessAiQuestion) || is_null($plan->businessAiQuestion)) || (isset($plan->fundAiQuestion) && !is_null($plan->fundAiQuestion)) ) d-none @endif">
     <h2 class="form_box_title">Use of Funds</h2>
     <form class="form">
      <input type="hidden" class="questionType" name="questionType" value="fund">
      <input type="hidden" class="questionCategory" name="questionCategory" value="7">
      @if($plan->fundAnswer->isNotEmpty())
        
        @foreach($plan->fundAnswer as $index => $answer)

        <div class="col-lg-12 colL question-section">
          <div class="mb-3">
            <label class="form-label form_box_label market-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$answer->question->id}}">{{$answer->question->question}}</span></label>
            <input type="text" class="form-control form_box_input" disabled value="{{$answer->answer}}">
          </div>
        </div>

        @endforeach
      @else
      @foreach($fundQuestion as $index => $question)

      <div class="col-lg-12 colL question-section">
        <div class="mb-3">
          <label class="form-label form_box_label intellectual-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$question->id}}">{{$question->question}}</span></label>
          <input type="text" class="form-control form_box_input" value="">
        </div>
      </div>

      @endforeach
      @endif
      <div class="extra-question">
        @if($plan->fundAiQuestion)

        <div>
          <h3>Extra Generated Question</h3>
        </div>
          @php
            $aiQuestions = json_decode($plan->fundAiQuestion->question);
            $aiAnswer = json_decode($plan->fundAiQuestion->answer);
          @endphp

          @for($i=0; $i< sizeof($aiQuestions); $i++)

          <div class="col-lg-12 colL extra-question-section">
              <div class="mb-3">
                <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
              </div>
          </div>

          @endfor
          
        @endif
      </div>

      {{-- <div class="extra-bonus-question">
        @if($plan->fundBonusQuestion)

        <div>
          <h3>Bonus Questions</h3>
        </div>
          @php
            $aiQuestions = json_decode($plan->fundBonusQuestion->question);
            $aiAnswer = json_decode($plan->fundBonusQuestion->answer);
          @endphp

          @for($i=0; $i< sizeof($aiQuestions); $i++)

          <div class="col-lg-12 colL extra-question-section">
              <div class="mb-3">
                <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
              </div>
          </div>

          @endfor
          
        @endif
      </div> --}}
      <div class="form_bottom_links d-flex justify-content-between">
        <button type="button" class="btn btn-danger clear_form">Clear</button>
        <div class="d-flex">
          <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
          <a href="javascript:void(0)" id="market-step" class="btn btn-blue next-step">Next Step <i class="fas fa-spinner fa-spin d-none"></i></a>
        </div>
      </div>
  </form>
    </div>
    
    {{-- Use of funds code ends here --}}

    
    {{-- Corporate structure starts here --}}
    <div class="form_box @if((!isset($plan->fundAiQuestion) || is_null($plan->fundAiQuestion)) || (isset($plan->corporateAiQuestion) && !is_null($plan->corporateAiQuestion)) ) d-none @endif">
      <h2 class="form_box_title">Corporate Structure</h2>
      <form class="form">
        <input type="hidden" class="questionType" name="questionType" value="corporate-structure">
        <input type="hidden" class="questionCategory" name="questionCategory" value="9">
        @if($plan->corporateAnswer->isNotEmpty())
        
        @foreach($plan->corporateAnswer as $index => $answer)

        <div class="col-lg-12 colL question-section">
          <div class="mb-3">
            <label class="form-label form_box_label market-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$answer->question->id}}">{{$answer->question->question}}</span></label>
            <input type="text" class="form-control form_box_input" disabled value="{{$answer->answer}}">
          </div>
        </div>

        @endforeach
      @else
        @foreach($corporateQuestion as $index => $question)

        <div class="col-lg-12 colL question-section">
          <div class="mb-3">
            <label class="form-label form_box_label corporate-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$question->id}}">{{$question->question}}</span></label>
            <input type="text" class="form-control form_box_input" value="">
          </div>
        </div>

        @endforeach
      @endif
        <div class="extra-question">
          @if($plan->corporateAiQuestion)

          <div>
            <h3>Extra Generated Question</h3>
          </div>
            @php
              $aiQuestions = json_decode($plan->corporateAiQuestion->question);
              $aiAnswer = json_decode($plan->corporateAiQuestion->answer);
            @endphp

          @for($i=0; $i< sizeof($aiQuestions); $i++)

          <div class="col-lg-12 colL extra-question-section">
              <div class="mb-3">
                <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
              </div>
          </div>

          @endfor
          
        @endif

        </div>

        {{-- <div class="extra-bonus-question">
          @if($plan->corporateBonusQuestion)

          <div>
            <h3>Bonus Questions</h3>
          </div>
            @php
              $aiQuestions = json_decode($plan->corporateBonusQuestion->question);
              $aiAnswer = json_decode($plan->corporateBonusQuestion->answer);
            @endphp

            @for($i=0; $i< sizeof($aiQuestions); $i++)

            <div class="col-lg-12 colL extra-question-section">
                <div class="mb-3">
                  <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                  <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
                </div>
            </div>

            @endfor
            
          @endif
        </div> --}}
        <div class="form_bottom_links d-flex justify-content-between">
          <button type="button" class="btn btn-danger clear_form">Clear</button>
          <div class="d-flex">
            <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
            <a href="javascript:void(0)" id="market-step" class="btn btn-blue next-step">Next Step <i class="fas fa-spinner fa-spin d-none"></i></a>
          </div>
        </div>
    </form>
    </div>
    
    {{-- Corporate structure ends here --}}
    









    
    {{-- Existing Financial Round Starts here --}}

    <div class="form_box @if(!isset($plan->corporateAiQuestion) || is_null($plan->corporateAiQuestion)) d-none @endif">
      <h2 class="form_box_title">Existing Financial Round</h2>
      <form class="form">
        <input type="hidden" class="questionType" name="questionType" value="existing-financial">
        <input type="hidden" class="questionCategory" name="questionCategory" value="10">
        @if($plan->investmentAnswer->isNotEmpty())
        
        @foreach($plan->investmentAnswer as $index => $answer)

        <div class="col-lg-12 colL question-section">
          <div class="mb-3">
            <label class="form-label form_box_label market-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$answer->question->id}}">{{$answer->question->question}}</span></label>
            <input type="text" class="form-control form_box_input" disabled value="{{$answer->answer}}">
          </div>
        </div>

        @endforeach
      @else
        @foreach($investmentQuestion as $index => $question)

        <div class="col-lg-12 colL question-section">
          <div class="mb-3">
            <label class="form-label form_box_label financial-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$question->id}}">{{$question->question}}</span></label>
            <input type="text" class="form-control form_box_input" value="">
          </div>
        </div>

        @endforeach
      @endif
        <div class="extra-question">
          @if($plan->investmentAiQuestion)

          <div>
            <h3>Extra Generated Question</h3>
          </div>
            @php
              $aiQuestions = json_decode($plan->investmentAiQuestion->question);
              $aiAnswer = json_decode($plan->investmentAiQuestion->answer);
            @endphp
  
            @for($i=0; $i< sizeof($aiQuestions); $i++)
  
            <div class="col-lg-12 colL extra-question-section">
                <div class="mb-3">
                  <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                  <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
                </div>
            </div>
  
            @endfor
            
          @endif
        </div>

        {{-- <div class="extra-bonus-question">
          @if($plan->investmentBonusQuestion)

          <div>
            <h3>Bonus Questions</h3>
          </div>
            @php
              $aiQuestions = json_decode($plan->investmentBonusQuestion->question);
              $aiAnswer = json_decode($plan->investmentBonusQuestion->answer);
            @endphp

            @for($i=0; $i< sizeof($aiQuestions); $i++)

            <div class="col-lg-12 colL extra-question-section">
                <div class="mb-3">
                  <label class="form-label form_box_label market-question"><span class="extra-question-list">{{$aiQuestions[$i]}}</span></label>
                  <input type="text" class="form-control form_box_input" disabled value="{{$aiAnswer[$i]}}">
                </div>
            </div>

            @endfor
            
          @endif
        </div> --}}
        <div class="form_bottom_links d-flex justify-content-between">
          <button type="button" class="btn btn-danger clear_form">Clear</button>
          <div class="d-flex">
            <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
            <a href="javascript:void(0)" id="market-step" class="btn btn-blue next-step">Done <i class="fas fa-spinner fa-spin d-none"></i></a>
          </div>
        </div>
    </form>
    </div>

    {{-- Existing Financial Round ends here --}}

  </div>
</div>

  </div>

 <!-- progress steps end -->
<script>



// Question form starts here




window.onload = function(){
  let previousBtn = document.querySelectorAll(".previous-step");
  let nextBtn = document.querySelectorAll(".next-step");
  let form    = document.querySelectorAll(".form_box");
  let stepper = document.querySelectorAll(".stepper-item");
  let stepperCount = document.querySelectorAll(".step-counter");

  for(let i=0; i<previousBtn.length; i++)
  {
    previousBtn[i].addEventListener('click' , function(e){
      setPreviousStep(i);
      form[i+1].classList.add("d-none");
      form[i].classList.remove("d-none");
      window.scroll(0,0);
      $(form[i]).fadeOut();
      $(form[i]).fadeIn();
    });
  }

  for(let i=0; i<nextBtn.length; i++)
  {
    nextBtn[i].addEventListener('click' , function(e){
      // nextBtnId = this.id;
      //new code starts here
      let check = [null , "" , undefined , false];
      let element = e.target;
      let currentForm = element.closest(".form");
      currentForm.querySelector(".fa-spinner").classList.remove("d-none");
      console.log(currentForm.querySelector(".fa-spinner"));
      if(check.includes(currentForm.querySelector(".extra-question").innerHTML.trim()))
      {
        generateAiQuestion(element , currentForm)
      }else{
        let check = [undefined , false , null , ""];
        let extraQuestion = currentForm.querySelectorAll(".extra-question-section");
        let aiQuestion = [];
        let checkAnswer = false;
        extraQuestion.forEach(section => {
        let question = section.querySelector(".extra-question-list").innerText;
        let answer = section.querySelector("input").value;
        if(check.includes(answer.trim()))
        {
          checkAnswer = true;
        }else{
          let currentQuestion = {
            question: question,
            answer: answer
          };
          aiQuestion.push(currentQuestion);
        }

      });


      if(checkAnswer) { 
        toastr.error("Please Add All Answer");
        return;
      }

      let currentCategory = currentForm.querySelector(".questionCategory").value;
      let planId = document.getElementById("planId").value;

      $.ajax({
      url: "{{route('store.ai.question')}}",
     
      type: "POST",
      data: {
        _token: "{{csrf_token()}}",
        aiQuestion: aiQuestion,
        planId: planId,
        category: currentCategory
      },
      success: function (res) {
        if (res.success == true) {
          element.querySelector(".fa-spinner").classList.add("d-none");
            if(i < (form.length-1))
            {
              setNextStep(i);
              form[i].classList.add("d-none");
              form[i + 1].classList.remove("d-none");
              window.scroll(0, 0);
              $(form[i + 1]).fadeOut();
              $(form[i + 1]).fadeIn();
            }else {
              window.location.href = "{{url('plan-conclusion',$planId)}}";
            }
        }else{
          element.querySelector(".fa-spinner").classList.add("d-none");
                        toastr.error(response);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        reject(errorThrown);
      }
    });



        // saveAiQuestion(element, currentForm , aiQuestion)
        //             .then(response => {
        //               if (response) {
        //                 element.querySelector(".fa-spinner").classList.add("d-none");
        //                 if(i < (form.length-1))
        //                 {
        //                   setNextStep(i);
        //                   form[i].classList.add("d-none");
        //                   form[i + 1].classList.remove("d-none");
        //                   window.scroll(0, 0);
        //                   $(form[i + 1]).fadeOut();
        //                   $(form[i + 1]).fadeIn();
        //                 }else {
        //                   window.location.href = "{{url('plan-conclusion',$planId)}}";
        //                 }

        //               } else {
        //                 element.querySelector(".fa-spinner").classList.add("d-none");
        //                 toastr.error(response);
        //               }
        //             })
        //             .catch(error => {
        //               toastr.error(error);
        //             });
      }

    });
  }


  function saveAiQuestion(element, currentForm , aiQuestion) {
  return new Promise((resolve, reject) => {
    
    let currentCategory = currentForm.querySelector(".questionCategory").value;
    let planId = document.getElementById("planId").value;

    $.ajax({
      url: "{{route('store.ai.question')}}",
      async: false,
      type: "POST",
      data: {
        _token: "{{csrf_token()}}",
        aiQuestion: aiQuestion,
        planId: planId,
        category: currentCategory
      },
      success: function (res) {
        if (res.success == true) {
          resolve(true);
        } else {
          reject(res.msg);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        reject(errorThrown);
      }
    });
  });
}



  function setPreviousStep(i)
  {
     stepper[i].classList.remove("completed");
     stepper[i+1].classList.remove("next");
     if( i != 0) stepper[i].classList.add("next");
  }



  function setNextStep(i)
  {
     stepper[i].classList.add("completed");
     stepper[i].classList.remove("next");
     stepper[i+1].classList.add("next");
  }





  function add_Information(info , url)
  {
    let token = document.getElementById("token").value;
    let planId = document.getElementById("planId").value;
    $.ajax({
      type : "POST",
      url : url,
      async : false,
      data : {
        _token : token , ...info , planId : planId
      },
      success:function(res){
        console.log(res.success == true)
        if(res.success)
        {
          toastr.success(res.msg);
        }
        else{
          toastr.error(res.msg);
        }
        
      },
      error: function(){
        toastr.error("something went wrong")
      }

    })
  }

  function add_market_plan()
  {
    let marketOpportunity = document.getElementById("market_opportunity").value;
    let marketShare = document.getElementById("market_share").value;
    let bestCustomer = document.getElementById("best_customer").value;
    let timeTaken = document.getElementById("time_taken").value;
    let figures = document.getElementById("figures").value;
    let prStrategy = document.getElementById("pr_strategy").value;
    let aspire = document.getElementById("aspire").value;
    let leastLike = document.getElementById("least_like").value;
    let rightTime = document.getElementById("right_time").value;
    let marketStrategy = document.getElementById("market_strategy").value;
  
  
    let data = {
      marketOpportunity  : marketOpportunity ,
       marketShare  : marketShare, 
       bestCustomer  :bestCustomer, 
       timeTaken  : timeTaken , 
       figures  : figures, 
       prStrategy  : prStrategy, 
       aspire  : aspire, 
       leastLike  : leastLike, 
       rightTime : rightTime, 
       marketStrategy : marketStrategy
    };
  
    let url = "{{route('market.add_market')}}";
      add_Information(data , url);
    }


    function add_traction_plan()
    {
      let feedback = document.getElementById("feedback").value;
      let changes = document.getElementById("changes").value;
      let actualUser = document.getElementById("actual_user").value;
      let averageStay = document.getElementById("average_stay").value;
      let actualSales = document.getElementById("actual_sales").value;
      let annualGrowth = document.getElementById("annual_growth").value;
      let growthRate = document.getElementById("growth_rate").value;
      let growthLinearConsistent = document.getElementById("growth_linear_consistent").value;
      let heldBack = document.getElementById("held_back").value;
      let demonstration = document.getElementById("demonstration").value;

        let data = {
          feedback  : feedback ,
          changes  : changes, 
          actualUser  :actualUser, 
          averageStay  : averageStay , 
          actualSales  : actualSales, 
          annualGrowth  : annualGrowth, 
          growthRate  : growthRate, 
          growthLinearConsistent  : growthLinearConsistent, 
          heldBack : heldBack, 
          demonstration : demonstration
      };
    
      let url = "{{route('traction.add_traction')}}";
        add_Information(data , url);


    }

    function add_team_plan()
    {
      let headquarter = document.getElementById("headquarter").value;
      let founders = document.getElementById("founders").value;
      let teamMembers = document.getElementById("team_members").value;
      let boardMembers = document.getElementById("board_members").value;
      let roles = document.getElementById("roles").value;
      let experience = document.getElementById("experience").value;
      let rightPerson = document.getElementById("right_person").value;
      let motivation = document.getElementById("motivation").value;
      let founder = document.getElementById("founder").value;
      let responsibleIdea = document.getElementById("responsible_idea").value;

      let data = {
        headquarter  : headquarter ,
        founders  : founders, 
        teamMembers  :teamMembers, 
        boardMembers  : boardMembers , 
        roles  : roles, 
        experience  : experience, 
        rightPerson  : rightPerson, 
        motivation  : motivation, 
        founder : founder, 
        responsibleIdea : responsibleIdea
      };
    
      let url = "{{route('team.add_team')}}";
        add_Information(data , url);
    }

    function add_competition_plan()
    {
      let competitors = document.getElementById("competitors").value;
      let advantages = document.getElementById("advantages").value;
      let disadvantages = document.getElementById("disadvantages").value;
      let barriers = document.getElementById("barriers").value;
      let lettingDown = document.getElementById("letting_down").value;
      let competitorsNotDone = document.getElementById("competitors_not_done").value;
      let differFeature = document.getElementById("differ_feature").value;
      let comparePrice = document.getElementById("compare_price").value;
      let compareService = document.getElementById("compare_service").value;
      let customerSatisfaction = document.getElementById("customer_satisfaction").value;

      let data = {
        competitors  : competitors ,
        advantages  : advantages, 
        disadvantages  :disadvantages, 
        barriers  : barriers , 
        lettingDown  : lettingDown, 
        competitorsNotDone  : competitorsNotDone, 
        differFeature  : differFeature, 
        comparePrice  : comparePrice, 
        compareService : compareService, 
        customerSatisfaction : customerSatisfaction
      };
    
      let url = "{{route('competition.add_competition')}}";
        add_Information(data , url);
    }

    function add_financial_plan()
    {
      let productMarketing = document.getElementById("product_marketing").value;
      let marketingBudget = document.getElementById("marketing_budget").value;
      let acquisitionCost = document.getElementById("acquisition_cost").value;
      let lifetimeValue = document.getElementById("lifetime_value").value;
      let equityDebt = document.getElementById("equity_debt").value;
      let fundraising = document.getElementById("fundraising").value;
      let burnRate = document.getElementById("burn_rate").value;
      let timePeriod = document.getElementById("time_period").value;
      let metricsKey = document.getElementById("metrics_key").value;
      let stockOptions = document.getElementById("stock_options").value;

      let data = {
        productMarketing  : productMarketing ,
        marketingBudget  : marketingBudget, 
        acquisitionCost  :acquisitionCost, 
        lifetimeValue  : lifetimeValue , 
        equityDebt  : equityDebt, 
        fundraising  : fundraising, 
        burnRate  : burnRate, 
        timePeriod : timePeriod, 
        metricsKey  : metricsKey, 
        stockOptions : stockOptions
      };
    
      let url = "{{route('financial.add_financial')}}";
        add_Information(data , url);

    }


    function add_intellectual_property_plan()
    {
      let uniqueCompany = document.getElementById("unique_company").value;
      let problemSolve = document.getElementById("problem_solve").value;
      let legalRisk = document.getElementById("legal_risk").value;
      let productLiability = document.getElementById("product_liability").value;
      let regulatoryRisk = document.getElementById("regulatory_risk").value;
      let intellectualProperty = document.getElementById("intellectual_property").value;
      let developedIntellectualProperty = document.getElementById("developed_intellectual_property").value;
      let personLeft = document.getElementById("person_left").value;
      let additionalPartner = document.getElementById("additional_partner").value;
      let currentIntellectualAssets = document.getElementById("current_intellectual_assets").value;

      let data = {
        uniqueCompany  : uniqueCompany ,
        problemSolve  : problemSolve, 
        legalRisk  :legalRisk, 
        productLiability  : productLiability , 
        regulatoryRisk  : regulatoryRisk, 
        intellectualProperty  : intellectualProperty, 
        developedIntellectualProperty  : developedIntellectualProperty, 
        personLeft : personLeft, 
        additionalPartner  : additionalPartner, 
        currentIntellectualAssets : currentIntellectualAssets
      };
    
      let url = "{{route('intellectual_property.add_intellectual_property')}}";
        add_Information(data , url);


    }

    function add_business_model_plan()
    {
      let specificChannels = document.getElementById("specific_channels").value;
      let marketingChannels = document.getElementById("marketing_channels").value;
      let planB = document.getElementById("plan_b").value;
      let profitMargin = document.getElementById("profit_margin").value;
      let scallingImpact = document.getElementById("scalling_impact").value;
      let pivots = document.getElementById("pivots").value;
      let customerStory = document.getElementById("customer_story").value;
      let replaceable = document.getElementById("replaceable").value;
      let uniqueFeature = document.getElementById("unique_feature").value;
      let revenueStream = document.getElementById("revenue_stream").value;

      let data = {
        specificChannels  : specificChannels ,
        marketingChannels  : marketingChannels, 
        planB  :planB, 
        profitMargin  : profitMargin , 
        scallingImpact  : scallingImpact, 
        pivots  : pivots, 
        customerStory  : customerStory, 
        replaceable : replaceable, 
        uniqueFeature  : uniqueFeature, 
        revenueStream : revenueStream
      };
    
      let url = "{{route('business_model.add_business_model')}}";
        add_Information(data , url);


    }


    function add_funds_plan()
    {
      let fundsAllocated = document.getElementById("funds_allocated").value;
      let spent = document.getElementById("spent").value;
      let expansion = document.getElementById("expansion").value;
      let notRecievedMoney = document.getElementById("not_recieved_money").value;
      let assetInvested = document.getElementById("asset_invested").value;
      let milestones = document.getElementById("milestones").value;
      let biggestRisks = document.getElementById("biggest_risks").value;
      let raisingCapitals = document.getElementById("raising_capitals").value;
      let fundraisingEfforts = document.getElementById("fundraising_efforts").value;
      let personalExpenses = document.getElementById("personal_expenses").value;

      let data = {
        fundsAllocated  : fundsAllocated ,
        spent  : spent, 
        expansion  :expansion, 
        notRecievedMoney  : notRecievedMoney , 
        assetInvested  : assetInvested, 
        milestones  : milestones, 
        biggestRisks  : biggestRisks, 
        raisingCapitals : raisingCapitals, 
        fundraisingEfforts  : fundraisingEfforts, 
        personalExpenses : personalExpenses
      };
    
      let url = "{{route('funds.add_funds')}}";
        add_Information(data , url);


    }

    function add_corporate_structure_plan()
    {
      let organizedCompany = document.getElementById("organized_company").value;
      let holdTitles = document.getElementById("hold_titles").value;
      let splitShares = document.getElementById("split_shares").value;
      let existingBoard = document.getElementById("existing_board").value;
      let registeredCompany = document.getElementById("registered_company").value;
      let accountHandling = document.getElementById("account_handling").value;
      let talentSkills = document.getElementById("talent_skills").value;
      let selectedFounder = document.getElementById("selected_founder").value;
      let employeeSelector = document.getElementById("employee_selector").value;
      let registeredAgent = document.getElementById("registered_agent").value;

      let data = {
        organizedCompany  : organizedCompany ,
        holdTitles  : holdTitles, 
        splitShares  :splitShares, 
        existingBoard  : existingBoard , 
        registeredCompany  : registeredCompany, 
        accountHandling  : accountHandling, 
        talentSkills  : talentSkills, 
        selectedFounder : selectedFounder, 
        employeeSelector  : employeeSelector, 
        registeredAgent : registeredAgent
      };
    
      let url = "{{route('corporate_structure.add_corporate_structure')}}";
        add_Information(data , url);
    }

    function add_existing_financial_plan()
    {
      let exitGoal = document.getElementById("exit_goal").value;
      let expectedTimeFrame = document.getElementById("expected_time_frame").value;
      let helpExit = document.getElementById("help_exit").value;
      let followUpRound = document.getElementById("follow_up_round").value;
      let valuation = document.getElementById("valuation").value;
      let currentValuation = document.getElementById("current_valuation").value;
      let currentRaisings = document.getElementById("current_raisings").value;
      let previousInvestor = document.getElementById("previous_investor").value;
      let nextMilestone = document.getElementById("next_milestone").value;
      let investorHelp = document.getElementById("investor_help").value;
      let totalCustomer = document.getElementById("total_customer").value;
      let operationCountry = document.getElementById("operation_country").value;
      let foundeDate = document.getElementById("founded_date").value;
      let maturity = document.getElementById("maturity").value;
      let fullTimeEmployee = document.getElementById("full_time_employee").value;
      let annualRevenue = document.getElementById("annual_revenue").value;
      let projectedRevenue = document.getElementById("projected_revenue").value;
      let netProfit = document.getElementById("net_profit").value;
      let cachBalance = document.getElementById("cach_balance").value;
      let fundingRequest = document.getElementById("funding_request").value;


      let data = {
        exitGoal  : exitGoal ,
        expectedTimeFrame  : expectedTimeFrame, 
        helpExit  :helpExit, 
        followUpRound  : followUpRound ,
        valuation : valuation, 
        currentValuation  : currentValuation, 
        currentRaisings  : currentRaisings, 
        previousInvestor  : previousInvestor, 
        nextMilestone : nextMilestone, 
        investorHelp  : investorHelp, 
        totalCustomer : totalCustomer,
        operationCountry : operationCountry, 
        foundeDate  : foundeDate, 
        maturity  : maturity, 
        fullTimeEmployee  : fullTimeEmployee, 
        annualRevenue : annualRevenue, 
        projectedRevenue  : projectedRevenue, 
        netProfit : netProfit,
        cachBalance  : cachBalance, 
        fundingRequest : fundingRequest,

      };
    
      let url = "{{route('existing_financial.add_existing_financial')}}";
        add_Information(data , url);

    }



  // let marketSave = document.getElementById("market-save");
  // marketSave.addEventListener("click" , function(e){
  //   add_market_plan();
  // })

  // let tractionSave = document.getElementById("traction-save");
  // tractionSave.addEventListener("click" , function(e){
  //   add_traction_plan();
  // })

  // let teamSave = document.getElementById("team-save");
  // teamSave.addEventListener("click" , function(e){
  //   add_team_plan();
  // })

  // let financialSave = document.getElementById("financial-save");
  // financialSave.addEventListener("click" , function(e){
  //   add_financial_plan();
  // })

  // let intellectualPropertySave = document.getElementById("intellectual-property-save");
  // intellectualPropertySave.addEventListener("click" , function(e){
  //   add_intellectual_property_plan();
  // })

  // let businessModelSave = document.getElementById("business-model-save");
  // businessModelSave.addEventListener("click" , function(e){
  //   add_business_model_plan();
  // })

  // let fundSave = document.getElementById("funds-save");
  // fundSave.addEventListener("click" , function(e){
  //   add_funds_plan();
  // })


  // let corportateStructureSave = document.getElementById("corporate-structure-save");
  //   corportateStructureSave.addEventListener("click" , function(e){
  //     add_corporate_structure_plan();
  // })

  // let existingFinancialSave = document.getElementById("existing-financial-save");
  // existingFinancialSave.addEventListener("click" , function(e){
  //   add_existing_financial_plan();
  // })

  // let done = document.querySelector(".done");
  // done.addEventListener("click" , function(e){
  //   // window.location.href = "{{route('user.done')}}";
  //   window.location.href = "{{url('plan-conclusion',$planId)}}";
  // })

  

}


saveLink = document.querySelectorAll(".save_link");
saveLink.forEach(button => button.addEventListener("click" , function(e){
  e.preventDefault();
  let element = e.target;
  let form = element.closest(".form");
  generateAiQuestion(element , form)
}))


function generateAiQuestion(element , form){

  let questionSection = form.querySelectorAll(".question-section")
  let questionType = form.querySelector(".questionType").value;
  let questionCategory = form.querySelector(".questionCategory").value;
  let planId = document.getElementById("planId").value;
  let questionList = [];

  questionSection.forEach(section => {
    let question = section.querySelector(".question-list").innerText;
    let questionId = section.querySelector(".question-list").dataset.questionId;
    let answer = section.querySelector("input").value;
    let currentQuestion =  { question : question , answer : answer , questionId : questionId }; 
    questionList.push(currentQuestion);
  })

  let aiQuestion = [];
  let extraQuestion = form.querySelectorAll(".extra-question-section");
  extraQuestion.forEach(section =>{
    let question = section.querySelector(".extra-question-list").innerText;
    let answer = section.querySelector("input").value;
    let currentQuestion =  { question : question , answer : answer }; 
    aiQuestion.push(currentQuestion);
  });


//  if(extraQuestion.length == 0)
// { 
//   url = "{{route('generate.ai.question')}}";
//   data = {
//     planId : planId,
//     questionList : questionList,
//     questionType : questionType,
//     questionCategory : questionCategory,
//   };
// }else {
//   url = "{{route('generate.ai.bonus.question')}}";
//   data = {
//     planId : planId,
//     questionList : questionList,
//     aiQuestion : aiQuestion,
//     questionType : questionType,
//     questionCategory : questionCategory,
//   };
// }

  
url = "{{route('generate.ai.question')}}";
  data = {
    planId : planId,
    questionList : questionList,
    questionType : questionType,
    questionCategory : questionCategory,
  };

  document.querySelector(".overlay").classList.remove("d-none");

  $.ajax({
    type : "POST",
    url : url,
    data : {
      _token : "{{csrf_token()}}",
      ...data
    },
    // contentType: "application/json", // Set the Content-Type header
    success : function(res){
      form.querySelector(".fa-spinner").classList.add("d-none");
      if(res.success == true)
      {
        toastr.success(res.msg);
        document.querySelector(".overlay").classList.add("d-none");
        if(extraQuestion.length == 0 )
        {
          form.querySelector(".extra-question").innerHTML = res.extraQuestion;
          questionSection.forEach(question => {
            question.querySelector("input[type='text']").setAttribute('disabled' , true);
          })
        }else{
          $("#bonus-question").modal("show");
          document.querySelector(".bonus-question-list")
          document.querySelector(".bonus-question-list").innerHTML = res.bonusQuestion;
          document.querySelector("#bonus-question").querySelector("input[type='hidden']").value = questionCategory;
        }
      }else{
        toastr.error(res.msg);
      }
    },
    error : function(err){
      toastr.error(err)
      form.querySelector(".fa-spinner").classList.add("d-none");
    }
  })


  document.querySelector(".add-bonus-question").addEventListener("click" , function(e){
    e.stopImmediatePropagation()
    let extraQuestionSection = document.querySelector(".bonus-question-list").querySelectorAll(".extra-question-section");
    let questionCategory = this.closest("#bonus-question").querySelector("input[type='hidden']").value;
    let planId = document.getElementById("planId").value;
    bonusQuestion = [];
    extraQuestionSection.forEach(section => {
      let question = section.querySelector(".extra-question-list").innerText;
      let answer = section.querySelector("input").value;
      let currentQuestion =  { question : question , answer : answer }; 
      bonusQuestion.push(currentQuestion);

    })

    

    $.ajax({
        type : "POST",
        url : "{{route('add.ai.bonus.question')}}",
        data : {
          _token : "{{csrf_token()}}",
          planId : planId,
          questionCategory : questionCategory,
          bonusQuestion : bonusQuestion
        },
        success:function(res){
          if(res.success == true)
          {
            toastr.success(res.msg);
            $("#bonus-question").modal("hide");
            openedForm = document.querySelector(".form_box:not(.d-none)");
            let extraQuestionSection = openedForm.querySelectorAll(".extra-question-section");
            extraQuestionSection.forEach(section => {
              section.querySelector("input").setAttribute("disabled" , true);
            });
            // openedForm.querySelector(".save_link").style.visibility = 'hidden';
            openedForm.querySelector(".next-step").classList.remove('disabled');
            addBonusQuestion(bonusQuestion);
          }else{
            toastr.error(res.msg);
          }
        },
        error:function(err){
          toastr.error(err)
        }
      })


  })

  

}

function addBonusQuestion(bonusQuestion)
{

  openedForm = document.querySelector(".form_box:not(.d-none)");

  bonusSection = openedForm.querySelector(".extra-bonus-question");

  html = '<div><h3>Please Also Add Bonus Answer</h3></div>';

  bonusQuestion.forEach(bquestion => {
    html += '<div class="col-lg-12 colL extra-question-section">';
    html +=   '<div class="mb-3">';
    html +=     '<label class="form-label form_box_label market-question"><span class="extra-question-list">'+bquestion.question+'</span></label>';
    html +=     '<input type="text" class="form-control form_box_input" disabled value="'+bquestion.answer+'">';
    html +=   '</div>'
    html += '</div>'
  })

bonusSection.innerHTML = html;

  let forms = document.querySelectorAll(".form_box");
  let lastForm = forms[forms.length - 1];
  if(!lastForm.classList.contains("d-none"))
  {
    window.location.href = "{{url('plan-conclusion',$planId)}}";
  }
  

}

document.querySelectorAll(".close-modal").forEach(close => {
  close.addEventListener("click" , function(e){
    $("#bonus-question").modal("toggle");
  })
})

// Question form end here


document.querySelectorAll(".clear_form").forEach(btn => {
  btn.addEventListener("click" , function(e){
    e.preventDefault();
    let element = e.target;
    let form = element.closest(".form");
    let questionCategory = form.querySelector(".questionCategory").value;
    let generalQuestion = form.querySelectorAll(".question-section");
    let planId = document.getElementById("planId").value;
    $.ajax({
      url : '{{route("clear.question")}}',
      type : 'post',
      data : {
        _token : '{{csrf_token()}}',
        questionCategory : questionCategory,
        planId : planId
      },
      success : function(res){
        if(res.success == true)
        {
          toastr.success(res.msg);
          form.querySelector(".extra-question").innerHTML = "";
          // form.querySelector(".extra-bonus-question").innerHTML = "";
          
          generalQuestion.forEach(question =>{
            // question.querySelector(".form_box_input").value = "";
            question.querySelector(".form_box_input").removeAttribute("disabled");
          })
        }else{
          toastr.error(res.msg);
        }
      }
    })

  })
})


</script>



@endsection