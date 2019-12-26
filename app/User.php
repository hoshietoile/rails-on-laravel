<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\HTTP\Request;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function micropost() {
      return $this->hasMany('App\Micropost');
    }

//for relationship test
//pattern1
    // public function followings() {
    //   return $this->hasManyThrough(
    //     'App\User',
    //     'App\Relationship',
    //     'follower_id',
    //     'id',
    //     'id',
    //     'followed_id',
    //   );
    // }
    //
    // public function followers() {
    //   return $this->hasManyThrough(
    //     'App\User',
    //     'App\Relationship',
    //     'followed_id',
    //     'id',
    //     'id',
    //     'follower_id',
    //   );
    // }

//pattern2
    // public function followings() {
    //   return $this->belongsToMany(
    //     'App\User',
    //     'relationships',
    //     'follower_id',
    //     'rollowed_id',
    //     'id',
    //   );
    // }
    //
    // public function followers() {
    //   return $this->belongsToMany(
    //     'App\User',
    //     'relationships',
    //     'followed_id',
    //     'rollower_id',
    //     'id',
    //   );
    // }
//pattern3
  public function relationships() {
    return $this->hasMany('App\relationship');
  }

  public function following() {
    return $this->belongsToMany(
      'App\User',
      'relationships',
      'followed_id',
      'follower_id',
      ""
    );
  }

  public function followers() {
    return $this->belongsToMany(
      'App\User',
      'relationships',
      'follower_id',
      'followed_id',
      ""
    );
  }
//for relationship test

    //before save,,,
    //存在性バリデーション,,,
    // public function store(Request $request) {
    //   $validated = $request->validate([
    //     'name' => 'required|max:50',
    //     'email' => 'required|email|unique:users|max:255',
    //     'password' => 'required|min:8',
    //   ]);
    // }
}
