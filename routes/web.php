<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\IncubatorController;
use App\Http\Controllers\DomicilationController;
use Illuminate\Support\Facades\Route;
use App\Models\event;
use App\Models\challenge;
use App\Models\Landingpage;
use App\Models\program;
use App\Models\training;
use App\Models\coach;
use App\Models\partner;
use App\Models\incubator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $events = Event::take(3)->get();
    $challenges = Challenge::take(3)->get();
    $presentationvedio = Landingpage::where('type', 'presentation_vedio')->get();
    $servicevedio = Landingpage::where('type', 'service_vedio')->get();
    $articles = Landingpage::where('type', 'simple_article')->get();
    return view('index', compact(['events', 'challenges', 'presentationvedio', 'servicevedio', 'articles']));
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('events', EventController::class)->except(['show']);
    Route::resource('programs', ProgramController::class)->except(['show']);
    Route::resource('challenges', ChallengeController::class)->except(['show']);
    Route::resource('trainings', TrainingController::class);
    Route::resource('Landingpage', LandingpageController::class);

    Route::resource('partner', PartnerController::class)->except(['store']);
    Route::resource('investor', InvestorController::class)->except(['store']);
    Route::resource('coach', CoachController::class)->except(['store']);
    Route::resource('sponsor', SponsorController::class)->except(['store']);
    Route::resource('supportmsg', SupportController::class)->except(['store']);
    Route::resource('domicilation', DomicilationController::class)->except(['create','store']);
    Route::resource('incubator', IncubatorController::class);
});

Route::post('/partner', [PartnerController::class, 'store'])->name('partner.store');
Route::post('/investor', [InvestorController::class, 'store'])->name('investor.store');
Route::post('/coach', [CoachController::class, 'store'])->name('coach.store');
Route::post('/sponsor', [SponsorController::class, 'store'])->name('sponsor.store');
Route::post('/supportmsg', [SupportController::class, 'store'])->name('support.store');
Route::get('/createdomicilation', [DomicilationController::class, 'create'])->name('domicilation.create');
Route::post('/storedomicilation', [DomicilationController::class, 'store'])->name('domicilation.store');
Route::get('/showevent/{id}',[EventController::class, 'show'])->name('event.show');
Route::get('/showchallenge/{id}',[Challengecontroller::class, 'show'])->name('challenge.show');
Route::get('/about', function () {
    return view('about');
});
Route::get('/incubators', function () {
    $incubators = incubator::all();
    return view('incubators', compact('incubators'));
});

Route::get('/event', function () {
    $events = Event::where('type','event')->get();
    return view('events', compact('events'));
});
Route::get('/discrupt', function () {
    $events = Event::where('type','diskrupt')->get();
    return view('discrupt', compact('events'));
});
Route::get('/techspace', function () {
    $events = Event::where('type','techspace')->get();
    return view('techspace', compact('events'));
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/join-partner', function () {
    return view('join-partner');
});
Route::get('/join-investor', function () {
    return view('join-investor');
});
Route::get('/join-mentor', function () {
    return view('join-mentor');
});
Route::get('/join-sponsor', function () {
    return view('join-sponsor');
});
Route::get('/women', function () {
    return view('women');
});
Route::get('/mentors', function () {
    return view('mentors');
});
Route::get('/support', function () {
    return view('support');
});
Route::get('/coachs', function () {
    $coachs = Coach::where('status', true)->get();
    return view('coachs',compact('coachs'));
});

Route::get('/program', function () {
    $programs = Program::all();
    return view('program', compact('programs'));
});
Route::get('/training', function () {
    $trainings = training::all();
    return view('training', compact('trainings'));
});
Route::get('/press', function () {
    return view('press');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/partners', function () {
    $partners = Partner::all();
    return view('partners', compact('partners'));
});
Route::get('/news', function () {
    return view('news');
});
Route::get('/applytoprogram', function () {
    return view('applytoprogram');
});
Route::get('/training-details/{id}', function ($id) {
    $training = training::findorfail($id);
    return view('training-details', compact('training'));
});
Route::get('/dg', function () {
    return view('dg');
});
Route::get('/domicilationoffers', function () {
    return view('domicilationoffers');
});
Route::get('/eventdetails/{id}', function ($id) {
    $event = Event::findOrFail($id);
    return view('eventdetails', compact('event'));
});
require __DIR__ . '/auth.php';
