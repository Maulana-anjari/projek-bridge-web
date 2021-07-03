<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection\Links;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Team::paginate(10)->sortDesc();
        return view('team.index', compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');
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
            'kategori' => 'required',
            'kegiatan' => 'required',
            'hari' => 'required',
            'tanggal' => 'required',
            'tempat' => 'required',
            'file_team' => 'required',
        ]);
        Team::create([
            'kategori' => $request->kategori,
            'kegiatan' => $request->kegiatan,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'file_team' => $request->file_team,
        ]);
        return redirect()->back()->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id)->first();
        if($team == null)
            abort(404);
        return view('team.single', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_team = Team::find($id);
        return view('team.edit', compact('data_team'));
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
        Team::find($id)->update([
            'kategori' => $request->kategori,
            'kegiatan' => $request->kegiatan,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'file_team' => $request->file_team,
        ]);
        return redirect()->back()->with('status', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Team::find($id)->delete();
        return redirect()->back()->with('destroy', 'Data berhasil dihapus');
    }
}
