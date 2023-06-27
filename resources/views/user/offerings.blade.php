@extends('user.main')
@section('main-content')
<div class="service_hero_section">
    <img src="{{asset('img/service_heroBg.png')}}" alt="hero" class="img-fluid">
  </div>
  <div class="service_section_2">
    <div class="container">
      <div class="text_content text-center">
        <h2 class="section_title">Offerings open for investment</h2>
        <p class="section_para">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam,
          purus sit amet luctus
        </p>
      </div>
      <div class="cons_note text-center">
        What challenge does your business have which unlocked will turbo
        charge your business?
      </div>
      <div class="row">
        <div class="col-lg-3 col-6">
          <img src="img/brand1.png" alt="brand" class="img-fluid mt-4">
        </div>
        <div class="col-lg-3 col-6">
          <img src="img/brand2.png" alt="brand" class="img-fluid mt-4">
        </div>
        <div class="col-lg-3 col-6">
          <img src="img/brand3.png" alt="brand" class="img-fluid mt-4">
        </div>
        <div class="col-lg-3 col-6">
          <img src="img/brand4.png" alt="brand" class="img-fluid mt-4">
        </div>
      </div>
    </div>
  </div>
@endsection