<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\image_url;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function listNews(){
        $news = news::with(['category', 'images'])->withTrashed()->paginate(10);
        return view('admin.Application.News.ListNews', compact('news'));
    }
    public function addNews(Request $request){
        $category = category::all();
        return view('admin.Application.News.AddNews' , compact('category'));
    }

    public function postNews(Request $request){
        // dd($request->all());
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'content' => 'required|string',
        //     'category_id' => 'required|exists:categories,id',
        //     'img_new' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        DB::transaction(function () use ($request) {
            $news = News::create([
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category_id,
                'views' => 0,
            ]);

            // Handle image upload and insert into image_url table
            if ($request->hasFile('img_new')) {
                $imagePath = $request->file('img_new')->store('images', 'public');
                image_url::create([
                    'img_url' => $imagePath,
                    'news_id' => $news->id,
                    'image_type' => 'main',
                ]);
            }
        });
        return redirect()->route('admin.news.postNews')->with('success', 'Post created successfully');
    }
    
    public function detailNews($id){

    }
    public function editNews(Request $request , $id){

    }
    public function delNews($id){
        $news = news::findOrFail($id);
        $news->delete();
        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }
        return redirect()->back()->with('delete', 'Bài Viết đã được xóa thành công.');
    }
    public function restore($id)
    {
        $news = news::withTrashed()->findOrFail($id);
        $news->restore();

        return redirect()->route('admin.news.ListNews');
    }
}
