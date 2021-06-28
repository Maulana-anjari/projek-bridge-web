<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Atlet;
use App\Models\Attendance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absences = Absence::all()->sortDesc();
        return view('absence.index', compact('absences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $atlets = Absence::all();
        return view('absence.create', compact('atlets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kegiatan' => 'required',
            'hari' => 'required',
            'tanggal' => 'required',
            'tempat' => 'required',
        ]);
        Absence::create([
            'kegiatan' => $request->kegiatan,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'catatan' => $request->catatan,
            'absensi' => $request->absensi,
            'slug' => Str::slug($request->tanggal, '-'),
        ]);     
        return redirect('/absensi')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atlets = Atlet::all();
        $absence = Absence::where('id', $id)->first();
        if($absence == null)
            abort(404);
        return view('absence.single', compact('absence', 'atlets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atlets = Atlet::all();
        $data_absence = Absence::find($id);
        return view('absence.edit', compact('data_absence', 'atlets'));
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
        Absence::find($id)->update([
            'kegiatan' => $request->kegiatan,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'absensi' => $request->absensi,
            'slug' => Str::slug($request->tanggal, '-'),
        ]);
        return redirect('/absensi')->with('updated', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Absence::find($id)->delete();
        return redirect('/absensi')->with('destroy', 'Data berhasil dihapus');
    }
    public function delete_absen_atlet($id)
    {
        Attendance::find($id)->delete();
        return redirect()->back()->with('updated', 'Data berhasil dihapus');
    }
    public function absen_atlet(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'nama_atlet' => 'required',
            'kehadiran' => 'required',
        ]);
        Attendance::create([
            'tanggal' => $request->tanggal,
            'nama_atlet' => $request->nama_atlet,
            'kehadiran' => $request->kehadiran,
        ]);     
        return redirect()->back()->with('status', 'Data berhasil ditambahkan');
    }
}
