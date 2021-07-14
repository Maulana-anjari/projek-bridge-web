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
    public function __construct()
    {
        $this->middleware('auth');
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }
    
    public function index()
    {
        $matches = Pair::orderby('id', 'desc')->paginate(20);
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
        try {
            $request->validate([
                'kategori'  => 'required',
                'kegiatan'  => 'required',
                'hari'      => 'required',
                'tanggal'   => 'required',
                'tempat'    => 'required',
                'file_pair' => 'required',
            ]);
            if ($request->hasFile('file_pair')) {
                $file = $request->file('file_pair');
                $fileExtension = $file->getClientOriginalExtension();
                $newName       = uniqid() . '.' . $fileExtension;

                Storage::disk('dropbox')->putFileAs('Pair-Match/', $file, $newName);
                $this->dropbox->createSharedLinkWithSettings('Pair-Match/' . $newName);
                
                Pair::create([
                    'kategori'  => $request->kategori,
                    'kegiatan'  => $request->kegiatan,
                    'hari'      => $request->hari,
                    'tanggal'   => $request->tanggal,
                    'tempat'    => $request->tempat,
                    'file_pair' => $newName,
                ]);
                return redirect('pair-match')->with('status', 'Data berhasil ditambahkan');
            }
        } catch (Exception $e) {
            return "Message : {$e->getMessage()}";
        }
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

    public function lihat_file($fileTitle)
    {
        try {
            $link = $this->dropbox->listSharedLinks('Pair-Match/' . $fileTitle);
            $raw  = explode("?", $link[0]['url']);
            $path = $raw[0] . '?raw=1';
            $tempPath = tepnam(sys_get_temp_dir(), $path);
            $copy     = copy($path, $tempPath);

            return response()->file($tempPath);
        } catch (Exception $e) {
            return abort(404);
        }
    }

    public function download($fileTitle)
    {
        try {
            return Storage::disk('dropbox')->download('Pair-Match/' . $fileTitle);
        } catch (Exception $e) {
            return abort(404);
        }
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
        try {
            if ($request->hasFile('file_pair')) {
                $file = $request->file('file_pair');
                $fileExtension = $file->getClientOriginalExtension();
                $newName       = uniqid() . '.' . $fileExtension;

                Storage::disk('dropbox')->putFileAs('Pair-Match/', $file, $newName);
                $this->dropbox->createSharedLinkWithSettings('Pair-Match/' . $newName);
                
                Pair::find($id)->update([
                    'kategori'  => $request->kategori,
                    'kegiatan'  => $request->kegiatan,
                    'hari'      => $request->hari,
                    'tanggal'   => $request->tanggal,
                    'tempat'    => $request->tempat,
                    'file_pair' => $newName,
                ]);
            return redirect()->back()->with('status', 'Data berhasil diupdate');
            }
        } catch (Exception $e) {
            return "Message : {$e->getMessage()}";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $file = Pair::find($id);
            Storage::disk('dropbox')->delete('Pair-Match/' . $file->file_pair);
            $file->delete();

            return redirect()->back()->with('destroy', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return abort(404);
        }
    }

    public function hapus_file($id)
    {
        try {
            $file = Pair::find($id);
            Storage::disk('dropbox')->delete('Pair-Match/' . $file->file_pair);
            return redirect()->back()->with('destroy', 'File berhasil dihapus');
        } catch (Exception $e) {
            return abort(404);
        }
    }

    public function upload(Request $request)
    {
    
    }
}
