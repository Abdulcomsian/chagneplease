@extends('user.main')
@section('style')
<style>
  
  .col-lg-4.plan{
    height: 698px;
    overflow-y: hidden;
    position: relative;
  }
  .col-lg-4.plan .box {
    height: 620px;
    /* width: 408px; */
 }

 .statistic-box.card {
    margin-top: 30px;
    position: absolute;
    width: 95%;
    z-index: 1;
    bottom : -100%;
    transition: bottom 0.3s ease;
}

.col-lg-4.plan:hover .statistic-box.card{
  bottom: 2px;
}


.circular-progress-bar {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100px;
  height: 85px;
  border-radius: 50%;
}
p.rating-holder {
    padding: 3px 11px;
    width: 60px;
    border-radius: 12px;
    text-align: center;
}


.card-logo{
  height: 350px;
  background-color: white;
}

.card-logo img.card-img-top {
    max-height: 350px;
    height: auto;
  }

</style>
@endsection
@section('main-content')
<div class="hero_section">
    <div class="content">
      <div class="text_content">
        <h1>Meaningful investments in Main Street businesses</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut</p>
        <a href="#" class="btn btn-blue">Get Started</a>
      </div>
    </div>
  </div>
  <div class="section_2 position-relative">
    <img src="{{asset('img/Shape.png')}}" class="position-absolute shape" alt="shape">
    <div class="container">
      <div class="text_content text-center">
        <h2 class="section_title">Offerings open for investment</h2>
        <p class="section_para">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam,
          purus sit amet luctus
        </p>
      </div>

      <div class="row project-row">
        @include('components.planList')
      </div>


      @if($plans->count() > 0)
        <div class="btns d-flex justify-content-center">
          {{-- <a href="javascript:void(0)" class="btn btn-blue-outline load-more-plan-btn">View All Projects</a> --}}
          <a href="{{route('user.filter')}}" class="btn btn-blue-outline load-more-plan-btn">View All Projects</a>
        </div>
      @else
      <blockquote class="blockquote text-center">
        <p class="mb-0 my-2 text-muted"><strong>No  Project  Found!</strong></p>
      </blockquote>
      @endif
    </div>
  </div>
@endsection
@section('script')
<script>
// window.onload = function(){

//  let loadMoreBtn = document.querySelector(".load-more-plan-btn");
//  loadMoreBtn.addEventListener("click" , function(e){
//     let totalPlan = document.querySelectorAll(".plan").length;
//     $.ajax({
//       type : "POST",
//       url : "{{route('load.more.plan')}}",
//       data : {
//         _token : "{{csrf_token()}}",
//         totalPlan : totalPlan
//       },
//       success:function(res){
//         if(res.success == true){
//           let testProject = ["" , undefined , null];
//           let project = res.projects;
//           if(testProject.includes(project))
//           {
//             toastr.error("No More Project Available");
//             document.querySelector(".load-more-plan-btn").remove();
//           }else{
//             document.querySelector(".project-row").insertAdjacentHTML('beforeend' , project);
//           }
//           window.scrollTo(0, document.body.scrollHeight);
//         }else{
//           alert(res.error);
//         }
//       }
//     })
//  })

// }
</script>
@endsection