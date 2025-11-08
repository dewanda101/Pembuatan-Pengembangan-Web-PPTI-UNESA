<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccountAuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\DivisionCenterController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\SistemInformasiController;
use App\Http\Controllers\UserManualController;
use App\Http\Controllers\ManualBookController;
use PHPUnit\TextUI\XmlConfiguration\Logging\TeamCity;

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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::get('/', [HomeController::class, 'index'])->name('home');
// Rute untuk halaman form pengaduan
Route::resource('contact', ContactController::class);
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// Rute untuk menyimpan data pengaduan
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/blog/{id}', [NewsController::class, 'show'])->name('blog');

// Route::get('/news', [NewsController::class, 'index'])->name('news.index'); // Route untuk melihat daftar berita
// Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show'); // Route untuk melihat detail berita
// Route::post('/news/post', [NewsController::class, 'store'])->name('news.store');
Route::get('/news-create', [NewsController::class, 'createNews'])->name('news.create-news'); 
Route::resource('news', NewsController::class)->names('news');


Route::resource('admin', AdminController::class);
        

Route::get('user/register', [UserController::class, 'showRegistrationForm'])->name('user.register');
Route::post('user/register', [RegisterController::class, 'store'])->name('user.register.store');
   
Route::get('user/login', [UserController::class, 'showLoginForm'])->name('user.login');
Route::post('user/login', [UserController::class, 'login'])->name('user.login.submit');                                                                                                                                                                                                                           
Route::post('user/logout', [UserController::class, 'logout'])->name('user.logout'); 

// ROUTE DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index']);

// ROUTE DAFTAR USER
Route::prefix('profile')->group(function () {
 Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
 Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
 Route::put('/', [ProfileController::class, 'update'])->name('profile.update');  });

    
 
// Route untuk halaman login
Route::get('/account/login', [AccountAuthController::class, 'showLoginForm'])->name('account.login');
// Route untuk memproses login
Route::post('/account/login', [AccountAuthController::class, 'login'])->name('account.login.submit');

// Route untuk Kategori
Route::resource('kategori', KategoriController::class);

// Route untuk document
Route::get('/document/teams', [DocumentController::class, 'indexTeams'])->name('document.indexTeams');
Route::resource('document', DocumentController::class)->names('document');

// Route untuk jabatan 
Route::resource('jabatan', JabatanController::class)->names('jabatan');

// Route untuk devision center 
Route::resource('division-center', DivisionCenterController::class)->names('division-center');

// Route untuk kontak 
Route::resource('kontak', KontakController::class);

// Route untuk visi misi
Route::resource('visi_misi', VisiMisiController::class);

//Route untuk sistem informasi
Route::resource('sistem-informasi', SistemInformasiController::class);

// Route untuk halaman user manual 
Route::resource('user-manual', UserManualController::class);

// Route untuk halaman manual book halamanya tdk di tampilkan
Route::resource('manualbook', ManualbookController::class);

