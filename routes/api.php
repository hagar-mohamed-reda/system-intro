<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
 
 
Route::get("/notify_all_user", function(){
    $students = App\User::students()->get();
    
        //$title = "عزيزتى الطالبه دينا محمد على عبدربه نعلمكى بانه تم حل مشكلة الرقم القومى الخاص بكى نتمنى لكى النجاح  😇";
        /*$title = "عزيزى الطالب عمر محمد عبدالسميع ابراهيم عمر انت بالفعل قمت بانشاء حساب برقم هاتف 01212052180 ونعلمكم بان ليس هناك مشكله فى رفع الابحاث نتمنى لكم النجاح 😇😇   😇";
        
        App\Notification::notifyUser($title, $title, "fa fa-check", 8652);*/
        //$title = "صديقى اذا تم حل جميع مشاكلك من فظلك ادخل على جروب الفيس بوك وقم بحذف  تعليقك اذا كان سئ  حتى لا تضلل اصدقائك بالمعهد فضلا وليس امرا 🥰 😘🥰 😘 😊😎 😍  ";
        $title = "😉 😊😎 😍 صديقى انت الان فى مرحله مهمه الا وهى مرحلة رفع الابحاث نأكد عليك انه اخر موعد للتسليم هو 15-06-2020  فلا تقلق ولك الحريه  فى رفع البحث و ازالته و رفعه مره اخى نتمنى لك النجاح الباهر";
    
        $title3 = "عزيزتى الطالبه مريم عبدالمسيح نجيب تاوضروس تم حل المشكله الخاصه بكى نتمنى لكى النجاح و التوفيق 😉 😊😎 😍  ";
    App\Notification::notifyUser($title3, $title3, "fa fa-envelope", 8488);
    /*foreach($students as $item) {
        App\Notification::notifyUser($title2, $title2, "fa fa-check", $item->id);
    } */
    
    echo "done !";
});