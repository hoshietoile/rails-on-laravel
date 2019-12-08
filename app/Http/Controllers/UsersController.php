<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getSignup() {
      return view('user.signup');
    }

    public function signup(Request $request) {
      $this->validate($request, [
        'name' => 'required|max:50',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required|min:8',
      ], [
        'name.required' => ':attributeは入れてくださいね。',
        'name.max' => ':attributeは:maxより少なくしてくださいね。。',
        'email.required' => ':attributeは入れてくださいね。',
        'email.email' => ':attributeはEメールのフォーマットでお願いしますね。',
        'email.unique' => ':attributeはほかの人に使われちゃってますね。',
        'email.max' => ':attributeは:max文字以下でお願いしますね。',
        'password.required' => ':attributeは入れてくださいね。',
        'password.min' => ':attributeは:min文字以上でお願いしますね。',
      ], [
        'name' => '名前',
        'email' => 'Eメール',
        'password' => 'パスワード',
      ]);
      $user = new User([
        'name'  => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
      ]);
      $user->save();
      if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
        \Session::flash('success_message', '登録に成功しましたよ！');
        return redirect()->route('user.show');
      }
      \Session::flash('danger_message', '登録失敗ですね～。');
      return redirect()->back();
    }

    public function getLogin() {
      return view('user.login');
    }

    public function login(Request $request) {
      $this->validate($request, [
        'email' => 'required|email|max:255',
        'password' => 'required|min:8',
      ], [
        'email.required' => ':attributeを記入してください。',
        'email.email'    => ':attributeのフォーマットが間違えています。',
        'email.max'  => ':attributeは:max文字以内で。',
        'password.required'       => ':attributeは入れてくださいね。',
        'password.min'  => ':attributeは:min文字以上で。'
      ], [
        'email' => 'Eメール',
        'password' => 'パスワード',
      ]);
      $credentials = $request->only('email', 'password');
      $remember = $request->input('remember');
      if (Auth::attempt($credentials, $remember)) {
        // dd($remember);
        \Session::flash('success_message', 'ログインに成功しましたよ！');
        return redirect()->route('user.show');
      }
      \Session::flash('danger_message', 'ログイン失敗ですね～。');
      return redirect()->back();
    }

    public function show() {
      return view('user.show');
    }

    public function profile($id) {
      $user = User::find($id);
      return view('user.profile', ['user' => $user]);
    }

    public function edit($id) {
      $user = User::find($id);
      return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request) {
      $this->validate($request, [
        'name' => 'nullable|max:50',
        'email' => 'nullable|email|unique:users|max:255',
        'password' => 'nullable|min:8',
      ], [
        'name.max' => ':attributeは:maxより少なくしてくださいね。',
        'email.email' => ':attributeはEメールのフォーマットでお願いしますね。',
        'email.unique' => ':attributeはほかの人に使われちゃってますね。',
        'email.max' => ':attributeは:max文字以下でお願いしますね。',
        'password.min' => ':attributeは:min文字以上でお願いしますね。',
      ], [
        'name' => '名前',
        'email' => 'Eメール',
        'password' => 'パスワード',
      ]);

      $user = User::find($request->id);
      $user->name = isset($request->name) ? $request->name : $user->name;
      $user->email = isset($request->email) ? $request->email : $user->email;
      $password_digest = Hash::make($request->password);
      $user->password = isset($password_digest) ? $password_digest : $user->password;

      $user->save();
      \Session::flash('success_message', '登録に成功しましたよ！');
      return redirect()->route('user.show');
    }

    public function getLogout() {
      Auth::logout();
      return redirect()->route('user.getLogin');
    }

    public function destroy($id) {
      $user = User::all()->find($id);
      $user->delete();
      $users = User::paginate(10);
      \Session::flash('danger_message', '削除しましたー。');
      return view('staticPages.users', ['users' => $users]);
    }
}
