<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Categorie;
use App\Models\Comment;
use DB;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        foreach($posts as $key => $post)
        {
            $posts[$key]->category = Categorie::findOrFail($posts[$key]->category_id)->name;
            $posts[$key]->comments = DB::select('select * from comments where post_id = ?', [$post->id]);
        } 

        // dd($posts);
        return view('pages.index', compact('posts'));
    }

    public function postComment(Request $request)
    {
        
        $valid = $request->validate([
            'comment' => 'required|max:255',
            'post_id' => 'required'
        ]);
        
        Comment::create($valid);
        return redirect()->route('homepage');
    }
}
