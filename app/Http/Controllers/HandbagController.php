<?php

namespace App\Http\Controllers;

use App\Models\Handbag;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HandbagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $handbags = Handbag::all();
        return view('admin.handbag', compact('handbags'));
    }

    public function getData(Request $request)
    {

        $handbags = Handbag::all();

        if ($request->ajax()) {
            return datatables()->of($handbags)
                ->addIndexColumn()
                ->addColumn('actions', function ($handbags) {
                    return view('admin.action.actionhandbag', compact('handbags'));
                })
                ->toJson();
        }
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
        $handbags = new Handbag();
        $handbags->nama_handbag = $request->nama_handbag;
        $handbags->qr_handbag = $request->nama_handbag;


        // Simpan objek Mahal ke dalam database
        $handbags->save();
        Alert::success('Berhasil Menambahkan', 'Data Anak Berhasil Terinput.');

        // Redirect ke halaman yang sesuai setelah penyimpanan data
        return redirect()->route('handbags.index');
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
        $handbags = Handbag::find($id);
        return view('admin.action.edithandbag', compact('handbags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Mengambil data dosen berdasarkan ID
        $handbags = Handbag::findOrFail($id);

        // Memperbarui nilai nama_dosen dan qr_dosen berdasarkan request
        $handbags->nama_handbag = $request->nama_handbag;
        $handbags->qr_handbag = $request->nama_handbag; // Sesuaikan dengan kebutuhan Anda

        // Menyimpan perubahan ke dalam database
        $handbags->save();

        // Menampilkan pesan sukses menggunakan package Alert
        Alert::success('Berhasil Memperbarui', 'Data Handbag Berhasil Diperbarui.');

        // Redirect ke halaman yang sesuai setelah perubahan data
        return redirect()->route('handb$handbags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
