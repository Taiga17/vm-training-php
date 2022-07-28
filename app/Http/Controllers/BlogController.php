<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Blog;

class BlogController extends Controller
{
    private $blog;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->blog = new Blog;
    }

    /**
     * 記事ページ表示
     * @param intager $id
     * @return view
     */
    public function view($id) {
        $blog = $this->blog->getBlogData($id);
        return view('blog', ['blog' => $blog]);
    }

    /**
     * 記事編集画面
     * @param intager $id
     * @return view
     */
    public function edit($id) {
        $blog = $this->blog->getBlogData($id);
        return view('edit', ['blog' => $blog]);
    }

    /**
     * 記事更新
     * @param intager $id
     * @return view
     */
    public function update(Request $request) {
        $file_name = $request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('public/photo', $file_name);
        $update_data = [
            'id' => $request->id,
            'title' => $request->title,
            'content' => $request->content,
            'photo' => $file_name,
        ];
        $this->blog->updateBlogData($update_data);
        return redirect('/blog/'.$request->id);
    }

    /**
     * 記事削除
     * @param intager $id
     * @return view
     */
    public function delete($id) {
        $this->blog->deleteBlogData($id);
        $blogs = $this->blog->getBlogList();
        return redirect('/home');
    }
}
