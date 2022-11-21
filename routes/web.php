<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\LoginController;
use App\Http\Controllers\Admin\EditPemenangController;
use App\Http\Controllers\Guest\DisplayController;
use App\Http\Controllers\Admin\EditMisiController;
use App\Http\Controllers\Admin\EditVisiController;
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
    Route::get('/informasi-biodata', [InformasibiodataController::class, 'index'])->name('biodata.index');

    Route::post('/informasi-biodata', [InformasibiodataController::class, 'import'])->name('biodata.imports');

    Route::get('/informasi-biodata/export', [InformasibiodataController::class, 'export'])->name('biodata.export');

    // Route::get('/informasi-biodata/create', [InformasibiodataController::class, 'create'])->name('biodata.create');

    // Route::post('/informasi-biodata/store', [InformasibiodataController::class, 'store'])->name('biodata.store');

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

        Route::put('{id}', [EditkandidatController::class, 'update'])->name('update');

        Route::delete('{id}', [EditkandidatController::class, 'destroy'])->name('destroy');

        //crud visi kandidat
        Route::prefix('visi')->name('visi.')->middleware('role:admin')->group(function() {

            Route::get('/', [EditVisiController::class, 'index'])->name('index');

            Route::get('{id}/show', [EditVisiController::class, 'show'])->name('show');

            Route::get('create', [EditVisiController::class, 'create'])->name('create');

            Route::get('{id}/edit', [EditVisiController::class, 'edit'])->name('edit');

            Route::post('create', [EditVisiController::class, 'store'])->name('store');

            Route::put('{id}', [EditVisiController::class, 'update'])->name('update');

            Route::delete('{id}', [EditVisiController::class, 'destroy'])->name('destroy');

        });
        //crud misi kandidat
        Route::prefix('misi')->name('misi.')->middleware('role:admin')->group(function() {

            Route::get('/', [EditMisiController::class, 'index'])->name('index');

            Route::get('{id}/show', [EditMisiController::class, 'show'])->name('show');

            Route::get('create', [EditMisiController::class, 'create'])->name('create');

            Route::get('{id}/edit', [EditMisiController::class, 'edit'])->name('edit');

            Route::post('create', [EditMisiController::class, 'store'])->name('store');

            Route::put('{id}/update', [EditMisiController::class, 'update'])->name('update');

            Route::get('{id}/delete', [EditMisiController::class, 'destroy'])->name('destroy');

            Route::put('{id}', [EditMisiController::class, 'update'])->name('update');

            Route::delete('{id}', [EditMisiController::class, 'destroy'])->name('destroy');

        });
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
});



