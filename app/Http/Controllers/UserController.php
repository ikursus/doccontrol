<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function paparSenaraiUsers()
    {
        $pageTitle = 'Senarai Users';

        // $senarai_users =
        $senaraiUsers = DB::table('users')
        ->orderBy('id', 'desc')
        //->where('status', '=', 'active')
        ->paginate(5);

        $inputField = '<script>alert(\'test\')</script>';

        // Return tanpa sebarang data
        // return view('folder-users.template-senarai-users');

        // Cara 1 return dengan data
        // return view('folder-users.template-senarai-users')
        // ->with('senaraiUsers', $senaraiUsers)
        // ->with('pageTitle', $pageTitle);

        // Cara 2 return data
        // return view('folder-users.template-senarai-users', [
        //     'senaraiUsers' => $senaraiUsers,
        //     'pageTitle' => $pageTitle
        // ]);

        // Cara 3 return data
        return view('folder-users.template-senarai-users', compact('senaraiUsers', 'pageTitle', 'inputField'));

    }

    public function paparBorangTambah()
    {
        return view('folder-users.template-user-tambah');
    }

    public function terimaDataBorangTambah(Request $request)
    {
        // Validasi data
        $data = $request->validate([
            'name' => 'required|min:3|string', // cara 1 tulis validation rules
            'email' => ['required', 'email:filter'], // cara 2 tulis validation rules
            'phone' => ['required'],
            'password' => ['required', 'confirmed'],
            'status' => ['required', 'in:active,inactive,pending,banned']
        ]);

        //$data = $request->all();
        // Encrypt password
        $data['password'] = bcrypt($data['password']);

        // Simpan ke DB
        // Apabila menggunakan query builder (DB::table()), kita kena
        // declare data yang dibenarkan masuk ke dalam DB
        // Jika tidak, akan keluar error unknown column bagi data yang tiada column di dalam table
        DB::table('users')->insert($data);
        // DB::table('users')->insert([
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        // ]);

        // Response
        return redirect()->route('users.index')
        ->with('alert-success', 'Rekod berjaya disimpan!');
    }

    public function paparRekodUser($id)
    {
        // $user = DB::table('users')->where('id', '=', $id)->first();
        //$user = DB::table('users')->where('id', $id)->first();
        $user = DB::table('users')->whereId($id)->first();

        return view('folder-users.template-user-show', compact('user'));
    }

    public function paparBorangEdit($id)
    {
        // $user = DB::table('users')->whereId($id)->first();
        $user = DB::table('users')->where('id', '=', $id)->first();

        return view('folder-users.template-user-edit', compact('user'));
    }

    public function terimaDataBorangEdit(Request $request, $id)
    {
        // Validasi data
        $data = $request->validate([
            'name' => 'required|min:3|string', // cara 1 tulis validation rules
            'email' => ['required', 'email:filter'], // cara 2 tulis validation rules
            'phone' => ['required'],
            'status' => ['required', 'in:active,inactive,pending,banned']
        ]);

        // Encrypt password
        if (!is_null($request->input('password')))
        {
            $data['password'] = bcrypt($data['password']);
        }

        // Simpan ke DB
        DB::table('users')->whereId($id)->update($data);

        // Response
        return redirect()->route('users.show', $id)
        ->with('alert-success', 'Rekod berjaya disimpan!');
    }

    public function deleteUser($id)
    {
        DB::table('users')->whereId($id)->delete();

        // Response
        return redirect()->route('users.index')
        ->with('alert-success', 'Rekod berjaya dihapuskan!');
    }
}
