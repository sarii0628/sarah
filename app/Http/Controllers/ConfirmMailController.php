<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\Confirm;

use Cart;

class ConfirmMailController extends Controller
{
    //
    public function confirmMail($name, $total, $to)
    {
        Mail::to($to)->send(new Confirm($name, $total));
    }
}
