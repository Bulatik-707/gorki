<?php

namespace App\Http\Controllers;

use App\Models\Bron;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BronController extends Controller
{

    public function index()
    {
        $brons = DB::table('brons')->paginate(5);
        $user = DB::table('user')->where('role', 'user')->get();
        return view('admin.index', compact('brons', 'user'));
    }

    public function add()
    {
        $user = DB::table('user')->where('role', 'user')->get();
        return view('admin.create', compact('user'));
    }

    public function create(Request $request)
    {
        $addBron = new Bron();
        $addBron->date_time_szapisi = $request->input('date_time_szapisi');
        $addBron->date_zaezda = $request->input('date_zaezda');
        $addBron->statys_broni = $request->input('statys_broni');
        $addBron->id_user = $request->input('id_user');

        $addBron->save();

        return redirect()->back();
       // return view('admin.create');
    }

    public function edit($id)
    {
        $bron = Bron::find($id);
        return view('admin.edit', compact('bron'));
    }

    public function delete($id)
    {
        Bron::find($id)->delete();
        return redirect()->back();
        //return view('admin.index');
    }
    
    public function update(Request $request, $id)
    {
        Bron::whereId($id)->update([
        "date_zaezda" => $request->input('date_zaezda'),
        "statys_broni" => $request->input('statys_broni')
        ]);
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $s = $request->search_id_broni;
        $sb = $request->search_stat_broni;

        $brons = Bron::where('id', "$s")
        ->orWhere('statys_broni', "$sb")
        ->orWhere('id_user', "$request->id_user")->paginate(5);

        $user = DB::table('user')->where('role', 'user')->get();

        return view('admin.index', compact('brons', 'user'));
    }

}
