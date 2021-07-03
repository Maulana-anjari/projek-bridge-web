<?php

namespace App\Http\Controllers;

use App\Models\Pair;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection\Links;

class PairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Pair::paginate(10)->sortDesc();
        return view('pair.index', compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pair.create');
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
            'file_pair' => 'required',
        ]);
        Pair::create([
            'kategori' => $request->kategori,
            'kegiatan' => $request->kegiatan,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'file_pair' => $request->file_pair,
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
        $pair = Pair::find($id)->first();
        if($pair == null)
            abort(404);
        return view('pair.single', compact('pair'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_pair = Pair::find($id);
        return view('pair.edit', compact('data_pair'));
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
        Pair::find($id)->update([
            'kategori' => $request->kategori,
            'kegiatan' => $request->kegiatan,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'file_pair' => $request->file_pair,
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
        Pair::find($id)->delete();
        return redirect()->back()->with('destroy', 'Data berhasil dihapus');
    }
}
