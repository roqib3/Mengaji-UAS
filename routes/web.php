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
    Route::get('/', function () {
        return view('master');
    });
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/registrasi', [RegistrasiController::class, 'showForm'])->name('registrasi');
    Route::post('/registrasi', [RegistrasiController::class, 'register'])->name('registrasi.submit');
    Route::get('/rekap', [DataMengajiController::class, 'rekap'])->name('rekap');
    Route::get('/hapusngaji/{id}', [DataMengajiController::class, 'hapus'])->name('hapusngaji');
    Route::get('/datamengaji', function () {
        return view('datamengaji');
    });
    Route::get('/tentang', function () {
        return view('tentang');
    });
    Route::get('/tentang', function () {
        return view('tentang');
    })->name('about');
    Route::get('/datamengaji', [DataMengajiController::class, 'index'])->name('datamengaji.index');
    Route::post('/uploaddatamengaji', [DataMengajiController::class, 'store'])->name('datamengaji.store');
