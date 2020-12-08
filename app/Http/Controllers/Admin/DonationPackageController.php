<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DonationPackageRequest;
use App\DonationPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DonationPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DonationPackage::orderBy('id', 'DESC')->get();

        return view ('admin.donation-package.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.donation-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonationPackageRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        DonationPackage::create($data);
        return redirect()->route('donation-package.index')->with('success','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = DonationPackage::findOrFail($id);

        return view ('admin.donation-package.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DonationPackageRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item =DonationPackage::findOrFail($id);

        $item->update($data);
        return redirect()->route('donation-package.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =DonationPackage::findOrFail($id);

        $item->delete();
        return redirect()->route('donation-package.index')->with('success','Data berhasil dihapus (Cek Recyle Bin');
    }

    public function show_deletes(){
        $item = DonationPackage::onlyTrashed()->get();
        return view('admin.donation-package.delete', compact('item'));
    }

    public function restore($id){
        $item = DonationPackage::withTrashed()->where('id', $id)->first();

        $item->restore();

        return redirect()->back()->with('success', 'Data berhasil diRestore (Cek List item)');
    }

    public function kill($id){
        $item = DonationPackage::withTrashed()->where('id', $id)->first();
        $item->forceDelete();

        return redirect()->back()->with('success', 'Data berhasil dihapus permanen');
    }
}