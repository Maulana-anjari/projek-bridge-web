<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Atlet;
use App\Models\Attendance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection\Links;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absences = Absence::paginate(10)->sortDesc();
        return view('absence.index', compact('absences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'kegiatan' => 'required',
            'hari' => 'required',
            'tanggal' => 'required',
            'tempat' => 'required',
        ]);
        Absence::create([
            'kategori' => $request->kategori,
            'kegiatan' => $request->kegiatan,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
        ]);     
        return redirect('/absensi')->with('status', 'Data berhasil ditambahkan, silahkan menambahkan data kehadiran atlet!');
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
        $attendances = Attendance::where('absen_id', $id)->orderBy('nama_atlet', 'asc')->paginate(10);
        if($absence == null)
            abort(404);
        return view('absence.single', compact('absence', 'atlets', 'attendances'));
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
        $attendances = Attendance::where('absen_id', $id)->orderBy('nama_atlet', 'asc')->paginate(10);
        return view('absence.edit', compact('data_absence', 'atlets', 'attendances'));
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
            'kategori' => $request->kategori,
            'kegiatan' => $request->kegiatan,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
        ]);
        return redirect()->back()->with('updated', 'Data berhasil diupdate');
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
        return redirect()->back()->with('destroy', 'Data berhasil dihapus');
    }
    public function absen_atlet(Request $request)
    {
        $request->validate([
            'absen_id' => 'required',
            'nama_atlet' => 'required',
            'kehadiran' => 'required',
        ]);
        $cek_double = Attendance::where(['absen_id' => $request->absen_id, 'nama_atlet' => $request->nama_atlet])
                                    ->count();
        if ($cek_double > 0) {
            return redirect()->back()->with('double', 'Data sudah ada! Silahkan hapus terlebih dahulu jika ingin mengubah.');
        }
        Attendance::create([
            'absen_id' => $request->absen_id,
            'nama_atlet' => $request->nama_atlet,
            'kehadiran' => $request->kehadiran,
            'keterangan' => $request->keterangan,
        ]);     
        return redirect()->back()->with('status', 'Data berhasil ditambahkan');
    }
    public function ekspor()
    {
        return view('absence.ekspor');
    }
    public function ekspor_data(Request $request)
    {
        $data = '';
                // ->where('tanggal', $request->bulan)
                // ->where('tanggal', $request->tahun);
        $name = 'Absensi-'. $request->kategori . '-' . $request->bulan . '-' . $request->tahun . '.pdf';
        $pdf = \PDF::loadView('pdf.print_absence');
        return $pdf->stream('Absensi-'. $request->kategori . '-' . $request->bulan . '-' . $request->tahun . '.pdf');
    }
}
