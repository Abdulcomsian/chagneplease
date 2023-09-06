@extends('user.main')
@section('style')
<link rel="stylesheet" href="{{asset('css/cards.css')}}">
@endsection
@section('main-content')
<input type="hidden" name="planId" id="planId" value="{{$planId}}">
<div class="container">
<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <div class="card h-100" id="cards-b">
        <input type="checkbox" id="checkbox1" value="No Poverty" class="card-checkbox">
        <div class="flip-card " onclick="toggleCheckbox('checkbox1')">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="{{asset('images/card/card1.jpg')}}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Goal 1: No Poverty</h5>
              </div>
            </div>
            <div class="flip-card-back" id="cardback-color1">
              <h5 class="flip-back-h">Goal 1: No Poverty</h5>
              <p class="flip-back-text">Economic growth must be inclusive to provide sustainable jobs and promote equality.</p>
              <a class="inside-button" href="" >
                <span >Read more about Goal 1</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col">
      <div class="card h-100" id="cards-b">
        <input type="checkbox" id="checkbox2" value="Zero Hunger" class="card-checkbox">
        <div class="flip-card " onclick="toggleCheckbox('checkbox2')">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="{{asset('images/card/card2.jpg')}}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Goal 2: Zero Hunger</h5>
              </div>
            </div>
            <div class="flip-card-back" id="cardback-color2">
              <h5 class="flip-back-h">Goal 2: Zero Hunger</h5>
              <p class="flip-back-text">The food and agriculture sector offers key solutions for development, and is central for hunger and
                poverty eradication.</p>
              <a  href="" class="inside-button">
                <span>Read more about Goal 2</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100" id="cards-b">
        <div class="flip-card-container">
          <input type="checkbox" id="checkbox3" value="Good Health and Well-Being"  class="card-checkbox">
          <div class="flip-card" onclick="toggleCheckbox('checkbox3')">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="{{asset('images/card/card3.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Good Health and Well-Being</h5>
                </div>
              </div>
              <div class="flip-card-back" id="cardback-color3">
                <h5 class="flip-back-h">Goal 3: Good Health and Well-Being</h5>
                <p class="flip-back-text">Ensuring healthy lives and promoting the well-being for all at all ages is essential to sustainable
                  development.</p>
                <a  href="" class="inside-button">
                  <span>Read more about Goal 3</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <label for="checkbox2" class="checkbox-label"></label>
      </div>
    </div>
    <div class="col">
      <div class="card h-100" id="cards-b">
        <div class="flip-card-container">
          <input type="checkbox" id="checkbox4" value="quality Education" class="card-checkbox">
          <div class="flip-card " onclick="toggleCheckbox('checkbox4')">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="{{asset('images/card/card4.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Goal 4: quality Education</h5>
                </div>
              </div>
              <div class="flip-card-back" id="cardback-color4">
                <h5 class="flip-back-h">Goal 4: Quality Education</h5>
                <p class="flip-back-text">Obtaining a quality education is the foundation to improving people’s lives and sustainable
                  development.</p>
                <a  href="" class="inside-button">
                  <span>Read more about Goal 4</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100" id="cards-b">
        <div class="flip-card-container">
          <input type="checkbox" id="checkbox5" value="Gender Equality" class="card-checkbox">
          <div class="flip-card " onclick="toggleCheckbox('checkbox5')">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="{{asset('images/card/card5.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Goal 5: Gender Equality</h5>
                </div>
              </div>
              <div class="flip-card-back" id="cardback-color5">
                <h5 class="flip-back-h">Goal 5: Gender Equality</h5>
                <p class="flip-back-text">Gender equality is not only a fundamental human right, but a necessary foundation for a peaceful,
                  prosperous and sustainable world.</p>
                <a  href="" class="inside-button">
                  <span>Read more about Goal 5</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100" id="cards-b">
        <div class="flip-card-container">
          <input type="checkbox" id="checkbox6" value="Clean Water and Sanitation" class="card-checkbox">
          <div class="flip-card " onclick="toggleCheckbox('checkbox6')">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="{{asset('images/card/card6.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Goal 6: Clean Water and Sanitation</h5>
                </div>
              </div>
              <div class="flip-card-back" id="cardback-color6">
                <h5 class="flip-back-h">Goal 6: Clean Water and Sanitation</h5>
                <p class="flip-back-text">Clean, accessible water for all is an essential part of the world we want to live in.</p>
                <a  href="" class="inside-button">
                  <span>Read more about Goal 6</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100" id="cards-b">
        <div class="flip-card-container">
          <input type="checkbox" id="checkbox7" value="Affordable and Clean Energy" class="card-checkbox">
          <div class="flip-card " onclick="toggleCheckbox('checkbox7')">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="{{asset('images/card/card7.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Goal 7: Affordable and Clean Energy</h5>
                </div>
              </div>
              <div class="flip-card-back" id="cardback-color7">
                <h5 class="flip-back-h">Goal 7: Affordable and Clean Energy</h5>
                <p class="flip-back-text">Energy is central to nearly every major challenge and opportunity.</p>
                <a  href="" class="inside-button">
                  <span>Read more about Goal 7</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100" id="cards-b">
        <div class="flip-card-container">
          <input type="checkbox" id="checkbox8"  value="Decent Work and Economic Growth" class="card-checkbox">
          <div class="flip-card " onclick="toggleCheckbox('checkbox8')">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="{{asset('images/card/card8.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Goal 8: Decent Work and Economic Growth</h5>
                </div>
              </div>
              <div class="flip-card-back" id="cardback-color8">
                <h5 class="flip-back-h">Goal 8: Decent Work and Economic Growth</h5>
                <p class="flip-back-text">Sustainable economic growth will require societies to create the conditions that allow people to have
                  quality jobs.</p>
                <a  href="" class="inside-button">
                  <span>Read more about Goal 8</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100" id="cards-b">
        <div class="flip-card-container">
          <input type="checkbox" id="checkbox9" value="Industry, Innovation, and Infrastructure" class="card-checkbox">
          <div class="flip-card " onclick="toggleCheckbox('checkbox9')">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="{{asset('images/card/card9.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Goal 9: Industry, Innovation, and Infrastructure</h5>
                </div>
              </div>
              <div class="flip-card-back" id="cardback-color9">
                <h5 class="flip-back-h">Goal 9: Industry, Innovation, and Infrastructure</h5>
                <p class="flip-back-text">Investments in infrastructure are crucial to achieving sustainable development.</p>
                <a  href="" class="inside-button">
                  <span>Read more about Goal 9</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100" id="cards-b">
        <div class="flip-card-container">
          <input type="checkbox" id="checkbox10" value="Reduced Inequalities" class="card-checkbox">
          <div class="flip-card " onclick="toggleCheckbox('checkbox10')">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="{{asset('images/card/card10.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Goal 10: Reduced Inequalities</h5>
                </div>
              </div>
              <div class="flip-card-back" id="cardback-color10">
                <h5 class="flip-back-h">Goal 10: Reduced Inequalities</h5>
                <p class="flip-back-text">To reduce inequalities, policies should be universal in principle, paying attention to the needs of
                  disadvantaged and marginalized populations.</p>
                <a  href="" class="inside-button">
                  <span>Read more about Goal 10</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100" id="cards-b">
        <div class="flip-card-container">
          <input type="checkbox" id="checkbox11" value="Sustainable Cities and Communities" class="card-checkbox">
          <div class="flip-card " onclick="toggleCheckbox('checkbox11')">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="{{asset('images/card/card11.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Goal 11: Sustainable Cities and Communities</h5>
                </div>
              </div>
              <div class="flip-card-back" id="cardback-color11">
                <h5 class="flip-back-h">Goal 11: Sustainable Cities and Communities</h5>
                <p class="flip-back-text">There needs to be a future in which cities provide opportunities for all, with access to basic
                  services, energy, housing, transportation and more.</p>
                <a  href="" class="inside-button">
                  <span>Read more about Goal 11</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100" id="cards-b">
        <div class="flip-card-container">
          <input type="checkbox" id="checkbox12" value="Responsible Consumption and Production" class="card-checkbox">
          <div class="flip-card " onclick="toggleCheckbox('checkbox12')">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="{{asset('images/card/card12.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Goal 12: Responsible Consumption and Production</h5>
                </div>
              </div>
              <div class="flip-card-back" id="cardback-color12">
                <h5 class="flip-back-h">Goal 12: Responsible Consumption and Production</h5>
                <p class="flip-back-text">AResponsible Production and Consumption</p>
                <a  href="" class="inside-button">
                  <span>Read more about Goal 12</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100" id="cards-b">
        <div class="flip-card-container">
          <input type="checkbox" id="checkbox13" value="Climate Action" class="card-checkbox">
          <div class="flip-card " onclick="toggleCheckbox('checkbox13')">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="{{asset('images/card/card13.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Goal 13: Climate Action</h5>
                </div>
              </div>
              <div class="flip-card-back" id="cardback-color13">
                <h5 class="flip-back-h">Goal 13: Climate Action</h5>
                <p class="flip-back-text">Climate change is a global challenge that affects everyone, everywhere.</p>
                <a  href="" class="inside-button">
                  <span>Read more about Goal 13</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100" id="cards-b">
        <div class="flip-card-container">
          <input type="checkbox" id="checkbox14" value="Life Below Water" class="card-checkbox">
          <div class="flip-card " onclick="toggleCheckbox('checkbox14')">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="{{asset('images/card/card14.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Goal 14: Life Below Water</h5>
                </div>
              </div>
              <div class="flip-card-back" id="cardback-color14">
                <h5 class="flip-back-h">Goal 14: Life Below Water</h5>
                <p class="flip-back-text">Careful management of this essential global resource is a key feature of a sustainable future.</p>
                <a  href="" class="inside-button">
                  <span>Read more about Goal 14</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100" id="cards-b">
        <div class="flip-card-container">
          <input type="checkbox" id="checkbox15" value="Life on Land" class="card-checkbox">
          <div class="flip-card " onclick="toggleCheckbox('checkbox15')">
            <div class="flip-card-inner">
              <div class="flip-card-front" id="cardback-color15">
                <img src="{{asset('images/card/card15.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Goal 15: Life on Land</h5>
                </div>
              </div>
              <div class="flip-card-back" id="cardback-color15">
                <h5 class="flip-back-h">Goal 15: Life on Land</h5>
                <p class="flip-back-text">Sustainably manage forests, combat desertification, halt and reverse land degradation, halt
                  biodiversity loss</p>
                <a  href="" class="inside-button">
                  <span>Read more about Goal 15</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100" id="cards-b">
        <div class="flip-card-container">
          <input type="checkbox" id="checkbox16" value="Peace, Justice and Strong Institutions" class="card-checkbox">
          <div class="flip-card " onclick="toggleCheckbox('checkbox16')">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="{{asset('images/card/card16.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Goal 16: Peace, Justice and Strong Institutions</h5>
                </div>
              </div>
              <div class="flip-card-back" id="cardback-color16">
                <h5 class="flip-back-h">Goal 16: Peace, Justice and Strong Institutions</h5>
                <p class="flip-back-text">Access to justice for all, and building effective, accountable institutions at all levels.</p>
                <a  href="" class="inside-button">
                  <span>Read more about Goal 16</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100" id="cards-b">
        <div class="flip-card-container">
          <input type="checkbox" id="checkbox17" value="Partnerships" class="card-checkbox">
          <div class="flip-card " onclick="toggleCheckbox('checkbox17')">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="{{asset('images/card/card17.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Goal 17: Partnerships</h5>
                </div>
              </div>
              <div class="flip-card-back" id="cardback-color17">
                <h5 class="flip-back-h">Goal 17: Partnerships</h5>
                <p class="flip-back-text">Revitalize the global partnership for sustainable development.</p>
                <a  href="" class="inside-button">
                  <span>Read more about Goal 17</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
</div>
    <div class="row" style="margin-top: 100px">
        <div class="col d-flex justify-content-end">
            <button class="btn btn-blue" id="add-goals">Add Goals</button>
        </div>
    </div>
    
    <script>
      
      function toggleCheckbox(checkboxId) {
        const checkbox = document.getElementById(checkboxId);
        checkbox.checked = !checkbox.checked;
      }


      document.getElementById("add-goals").addEventListener('click' , function(){
        let planId = document.getElementById('planId').value;
        let goals = [];
        cardCheckbox = document.querySelectorAll(".card-checkbox");
        cardCheckbox.forEach((checbox)=>{
            if(checbox.checked == true){
                goals.push(checbox.value);
            }
        })

        if(goals.length === 0){
            toastr.error("Please Select At Least One Goal");
        }

        $.ajax({
            type : 'POST',
            url : '{{route("add_plan_goal")}}',
            data : { 
                planId : planId ,
                goals : goals,
                _token : '{{csrf_token()}}'
                },
            success: function(res){
                if(res.success == true){
                    toastr.success(res.msg);
                    window.location.href = "{{url('plan-conclusion',$planId)}}";
                }else{
                    toastr.error(res.msg);
                }
            }
        })
        
      })

    </script>
@endsection