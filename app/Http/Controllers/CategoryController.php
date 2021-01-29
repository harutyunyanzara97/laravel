<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class CategoryController extends Controller
{
    public function index()
    {
        $categories= Category::with('followers')->where('user_id',Auth::user()->getId())->get();
        return view('network', compact('categories', $categories));
    }
    public function insertFollows(Request $request)
    {
        $follows = Follow::where(['user_id' => Auth::user()->getId(), 'category_id' => $request->id])->first();
        if (!$follows) {
            $follows = new Follow();
            $follows->user_id = Auth::user()->getId();
            $follows->category_id = $request->id;
            $follows->save();
        }
    }

    public function unfollow(Request $request)
    {
        $follows = Follow::where(['user_id' => Auth::user()->getId(), 'category_id' => $request->id])->first();
        if ($follows) {
            $follows->delete();
        }
    }

    public function editCategory(Request $request)
    {
        $modal_category=Category::where('id',$request->id)->first();
        return view('category',compact('modal_category'));
    }
    public function update(Request $request) {
        $category=Category::where('id',$request->cat_id)->first();
        $category->user_id=Auth::user()->getId();
        $category->fill($request->all());
        $category->save();
        if($request->hasfile('photo'))
        {

            foreach($request->file('photo') as $image)
            {
                $name=time().$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
                $category->img_url = $name;
                $category->save();
            }
        }
        echo '<script type="text/javascript">'
        , 'history.go(-1);'
        , '</script>';
    }
    public function showPosts(Request $request,$id) {
        $category=Category::with('posts')->where('id',$id)->first();
        return view('posts',compact('category',$category));
}
}

//$cat = Category::where('id', $request->id)->update(['name' => $request->name]);
//$cat->save();
//return Redirect::to('/network');
//}
