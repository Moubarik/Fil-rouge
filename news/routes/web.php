<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\SubDistrictController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Frontend\ExtraController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\WebsiteSettingController;

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

Route::get('/', function () {
    return view('main.home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
 //Admin Logout
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');
 //Admin Category All Routes
 Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
 Route::get('/add/category', [CategoryController::class, 'AddCategory'])->name('add.category');
 Route::post('/store/category', [CategoryController::class, 'StoreCategory'])->name('store.category');
 Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');
 Route::post('/update/category/{id}', [CategoryController::class, 'UpdateCategory'])->name('update.category');
 Route::get('/delete/category/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');
 //Admin SubCategory All Routes
 Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategories');
 Route::get('/add/subcategory', [SubCategoryController::class, 'AddSubCategory'])->name('add.subcategory');
 Route::POST('/store/subcategory', [SubCategoryController::class, 'StoreSubCategory'])->name('store.subcategory');
 Route::get('/edit/subcategory/{id}', [SubCategoryController::class, 'EditSubCategory'])->name('edit.subcategory');
 Route::post('/update/subcategory/{id}', [SubCategoryController::class, 'UpdateSubCategory'])->name('update.subcategory');
 Route::get('/delete/subcategory/{id}', [SubCategoryController::class, 'DeleteSubCategory'])->name('delete.subcategory');
 //Admin district All Routes
 Route::get('/district', [DistrictController::class, 'index'])->name('district');
 Route::get('/add/district', [DistrictController::class, 'AddDistrict'])->name('add.district');
 Route::post('/store/district', [DistrictController::class, 'StoreDistrict'])->name('store.district');
 Route::get('/edit/district/{id}', [DistrictController::class, 'EditDistrict'])->name('edit.district');
 Route::post('/update/district/{id}', [DistrictController::class, 'UpdateDistrict'])->name('update.district');
 Route::get('/delete/district/{id}', [DistrictController::class, 'DeleteDistrict'])->name('delete.district');
// Admin SubDistrict All Routes 
Route::get('/subdistrict', [SubDistrictController::class, 'Index'])->name('subdistrict');
Route::get('/add/subdistrict', [SubDistrictController::class, 'AddSubDistrict'])->name('add.subdistrict');
Route::post('/store/subdistrict', [SubDistrictController::class, 'StoreSubDistrict'])->name('store.subdistrict');
Route::get('/edit/subdistrict/{id}', [SubDistrictController::class, 'EditSubDistrict'])->name('edit.subdistrict');
Route::post('/update/subdistrict/{id}', [SubDistrictController::class, 'UpdateSubDistrict'])->name('update.subdistrict');
Route::get('/delete/subdistrict/{id}', [SubDistrictController::class, 'DeleteSubDistrict'])->name('delete.subdistrict');
// // Json Data for Category and District
Route::get('/get/subcategory/{category_id}', [PostController::class, 'GetSubCategory']);
Route::get('/get/subdistrict/{district_id}', [PostController::class, 'GetSubDistrict']);
// Admin Posts All Routes 
Route::get('/allpost', [PostController::class, 'index'])->name('all.post');
Route::get('/createpost', [PostController::class, 'Create'])->name('create.post');
Route::post('/store/post', [PostController::class, 'StorePost'])->name('store.post');
Route::get('/edit/post/{id}', [PostController::class, 'EditPost'])->name('edit.post');
Route::post('/update/post/{id}', [PostController::class, 'UpdatePost'])->name('update.post');
Route::get('/delete/post/{id}', [PostController::class, 'DeletePost'])->name('delete.post');
// Social Setting
Route::get('/social/setting', [SettingController::class, 'SocialSetting'])->name('social.setting');
Route::post('/social/update/{id}', [SettingController::class, 'SocialUpdate'])->name('update.social');

// Seo Settings Routes

Route::get('/seo/setting', [SettingController::class, 'SeoSetting'])->name('seo.setting');
Route::post('/seo/update/{id}', [SettingController::class, 'SeoUpdate'])->name('update.seo');
// Website LiNK Route 
Route::get('/website/setting', [SettingController::class, 'WebsiteSetting'])->name('all.website');

Route::get('/add/website', [SettingController::class, 'AddWebsiteSetting'])->name('add.website');

Route::post('/store/website', [SettingController::class, 'StoreWebsite'])->name('store.website');


Route::get('/delete/website/{id}', [SettingController::class, 'DeleteWebsite'])->name('delete.website');
// Photo Gallery Routes

Route::get('/photo/gallery', [GalleryController::class, 'PhotoGallery'])->name('photo.gallery');
Route::get('/add/photo', [GalleryController::class, 'AddPhoto'])->name('add.photo');
Route::post('/store/photo', [GalleryController::class, 'StorePhoto'])->name('store.photo');

// Route::get('/edit/photo/{id}', [GalleryController::class, 'EditPhoto'])->name('edit.photo');
// Route::post('/update/photo/{id}', [GalleryController::class, 'UpdatePhoto'])->name('update.photo');
Route::get('/delete/photo/{id}', [GalleryController::class, 'DeletePhoto'])->name('delete.photo');
// Photo Gallery Routes
Route::get('/video/gallery', [GalleryController::class, 'VideoGallery'])->name('video.gallery');
Route::get('/add/video', [GalleryController::class, 'AddVideo'])->name('add.video');
Route::post('/store/video', [GalleryController::class, 'StoreVideo'])->name('store.video');
Route::get('/delete/video/{id}', [GalleryController::class, 'DeleteVideo'])->name('delete.video');



// Frontend
// multilanguage  Routes
Route::get('/lang/arabic', [ExtraController::class, 'Arabic'])->name('lang.arabic');
Route::get('/lang/english', [ExtraController::class, 'English'])->name('lang.english');
// Single Post Page 

Route::get('/view/post/{id}', [ExtraController::class, 'SinglePost']);
// Post category and subctegory pages
Route::get('/catpost/{id}/{category_en}', [ExtraController::class, 'CatPost']);
Route::get('/subcatpost/{id}/{subcategory_en}', [ExtraController::class, 'SubCatPost']);
// Search District in Home Page 
// Route::get('//get/subdistrict/frontend/{district_id}'),
Route::get('//get/subdistrict/frontend/{district_id}', [ExtraController::class, 'GetSubDist']);


// Search District In Home page 

Route::get('/get/subdistrict/frontend/{district_id}', [ExtraController::class, 'GetSubDist']);

Route::get('/search/district', [ExtraController::class, 'SearchDistrict'])->name('searchby.districts');


// // Writer Role Routes

Route::get('/add/writer', [RoleController::class, 'InsertWriter'])->name('add.writer');

Route::post('/store/writer', [RoleController::class, 'StoreWriter'])->name('store.writer');

Route::get('/all/writer', [RoleController::class, 'AllWriter'])->name('all.writer');

Route::get('/edit/writer/{id}', [RoleController::class, 'EditWriter'])->name('edit.writer');

Route::post('/update/writer/{id}', [RoleController::class, 'UpdateWriter'])->name('update.writer');

// // All Website Setting Routes 

Route::get('/web/setting', [WebsiteSettingController::class, 'MainWebSetting'])->name('website.setting');

Route::post('/update/websetting/{id}', [WebsiteSettingController::class, 'UpdateWebSetting'])->name('update.websetting');

// // Account Setting Routes 
Route::get('/account/setting', [AdminController::class, 'AccountSetting'])->name('account.setting');

Route::get('/profile/edit', [AdminController::class, 'ProfileEdit'])->name('profile.edit');

Route::post('/profile/store', [AdminController::class, 'ProfileStore'])->name('profile.store');

// /// Change Password 

Route::get('/show/password', [AdminController::class, 'ShowPassword'])->name('show.password');

Route::post('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');