<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        //ブログ一覧表示
        return view('admin.blogs.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //ブログ投稿表示
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // ブログ投稿処理
    public function store(StoreBlogRequest $request)
    {


        $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('blogs', 'public');
        // dd($validated);
        // Blog::created($validated);
        // publicのblogsにランダムの文字列で保存する
        Blog::create($validated); //検証済みのデータを一括で配列に入れている
        //そのためにはモデル(Blog.php)にfillableを指定しないとエラーになる



        return to_route('admin.blogs.index')->with('success', 'ブログを投稿しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {

        $blog = Blog::findOrFail($blog->id);
        // $blog = Blog::find($blog->id);
        // findとfindOrFailの違いは存在しないIDがあった場合,
        // findの場合はnullになりエラー分が出力される
        // findOrFailの場合404ページに飛ばされる
        return view('admin.blogs.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog = Blog::findOrFail($blog->id);
        $updateDate = $request->validated(); //titleとbody


        if ($request->has('image')) {
            Storage::disk('public')->delete($blog->image); //不要になった画像をstorage/public/から削除￥
            $updateDate['image'] = $request->file('image')->store('blogs', 'public');
        }
        $blog->update($updateDate);
        return to_route('admin.blogs.index')->with('success', 'ブログを更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog = Blog::findOrFail($blog->id);

        $blog->delete();
        // dd(Storage::disk('public')->delete($blog->image));

        Storage::disk('public')->delete($blog->image); //不要になった画像をstorage/public/から削除￥
        return to_route('admin.blogs.index')->with('success', 'ブログを削除しました');
    }
}
