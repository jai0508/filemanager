<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function index(){
       return view("chat");
    }
    public function message(){
        return Message::with('user')->get();
     }

    public function messageStore(Request $request){
      $user = Auth::user();
      $messages=$user->messages()->create([
        'message'=> $request->message,
      ]);
      broadcast(new SendMessage( $user , $messages))->toOthers();
        return 'Message Sent';
     }

}
