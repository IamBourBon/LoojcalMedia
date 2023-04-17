<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class SocialAccount extends Model
{
    use HasFactory;

    protected $fillable = ['Account_id','Provider_user_id','Provider','Updated_at','Created_at'];

    protected $table = "socialAccount";
    
    
}
