<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    //
    public function home()
    {
        $id['id'] = mt_rand(1111, 8999);

        $query = DB::table('users')->where('id', $id)->first();

        while ($query != null) {
            $id['id'] = mt_rand(1111, 8999);
            $query = DB::table('users')->where('id', $id)->first();
        }
        // dd($query);

        return view('admin.home', $id);
    }

    public function createUser(Request $req)
    {
        // dd($req);
        $name = $req->fName . " " . $req->lName;

        $query = DB::select(DB::raw("INSERT INTO `users`(`id`, `fname`,`lname`, `password`, `type`) VALUES
                                    ('$req->id','$req->fname','$req->lname', '$req->password','$req->type')"));

        return redirect()->back()->withErrors(['successfull' => 'Account has been successfully created!']);
    }
}
