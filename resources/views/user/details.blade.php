@extends('user.main')
@section('style')
<style>
    ul li a img{
        height: 30px;
    }
</style>
@endsection

@section('main-content')
<div class="container-fluid">
    <div class="row">
        <!-- Tabs navs -->
        <ul class="nav nav-tabs mb-3 d-flex justify-content-center" id="ex-with-icons" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="ex-with-icons-tab-1" data-bs-toggle="tab" href="#ex-with-icons-tabs-1" role="tab"
                    aria-controls="ex-with-icons-tabs-1" aria-selected="true"><img src="{{asset('images/market.png')}}" alt=""> Market</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex-with-icons-tab-2" data-bs-toggle="tab" href="#ex-with-icons-tabs-2" role="tab"
                    aria-controls="ex-with-icons-tabs-2" aria-selected="false"><img src="{{asset('images/team.png')}}" alt="">Team</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex-with-icons-tab-3" data-bs-toggle="tab" href="#ex-with-icons-tabs-3" role="tab"
                    aria-controls="ex-with-icons-tabs-3" aria-selected="false"><img src="{{asset('images/traction.png')}}" alt="">Traction</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex-with-icons-tab-4" data-bs-toggle="tab" href="#ex-with-icons-tabs-4" role="tab"
                    aria-controls="ex-with-icons-tabs-4" aria-selected="true"><img src="{{asset('images/business-model.png')}}" alt="">Business Model</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex-with-icons-tab-5" data-bs-toggle="tab" href="#ex-with-icons-tabs-5" role="tab"
                    aria-controls="ex-with-icons-tabs-5" aria-selected="false"><img src="{{asset('images/competition.png')}}" alt="">Competition</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex-with-icons-tab-6" data-bs-toggle="tab" href="#ex-with-icons-tabs-6" role="tab"
                    aria-controls="ex-with-icons-tabs-6" aria-selected="false"><img src="{{asset('images/corporate-structure.png')}}" alt="">Corporate Structure</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex-with-icons-tab-7" data-bs-toggle="tab" href="#ex-with-icons-tabs-7" role="tab"
                    aria-controls="ex-with-icons-tabs-7" aria-selected="true"><img src="{{asset('images/existing-financial.png')}}" alt="">Existing Financial</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex-with-icons-tab-8" data-bs-toggle="tab" href="#ex-with-icons-tabs-8" role="tab"
                    aria-controls="ex-with-icons-tabs-8" aria-selected="false"><img src="{{asset('images/financial.png')}}" alt="">Financial</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex-with-icons-tab-9" data-bs-toggle="tab" href="#ex-with-icons-tabs-9" role="tab"
                    aria-controls="ex-with-icons-tabs-9" aria-selected="false"><img src="{{asset('images/fund.png')}}" alt="">Fund</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex-with-icons-tab-10" data-bs-toggle="tab" href="#ex-with-icons-tabs-10" role="tab"
                    aria-controls="ex-with-icons-tabs-10" aria-selected="false"><img src="{{asset('images/intellectual-property.png')}}" alt="">Intellectual Property</a>
            </li>
        </ul>
        <!-- Tabs navs -->
        
        <!-- Tabs content -->
        <div class="tab-content d-flex justify-content-center" id="ex-with-icons-content">
            {{-- market starts here --}}
            <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1">
                @php 
                    $marketCount = 0;
                    $aiQuestion = json_decode($plan->marketAiQuestion->question);
                    $aiAnswer = json_decode($plan->marketAiQuestion->answer);
                    // dd($answer);
                @endphp
                @foreach($plan->marketAnswer as $answer)
                <p><strong> Question {{++$marketCount}}: {{$answer->question->question}}</strong></p>

                <p>Answer: {{$answer->answer}}</p>
                @endforeach
                @for($i=0; $i<sizeof($aiQuestion); $i++)
                <p><strong> Question {{++$marketCount}}: {{$aiQuestion[$i]}} </strong></p>

                <p>Answer: {{$aiAnswer[$i]}}</p>
                @endfor
            </div>
            {{-- market ends here --}}

            {{-- team starts here --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">
                @php 
                    $teamCount = 0;
                    $aiQuestion = json_decode($plan->teamAiQuestion->question);
                    $aiAnswer = json_decode($plan->teamAiQuestion->answer);
                    // dd($answer);
                @endphp
                @foreach($plan->teamAnswer as $answer)
                <p><strong> Question {{++$teamCount}}: {{$answer->question->question}}</strong></p>

                <p>Answer: {{$answer->answer}}</p>
                @endforeach
                @for($i=0; $i<sizeof($aiQuestion); $i++)
                <p><strong> Question {{++$teamCount}}: {{$aiQuestion[$i]}} </strong></p>

                <p>Answer: {{$aiAnswer[$i]}}</p>
                @endfor
            </div>
            {{-- team ends here --}}

            {{-- traction starts here --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
                @php 
                    $tractionCount = 0;
                    $aiQuestion = json_decode($plan->tractionAiQuestion->question);
                    $aiAnswer = json_decode($plan->tractionAiQuestion->answer);
                    // dd($answer);
                @endphp
                @foreach($plan->tractionAnswer as $answer)
                <p><strong> Question {{++$tractionCount}}: {{$answer->question->question}}</strong></p>

                <p>Answer: {{$answer->answer}}</p>
                @endforeach
                @for($i=0; $i<sizeof($aiQuestion); $i++)
                <p><strong> Question {{++$tractionCount}}: {{$aiQuestion[$i]}} </strong></p>

                <p>Answer: {{$aiAnswer[$i]}}</p>
                @endfor
            </div>
            {{-- traction ends here --}}

            {{-- business model starts here --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-4" role="tabpanel" aria-labelledby="ex-with-icons-tab-4">
                @php 
                    $bunsinessCount = 0;
                    $aiQuestion = json_decode($plan->businessAiQuestion->question);
                    $aiAnswer = json_decode($plan->businessAiQuestion->answer);
                    // dd($answer);
                @endphp
                @foreach($plan->businessAnswer as $answer)
                <p><strong> Question {{++$bunsinessCount}}: {{$answer->question->question}}</strong></p>

                <p>Answer: {{$answer->answer}}</p>
                @endforeach
                @for($i=0; $i<sizeof($aiQuestion); $i++)
                <p><strong> Question {{++$bunsinessCount}}: {{$aiQuestion[$i]}} </strong></p>

                <p>Answer: {{$aiAnswer[$i]}}</p>
                @endfor
            </div>
            {{-- business model ends here --}}

            {{-- competition starts here --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-5" role="tabpanel" aria-labelledby="ex-with-icons-tab-5">
                @php 
                    $competitionCount = 0;
                    $aiQuestion = json_decode($plan->competitionAiQuestion->question);
                    $aiAnswer = json_decode($plan->competitionAiQuestion->answer);
                    // dd($answer);
                @endphp
                @foreach($plan->competitionAnswer as $answer)
                <p><strong> Question {{++$competitionCount}}: {{$answer->question->question}}</strong></p>

                <p>Answer: {{$answer->answer}}</p>
                @endforeach
                @for($i=0; $i<sizeof($aiQuestion); $i++)
                <p><strong> Question {{++$competitionCount}}: {{$aiQuestion[$i]}} </strong></p>

                <p>Answer: {{$aiAnswer[$i]}}</p>
                @endfor
            </div>
            {{-- competition ends here --}}


            {{-- corporate structure starts here --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-6" role="tabpanel" aria-labelledby="ex-with-icons-tab-6">
                @php 
                    $corporateCount = 0;
                    $aiQuestion = json_decode($plan->corporateAiQuestion->question);
                    $aiAnswer = json_decode($plan->corporateAiQuestion->answer);
                    // dd($answer);
                @endphp
                @foreach($plan->corporateAnswer as $answer)
                <p><strong> Question {{++$corporateCount}}: {{$answer->question->question}}</strong></p>

                <p>Answer: {{$answer->answer}}</p>
                @endforeach
                @for($i=0; $i<sizeof($aiQuestion); $i++)
                <p><strong> Question {{++$corporateCount}}: {{$aiQuestion[$i]}} </strong></p>

                <p>Answer: {{$aiAnswer[$i]}}</p>
                @endfor
            </div>
            {{-- corporate structure ends here --}}

            {{-- existing financial starts here  --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-7" role="tabpanel" aria-labelledby="ex-with-icons-tab-7">
                @php 
                    $investmentCount = 0;
                    $aiQuestion = json_decode($plan->investmentAiQuestion->question);
                    $aiAnswer = json_decode($plan->investmentAiQuestion->answer);
                    // dd($answer);
                @endphp
                @foreach($plan->investmentAnswer as $answer)
                <p><strong> Question {{++$investmentCount}}: {{$answer->question->question}}</strong></p>

                <p>Answer: {{$answer->answer}}</p>
                @endforeach
                @for($i=0; $i<sizeof($aiQuestion); $i++)
                <p><strong> Question {{++$investmentCount}}: {{$aiQuestion[$i]}} </strong></p>

                <p>Answer: {{$aiAnswer[$i]}}</p>
                @endfor
            </div>
            {{-- existing financial ends here --}}

            {{-- financial starts here  --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-8" role="tabpanel" aria-labelledby="ex-with-icons-tab-8">
                @php 
                    $financialCount = 0;
                    $aiQuestion = json_decode($plan->financialAiQuestion->question);
                    $aiAnswer = json_decode($plan->financialAiQuestion->answer);
                    // dd($answer);
                @endphp
                @foreach($plan->financialAnswer as $answer)
                <p><strong> Question {{++$financialCount}}: {{$answer->question->question}}</strong></p>

                <p>Answer: {{$answer->answer}}</p>
                @endforeach
                @for($i=0; $i<sizeof($aiQuestion); $i++)
                <p><strong> Question {{++$financialCount}}: {{$aiQuestion[$i]}} </strong></p>

                <p>Answer: {{$aiAnswer[$i]}}</p>
                @endfor
            </div>
            {{-- financial ends here --}}

            {{-- fund starts here  --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-9" role="tabpanel" aria-labelledby="ex-with-icons-tab-9">
                @php 
                    $fundCount = 0;
                    $aiQuestion = json_decode($plan->fundAiQuestion->question);
                    $aiAnswer = json_decode($plan->fundAiQuestion->answer);
                    // dd($answer);
                @endphp
                @foreach($plan->fundAnswer as $answer)
                <p><strong> Question {{++$fundCount}}: {{$answer->question->question}}</strong></p>

                <p>Answer: {{$answer->answer}}</p>
                @endforeach
                @for($i=0; $i<sizeof($aiQuestion); $i++)
                <p><strong> Question {{++$fundCount}}: {{$aiQuestion[$i]}} </strong></p>

                <p>Answer: {{$aiAnswer[$i]}}</p>
                @endfor
            </div>
            {{-- funds ends here --}}

            {{-- intellectual property starts here --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-10" role="tabpanel" aria-labelledby="ex-with-icons-tab-10">
                @php 
                    $intellectualCount = 0;
                    $aiQuestion = json_decode($plan->intellectualAiQuestion->question);
                    $aiAnswer = json_decode($plan->intellectualAiQuestion->answer);
                    // dd($answer);
                @endphp
                @foreach($plan->intellectualAnswer as $answer)
                <p><strong> Question {{++$intellectualCount}}: {{$answer->question->question}}</strong></p>

                <p>Answer: {{$answer->answer}}</p>
                @endforeach
                @for($i=0; $i<sizeof($aiQuestion); $i++)
                <p><strong> Question {{++$intellectualCount}}: {{$aiQuestion[$i]}} </strong></p>

                <p>Answer: {{$aiAnswer[$i]}}</p>
                @endfor
            </div>
            {{-- intellectual property ends here --}}
        </div>
        <!-- Tabs content -->
    </div>
</div>


@endsection