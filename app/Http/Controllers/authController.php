<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class authController extends Controller
{
    //
    public function login(Request $req)
    {
        // dd($req->id);
        $query = DB::table('users')->where('id', $req->id)
            ->where('password', $req->password)->first();

        if ($query === null) {
            return redirect()->back()->withErrors(['error' => 'Account ID or password is not valid!']);
        } else {
            if ($query->type === 'h') {
                return redirect('higher_authority');
            } else if ($query->type === 'a') {
                return redirect('admin');
            } else {
                return redirect('department');
            }
        }
    }

    public function logout()
    {
        return view('login');
        // return view('admin.home');
    }
}
