<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vkrs extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id',
      'title',
      'year',
      'mark',
      'essay',
      'tech',
      'specialty_id',
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

  public function scopeSearch($query, $term)
   {
       $term = "%$term%";
       $query->where(function ($query) use ($term) {
           $query->where('title', 'like', $term)
               ->orWhere('tech', 'like', $term)
               ->orWhere('year', 'like', $term)
               ->orWhere('mark', 'like', $term)
               ->orWhereHas('specialty', function ($query) use ($term) {
                   $query->where('title', 'like', $term);
               })
               ->orWhereHas('user', function ($query) use ($term) {
                $query->where('title', 'like', $term);
            });
       });
   }

  public function User()
   {
     return $this->belongsTo(User::class, 'user_id');
   }
   public function specialty()
    {
        return $this->belongsTo(specialty::class, 'specialty_id');
    }

    
}