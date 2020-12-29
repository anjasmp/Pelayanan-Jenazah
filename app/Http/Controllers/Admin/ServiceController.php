<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Service::with([
            'transactions','user_families.user_detail'
        ])->orderBy('id', 'DESC')->get();

        // return $items;
        return view ('admin.pengaduan-musibah.index', compact('items'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Service::with([
            'transactions','user_families'
            ])->findOrFail($id);
        
        
        return view('admin.pengaduan-musibah.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Service::findOrFail($id);

        return view ('admin.pengaduan-musibah.edit', [
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
    public function update(Request $request, $id)
    {
        $data = $request->all();
        // $data['slug'] = Str::slug($request->title);

        $item = Service::findOrFail($id);

        $item->update($data);
        // $data = $request->all();
        // $transaction_products->transaction_status = $data['transaction_status'];
        // $transaction_products->save();

        // $transaction->update($data);
        return redirect()->route('service.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Service::findOrFail($id);

        $item->delete();
        return redirect()->route('service.index')->with('success','Data berhasil dihapus (Cek Recyle Bin');
    }

    public function show_deletes(){
        $item = Service::onlyTrashed()->get();
        return view('admin.pengaduan-musibah.delete', compact('item'));
    }

    public function restore($id){
        $item = Service::withTrashed()->where('id', $id)->first();

        $item->restore();

        return redirect()->back()->with('success', 'Data berhasil diRestore (Cek List item)');
    }

    public function kill($id){
        $item = Service::withTrashed()->where('id', $id)->first();
        $item->forceDelete();

        return redirect()->back()->with('success', 'Data berhasil dihapus permanen');
    }
}
