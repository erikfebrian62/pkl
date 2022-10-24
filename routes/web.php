<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditkandidatController;
use App\Http\Controllers\PilihkandidatController;
use App\Http\Controllers\InformasisiswaController;
use App\Http\Controllers\InformasisuaraController;
use App\Http\Controllers\InformasibiodataController;
use App\Http\Controllers\InformasipemenangController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    Route::get('/edit-kandidat', [EditkandidatController::class, 'edit'])->name('edit-kandidat');
    Route::get('/informasi-biodata', [InformasibiodataController::class, 'index'])->name('informasi-biodata');
    Route::get('/informasi-biodata/tambah', [InformasibiodataController::class, 'create'])->name('informasi-biodata.tambah');
});


//Middleware user
Route::prefix('user')->name('user.')->middleware('role:user')->group( function() {
    Route::get('/pilih-kandidat', [PilihkandidatController::class, 'voting'])->name('pilih-kandidat');
    Route::get('/informasi-suara', [InformasisuaraController::class, 'suara'])->name('informasi-suara');
    Route::get('/informasi-siswa', [InformasisiswaController::class, 'siswa'])->name('informasi-siswa');
    Route::get('/informasi-pemenang', [InformasipemenangController::class, 'pemenang'])->name('informasi-pemenang');
});



