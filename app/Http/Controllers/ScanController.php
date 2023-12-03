<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ScanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.scan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $activities = new Activity();
        $activities->nama_dosen = $request->nama_dosen;
        $activities->nama_handbag = $request->nama_handbag;


        // Simpan objek Mahal ke dalam database
        $activities->save();
        Alert::success('Berhasil Menambahkan', 'Data Peminjaman Handbag Berhasil Terinput.');

        // Redirect ke halaman yang sesuai setelah penyimpanan data
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
