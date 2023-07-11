<?php

Auth::routes();

//Route::get('/test', 'TestController@index')->name('test');
Route::get('/privacy-policy', 'HomeController@privacy_policy')->name('privacy_policy');
Route::get('/terms-of-use', 'HomeController@terms_of_use')->name('terms_of_use');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@dashboard')->name('home');
    Route::get('/home', 'HomeController@dashboard')->name('home');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');


    /*************** Support Team *****************/
    Route::group(['namespace' => 'SupportTeam',], function(){

        /*************** Students *****************/
        Route::group(['prefix' => 'students'], function(){
            Route::get('reset_pass/{st_id}', 'StudentRecordController@reset_pass')->name('st.reset_pass');
            Route::get('graduated', 'StudentRecordController@graduated')->name('students.graduated');
            Route::put('not_graduated/{id}', 'StudentRecordController@not_graduated')->name('st.not_graduated');
            Route::get('list/{class_id}', 'StudentRecordController@listByClass')->name('students.list')->middleware('teamSAT');

            /* Promotions */
            Route::post('promote_selector', 'PromotionController@selector')->name('students.promote_selector');
            Route::get('promotion/manage', 'PromotionController@manage')->name('students.promotion_manage');
            Route::delete('promotion/reset/{pid}', 'PromotionController@reset')->name('students.promotion_reset');
            Route::delete('promotion/reset_all', 'PromotionController@reset_all')->name('students.promotion_reset_all');
            Route::get('promotion/{fc?}/{fs?}/{tc?}/{ts?}', 'PromotionController@promotion')->name('students.promotion');
            Route::post('promote/{fc}/{fs}/{tc}/{ts}', 'PromotionController@promote')->name('students.promote');

        });

        /*************** Users *****************/


        /*************** TimeTables *****************/

        Route::resource('students', 'StudentRecordController');

    });

    /************************ AJAX ****************************/
    Route::group(['prefix' => 'ajax'], function() {
        Route::get('get_lga/{state_id}', 'AjaxController@get_lga')->name('get_lga');
        Route::get('get_class_sections/{class_id}', 'AjaxController@get_class_sections')->name('get_class_sections');
        Route::get('get_class_subjects/{class_id}', 'AjaxController@get_class_subjects')->name('get_class_subjects');
    });

});

