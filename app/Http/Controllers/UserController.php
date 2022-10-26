<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function paparSenaraiUsers() {

        $pageTitle = 'Senarai Users';

        // $senarai_users =
        $senaraiUsers = [
            ['id' => 1, 'name' => 'Ali', 'email' => 'ali@gmail.com', 'status' => 'active'],
            ['id' => 2, 'name' => 'Abu', 'email' => 'abu@gmail.com', 'status' => 'inactive'],
            ['id' => 3, 'name' => 'Siti', 'email' => 'siti@gmail.com', 'status' => 'pending'],
            ['id' => 4, 'name' => 'Lee', 'email' => 'lee@gmail.com', 'status' => 'active'],
            ['id' => 5, 'name' => 'Muthu', 'email' => 'muthu@gmail.com', 'status' => 'banned'],
        ];

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
        $request->validate([
            'name' => ['required', 'min:5'],
            'phone' => ['required', 'digits_between:9,11']
        ]);

        return $request->all();
    }

    public function paparRekodUser($id)
    {

    }

    public function paparBorangEdit($id)
    {
        return view('folder-users.template-user-edit', compact('id'));
    }

    public function terimaDataBorangEdit($id)
    {

    }

    public function deleteUser($id)
    {

    }
}
