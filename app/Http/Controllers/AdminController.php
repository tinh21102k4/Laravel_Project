<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.Analytics');
    }
    public function userManager()
    {
        $total = User::where('role', 1)->count();
        $user = User::orderBy('created_at','desc')->paginate(10);
        $total2 = $user->total() - $total;
        return view('admin.dashboard.User.ListUser', compact('user', 'total','total2'));
    }
    public function searchUser(Request $req){
        
        $name = $req->searchUser;
        $user = User::where('name', 'like',"%{$name}%")
        ->orWhere('email','like',"%{$name}%")
        ->orderBy('created_at','desc')
        ->paginate(10);
        $total = $user->where('role', 1)->count();
        $total2 = $user->total() - $total;
        return view('admin.dashboard.User.SearchUser' , compact('user','total','total2'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }
        return redirect()->back()->with('success', 'Người dùng đã được xóa thành công.');
    }
    public function addUser(Request $req)
    {
        // $req->validate([
        //     'username' => ['required', 'min:5', 'max:22'],
        //     'imgUser' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        //     'email' => ['required', 'email', 'max:255'],
        //     'password' => ['required', 'min:8', 'max:100'],
        //     'role' => ['required','in:1,2']
        // ], [
        //     'username.required' => 'Vui lòng nhập Họ và Tên',
        //     'username.min' => 'Vui lòng nhập Họ và Tên trên 5 kí tự',
        //     'username.max' => 'Vui lòng nhập Họ và Tên dưới 22 kí tự',
        //     'email.required' => 'Vui lòng nhập Email',
        //     'email.max' => 'Tài khoản Email quá dài không hợp lệ ',
        //     'password.required' => 'Vui lòng nhập mật khẩu',
        //     'password.min' => 'Vui lòng nhập mật khẩu dài hơn 8 kí tự ',
        //     'password.max' => 'Mật khẩu quá dài ...',
        //     'imgUser'=> 'ĐỊnh dạng ảnh không phù hợp'
        // ]);
        // $check = User::where('email', $req->email)->exists();
        // if (!$check) {
        //     $newUser = new User();
        //     $newUser->name = $req->username;
        //     $newUser->email = $req->email;
        //     $newUser->password = Hash::make($req->password);
        //     $newUser->remember_token = str::random(60);
        //     $newUser->role = $req->role == 1 ? 'admin' : 'customer';
        //     if ($req->hasFile('imgUser')) {
        //         $imageName = time().'.'.$req->imgUser->extension();
        //         $req->imgUser->move(public_path('storage'), $imageName);
        //         $newUser->img_user = $imageName;
        //     }
        //     dd($newUser);
        //     // $newUser->save();
        // } else {
        //     return redirect()->back()->with([
        //         'message' => 'Email này đã tồn tại '
        //     ]);
        // }
        // return redirect()->back()->with([
        //     'message' => 'Thêm tài khoản thành công ! '
        // ]);
    }
}
