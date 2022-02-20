<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
Route::get('userlist','HomeController@getUserList');

Route::get('/', function () {


//    $disk = Storage::disk('local_public');
//    $files = $disk->files('img');
//
//    $fileData = collect();
//    foreach($files as $file) {
//        $fileData->push([
//            'file' => $file,
//            'date' => $disk->lastModified($file )
//        ]);
//    }
//    $newest = $fileData->sortByDesc('date')->first();
//
//    $contents =  file_get_contents(public_path($newest['file']));
//
//    \Storage::disk('google')->put('backup-'.\Carbon\Carbon::now(),$contents);
//     dd($contents);

//   $list = \Storage::disk('google')->files();
//   dd($list);
    return view('upload');
    $clearcache = Artisan::call('cache:clear');

    $clearview = Artisan::call('view:clear');

    $clearconfig = Artisan::call('config:cache');

    $clearconfig = Artisan::call('route:clear');


    \Storage::disk('google')->put('test.txt', 'Hello World');

//    return view('upload');
});
Route::post('/upload', function (Request $request) {
    $path = config('app.url').'/kit/public/img/download.png';

    dd($path->store("","google"));
    $path = config('app.url')/'testigng-url';

    \Storage::disk('google')->put('test.txt', 'Hello World');

//    return view('upload');
});
