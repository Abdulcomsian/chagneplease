@extends('user.main')
@section('main-content')
<div class="container">
    <div class="text_content text-center my-lg-5 my-3">
      <h2 class="section_title">Information about your company</h2>
      <p class="section_para">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
        maecenas aliquam aliquam non.
      </p>
    </div>

    <div class="form_box">
      <h2 class="form_box_title">Business Information</h2>
      <form enctype="multipart/form-data" id="screeningForm" method="POST" action="{{route('screening.add')}}" >
        <input type="hidden" id="planId" name="planId" value="{{$planId}}">
        <div class="row">
          @foreach($screeningQuestion as $question)
          @if($question->type == "select")
              <div class="col-12">
                <div class="mb-3">
                <label for="investment" class="form-label form_box_label">{{$question->question}}</label>
                <select data-question-id="{{$question->id}}" name="{{$question->name}}" class="form-control m-0">
                    @php  $options = json_decode($question->options);  @endphp
                    @foreach($options as $option)
                      <option value="{{$option}}">{{$option}}</option>
                    @endforeach
                </select>
                @error($question->name)
                <div class="text-danger">
                  {{$message}}
                </div>
                @enderror
              </div>
              </div>
            @elseif($question->type == "input")
            <div class="col-12">
              <div class="mb-3">
                <label for="address" class="form-label form_box_label">{{$question->question}}</label>
                <input type="text" data-question-id="{{$question->id}}" name="{{$question->name}}" class="form-control form_box_input m-0">
                @error($question->name)
                <div class="text-danger">
                  <strong>{{$message}}</strong>
                </div>
                @enderror
              </div>
            </div>
            @else
            <div class="col-12">
              <div class="mb-3">
                <label class="form-label form_box_label">{{$question->question}}</label>
                <textarea data-question-id="{{$question->id}}" class="form-control" name="{{$question->name}}" cols="30" rows="3" spellcheck="false"></textarea>
                @error($question->name)
                  <div class="text-danger">
                    <strong>{{$message}}</strong>
                  </div>
                  @enderror
              </div>
            </div>
            @endif
          @endforeach
          <div class="col-12">
            <div class="mb-3">
              <button type="submit" class="btn btn-primary">Submit <i class="fas fa-spinner fa-spin d-none"></i></button>
            </div>
          </div>
        </div>

      </form>
    </div>

    <!-- buttons -->

    
  </div>
<script>
    let screeningForm = document.getElementById("screeningForm");
    screeningForm.addEventListener("submit" , function(e){
      e.preventDefault();
      document.querySelector(".fa-spinner").classList.remove("d-none");
      fieldList = document.querySelectorAll("input[type='text'], textarea, select");
      let planId = document.getElementById("planId").value; 
      let check = [ null , undefined , ""];
      let fieldArray = [];
      let fieldError = false;
      let fieldErrorName = [];
      fieldList.forEach( item => {
        obj = { question : item.dataset.questionId , value : item.value };
        if(check.includes(item.value) )
        {
          fieldError = true 
          fieldErrorName.push(item.name);
          document.querySelector(".fa-spinner").classList.add("d-none");
        }else 
        { 
          fieldArray.push(obj)
        } 
      })

      if(fieldError)
      {
        fieldErrorName.forEach(err => {
          toastr.error(`Please add ${err}`);
        })
        return;
      }else{
        $.ajax({
          type : "POST",
          url : "{{route('screening.add')}}",
          data : {
            planId : planId,
            screeningAnswers : fieldArray,
            _token : "{{csrf_token()}}"

          },
          success: function(res){
            if(res.success == true)
            {
              toastr.success(res.msg);
              window.location.href = "{{url('investee-questions')}}"+"/"+planId;
            }else{
              toastr.error(res.msg);
              for(let [key  , value] of Object.entries(res.error))
              {
                toastr.error(value);
              }
              
            }
            document.querySelector(".fa-spinner").classList.add("d-none");
          }

        })
      }



    })
</script>

@endsection