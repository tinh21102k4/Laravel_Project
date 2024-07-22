<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\news;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $category = category::all();
        return view('client.home.HomeClient', compact(
            'category'
        ));
    }
    public function resultSearch(Request $req)
    {
        $category = category::all();
        $query = $req->search;
        $trimmedString = trim($query);   
        $result =  str_replace(' ', '+', $trimmedString);
        $news = news::where('title', 'like', "%{$query}%")
                            ->orWhere('content', 'like', "%{$query}%")
                            ->get();
        // dd($news);
        if ($news->isEmpty()) {
            return view('client.home.SearchNotFound', compact('query', 'category'));
        }
        return view('client.home.ResultSearch' , compact('query', 'news','category'));
    }
    public function detailNews($id){
        $category = category::all();
        $detailNews = news::find($id);
        // dd($detailNews);
        return view('client.home.PostsDetail', compact('detailNews', 'category'));
    }
}
