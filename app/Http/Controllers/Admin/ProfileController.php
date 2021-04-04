<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\ProfileHistory;
use Carbon\Carbon;

class ProfileController extends Controller
{
    //

    public function add(){
        return view('admin.profile.create');
    }
    

    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request->all();
        
        // formに画像があれば、保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
        } else {
            $news->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/create');
    }
    
    
   public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Profile::where('name',$cond_title)->get();
        } else {
            // それ以外はすべてのプロフィールを取得する
            $posts = Profile::all();
        }
        return view('admin.profile.index', ['posts'=> $posts, 'cond_title' => $cond_title]);
        
    }


    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        if (empty($profile)) {
        abort(404);    
        }
      return view('admin.profile.edit', ['form' => $profile]);
    }



    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Profile::$rules);
        
        // Profile Modelからデータを取得する
        $profile = Profile::find($request->id);
        
        // 送信されてきたフォームデータを格納する
        $form = $request->all();
        if ($request->remove == 'true') {
          $form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $form['image_path'] = basename($path);
      } else {
          $form['image_path'] = $profile->image_path;
      }

         unset($form['image']);
         unset($form['remove']);
         unset($form['_token']);
        $profile->fill($form)->save();
        
        $history = new ProfileHistory;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/profile');
        
    }
    
    
    public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $profile = Profile::find($request->id);
        // 削除する
        $profile->delete();
        return redirect('admin/profile/');
    }
        
        
}