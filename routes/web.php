    <?php

    use Illuminate\Support\Facades\Route;
    use App\Models\Ngaji;
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\RegistrasiController;
    use App\Http\Controllers\DataMengajiController;

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
    //halaman awal pengguna
    Route::get('/', function () {
        return view('master');
    });
    //rute halaman login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    //rute logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    //rute halaman registrasi
    Route::get('/registrasi', [RegistrasiController::class, 'showForm'])->name('registrasi');
    Route::post('/registrasi', [RegistrasiController::class, 'register'])->name('registrasi.submit');
    //rute halaman rekap
    Route::get('/rekap', [DataMengajiController::class, 'rekap'])->name('rekap');
    //parameter rute hapus id
    Route::get('/hapusngaji/{id}', [DataMengajiController::class, 'hapus'])->name('hapusngaji');
    //rute halaman data mengaji
    Route::get('/datamengaji', function () {
        return view('datamengaji');
    });
    //rute halaman tentang
    Route::get('/tentang', function () {
        return view('tentang');
    });
    Route::get('/tentang', function () {
        return view('tentang');
    })->name('about');
    Route::get('/datamengaji', [DataMengajiController::class, 'index'])->name('datamengaji.index');
    //rute POST untuk menyimpan data mengaji ke fungsi store() dalam DataMengajiController.
    Route::post('/uploaddatamengaji', [DataMengajiController::class, 'store'])->name('datamengaji.store');
