<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use View;
use App\Message;
class messageController extends Controller
{
    public function sendMessage(Request $request){
      $currdate = date("Y-m-d H:i:s");
      $varname = $request->input('fname');
      $varsurname = $request->input('lname');
      $mail = $request->input('email');
      $subject = $request->input('subject');
      $message = $request->input('message');


      DB::table('messages')->insert([
        ['created_at' => $currdate, 'first_name' => $varname, 'last_name' => $varsurname, 'mail' => $mail, 'subject' => $subject, 'text' => $message]
      ]);

      return 1;
    }
}
