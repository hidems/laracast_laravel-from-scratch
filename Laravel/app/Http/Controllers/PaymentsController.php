<?php

namespace App\Http\Controllers;

use App\Notifications\PaymentRecieved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Events\ProductPurchased;

class PaymentsController extends Controller
{
    public function create()
    {
        return view('payments.create');// resources/views/payments/create.blade.php
    }

    public function store()
    {
        // Notification::send(request()->user(), new PaymentRecieved());
        request()->user()->notify(new PaymentRecieved(1000));

        // Event and Listener
        $events = ProductPurchased::dispatch('Xperia');
        // event(new ProductPurchased('iPhone')); // Same as above

        return view('/payments/create', [
            'events' => $events
        ]);
    }
}
