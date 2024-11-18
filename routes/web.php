<?php
use App\Http\Controllers\AccommodationController;
use Illuminate\Support\Facades\Route;


route::get('/', function(){
    return view('index');
});

Route::get('/book', [AccommodationController::class, 'index']);

