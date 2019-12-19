<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Micropost;

class MicropostsController extends Controller
{
    // validation (kari)
    // user_id presence: true
    // content, presence: true, length: max: 50;

    public function create(Request $request, $id) {
      $this->validate($request, [
        'title' => 'required|max:30',
        'content' => 'required|max:50',
      ], [
        'title.required' => ':attributeは入れてくださいね。',
        'title.max' => ':attributeは30文字までにしてください。',
        'content.required' => ':attributeは入れてくださいね。',
        'content.max' => ':attributeは50文字までにしてください。',
      ], [
        'title' => 'タイトル',
        'content' => '内容',
      ]);
      $user = User::all()->find($id);
      $micropost = new Micropost();
      $micropost->title = $request->title;
      $micropost->content = $request->content;
      $user->micropost()->save($micropost);
      \Session::flash('success_message', '投稿しました！');
      return redirect()->back();
    }

    public function destroy($id) {
      $micropost = Micropost::all()->find($id);
      $micropost->delete();
      \Session::flash('message_danger', '削除しましたよ！');
      return redirect()->back();
    }
}
