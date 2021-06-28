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
        $atlets = DB::table('atlets')->get();
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
            'tanggal' => 'required',
        ]);
        Absence::create([
            'tanggal' => $request->tanggal,
        ]);
        return redirect('/absensi')->with('status', 'Data berhasil ditambahkan, silahkan edit terlebih dahulu');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $absence = Absence::where('slug', $slug)->first();
        if($absence == null)
            abort(404);
        return view('absence.single', compact('absence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($tanggal)
    {
        $attendances = DB::table('attendances')->where('tanggal', $tanggal)->get();
        $atlets = DB::table('atlets')->get();
        $data_absence = DB::table('absences')->where('tanggal', $tanggal)->first();
        return view('absence.edit', compact('data_absence', 'atlets', 'attendances'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tanggal)
    {
        // $request->validate([
        //     'kegiatan' => 'required',
        //     'hari' => 'required',
        //     'tempat' => 'required',
        // ]);
        // Absence::find($tanggal)->update([
        //     'kegiatan' => $request->kegiatan,
        //     'hari' => $request->hari,
        //     'tempat' => $request->tempat,
        // ]);
        dd($tanggal);
        return redirect()->back()->with('updated', 'Data berhasil diubah');
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
}
