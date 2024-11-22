<?php
use App\Http\Controllers\bookingController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VerificationController;


route::get('/', function(){
    return view('index');                                                   
})->name('home');               


Route::get('/Reservation/step-one', [ReservationController::class, 'stepOne'])->name('Reservation.step-one');
Route::post('/Reservation/step-one', [ReservationController::class, 'stepOneStore'])->name('Reservation.step-one.store');

Route::middleware(['throttle'])->group(function () {
    Route::get('/Reservation/step-two', [ReservationController::class, 'stepTwo'])->name('Reservation.step-two');
    Route::post('/Reservation/step-two', [ReservationController::class, 'stepTwoStore'])->name('Reservation.step-two.store');

    Route::get('/Reservation/step-three', [ReservationController::class, 'stepThree'])->name('Reservation.step-three');
    Route::post('/Reservation/step-three', [ReservationController::class, 'stepThreeStore'])->name('Reservation.step-three.store');
});

Route::get('/Reservation/confirmation', [ReservationController::class, 'confirmation'])->name('confirmation');
Route::get('/Reservation/confirmation/pdf', [ReservationController::class, 'downloadPDF'])->name('Reservation.confirmation.pdf');