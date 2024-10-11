<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Models\Ekstrakurikuler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    private function validasiInputData(Request $request, $passwordRule)
    {
        $request->validate(
            [
                'name' => 'required|alpha',
                'email' => 'required|email',
                'password' => $passwordRule,
            ],
            [
                'name.alpha' => 'Nama tidak boleh mengandung angka atau simbol',
                'name.required' => 'Nama wajib diisi',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Email harus berupa email',
                'password.required' => 'Password wajib diisi',
            ],
        );
    }

    public function index()
    {
        $page = 'Users';
        $users = User::get();
        return view('admin.pages.User.index', compact('page', 'users'));
    }

    public function store(Request $request)
    {
        $this->validasiInputData($request, 'required');

        user::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'Admin',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.show')->with('success', 'Data user berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $this->validasiInputData($request, 'sometimes');

        $update = User::find($id);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'Admin',
        ];
        // dd($data);
        if ($request->password == null) {
            User::updateOrCreate(['id' => $update->id], $data);
        } else {
            $data['password'] = Hash::make($request->password);
            User::updateOrCreate(['id' => $update->id], $data);
        }
        return redirect()->route('users.show')->with('success', 'Data user berhasil diubah.');
    }

    public function destroy($id)
    {
        $destroy = User::find($id);
        $destroy->delete();
        return redirect()->route('users.show')->with('success', 'Data user berhasil dihapus.');
    }

    public function download()
    {
        $today = date('d-m-Y');
        return Excel::download(new UserExport(), 'User - ' . $today . '.xlsx');
    }
}
