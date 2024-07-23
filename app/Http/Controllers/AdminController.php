<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.Analytics');
    }
    public function userManager()
    {
        $user = User::paginate(10);
        return view('admin.dashboard.UserManager', compact('user'));
    }
    // public function searchUser(Request $req){
    //     $name = $req->name;
    //     $user = User::where('name', 'like',"%{$name}%")->paginate(10);
    //     // dd($name); 
    //     return view('admin.dashboard.SearchResultUser' , compact('user'));
    // }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back()->with('success', 'Người dùng đã được xóa thành công.');
    }
}
