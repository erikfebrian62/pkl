<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\LoginController;
use App\Http\Controllers\Admin\EditPemenangController;
use App\Http\Controllers\Guest\DisplayController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EditkandidatController;
use App\Http\Controllers\Users\PilihkandidatController;
use App\Http\Controllers\Users\InformasisuaraController;
use App\Http\Controllers\Admin\InformasibiodataController;
use App\Http\Controllers\Users\InformasipemenangController;

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



// Route::get('/nunggu', function () {
    //     return view('nunggu');
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

    Route::get('/dashboard', [DashboardController::class, 'dash'])->name('dashboard');

    Route::get('/display', [DisplayController::class, 'display'])->name('display');

    //crud user
    Route::get('/informasi-biodata', [InformasibiodataController::class, 'index'])->name('biodata.index');

    Route::post('/informasi-biodata', [InformasibiodataController::class, 'import'])->name('biodata.imports');

    Route::get('/informasi-biodata/export', [InformasibiodataController::class, 'export'])->name('biodata.export');

    Route::get('/informasi-biodata/{id}/edit', [InformasibiodataController::class, 'edit'])->name('biodata.edit');

    Route::put('/informasi-biodata/{id}', [InformasibiodataController::class, 'update'])->name('biodata.update');

    Route::get('/informasi-biodata/{id}', [InformasibiodataController::class, 'destroy'])->name('biodata.destroy');

    //crud candidate

    Route::prefix('kandidat')->name('kandidat.')->middleware('role:admin')->group(function() {

        Route::get('/', [EditkandidatController::class, 'index'])->name('index');

        Route::get('create', [EditkandidatController::class, 'create'])->name('create');

        Route::get('{id}/edit', [EditkandidatController::class, 'edit'])->name('edit');

        Route::get('{id}/show', [EditkandidatController::class, 'show'])->name('show');

        Route::post('create', [EditkandidatController::class, 'store'])->name('store');

        Route::put('{id}/update', [EditkandidatController::class, 'update'])->name('update');

        Route::get('{id}', [EditkandidatController::class, 'destroy'])->name('destroy');
    });

    //crud pemenang
    Route::prefix('pemenang')->name('pemenang.')->middleware('role:admin')->group(function(){

        Route::get('/', [EditPemenangController::class, 'index'])->name('index');

        Route::get('{id}/show', [EditPemenangController::class, 'show'])->name('show');

        Route::get('create', [EditPemenangController::class, 'create'])->name('create');

        Route::get('{id}/edit', [EditPemenangController::class, 'edit'])->name('edit');

        Route::post('create', [EditPemenangController::class, 'store'])->name('store');

        Route::put('{id}', [EditPemenangController::class, 'update'])->name('update');

        Route::get('{id}', [EditPemenangController::class, 'destroy'])->name('destroy');
    });
});


//Middleware user
Route::prefix('user')->name('user.')->middleware('role:user')->group( function() {

    Route::get('/pilih-kandidat', [PilihkandidatController::class, 'voting'])->name('pilih-kandidat');

    Route::get('/informasi-suara', [InformasisuaraController::class, 'suara'])->name('informasi-suara');

    Route::get('/informasi-pemenang', [InformasipemenangController::class, 'pemenang'])->name('informasi-pemenang');

    Route::get('/pilih-kandidat/{id}', [PilihkandidatController::class, 'vote'])->name('kandidat.pilih');

    Route::get('/wait', [EditPemenangController::class, 'wait'])->name('waiting');
});



