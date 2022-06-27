<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin_and_superadmin');
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin_and_superadmin');
        $validator = $request->validate([
            'payment_name' => 'required',
            'payment_number' => 'numeric',
            'payment_owner' => 'string',
            'user_id' => 'required',
        ]);

        $payment = Payment::create($validator);

        return redirect()->route('payments.index')->with('success', 'Pembayaran telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment, $id)
    {
        $this->authorize('admin_and_superadmin');
        $payment = Payment::findOrFail($id);
        return view('payments.show', [
            'payment' => $payment,
            'user' => User::findOrFail($payment->user_id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment, $id)
    {
        $this->authorize('admin_and_superadmin');
        $payment = Payment::findOrFail($id);
        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment, $id)
    {
        $this->authorize('admin_and_superadmin');
        $payment = Payment::findOrFail($id);
        $validator = $request->validate([
            'payment_name' => 'required',
            'payment_number' => 'numeric',
            'payment_owner' => 'string',
            'user_id' => 'required',
        ]);

        $payment->update($validator);

        return redirect()->route('payments.index')->with('success', 'Pembayaran telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment, $id)
    {
        $this->authorize('admin_and_superadmin');
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Pembayaran telah dihapus');
    }
}
