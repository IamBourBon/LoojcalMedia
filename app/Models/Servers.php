<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servers extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = ['Server_name','Private','Image','Category','URL','Status'];
    
    protected $table = "server"; 

}
