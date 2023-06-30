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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" class="question-category-id" name="question_category_id">
        <div class="bonus-question-list">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
      <div class="stepper-item @if(isset($plan->Market) && !is_null($plan->Market)) completed @endif">
        <div class="step-counter num">1</div>
        <div class="step-counter check">
          <img src="{{asset('img/check.png')}}" alt="check">
        </div>
        <div class="step-name">Market</div>
      </div>
      <div class="stepper-item @if(isset($plan->Market) && !is_null($plan->Market) && !isset($plan->Traction) && is_null($plan->Traction)) next @endif @if(isset($plan->Traction) && !is_null($plan->Traction)) completed @endif">
        <div class="step-counter num">2</div>
        <div class="step-counter check">
          <img src="{{asset('img/check.png')}}" alt="check">
        </div>
        <div class="step-counter bi_check">
          <img src="{{asset('img/bi_check.png')}}" alt="check">
        </div>
        <div class="step-name">Traction</div>
      </div>
      <div class="stepper-item @if(isset($plan->Traction) && !is_null($plan->Traction) && !isset($plan->Team) && is_null($plan->Team)) next @endif @if(isset($plan->Team) && !is_null($plan->Team)) completed @endif">
        <div class="step-counter num">3</div>
        <div class="step-counter check">
          <img src="{{asset('img/check.png')}}" alt="check">
        </div>
        <div class="step-counter bi_check">
          <img src="{{asset('img/bi_check.png')}}" alt="check">
        </div>
        <div class="step-name">Team</div>
      </div>
      <div class="stepper-item @if(isset($plan->Team) && !is_null($plan->Team) && !isset($plan->Competition) && is_null($plan->Competition)) next @endif @if(isset($plan->Competition) && !is_null($plan->Competition)) completed @endif">
        <div class="step-counter num">4</div>
        <div class="step-counter check">
          <img src="{{asset('img/check.png')}}" alt="check">
        </div>
        <div class="step-counter bi_check">
          <img src="{{asset('img/bi_check.png')}}" alt="check">
        </div>
        <div class="step-name">Competition</div>
      </div>
      <div class="stepper-item @if(isset($plan->Competition) && !is_null($plan->Competition) && !isset($plan->Financial) && is_null($plan->Financial)) next @endif @if(isset($plan->Financial) && !is_null($plan->Financial)) completed @endif">
        <div class="step-counter num">5</div>
        <div class="step-counter check">
          <img src="{{asset('img/check.png')}}" alt="check">
        </div>
        <div class="step-counter bi_check">
          <img src="{{asset('img/bi_check.png')}}" alt="check">
        </div>
        <div class="step-name">Financials</div>
      </div>
      <div class="stepper-item @if(isset($plan->Financial) && !is_null($plan->Financial) && !isset($plan->IntellectualProperty) && is_null($plan->IntellectualProperty)) next @endif @if(isset($plan->IntellectualProperty) && !is_null($plan->IntellectualProperty)) completed @endif">
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
      <div class="stepper-item @if(isset($plan->IntellecutalProperty) && !is_null($plan->IntellectualProperty) && !isset($plan->BusinessModel) && is_null($plan->BusinessModel)) next @endif @if(isset($plan->BusinessModel) && !is_null($plan->BusinessModel)) completed @endif">
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
      <div class="stepper-item @if(isset($plan->BusinessModel) && !is_null($plan->BusinessModel) && !isset($plan->Fund) && is_null($plan->Fund)) next @endif @if(isset($plan->Fund) && !is_null($plan->Fund)) completed @endif">
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
      <div class="stepper-item @if(isset($plan->Fund) && !is_null($plan->Fund) && !isset($plan->CorporateStructure) && is_null($plan->CorporateStructure)) next @endif @if(isset($plan->CorporateStructure) && !is_null($plan->CorporateStructure)) completed @endif">
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
    <div class="form_box @if(isset($plan->Market) && !is_null($plan->Market)) d-none @endif">
      <h2 class="form_box_title">Market</h2>
        <form class="form">
          <input type="hidden" class="questionType" name="questionType" value="market">
          <input type="hidden" class="questionCategory" name="questionCategory" value="1">
          @foreach($marketQuestion as $index => $question)
  
          <div class="col-lg-12 colL question-section">
            <div class="mb-3">
              <label class="form-label form_box_label market-question">{{($index + 1)}}. <span class="question-list"  data-question-id="{{$question->id}}">{{$question->question}}</span></label>
              <input type="text" class="form-control form_box_input" value="">
            </div>
          </div>
  
          @endforeach
          <div class="extra-question">

          </div>
          <div class="form_bottom_links d-flex justify-content-between">
            <button type="submit" class="save_link">Save</button>
            <div class="d-flex">
              <a href="javascript:void(0)" id="market-step" class="btn btn-blue next-step">Next Step</a>
            </div>
          </div>
      </form>



    </div>

    {{-- market code ends here --}}
    {{-- traction code ends here --}}
    <div class="form_box @if(( !isset($plan->Market) || is_null($plan->Market) ) || (isset($plan->Traction) && !is_null($plan->Traction))  ) d-none @endif">
      <h2 class="form_box_title">Traction</h2>
      <form>
        <div class="row align-items-center">
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="feedback" class="form-label form_box_label">1. How much feedback you have recieved so far?</label>
              <input type="text" class="form-control form_box_input" id="feedback" value="{{@$plan->Traction->feedback}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="changes" class="form-label form_box_label">2. What changes have you made based on that feedback?</label>
              <input type="text" class="form-control form_box_input" id="changes" value="{{@$plan->Traction->changes}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="actual_user" class="form-label form_box_label">3. How many actual users do you have?</label>
              <input type="text" class="form-control form_box_input" id="actual_user" value="{{@$plan->Traction->actual_user}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="average_stay" class="form-label form_box_label">4. How long do users stay on average?</label>
              <input type="text" class="form-control form_box_input" id="average_stay" value="{{@$plan->Traction->average_stay}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="actual_sales" class="form-label form_box_label">5. How many actual sales you have made?</label>
              <input type="text" class="form-control form_box_input" id="actual_sales" value="{{@$plan->Traction->actual_sales}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="annual_growth" class="form-label form_box_label">6. What is the annual growth rate?</label>
              <input type="text" class="form-control form_box_input" id="annual_growth" value="{{@$plan->Traction->annual_growth}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="growth_rate" class="form-label form_box_label">7. Total rate of growth?</label>
              <input type="text" class="form-control form_box_input" id="growth_rate" value="{{@$plan->Traction->growth_rate}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="growth_linear_consistent" class="form-label form_box_label">8. Has growth been linear and consistent?</label>
              <input type="text" class="form-control form_box_input" id="growth_linear_consistent" value="{{@$plan->Traction->growth_linear_consistent}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="held_back" class="form-label form_box_label">9. What has held back your growth?</label>
              <input type="text" class="form-control form_box_input" id="held_back" value="{{@$plan->Traction->held_back}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="demonstration" class="form-label form_box_label">10. Can you provide a demonstration of the product or service now?</label>
              <input type="text" class="form-control form_box_input" id="demonstration" value="{{@$plan->Traction->demonstration}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
        </div>
      </form>
      <div class="form_bottom_links d-flex justify-content-between">
        <a href="javascript:void(0)" id="traction-save" class="save_link">Save</a>
        <div class="d-flex">
          <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
          <a href="javascript:void(0)" id="traction" class="btn btn-blue next-step">Next Step</a>
        </div>
      </div>
    </div>

    {{-- traction code ends here --}}

    {{-- Team code starts here --}}
    <div class="form_box @if(!isset($plan->Traction) || is_null($plan->Traction) || (isset($plan->Team) && !is_null($plan->Team))) d-none @endif">
     <h2 class="form_box_title">Team</h2>
      <form>
        <div class="row align-items-center">
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="headquarter" class="form-label form_box_label">1. Where are your headquarters?</label>
              <input type="text" class="form-control form_box_input" id="headquarter" value="{{@$plan->Team->headquarter}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="founders" class="form-label form_box_label">2. Who are the founders?</label>
              <input type="text" class="form-control form_box_input" id="founders" value="{{@$plan->Team->founders}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="team_members" class="form-label form_box_label">3. Who are key team members?</label>
              <input type="text" class="form-control form_box_input" id="team_members" value="{{@$plan->Team->team_members}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="board_members" class="form-label form_box_label">4. Any existing board members?</label>
              <input type="text" class="form-control form_box_input" id="board_members" value="{{@$plan->Team->board_members}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="roles" class="form-label form_box_label">5. What key roles may need to be hired for soon?</label>
              <input type="text" class="form-control form_box_input" id="roles" value="{{@$plan->Team->roles}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="experience" class="form-label form_box_label">6. What experience do you have in the industry?</label>
              <input type="text" class="form-control form_box_input" id="experience" value="{{@$plan->Team->experience}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="right_person" class="form-label form_box_label">7. Why are you the right person to bet on to achieve this?</label>
              <input type="text" class="form-control form_box_input" id="right_person" value="{{@$plan->Team->right_person}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="motivation" class="form-label form_box_label">8. What motivates you?</label>
              <input type="text" class="form-control form_box_input" id="motivation" value="{{@$plan->Team->motivation}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="founder" class="form-label form_box_label">9. Are any of the founder willing to be bought out now?</label>
              <input type="text" class="form-control form_box_input" id="founder" value="{{@$plan->Team->founder}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="responsible_idea" class="form-label form_box_label">10. Are there any other people who may claim they are owed or responsible for your ideas?</label>
              <input type="text" class="form-control form_box_input" id="responsible_idea" value="{{@$plan->Team->responsible_idea}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
        </div>
      </form>
      <div class="form_bottom_links d-flex justify-content-between">
        <a href="javascript:void(0)" id="team-save" class="save_link">Save</a>
        <div class="d-flex">
          <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
          <a href="javascript:void(0)" id="team" class="btn btn-blue next-step">Next Step</a>
        </div>
      </div>
    </div>
    

    {{-- Team code ends here --}}

    
    {{-- Competition code starts here --}}

    <div class="form_box @if( (!isset($plan->Team) || is_null($plan->Team)) || (isset($plan->Competition) && !is_null($plan->Competition))) d-none @endif">
     <h2 class="form_box_title">Competition</h2>
      <form>
        <div class="row align-items-center">
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="competitors" class="form-label form_box_label">1. Who are you competitors?</label>
              <input type="text" class="form-control form_box_input" id="competitors" value="{{@$plan->Competition->competitiors}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="advantages" class="form-label form_box_label">2. What are your strength and advantages over your competitors?</label>
              <input type="text" class="form-control form_box_input" id="advantages" value="{{@$plan->Competition->advantages}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="disadvantages" class="form-label form_box_label">3. What are your weakness or disadvantages?</label>
              <input type="text" class="form-control form_box_input" id="disadvantages" value="{{@$plan->Competition->disadvantages}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="barriers" class="form-label form_box_label">4. What barriers to entry or scale are there for you?</label>
              <input type="text" class="form-control form_box_input" id="barriers" value="{{@$plan->Competition->barriers}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="letting_down" class="form-label form_box_label">5. Where is the competition letting down customers?</label>
              <input type="text" class="form-control form_box_input" id="letting_down" value="{{@$plan->Competition->letting_down}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="competitors_not_done" class="form-label form_box_label">6. Why haven't your competitors done this yet?</label>
              <input type="text" class="form-control form_box_input" id="competitors_not_done" value="{{@$plan->Competition->competitors_not_done}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="differ_feature" class="form-label form_box_label">7. How do your features differ?</label>
              <input type="text" class="form-control form_box_input" id="differ_feature" value="{{@$plan->Competition->differ_feature}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="compare_price" class="form-label form_box_label">8. How do you compare on price?</label>
              <input type="text" class="form-control form_box_input" id="compare_price" value="{{@$plan->Competition->compare_price}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="compare_service" class="form-label form_box_label">9. How do you compare on service?</label>
              <input type="text" class="form-control form_box_input" id="compare_service" value="{{@$plan->Competition->compare_service}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="customer_satisfaction" class="form-label form_box_label">10. How do you compare on customer satisfaction?</label>
              <input type="text" class="form-control form_box_input" id="customer_satisfaction" value="{{@$plan->Competition->customer_satisfaction}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
        </div>
      </form>
      <div class="form_bottom_links d-flex justify-content-between">
        <a href="javascript:void(0)" id="competition-save" class="save_link">Save</a>
        <div class="d-flex">
          <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
          <a href="javascript:void(0)" id="competition"  class="btn btn-blue next-step">Next Step</a>
        </div>
      </div>
    </div>

    {{-- Competition code ends here --}}


    {{-- Financial code starts here --}}
    <div class="form_box @if(!isset($plan->Competition) || is_null($plan->Competition) || (isset($plan->Financial) && !is_null($plan->Financial)) ) d-none @endif">
     <h2 class="form_box_title">Financials</h2>
      <form>
        <div class="row align-items-center">
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="product_marketing" class="form-label form_box_label">1. How are you marketing your product or service?</label>
              <input type="text" class="form-control form_box_input" id="product_marketing" value="{{@$plan->Financial->product_marketing}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="marketing_budget" class="form-label form_box_label">2. How much is your marketing budget?</label>
              <input type="text" class="form-control form_box_input" id="marketing_budget" value="{{@$plan->Financial->marketing_budget}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="acquisition_cost" class="form-label form_box_label">3. What are your per customer acquisition costs?</label>
              <input type="text" class="form-control form_box_input" id="acquisition_cost" value="{{@$plan->Financial->acquisition_cost}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="lifetime_value" class="form-label form_box_label">4. How much is your customer lifetime value?</label>
              <input type="text" class="form-control form_box_input" id="lifetime_value" value="{{@$plan->Financial->lifetime_value}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="equity_debt" class="form-label form_box_label">5. How much equity and debt has been raised in the past?</label>
              <input type="text" class="form-control form_box_input" id="equity_debt" value="{{@$plan->Financial->equity_debt}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="fundraising" class="form-label form_box_label">6. Who participated in earlier round of fundraising?</label>
              <input type="text" class="form-control form_box_input" id="fundraising" value="{{@$plan->Financial->fundraising}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="burn_rate" class="form-label form_box_label">7. What is your burn rate?</label>
              <input type="text" class="form-control form_box_input" id="burn_rate" value="{{@$plan->Financial->burn_rate}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="time_period" class="form-label form_box_label">8. How long will it take to become profitable?</label>
              <input type="text" class="form-control form_box_input" id="time_period" value="{{@$plan->Financial->product_marketing}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="metrics_key" class="form-label form_box_label">9. What are the key metrics your team is focused on?</label>
              <input type="text" class="form-control form_box_input" id="metrics_key" value="{{@$plan->Financial->metrics_key}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="stock_options" class="form-label form_box_label">10. What stock options have been given already? What is the distribution of equity between founders?</label>
              <input type="text" class="form-control form_box_input" id="stock_options" value="{{@$plan->Financial->stock_options}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
        </div>
      </form>
      <div class="form_bottom_links d-flex justify-content-between">
        <a href="javascript:void(0)" id="financial-save" class="save_link">Save</a>
        <div class="d-flex">
          <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
          <a href="javascript:void(0)" id="financial" class="btn btn-blue next-step">Next Step</a>
        </div>
      </div>
    </div>

    {{-- Financial code ends here --}}


    {{-- Intellectual Property code starts here --}}

    <div class="form_box @if((!isset($plan->Financial) || is_null($plan->Financial)) || (isset($plan->IntellectualProperty) && !is_null($plan->IntellectualProperty))) d-none @endif">
     <h2 class="form_box_title">Intellectual Property</h2>
      <form>
        <div class="row align-items-center">
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="unique_company" class="form-label form_box_label">1. What is unique about the company?</label>
              <input type="text" class="form-control form_box_input" id="unique_company" value="{{@$plan->IntellectualProperty->unique_company}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="problem_solve" class="form-label form_box_label">2. What Big problem does it solve?</label>
              <input type="text" class="form-control form_box_input" id="problem_solve" value="{{@$plan->IntellectualProperty->problem_solve}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="legal_risk" class="form-label form_box_label">3. What legal risks do you see?</label>
              <input type="text" class="form-control form_box_input" id="legal_risk" value="{{@$plan->IntellectualProperty->legal_risk}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="product_liability" class="form-label form_box_label">4. Are you aware of any product liability risks?</label>
              <input type="text" class="form-control form_box_input" id="product_liability" value="{{@$plan->IntellectualProperty->product_liability}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="regulatory_risk" class="form-label form_box_label">5. What regulatory risks could impact this business?</label>
              <input type="text" class="form-control form_box_input" id="regulatory_risk" value="{{@$plan->IntellectualProperty->regulatory_risk}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="intellectual_property" class="form-label form_box_label">6. What intellectual property do you own?</label>
              <input type="text" class="form-control form_box_input" id="intellectual_property" value="{{@$plan->IntellectualProperty->intellectual_property}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="developed_intellectual_property" class="form-label form_box_label">7. Who developed any intellectual property owned?</label>
              <input type="text" class="form-control form_box_input" id="developed_intellectual_property" value="{{@$plan->IntellectualProperty->developed_intellectual_property}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="person_left" class="form-label form_box_label">8. Have any employees or partners have left who may challenge these rights?</label>
              <input type="text" class="form-control form_box_input" id="person_left" value="{{@$plan->IntellectualProperty->person_left}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="additional_partner" class="form-label form_box_label">9. Are there any additional patents pending or planned?</label>
              <input type="text" class="form-control form_box_input" id="additional_partner" value="{{@$plan->IntellectualProperty->additional_partner}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="current_intellectual_assets" class="form-label form_box_label">10. How are any current intellectual assets owned?</label>
              <input type="text" class="form-control form_box_input" id="current_intellectual_assets" value="{{@$plan->IntellectualProperty->current_intellectual_assets}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
        </div>
      </form>
      <div class="form_bottom_links d-flex justify-content-between">
        <a href="javascript:void(0)" id="intellectual-property-save" class="save_link">Save</a>
        <div class="d-flex">
          <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
          <a href="javascript:void(0)" id="intellectual-property" class="btn btn-blue next-step">Next Step</a>
        </div>
      </div>
    </div>

    {{-- Intellectual Property code ends here --}}


    
{{-- Business Model code starts here --}}
    <div class="form_box d-none">
     <h2 class="form_box_title">Business Model</h2>
      <form>
        <div class="row align-items-center">
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="specific_channels" class="form-label form_box_label">1. Which specific marketing channels are you using?</label>
              <input type="text" class="form-control form_box_input" id="specific_channels" value="{{@$plan->BusinessModel->specific_channels}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="marketing_channels" class="form-label form_box_label">2. Why are you using these marketing channels?</label>
              <input type="text" class="form-control form_box_input" id="marketing_channels" value="{{@$plan->BusinessModel->marketing_channels}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="plan_b" class="form-label form_box_label">3. What is your plan B, if these sales channels are interrupted?</label>
              <input type="text" class="form-control form_box_input" id="plan_b" value="{{@$plan->BusinessModel->plan_b}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="profit_margin" class="form-label form_box_label">4. What profit margins are you operating on?</label>
              <input type="text" class="form-control form_box_input" id="profit_margin" value="{{@$plan->BusinessModel->profit_margin}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="scalling_impact" class="form-label form_box_label">5. How will scalling impact profit margins?</label>
              <input type="text" class="form-control form_box_input" id="scalling_impact" value="{{@$plan->BusinessModel->scalling_impact}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="pivots" class="form-label form_box_label">6. What pivots have you already made up until now?</label>
              <input type="text" class="form-control form_box_input" id="pivots" value="{{@$plan->BusinessModel->pivots}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="customer_story" class="form-label form_box_label">7. Can you tell me a story about how a customer has decided to choose you and their experience with your product?</label>
              <input type="text" class="form-control form_box_input" id="customer_story" value="{{@$plan->BusinessModel->customer_story}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="replaceable" class="form-label form_box_label">8. Who in the organization is most replaceable?</label>
              <input type="text" class="form-control form_box_input" id="replaceable" value="{{@$plan->BusinessModel->replaceable}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="unique_feature" class="form-label form_box_label">9. What unique features are you working on?</label>
              <input type="text" class="form-control form_box_input" id="unique_feature" value="{{@$plan->BusinessModel->unique_feature}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="revenue_stream" class="form-label form_box_label">10. What other streams of revenue can be added to this?</label>
              <input type="text" class="form-control form_box_input" id="revenue_stream" value="{{@$plan->BusinessModel->revenue_stream}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
        </div>
      </form>
      <div class="form_bottom_links d-flex justify-content-between">
        <a href="javascript:void(0)" id="business-model-save" class="save_link">Save</a>
        <div class="d-flex">
          <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
          <a href="javascript:void(0)" id="business-model" class="btn btn-blue next-step">Next Step</a>
        </div>
      </div>
    </div>
{{-- Business Model code ends here --}}
    

    {{-- Use of funds code starts here --}}
    <div class="form_box @if((!isset($plan->IntellectualProperty) || is_null($plan->IntellectualProperty)) || (isset($plan->Fund) && !is_null($plan->Fund)) ) d-none @endif">
     <h2 class="form_box_title">Use of Funds</h2>
      <form>
        <div class="row align-items-center">
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="funds_allocated" class="form-label form_box_label">1. How will these funds be allocated?</label>
              <input type="text" class="form-control form_box_input" id="funds_allocated" value="{{@$plan->Fund->funds_allocated}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="spent" class="form-label form_box_label">2. How much will be spent on founders salaries?</label>
              <input type="text" class="form-control form_box_input" id="spent" value="{{@$plan->Fund->spent}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="expansion" class="form-label form_box_label">3. How much will be spent on overhead versus expansion?</label>
              <input type="text" class="form-control form_box_input" id="expansion" value="{{@$plan->Fund->expansion}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="not_recieved_money" class="form-label form_box_label">4. What if you don't get all the money you are asking for?</label>
              <input type="text" class="form-control form_box_input" id="not_recieved_money" value="{{@$plan->Fund->not_recieved_money}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="asset_invested" class="form-label form_box_label">5. What assets will be invested in with this capital?</label>
              <input type="text" class="form-control form_box_input" id="asset_invested" value="{{@$plan->Fund->asset_invested}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="milestones" class="form-label form_box_label">6. What are your milestones?</label>
              <input type="text" class="form-control form_box_input" id="milestones" value="{{@$plan->Fund->milestones}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="biggest_risks" class="form-label form_box_label">7. What are the biggest risks to my investment?</label>
              <input type="text" class="form-control form_box_input" id="biggest_risks" value="{{@$plan->Fund->biggest_risks}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="raising_capitals" class="form-label form_box_label">8. Why are you choosing this method of raising capital?</label>
              <input type="text" class="form-control form_box_input" id="raising_capitals" value="{{@$plan->Fund->raising_capitals}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="fundraising_efforts" class="form-label form_box_label">9. How much this money will be used for future fundraising efforts?</label>
              <input type="text" class="form-control form_box_input" id="fundraising_efforts" value="{{@$plan->Fund->fundraising_efforts}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="personal_expenses" class="form-label form_box_label">10. How much are you personal expenses each month?</label>
              <input type="text" class="form-control form_box_input" id="personal_expenses" value="{{@$plan->Fund->personal_expenses}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
        </div>
      </form>
      <div class="form_bottom_links d-flex justify-content-between">
        <a href="javascript:void(0)" id="funds-save" class="save_link">Save</a>
        <div class="d-flex">
          <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
          <a href="javascript:void(0)" id="funds" class="btn btn-blue next-step">Next Step</a>
        </div>
      </div>
    </div>
    
    {{-- Use of funds code ends here --}}

    
    {{-- Corporate structure starts here --}}
    <div class="form_box @if((!isset($plan->Fund) || is_null($plan->Fund)) || (isset($plan->CorporateStructure) && !is_null($plan->CorporateStructure)) ) d-none @endif">
      <h2 class="form_box_title">Corporate Structure</h2>
      <form>
        <div class="row align-items-center">
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="organized_company" class="form-label form_box_label">1. How is the company organized?</label>
              <input type="text" class="form-control form_box_input" id="organized_company" value="{{@$plan->CorporateStructure->organized_company}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="hold_titles" class="form-label form_box_label">2. Who hold which titles?</label>
              <input type="text" class="form-control form_box_input" id="hold_titles" value="{{@$plan->CorporateStructure->hold_titles}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="split_shares" class="form-label form_box_label">3. How are shares split?</label>
              <input type="text" class="form-control form_box_input" id="split_shares" value="{{@$plan->CorporateStructure->split_shares}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="existing_board" class="form-label form_box_label">4. Is there any existing board or advisors?</label>
              <input type="text" class="form-control form_box_input" id="existing_board" value="{{@$plan->CorporateStructure->existing_board}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="registered_company" class="form-label form_box_label">5. Where is the company registered?</label>
              <input type="text" class="form-control form_box_input" id="registered_company" value="{{@$plan->CorporateStructure->registered_company}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="account_handling" class="form-label form_box_label">6. Who handles accounting?</label>
              <input type="text" class="form-control form_box_input" id="account_handling" value="{{@$plan->CorporateStructure->account_handling}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="talent_skills" class="form-label form_box_label">7. What unique skills and talents does each owner contribute?</label>
              <input type="text" class="form-control form_box_input" id="talent_skills" value="{{@$plan->CorporateStructure->talent_skills}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="selected_founder" class="form-label form_box_label">8. Name someone you chose not to include as a founder and why?</label>
              <input type="text" class="form-control form_box_input" id="selected_founder" value="{{@$plan->CorporateStructure->selected_founder}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="employee_selector" class="form-label form_box_label">9. Who filed the company?</label>
              <input type="text" class="form-control form_box_input" id="employee_selector" value="{{@$plan->CorporateStructure->employee_selector}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="registered_agent" class="form-label form_box_label">10. Who is the registered agent on record?</label>
              <input type="text" class="form-control form_box_input" id="registered_agent" value="{{@$plan->CorporateStructure->registered_agent}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
        </div>
      </form>
      <div class="form_bottom_links d-flex justify-content-between">
        <a href="javascript:void(0)" id="corporate-structure-save" class="save_link">Save</a>
        <div class="d-flex">
          <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
          <a href="javascript:void(0)" id="corporate-structure" class="btn btn-blue next-step">Next Step</a>
        </div>
      </div>
    </div>
    
    {{-- Corporate structure ends here --}}
    
    
    {{-- Existing Financial Round Starts here --}}

    <div class="form_box @if(!isset($plan->CorporateStructure) || is_null($plan->CorporateStructure)) d-none @endif">
      <h2 class="form_box_title">Existing Financial Round</h2>
      <form>
        <div class="row align-items-center">
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="exit_goal" class="form-label form_box_label">1. What is your exit goal?(i.e IPO, M&A)</label>
              <input type="text" class="form-control form_box_input" id="exit_goal" value="{{@$plan->ExistingFinancial->exit_goal}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="expected_time_frame" class="form-label form_box_label">2. What is your expected time frame for this?</label>
              <input type="text" class="form-control form_box_input" id="expected_time_frame" value="{{@$plan->ExistingFinancial->expected_time_frame}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="help_exit" class="form-label form_box_label">3. Who do you imagine will help you exit?</label>
              <input type="text" class="form-control form_box_input" id="help_exit" value="{{@$plan->ExistingFinancial->help_exit}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="follow_up_round" class="form-label form_box_label">4. When do you expect you will be conducting a follow up round of fundraising?</label>
              <input type="text" class="form-control form_box_input" id="follow_up_round" value="{{@$plan->ExistingFinancial->follow_up_round}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="valuation" class="form-label form_box_label">5. How much money is your pre-money valuation?</label>
              <input type="text" class="form-control form_box_input" id="valuation" value="{{@$plan->ExistingFinancial->valuation}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="current_valuation" class="form-label form_box_label">6. how are you determining current valuation?</label>
              <input type="text" class="form-control form_box_input" id="current_valuation" value="{{@$plan->ExistingFinancial->current_valuation}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="current_raisings" class="form-label form_box_label">7. How much are you trying to raise now?</label>
              <input type="text" class="form-control form_box_input" id="current_raisings" value="{{@$plan->ExistingFinancial->current_raisings}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="previous_investor" class="form-label form_box_label">8. How many previous investors will participate in this round?</label>
              <input type="text" class="form-control form_box_input" id="previous_investor" value="{{@$plan->ExistingFinancial->previous_investor}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="next_milestone" class="form-label form_box_label">9. What is the next milestone this money will take you to?</label>
              <input type="text" class="form-control form_box_input" id="next_milestone" value="{{@$plan->ExistingFinancial->next_milestone}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <!--  -->
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="investor_help" class="form-label form_box_label">10. How else do you hope an investor will help beyond money?</label>
              <input type="text" class="form-control form_box_input" id="investor_help" value="{{@$plan->ExistingFinancial->investor_help}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>




          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="total_customer" class="form-label form_box_label">Numbers of customer</label>
              <input type="text" class="form-control form_box_input" id="total_customer" value="{{@$plan->ExistingFinancial->total_customer}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="operation_country" class="form-label form_box_label">What countries do you operate in?</label>
              <input type="text" class="form-control form_box_input" id="operation_country" value="{{@$plan->ExistingFinancial->operation_country}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="founded_date" class="form-label form_box_label">Date Founded</label>
              <input type="text" class="form-control form_box_input" id="founded_date" value="{{@$plan->ExistingFinancial->founded_date}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="maturity" class="form-label form_box_label">Stage of maturity</label>
              <input type="text" class="form-control form_box_input" id="maturity" value="{{@$plan->ExistingFinancial->maturity}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="full_time_employee" class="form-label form_box_label">Number of full-time employees</label>
              <input type="text" class="form-control form_box_input" id="full_time_employee" value="{{@$plan->ExistingFinancial->full_time_employee}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="annual_revenue" class="form-label form_box_label">Annual revenue 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022</label>
              <input type="text" class="form-control form_box_input" id="annual_revenue" value="{{@$plan->ExistingFinancial->annual_revenue}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="projected_revenue" class="form-label form_box_label">Projected revenue 2023, 2024, 2025, 2026, 2027</label>
              <input type="text" class="form-control form_box_input" id="projected_revenue" value="{{@$plan->ExistingFinancial->projected_revenue}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="net_profit" class="form-label form_box_label">Net Profit 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022</label>
              <input type="text" class="form-control form_box_input" id="net_profit" value="{{@$plan->ExistingFinancial->net_profit}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="cach_balance" class="form-label form_box_label">Cach Balance (31 Dec 2021)</label>
              <input type="text" class="form-control form_box_input" id="cach_balance" value="{{@$plan->ExistingFinancial->cach_balance}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>
          <div class="col-lg-7 colL">
            <div class="mb-3">
              <label for="funding_request" class="form-label form_box_label">Funding request</label>
              <input type="text" class="form-control form_box_input" id="funding_request" value="{{@$plan->ExistingFinancial->funding_request}}">
            </div>
          </div>
          <div class="col-lg-5 colL">
            {{-- <div class="loom_link d-flex justify-content-end">
              <a href="#">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_54_3575)">
                    <path d="M16.7979 12.0957V4.56934C16.7979 4.24966 16.4078 4.01318 16.0921 4.22769C16.092 4.22777 16.0919 4.22786 16.0918 4.22794L13.0756 6.29202V10.3758L16.0926 12.4384L16.7979 12.0957ZM16.7979 12.0957C16.7979 12.4179 16.4063 12.6524 16.0928 12.4385L16.7979 12.0957ZM11.1312 4.11523V12.5527C11.1312 13.0498 10.7243 13.459 10.2145 13.459H1.71452C1.20476 13.459 0.797852 13.0498 0.797852 12.5527V4.11523C0.797852 3.61819 1.20476 3.20898 1.71452 3.20898H10.2145C10.724 3.20898 11.1312 3.61826 11.1312 4.11523Z" stroke="#3B7CEE"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_54_3575">
                      <rect width="17" height="15" fill="white" transform="translate(0.297852 0.833984)"></rect>
                    </clipPath>
                  </defs>
                </svg>
                Record with LOOM</a>
            </div> --}}
          </div>




        </div>
      </form>
      <div class="form_bottom_links d-flex justify-content-between">
        <a href="javascript:void(0)" id="existing-financial-save" class="save_link">Save</a>
        <div class="d-flex">
          <a href="javascript:void(0)" class="btn btn-blue-outline d-flex align-items-center me-4 justify-content-center previous-step">Previous Step</a>
          <a href="javascript:void(0)" class="btn btn-blue done">Done</a>
        </div>
      </div>
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
      nextBtnId = this.id;
      setNextStep(i , nextBtnId);
      form[i].classList.add("d-none");
      form[i+1].classList.remove("d-none");
      window.scroll(0,0);
      $(form[i+1]).fadeOut();
      $(form[i+1]).fadeIn();
    });
  }

  function setPreviousStep(i)
  {
     stepper[i].classList.remove("completed");
     stepper[i].classList.add("next");
     stepper[i+1].classList.remove("next");
  }



  function setNextStep(i , itemId)
  {

    // switch(itemId){
    // case "market-step":
    //   add_market_plan();
    // break;
    // case "traction":
    //   add_traction_plan();
    // break;
    // case "team":
    //   add_team_plan();
    // break;
    // case "competition":
    //   add_competition_plan();
    // break;
    // case "financial":
    //   add_financial_plan();
    // break;
    // case "intellectual-property":
    //   add_intellectual_property_plan();
    // break;
    // case "business-model":
    //   add_business_model_plan();
    // break;
    // case "funds":
    //   add_funds_plan();
    // break;
    // case "corporate-structure":
    //   add_corporate_structure_plan();
    // break;

    // }

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

  let tractionSave = document.getElementById("traction-save");
  tractionSave.addEventListener("click" , function(e){
    add_traction_plan();
  })

  let teamSave = document.getElementById("team-save");
  teamSave.addEventListener("click" , function(e){
    add_team_plan();
  })

  let financialSave = document.getElementById("financial-save");
  financialSave.addEventListener("click" , function(e){
    add_financial_plan();
  })

  let intellectualPropertySave = document.getElementById("intellectual-property-save");
  intellectualPropertySave.addEventListener("click" , function(e){
    add_intellectual_property_plan();
  })

  let businessModelSave = document.getElementById("business-model-save");
  businessModelSave.addEventListener("click" , function(e){
    add_business_model_plan();
  })

  let fundSave = document.getElementById("funds-save");
  fundSave.addEventListener("click" , function(e){
    add_funds_plan();
  })


  let corportateStructureSave = document.getElementById("corporate-structure-save");
    corportateStructureSave.addEventListener("click" , function(e){
      add_corporate_structure_plan();
  })

  let existingFinancialSave = document.getElementById("existing-financial-save");
  existingFinancialSave.addEventListener("click" , function(e){
    add_existing_financial_plan();
  })

  let done = document.querySelector(".done");
  done.addEventListener("click" , function(e){
    add_existing_financial_plan();
    // window.location.href = "{{route('user.done')}}";
    window.location.href = "{{url('plan-conclusion',$planId)}}";
  })

  

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


 if(extraQuestion.length == 0)
{ 
  url = "{{route('generate.ai.question')}}";
  data = {
    planId : planId,
    questionList : questionList,
    questionType : questionType,
    questionCategory : questionCategory,
  };
}else {
  url = "{{route('generate.ai.bonus.question')}}";
  data = {
    planId : planId,
    questionList : questionList,
    aiQuestion : aiQuestion,
    questionType : questionType,
    questionCategory : questionCategory,
  };
}

  

  


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
            openedForm.querySelector(".save_link").style.visibility = 'hidden';
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



// Question form end here





</script>



@endsection