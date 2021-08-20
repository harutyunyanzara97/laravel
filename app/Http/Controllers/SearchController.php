<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchCategory(Request $request)
    {
        if ($request->ajax()) {
            $category = Category::where('name', 'LIKE', '%' . $request->search . "%")->get();
            if ($category) {
                return Response($category);
            }
        }
    }

    public function searchPost(Request $request)
    {
        if ($request->ajax()) {
            $post = Post::where('title', 'LIKE', '%' . $request->search . "%")->where('category_id',$request->id)->paginate(5);
            if ($post) {
                return Response($post);
            }
        }
    }

    public function searchComment(Request $request)
    {
        if ($request->ajax()) {
            $comment = Comment::where('description', 'LIKE', '%' . $request->search . "%")->paginate(5);
            if ($comment) {
                return Response($comment);
            }
        }
    }
    public function filterCatByDate(Request $request){
        if ($request->ajax()) {
            $category = Category::orderBy('id', 'DESC')->get();;
            if ($category) {
                return Response($category);
            }
        }
    }
    public function filterCatByComments(Request $request){
        if ($request->ajax()) {
            $category = Category::withCount('comments')
                ->orderBy('comments_count', 'desc')
                ->get();
            if ($category) {
                return Response($category);
            }
        }
    }
    public function filterCatByPosts(Request $request){
        if ($request->ajax()) {
            $category = Category::withCount('posts')
                ->orderBy('posts_count', 'desc')
                ->get();
            if ($category) {
                return Response($category);
            }
        }
    }
}
