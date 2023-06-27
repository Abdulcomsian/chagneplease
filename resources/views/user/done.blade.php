@extends('user.main')
@section('main-content')
<div class="ref_main mx-auto my-5 py-lg-5">
    <div class="text_content text-center my-5 py-lg-5">
      <img src="img/all-done.png" alt="img">
      <h2 class="section_title">All Done</h2>
      <p class="section_para">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. A convallis
        ultrices malesuada quis lorem turpis.
      </p>
      <a href="{{route('user.plans')}}" class="btn btn-blue d-block py-3">ok</a>
    </div>
  </div>
@endsection