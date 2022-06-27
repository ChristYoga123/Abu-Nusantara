<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::payment(request(['cari']))->paginate(10);

        return view('payments.index', compact('payments'));
    }
}
