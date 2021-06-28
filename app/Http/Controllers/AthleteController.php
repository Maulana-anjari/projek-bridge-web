<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AthleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atlets = Atlet::all();
        return view('athlete.index', compact('atlets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('athlete.create');
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
            'nama' => 'required',
        ]);

        Atlet::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama, '-'),
            'email' => $request->email,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'pedukuhan' => $request->pedukuhan,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kode_pos' => $request->kode_pos,
        ]);     
        return redirect('/atlet')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $atlet = Atlet::where('slug', $slug)->first();
        if($atlet == null)
            abort(404);
        return view('athlete.single', compact('atlet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_atlet = Atlet::find($id);
        return view('athlete.edit', compact('data_atlet'));
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
        Atlet::find($id)->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama, '-'),
            'email' => $request->email,
            'foto' => $request->foto,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'pedukuhan' => $request->pedukuhan,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kode_pos' => $request->kode_pos,
        ]);
        return redirect('/atlet')->with('updated', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Atlet::find($id)->delete();
        return redirect('/atlet')->with('destroy', 'Data berhasil dihapus');
    }
}
