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









//Route::group(['middleware'=>['web']],function(){

Route::get('/', function () {
    return view('home');

});

Route::get('/user-signup',function ()
{
    return view('user-signup');
});
Route::get('/owner-signup',function ()
{
    return view('owner-signup');
});


Route::get('/verify/{id}','userController@verifyExtract')->name("verify");
Route::get('/verifyEmailFirst','userController@verifyEmailFirst')->name("verifyEmailFirst");
Route::get('/sendemailDone/{email}/{verifyToken}','userController@sendemailDone')->name("sendemailDone");
Route::get('/home','userController@home')->name("home");
Route::get('/admin-login','AdminController@admin_login')->name("admin-login");

Route::post('/signup','userController@userSignUp')->name("signup");
Route::post('/companysignup','CompanyController@companySignUp')->name("companysignup");

Route::get('/pagenotfound','userController@pagenotfound')->name('notfound');
Route::post('/signin','userController@SignIn')->name("signin");
Route::get('/login',function ()
{
    return view('errors.404');
})->name("login");

Route::group(['middleware'=>['auth']],function(){

    Route::get('/news-feed','PostController@newsfeed')->name("news-feed");
    Route::get('/displaypost/{post_id}','PostController@displayPost')->name("displaypost");
    Route::post('/search','PostController@search')->name("search");
    Route::post('/createpost','PostController@CreatePost')->name("createpost");
    Route::post('/editpost/{post_id}','PostController@EditPost')->name("editpost");

    Route::get('/allposts','PostController@allposts')->name("allposts");

    Route::get('/post.delete/{post_id}','PostController@getPostDelete')->name("post.delete");
    Route::post('/addcomment/{post_id}','OpinionMiningController@Addcomment')->name("addcomment");
    Route::post('/editcomment/{comment_id}','OpinionMiningController@Editcomment')->name("editcomment");
    Route::get('/comment.delete/{comment_id}','OpinionMiningController@getcommentDelete')->name("comment.delete");
    Route::get('/profile','userController@userProfile')->name("profile");
    Route::get('/settings','userController@userSettings')->name("settings");
    Route::post('/changepassword','userController@changePassword')->name("changepassword");
    Route::post('/upload','userController@upload')->name("upload");
    Route::get('/like/{post_id}','PostController@like')->name("like");
    Route::get('/getusersoflike/{post_id}','PostController@getusersoflike')->name("getusersoflike");
    Route::get('/dislike/{post_id}','PostController@dislike')->name("dislike");
    Route::get('/ChangePassword','userController@ChangePass')->name("ChangePassword");
    Route::post('/update-user/{id}','userController@UpdateUser')->name("update-user");
    Route::post('/update-company/{id}','userController@UpdateCompany')->name("update-company");

    Route::get('/user','userController@index')->name("user");
    Route::get('/find','userController@find')->name("find");
    Route::get('/list','userController@lists')->name("list");
    Route::get('/photos','userController@photos')->name("photos");
    Route::get('/allnotifiactions','userController@showallnotifiactions')->name("allnotifiactions");
    Route::get('/setDp/{id}','userController@setDp')->name("setDp");
    Route::get('/Delldp/{id}','userController@Delldp')->name("Delldp");
    Route::get('/logout','userController@logout')->name("logout");
    Route::get('/addfollower/{id}','userController@addfollower')->name("addfollower");

    Route::get('/markAsRead',function(){
        auth()->user()->unreadNotifications->markAsRead();
    });

    //admin-panel routes

    Route::get('importExport', 'ExcelImportController@importExport');
    Route::post('importExcel', 'ExcelImportController@importExcel');
    Route::post('/logicsubmit','AdminController@logicsubmit')->name("logicsubmit");
    Route::get('/RegularUser','AdminController@Regulars')->name("RegularUser");
    Route::get('/Company','AdminController@Companies')->name("Company");


    Route::get('/dashboardd','AdminController@index')->name("dashboardd");
    Route::get('/admit','AdminController@admit')->name("admit");
    Route::get('/admin','AdminController@admin')->name("admin");
    Route::get('/admins','AdminController@admins')->name("admins");

    Route::get('/lock', 'AdminController@lock')->name("lock");
    Route::post('/adminsignup','AdminController@AdminSignUp')->name("adminsignup");
    Route::get('/view/{id}','AdminController@ViewUser')->name("view");
    Route::get('/block/{id}','AdminController@blockUser')->name("block");
    Route::get('/unblock/{id}','AdminController@unblockUser')->name("unblock");
    Route::get('/delete/{id}','AdminController@deleteUser')->name("delete");
    Route::get('/Addkeywords','AdminController@Addkeywords')->name("Addkeywords");
    Route::post('/addword','AdminController@addword')->name("addword");
    Route::get('/editword/{id}','AdminController@editword')->name("editword");
    Route::get('/deleteword/{id}','AdminController@deleteword')->name("deleteword");
    Route::post('/updateword/{id}','AdminController@updateword')->name("updateword");
    Route::get('/adminlogout','AdminController@adminlogout')->name("adminlogout");

//end of admin-panel routes
});





