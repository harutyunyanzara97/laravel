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
        $user=User::where('is_admin',"1")->first();
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
    public function setModerator(Request $request) {
        $moder=User::where('id',$request->id)->first();
        $moder->notify = 1;
        $moder->save();
        return response()->json('This user now is moderator!');

    }
    public function unsetModerator(Request $request) {
        $moder=User::where('id',$request->id)->first();
        $moder->notify = 0;
        $moder->save();
        return response()->json('This user already does not have a moderator role!');

    }
    public function deleteUser(Request $request)
    {
        User::where("id", $request->id)->delete();

        return Redirect::back();
    }
    public function checkType(Request $request){
        $user = User::where('id', $request->id)->first();
        $user->payment_type = 2;
        $user->save();
        return response()->json('Payment type has been added to user!');
    }
    public function uncheckType(Request $request){
        $user = User::where('id', $request->id)->first();
        $user->payment_type = 1;
        $user->save();
        return response()->json('Payment type has been changed for this user!');
    }

}
