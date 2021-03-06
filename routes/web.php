<?php

use App\Http\Livewire\AccountDetail;
use App\Http\Livewire\ApplicantDocumentFeedback;
use App\Http\Livewire\ApplicantProfile;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Applicants;
use App\Http\Livewire\Billing;
use App\Http\Livewire\CreateApplicant;
use App\Http\Livewire\CreateLevel;
use App\Http\Livewire\CreateWebHook;
use App\Http\Livewire\Integrations;
// use App\Http\Livewire\CreateApplicant\CreateApplicant;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Tables;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Rtl;

use App\Http\Livewire\UserProfile;
use App\Http\Livewire\LaravelExamples\UserManagement;
use App\Http\Livewire\ReviewPanel;
use App\Http\Livewire\Settings;
use App\Http\Livewire\TwilioIntegration;
use App\Http\Livewire\UploadDocuments;
use App\Http\Livewire\UserProfile as LivewireUserProfile;
use App\Http\Livewire\WebHooks;
use App\Models\WebHook;
use Illuminate\Http\Request;

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

Route::get('/', Login::class)->name('login');

Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/login', Login::class)->name('login');

Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/laravel-user-profile', UserProfile::class)->name('user-profile');
    Route::get('/laravel-user-management', UserManagement::class)->name('user-management');
    Route::get('/applicants', Applicants::class)->name('applicants');
    Route::put('/applicants/{id}', [ApplicantProfile::class, 'updateToken'])->name('update-token');
    Route::get('/create-applicant', CreateApplicant::class)->name('createApplicant');
    Route::post('/create-applicant', [CreateApplicant::class, 'createApplicant'])->name('createApplicantStore');
    Route::get('/applicants/{id}', ApplicantProfile::class)->name('ApplicantsPage');
    Route::get('/applicants/givedocs/{id}', UploadDocuments::class)->name('uploadDocuments');
    Route::get('/applicant/review', ReviewPanel::class)->name('review-panel');
    Route::get('/applicant/client-profile', UserProfile::class)->name('client-profile');
    Route::get('/applicant/account-detail', AccountDetail::class)->name('account-detail');
    Route::get('/applicant/applicant-levels', Integrations::class)->name('applicant-levels');
    Route::get('/applicant/web-hooks', WebHooks::class)->name('web-hooks');
    Route::get('/applicant/create-web-hook', CreateWebHook::class)->name('create-web-hooks');
    Route::get('/applicant/create-level', CreateLevel::class)->name('create-level');
    Route::get('/applicant/twilio', TwilioIntegration::class)->name('twilio-integration');
    Route::put('/applicant/twilio/{id}', [TwilioIntegration::class, 'updateTwilio'])->name('update-twilio-integration');
    Route::post('/applicant/create-level', [CreateLevel::class, 'createLevel'])->name('create-level-controller');
    // put
    Route::put('/edit-applicant-info/{id}', [CreateApplicant::class, 'editApplicant'])->name('ApplicantEdit');
    Route::put('/edit-applicant-profile/{id}', [ApplicantProfile::class, 'editProfile'])->name('edit-profile');
    Route::put('/edit-validation/{id}', [Applicants::class, 'editValidation'])->name('edit-validation');
    Route::put('/approve/{id}', [Applicants::class, 'approveDocument'])->name('approve-document');
    Route::put('/decline/{id}', [Applicants::class, 'declineDocument'])->name('decline-document');
    Route::put('/edit-status/{id}', [Applicants::class, 'editStatus'])->name('edit-status');
    Route::put('/edit-profile', [UserProfile::class, 'editProfile'])->name('edit-profile');
    Route::put('/edit-account', [AccountDetail::class, 'editDetail'])->name('edit-detail');
    Route::post('/create-webhook', [CreateWebHook::class, 'createHook'])->name('create-hook');
    Route::put('/webhook/{id}', [WebHooks::class, 'updateHook'])->name('update-hook');


    Route::delete('/delete-applicant/{id}', [Applicants::class, 'destroy'])->name('delete-applicant');
});

Route::get('/givedocs/{id}', UploadDocuments::class)->name('upload-documents');
Route::get('/upload-feedback', ApplicantDocumentFeedback::class)->name('upload-feedback');
Route::post('/upload-document', [UploadDocuments::class, 'store'])->name('uploadDocs');

