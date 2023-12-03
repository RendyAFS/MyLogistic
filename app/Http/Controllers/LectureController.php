<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LectureController extends Controller
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
        confirmDelete();
        $lectures = Lecture::all();
        return view('admin.lecture', compact('lectures'));
    }

    public function getData(Request $request)
    {

        $lectures = Lecture::all();

        if ($request->ajax()) {
            return datatables()->of($lectures)
                ->addIndexColumn()
                ->addColumn('actions', function ($lectures) {
                    return view('admin.action.actionlecture', compact('lectures'));
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
        $lectures = new Lecture();
        $lectures->nama_dosen = $request->nama_dosen;
        $lectures->qr_dosen = $request->nama_dosen;


        // Simpan objek Mahal ke dalam database
        $lectures->save();
        Alert::success('Berhasil Menambahkan', 'Data Anak Berhasil Terinput.');

        // Redirect ke halaman yang sesuai setelah penyimpanan data
        return redirect()->route('lectures.index');
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
        $lectures = Lecture::find($id);
        return view('admin.action.editlecture', compact('lectures'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Mengambil data dosen berdasarkan ID
        $lectures = Lecture::findOrFail($id);

        // Memperbarui nilai nama_dosen dan qr_dosen berdasarkan request
        $lectures->nama_dosen = $request->nama_dosen;
        $lectures->qr_dosen = $request->nama_dosen; // Sesuaikan dengan kebutuhan Anda

        // Menyimpan perubahan ke dalam database
        $lectures->save();

        // Menampilkan pesan sukses menggunakan package Alert
        Alert::success('Berhasil Memperbarui', 'Data Dosen Berhasil Diperbarui.');

        // Redirect ke halaman yang sesuai setelah perubahan data
        return redirect()->route('lectures.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ELOQUENT
        $lectures = Lecture::find($id);


        $lectures->delete(); // Hapus data dari database
        Alert::success('Data Berhasil Terhapus');

        return redirect()->route('lectures.index');
    }
}
