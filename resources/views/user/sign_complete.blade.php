@extends('user.main')
@section('main-content')
    <div class="ref_main mx-auto my-5 py-lg-5">
        <div class="text_content text-center">
        <img src="{{asset('img/reg_final.png')}}" alt="img">
        <h2 class="section_title">Start turning your ideas into reality</h2>
        <p class="section_para">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. A convallis
            ultrices malesuada quis lorem turpis.
        </p>
        <a href="{{route('user.general_information')}}" class="btn btn-blue d-block py-3">Continue</a>
        </div>
    </div>
@endsection