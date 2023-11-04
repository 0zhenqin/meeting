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
use Microsoft\Graph\Beta\GraphServiceClient;
use Microsoft\Kiota\Abstractions\ApiException;
use Microsoft\Kiota\Authentication\Oauth\ClientCredentialContext;

Route::get('/', function () {



//    $tokenRequestContext = new ClientCredentialContext(
//        'tenantId',
//        'clientId',
//        'clientSecret'
//    );
//    $betaGraphServiceClient = new GraphServiceClient($tokenRequestContext);
//
//    try {
//        $user = $betaGraphServiceClient->users()->byUserId('[userPrincipalName]')->get()->wait();
//        echo "Hello, I am {$user->getGivenName()}";
//
//    } catch (ApiException $ex) {
//        echo $ex->getError()->getMessage();
//    }
//
//
//
//
//
//
//
//    $graphServiceClient = new GraphServiceClient($tokenRequestContext, $scopes);
//
//
//    $result = $graphServiceClient->me()->calendar()->events()->get()->wait();
//    echo "<PRE>";
//    print_r($result);
//    echo "<PRE>";
//    exit;
//
//    $con = mysqli_connect("gethired_mysql","dev","1234",'meeting');
//    $result = $con->query("select * from a");
//    var_dump($result->fetch_assoc());
//    echo "<PRE>";
//    print_r(Config::get('database'));
//    echo "<PRE>";
    return view('welcome');
});
