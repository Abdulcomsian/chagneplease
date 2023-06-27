@foreach($plans as $plan)
    <div class="col-lg-4 plan">
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
                  $market  =  $plan->Market ? $plan->Market->rating ?? 0 : 0;
                  $traction  = $plan->Traction ? $plan->Traction->rating ?? 0 : 0;
                  $team  = $plan->Team ? $plan->Team->rating ?? 0 : 0; 
                  $businessModel  = $plan->BusinessModel ? $plan->BusinessModel->rating ?? 0 : 0;
                  $competition  = $plan->Competition ? $plan->Competition->rating ?? 0 : 0;
                  $corporateStructure = $plan->CorporateStructure ? $plan->CorporateStructure->rating ?? 0 : 0;
                  $existingFinancial  = $plan->ExistingFinancial ? $plan->ExistingFinancial->rating ?? 0 : 0;
                  $financial = $plan->Financial ? $plan->Financial->rating ?? 0 : 0;
                  $fund = $plan->Fund ? $plan->Fund->rating ?? 0 : 0;
                  $intellectualProperty = $plan->IntellectualProperty ? $plan->IntellectualProperty->rating ?? 0 : 0;

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
              ${{$plan->description}}
            </p>
            @php
            $totalWidth = ceil( ($plan->amount/$plan->investment) * 100)
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
        <h3><strong>Good Loop</strong></h3>
        <h5>Brooklyn Ny</h5>
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
        <a href="{{url('project-details',$plan->id)}}"><button type="button" class="btn btn-primary btn-lg btn-block w-100">View</button></a>
      </div> 
    </div>
@endforeach




{{-- <div class="row">
    <div class="col-lg-4">
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
              Lorem ipsum dolor sit amet, consectetur adipiscing elit ut
              aliquam, purus sit
            </p>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="progressNote">
              <span class="blueText">$574,920</span> raised of $1,000,000
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
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
              Lorem ipsum dolor sit amet, consectetur adipiscing elit ut
              aliquam, purus sit
            </p>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="progressNote">
              <span class="blueText">$574,920</span> raised of $1,000,000
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
              Lorem ipsum dolor sit amet, consectetur adipiscing elit ut
              aliquam, purus sit
            </p>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="progressNote">
              <span class="blueText">$574,920</span> raised of $1,000,000
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
              Lorem ipsum dolor sit amet, consectetur adipiscing elit ut
              aliquam, purus sit
            </p>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="progressNote">
              <span class="blueText">$574,920</span> raised of $1,000,000
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
              Lorem ipsum dolor sit amet, consectetur adipiscing elit ut
              aliquam, purus sit
            </p>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="progressNote">
              <span class="blueText">$574,920</span> raised of $1,000,000
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
              Lorem ipsum dolor sit amet, consectetur adipiscing elit ut
              aliquam, purus sit
            </p>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="progressNote">
              <span class="blueText">$574,920</span> raised of $1,000,000
            </p>
          </div>
        </div>
      </div>
    </div>
  </div> --}}