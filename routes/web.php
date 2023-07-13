<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminController,
    DashboardController,
    AnalystController,
    InvesteeController,
    BusinessModelController,
    CompetitionController,
    CorporateStructureController,
    ExistingFinancialRoundController,
    FinancialController,
    FundsController,
    IntellectualPropertyController,
    MarketController,
    TeamController,
    TractionController,
    UserController,
    PlanController,
    TestController,
    ScreeningController,
    AiQuestionController
};
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::view('invester/login' , 'invester.invester-login')->name('invester.login');

Route::view('investee/signup' , 'investee.investee-signup')->name('investee.signup');

Route::get('/' , [UserController::class ,'get_home'])->name('main.home');

Route::get('/home' , [UserController::class ,'get_home'])->name('user.home');
// load plan
Route::post('/load-more-plan' , [PlanController::class , 'load_more_plan'])->name('load.more.plan');

// user route starts here
Route::group(['middleware' => ['auth' ,'auth.investee', 'preventBackHistory']] , function(){

    Route::get('/signed-up' , [UserController::class , 'get_signed_up'])->name('user.signed_up');
    // adding market plan
    Route::post('/add-market' , [MarketController::class ,'add_market'])->name('market.add_market');
    // adding traction plan
    Route::post('/add-traction' ,[TractionController::class ,'add_traction'])->name('traction.add_traction');
    // adding team plan
    Route::post('/add-team' ,[TeamController::class ,'add_team'])->name('team.add_team');
    // adding Competition plan
    Route::post('/add-Competition' ,[CompetitionController::class ,'add_competition'])->name('competition.add_competition');
    // adding Financial plan
    Route::post('/add-financial' ,[FinancialController::class ,'add_financial'])->name('financial.add_financial');
    // adding Intellectual Property plan
    Route::post('/add-intellectual-property' ,[IntellectualPropertyController::class ,'add_intellectual_property'])->name('intellectual_property.add_intellectual_property');
    // adding Business Model Plan
    Route::post('/add-business-model' ,[BusinessModelController::class ,'add_business_model'])->name('business_model.add_business_model');
    // adding Funds Plan
    Route::post('/add-funds' ,[FundsController::class ,'add_funds'])->name('funds.add_funds');
    // adding Corporate Structure Plan
    Route::post('/add-corporate-structure' ,[CorporateStructureController::class ,'add_corporate_structure'])->name('corporate_structure.add_corporate_structure');
    // adding Corporate Structure Plan
    Route::post('/add-existing-financial' ,[ExistingFinancialRoundController::class ,'add_existing_financial'])->name('existing_financial.add_existing_financial');
    // done page
    Route::get('/done' , [UserController::class , 'get_done'])->name('user.done');
    // user plan list page
    Route::get('/user-plan',[PlanController::class , 'get_user_plans'])->name('user.plans');
    // user plan list
    Route::get('/user-plan-list' , [PlanController::class , 'get_user_plan_list'])->name('user.plan_list');
    // delete user plan
    Route::get('/delete-plan/{id}' , [PlanController::class , 'delete_user_plan'])->name('delete-plan');
    //Investee Question
    Route::get('/investee-questions/{planId}', [UserController::class , 'get_investee_question_form'])->name('user.investee_question_form');
    //Plan Conclusion
    Route::get('/plan-conclusion/{planId}', [UserController::class , 'get_plan_conclusion']);
    //Add Plan Conclustion
    Route::post('/add-plan-conclusion' , [UserController::class , 'plan_conclusion'])->name('plan.conclusion');
    //User Profile
    Route::get('/user-profile' , [UserController::class , "get_user_profile"])->name('user.profile');
    //Update Username
    Route::post('/update-username' , [UserController::class , "update_username"])->name('update.username');
    //Update password
    Route::post('/update-password' , [UserController::class , "update_password"])->name('update.password');
    //Add plan    
    Route::post("add-plan" , [PlanController::class , 'add_plan'])->name('plan.add');
    //Add Screening
    Route::post("add-screening" , [ScreeningController::class , 'add_screening'])->name('screening.add');
    //Generate ai question
    Route::post("generate-ai-question" ,[AiQuestionController::class , 'createAiQuestion'] )->name('generate.ai.question');
    //Generate ai bonus question
    Route::post("generate-ai-bonus-question" , [AiQuestionController::class , 'createAiBonusQuestion'])->name('generate.ai.bonus.question');
    //Add bonus ai question
    Route::post('add-ai-bonus-question' , [AiQuestionController::class , 'addAiBonusQuestion'])->name('add.ai.bonus.question');
    //Store Ai Question
    Route::post('store-ai-question' , [AiQuestionController::class , 'storeAiQuestion'])->name('store.ai.question');
    //Clear form
    Route::post('clear-form' , [AiQuestionController::class , 'clearQuestions'])->name('clear.question');
});













Route::get('/general-information' , [UserController::class , 'get_general_information'])->name('user.general_information');
Route::get('/business-information/{id}' , [UserController::class , 'get_business_information']);
Route::get('/services' , [UserController::class ,'get_service'])->name('user.service');
Route::get('/offerings' , [UserController::class , 'get_offerings'])->name('user.offerings');
Route::get('/filter' , [UserController::class ,'get_filter'])->name('user.filter');
Route::get('/project-details/{id}' , [UserController::class , 'get_project_details']);
Route::get('/invester-information' ,[UserController::class, 'get_invester'])->name('user.invester');
Route::get('/plan' ,[UserController::class , 'get_plan_statistics'])->name('user.plan');
Route::get('/investee-profile' , [UserController::class , 'get_investee_profile'])->name('user.investee_profile');
Route::get('/answer' , [UserController::class , 'get_investee_answers'])->name('user.answer');
Route::get('/logout' , [App\Http\Controllers\Auth\LoginController::class , 'logout'])->name('user.logout');
























// user route ends here

Route::group( ["prefix" => "admin"] , function(){
    Route::group(['middleware' => "admin.guest"] , function(){
        Route::view("/login" , "admin_auth.admin_login")->name('admin.login');
        Route::post("/authenticate-admin" , [AdminController::class , 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => "admin.authenticate"] , function(){
        Route::get('/' , [DashboardController::class , 'get_admin_dashboard'])->name('admin');
        Route::get('/home', [DashboardController::class , 'get_admin_dashboard'])->name('admin.dashboard');
        Route::get('/analyst-list' , [AnalystController::class , 'get_analyst'])->name('admin.analyst');
        Route::post('/add-analyst' , [AnalystController::class , 'add_analyst'])->name('admin.add.analyst');
        Route::post('/edit-analyst' , [AnalystController::class , 'edit_analyst'])->name('admin.edit.analyst');
        Route::post('/delete-analyst' , [AnalystController::class , 'delete_analyst'])->name('admin.delete.analyst');
        Route::get('/investee-list' , [UserController::class,'get_investee_page'])->name('admin.investee.page');
        Route::get('/invester-list' , [UserController::class,'get_invester_page'])->name('admin.invester.page');
        Route::post('/investee-list' , [UserController::class,'get_investee_list'])->name('admin.investee.list');
        Route::post('/invester-list' , [UserController::class,'get_invester_list'])->name('admin.invester.list');
        Route::post('/update-investee' , [UserController::class,'update_investee'])->name('admin.update.investee');
        Route::post('/update-invester' , [UserController::class,'update_invester'])->name('admin.update.invester');
        Route::post('/delete-investee' , [UserController::class,'delete_investee'])->name('admin.delete.investee');
        Route::post('/delete-invester' , [UserController::class,'delete_invester'])->name('admin.delete.invester');
        Route::post('/get-user' , [UserController::class,'get_user_detail'])->name('admin.get.user.detail');
        Route::get('/logout' , [AdminController::class , 'logout'])->name('admin.logout');
        
        // Route::get('/home' , [AdminController::class , 'home'])->name('admin.dashboard');
        // Route::get('/' , [AdminController::class , 'home'])->name('admin');
    });
});


Route::group(["prefix" => "analyst"] , function(){
    Route::group(["middleware" => "analyst.guest"] , function(){
        Route::view('/login' , "analyst_auth.analyst_login")->name('analyst.login');
        Route::post('/authenticate-analyst' , [AnalystController::class , 'authenticate'])->name('analyst.authenticate');
    });

    Route::group(['middleware' => 'analyst.authenticate'] , function(){
        Route::get("/" , [DashboardController::class , 'get_analyst_dashboard' ])->name('analyst');
        Route::get("/home" , [DashboardController::class , 'get_analyst_dashboard' ])->name('analyst.dashboard');
        Route::get("/investee-list",[InvesteeController::class , 'get_investee'])->name('analyst.investee');
        Route::get("/investee-plan/{id}",[InvesteeController::class , 'get_investee_plan']);
        Route::post("/investee-plan-list",[InvesteeController::class , 'investee_plan_list'])->name('analyst.investee.plan');
        Route::get("/get-investee-list" ,[InvesteeController::class , 'get_investee_list'])->name('analyst.investee.list');
        Route::get("/edit-investee-plan/{id}" , [InvesteeController::class ,'get_edit_investee_plan']);
        Route::post("update-analyst-status" , [InvesteeController::class , 'update_investee_plan_status'])->name('update.analyst.status');
        Route::post("add-ai-rating" , [AiQuestionController::class , 'aiAnalystRating'])->name('add.ai.rating');
        Route::post("add-marketing-rating" , [MarketController::class , 'add_market_rating'])->name("add.market.rating");
        Route::post("add-business-model-rating" , [BusinessModelController::class , 'add_business_model_rating'])->name("add.business.model.rating");
        Route::post("add-competition-rating" , [CompetitionController::class , 'add_competition_rating'])->name("add.competition.rating");
        Route::post("add-corporate-structure-rating" , [CorporateStructureController::class , 'add_corporate_structure_rating'])->name("add.corporate.structure.rating");
        Route::post("add-existing-financial-rating" , [ExistingFinancialRoundController::class , 'add_existing_financial_rating'])->name("add.existing.financial.rating");
        Route::post("add-financial-rating" , [FinancialController::class , 'add_financial_rating'])->name("add.financial.rating");
        Route::post("add-funds-rating" , [FundsController::class , 'add_funds_rating'])->name("add.funds.rating");
        Route::post("add-intellectual-property-rating" , [IntellectualPropertyController::class , 'add_intellectual_property_rating'])->name("add.intellectual.property.rating");
        Route::post("add-team-rating" , [TeamController::class , 'add_team_rating'])->name("add.team.rating");
        Route::post("add-traction-rating" , [TractionController::class , 'add_traction_rating'])->name("add.traction.rating");
        Route::post("analyst-delete-plan" , [PlanController::class , "analyst_delete_plan"])->name("analyst.delete.plan");
        Route::post("analyst-delete-investee" , [UserController::class , "analyst_delete_investee"])->name("analyst.delete.investee");
        Route::group(["prefix"=>"investee"], function(){
            Route::get("/business-model/{id}" ,[BusinessModelController::class,'get_business_model']);
            Route::get("/competition/{id}",[CompetitionController::class ,'get_competition']);
            Route::get("/corporate-structure/{id}",[CorporateStructureController::class ,'get_corporate_structure']);
            Route::get("/existing-financial-round/{id}",[ExistingFinancialRoundController::class , 'get_existing_financial_round']);
            Route::get("/financial/{id}",[FinancialController::class , 'get_financial']);
            Route::get("/funds/{id}",[FundsController::class , 'get_funds']);
            Route::get("/intellectual-property/{id}" ,[IntellectualPropertyController::class , 'get_intellectual_property']);
            Route::get("/market/{id}" ,[MarketController::class,'get_market']);
            Route::get("/team/{id}" ,[TeamController::class , 'get_team']);
            Route::get("/traction/{id}" ,[TractionController::class , 'get_traction']);
        });
        
        Route::get('/logout' , [AnalystController::class , 'logout'])->name('analyst.logout');
    });

});

Route::get("test" ,[TestController::class , 'getTest']);
Route::post("test-audio" , [TestController::class , 'testAudio'])->name('test-audio');
Route::match(['post' ,'get'] , '/callback' , [TestController::class , 'callback']);
