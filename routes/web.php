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
use App\Http\Controllers\Backend\CountupsController;
use App\Http\Controllers\Backend\ClientsController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\ParallaxController;
use App\Http\Controllers\TestmonialsController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\WhoWeAreController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceBannerController;
use App\Http\Controllers\ServiceViewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;

// Route::get('/', function () {
//     return view('welcome');
// });


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
        Route::get('/view/contact/message/{id}', 'ViewMessage')->name('view.contact.message');
        Route::get('/delete/contact/message/{id}', 'DeleteContactMessage')->name('delete.contact.message');
    });

    /// Site Setting All Route 
    Route::controller(ServiceBannerController::class)->group(function () {

        Route::get('/edit/banner/services/setting', 'ServicesBannerSetting')->name('services.banner.setting');
        Route::post('/services/banner/update', 'ServicesBannerUpdate')->name('services.banner.update');
    });
    /// Site Setting All Route 
    Route::controller(WhoWeAreController::class)->group(function () {

        Route::get('/who/we/are/setting', 'WhoWeAreSetting')->name('all.who.we.are');
        Route::post('/who/we/are/setting/update', 'WhoWeAreUpdate')->name('who.we.are.update');
    });

    /// Parallax Setting All Route 
    Route::controller(ParallaxController::class)->group(function () {

        Route::get('/parallax/setting', 'ParallaxSetting')->name('parallax.setting');
        Route::post('/parallax/update', 'ParallaxUpdate')->name('parallax.update');
    });

    // Blog Category All Route 
    Route::controller(BlogController::class)->group(function () {

        Route::get('/blog/category', 'BlogCategory')->name('blog.category');
        Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
        Route::get('/edit/blog/category/{id}', 'EditBlogCategory');
        Route::post('/update/blog/category', 'UpdateBlogCategory')->name('update.blog.category');
        Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
    });

    /// Blog Post All Route 
    Route::controller(BlogController::class)->group(function () {

        Route::get('/all/blog/post', 'AllBlogPost')->name('all.blog.post');
        Route::get('/add/blog/post', 'AddBlogPost')->name('add.blog.post');
        Route::post('/store/blog/post', 'StoreBlogPost')->name('store.blog.post');
        Route::get('/edit/blog/post/{id}', 'EditBlogPost')->name('edit.blog.post');
        Route::post('/update/blog/post', 'UpdateBlogPost')->name('update.blog.post');
        Route::get('/delete/blog/post/{id}', 'DeleteBlogPost')->name('delete.blog.post');
    });
}); //End middleware Admin Group Controller

///////Admin Group Middleware //////////////////////////////////////////////////////////////////

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

    ///Services us Backend
    Route::controller(ServiceController::class)->group(function () {
        Route::get('/all/services', 'AllServices')->name('all.services');
        Route::get('/add/services', 'AddServices')->name('add.services');
        Route::post('/store/service', 'StoreServices')->name('store.services');
        Route::get('/edit/service/{id}', 'EditServices')->name('edit.services');
        Route::post('/update/service', 'UpdateServices')->name('update.services');
        Route::get('/delete/service/{id}', 'DeleteServices')->name('delete.services');
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


    /// Countups All Route 
    Route::controller(CountupsController::class)->group(function () {


        Route::get('/edit/countups', 'EditCountups')->name('edit.countups');
        Route::post('/countups/update', 'UpdateCountups')->name('countups.update');
    });

    /// clients All Route 
    Route::controller(ClientsController::class)->group(function () {

        Route::get('/all/clients', 'AllClients')->name('all.clients');
        Route::get('/add/clients', 'AddClients')->name('add.clients');
        Route::post('/clients/store', 'StoreClients')->name('clients.store');
        Route::get('/edit/clients/{id}', 'EditClients')->name('edit.clients');
        Route::post('/clients/update', 'UpdateClients')->name('clients.update');
        Route::get('/delete/clients/{id}', 'DeleteClients')->name('delete.clients');
    });

    /// testmonials All Route 
    Route::controller(TestmonialsController::class)->group(function () {

        Route::get('/all/testmonials', 'AllTestmonials')->name('all.testmonials');
        Route::get('/add/testmonials', 'AddTestmonials')->name('add.testmonials');
        Route::post('/testmonials/store', 'StoreTestmonials')->name('testmonials.store');
        Route::get('/edit/testmonials/{id}', 'EditTestmonials')->name('edit.testmonials');
        Route::post('/testmonials/update', 'UpdateTestmonials')->name('testmonials.update');
        Route::get('/delete/testmonials/{id}', 'DeleteTestmonials')->name('delete.testmonials');
    });

    ///About us Backend
    Route::controller(AboutUsController::class)->group(function () {
        Route::get('/edit/about_us/banner', 'EditAboutUsBanner')->name('edit.about.us.banner');
        Route::post('/about_us/banner/update', 'UpdateAboutUsBanner')->name('about.us.banner.update');
        Route::get('/edit/pie/chart', 'EditPieChart')->name('edit.pie.chart');
        Route::post('/pie/chart/update', 'UpdatePieChart')->name('pie.chart.update');
        Route::get('/all/pie/chart', 'AllPieCharts')->name('all.pie.chart');
        Route::get('/add/pie/chart', 'AddPieChart')->name('add.pie.chart');
        Route::post('/pie/chart/store', 'StorePieChart')->name('pie.chart.store');
        Route::get('/edit/pie/chart/approach/{id}', 'EditPieChartApproach')->name('edit.pie.chart.approach');
        Route::post('/pie/chart/approach/update', 'UpdatePieChartApproach')->name('pie.chart.update.approach');
        Route::get('/delete/pie/chart/{id}', 'DeletePieChart')->name('delete.pie.chart');
    });
}); // End Admin Group Middleware 


///////////////Admin Login Pagecontroller//////////////////////////

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

///////////////////FRONTEND METHODS////////////////////////////////////////////////

///Frontend home page////////////////////////
Route::get('/', [UserController::class, 'index']);

/// Frontend Contact us 
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'ContactUs')->name('contact.us');
    Route::post('/store/contact', 'StoreContactUs')->name('store.contact');
});

/// Frontend About us 
Route::controller(AboutUsController::class)->group(function () {
    Route::get('/about_us', 'AboutUs')->name('about.us');
});

/// Frontend Our Service
Route::controller(ServiceViewController::class)->group(function () {
    Route::get('/services', 'Services')->name('services.page');
});

/// Frontend Blog  All Route 
Route::controller(BlogController::class)->group(function () {

    Route::get('/blog/details/{slug}', 'BlogDetails');
    Route::get('/blog/cat/list/{id}', 'BlogCatList');
    Route::get('/blog', 'BlogList')->name('blog.list');
});
/// Frontend Comment All Route 
Route::controller(CommentController::class)->group(function () {

    Route::post('/store/comment/', 'StoreComment')->name('store.comment');
});
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');