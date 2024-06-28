<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
     protected $guarded = [];

     public function parent(){
         return $this->belongsTo(Group::class,'parent_id');
     }
     public function children(){
         return $this->hasMany(Group::class,'parent_id');
     }

     public function accountHeads()
     {
         return $this->hasMany(AccountHead::class);
     }
}
