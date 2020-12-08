<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Transaction::with([
            'donation_package', 'userable'
        ])->orderBy('id', 'DESC')->get();


        return view ('admin.transaction.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        Transaction::create($data);
        return redirect()->route('transaction.index')->with('success','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Transaction::with([
            'donation_package', 'userable'
        ])->findOrFail($id);

        return view ('admin.transaction.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::findOrFail($id);

        return view ('admin.transaction.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $data = $request->all();
        $transaction->transaction_status = $data['transaction_status'];
        $transaction->save();
        // $transaction->update($data);
        return redirect()->route('transaction.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =Transaction::findOrFail($id);

        $item->delete();
        return redirect()->route('transaction.index')->with('success','Data berhasil dihapus (Cek Recyle Bin');
    }

    public function show_deletes(){
        $item = Transaction::onlyTrashed()->get();
        return view('admin.transaction.delete', compact('item'));
    }

    public function restore($id){
        $item = Transaction::withTrashed()->where('id', $id)->first();

        $item->restore();

        return redirect()->back()->with('success', 'Data berhasil diRestore (Cek List item)');
    }

    public function kill($id){
        $item = Transaction::withTrashed()->where('id', $id)->first();
        $item->forceDelete();

        return redirect()->back()->with('success', 'Data berhasil dihapus permanen');
    }
}