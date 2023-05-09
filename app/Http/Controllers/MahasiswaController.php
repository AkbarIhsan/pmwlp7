<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Mahasiswa_Matakuliah;
use Illuminate\Http\Request;
use App\Models\Kelas;
use illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\PDF;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search');
        $mahasiswas = Mahasiswa::where('Nama', 'like', "%$search%")->paginate(5);
        $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(5);
        return view('mahasiswas.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('mahasiswas.create',['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto_mhs = null;

        $request->validate([
        'Nim' => 'required',
        'Nama' => 'required',
        'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'kelas' => 'required',
        'Jurusan' => 'required',
        'NoHp' => 'required',
        'email' => 'required',
        'tanggalLahir' => 'required',
        ]);

        if($request->file('image')){
            $foto_mhs = $request->file('image')->store('images', 'public');
        }

        $mahasiswa = new Mahasiswa;
        $mahasiswa->Nim=$request->get('Nim');
        $mahasiswa->Nama=$request->get('Nama');
        $mahasiswa->foto = $foto_mhs;
        $mahasiswa->Jurusan=$request->get('Jurusan');
        $mahasiswa->NoHp=$request->get('NoHp');
        $mahasiswa->email=$request->get('email');
        $mahasiswa->tanggalLahir=$request->get('tanggalLahir');


        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($Nim)
    {
        //
        $Mahasiswa = Mahasiswa::find($Nim);
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($Nim)
    {
        $Mahasiswa = Mahasiswa::find($Nim);
        $kelas = Kelas::all();
        return view('mahasiswas.edit', compact('Mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Nim)
    {
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kelas' => 'required',
            'Jurusan' => 'required',
            'NoHp' => 'required',
            'email' => 'required',
            'tanggalLahir' => 'required',
        ]);


            $mahasiswa =Mahasiswa::find($Nim);
            $mahasiswa->Nim=$request->get('Nim');
            $mahasiswa->Nama=$request->get('Nama');
            $mahasiswa->Jurusan=$request->get('Jurusan');
            $mahasiswa->NoHp=$request->get('NoHp');
            $mahasiswa->email=$request->get('email');
            $mahasiswa->tanggalLahir=$request->get('tanggalLahir');

            if ($mahasiswa->foto && file_exists(storage_path('app/public/' . $mahasiswa->foto))){
                \Storage::delete('public/' . $mahasiswa->foto);
            }

            $foto_mhs = $request->file('image')->store('images', 'public');

            $mahasiswa->foto = $foto_mhs;


            $kelas = new Kelas;
            $kelas->id = $request->get('kelas');

            $mahasiswa->kelas()->associate($kelas);
            $mahasiswa->save();

            return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($Nim)
    {
        Mahasiswa::find($Nim)->delete();
        return redirect()->route('mahasiswa.index')-> with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function khs($Nim)
    {
        $Mahasiswa = Mahasiswa::find($Nim);
        return view('mahasiswas.khs', compact('Mahasiswa'));
    }

    public function cetak_pdf($Nim){
        $Mahasiswa = Mahasiswa::find($Nim);
        $mahasiswa = Mahasiswa_Matakuliah::where('mahasiswa_id', $Nim)->get();
        $pdf = PDF::loadView('mahasiswas.khs_pdf', compact('Mahasiswa', 'mahasiswa'));
        return $pdf->stream();
    }

};
