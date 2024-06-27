<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
     protected $guarded = [];

     public function parent(){
         return $this->belongsTo(self::class);
     }
     public function children(){
         return $this->hasMany(self::class);
     }

     public function accountHead()
     {
         return $this->hasMany(AccountHead::class);
     }
}
