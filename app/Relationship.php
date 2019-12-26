<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\Pivot;

class Relationship extends Model
{
    protected $fillable = ['follower_id', 'followed_id'];

//pattern1
    // public function following() {
    //   return $this->belongsTo(
    //     'App\User',
    //     'follower_id',
    //     'id',
    //   );
    // }
    //
    // public function followed() {
    //   return $this->belongsTo(
    //     'App\User',
    //     'followed_id',
    //     'id',
    //   );
    // }
//pattern3
    public function user() {
      return $this->belongsTo('App\User');
    }
}
