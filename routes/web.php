<?php

use App\Http\Controllers\Admin\SubMenuItem;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductEntryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\TaxSlabController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\GetAllRoutes;
use App\Http\Controllers\Admin\MenuItem;
use App\Http\Controllers\Admin\BrandController;



Route::post('/get-subcategories', [ProductCategoryController::class, 'getSubcategories'])->name('get.subcategories');


// other 'use' call from db


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

/*Route::get('/', function () {
    return view('home');
   // return view('welcome');
});*/

Route::get('/', [TemplateController::class, 'home'])->name('home');

Route::get('/template/{template}', [TemplateController::class, 'show']);
//Route::get('/category/{category_name}/cat-{id}', [TemplateController::class, 'product']);
//Route::get('/category/{subcategory_name}/sbct-{id}', [TemplateController::class, 'product']);

//Route::get('/items/{slug}/pd-{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/product/{slug}/{id}', function ($slug, $id) {
    return app()->call('App\Http\Controllers\TemplateController@show', [
        'template' => 'product', // Hardcoded value
        'slug' => $slug,
        'id' => $id,
    ]);
})->name('product');


Route::get('/category/{category_name}/{id}', function ($category_name, $id) {
    return app()->call('App\Http\Controllers\TemplateController@show', [
        'template' => 'category', // Hardcoded value
        'slug' => $category_name,
        'id' => $id,
    ]);
})->name('category');


Route::get('/{slug}', [TemplateController::class, 'pages'])
    ->name('static.page');





// other 'routes' call from db
Auth::routes();

// Admin Routes
Route::prefix('admin')->group(function () {

    // Redirect "/admin" to "/admin/login"
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });

    // Admin Login Routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);

    // Protected Admin Routes (Only for Logged-in Admins), put all admin pages here
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

        Route::post('/product/store', [ProductEntryController::class, 'store'])->name('admin.product.store');
        Route::get('/product/add_product', [ProductEntryController::class, 'add_product'])->name('admin.product.add_product');

        Route::get('/check-slug', [ProductEntryController::class, 'checkSlug'])->name('check.slug');


        #list all existing menu
        Route::get('/menus', [MenuController::class, 'index'])->name('admin.menu');
        Route::get('/menus/view/{any?}', [MenuController::class, 'viewAll'])->name('admin.menu.view');

        Route::get('/compnay', [CompanyController::class, 'index'])->name('admin.company');

        Route::get('/company/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit');
        Route::post('/company/update', [CompanyController::class, 'update'])->name('company.update');


        // =============================MENU==============================
        Route::get('fetch/menus', [MenuController::class, 'AllMenus']);

        Route::post('insert/add-menu', [MenuController::class, 'Add']);

        Route::post('update/toggle/menu/status', [MenuController::class, 'StatusToggle']);
        Route::post('update/toggle/menu/display/title', [MenuController::class, 'DisplayTitleToggle']);
        Route::post('update/edit-menu', [MenuController::class, 'UpdateTitle']);
        Route::post('delete/menu', [MenuController::class, 'DeleteMenu']);
        // ITEM
        Route::post('update/menu/item/order', [MenuItem::class, 'Order']);
        Route::get('fetch/all/routes', [GetAllRoutes::class, 'All']);
        Route::post('insert/menu/item', [MenuItem::class, 'Add']);
        Route::post('delete/menu-item', [MenuItem::class, 'DeleteMenu']);
        Route::post('update/menu/item', [MenuItem::class, 'UpdateItem']);
        // SUB ITEM
        Route::post('insert/sub-menu/item', [SubMenuItem::class, 'Add']);
        Route::post('fetch/sub-menu/item', [SubMenuItem::class, 'All']);
        Route::post('delete/sub-menu/item', [SubMenuItem::class, 'DeleteItem']);

        Route::post('/get-subcategories', [ProductCategoryController::class, 'getSubcategories'])->name('get.subcategories');

        Route::get('/banner', [BannerController::class, 'index'])->name('banner');
        Route::get('/banner/show/{banner_location}', [BannerController::class, 'show'])->name('banner.show');

        Route::get('/banner/edit_slide/{id}', [BannerController::class, 'edit_slide'])->name('banner.edit_slide');

        Route::get('/banner/delete_slide/{id}', [BannerController::class, 'delete_slide'])->name('banner.delete_slide');

        Route::post('/banner/store', [BannerController::class, 'store'])->name('banner.store');

        Route::prefix('discount')->group(function () {
            Route::get('/', [DiscountController::class, 'index'])->name('admin.discount');
            Route::get('/create', [DiscountController::class, 'create'])->name('admin.discount.create');
            Route::post('/store', [DiscountController::class, 'store'])->name('admin.discount.store');
            Route::get('/edit/{id}', [DiscountController::class, 'edit'])->name('admin.discount.edit');
            Route::post('/update/{id}', [DiscountController::class, 'update'])->name('admin.discount.update');
            Route::post('/delete/{id}', [DiscountController::class, 'destroy'])->name('admin.discount.delete');
            Route::post('/discount/toggle-status', [DiscountController::class, 'toggleStatus'])->name('admin.discount.status');
        });

//brands
Route::get('brand/view', [BrandController::class, 'View'])->name('admin.brands.index');

Route::get('brands/create', [BrandController::class, 'create'])->name('admin.brand.create');
Route::post('brands/store', [BrandController::class, 'store'])->name('admin.brand.store');
    Route::get('brands/edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
    Route::post('brands/update/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
    Route::get('brands/delete/{id}', [BrandController::class, 'destroy'])->name('admin.brand.delete');



        Route::prefix('tax-slab')->group(function () {
            Route::get('/', [TaxSlabController::class, 'index'])->name('admin.tax.slab');
            Route::post('/store', [TaxSlabController::class, 'store'])->name('admin.tax.slab.store');
            Route::get('/edit/{id}', [TaxSlabController::class, 'edit'])->name('admin.tax.slab.edit');
            Route::put('/update/{taxSlab}', [TaxSlabController::class, 'update'])->name('admin.tax.slab.update');
            Route::delete('/delete/{id}', [TaxSlabController::class, 'destroy'])->name('admin.tax.slab.delete');
        });

        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.category');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
            Route::put('/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
            Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
        });

        Route::prefix('section')->group(function () {
            Route::get('/', [SectionController::class, 'index'])->name('admin.section');
            Route::get('/get-all-products/{sectionId}', [SectionController::class, 'getAllProducts'])->name('admin.section.getAllProducts');
            Route::get('/create', [SectionController::class, 'create'])->name('admin.section.create');
            Route::get('/edit/{id}', [SectionController::class, 'edit'])->name('admin.section.edit');
            Route::post('/store', [SectionController::class, 'store'])->name('admin.section.store');
            Route::post('/update/{id}', [SectionController::class, 'update'])->name('admin.section.update');
            Route::delete('/delete/{id}', [SectionController::class, 'destroy'])->name('admin.section.destroy');
            Route::post('/section/toggle-title-status', [SectionController::class, 'toggleStatus'])->name('admin.section.changeTitleStatus');
            Route::post('/section/change-status', [SectionController::class, 'changeStatus'])->name('admin.section.changeStatus');
            Route::get('/get-subcategories/{categoryId}', [SectionController::class, 'getSubcategories'])->name('admin.section.getSubcategories');
            Route::get('/search-products', [SectionController::class, 'searchProducts']);
            Route::post('/add-section-products', [SectionController::class, 'storeSectionProduct'])->name('section-products.store');
            Route::delete('/delete/section-product/{id}', [SectionController::class, 'deleteSectionProduct'])->name('admin.section.product.destroy');
        });
    });
});
