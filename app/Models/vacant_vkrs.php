<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class vacant_vkrs extends Model
{
    use HasFactory;
    public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id_vkr',
    'title',
    'description',
    'user_id',
];

/**
 * The attributes that should be hidden for arrays.
 *
 * @var array
 */
/*protected $hidden = [
    'password',
    'remember_token',
];*/

/**
 * The attributes that should be cast to native types.
 *
 * @var array
 */
/*protected $casts = [
    'email_verified_at' => 'datetime',
];*/


public function User()
 {
   return $this->belongsTo(User::class, 'user_id');
 }
}
