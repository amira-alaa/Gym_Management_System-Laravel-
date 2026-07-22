

<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembersessionController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Symfony\Component\Routing\Route as RoutingRoute;

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
// Auth


Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('login.index');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');

    Route::get('/OtpLogin' , [AuthController::class , 'OtpForm'])->name('otpform.index');
    Route::get('/OtpLogin/resendOtp' , [AuthController::class , 'ResendOtp'])->name('otpform.resend');
    Route::get('/OtpLogin/Otp' , [AuthController::class , 'GetOtp'])->name('otpform.get');
    Route::post('/OtpLogin' , [AuthController::class , 'verifyOtp'])->name('otpform.store');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register.index');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});







//

Route::get('/home', [HomeController::class , 'index'])->name('home');

// Members Routes
Route::resource('members', MemberController::class);
Route::get('members/healthRecord/{id}' , [MemberController::class , 'GetHealthRecordData'])->name('HRData');
Route::get('members/delete/{id}' , [MemberController::class , 'delete'])->name('deleteMember');

// Plans Routes
Route::resource('plans', PlanController::class);
Route::PUT('plans/UPStatus/{id}' , [PlanController::class , 'UpdatePlanStatus'])->name('UPStatus');


// Memberships Routes
Route::get('memberships', [MembershipController::class, 'index'])->name('memberships');
Route::get('memberships/create', [MembershipController::class, 'create'])->name('memberships.create');
Route::post('memberships/store', [MembershipController::class, 'store'])->name('memberships.store');
route::delete('memberships/delete/{id}', [MembershipController::class, 'destroy'])->name('memberships.delete');


// Sessions Routes
Route::resource('sessions', SessionController::class);
route::get('sessions/delete/{id}', [SessionController::class, 'delete'])->name('sessions.delete');


// Trainers Routes
Route::resource('trainers', TrainerController::class);
Route::get('trainers/delete/{id}', [TrainerController::class, 'delete'])->name('trainers.delete');


// MemberSessions Routes
Route::resource('membersessions' , MembersessionController::class);
Route::get('membersessions/{id}/UpcomingSession/members' , [MembersessionController::class , 'GetMembersUpcomingSession'])
                                ->name('membersessions.GetMembersUpcomingSession');
Route::get('membersessions/{id}/OngoingSession/members' , [MembersessionController::class , 'GetMembersOngoingSession'])
                                ->name('membersessions.GetMembersOngoingSession');
