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
    public function __construct()
    {
        $this->middleware('auth');
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }
    
    public function index()
    {
        $matches = Team::orderby('id', 'desc')->paginate(20);
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
        try {
            $request->validate([
                'kategori'  => 'required',
                'kegiatan'  => 'required',
                'hari'      => 'required',
                'tanggal'   => 'required',
                'tempat'    => 'required',
                'file_team' => 'required',
            ]);
            if ($request->hasFile('file_team')) {
                $file          = $request->file('file_team');
                $fileExtension = $file->getClientOriginalExtension();
                $judul         = $request->kategori;
                $team          = 'Team';
                $date          = $request->tanggal;
                $newName       = $team . '-' . $judul . '-' .$date . '.' . $fileExtension;

                Storage::disk('dropbox')->putFileAs('Team-Match/', $file, $newName);
                $this->dropbox->createSharedLinkWithSettings('Team-Match/' . $newName);
                
                Team::create([
                    'kategori'  => $request->kategori,
                    'kegiatan'  => $request->kegiatan,
                    'hari'      => $request->hari,
                    'tanggal'   => $request->tanggal,
                    'tempat'    => $request->tempat,
                    'file_team' => $newName,
                ]);
                return redirect('team-match')->with('status', 'Data berhasil ditambahkan');
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
        $team = Team::find($id);
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
    public function lihat_file($fileTitle)
    {
        try {
            $link = $this->dropbox->listSharedLinks('Team-Match/' . $fileTitle);
            $raw  = explode("?", $link[0]['url']);
            $path = $raw[0] . '?raw=1';
            $tempPath = tempnam(sys_get_temp_dir(), $path);
            $copy     = copy($path, $tempPath);

            return response()->file($tempPath);
        } catch (Exception $e) {
            return abort(404);
        }
    }

    public function download($fileTitle)
    {
        try {
            return Storage::disk('dropbox')->download('Team-Match/' . $fileTitle);
        } catch (Exception $e) {
            return abort(404);
        }
    }

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
        try {
            if ($request->hasFile('file_team')) {
                $file = $request->file('file_team');
                $fileExtension = $file->getClientOriginalExtension();
                $judul         = $request->kategori;
                $team          = 'Team';
                $date          = $request->tanggal;
                $newName       = $team . '-' . $judul . '-' .$date . '.' . $fileExtension;

                Storage::disk('dropbox')->putFileAs('Team-Match/', $file, $newName);
                $this->dropbox->createSharedLinkWithSettings('Team-Match/' . $newName);
                
                Team::find($id)->update([
                    'kategori'  => $request->kategori,
                    'kegiatan'  => $request->kegiatan,
                    'hari'      => $request->hari,
                    'tanggal'   => $request->tanggal,
                    'tempat'    => $request->tempat,
                    'file_team' => $newName,
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
            $file = Team::find($id);
            Storage::disk('dropbox')->delete('Team-Match/' . $file->file_team);
            $file->delete();

            return redirect()->back()->with('destroy', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return abort(404);
        }
    }

    public function hapus_file($id)
    {
        try {
            $file = Team::find($id);
            Storage::disk('dropbox')->delete('Team-Match/' . $file->file_team);
            Team::find($id)->update([
                    'file_team' => null,
                ]);
            return redirect()->back()->with('destroy', 'File berhasil dihapus');
        } catch (Exception $e) {
            return abort(404);
        }
    }
}
