<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
class Post extends Model
{
     protected $fillable = ['title', 'body', "file", "status", "user_id"];
}
