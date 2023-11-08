<?php

namespace App\Http\Controllers;
use App\Models\News;


use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show(){
        $news=News::All();
        return view('news.news',[
            'news'=>$news
        ]);
    }
    public function index(){
        $news=News::All();
        return view('news.news-list',[
            'news'=>$news,
        ]);
    }
    public function post(){
        $news=News::All();
        return view('news.post',[
            'news'=>$news,
        ]);
    }
    public function add( Request $request){
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'content' => 'required',
        //     'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
      $imgPath = $request->file('img')->store('uploads/img/news', 'public');
      $news=new News();
       $news->title=$request->input('title');
       $news->content=$request->input('content');
       $news->img=$imgPath;
       $news->save();
      
    
      return redirect('news')->with('success', 'Bài báo đã được đăng thành công!');
    }
    public function delete($id)
    {
        $news = News::findOrFail($id);

        // Xóa ảnh liên quan nếu cần

        $news->delete();

        return redirect()->route('newsadmin')->with('success', 'Bài viết đã được xóa thành công');
    }
    public function showedit($id)
    {
        $news = News::findOrFail($id);
        return view('news.editnew', compact('news'));
    }
    public function edit(Request $request, $id)
    {
    
        $news = News::findOrFail($id);

        // Cập nhật thông tin bài viết
        $news->title = $request->input('title');
        $news->content = $request->input('content');

        if ($request->hasFile('img')) {
            // Lưu ảnh mới và cập nhật đường dẫn
            $imgPath = $request->file('img')->store('uploads/img/news', 'public');
            $news->img = $imgPath;
        }

        $news->save();

        return redirect()->route('newsadmin')->with('success', 'Bài viết đã được cập nhật thành công');
    }
}
