<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function authLogin(Request $request) // fungsi request $request adalah untuk mengambil inputan dari user
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        // simpan data dari inputan email dan password ke dalam variable untuk memudahkan pemanggilannya
        $user = $request->only(['email', 'password']);
        // attempt : mengecek kecocokan email dan password kemudian menyimpannya ke dalam class
        // auth (memberi identitas data riwayat login ke projectnya)
        if (Auth::attempt($user)){
            //perbedaan redirect() dan redirect()-> route ??
            return redirect('/home');
        } else {
            return redirect()->back()->with('failed', 'login gagal! silahkan coba lagi');
        }

    }
    public function logout()
        {
            // menghapus / menghilangkan data session login
            Auth::logout();
            return redirect()->route('login');
        }

    public function index(Request $request)
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function staff() {
        $staff = User::where('role', 'staff')->get();
        return view('user.staff.index', compact('staff'));
    }

    public function create()
    {
        return view('user.staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            // 'role' => 'required',
        ]);

        $emailPrefix = substr($request->email, 0, 3);
        $namePrefix = substr($request->name, 0, 3);
        $password = $emailPrefix . $namePrefix;

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'role' => 'staff',
        ]);

        return redirect()->route('user.staff.home')->with('success', 'Berhasil menambahkan data pengguna!');
    }

    /**
     * Display the specified resource.7
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('user.staff.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            // 'password' => '',
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,

        ];

        if($request->filled('password')){
            $userData['password'] = bcrypt($request->password);
        }

        User::where('id', $id)->update($userData);

        return redirect()->route('user.staff.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         User::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data!');
    }

}
