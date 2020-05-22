<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\Confirm;

use Cart;

class ConfirmMailController extends Controller
{
    //
    public function confirmMail($name, $items, $total, $to)
    {   
        $admin = '9mm.p.bull@gmail.com';
        Mail::to($to)
            ->cc($admin)
            ->send(new Confirm($name, $total, $items));
    }
}
