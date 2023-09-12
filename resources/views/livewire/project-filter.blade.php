<div>
    <div class="section_2 investes position-relative">
        <div class="custom_container">
          <div class="row mx-0">
            <div class="col-lg-4">
              <div class="side_menu">
                <div class="filter_header d-flex justify-content-between">
                  <h3 class="m-0">Filter by</h3>
                  <a href="javascript:void(0)" wire:click="resetFilter">Reset Filter</a>
                </div>
                <div class="filter_body">
                  <div class="filter_box">
                    <h4 class="filter_title">COUNTRY</h4>
                    <select name="select" class="form-select" wire:change.defer="updateProject" wire:model="country">
                      <option value="" selected >Select Country</option>
                      @foreach($countriesList as $country)
                        <option value="{{$country}}">{{$country}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="filter_box">
                    <h4 class="filter_title">CITY</h4>
                    <select name="select" class="form-select" wire:change.defer="updateProject" wire:model="city">
                      <option value="" selected>Select City</option>
                      @foreach($citiesList as $city)
                        <option value="{{$city}}">{{$city}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="filter_box">
                    <h4 class="filter_title">RANGE</h4>
                    {{-- <select name="select" class="form-select">
                      <option value="1">Select investment range</option>
                      <option value="2">option 1</option>
                      <option value="2">option 2</option>
                    </select> --}}
                    <div class="wrapper">
                        <div class="values">
                          <span id="range1">
                            ${{$minimumRange}}
                          </span>
                          <span> &dash; </span>
                          <span id="range2">
                            ${{$maximumRange}}
                          </span>
                        </div>
                        <div class="container">
                          <div class="slider-track"></div>
                          <input type="range" min="{{$atMin}}" max="{{$atMax}}" wire:model.debounce.1s="minimumRange" wire:change.lazy="updateProject" value="{{$minimumRange}}" id="slider-1" oninput="slideOne()">
                          <input type="range" min="{{$atMin}}" max="{{$atMax}}" wire:model.debounce.1s="maximumRange" wire:change.lazy="updateProject" value="{{$maximumRange}}" id="slider-2" oninput="slideTwo()">
                        </div>
                      </div>
                  </div>
                  <div class="filter_box">
                    <h4 class="filter_title">SECTORS</h4>
                    <!-- checkboxs -->
                    <div class="form-check">
                      <input class="form-check-input changeCatgory" wire:model="category" type="checkbox" value="Energy" id="energy" wire:change.defer="updateProject">
                      <label class="form-check-label" for="energy">
                        Energy
                      </label>
                    </div>
    
                    <div class="form-check">
                      <input class="form-check-input changeCatgory" wire:model="category" type="checkbox" value="Materials" id="material" wire:change.defer="updateProject">
                      <label class="form-check-label" for="material">
                        Materials
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeCatgory" wire:model="category" type="checkbox" value="Industrial" id="industrial" wire:change.defer="updateProject">
                      <label class="form-check-label" for="industrial">
                        Industrials
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeCatgory" wire:model="category" type="checkbox" value="Utilities" id="utilities" wire:change.defer="updateProject">
                      <label class="form-check-label" for="utilities">
                        Utilities
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeCatgory" wire:model="category" type="checkbox" value="Healthcare" id="healthcare" wire:change.defer="updateProject">
                      <label class="form-check-label" for="healthcare">
                        Healthcare
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeCatgory" wire:model="category" type="checkbox" value="Saham" id="saham" wire:change.defer="updateProject">
                      <label class="form-check-label" for="saham">
                        Saham
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeCatgory" wire:model="category" type="checkbox" value="Real estate" id="real-estate" wire:change.defer="updateProject">
                      <label class="form-check-label" for="real-estate">
                        Real Estate
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeCatgory" wire:model="category" type="checkbox" value="Information Technology" id="information-technology" wire:change.defer="updateProject">
                      <label class="form-check-label" for="information-technology">
                        Information Technology
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeCatgory" wire:model="category" type="checkbox" value="Communication Services" id="communication-service" wire:change.defer="updateProject">
                      <label class="form-check-label" for="communication-service">
                        Communication Services
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeCatgory" wire:model="category" type="checkbox" value="Others" id="other" wire:change.defer="updateProject">
                      <label class="form-check-label" for="other">
                        Others
                      </label>
                    </div>
                  </div>

                  <div class="filter_box">
                    <h4 class="filter_title">GOALS</h4>
                    <!-- checkboxs -->
                    <div class="form-check">
                      <input class="form-check-input changeGoal" wire:model="goals" type="checkbox" value="No Poverty" id="No-Poverty" wire:change.defer="updateProject">
                      <label class="form-check-label" for="No-Poverty">
                        No Poverty
                      </label>
                    </div>
    
                    <div class="form-check">
                      <input class="form-check-input changeGoal" wire:model="goals" type="checkbox" value="Zero Hunger" id="Zero-Hunger" wire:change.defer="updateProject">
                      <label class="form-check-label" for="Zero-Hunger">
                        Zero Hunger
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeGoal" wire:model="goals" type="checkbox" value="Good Health and Well-Being" id="Good-Health-and-Well-Being" wire:change.defer="updateProject">
                      <label class="form-check-label" for="Good-Health-and-Well-Being">
                        Good Health and Well-Being
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeGoal" wire:model="goals" type="checkbox" value="Quality Education" id="Quality-Education" wire:change.defer="updateProject">
                      <label class="form-check-label" for="Quality-Education">
                        Quality Education
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeGoal" wire:model="goals" type="checkbox" value="Gender Equality" id="Gender-Equality" wire:change.defer="updateProject">
                      <label class="form-check-label" for="Gender-Equality">
                        Gender Equality
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeGoal" wire:model="goals" type="checkbox" value="Water and Sanitation" id="Water-and-Sanitation" wire:change.defer="updateProject">
                      <label class="form-check-label" for="Water-and-Sanitation">
                        Water and Sanitation
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeGoal" wire:model="goals" type="checkbox" value="Affordable and Clean Energy" id="Affordable-and-Clean-Energy" wire:change.defer="updateProject">
                      <label class="form-check-label" for="Affordable-and-Clean-Energy">
                        Affordable and Clean Energy
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeGoal" wire:model="goals" type="checkbox" value="Decent Work and Economic Growth" id="Decent-Work-and-Economic-Growth" wire:change.defer="updateProject">
                      <label class="form-check-label" for="Decent-Work-and-Economic-Growth">
                        Decent Work and Economic Growth
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeGoal" wire:model="goals" type="checkbox" value="Industry, Innovation, and Infrastructure" id="Industry,-Innovation,-and-Infrastructure" wire:change.defer="updateProject">
                      <label class="form-check-label" for="Industry,-Innovation,-and-Infrastructure">
                        Industry, Innovation, and Infrastructure
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input changeGoal" wire:model="goals" type="checkbox" value="Reduced Inequalities" id="Reduced-Inequalities" wire:change.defer="updateProject">
                      <label class="form-check-label" for="Reduced-Inequalities">
                        Reduced Inequalities
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeGoal" wire:model="goals" type="checkbox" value="Sustainable Cities and Communities" id="Sustainable-Cities-and-Communities" wire:change.defer="updateProject">
                      <label class="form-check-label" for="Sustainable-Cities-and-Communities">
                        Sustainable Cities and Communities
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeGoal" wire:model="goals" type="checkbox" value="Responsible Consumption and Production" id="Responsible-Consumption-and-Production" wire:change.defer="updateProject">
                      <label class="form-check-label" for="Responsible-Consumption-and-Production">
                        Responsible Consumption and Production
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeGoal" wire:model="goals" type="checkbox" value="Climate Action" id="Climate-Action" wire:change.defer="updateProject">
                      <label class="form-check-label" for="Climate-Action">
                        Climate Action
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeGoal" wire:model="goals" type="checkbox" value="Life Below Water" id="Life-Below-Water" wire:change.defer="updateProject">
                      <label class="form-check-label" for="Life-Below-Water">
                        Life Below Water
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeGoal" wire:model="goals" type="checkbox" value="Life on Land" id="Life-on-Land" wire:change.defer="updateProject">
                      <label class="form-check-label" for="Life-on-Land">
                        Life on Land
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeGoal" wire:model="goals" type="checkbox" value="Peace, Justice and Strong Institutions" id="Peace,-Justice-and-Strong-Institutions" wire:change.defer="updateProject">
                      <label class="form-check-label" for="Peace,-Justice-and-Strong-Institutions">
                        Peace, Justice and Strong Institutions
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input changeGoal" wire:model="goals" type="checkbox" value="Partnerships" id="Partnerships" wire:change.defer="updateProject">
                      <label class="form-check-label" for="Partnerships">
                        Partnerships
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="search_field d-flex justify-content-end">
                <div class="input position-relative">
                  <span class="icon position-absolute"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_162_6637)">
                        <path d="M7.05729 3.03385C7.95985 3.03303 8.84237 3.29992 9.59322 3.80075C10.3441 4.30158 10.9295 5.01386 11.2755 5.84747C11.6214 6.68109 11.7124 7.59858 11.5368 8.4839C11.3612 9.36921 10.927 10.1826 10.2891 10.8211C9.6512 11.4595 8.83825 11.8945 7.95309 12.0709C7.06794 12.2473 6.15036 12.1572 5.31643 11.812C4.4825 11.4668 3.76969 10.882 3.26817 10.1316C2.76665 9.38119 2.49896 8.49891 2.49896 7.59635C2.50443 6.38871 2.98631 5.23203 3.83986 4.37769C4.69341 3.52336 5.84966 3.04043 7.05729 3.03385ZM7.05729 2.17969C5.98598 2.17969 4.93872 2.49737 4.04796 3.09256C3.15719 3.68775 2.46292 4.53372 2.05295 5.52349C1.64297 6.51325 1.5357 7.60236 1.74471 8.65309C1.95371 9.70382 2.4696 10.669 3.22713 11.4265C3.98467 12.1841 4.94982 12.6999 6.00056 12.9089C7.05129 13.1179 8.1404 13.0107 9.13016 12.6007C10.1199 12.1907 10.9659 11.4965 11.5611 10.6057C12.1563 9.71493 12.474 8.66767 12.474 7.59635C12.474 6.15977 11.9033 4.78201 10.8875 3.76619C9.87163 2.75037 8.49388 2.17969 7.05729 2.17969Z" fill="#7D8289"></path>
                        <path d="M14.8363 14.8007L11.7655 11.709L11.1738 12.2965L14.2447 15.3882C14.2832 15.427 14.3291 15.4579 14.3796 15.479C14.4301 15.5001 14.4843 15.5111 14.539 15.5113C14.5938 15.5115 14.648 15.5009 14.6987 15.4801C14.7493 15.4594 14.7954 15.4288 14.8342 15.3902C14.8731 15.3517 14.904 15.3058 14.9251 15.2553C14.9462 15.2048 14.9572 15.1506 14.9574 15.0959C14.9576 15.0411 14.947 14.9869 14.9262 14.9362C14.9055 14.8856 14.8749 14.8395 14.8363 14.8007Z" fill="#7D8289"></path>
                      </g>
                      <defs>
                        <clipPath id="clip0_162_6637">
                          <rect width="15" height="15" fill="white" transform="translate(0.253906 0.929688)"></rect>
                        </clipPath>
                      </defs>
                    </svg>
                  </span>
                  <input type="text" placeholder="Search" wire:model="search" wire:keyup.debounce.1s="searchProject">
                </div>
              </div>
              <div class="row">
                <div class="text-center">
                  <h3><strong wire:loading.delay>Loading...</strong></h3>
                </div>
              </div>
              <div class="row" wire:loading.class="invisible">
                @foreach($plans as $plan)
                <div class="col-lg-6 plan">
                    <div class="box mt-5">
                      <div class="card">
                        <div class="card-logo">
                          <img src="{{asset('uploads')}}/{{$plan->company_logo}}" class="card-img-top" alt="card image">
                        </div>
                        <div class="card-body">
                          <div class="row align-items-center">
                            <div class="col-lg-8">
                              <div class="card_title">
                                <h2>{{$plan->company_name}}</h2>
                                <p class="mb-0">{{$plan->city}}, {{$plan->country}}</p>
                              </div>
                            </div>
                            <div class="col-lg-4 d-flex justify-content-end">
                              @php
                                $market  =  $plan->marketAiQuestion ? $plan->marketAiQuestion->analyst_rating ?? 0 : 0;
                                $traction  = $plan->tractionAiQuestion ? $plan->tractionAiQuestion->analyst_rating ?? 0 : 0;
                                $team  = $plan->teamAiQuestion ? $plan->teamAiQuestion->analyst_rating ?? 0 : 0; 
                                $businessModel  = $plan->businessAiQuestion ? $plan->businessAiQuestion->analyst_rating ?? 0 : 0;
                                $competition  = $plan->competitionAiQuestion ? $plan->competitionAiQuestion->analyst_rating ?? 0 : 0;
                                $corporateStructure = $plan->corporateAiQuestion ? $plan->corporateAiQuestion->analyst_rating ?? 0 : 0;
                                $existingFinancial  = $plan->investmentAiQuestion ? $plan->investmentAiQuestion->analyst_rating ?? 0 : 0;
                                $financial = $plan->financialAiQuestion ? $plan->financialAiQuestion->analyst_rating ?? 0 : 0;
                                $fund = $plan->fundAiQuestion ? $plan->fundAiQuestion->analyst_rating ?? 0 : 0;
                                $intellectualProperty = $plan->intellectualAiQuestion ? $plan->intellectualAiQuestion->analyst_rating ?? 0 : 0;

                                $totalPercentage = (($market + $traction + $team + $businessModel + $competition + $corporateStructure + $existingFinancial + $financial + $fund + $intellectualProperty) / 100)* 100;

                                $totalValue = ($totalPercentage / 10);

                              @endphp
                              
                              <div class="circular-progress-bar" style="background: radial-gradient(closest-side, white 79%, transparent 80% 100%),   conic-gradient(#22c704  {{$totalPercentage}}%, #a4f174 0);   ">
                                <div class="total-progress">
                                    <strong>{{$totalValue}}/10</strong>
                                </div>
                              </div>
                              {{-- <img src="{{asset('img/rating.png')}}" alt="rating"> --}}
                            </div>
                          </div>
                          <p class="card_des">
                            {{$plan->description}}
                          </p>
                          @php
                            $totalWidth = ceil(($plan->amount / $plan->investment) * 100);
                          @endphp
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$totalWidth}}%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <p class="progressNote">
                            <span class="blueText">${{number_format($plan->amount)}}</span> raised of ${{number_format($plan->investment)}}
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="statistic-box card px-3 py-5">
                      <h3><strong>{{$plan->company_name}}</strong></h3>
                      <h5>{{$plan->city}}, {{$plan->country}}</h5>
                      <hr>
                      <div>
                        <div class="d-flex justify-content-between px-4">
                          <p>Market</p>
                          <p class="rating-holder" style="background-color: @if($market<=4) red @elseif($market > 4 && $market <= 7) yellow @else green @endif">{{$market }}/10</p>
                        </div>
                        <div class="d-flex justify-content-between px-4">
                          <p>Traction</p>
                          <p class="rating-holder" style="background-color: @if($traction<=4) red @elseif($traction>4 && $traction<=7) yellow @else green @endif">{{$traction}}/10</p>
                        </div>
                        <div class="d-flex justify-content-between px-4">
                          <p>Team</p>
                          <p class="rating-holder" style="background-color: @if($team<=4) red @elseif($team>4 && $team<=7) yellow @else green @endif">{{$team}}/10</p>
                        </div>
                        <div class="d-flex justify-content-between px-4">
                          <p>Business Model</p>
                          <p class="rating-holder" style="background-color: @if($businessModel<=4) red @elseif($businessModel>4 && $businessModel<=7) yellow @else green @endif">{{$businessModel}}/10</p>
                        </div>
                        <div class="d-flex justify-content-between px-4">
                          <p>Competition</p>
                          <p class="rating-holder" style="background-color: @if($competition<=4) red @elseif($competition>4 && $competition<=7) yellow @else green @endif">{{$competition}}/10</p>
                        </div>
                        <div class="d-flex justify-content-between px-4">
                          <p>Corporate Structure</p>
                          <p class="rating-holder" style="background-color: @if($corporateStructure<=4) red @elseif($corporateStructure>4 && $corporateStructure<=7) yellow @else green @endif">{{$corporateStructure}}/10</p>
                        </div>
                        <div class="d-flex justify-content-between px-4">
                          <p>Existing Financial</p>
                          <p class="rating-holder" style="background-color: @if($existingFinancial<=4) red @elseif($existingFinancial>4 && $existingFinancial<=7) yellow @else green @endif">{{$existingFinancial}}/10</p>
                        </div>
                        <div class="d-flex justify-content-between px-4">
                          <p>Financial</p>
                          <p class="rating-holder" style="background-color: @if($financial<=4) red @elseif($financial>4 && $financial<=7) yellow @else green @endif">{{$financial}}/10</p>
                        </div>
                        <div class="d-flex justify-content-between px-4">
                          <p>Fund</p>
                          <p class="rating-holder" style="background-color: @if($fund<=4) red @elseif($fund>4 && $fund<=7) yellow @else green @endif">{{$fund}}/10</p>
                        </div>
                        <div class="d-flex justify-content-between px-4">
                          <p>Intellectual Property</p>
                          <p class="rating-holder" style="background-color: @if($intellectualProperty<=4) red @elseif($intellectualProperty>4 && $intellectualProperty<=7) yellow @else green @endif">{{$intellectualProperty}}/10</p>
                        </div>
                      </div>
                      <a href="{{url('project-details' , $plan->id)}}" target="_blank" class="btn btn-primary btn-lg btn-block">View</a>
                    </div> 
                  </div>
                @endforeach
                {{-- <div class="col-lg-4">
                  <div class="box mt-5">
                    <div class="card">
                      <img src="{{asset('img/cardImg.png')}}" class="card-img-top" alt="card image">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-lg-8">
                            <div class="card_title">
                              <h2>Good Loop</h2>
                              <p class="mb-0">Brooklyn, NY</p>
                            </div>
                          </div>
                          <div class="col-lg-4 d-flex justify-content-end">
                            <img src="{{asset('img/rating.png')}}" alt="rating">
                          </div>
                        </div>
                        <p class="card_des">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit
                          ut aliquam, purus sit
                        </p>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="progressNote">
                          <span class="blueText">$574,920</span> raised of
                          $1,000,000
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="box mt-5">
                    <div class="card">
                      <img src="{{asset('img/cardImg2.png')}}" class="card-img-top" alt="card image">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-lg-8">
                            <div class="card_title">
                              <h2>Good Loop</h2>
                              <p class="mb-0">Brooklyn, NY</p>
                            </div>
                          </div>
                          <div class="col-lg-4 d-flex justify-content-end">
                            <img src="{{asset('img/rating.png')}}" alt="rating">
                          </div>
                        </div>
                        <p class="card_des">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit
                          ut aliquam, purus sit
                        </p>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="progressNote">
                          <span class="blueText">$574,920</span> raised of
                          $1,000,000
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="box mt-5">
                    <div class="card">
                      <img src="{{asset('img/cardImg1.png')}}" class="card-img-top" alt="card image">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-lg-8">
                            <div class="card_title">
                              <h2>Good Loop</h2>
                              <p class="mb-0">Brooklyn, NY</p>
                            </div>
                          </div>
                          <div class="col-lg-4 d-flex justify-content-end">
                            <img src="{{asset('img/rating.png')}}" alt="rating">
                          </div>
                        </div>
                        <p class="card_des">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit
                          ut aliquam, purus sit
                        </p>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="progressNote">
                          <span class="blueText">$574,920</span> raised of
                          $1,000,000
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="box mt-5">
                    <div class="card">
                      <img src="{{asset('img/cardImg2.png')}}" class="card-img-top" alt="card image">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-lg-8">
                            <div class="card_title">
                              <h2>Good Loop</h2>
                              <p class="mb-0">Brooklyn, NY</p>
                            </div>
                          </div>
                          <div class="col-lg-4 d-flex justify-content-end">
                            <img src="{{asset('img/rating.png')}}" alt="rating">
                          </div>
                        </div>
                        <p class="card_des">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit
                          ut aliquam, purus sit
                        </p>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="progressNote">
                          <span class="blueText">$574,920</span> raised of
                          $1,000,000
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="box mt-5">
                    <div class="card">
                      <img src="{{asset('img/cardImg3.png')}}" class="card-img-top" alt="card image">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-lg-8">
                            <div class="card_title">
                              <h2>Good Loop</h2>
                              <p class="mb-0">Brooklyn, NY</p>
                            </div>
                          </div>
                          <div class="col-lg-4 d-flex justify-content-end">
                            <img src="{{asset('img/rating.png')}}" alt="rating">
                          </div>
                        </div>
                        <p class="card_des">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit
                          ut aliquam, purus sit
                        </p>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="progressNote">
                          <span class="blueText">$574,920</span> raised of
                          $1,000,000
                        </p>
                      </div>
                    </div>
                  </div>
                </div> --}}
              </div>
              <!-- pagination -->
              <div class="pagination-area mt-5 pt-5 d-flex justify-content-center" wire:loading.class="invisible">
                  {{ $plans->links() }}
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
