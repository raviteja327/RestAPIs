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
use App\Http\Controllers\API\productCategoriesController;
use App\Http\Controllers\API\productsController;
use App\Http\Controllers\API\customersController;
use App\Http\Controllers\API\couponsController;
use App\Http\Controllers\API\ordersController;
use App\Http\Controllers\API\companyPostsController;
use App\Http\Controllers\API\companyPagesController;
use App\Http\Controllers\API\companyAddressAutomationsController;
use App\Http\Controllers\API\companyAddressManualsController;
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

// Product Categories Routes

Route::post('/company/procat/create', [productCategoriesController::class, 'create']);
Route::get('/company/procat/views', [productCategoriesController::class, 'views']);
Route::get('/company/procat/view/{id}', [productCategoriesController::class, 'view']);
Route::post('/company/procat/update/{id}', [productCategoriesController::class, 'update']);
Route::post('/company/procat/delete/{id}', [productCategoriesController::class, 'delete']);

// Product Categories Routes

// Products Routes

Route::post('/company/products/create', [productsController::class, 'create']);
Route::get('/company/products/views', [productsController::class, 'views']);
Route::get('/company/products/view/{id}', [productsController::class, 'view']);
Route::post('/company/products/update/{id}', [productsController::class, 'update']);
Route::post('/company/products/delete/{id}', [productsController::class, 'delete']);

// Products Routes

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
