<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function dashboard()
    {
        $admin = User::where('is_admin', 1)->first();
        return view('admin.dashboard', compact('admin'));
    }
    public function createCategory(Request $request) {
        $data=$request->all();
        $category=new Category();
        $user=User::where('is_admin',1)->first();
        $category->user_id=$user->id;

        if ($request->hasfile('img_url')) {
            $image=$request->img_url;
            $name = time() . $image->getClientOriginalName();
            $image->move(public_path() . '/images/', $name);
            $data['img_url'] = $name;
        }
        $category->fill($data);
        $category->save();
        return response()->json($category);

    }
    public function editCategory(Request $request)
    {
        $modal_category = Category::where('id', $request->id)->first();
        return view('category', compact('modal_category'));
    }

    public function update(Request $request)
    {
        $category = Category::where('id', $request->id)->first();
        $user=User::where('is_admin',1)->first();
        $category->user_id=$user->id;
        $category->update($request->all());
        if ($request->hasfile('photo')) {
            foreach ($request->file('photo') as $image) {
                $name = time() . $image->getClientOriginalName();
                $image->move(public_path() . '/images', $name);
                $category->img_url = $name;
                $category->save();
            }
        }
        return response()->json($category);
    }
    public function delete(Request $request)
    {
        Category::where("id", $request->id)->delete();

        return Redirect::to('/network/');
    }

}
