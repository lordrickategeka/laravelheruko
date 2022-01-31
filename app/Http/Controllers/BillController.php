<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\BillingNotification;
// use Illuminate\Notifications\Notification;
// use Notification;
use Illuminate\Support\Facades\Notification;

class BillController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        return view('welcome');
    }

    public function sendNotification() {

        $data = User::first();

        $billData = [
            'name' => '#007 Bill',
            'body' => 'You have received a new bill.',
            'thanks' => 'Thank you',
            'text' => '$600',
            'offer' => url('/'),
            'bill_id' => 30061
        ];

        Notification::send($data, new BillingNotification($billData));

        dd('Bill notification has been sent!');
    }
}