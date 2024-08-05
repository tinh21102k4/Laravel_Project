<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listCategory(){
        $category = category::orderBy('created_at','desc')->paginate(10);
        return view('admin.Application.danhmuc.ListCategory', compact('category'));
    }
    public function addCategory(Request $request){
        $request->validate([
            'nameCate' => 'required|string|max:255',
        ]);

        $category = new Category();
        $category->name = $request->nameCate;
        $category->save();
        return redirect()->route('admin.category.ListCategory')->with('success', 'Danh mục đã được thêm thành công');
    }
    
    public function detailCategory($id){
        $category = category::find($id);

    if ($category) {
        return response()->json($category);
    } else {
        return response()->json(['error' => 'Danh mục không tồn tại.'], 404);
    }
    }
    public function editCategory(Request $request , $id){
        $request->validate([
            'editNameCate' => 'required|string|max:255',
        ]);
    
        $category = category::find($id);
    
        if (!$category) {
            return response()->json(['error' => 'Danh mục không tồn tại.'], 404);
        }
        $category->name = $request->editNameCate;
        $category->save();
        return response()->json(['success' => 'Danh mục đã được cập nhật thành công.']);
    }
    public function delCategory($id){
        $category = category::findOrFail($id);
        $category->delete();
        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }
        return redirect()->back()->with('delete', 'Danh mục đã được xóa thành công.');
    }
}
