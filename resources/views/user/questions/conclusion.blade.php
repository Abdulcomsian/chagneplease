@extends('user.main')
@section('main-content')
<div class="container">
    <div class="text_content text-center my-lg-5 my-3">
      <h2 class="section_title">Add Conclusion</h2>
      <p class="section_para">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
        maecenas aliquam aliquam non.
      </p>
    </div>

    @if(Session::has('upload'))
      <div class="alert alert-danger" role="alert">
        <strong>{{ Session::get('upload') }}</strong>
      </div>
    @endif

    <div class="form_box">
      <form enctype="multipart/form-data" method="POST" action="{{route('plan.conclusion')}}" >
        @csrf
        <input type="hidden" name="planId" value="{{$planId}}">
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="video" class="form-label form_box_label">Upload video</label>
              <input type="file" name="video" class="form-control form_box_input" id="video">
              @error('video')
              <span class="text-danger h6">
                  {{$message}}
              </span>
              @enderror
            </div>
          </div>
        </div>
        <div class="form_bottom_links d-flex justify-content-start">
          <button type="submit" class="btn btn-blue" >Done</button>
          <a class="btn btn-blue mx-2" href="{{route('user.done')}}" role="button">Add Later</a>
          {{-- <a href="javascript:void(0)" class="save_link">Save</a> --}}
          {{-- <a href="{{route('user.investee_question_form')}}" class="btn btn-blue ">Next Step</a> --}}
        </div>
      </form>
    </div>

    <!-- buttons -->

    
  </div>

@endsection