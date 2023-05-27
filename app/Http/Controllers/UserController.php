<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\SocialAccount;
use App\Models\Servers;
use Laravel\Socialite\Contracts\Provider;

use Mail,Session,Str,DateTime,Socialite;

class UserController extends Controller
{
    // private $a;

    public function index(){
        return view('searchModal');
    }

    
    public function loginPage(){
        return view('landing');
    }

    public function logoutPage(){
        Session::flush();
        return redirect('/');
    }
    
    public function loginValidate(Request $request){
        
        $user = new Users();

        $userValidate = $user->Login($request->input('email'), $request->input('password'));
                
        if($userValidate){
            Session::put(['email' => $request->input('email')]);
            return redirect('/');
        }

        echo "error"; 
    }


    public function register(Request $request){
        
        $data = [
           'Firstname' => $request->input('firstname'),
           'Lastname' => $request->input('lastname'),
           'Gender' => $request->input('gender'),
           'Password' => $request->input('password'),
           'Email' => $request->input('email'),
        ];

        $registerSuccess = Users::insert($data);

        if($registerSuccess){
            $name = $data['Lastname']." ".$data['Firstname'];

            Mail::send('email/validateMail',compact('name'),function($email) use($data){
                $email->subject('Xác minh tài khoản');
                $email->to($data['Email']);
            });

            $this->activeAccount($data['email']);
        }

        return view('validateEmail',compact('data'));
    }


    public function checkDataRegister(Request $request){
        $key = $request->input('key');
        $value = $request->input('value');
        
        if($key === "email"){
            $existData = Users::where($key,$value)->get();
 
            if(!$existData->isEmpty()){
                //value of key is exsited in database
                return $key; 
            }
            return $key."0";     
        
        }elseif(is_array($key) && is_array($value)){
            $existData = Users::where([$key[0]=> $value[0],$key[1]=> $value[1]])->get();
            
            if(!$existData->isEmpty()){
                //value of key is exsited in database
                return $key; 
            }else{
                array_push($key,"0");
            }
            return $key;
        }

    }

    
    public function activeAccount($emailAddress){
         
        $data = Users::where('email',$emailAddress)->first(["Firstname","Lastname","Email","Active","Token","ExpiredToken"]); 
        
        $token = Str::random(20);
        $Now = new DateTime();
        $Now->format('Y-m-d H:i:s');
        $dateCreate = new DateTime($data['ExpiredToken']);
        $expiredTime = $Now->diff($dateCreate); //catch different minutes to expired token
        
        if(!empty($data)){
            if($data['Active'] === 0 && $data['Token'] === null){
                $name = $data['Lastname']." ".$data['Firstname'];

                Users::where('email',$data['Email'])->update(['Token' => $token, "ExpiredToken" => $Now]);

                Mail::send('email/validateMail',compact('data','token'),function($email) use($data){
                    $email->subject('Xác minh tài khoản');
                    $email->to($data['Email']);
                });
    
                return view('validateEmail',compact('data'));

            }else if($data['Active'] === 0 && $data['Token'] !== null && $expiredTime->i < 5){

                return view('validateEmail',compact('data'));
            }else if($data['Active'] === 0 && $data['Token'] !== null && $expiredTime->i >= 5){

                $this->removeToken($data['Email']);
                return redirect('/activeAccount/'.$data['Email']);
            }else{
                return redirect('/');
            } 
        };
    }


    public function active($email,$token){
        
        $data = Users::where(['email' => $email, 'token' => $token])->first(["Firstname","Lastname","Email"]); 

        if(!empty($data)){
            Users::where('email',$email)->update(['Active' => 1, 'Token' => '']);
            return redirect('/');         
        }
        else{
            return 'invalid token';
        }

    }


    public function removeToken($email){
        Users::where('email',$email)->update(['Token' => null]);
    }

    //login with OAuth2
    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }
    
    //login with OAuth2
    public function handleProviderCallback($provider){

        $Oauth = Socialite::driver($provider);
        $providerUser = $Oauth->stateless()->user();
        $providerName = class_basename($provider);

        $account = SocialAccount::whereProvider($providerName)->whereProviderUserId($providerUser->getId())->first();

        if($account){
            Session::put(['email' => $providerUser->getEmail()]);

            $accountInfo = $this->getUserInfoByEmail($providerUser->getEmail());
            Session::put(['avatar' => $accountInfo['Avatar']]);
            return redirect('/');

        }else{

            $user = Users::whereEmail($providerUser->getEmail())->first();

            if(!$user){
                $user = Users::create([
                    'Email' => $providerUser->getEmail(),
                    'Firstname' => $providerUser->user['given_name'],
                    'Lastname' => $providerUser->user['family_name'],
                    'Gender' => 0,
                ]);
            }

            $account = new SocialAccount([
                'Provider_user_id' => $providerUser->getId(),
                'Provider' => $providerName,
                'Account_id' => $user['Account_id'],
            ]);

            $account->save();

            Session::put(['email' => $user['email']]);
            
            $accountInfo = $this->getUserInfoByEmail($user['email']);
            Session::put(['avatar' => $accountInfo['Avatar']]);

            return redirect('/');
        }
    } 


    public function Search(Request $request){
        
        if($request->input('search') !== null){
            
            $searchValue = Users::where('Firstname','LIKE',$request->input('search')."%")
            ->orWhere('Lastname','LIKE',$request->input('search')."%")
            ->get(["Account_id","Firstname","Lastname","Email"])->toArray();

            return json_encode($searchValue);
        }else{

            return '';
        }
        
    }


    public function getSearch(){

        $jsonSearch = Users::where('Email',Session::get('email'))->first("SearchList");
        
        if($jsonSearch){
            $listSearch = json_decode($jsonSearch['SearchList']);
        }else{
            $listSearch = $jsonSearch; 
        }
        
        return $listSearch;
    }


    public function storeSearch(Request $request){
        $history = $this->getSearch();
       
        if(!is_array($history)){
           $history = array();    
        }
        
        if(!in_array($request->input('value'),$history)){
            $history = array_reverse($history);
            array_push($history,$request->input('value'));
            $history = array_reverse($history);
            
            $jsonHistory = json_encode($history);
            Users::where('Email',Session::get('email'))->update(['SearchList'=>$jsonHistory]);
        }
            
        return $request->input('value');
    }


    public function getHistorySearch(){
        
        $history = $this->getSearch();
       
        if(is_array($history)){
            
            $result = array();

            foreach($history as $value){
                
                $User = Users::where('Account_id',$value)->first(["Account_id","Firstname","Lastname","Email"]);
                array_push($result, $User);
            }

            return json_encode($result);
        }
    }

    public function removeHistorySearch(Request $request){
        
        $history = $this->getSearch();
        $id[] = $request->input('value');
        $email = Session::get('email');
        
        $history = array_values(array_diff($history,$id));
        $json = json_encode($history);
        Users::where('Email',$email)->update(['SearchList' => $json]);

        return $json;
    }


    //CREATE SERVER
    public function createServer(Request $request){

        $file = $request->file('image');
        if($file){

            $filename = time().$file->getClientOriginalName();
            $path = $file->storeAs('room',$filename,'public');    
        }else{

            $path = '';
        }

        $url = Str::random(10);
        $list = json_decode($this->getServerCreated());
        
        $data = [
            'Server_name' => $request->input('name'),
            'Private' => $request->input('private'),
            'Image' => $path,
            'URL' => $url,
            'Status' => 1,
        ];

        array_push($list,$url);

        Users::where('Email',Session::get('email'))->update(['CreateServer' => json_encode($list)]);
        
        $createSuccess = Servers::insert($data);

        if($createSuccess){
            return $url;
        }
    }


    //GET SERVER
    public function getServer(){
        $jsonServerJoined = Users::where('Email',Session::get('email'))->first('JoinServer');
        $jsonServerCreated = Users::where('Email',Session::get('email'))->first('CreateServer');

        $server = []; 
        
        //Check it NULL 
        if($jsonServerJoined['JoinServer'] !== null){
            $ServerJoined = json_decode($jsonServerJoined['JoinServer']);
        
            foreach($ServerJoined as $value){
                $found = Servers::Where('URL',$value)->first(['Server_name','Image','Category','URL']);
                
                if($found){
                    array_push($server,$found);
                }    
            }
        }

        if($jsonServerCreated['CreateServer'] !== null){
            $ServerCreated = json_decode($jsonServerCreated['CreateServer']);
        
            foreach($ServerCreated as $value){
                $found = Servers::Where('URL',$value)->first(['Server_name','Image','Category','URL']);
                
                if($found){
                    array_push($server,$found);
                }    
            }
        }

        return json_encode($server) ;
    }


    //JOIN SERVER
    public function joinServer(Request $request){

        //$_SERVER['HTTP_ORIGIN'];
        
        $url = $request->input('url');
        
        if($url !== ''){

            if(str_contains($url,"http://localhost/")){
                $code = str_replace("http://localhost/","",$url);
                $Server = Servers::where('URL',$code)->first();
                
                if($Server){

                    //get list server join
                    $list = json_decode($this->getServerJoined());

                    //push new
                    if(!in_array($Server->URL, $list)){
                        array_push($list, $Server->URL); 
                    }

                    //update
                    Users::where('Email',Session::get('email'))->update(['JoinServer'=> json_encode($list)]);
                    
                    //TYPE JSON
                    return $this->getServerJoined();
                }

            }else{

                $Server = Servers::where('URL',$url)->first();

                //get list server join
                $list = json_decode($this->getServerJoined());

                //push new
                if(!in_array($Server->URL, $list)){
                    array_push($list, $Server->URL); 
                }

                //update
                Users::where('Email',Session::get('email'))->update(['JoinServer'=> json_encode($list)]);
                
                //TYPE JSON
                return $this->getServerJoined();
            }
        }
        
    }

    public function getServerJoined(){
        $list = Users::where('Email',Session::get('email'))->first('JoinServer');
        if($list['JoinServer'] === null){
            return json_encode([]);
        }else{
            //TYPE JSON
            return $list['JoinServer'];
        }
    }

    public function getServerCreated(){
        $list = Users::where('Email',Session::get('email'))->first('CreateServer');
        if($list['CreateServer'] === null){
            return json_encode([]);
        }else{
            //TYPE JSON
            return $list['CreateServer'];
        }
    }


    //VIDEO CALL
    public function getVideoCall(){
        // return redirect('/'); 
        return view('searchModal'); 
    }


    //GET USER INFO BY EMAIL
    public function getUserInfoByEmail($email){
        $account = Users::where('email',$email)->first(["Firstname","Lastname","Avatar","Cover_image"]);
        return $account;
    }


    //USER INFO
    //UPDATE INFO
    public function updateProfile(Request $request){
        $file = $request->file('image');
        if($file){

            $filename = time().$file->getClientOriginalName();
            $path = $file->storeAs('avatar',$filename,'public');    
        }else{

            $path = '';
        }

        $data = [
            'Avatar' => $path
        ];
        
        $updateSuccess = Users::where('Email',Session::get('email'))->update($data);

        if($updateSuccess){

            Session::forget('avatar');
            Session::put('avatar',$path);
            return $path;
        }
    }
}
