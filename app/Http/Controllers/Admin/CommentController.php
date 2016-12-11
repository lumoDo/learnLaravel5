<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Comment;
use Redirect;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller
{
    public function index()
    {
        $aa=Article::with('hasManyComments')->get()->toArray();
        // dd($aa);
        // dd(Article::with('hasManyComments')->get()->toArray());
        return view('admin/Comment/index', ['articles' => $aa]);
    }
    public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
    public function edit($id)
    {
        return view('admin/comment/edit')->withComments(Comment::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        echo "string";
        $this->validate($request, [
            'nickname' => 'required',
            'email' => 'required',
            'website' => 'required',
            'content' => 'required',
        ]);

        $article = Comment::find($id);
        $article->nickname = Input::get('nickname');
        $article->email = Input::get('email');
        $article->website = Input::get('website');
        $article->content = Input::get('content');
        if ($article->save()) {
            return Redirect::to('admin');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }
}
