<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditkandidatController;
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

//Auth login & logout
Route::get('/', [LoginController::class, 'index'])->name('login.index');

Route::post('/', [LoginController::class, 'proces'])->name('login.proces');

Route::get('/logout', function () {
    Auth::logout();

    return redirect(route('login.index'));
})->name('logout');


//Middleware admin
Route::prefix('admin')->name('admin.')->middleware('role:admin')->group( function() {

    Route::get('/dasboard', [DashboardController::class, 'dash'])->name('dashboard');

    //crud user
    Route::get('/informasi-biodata', [InformasibiodataController::class, 'index'])->name('biodata.index');

    Route::get('/informasi-biodata/create', [InformasibiodataController::class, 'create'])->name('biodata.create');

    Route::post('/informasi-biodata/store', [InformasibiodataController::class, 'store'])->name('biodata.store');

    Route::get('/informasi-biodata/{id}/edit', [InformasibiodataController::class, 'edit'])->name('biodata.edit');

    Route::put('/informasi-biodata/{id}', [InformasibiodataController::class, 'update'])->name('biodata.update');

    Route::delete('/informasi-biodata/{id}', [InformasibiodataController::class, 'destroy'])->name('biodata.destroy');

    //crud candidate
    Route::get('/edit-kandidat', [EditkandidatController::class, 'index'])->name('kandidat.index');

    Route::get('/edit-kandidat/create', [EditkandidatController::class, 'create'])->name('kandidat.create');

    Route::post('/edit-kandidat/store', [EditkandidatController::class, 'store'])->name('kandidat.store');

    Route::get('/edit-kandidat/{id}/edit', [EditkandidatController::class, 'edit'])->name('kandidat.edit');

    Route::put('/edit-kandidat/{id}', [EditkandidatController::class, 'update'])->name('kandidat.update');

    Route::delete('/edit-kandidat/{id}', [EditkandidatController::class, 'destroy'])->name('kandidat.destroy');

    Route::get('/edit-kandidat/{id}', [EditkandidatController::class, 'show'])->name('kandidat.show');
});


//Middleware user
Route::prefix('user')->name('user.')->middleware('role:user')->group( function() {

    Route::get('/pilih-kandidat', [PilihkandidatController::class, 'voting'])->name('pilih-kandidat');

    Route::get('/informasi-suara', [InformasisuaraController::class, 'suara'])->name('informasi-suara');

    Route::get('/informasi-pemenang', [InformasipemenangController::class, 'pemenang'])->name('informasi-pemenang');

    Route::post('/pilih-kandidat/{id}', [PilihkandidatController::class, 'vote'])->name('kandidat.pilih');
});



