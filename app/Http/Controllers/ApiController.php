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
        $status = 1;
        $message = 'success';
        $data = DB::table('meeting_room')->get();
        return response()->json(['status'=>$status, 'data'=>$data, 'message'=>$message]);
    }
    protected function getRoom($id)
    {
        $status = 1;
        $message = 'success';
        $data = DB::table('meeting_room')->where('id', $id)->first();
        $use_data = null;
        if($data->useing_id && $data->state == 'busy'){
            $use_data = DB::table('room_use_history')
                ->where('id', $data->useing_id)
                ->first();

        }
        $data->use_data = $use_data;
        return response()->json(['status'=>$status, 'data'=>$data, 'message'=>$message]);
    }
    protected function orderRoom($id, Request $request)
    {
        $status = 1;
        $message = 'success';
        $data = null;
        $room = DB::table('meeting_room')->where('id', $id)->first();
        if(!$room){
            $status = 0;
            $message = 'meeting room not found';
        }else if($room->useing_id && $room->state == 'open'){
            $status = 0;
            $message = 'This meeting room is occupied';
        } else{
            $post = $request->post();
            $u_id = DB::table('room_use_history')->insertGetId(
                [
                    'room_id' => $id,
                    'use_name' => $post['use_name'],
                    'use_desc' => $post['use_desc'],
                    'use_time' => $post['use_time']
                ]
            );
            $update = DB::table('meeting_room')
                ->where('id', $id)
                ->update(['useing_id' => $u_id, "state"=>"busy"]);

            if($update){
                $data = DB::table('meeting_room')->where('id', $id)->first();
                $use_data = null;
                if($data->useing_id && $data->state == 'busy'){
                    $use_data = DB::table('room_use_history')
                        ->where('id', $data->useing_id)
                        ->first();

                }
                $data->use_data = $use_data;
            }else{
                $status = 0;
                $message = 'order room error';
            }

        }
        return response()->json(['status'=>$status, 'data'=>$data, 'message'=>$message]);
    }

    protected function unsubscribroom($id)
    {
        $status = 1;
        $message = 'success';
        $data = null;
        $room = DB::table('meeting_room')->where('id', $id)->first();
        if(!$room){
            $status = 0;
            $message = 'meeting room not found';
        }else if(!$room->useing_id || $room->state != 'busy'){
            $status = 0;
            $message = 'meeting room is not occupied';
        }else{
            $update = DB::table('meeting_room')
                ->where('id', $id)
                ->update(['useing_id' => null, "state"=>"open"]);
            if(!$update){
                $status = 0;
                $message = 'unsubscribe room error';
            }
        }
        return response()->json(['status'=>$status, 'data'=>$data, 'message'=>$message]);
    }
}
