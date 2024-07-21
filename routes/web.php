<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\PlanController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\FeaturesController;
use App\Models\Features;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');



    /// Site Setting All Route 
    Route::controller(SettingController::class)->group(function () {

        Route::get('/site/setting', 'SiteSetting')->name('site.setting');
        Route::post('/site/update', 'SiteUpdate')->name('site.update');
        // contact message admin view
        Route::get('/contact/message', 'AdminContactMessage')->name('contact.message');
    });
}); //End middleware Admin Group Controller

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');



/// Frontend Contact us 
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'ContactUs')->name('contact.us');
    Route::post('/store/contact', 'StoreContactUs')->name('store.contact');
});

// Admin Group Middleware 
Route::middleware(['auth', 'role:admin'])->group(function () {

    /// Team All Route 
    Route::controller(TeamController::class)->group(function () {

        Route::get('/all/team', 'AllTeam')->name('all.team');
        Route::get('/add/team', 'AddTeam')->name('add.team');
        Route::post('/team/store', 'StoreTeam')->name('team.store');
        Route::get('/edit/team/{id}', 'EditTeam')->name('edit.team');
        Route::post('/team/update', 'UpdateTeam')->name('team.update');
        Route::get('/delete/team/{id}', 'DeleteTeam')->name('delete.team');
        
    });

     /// Plan All Route 
     Route::controller(PlanController::class)->group(function () {

        Route::get('/all/plan', 'AllPlan')->name('all.plan');
        Route::get('/add/plan', 'AddPlan')->name('add.plan');
        Route::post('/plan/store', 'StorePlan')->name('plan.store');
        Route::get('/edit/plan/{id}', 'EditPlan')->name('edit.plan');
        Route::post('/plan/update', 'UpdatePlan')->name('plan.update');
        Route::get('/delete/plan/{id}', 'DeletePlan')->name('delete.plan');
        
    });

    
     /// Banner All Route 
     Route::controller(BannerController::class)->group(function () {

        Route::get('/all/banner', 'AllBanner')->name('all.banner');
        Route::get('/add/banner', 'AddBanner')->name('add.banner');
        Route::post('/banner/store', 'StoreBanner')->name('banner.store');
        Route::get('/edit/banner/{id}', 'EditBanner')->name('edit.banner');
        Route::post('/banner/update', 'UpdateBanner')->name('banner.update');
        Route::get('/delete/banner/{id}', 'DeleteBanner')->name('delete.banner');
        
    });

    /// Features All Route 
    Route::controller(FeaturesController::class)->group(function () {

        Route::get('/all/features', 'AllFeatures')->name('all.features');
        Route::get('/add/features', 'AddFeatures')->name('add.features');
        Route::post('/features/store', 'StoreFeatures')->name('features.store');
        Route::get('/edit/features/{id}', 'EditFeatures')->name('edit.features');
        Route::post('/features/update', 'UpdateFeatures')->name('features.update');
        Route::get('/delete/features/{id}', 'DeleteFeatures')->name('delete.features');
        
    });
}); // End Admin Group Middleware 