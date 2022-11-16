<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\EditVisiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditkandidatController;
use App\Http\Controllers\EditMisiController;
use App\Http\Controllers\PilihkandidatController;
use App\Http\Controllers\InformasisuaraController;
use App\Http\Controllers\InformasibiodataController;
use App\Http\Controllers\InformasipemenangController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/display', [DisplayController::class, 'display'])->name('display.index');

//Auth login & logout
Route::get('/', [LoginController::class, 'index'])->name('login.index');

Route::post('/', [LoginController::class, 'proces'])->name('login.proces');

Route::get('/logout', function () {
    Auth::logout();

    return redirect(route('login.index'));
})->name('logout');


//Middleware admin
Route::prefix('admin')->name('admin.')->middleware('role:admin')->group( function() {

    Route::get('/dashboard', [DashboardController::class, 'dash'])->name('dashboard');

    //crud user
    // Route::resource('biodata', InformasibiodataController::class);
    Route::prefix('informasi-biodata')->name('biodata.')->middleware('role:admin')->group(function() {

        Route::get('/', [InformasibiodataController::class, 'index'])->name('index');
    
        Route::get('create', [InformasibiodataController::class, 'create'])->name('create');

        Route::get('{id}/edit', [InformasibiodataController::class, 'edit'])->name('edit');
    
        Route::post('store', [InformasibiodataController::class, 'store'])->name('store');
    
        Route::put('{id}/update', [InformasibiodataController::class, 'update'])->name('update');
    
        Route::delete('{id}/delete', [InformasibiodataController::class, 'destroy'])->name('destroy');    
    });

    //crud candidate 

    Route::prefix('kandidat')->name('kandidat.')->middleware('role:admin')->group(function() {

        Route::get('/', [EditkandidatController::class, 'index'])->name('index');
    
        Route::get('create', [EditkandidatController::class, 'create'])->name('create');

        Route::get('{id}/edit', [EditkandidatController::class, 'edit'])->name('edit');
        
        Route::get('{id}/show', [EditkandidatController::class, 'show'])->name('show');

        Route::post('store', [EditkandidatController::class, 'store'])->name('store');

        Route::put('{id}/update', [EditkandidatController::class, 'update'])->name('update');
    
        Route::delete('{id}/delete', [EditkandidatController::class, 'destroy'])->name('destroy');

        //crud visi kandidat
        Route::prefix('visi')->name('visi.')->middleware('role:admin')->group(function() {
    
            Route::get('/', [EditVisiController::class, 'index'])->name('index');
        
            Route::get('{id}/show', [EditVisiController::class, 'show'])->name('show');
        
            Route::get('create', [EditVisiController::class, 'create'])->name('create');
    
            Route::get('{id}/edit', [EditVisiController::class, 'edit'])->name('edit');
    
            Route::post('store', [EditVisiController::class, 'store'])->name('store');
    
            Route::put('{id}/update', [EditVisiController::class, 'update'])->name('update');
    
            Route::delete('{id}/delete', [EditVisiController::class, 'destroy'])->name('destroy');
        
        });
        //crud misi kandidat
        Route::prefix('misi')->name('misi.')->middleware('role:admin')->group(function() {
    
            Route::get('/', [EditMisiController::class, 'index'])->name('index');
        
            Route::get('{id}/show', [EditMisiController::class, 'show'])->name('show');
        
            Route::get('create', [EditMisiController::class, 'create'])->name('create');
    
            Route::get('{id}/edit', [EditMisiController::class, 'edit'])->name('edit');
    
            Route::post('store', [EditMisiController::class, 'store'])->name('store');
    
            Route::put('{id}/update', [EditMisiController::class, 'update'])->name('update');
    
            Route::get('{id}/delete', [EditMisiController::class, 'destroy'])->name('destroy');
        
        });
    });
});


//Middleware user
Route::prefix('user')->name('user.')->middleware('role:user')->group( function() {

    Route::get('/pilih-kandidat', [PilihkandidatController::class, 'voting'])->name('pilih-kandidat');

    Route::get('/informasi-suara', [InformasisuaraController::class, 'suara'])->name('informasi-suara');

    Route::get('/informasi-pemenang', [InformasipemenangController::class, 'pemenang'])->name('informasi-pemenang');

    Route::post('/pilih-kandidat/{id}', [PilihkandidatController::class, 'vote'])->name('kandidat.pilih');
});



