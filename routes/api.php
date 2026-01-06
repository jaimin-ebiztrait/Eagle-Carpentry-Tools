<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserRatingController;
use App\Http\Controllers\UserLoginController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
### Sign In ###
Route::post('/signIn', [ApiController::class, 'login']);
Route::post('/signUp', [ApiController::class, 'register']);
### Verify Email ###
Route::post('/sendOTPCode', [ApiController::class, 'sendEmail']);
Route::post('/verifyOTPCode', [ApiController::class, 'verifyEmail']);
### Profile Details ###
Route::post('/getProfile', [ApiController::class, 'getProfile']);
Route::post('/editProfile', [ApiController::class, 'editProfile']);
### Change Password ###
Route::post('/changePassword', [ApiController::class,'changePassword']);
### Forgot Password ###
Route::post('/forgotPassword', [ApiController::class, 'forgotPassword']);
Route::post('/updateForgotPassword', [ApiController::class, 'changeForgetPassword']);
### Faq ###
Route::post('/getFaqList',[ApiController::class,'faqList']);
### Contact Us ###

Route::post('/addContactUs', [ApiController::class, 'addContact']);
### CmsPages ###
Route::post('/cmsPage', [ApiController::class, 'cmsPage']);
### Firebase ###
Route::post('/sendNotification', [ApiController::class, 'sendNotification']);
### User Notification ###
Route::post('/getNotificationList', [ApiController::class, 'getNotificationList']);
Route::post('/clear-notif', [ApiController::class, 'notifSeen']);

//Ratings
Route::post('/add-rating', [UserRatingController::class, 'addRating']);
Route::post('/ratings', [UserRatingController::class, 'index']);


// multi-login routes
Route::post('/multi-send-otp', [UserLoginController::class, 'multiSendOTP']);
Route::post('/mobile-verify', [UserLoginController::class, 'mobileVerifyOTP']);
Route::post('/multi-signup', [UserLoginController::class, 'multiRegister']);
Route::post('/multi-signin', [UserLoginController::class, 'multiLogin']);

Route::post('/logout', [UserLoginController::class, 'logout']);

Route::post('/vistor', [ApiController::class, 'vistor']);
