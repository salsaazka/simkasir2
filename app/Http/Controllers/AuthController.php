<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signIn()
    {
         return view('auth.sign-in');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required'
        ]);

        $user = $request->only('username', 'password');
        if (Auth::attempt($user)) {
            return redirect('/dashboard');
        } else {
            return redirect('/')->with('fail', 'Gagal login, silahkan periksa dan coba lagi!');
        }
    }

    public function signUp()
    {
        return view('auth.sign-up');
    }

    public function register(Request $request)
    {
        $request->validate = ([
            'name' => 'required|min:3|max:50',
            'username' => 'required|min:3|max:50',
            'email' => 'required',
            'password' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/')->with('success', 'Selamat anda berhasil registrasi');
    }

    public function user()
    {
        $dataUser = User::all();
        return view('pages.user.index', compact('dataUser'));
    }
    public function viewUser()
    {
        return view('pages.user.create');
    }
    public function createUser(Request $request)
    {
        $request->validate = ([
            'name' => 'required|min:3|max:50',
            'username' => 'required|min:3|max:50',
            'email' => 'required',
            'password' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('user.index')->with('success', 'Selamat anda berhasil ');
    }

    public function editUser($id)
    {
        $dataUser = User::where('id', $id)->first();
        return view('pages.user.edit', compact('dataUser'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate = ([
            'name' => 'required|min:3|max:50',
            'username' => 'required|min:3|max:50',
            'email' => 'required',
            'password' => 'required',
        ]);
        User::where('id', $id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('user.index')->with('success', 'Selamat anda berhasil ');
    }

    public function destroyUser($id)
    {
        $dataUser = User::where('id', $id)->delete();
        return redirect()->route('user.index')->with('success', 'Selamat anda berhasil ');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
