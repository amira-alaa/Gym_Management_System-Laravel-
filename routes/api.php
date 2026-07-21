<?php

use App\Http\Controllers\ApiControllers\AuthController;
use App\Http\Controllers\ApiControllers\HomeController;
use App\Http\Controllers\ApiControllers\MemberController;
use App\Http\Controllers\ApiControllers\MembersessionController;
use App\Http\Controllers\ApiControllers\MembershipController;
use App\Http\Controllers\ApiControllers\PlanController;
use App\Http\Controllers\ApiControllers\SessionController;
use App\Http\Controllers\ApiControllers\TrainerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/register', [AuthController::class, 'register']);

// Route::middleware('auth:sanctum')->group( function () {
//     // Home Route
//     Route::get('/home', [HomeController::class , 'index'])->name('home');


//     // Member Routes
//     Route::apiResource('members', MemberController::class);
//     Route::get('members/healthRecord/{id}' , [MemberController::class , 'GetHealthRecordData'])->name('HRData');


//     // Plans Routes
//     Route::resource('plans', PlanController::class);
//     Route::PUT('plans/UPStatus/{id}' , [PlanController::class, 'UpdatePlanStatus'])->name('UPStatus');

//     // Memberships Routes
//     Route::get('memberships', [MembershipController::class, 'index'])->name('memberships');
//     Route::post('memberships', [MembershipController::class, 'store'])->name('memberships.store');
//     route::delete('memberships/delete/{id}', [MembershipController::class, 'destroy'])->name('memberships.delete');

//     // Sessions Routes
//     Route::resource('sessions', SessionController::class);
//     route::get('sessions/delete/{id}', [SessionController::class, 'delete'])->name('sessions.delete');

//     // Trainers Routes
//     Route::resource('trainers', TrainerController::class);


//     // MemberSessions Routes
//     Route::resource('membersessions' , MembersessionController::class);
//     Route::get('membersessions/{id}/UpcomingSession/members' , [MemberSessionController::class , 'GetMembersUpcomingSession'])
//                                     ->name('membersessions.GetMembersUpcomingSession');
//     Route::get('membersessions/{id}/OngoingSession/members' , [MemberSessionController::class , 'GetMembersOngoingSession'])
//                                     ->name('membersessions.GetMembersOngoingSession');

// });

// Route::middleware('guest')->group(function () {
//     Route::get('/', [AuthController::class, 'showLogin'])->name('login.index');


//     Route::get('/OtpLogin' , [AuthController::class , 'OtpForm'])->name('otpform.index');
//     Route::get('/OtpLogin/resendOtp' , [AuthController::class , 'ResendOtp'])->name('otpform.resend');
//     Route::get('/OtpLogin/Otp' , [AuthController::class , 'GetOtp'])->name('otpform.get');
//     Route::post('/OtpLogin' , [AuthController::class , 'verifyOtp'])->name('otpform.store');

//     Route::get('/register', [AuthController::class, 'showRegister'])->name('register.index');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/home', fn() => view('index'));
//     Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// });



