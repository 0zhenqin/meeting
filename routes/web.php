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

Route::get('/', function () {
    $con = mysqli_connect("gethired_mysql","dev","1234",'meeting');
    $result = $con->query("select * from a");
    var_dump($result->fetch_assoc());
    echo "<PRE>";
    print_r(Config::get('database'));
    echo "<PRE>";
    return view('welcome');
});
