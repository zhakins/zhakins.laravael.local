<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Guard;

class Task extends Model
{
    //
    protected $fillable=['name','user_id'];
    public function user()
    {
        return $this->belongsTo((User::class));
    }
    
    public static function getTaskByUser($user_id)
    {
        return self::where('user_id','=',$user_id)->orderBy('created_at','asc')->get();
         
    }
}
