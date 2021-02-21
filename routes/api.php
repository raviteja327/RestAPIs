<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\adminUsersController;
use App\Http\Controllers\API\organisationTypesController;
use App\Http\Controllers\API\organisationIndustryTypesController;
use App\Http\Controllers\API\countriesController;
use App\Http\Controllers\API\countryStatesController;
use App\Http\Controllers\API\cUserRolesController;
use App\Http\Controllers\API\kalaiCountriesController;
use App\Http\Controllers\API\companiesController;
use App\Http\Controllers\API\companyDbUsersController;
use App\Http\Controllers\API\cContactUsersController;
use App\Http\Controllers\API\cEmployeesController;
use App\Http\Controllers\API\kalaiStatesController;
use App\Http\Controllers\API\statesDistrictsController;
use App\Http\Controllers\API\customersController;
use App\Http\Controllers\API\couponsController;
use App\Http\Controllers\API\ordersController;
use App\Http\Controllers\API\companyPostsController;
use App\Http\Controllers\API\companyPagesController;
use App\Http\Controllers\API\companyAddressAutomationsController;
use App\Http\Controllers\API\companyAddressManualsController;
use App\Http\Controllers\API\animationController;
use App\Http\Controllers\API\plansController;
use App\Http\Controllers\API\frontendCompanyController;
use App\Http\Controllers\API\postController;
use App\Http\Controllers\API\homeSliderController;
use App\Http\Controllers\API\miniSliderController;
use App\Http\Controllers\API\pageController;
use App\Http\Controllers\API\crmSalesCompanyController;
use App\Http\Controllers\API\crmSalesCompanyContactController;
use App\Http\Controllers\API\crmSalesCompanyVisitingController;
use App\Http\Controllers\API\crmSalesCompanyBillingController;
use App\Http\Controllers\API\crmTasksController;
use App\Http\Controllers\API\bankDetailsController;
use App\Http\Controllers\API\menusController;
use App\Http\Controllers\API\securityQuestionsController;
use App\Http\Controllers\API\cActivitiesController;
use App\Http\Controllers\API\cpProductGeneralDetailsController;
use App\Http\Controllers\API\cpProductImagesController;
use App\Http\Controllers\API\cpProductVarientsController;
use App\Http\Controllers\API\cpProductVarientsDetailsController;
use App\Http\Controllers\API\cProductDimensionsController;
use App\Http\Controllers\API\cProductsController;
use App\Http\Controllers\API\cProductStockDetailsController;
use App\Http\Controllers\API\cProductTypesController;
use App\Http\Controllers\API\orderTypeController;
use App\Http\Controllers\API\productCategoriesController;
use App\Http\Controllers\API\cUsersController;
use App\Http\Controllers\API\pipelineStrategiesController;
use App\Http\Controllers\API\stagesController;
use App\Http\Controllers\API\dealsController;
use DB as DBS;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/login',function(Request $request){
    
    $valid = Validator::make($request->all() , [
           'email' => 'required',
           'password_cnf' => 'required'
       
       ]);

       if($valid->fails() == TRUE){
           return response()->json(array(
               'status' => 0,
               'message' => $valid->errors()
           ));
       }
       else{
               $result = DBS::table('companies')->where(['company_email'=>$request->email,'password_cnf'=>md5($request->password_cnf)])->select(['c_token','c_hash','c_sec_key','application_type'])->get()->toArray();
               if($result)
               {
                  return response()->json(array('status'=>1,'message'=>$result));  
               }
               else
               {
                   return response()->json(array('status'=>0,'message'=>"Invalid Access details")); 
               }
       }
  
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Admin Routes

Route::post('/company/admin/create', [adminUsersController::class, 'create']);
Route::get('/company/admin/views', [adminUsersController::class, 'views']);
Route::get('/company/admin/view/{id}', [adminUsersController::class, 'view']);
Route::post('/company/admin/update/{id}', [adminUsersController::class, 'update']);
Route::post('/company/admin/delete/{id}', [adminUsersController::class, 'delete']);

// Admin Routes

// Organisation Type Routes

Route::post('/company/orgtype/create', [organisationTypesController::class, 'create']);
Route::get('/company/orgtype/views', [organisationTypesController::class, 'views']);
Route::get('/company/orgtype/view/{id}', [organisationTypesController::class, 'view']);
Route::post('/company/orgtype/update/{id}', [organisationTypesController::class, 'update']);
Route::post('/company/orgtype/delete/{id}', [organisationTypesController::class, 'delete']);

// Organisation Type Routes

// Organisation Industry Type Routes

Route::post('/company/orgindtype/create', [organisationIndustryTypesController::class, 'create']);
Route::get('/company/orgindtype/views', [organisationIndustryTypesController::class, 'views']);
Route::get('/company/orgindtype/view/{id}', [organisationIndustryTypesController::class, 'view']);
Route::post('/company/orgindtype/update/{id}', [organisationIndustryTypesController::class, 'update']);
Route::post('/company/orgindtype/delete/{id}', [organisationIndustryTypesController::class, 'delete']);

// Organisation Industry Type Routes

// Countries Routes

Route::post('/company/countries/create', [countriesController::class, 'create']);
Route::get('/company/countries/views', [countriesController::class, 'views']);
Route::get('/company/countries/view/{id}', [countriesController::class, 'view']);
Route::post('/company/countries/update/{id}', [countriesController::class, 'update']);
Route::post('/company/countries/delete/{id}', [countriesController::class, 'delete']);

// Countries Routes

// Country States Routes

Route::post('/company/countrystate/create', [countryStatesController::class, 'create']);
Route::get('/company/countrystate/views', [countryStatesController::class, 'views']);
Route::get('/company/countrystate/view/{id}', [countryStatesController::class, 'view']);
Route::post('/company/countrystate/update/{id}', [countryStatesController::class, 'update']);
Route::post('/company/countrystate/delete/{id}', [countryStatesController::class, 'delete']);

// Country States Routes

// C User Roles Routes

Route::post('/company/cuser/create', [cUserRolesController::class, 'create']);
Route::get('/company/cuser/views', [cUserRolesController::class, 'views']);
Route::get('/company/cuser/view/{id}', [cUserRolesController::class, 'view']);
Route::post('/company/cuser/update/{id}', [cUserRolesController::class, 'update']);
Route::post('/company/cuser/delete/{id}', [cUserRolesController::class, 'delete']);

// C User Roles Routes

// Kalai Countries Routes

Route::post('/company/kalaicountries/create', [kalaiCountriesController::class, 'create']);
Route::get('/company/kalaicountries/views', [kalaiCountriesController::class, 'views']);
Route::get('/company/kalaicountries/view/{id}', [kalaiCountriesController::class, 'view']);
Route::post('/company/kalaicountries/update/{id}', [kalaiCountriesController::class, 'update']);
Route::post('/company/kalaicountries/delete/{id}', [kalaiCountriesController::class, 'delete']);

// Kalai Countries Routes

// Companies Routes

Route::post('/company/companies/create', [companiesController::class, 'create']);
Route::get('/company/companies/views', [companiesController::class, 'views']);
Route::get('/company/companies/view/{id}', [companiesController::class, 'view']);
Route::post('/company/companies/update/{id}', [companiesController::class, 'update']);
Route::post('/company/companies/delete/{id}', [companiesController::class, 'delete']);

// Companies Routes

// Company DB Users Routes

Route::post('/company/companydbusers/create', [companyDbUsersController::class, 'create']);
Route::get('/company/companydbusers/views', [companyDbUsersController::class, 'views']);
Route::get('/company/companydbusers/view/{id}', [companyDbUsersController::class, 'view']);
Route::post('/company/companydbusers/update/{id}', [companyDbUsersController::class, 'update']);
Route::post('/company/companydbusers/delete/{id}', [companyDbUsersController::class, 'delete']);

// Company DB Users Routes

// C Contact Users Routes

Route::post('/company/ccontactusers/create', [cContactUsersController::class, 'create']);
Route::get('/company/ccontactusers/views', [cContactUsersController::class, 'views']);
Route::get('/company/ccontactusers/view/{id}', [cContactUsersController::class, 'view']);
Route::post('/company/ccontactusers/update/{id}', [cContactUsersController::class, 'update']);
Route::post('/company/ccontactusers/delete/{id}', [cContactUsersController::class, 'delete']);

// C Contact Users Routes

// C Employees Routes

Route::post('/company/cemployees/create', [cEmployeesController::class, 'create']);
Route::get('/company/cemployees/views', [cEmployeesController::class, 'views']);
Route::get('/company/cemployees/view/{id}', [cEmployeesController::class, 'view']);
Route::post('/company/cemployees/update/{id}', [cEmployeesController::class, 'update']);
Route::post('/company/cemployees/delete/{id}', [cEmployeesController::class, 'delete']);

// C Employees Routes

// Kalai States Routes

Route::post('/company/kalaistates/create', [kalaiStatesController::class, 'create']);
Route::get('/company/kalaistates/views', [kalaiStatesController::class, 'views']);
Route::get('/company/kalaistates/view/{id}', [kalaiStatesController::class, 'view']);
Route::post('/company/kalaistates/update/{id}', [kalaiStatesController::class, 'update']);
Route::post('/company/kalaistates/delete/{id}', [kalaiStatesController::class, 'delete']);

// Kalai States Routes

// States Districts Routes

Route::post('/company/statesdistricts/create', [statesDistrictsController::class, 'create']);
Route::get('/company/statesdistricts/views', [statesDistrictsController::class, 'views']);
Route::get('/company/statesdistricts/view/{id}', [statesDistrictsController::class, 'view']);
Route::post('/company/statesdistricts/update/{id}', [statesDistrictsController::class, 'update']);
Route::post('/company/statesdistricts/delete/{id}', [statesDistrictsController::class, 'delete']);

// States Districts Routes

// Customers Routes

Route::post('/company/customers/create', [customersController::class, 'create']);
Route::get('/company/customers/views', [customersController::class, 'views']);
Route::get('/company/customers/view/{id}', [customersController::class, 'view']);
Route::post('/company/customers/update/{id}', [customersController::class, 'update']);
Route::post('/company/customers/delete/{id}', [customersController::class, 'delete']);

// Customers Routes

// Coupons Routes

Route::post('/company/coupons/create', [couponsController::class, 'create']);
Route::get('/company/coupons/views', [couponsController::class, 'views']);
Route::get('/company/coupons/view/{id}', [couponsController::class, 'view']);
Route::post('/company/coupons/update/{id}', [couponsController::class, 'update']);
Route::post('/company/coupons/delete/{id}', [couponsController::class, 'delete']);

// Coupons Routes

// Orders Routes

Route::post('/company/orders/create', [ordersController::class, 'create']);
Route::get('/company/orders/views', [ordersController::class, 'views']);
Route::get('/company/orders/view/{id}', [ordersController::class, 'view']);
Route::post('/company/orders/update/{id}', [ordersController::class, 'update']);
Route::post('/company/orders/delete/{id}', [ordersController::class, 'delete']);

// Orders Routes


// Company Posts Routes

Route::post('/company/cposts/create', [companyPostsController::class, 'create']);
Route::get('/company/cposts/views', [companyPostsController::class, 'views']);
Route::get('/company/cposts/view/{id}', [companyPostsController::class, 'view']);
Route::post('/company/cposts/update/{id}', [companyPostsController::class, 'update']);
Route::post('/company/cposts/delete/{id}', [companyPostsController::class, 'delete']);

// Company Posts Routes

// Company Pages Routes

Route::post('/company/cpages/create', [companyPagesController::class, 'create']);
Route::get('/company/cpages/views', [companyPagesController::class, 'views']);
Route::get('/company/cpages/view/{id}', [companyPagesController::class, 'view']);
Route::post('/company/cpages/update/{id}', [companyPagesController::class, 'update']);
Route::post('/company/cpages/delete/{id}', [companyPagesController::class, 'delete']);

// Company Pages Routes

// Company Address Automations Routes

Route::post('/company/caa/create', [companyAddressAutomationsController::class, 'create']);
Route::get('/company/caa/views', [companyAddressAutomationsController::class, 'views']);
Route::get('/company/caa/view/{id}', [companyAddressAutomationsController::class, 'view']);
Route::post('/company/caa/update/{id}', [companyAddressAutomationsController::class, 'update']);
Route::post('/company/caa/delete/{id}', [companyAddressAutomationsController::class, 'delete']);

// Company Address Automations Routes

// Company Address Manuals Routes

Route::post('/company/cam/create', [companyAddressManualsController::class, 'create']);
Route::get('/company/cam/views', [companyAddressManualsController::class, 'views']);
Route::get('/company/cam/view/{id}', [companyAddressManualsController::class, 'view']);
Route::post('/company/cam/update/{id}', [companyAddressManualsController::class, 'update']);
Route::post('/company/cam/delete/{id}', [companyAddressManualsController::class, 'delete']);

// Company Address Manuals Routes

// Animation Routes

Route::post('/company/animation/create', [animationController::class, 'create']);
Route::get('/company/animation/views', [animationController::class, 'views']);
Route::get('/company/animation/view/{id}', [animationController::class, 'view']);
Route::post('/company/animation/update/{id}', [animationController::class, 'update']);
Route::post('/company/animation/delete/{id}', [animationController::class, 'delete']);

// Animation Routes

// Plans Routes

Route::post('/company/plans/create', [plansController::class, 'create']);
Route::get('/company/plans/views', [plansController::class, 'views']);
Route::get('/company/plans/view/{id}', [plansController::class, 'view']);
Route::post('/company/plans/update/{id}', [plansController::class, 'update']);
Route::post('/company/plans/delete/{id}', [plansController::class, 'delete']);

// Plans Routes

// Frontend Company Routes

Route::post('/company/frontendcompany/create', [frontendCompanyController::class, 'create']);
Route::get('/company/frontendcompany/views', [frontendCompanyController::class, 'views']);
Route::get('/company/frontendcompany/view/{id}', [frontendCompanyController::class, 'view']);
Route::post('/company/frontendcompany/update/{id}', [frontendCompanyController::class, 'update']);
Route::post('/company/frontendcompany/delete/{id}', [frontendCompanyController::class, 'delete']);

// Frontend Company Routes

// Post Routes

Route::post('/company/post/create', [postController::class, 'create']);
Route::get('/company/post/views', [postController::class, 'views']);
Route::get('/company/post/view/{id}', [postController::class, 'view']);
Route::post('/company/post/update/{id}', [postController::class, 'update']);
Route::post('/company/post/delete/{id}', [postController::class, 'delete']);

// Post Routes

// Home Slider Routes

Route::post('/company/homeslider/create', [homeSliderController::class, 'create']);
Route::get('/company/homeslider/views', [homeSliderController::class, 'views']);
Route::get('/company/homeslider/view/{id}', [homeSliderController::class, 'view']);
Route::post('/company/homeslider/update/{id}', [homeSliderController::class, 'update']);
Route::post('/company/homeslider/delete/{id}', [homeSliderController::class, 'delete']);

// Home Slider Routes

// Mini Slider Routes

Route::post('/company/minislider/create', [miniSliderController::class, 'create']);
Route::get('/company/minislider/views', [miniSliderController::class, 'views']);
Route::get('/company/minislider/view/{id}', [miniSliderController::class, 'view']);
Route::post('/company/minislider/update/{id}', [miniSliderController::class, 'update']);
Route::post('/company/minislider/delete/{id}', [miniSliderController::class, 'delete']);

// Mini Slider Routes

// Page Routes

Route::post('/company/page/create', [pageController::class, 'create']);
Route::get('/company/page/views', [pageController::class, 'views']);
Route::get('/company/page/view/{id}', [pageController::class, 'view']);
Route::post('/company/page/update/{id}', [pageController::class, 'update']);
Route::post('/company/page/delete/{id}', [pageController::class, 'delete']);

// Page Routes

// CRM Sales Company Routes

Route::post('/company/crmsalescompany/create', [crmSalesCompanyController::class, 'create']);
Route::get('/company/crmsalescompany/views', [crmSalesCompanyController::class, 'views']);
Route::get('/company/crmsalescompany/view/{id}', [crmSalesCompanyController::class, 'view']);
Route::post('/company/crmsalescompany/update/{id}', [crmSalesCompanyController::class, 'update']);
Route::post('/company/crmsalescompany/delete/{id}', [crmSalesCompanyController::class, 'delete']);

// CRM Sales Company Routes

// CRM Sales Company Contact Routes

Route::post('/company/crmsalescompanycontact/create', [crmSalesCompanyContactController::class, 'create']);
Route::get('/company/crmsalescompanycontact/views', [crmSalesCompanyContactController::class, 'views']);
Route::get('/company/crmsalescompanycontact/view/{id}', [crmSalesCompanyContactController::class, 'view']);
Route::post('/company/crmsalescompanycontact/update/{id}', [crmSalesCompanyContactController::class, 'update']);
Route::post('/company/crmsalescompanycontact/delete/{id}', [crmSalesCompanyContactController::class, 'delete']);

// CRM Sales Company Contact Routes


// CRM Sales Company Visiting Routes

Route::post('/company/crmsalescompanyvisiting/create', [crmSalesCompanyVisitingController::class, 'create']);
Route::get('/company/crmsalescompanyvisiting/views', [crmSalesCompanyVisitingController::class, 'views']);
Route::get('/company/crmsalescompanyvisiting/view/{id}', [crmSalesCompanyVisitingController::class, 'view']);
Route::post('/company/crmsalescompanyvisiting/update/{id}', [crmSalesCompanyVisitingController::class, 'update']);
Route::post('/company/crmsalescompanyvisiting/delete/{id}', [crmSalesCompanyVisitingController::class, 'delete']);

// CRM Sales Company Visiting Routes

// CRM Sales Company Billing Routes

Route::post('/company/crmsalescompanybilling/create', [crmSalesCompanyBillingController::class, 'create']);
Route::get('/company/crmsalescompanybilling/views', [crmSalesCompanyBillingController::class, 'views']);
Route::get('/company/crmsalescompanybilling/view/{id}', [crmSalesCompanyBillingController::class, 'view']);
Route::post('/company/crmsalescompanybilling/update/{id}', [crmSalesCompanyBillingController::class, 'update']);
Route::post('/company/crmsalescompanybilling/delete/{id}', [crmSalesCompanyBillingController::class, 'delete']);

// CRM Sales Company Billing Routes

// CRM Tasks Routes

Route::post('/company/crmtasks/create', [crmTasksController::class, 'create']);
Route::get('/company/crmtasks/views', [crmTasksController::class, 'views']);
Route::get('/company/crmtasks/view/{id}', [crmTasksController::class, 'view']);
Route::post('/company/crmtasks/update/{id}', [crmTasksController::class, 'update']);
Route::post('/company/crmtasks/delete/{id}', [crmTasksController::class, 'delete']);

// CRM Tasks Routes

// Bank Details Routes

Route::post('/company/bankdetails/create', [bankDetailsController::class, 'create']);
Route::get('/company/bankdetails/views', [bankDetailsController::class, 'views']);
Route::get('/company/bankdetails/view/{id}', [bankDetailsController::class, 'view']);
Route::post('/company/bankdetails/update/{id}', [bankDetailsController::class, 'update']);
Route::post('/company/bankdetails/delete/{id}', [bankDetailsController::class, 'delete']);

// Bank Details Routes

// Menu Routes

Route::post('/company/menu/create', [menusController::class, 'create']);
Route::get('/company/menu/views', [menusController::class, 'views']);
Route::get('/company/menu/view/{id}', [menusController::class, 'view']);
Route::post('/company/menu/update/{id}', [menusController::class, 'update']);
Route::post('/company/menu/delete/{id}', [menusController::class, 'delete']);

// Menu Routes

// Security Questions Routes

Route::post('/company/securityque/create', [securityQuestionsController::class, 'create']);
Route::get('/company/securityque/views', [securityQuestionsController::class, 'views']);
Route::get('/company/securityque/view/{id}', [securityQuestionsController::class, 'view']);
Route::post('/company/securityque/update/{id}', [securityQuestionsController::class, 'update']);
Route::post('/company/securityque/delete/{id}', [securityQuestionsController::class, 'delete']);

// Security Questions Routes

// Order Type Routes

Route::post('/company/ordertype/create', [orderTypeController::class, 'create']);
Route::get('/company/ordertype/views', [orderTypeController::class, 'views']);
Route::get('/company/ordertype/view/{id}', [orderTypeController::class, 'view']);
Route::post('/company/ordertype/update/{id}', [orderTypeController::class, 'update']);
Route::post('/company/ordertype/delete/{id}', [orderTypeController::class, 'delete']);

// Order Type Routes

// C Activities Routes

Route::post('/company/cact/create', [cActivitiesController::class, 'create']);
Route::get('/company/cact/views', [cActivitiesController::class, 'views']);
Route::get('/company/cact/view/{id}', [cActivitiesController::class, 'view']);
Route::post('/company/cact/update/{id}', [cActivitiesController::class, 'update']);
Route::post('/company/cact/delete/{id}', [cActivitiesController::class, 'delete']);

// C Activities Routes

// C product Types Routes

Route::post('/company/cprotype/create', [cProductTypesController::class, 'create']);
Route::get('/company/cprotype/views', [cProductTypesController::class, 'views']);
Route::get('/company/cprotype/view/{id}', [cProductTypesController::class, 'view']);
Route::post('/company/cprotype/update/{id}', [cProductTypesController::class, 'update']);
Route::post('/company/cprotype/delete/{id}', [cProductTypesController::class, 'delete']);

// C product Types Routes

// Product Categories Routes

Route::post('/company/procat/create', [productCategoriesController::class, 'create']);
Route::get('/company/procat/views', [productCategoriesController::class, 'views']);
Route::get('/company/procat/view/{id}', [productCategoriesController::class, 'view']);
Route::post('/company/procat/update/{id}', [productCategoriesController::class, 'update']);
Route::post('/company/procat/delete/{id}', [productCategoriesController::class, 'delete']);

// Product Categories Routes

// C Products Routes

Route::post('/company/cproducts/create', [cProductsController::class, 'create']);
Route::get('/company/cproducts/views', [cProductsController::class, 'views']);
Route::get('/company/cproducts/view/{id}', [cProductsController::class, 'view']);
Route::post('/company/cproducts/update/{id}', [cProductsController::class, 'update']);
Route::post('/company/cproducts/delete/{id}', [cProductsController::class, 'delete']);

// C Products Routes

// C Product Dimensions Routes

Route::post('/company/cproductsdim/create', [cProductDimensionsController::class, 'create']);
Route::get('/company/cproductsdim/views', [cProductDimensionsController::class, 'views']);
Route::get('/company/cproductsdim/view/{id}', [cProductDimensionsController::class, 'view']);
Route::post('/company/cproductsdim/update/{id}', [cProductDimensionsController::class, 'update']);
Route::post('/company/cproductsdim/delete/{id}', [cProductDimensionsController::class, 'delete']);

// C Product Dimensions Routes

// C Product Stock Details Routes

Route::post('/company/cprostockdetails/create', [cProductStockDetailsController::class, 'create']);
Route::get('/company/cprostockdetails/views', [cProductStockDetailsController::class, 'views']);
Route::get('/company/cprostockdetails/view/{id}', [cProductStockDetailsController::class, 'view']);
Route::post('/company/cprostockdetails/update/{id}', [cProductStockDetailsController::class, 'update']);
Route::post('/company/cprostockdetails/delete/{id}', [cProductStockDetailsController::class, 'delete']);

// C Product Stock Details Routes

// C Product General Details Routes

Route::post('/company/cprogendetails/create', [cpProductGeneralDetailsController::class, 'create']);
Route::get('/company/cprogendetails/views', [cpProductGeneralDetailsController::class, 'views']);
Route::get('/company/cprogendetails/view/{id}', [cpProductGeneralDetailsController::class, 'view']);
Route::post('/company/cprogendetails/update/{id}', [cpProductGeneralDetailsController::class, 'update']);
Route::post('/company/cprogendetails/delete/{id}', [cpProductGeneralDetailsController::class, 'delete']);

// C Product General Details Routes

// C Product Images Routes

Route::post('/company/cproimages/create', [cpProductImagesController::class, 'create']);
Route::get('/company/cproimages/views', [cpProductImagesController::class, 'views']);
Route::get('/company/cproimages/view/{id}', [cpProductImagesController::class, 'view']);
Route::post('/company/cproimages/update/{id}', [cpProductImagesController::class, 'update']);
Route::post('/company/cproimages/delete/{id}', [cpProductImagesController::class, 'delete']);

// C Product Images Routes

// C Product Varients Routes

Route::post('/company/cprovar/create', [cpProductVarientsController::class, 'create']);
Route::get('/company/cprovar/views', [cpProductVarientsController::class, 'views']);
Route::get('/company/cprovar/view/{id}', [cpProductVarientsController::class, 'view']);
Route::post('/company/cprovar/update/{id}', [cpProductVarientsController::class, 'update']);
Route::post('/company/cprovar/delete/{id}', [cpProductVarientsController::class, 'delete']);

// C Product Varients Routes

// C Product Varients Details Routes

Route::post('/company/cprovardetails/create', [cpProductVarientsDetailsController::class, 'create']);
Route::get('/company/cprovardetails/views', [cpProductVarientsDetailsController::class, 'views']);
Route::get('/company/cprovardetails/view/{id}', [cpProductVarientsDetailsController::class, 'view']);
Route::post('/company/cprovardetails/update/{id}', [cpProductVarientsDetailsController::class, 'update']);
Route::post('/company/cprovardetails/delete/{id}', [cpProductVarientsDetailsController::class, 'delete']);

// C Product Varients Details Routes

// C Users Routes

Route::post('/company/cusers/create', [cUsersController::class, 'create']);
Route::get('/company/cusers/views', [cUsersController::class, 'views']);
Route::get('/company/cusers/view/{id}', [cUsersController::class, 'view']);
Route::post('/company/cusers/update/{id}', [cUsersController::class, 'update']);
Route::post('/company/cusers/delete/{id}', [cUsersController::class, 'delete']);

// C Users Routes

// Pipeline Strategies Routes

Route::post('/company/pipeline/create', [pipelineStrategiesController::class, 'create']);
Route::get('/company/pipeline/views', [pipelineStrategiesController::class, 'views']);
Route::get('/company/pipeline/view/{id}', [pipelineStrategiesController::class, 'view']);
Route::post('/company/pipeline/update/{id}', [pipelineStrategiesController::class, 'update']);
Route::post('/company/pipeline/delete/{id}', [pipelineStrategiesController::class, 'delete']);

// Pipeline Strategies Routes

// Stages Routes

Route::post('/company/stages/create', [stagesController::class, 'create']);
Route::get('/company/stages/views', [stagesController::class, 'views']);
Route::get('/company/stages/view/{id}', [stagesController::class, 'view']);
Route::post('/company/stages/update/{id}', [stagesController::class, 'update']);
Route::post('/company/stages/delete/{id}', [stagesController::class, 'delete']);

// Stages Routes

// Deals Routes

Route::post('/company/deals/create', [dealsController::class, 'create']);
Route::get('/company/deals/views', [dealsController::class, 'views']);
Route::get('/company/deals/view/{id}', [dealsController::class, 'view']);
Route::post('/company/deals/update/{id}', [dealsController::class, 'update']);
Route::post('/company/deals/delete/{id}', [dealsController::class, 'delete']);

// Deals Routes
