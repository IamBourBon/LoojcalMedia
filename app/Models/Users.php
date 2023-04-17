<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Users extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = ['Firstname','Lastname','Gender','Password','Email','Create_time',
                           'Number_of_followers','Followers','Number_of_friends','Friends',
                           'Phone','Post_id','Group_id','Avatar','Cover_image','BlackList','SearchList','Active','Status','Token'];
    
    protected $table = "account"; 

    public function Login($email,$pass){
        
        $user = DB::select('select * from Account where email = :email and Password = :pass',
        [
            'email' => $email,
            'pass' => $pass
        ]);
        
        if($user){
            return true;
        }
        
        return false;
    }

}
