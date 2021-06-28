<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
    	$atlets = Atlet::orderBy('id', 'desc')->paginate(6);
        return view('article.index', compact('atlets'));
    }
    public function show($slug)
    {
    	$atlet = Atlet::where('slug', $slug)->first();
    	if($atlet == null)
    		abort(404);
        return view('article.single', compact('atlet'));
    }
    public function create()
    {
        return view('article.create');
    }
    public function store(Request $request)
    {
    	$request->validate([
    		'nama' => 'required|min:4',
    		'email' => 'required',
    	]);
		Atlet::create([
			'nama' => $request->nama,
			'slug' => Str::slug($request->nama, '-'),
			'email' => $request->email,
		]);    	
    	return redirect('/artikel');
    }
    public function edit($id)
    {
    	$data_atlet = Atlet::find($id);
    	return view('article.edit', compact('data_atlet'));
    }
    public function update(Request $request, $id)
    {
    	Atlet::find($id)->update([
    		'nama' => $request->nama,
			'email' => $request->email
    	]);
    	return redirect('/artikel');
    }
    public function destroy($id)
    {
    	Atlet::find($id)->delete();
    	return redirect('/artikel');
    }
}