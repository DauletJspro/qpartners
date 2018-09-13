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



/******* Auth *******/
Route::group([
    'middleware' => 'web',
    'namespace' => 'Admin',
], function() {
    Route::any('/', 'AuthController@login');
    Route::any('/login', 'AuthController@login');
    Route::get('/register', 'AuthController@showRegister');
    Route::get('/confirm', 'AuthController@confirmEmail');
    Route::get('/confirm-email', 'AuthController@showSendConfirm');
    Route::post('/send-confirm', 'AuthController@sendHashConfirm');
    Route::get('/reset-password', 'AuthController@showResetPassword');
    Route::post('/reset-password', 'AuthController@resetPassword');
    Route::post('/register', 'AuthController@register');
    Route::get('/logout', 'AuthController@logout');
});

/******* Admin page *******/
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'web'
], function() {
    Route::get('index', 'IndexController@index');

    Route::get('world/{packet_url}', 'WorldController@clientList');
    Route::get('standart', 'WorldController@standart');

    Route::resource('shop', 'ShopController');

    Route::group([
        'prefix' => 'profile'
    ], function() {
        Route::get('/', 'ProfileController@myProfile');
        Route::get('edit', 'ProfileController@edit');
        Route::get('{id}', 'ProfileController@profile');
        Route::post('edit', 'ProfileController@update');
        Route::post('/password/edit', 'ProfileController@editPassword');
        Route::post('/money/edit', 'ProfileController@editMoney');
        Route::post('/activate', 'ProfileController@activateUser');
        Route::post('/profit/edit', 'ProfileController@editProfit');
    });

    Route::group([
        'prefix' => 'packet'
    ], function() {
        Route::get('paybox', 'PacketController@generatePayBoxCode');
        Route::get('paybox/success/{id}', 'PacketController@acceptUserPacketPaybox');
        Route::post('user', 'PacketController@sendResponseAddPacket');
        Route::delete('user', 'PacketController@cancelResponsePacket');
        Route::get('user/active', 'PacketController@activeUserPacket');
        Route::get('user/inactive', 'PacketController@inactiveUserPacket');
        Route::post('user/inactive', 'PacketController@acceptInactiveUserPacket');
        Route::delete('user/inactive', 'PacketController@deleteInactiveUserPacket');
        Route::get('robot/month', 'IndexController@profitRobotAfterMonth');
        Route::get('robot/day', 'IndexController@deleteInactiveUserPacketAfterDay');
        Route::get('{id}', 'PacketController@getPacketById');
    });

    Route::group([
        'prefix' => 'request'
    ], function() {
        Route::post('/', 'UserRequestController@sendResponseAddRequest');
        Route::get('/', 'UserRequestController@inactiveUserRequest');
        Route::get('accept', 'UserRequestController@activeUserRequest');
        Route::get('delete', 'UserRequestController@getDeletedUserRequest');
        Route::get('send', 'UserRequestController@showSendRequest');
        Route::post('inactive', 'UserRequestController@acceptInactiveUserRequest');
        Route::delete('inactive', 'UserRequestController@deleteInactiveUserRequest');
    });

    Route::group([
        'prefix' => 'shareholder'
    ], function() {
        Route::get('/', 'ShareHolderController@index');
        Route::get('user', 'ShareHolderController@showAddUserShare');
        Route::post('user', 'ShareHolderController@addUserShare');
        Route::get('robot', 'ShareHolderController@robot');
        Route::get('robot', 'ShareHolderController@robot');
    });

    Route::group([
        'prefix' => 'speaker'
    ], function() {
        Route::get('/', 'SpeakerController@index');
        Route::get('user', 'SpeakerController@showAddUserSpeaker');
        Route::post('user', 'SpeakerController@addUserSpeaker');
        Route::delete('{id}', 'SpeakerController@deleteUserSpeaker');
    });

    Route::group([
        'prefix' => 'ajax'
    ], function() {
        Route::get('document', 'UserDocumentController@getUserDocumentList');
        Route::post('document', 'UserDocumentController@saveDocumentList');
        Route::post('document/confirm', 'UserDocumentController@confirmUserDocument');
        Route::post('document/confirm-by-admin', 'UserDocumentController@confirmUserDocumentByAdmin');
        Route::post('user/confirm/valid-document', 'UserDocumentController@confirmUserDocument');
        Route::delete('document/confirm', 'UserDocumentController@deleteConfirmUserDocument');
    });

    Route::get('document/confirm', 'UserDocumentController@getConfirmDocumentList');

    Route::group([
        'prefix' => 'office'
    ], function() {
        Route::get('/', 'OfficeController@index');
        Route::get('robot', 'OfficeController@robotClearAfterMonthProfit');
        Route::get('user', 'OfficeController@showAddUserOffice');
        Route::get('user/{id}', 'OfficeController@showAddUserOffice');
        Route::post('user', 'OfficeController@addUserOffice');
        Route::delete('{id}', 'OfficeController@deleteUserOffice');
    });

    Route::group([
        'prefix' => 'binar'
    ], function() {
        Route::get('robot', 'IndexController@robotBinarProfit');
        Route::get('/', 'BinarStructureController@index');
        Route::get('child', 'BinarStructureController@getChildList');
        Route::get('config', 'BinarStructureController@showConfig');
        Route::post('config', 'BinarStructureController@editIsLeftConfig');
    });

    Route::group([
        'prefix' => 'speaker'
    ], function() {
        Route::get('/', 'SpeakerController@index');
        Route::get('user', 'SpeakerController@showAddUserSpeaker');
        Route::post('user', 'SpeakerController@addUserSpeaker');
        Route::delete('{id}', 'SpeakerController@deleteUserSpeaker');
    });
    
    Route::group([
        'prefix' => 'structure'
    ], function() {
        Route::get('/', 'StructureController@index');
        Route::get('child/{user_id}/{level}', 'StructureController@getChildList');
    });

    Route::group([
        'prefix' => 'balance'
    ], function() {
        Route::get('/', 'BalanceController@index');
        Route::post('add', 'BalanceController@addBalance');
    });


    Route::group([
        'prefix' => 'online'
    ], function() {
        Route::get('/', 'OnlineController@index');
        Route::post('{id}', 'OnlineController@addProductToBasket');
        Route::delete('{id}', 'OnlineController@deleteProductFromBasket');
    });

    Route::get('basket', 'OnlineController@showBasket');
    
    Route::get('document', 'UserDocumentController@index');
    Route::get('document/{user_id}', 'UserDocumentController@index');
    Route::get('presentation', 'PresentationController@index');
    Route::get('our-document', 'PresentationController@showDocumentList');

    Route::get('call-friend', 'IndexController@callFriend');
    Route::get('operation', 'OperationController@index');
    Route::get('accounting', 'OperationController@accountingList');

    Route::post('page/is_show', 'PageController@changeIsShow');
    Route::resource('page', 'PageController');

    Route::post('contact/is_show', 'ContactController@changeIsShow');
    Route::resource('contact', 'ContactController');

    Route::post('partner/is_show', 'PartnerController@changeIsShow');
    Route::resource('partner', 'PartnerController');

    Route::post('about/is_show', 'AboutController@changeIsShow');
    Route::resource('about', 'AboutController');

    Route::post('education/is_show', 'EducationController@changeIsShow');
    Route::resource('education', 'EducationController');

    Route::post('slider/is_show', 'SliderController@changeIsShow');
    Route::resource('slider', 'SliderController');

    Route::post('blog/is_show', 'BlogController@changeIsShow');
    Route::resource('blog', 'BlogController');

    Route::post('news/is_show', 'NewsController@changeIsShow');
    Route::resource('news', 'NewsController');

    Route::post('doc/is_show', 'DocController@changeIsShow');
    Route::resource('doc', 'DocController');

    Route::post('project/is_show', 'ProjectController@changeIsShow');
    Route::resource('project', 'ProjectController');

    Route::post('city/is_show', 'CityController@changeIsShow');
    Route::resource('city', 'CityController');

    Route::post('country/is_show', 'CountryController@changeIsShow');
    Route::resource('country', 'CountryController');

    Route::post('order/is_show', 'OrderController@changeIsShow');
    Route::resource('order', 'OrderController');

    Route::post('client/is_show', 'ClientController@changeIsBan');
    Route::resource('client', 'ClientController');

    Route::post('video/is_show', 'VideoController@changeIsBan');
    Route::resource('video', 'VideoController');

    Route::post('user/is_show', 'UserController@changeIsBan');
    Route::resource('user', 'UserController');
    Route::any('password', 'UserController@password');

    Route::resource('packet-item', 'PacketItemController');
    Route::resource('product', 'ProductController');
});

/******* Main page *******/
Route::group([
    'middleware' => 'web'
], function() {
    Route::post('image/upload', 'ImageController@uploadImage');
    Route::post('image/upload/doc', 'ImageController@uploadDocument');
    Route::get('media/{file_name}', 'ImageController@getImage')->where('file_name', '.*');
});

/******* Index *******/
Route::group([
    'middleware' => 'web',
    'namespace' => 'Index',
], function() {
    Route::get('/', 'IndexController@index');
    Route::get('gallery', 'IndexController@gallery');
    Route::get('city', 'IndexController@getCityListByCountry');
    Route::get('video', 'IndexController@video');
    Route::get('contact', 'IndexController@contact');
    Route::post('contact', 'IndexController@sendMessage');
    Route::get('news', 'IndexController@news');
    Route::get('education/{url}', 'IndexController@getEducationById');
    Route::get('project/{url}', 'IndexController@getProjectById');
    Route::get('news/{url}', 'NewsController@getNewsById');
    Route::get('file/{file_name}', 'IndexController@showFile')->where('file_name', '.*');
    Route::get('{about_url}', 'IndexController@getAboutById');
    Route::get('{user_id}/{user_name}', 'IndexController@redirectToRegister');
});