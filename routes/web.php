<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Route::group(['prefix'  => '/admin'],function(){
    Auth::routes();
    Route::get('/dashboard','DashboardController@dashboard')->name('admin.dashboard');
});

Route::group(['prefix'  => '/admin/data_gempa'],function(){

    Route::get('/','DataGempaController@index')->name('admin.data_gempa');
    Route::get('/2010','DataGempaController@tahun2010')->name('admin.data_gempa.2010');

});

Route::group(['prefix'  => '/admin/proses_clustering'],function(){
    Route::get('/proses_clustering','ProsesClusteringController@prosesClustering')->name('admin.proses_clustering.proses_clustering');
    Route::get('/proses_clusteringgenerate','ProsesClusteringController@generateClustering')->name('admin.proses_clustering.generate_clustering');
});

Route::group(['prefix'  => '/admin/data_clustering'],function(){
    Route::get('/pusat_cluster','DataClusteringController@pusatCluster')->name('admin.data_clustering.pusat_cluster');
    Route::get('/data_iterasi','DataClusteringController@dataIterasi')->name('admin.data_clustering.data_iterasi');
    Route::get('/nilai_cost','DataClusteringController@nilaiCost')->name('admin.data_clustering.nilai_cost');
});

Route::group(['prefix'  => '/admin/tampilan_data'],function(){
    Route::get('/table','TampilanDataController@table')->name('admin.tampilan_data.table');
    Route::get('/grafik','TampilanDataController@grafik')->name('admin.tampilan_data.grafik');
    Route::get('/peta','TampilanDataController@peta')->name('admin.tampilan_data.peta');
});


// Route::get('/home', 'HomeController@index')->name('home');
