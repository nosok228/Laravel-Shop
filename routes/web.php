<?php

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

Route::get('/', 'ProductController@index')->name('index');

Route::get('/category/{id}', 'ProductController@category');

Route::get('/product/{id}', 'ProductController@product');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/account/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/account/register', 'Auth\RegisterController@register');
    Route::get('/activate/{token}', 'Auth\RegisterController@activate');

    Route::get('/account/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/account/login', 'Auth\LoginController@login');

});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'AccountController@index')->name('account');

    Route::get('/account/logout', 'Auth\LoginController@logout')->name('logout');

    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function(){
        Route::get('/', 'Admin\AdminController@index')->name('admin');
        //products
        Route::get('/products', 'Admin\AdminController@products')->name('products');

        Route::get('/product-add', 'Admin\ProductController@showAddProductForm')->name('product.add');
        Route::post('/product-add', 'Admin\ProductController@addProduct');

        Route::get('/product-edit/{id}', 'Admin\ProductController@showEditProductForm')->name('product.edit');
        Route::post('/product-edit/{id}', 'Admin\ProductController@editProduct');

        Route::get('/product-edit-image/{id}', 'Admin\ProductController@showEditImageProductForm')->name('product.edit');
        Route::post('/product-edit-image/{id}', 'Admin\ProductController@editImageProduct');

        Route::get('/product-delete/{id}', 'Admin\ProductController@deleteProduct')->name('product.delete');

        //categories
        Route::get('/categories', 'Admin\AdminController@categories')->name('categories');

        Route::get('/category-add', 'Admin\CategoryController@showAddCategoryForm')->name('category.add');
        Route::post('/category-add', 'Admin\CategoryController@addCategory');

        Route::get('/category-edit/{id}', 'Admin\CategoryController@showEditCategoryForm')->name('category.edit');
        Route::post('/category-edit/{id}', 'Admin\CategoryController@editCategory');

        Route::get('/category-delete/{id}', 'Admin\CategoryController@deleteCategory');

        //brands
        Route::get('/brands', 'Admin\AdminController@brands')->name('brands');

        Route::get('/brand-add', 'Admin\BrandController@showAddBrandForm')->name('brand.add');
        Route::post('/brand-add', 'Admin\BrandController@addBrand');

        Route::get('/brand-edit/{id}', 'Admin\BrandController@showEditBrandForm')->name('brand.edit');
        Route::post('/brand-edit/{id}', 'Admin\BrandController@editBrand');

        Route::get('/brand-delete/{id}', 'Admin\BrandController@deleteBrand');
    });
});


