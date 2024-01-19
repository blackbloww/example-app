<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('users.index', ['users' => $users]);
    }
    public function store(Request $request)
    {
        $user = new User();
        // php truyền thống
        // $user->name = $_POST['name'];
        // $user->email = $_POST['email'];
        // $user->password = Hash::make($_POST['password']);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('users.index');
    }
    public function update(Request $request)
    {
        // tìm thấy thì chạy bình thường, không thấy thì sẽ báo lỗi 404
        $user = User::findOrFail($request->id);
        // Không tìm thấy trả về null
        // $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('users.index');
    }

    // $user->delete();


}
