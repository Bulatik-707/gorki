<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bron;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserController extends Controller
{

    public function index()
    {
        //$brons = DB::table('brons')->get();

        $user = '';
        if(Auth::user() != null){
            $user = Auth::user()->fio;
        }
        else return view('auth.login');

        $uid = Auth::user()->id;
        $brons = Bron::where('id_user', $uid)->get();

        return view('user_broni', compact('brons', 'user'));
    }

    public function create(Request $request)
    {
        $user_id = Auth::user()->id;

        $addBron = new Bron();
        $addBron->date_time_szapisi = date('Y-m-d H:i:s');
        $addBron->date_zaezda = $request->input('date_zaezda');
        $addBron->statys_broni = 'Не подтверждена';
        $addBron->id_user = $user_id;

        $addBron->save();

        return redirect()->back();
       // return view('admin.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->fio = $request->input('fio');
        $user->email = $request->input('email');
        $user->password =  $request->input('password');
        $user->role = 'user';
        $user->save();
        Auth::login($user);
        return view('welcome');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        //dd(Auth::user());
        return redirect()->view('welcome');
    }

    public function search(Request $request)
    {
        $s = $request->search_id_broni;
        $sb = $request->search_stat_broni;

        $uid = Auth::user()->id;

        $brons = Bron::where('id', "$s")
        ->orWhere('statys_broni', "$sb")
        ->where('id_user', $uid)->get();

        // ->where('votes', '>', 100)
        //     ->orWhere(function (Builder $query) {
        //         $query->where('name', 'Abigail')
        //               ->where('votes', '>', 50);
        //     })


        $user = Auth::user()->fio;

        return view('user_broni', compact('brons', 'user'));
    }
}
