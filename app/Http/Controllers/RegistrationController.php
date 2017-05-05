<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

class RegistrationController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'meeting_id' => 'required',
            'user_id' => 'required'
        ]);

        $meeting_id = $request->input('meeting_id');
        $user_id = $request->input('user_id');

        $meeting=[
            'title' => 'Title',
            'description' => 'Description',
            'time' => 'Time',
            'view_meeting'=>[
                'href'=>'api/v1/meeting/1',
                'method'=>'GET'
            ]
        ];

        $user=[
            'name'=>'Name'
        ];

        $response = [
            'msg' =>'User registered for meeting',
            'meeting'=>$meeting,
            'user'=>$user,
            'unregister'=>[
                'href'=>'api/v1/meeting/registration/1',
                'method'=>'DELETE'
            ]
        ];

        return  response()->json($response,201);
       // return "it works!";



    }


    public function destroy($id)
    {
        $meeting=[
            'title' => 'Title',
            'description' => 'Description',
            'time' => 'Time',
            'view_meeting'=>[
                'href'=>'api/v1/meeting/1',
                'method'=>'GET'
            ]
        ];

        $user=[
            'name'=>'Name'
        ];

        $response = [
            'msg' =>'User unregistered for meeting',
            'meeting'=>$meeting,
            'user'=>$user,
            'unregister'=>[
                'href'=>'api/v1/meeting/registration',
                'method'=>'POST',
                'params'=>'user_id, meeting_id'
            ]
        ];

        return  response()->json($response,200);
       // return "It works!";


    }
}
