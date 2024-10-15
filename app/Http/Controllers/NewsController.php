<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\image_url;
use App\Models\news;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function listNews()
    {
        $news = news::with(['category', 'images'])->withTrashed()->paginate(10);
        // dd($news);
        return view('admin.Application.News.ListNews', compact('news'));
    }
    public function addNews(Request $request)
    {
        $category = db::table('category')->get();
        return view('admin.Application.News.AddNews', compact('category'));
    }

    public function postNews(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required',
            'img_new.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $news = News::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category_id' => $validated['category_id'],
            'views' => 300,
        ]);

        if ($request->hasFile('img_new')) {
            foreach ($request->file(key: 'img_new') as $image) {
                $path = Storage::put('imagessss', $image);
                Image_url::create([
                    'news_id' => $news->id,
                    'img_url' => $path,
                    'image_type' => 'main',
                ]);
            }
        }
        return redirect()->route('admin.news.ListNews')->with('success', 'Post created successfully');
    }

    public function detailNews($id)
    {

        $detail = news::with(relations: ['category', 'images'])->findOrFail($id);
        $categories = db::table('category')->get();
        return view('admin.Application.News.UpdateNews', compact(['detail', 'categories']));
    }
    public function editNews(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'category_id' => 'required',
        'img_new.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $news = News::findOrFail($id);
    $news->update([
        'title' => $validated['title'],
        'content' => $validated['content'],
        'category_id' => $validated['category_id'],
    ]);
    if ($request->hasFile('img_new')) {
        $oldImages = Image_url::where('news_id', $news->id)->get();

        foreach ($oldImages as $oldImage) {

            if (Storage::exists($oldImage->img_url)) {
                Storage::delete($oldImage->img_url);
            }
            $oldImage->delete();
        }

        foreach ($request->file('img_new') as $image) {
            $path = Storage::put('imagessss', $image); 
            Image_url::create([
                'news_id' => $news->id,
                'img_url' => $path,
                'image_type' => 'main',
            ]);
        }
    }

    return redirect()->route('admin.news.ListNews')->with('success', 'Cập nhật bài viết thành công');
}

    public function delNews($id)
    {
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
