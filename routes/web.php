<?php

Route::group(['prefix' => '/cpanel', 'middleware' => ['auth'], 'namespace' => '\App\Http\Controllers\Cpanel'], function() {
    
    Route::get('/',function () {
        return view('/cpanel/index');
    });

    Route::prefix('/admin')->group(function () {
        Route::get('/profile', 'UserController@profile');
        Route::get('/profile/edit', 'UserController@edit_profile');
        Route::patch('/profile/update', 'UserController@update_profile');
    });

    Route::prefix('/systemproperty')->group(function () {
        Route::get('/', 'systempropertyController@index');
        Route::get('/create', 'systempropertyController@create');
        Route::post('/', 'systempropertyController@store');
        Route::patch('/datatable', 'systempropertyController@datatable');
    });

    Route::prefix('/users')->group(function () {
        Route::get('/', 'UserController@index');
        Route::get('/datatable', 'UserController@datatable');
        Route::get('/create', 'UserController@create');
        Route::get('{id}/edit', 'UserController@edit');
        Route::patch('/{id}', 'UserController@update');
        Route::post('/', 'UserController@store');
        Route::post('/delete', 'UserController@destroy');
        // Route::get('/{id}/permission','UserController@permission_user');
        Route::get('/{id}/roles','UserController@users_role');
        Route::patch('/profile/update', 'UserController@update');
        Route::patch('/{id}/update_role', 'UserController@update_role');
    });

    Route::prefix('/roles')->group(function () {
        Route::get('/datatable', 'RoleContorller@datatable');
        Route::get('/', 'RoleContorller@index');
        Route::get('/create', 'RoleContorller@create');
        Route::get('/{id}/edit', 'RoleContorller@edit');
        Route::get('/{id}', 'RoleContorller@show');
        Route::patch('/{id}', 'RoleContorller@update');
        Route::post('/', 'RoleContorller@store');
        Route::post('/delete', 'RoleContorller@destroy');
    });

    Route::prefix('/permissions')->group(function () {
        Route::get('/datatable', 'PermissionsContorller@datatable');
        Route::get('/', 'PermissionsContorller@index');
        Route::get('/create', 'PermissionsContorller@create');
        Route::get('{id}/edit', 'PermissionsContorller@edit');
        Route::patch('/{id}', 'PermissionsContorller@update');
        Route::post('/', 'PermissionsContorller@store');
        Route::post('/delete', 'PermissionsContorller@destroy');
    });
    
    Route::prefix('/category')->group(function () {
        Route::get('/datatable', 'CategoryController@datatable');
        Route::get('/', 'CategoryController@index');
        Route::get('/create', 'CategoryController@create');
        Route::get('{id}/edit', 'CategoryController@edit');
        Route::get('/{id}', 'CategoryController@show');
        Route::patch('/{id}', 'CategoryController@update');
        Route::post('/', 'CategoryController@store');
        Route::post('/upload', 'CategoryController@upload');
        Route::post('/delete', 'CategoryController@destroy');
    });

    Route::prefix('/properties')->group(function () {
        Route::get('/datatable', 'PropertiesController@datatable');
        Route::get('/', 'PropertiesController@index');
        Route::get('/create', 'PropertiesController@create');
        Route::get('/getproperties/{id}', 'PropertiesController@getproperties');
        Route::post('/', 'PropertiesController@store');
        
    });

    Route::prefix('/elementsProperties')->group(function () {
        Route::get('/datatable', 'ElementsPropertiesController@datatable');
        Route::get('/', 'ElementsPropertiesController@index');
        Route::get('/create', 'ElementsPropertiesController@create');
        Route::post('/', 'ElementsPropertiesController@store');
    });

    Route::prefix('/subCategory')->group(function () {
        Route::get('/datatable', 'SubCategoryController@datatable');
        Route::get('/', 'SubCategoryController@index');
        Route::get('/create', 'SubCategoryController@create');
        Route::get('{id}/edit', 'SubCategoryController@edit');
        Route::get('/{id}', 'SubCategoryController@show');
        Route::get('/getsubCategory/{id}', 'SubCategoryController@getsubCategory');
        Route::patch('/{id}', 'SubCategoryController@update');
        Route::post('/', 'SubCategoryController@store');
        Route::post('/upload', 'SubCategoryController@upload');
        Route::post('/delete', 'SubCategoryController@destroy');
    });

    Route::prefix('/products')->group(function () {
        Route::get('/datatable', 'ProductController@datatable');
        Route::get('/', 'ProductController@index');
        Route::get('/create', 'ProductController@create');
        Route::get('{id}/edit', 'ProductController@edit');
        Route::get('/{id}', 'ProductController@show');
        Route::patch('/{id}', 'ProductController@update');
        Route::post('/', 'ProductController@store');
        Route::post('/upload', 'ProductController@upload');
        Route::post('/delete', 'ProductController@destroy');
    });

    Route::prefix('/order')->group(function () {
        Route::get('/datatable', 'OrderController@datatable');
        Route::get('/', 'OrderController@index');
        // Route::get('/create', 'OrderController@create');
        // Route::get('{id}/edit', 'OrderController@edit');
        // Route::get('/{id}', 'OrderController@show');
        // Route::patch('/{id}', 'OrderController@update');
        // Route::post('/', 'OrderController@store');
        // Route::post('/upload', 'OrderController@upload');
        // Route::post('/delete', 'OrderController@destroy');

        Route::prefix('/details')->group(function () {
            Route::get('/datatable/{id}', 'DetailsOrderController@datatable');
            Route::get('/{id}', 'DetailsOrderController@index');
        });

        Route::prefix('/underApproval')->group(function () {
            Route::get('/datatable', 'UnderApprovalOrderController@datatable');
            Route::get('/', 'UnderApprovalOrderController@index');
            Route::post('/agreeOrder', 'UnderApprovalOrderController@agreeOrder');
        });

        Route::prefix('/done')->group(function () {
            Route::get('/datatable', 'DoneOrderController@datatable');
            Route::get('/', 'DoneOrderController@index');
            Route::post('/deliveredOrder', 'DoneOrderController@deliveredOrder');
        });

        Route::prefix('/delivered')->group(function () {
            Route::get('/datatable', 'DeliveredOrderController@datatable');
            Route::get('/', 'DeliveredOrderController@index');
        });

    });

});

Route::get('/', function () {
    return view('website.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => '/', 'namespace' => '\App\Http\Controllers\website'], function() {
    Route::get('/', function () {
        return view('website.index');
    });

    Route::prefix('/category')->group(function () {
        Route::get('/', 'SiteController@category');
        Route::get('/{id}/subcategory', 'SiteController@subcategory');
        Route::get('/subcategories/{id}', 'SiteController@subcategories');
        Route::get('/{id}/subcategory/{sub_id}/products', 'SiteController@products');
        Route::get('/{id}/subcategory/{sub_id}/products/{product_id}', 'SiteController@product');
    });
    Route::post('/addwishlist', 'SiteController@addwishlist');
    Route::post('/addcart', 'SiteController@addcart');
    Route::get('/cart', 'SiteController@cart');
    Route::get('/wishlist', 'SiteController@wishlist');
    Route::get('/shop', 'SiteController@shop');
    Route::post('/shop/product', 'SiteController@shopProduct');
    Route::post('/addvalue', 'SiteController@addvalue');
    Route::post('/shop/shopProducts', 'SiteController@shopProducts');
    
});