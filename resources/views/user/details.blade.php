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
                <p><strong> Question 1:How big is the market opportunity?</strong></p>

                <p>Answer: {{$plan->market ? $plan->market->market_opportunity : "-----"}}</p>

                <p><strong> Question 2:What Percentage of the market share do you hope to get?</strong></p>

                <p>Answer: {{$plan->market ? $plan->market->market_share : "-----"}}</p>

                <p><strong> Question 3:Who exactly is your best customer?</strong></p>

                <p>Answer: {{$plan->market ? $plan->market->customer : "-----"}}</p>

                <p><strong> Question 4:How long will this take?</strong></p>

                <p>Answer: {{$plan->market ? $plan->market->time_taken : "-----"}}</p>

                <p><strong> Question 5:How do you come up with these figures?</strong></p>

                <p>Answer: {{$plan->market ? $plan->market->figures : "-----"}}</p>

                <p><strong> Question 6:What is your PR strategy?</strong></p>

                <p>Answer: {{$plan->market ? $plan->market->pr_strategy : "-----"}}</p>

                <p><strong> Question 7:Who do you most aspire to be like?</strong></p>

                <p>Answer: {{$plan->market ? $plan->market->aspire : "-----"}}</p>

                <p><strong> Question 8:Who do you least want to be like?</strong></p>

                <p>Answer: {{$plan->market ? $plan->market->least_like : "-----"}}</p>

                <p><strong>Question 9:Why is this the right time for this product or service?</strong></p>

                <p>Answer: {{$plan->market ? $plan->market->right_time : "-----"}}</p>

                <p><strong>Question 10:What is your marketing strategy?</strong></p>

                <p>Answer: {{$plan->market ? $plan->market->strategy : "-----"}}</p>
            </div>
            {{-- market ends here --}}

            {{-- team starts here --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">

                <p><strong>Question 1:Where are your headquarters?</strong></p>

                <p>Answer: {{$plan->team ? $plan->team->headquarter : "-----"}}</p>

                <p><strong>Question 2:Who are the founders?</strong></p>

                <p>Answer: {{$plan->team ? $plan->team->founders : "-----"}}</p>

                <p><strong>Question 3:Who are key team members?</strong></p>

                <p>Answer: {{$plan->team ? $plan->team->team_members : "-----"}}</p>

                <p><strong>Question 4:Any existing board members?</strong></p>

                <p>Answer: {{$plan->team ? $plan->team->board_members : "-----"}}</p>

                <p><strong>Question 5:What key roles may need to be hired for soon?</strong></p>

                <p>Answer: {{$plan->team ? $plan->team->roles : "-----"}}</p>

                <p><strong>Question 6:What experience do you have in the industry?</strong></p>

                <p>Answer: {{$plan->team ? $plan->team->experience : "-----"}}</p>

                <p><strong>Question 7:Why are you the right person to bet on to achieve this?</strong></p>

                <p>Answer: {{$plan->team ? $plan->team->right_person : "-----"}}</p>

                <p><strong>Question 8:What motivates you?</strong></p>

                <p>Answer: {{$plan->team ? $plan->team->motivation : "-----"}}</p>

                <p><strong>Question 9:Are any of the founder willing to be bought out now?</strong></p>

                <p>Answer: {{$plan->team ? $plan->team->founder : "-----"}}</p>

                <p><strong>Question 10:Are there any other people who may claim they are owed or responsible for your ideas?</strong></p>

                <p>Answer: {{$plan->team ? $plan->team->responsible_idea : "-----"}}</p>
            </div>
            {{-- team ends here --}}

            {{-- traction starts here --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
              
                <p><strong>Question 1:How much feedback you have recieved so far?</strong></p>

                <p>Answer:{{$plan->traction ? $plan->traction->feedback : "-----"}}</p>

                <p><strong>Question 2:What changes have you made based on that feedback?</strong></p>

                <p>Answer:{{$plan->traction ? $plan->traction->changes : "-----"}}</p>

                <p><strong>Question 3:How many actual users do you have?</strong></p>

                <p>Answer:{{$plan->traction ? $plan->traction->actual_user : "-----"}}</p>

                <p><strong>Question 4:How long do users stay on average?</strong></p>

                <p>Answer:{{$plan->traction ? $plan->traction->average_stay : "-----"}}</p>

                <p><strong>Question 5:How many actual sales you have made?</strong></p>

                <p>Answer:{{$plan->traction ? $plan->traction->actual_sales : "-----"}}</p>

                <p><strong>Question 6:What is the annual growth rate?</strong></p>

                <p>Answer:{{$plan->traction ? $plan->traction->annual_growth : "-----"}}</p>

                <p><strong>Question 7:Total rate of growth?</strong></p>

                <p>Answer:{{$plan->traction ? $plan->traction->growth_rate : "-----"}}</p>

                <p><strong>Question 8:Has growth been linear and consistent?</strong></p>

                <p>Answer:{{$plan->traction ? $plan->traction->growth_linear_consistent : "-----"}}</p>

                <p><strong>Question 9:What has held back your growth?</strong></p>

                <p>Answer:{{$plan->traction ? $plan->traction->held_back : "-----"}}</p>

                <p><strong>Question 10:can you provide a demonstration of the product or service now?</strong></p>

                <p>Answer:{{$plan->traction ? $plan->traction->demonstration : "-----"}}</p>
            </div>
            {{-- traction ends here --}}

            {{-- business model starts here --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-4" role="tabpanel" aria-labelledby="ex-with-icons-tab-4">
         
                    <p><strong>Which specific marketing channels are you using?</strong></p>

                    <p>Answer:{{$plan->businessModel ? $plan->businessModel->specific_channels : "-----"}}</p>
        
                    <p><strong>Question 2:Why are you using these marketing channels?</strong></p>
        
                    <p>Answer:{{$plan->businessModel ? $plan->businessModel->marketing_channels : "-----"}}</p>
        
                    <p><strong>Question 3:What is your plan B, if these sales channels are interrupted?</strong></p>
        
                    <p>Answer:{{$plan->businessModel ? $plan->businessModel->plan_b : "-----"}}</p>
        
                    <p><strong>Question 4:What profit margins are you operating on?</strong></p>
        
                    <p>Answer:{{$plan->businessModel ? $plan->businessModel->profit_margin : "-----"}}</p>
        
                    <p><strong>Question 5:How will scalling impact profit margins?</strong></p>
        
                    <p>Answer:{{$plan->businessModel ? $plan->businessModel->scalling_impact : "-----"}}</p>
        
                    <p><strong>Question 6:What pivots have you already made up until now?</strong></p>
        
                    <p>Answer:{{$plan->businessModel ? $plan->businessModel->pivots : "-----"}}</p>
        
                    <p><strong>Question 7:Can you tell me a story about how a customer has decided to choose you and their experience with your product?</strong></p>
        
                    <p>Answer:{{$plan->businessModel ? $plan->businessModel->customer_story : "-----"}}</p>
        
                    <p><strong>Question 8:Who in the organization is most replaceable?</strong></p>
        
                    <p>Answer:{{$plan->businessModel ? $plan->businessModel->replaceable : "-----"}}</p>
        
                    <p><strong>Question 9:What unique features are you working on?</strong></p>
        
                    <p>Answer:{{$plan->businessModel ? $plan->businessModel->unique_feature : "-----"}}</p>
        
                    <p><strong>Question 10:What other streams of revenue can be added to this?</strong></p>
        
                    <p>Answer:{{$plan->businessModel ? $plan->businessModel->revenue_stream : "-----"}}</p>
            </div>
            {{-- business model ends here --}}

            {{-- competition starts here --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-5" role="tabpanel" aria-labelledby="ex-with-icons-tab-5">
                
                <p><strong>Which specific marketing channels are you using?</strong></p>

                <p>Answer:{{$plan->businessModel ? $plan->businessModel->specific_channels : "-----"}}</p>
    
                <p><strong>Question 2:Why are you using these marketing channels?</strong></p>
    
                <p>Answer:{{$plan->businessModel ? $plan->businessModel->marketing_channels : "-----"}}</p>
    
                <p><strong>Question 3:What is your plan B, if these sales channels are interrupted?</strong></p>
    
                <p>Answer:{{$plan->businessModel ? $plan->businessModel->plan_b : "-----"}}</p>
    
                <p><strong>Question 4:What profit margins are you operating on?</strong></p>
    
                <p>Answer:{{$plan->businessModel ? $plan->businessModel->profit_margin : "-----"}}</p>
    
                <p><strong>Question 5:How will scalling impact profit margins?</strong></p>
    
                <p>Answer:{{$plan->businessModel ? $plan->businessModel->scalling_impact : "-----"}}</p>
    
                <p><strong>Question 6:What pivots have you already made up until now?</strong></p>
    
                <p>Answer:{{$plan->businessModel ? $plan->businessModel->pivots : "-----"}}</p>
    
                <p><strong>Question 7:Can you tell me a story about how a customer has decided to choose you and their experience with your product?</strong></p>
    
                <p>Answer:{{$plan->businessModel ? $plan->businessModel->customer_story : "-----"}}</p>
    
                <p><strong>Question 8:Who in the organization is most replaceable?</strong></p>
    
                <p>Answer:{{$plan->businessModel ? $plan->businessModel->replaceable : "-----"}}</p>
    
                <p><strong>Question 9:What unique features are you working on?</strong></p>
    
                <p>Answer:{{$plan->businessModel ? $plan->businessModel->unique_feature : "-----"}}</p>
    
                <p><strong>Question 10:What other streams of revenue can be added to this?</strong></p>
    
                <p>Answer:{{$plan->businessModel ? $plan->businessModel->revenue_stream : "-----"}}</p>
            </div>
            {{-- competition ends here --}}


            {{-- corporate structure starts here --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-6" role="tabpanel" aria-labelledby="ex-with-icons-tab-6">
                <p><strong>Question 1:How is the company organized?</strong></p>

                <p>Answer:{{$plan->corporateStructure ? $plan->corporateStructure->organized_company : "-----"}}</p>
    
                <p><strong>Question 2:Who hold which titles?</strong></p>
    
                <p>Answer:{{$plan->corporateStructure ? $plan->corporateStructure->hold_titles : "-----"}}</p>
    
                <p><strong>Question 3:How are shares split?</strong></p>
    
                <p>Answer:{{$plan->corporateStructure ? $plan->corporateStructure->split_shares : "-----"}}</p>
    
                <p><strong>Question 4:What profit margins are you operating on?</strong></p>
    
                <p>Answer:{{$plan->corporateStructure ? $plan->corporateStructure->existing_board : "-----"}}</p>
    
                <p><strong>Question 5:Where is the company registered?</strong></p>
    
                <p>Answer:{{$plan->corporateStructure ? $plan->corporateStructure->registered_company : "-----"}}</p>
    
                <p><strong>Question 6:Who handles accounting?</strong></p>
    
                <p>Answer:{{$plan->corporateStructure ? $plan->corporateStructure->account_handling : "-----"}}</p>
    
                <p><strong>Question 7:What unique skills and talents does each owner contribute?</strong></p>
    
                <p>Answer:{{$plan->corporateStructure ? $plan->corporateStructure->talent_skills : "-----"}}</p>
    
                <p><strong>Question 8:Name someone you chose not to include as a founder and why?</strong></p>
    
                <p>Answer:{{$plan->corporateStructure ? $plan->corporateStructure->selected_founder : "-----"}}</p>
    
                <p><strong>Question 9:Who filed the company?</strong></p>
    
                <p>Answer:{{$plan->corporateStructure ? $plan->corporateStructure->employee_selector : "-----"}}</p>
    
                <p><strong>Question 10:Who is the registered agent on record?</strong></p>
    
                <p>Answer:{{$plan->corporateStructure ? $plan->corporateStructure->registered_agent : "-----"}}</p>
            </div>
            {{-- corporate structure ends here --}}

            {{-- existing financial starts here  --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-7" role="tabpanel" aria-labelledby="ex-with-icons-tab-7">
                <p><strong>Question 1:What is your exit goal?(i.e IPO, M&A)</strong></p>

                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->exit_goal : "-----"}}</p>
    
                <p><strong>Question 2:What is your expected time frame for this?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->expected_time_frame : "-----"}}</p>
    
                <p><strong>Question 3:Who do you imagine will help you exit?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->help_exit : "-----"}}</p>
    
                <p><strong>Question 4:When do you expect you will be conducting a follow up round of fundraising?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->follow_up_round : "-----"}}</p>
    
                <p><strong>Question 5:How much money is your pre-money valuation?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->valuation : "-----"}}</p>
    
                <p><strong>Question 6:how are you determining current valuation?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->current_valuation : "-----"}}</p>
    
                <p><strong>Question 7:How much are you trying to raise now?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->current_raisings : "-----"}}</p>
    
                <p><strong>Question 8:How many previous investors will participate in this round?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->previous_investor : "-----"}}</p>
    
                <p><strong>Question 9:What is the next milestone this money will take you to?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->next_milestone : "-----"}}</p>
    
                <p><strong>Question 10:How else do you hope an investor will help beyond money?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->investor_help : "-----"}}</p>

                <p><strong>Question 11:Numbers of customer?</strong></p>

                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->total_customer : "-----"}}</p>
    
                <p><strong>Question 12:What country based in?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->operation_country : "-----"}}</p>
    
                <p><strong>Question 13:What countries do you operate in?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->operation_country : "-----"}}</p>
    
                <p><strong>Question 14:Date Founded?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->founded_date : "-----"}}</p>
    
                <p><strong>Question 15:Stage of maturity</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->maturity : "-----"}}</p>
    
                <p><strong>Question 16:Number of full-time employees?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->full_time_employee : "-----"}}</p>
    
                <p><strong>Question 17:Annual revenue 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->annual_revenue : "-----"}}</p>
    
                <p><strong>Question 18:Projected revenue 2023, 2024, 2025, 2026, 2027?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->projected_revenue : "-----"}}</p>
    
                <p><strong>Question 19:Net Profit 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->net_profit : "-----"}}</p>
    
                <p><strong>Question 20:Cach Balance (31 Dec 2021)?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->cach_balance : "-----"}}</p>

                <p><strong>Question 21:Funding request?</strong></p>
    
                <p>Answer:{{$plan->existingFinancial ? $plan->existingFinancial->funding_request : "-----"}}</p>
            </div>
            {{-- existing financial ends here --}}

            {{-- financial starts here  --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-8" role="tabpanel" aria-labelledby="ex-with-icons-tab-8">
                <p><strong>Question 1:How are you marketing your product or service?</strong></p>

                <p>Answer:{{$plan->financial ? $plan->financial->product_marketing : "-----"}}</p>
    
                <p><strong>Question 2:How much is your marketing budget?</strong></p>
    
                <p>Answer:{{$plan->financial ? $plan->financial->marketing_budget : "-----"}}</p>
    
                <p><strong>Question 3:What are your per customer acquisition costs?</strong></p>
    
                <p>Answer:{{$plan->financial ? $plan->financial->acquisition_cost : "-----"}}</p>
    
                <p><strong>Question 4:How much is your customer lifetime value?</strong></p>
    
                <p>Answer:{{$plan->financial ? $plan->financial->lifetime_value : "-----"}}</p>
    
                <p><strong>Question 5:How much equity and debt has been raised in the past?</strong></p>
    
                <p>Answer:{{$plan->financial ? $plan->financial->equity_debt : "-----"}}</p>
    
                <p><strong>Question 6:Who participated in earlier round of fundraising?</strong></p>
    
                <p>Answer:{{$plan->financial ? $plan->financial->fundraising : "-----"}}</p>
    
                <p><strong>Question 7:What is your burn rate?</strong></p>
    
                <p>Answer:{{$plan->financial ? $plan->financial->burn_rate : "-----"}}</p>
    
                <p><strong>Question 8:How long will it take to become profitable?</strong></p>
    
                <p>Answer:{{$plan->financial ? $plan->financial->time_period : "-----"}}</p>
    
                <p><strong>Question 9:What are the key metrics your team is focused on?</strong></p>
    
                <p>Answer:{{$plan->financial ? $plan->financial->metrics_key : "-----"}}</p>
    
                <p><strong>Question 10:What stock options have been given already? What is the distribution of equity between founders?</strong></p>
    
                <p>Answer:{{$plan->financial ? $plan->financial->stock_options : "-----"}}</p>
            </div>
            {{-- financial ends here --}}

            {{-- fund starts here  --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-9" role="tabpanel" aria-labelledby="ex-with-icons-tab-9">
                <p><strong>Question 1:How will these funds be allocated?</strong></p>

                <p>Answer:{{$plan->fund ? $plan->fund->funds_allocated : "-----"}}</p>
    
                <p><strong>Question 2:How much will be spent on founders salaries?</strong></p>
    
                <p>Answer:{{$plan->fund ? $plan->fund->spent : "-----"}}</p>
    
                <p><strong>Question 3:How much will be spent on overhead versus expansion?</strong></p>
    
                <p>Answer:{{$plan->fund ? $plan->fund->expansion : "-----"}}</p>
    
                <p><strong>Question 4:What if you don't get all the money you are asking for?</strong></p>
    
                <p>Answer:{{$plan->fund ? $plan->fund->not_recieved_money : "-----"}}</p>
    
                <p><strong>Question 5:What assets will be invested in with this capital?</strong></p>
    
                <p>Answer:{{$plan->fund ? $plan->fund->asset_invested : "-----"}}</p>
    
                <p><strong>Question 6:What are your milestones?</strong></p>
    
                <p>Answer:{{$plan->fund ? $plan->fund->milestones : "-----"}}</p>
    
                <p><strong>Question 7:What are the biggest risks to my investment?</strong></p>
    
                <p>Answer:{{$plan->fund ? $plan->fund->biggest_risks : "-----"}}</p>
    
                <p><strong>Question 8:Why are you choosing this method of raising capital?</strong></p>
    
                <p>Answer:{{$plan->fund ? $plan->fund->raising_capitals : "-----"}}</p>
    
                <p><strong>Question 9:How much this money will be used for future fundraising efforts?</strong></p>
    
                <p>Answer:{{$plan->fund ? $plan->fund->fundraising_efforts : "-----"}}</p>
    
                <p><strong>Question 10:How much are you personal expenses each month?</strong></p>
    
                <p>Answer:{{$plan->fund ? $plan->fund->personal_expenses : "-----"}}</p>
            </div>
            {{-- funds ends here --}}

            {{-- intellectual property starts here --}}
            <div class="tab-pane fade" id="ex-with-icons-tabs-10" role="tabpanel" aria-labelledby="ex-with-icons-tab-10">
                <p><strong>Question 1:What is unique about the company?</strong></p>

                <p>Answer:{{$plan->intellectualProperty ? $plan->intellectualProperty->funds_allocated : "-----"}}</p>
    
                <p><strong>Question 2:What Big problem does it solve?</strong></p>
    
                <p>Answer:{{$plan->intellectualProperty ? $plan->intellectualProperty->problem_solve : "-----"}}</p>
    
                <p><strong>Question 3:What legal risks do you see?</strong></p>
    
                <p>Answer:{{$plan->intellectualProperty ? $plan->intellectualProperty->legal_risk : "-----"}}</p>
    
                <p><strong>Question 4:Are you aware of any product liability risks?</strong></p>
    
                <p>Answer:{{$plan->intellectualProperty ? $plan->intellectualProperty->product_liability : "-----"}}</p>
    
                <p><strong>Question 5:What regulatory risks could impact this business?</strong></p>
    
                <p>Answer:{{$plan->intellectualProperty ? $plan->intellectualProperty->regulatory_risk : "-----"}}</p>
    
                <p><strong>Question 6:What intellectual property do you own?</strong></p>
    
                <p>Answer:{{$plan->intellectualProperty ? $plan->intellectualProperty->intellectual_property : "-----"}}</p>
    
                <p><strong>Question 7:Who developed any intellectual property owned?</strong></p>
    
                <p>Answer:{{$plan->intellectualProperty ? $plan->intellectualProperty->developed_intellectual_property : "-----"}}</p>
    
                <p><strong>Question 8:Have any employees or partners have left who may challenge these rights?</strong></p>
    
                <p>Answer:{{$plan->intellectualProperty ? $plan->intellectualProperty->person_left : "-----"}}</p>
    
                <p><strong>Question 9:Are there any additional patents pending or planned?</strong></p>
    
                <p>Answer:{{$plan->intellectualProperty ? $plan->intellectualProperty->additional_partner : "-----"}}</p>
    
                <p><strong>Question 10:How are any current intellectual assets owned?</strong></p>
    
                <p>Answer:{{$plan->intellectualProperty ? $plan->intellectualProperty->current_intellectual_assets : "-----"}}</p>
            </div>
            {{-- intellectual property ends here --}}
        </div>
        <!-- Tabs content -->
    </div>
</div>


@endsection