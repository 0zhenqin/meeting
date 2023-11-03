<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //
    public function __construct()
    {
//        mysqli_connect("gethired_mysql","dev","1234",'meeting');
//        $this->middleware('guest');
    }
    protected function getRoomLists()
    {
        $users = DB::table('meeting_room')->get();
        return $users;
    }
    protected function getRoom($id)
    {
        $users = DB::table('meeting_room')
            ->where("id", $id)
            ->first();
//            ->get();
        return $users;
    }
}
