<?php
// routes/web.php
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/booked', [AdminController::class, 'viewBooked'])->name('admin.booked');
    Route::post('/admin/booked/{id}/approve', [AdminController::class, 'approveBooking'])->name('admin.booked.approve');
    Route::post('/admin/booked/{id}/decline', [AdminController::class, 'declineBooking'])->name('admin.booked.decline');

   
    
    Route::get('/admin/accommodations', [AdminController::class, 'viewAccommodations'])->name('admin.accommodations');
    Route::post('/admin/accommodations/store', [AdminController::class, 'storeAccommodation'])->name('admin.accommodations.store');
    Route::post('/admin/accommodations/{id}/update', [AdminController::class, 'updateAccommodation'])->name('admin.accommodations.update');
    Route::post('/admin/accommodations/{id}/delete', [AdminController::class, 'deleteAccommodation'])->name('admin.accommodations.delete');

    Route::get('/admin/transactions', [AdminController::class, 'viewTransactions'])->name('admin.transactions');
    Route::post('/admin/transactions/{id}/update-status', [AdminController::class, 'updateTransactionStatus'])->name('admin.transactions.update-status');
    
});