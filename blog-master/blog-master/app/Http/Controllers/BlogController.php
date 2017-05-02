<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use DB;
use Auth;

class BlogController extends Controller
{

    function __construct()
    {

        $this->middleware('auth');
    }

    public function show( )
    {
        $articles = DB::table('article')
            ->orderBy('created_time','desc')
            ->paginate(3);
        $comments = DB::table('comment')
            ->orderBy('created_time','desc')
            ->get();
  //      $articles=Article::paginate(5);
        return view('Blog.show', [
            'articles' => $articles,
            'comments' => $comments
        ]);
    }

    public function add(Request $request)
    {
        $content = $request->input('content');
        $title = $request->input('title');
        $user = Auth::user();
        $blog = Blog::find($user->id);
        $date = date('Y-m-d H:i:s', time() + 8 * 60 * 60);
        DB::table('article')->insert([
            'user_id' => $blog->id,
            'user_name' => $blog->name,
            'title' => $title,
            'content' => $content,
            'created_time' => $date
        ]);
        return redirect('/show');
    }

    //update a post
    public function update(Request $request, $article_id, $user_id)
    {
        $content = $request->input('content');
        $title = $request->input('title');
        $user = Auth::user();// 获取用户信息
        $date = date('Y-m-d H:i:s', time() + 8 * 60 * 60);
        if ($user->id == $user_id) {
            DB::table('article')->where('id', $article_id)->update([
                'title' => $title,
                'content' => $content,
                'updated_time' => $date
            ]);
            $article = DB::table('article')->find($article_id);
            return view('Blog.article_show', [
                'article' => $article
            ]);
        } else echo "无权修改此文章";
    }

    public function delete($id, $user_id)
    {
        $user = Auth::user();// 获取用户信息
        //   $article=DB::table('article')->where('id', $id)->get();
        if ($user->id == $user_id||$user->id==1) {
            DB::table('article')->where('id', $id)->delete();
            DB::table('comment')->where('article_id', $id)->delete();
            echo "successfully deleted";
            return redirect('/show');
        } else echo "无权删除此文章";
    }

    public function comment_add(Request $request, $article_id)
    {
        $content = $request->input('content');
        $user = Auth::user();
        $date = date('Y-m-d H:i:s', time() + 8 * 60 * 60);
        DB::table('comment')->insert([
            'comment_id' => $user->id,
            'content' => $content,
            'article_id' => $article_id,
            'comment_name' => $user->name,
            'created_time' => $date
        ]);
        return redirect('/show');
    }

    public function comment_delete($user_id, $id, $comment_id)
    {
        $user = Auth::user();
        if ($user->id == $user_id || $user->id == $comment_id) {
            DB::table('comment')->where('id', $id)->delete();
            echo "successfully deleted";
        } else echo "无权删除此文章";
        return redirect('/show');
    }

    public function check($article_id)
    {
        $article = DB::table('article')->find($article_id);
        return view('Blog.article_show', [
            'article' => $article
        ]);
    }

    public function check_me()
    {
        $user = Auth::user();
        $article = DB::table('article')->where('user_id', $user->id)->get();
        $comments = DB::table('comment')->get();
        return view('Blog.check_me', [
            'articles' => $article,
            'comments' => $comments
        ]);
    }
    public function try_me( )
    {
        $article = DB::table('article')->get();
        return view('Blog.try_me', [
            'article' => $article,
        ]);
    }
        public function master(){
            $users=Blog::all( );
            return view('Blog.master',['users'=>$users]);
        }

    public function master_reset(Request $request)     //密码重置...密码重置依然有问题，
                                                         //TokenMismatchException的报错
    {
        if($request->password!=null)
        {
            $password = $request->password;
            $id = $request->user_id;
           $user=Blog::find($id);
            $user->fill([
                'secret'=>encrypt($password)
            ])->save();
        }
        return redirect()->back()->withInput()->withErrors('重置成功！');
    }

        public function admin(){
            $user = Auth::user();
            if($user->code==1)
            {
                return view('Blog.Admin');
            }
            else  return redirect('/show');
        }

        public  function admin_article(){
            $articles = DB::table('article')
                ->orderBy('created_time','desc')
                ->paginate(3);
            return view('Blog.AdminArticle',['articles'=>$articles]);
        }

    public function admin_delete($id)
    {
        DB::table('article')->where('id',$id)->delete();
        DB::table('comment')->where('article_id', $id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }

    public function user_delete($id){
        Blog::where('id', $id)
            ->delete();
        DB::table('article')->where('id',$id)->delete();
        DB::table('comment')->where('article_id', $id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}