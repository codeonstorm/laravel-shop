<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Validator;
//use Crypt;
use Mail;

class AuthController extends Controller
{
    public function authentication()
    {
        return view('front.login');
    }


    public function authentication_process(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');
        $user = User::where('email',$email)->first();

        if($user){
            if(Hash::check($request->post('password'), $user->password)){
                $role = $user->role;

                if($user->email_verified_at==''){
                    return response()->json(['status'=>"error",'msg'=>'Please verify your email id']);
                }
                if($user->status==0){
                    return response()->json(['status'=>"error",'msg'=>'Your account has been deactivated']);
                }

                if($request->rememberme===null){
                    setcookie('login_email',$request->str_login_email,100);
                    setcookie('login_pwd',$request->str_login_password,100);
                }else{
                   setcookie('login_email',$request->str_login_email,time()+60*60*24*100);
                   setcookie('login_pwd',$request->str_login_password,time()+60*60*24*100);
                }
 
                $request->session()->put('RANK',$role->rank);
                $request->session()->put('USER_ID',$user->id);
                $request->session()->put('USER_NAME',$user->name);

                $status="success";
                $msg="";

              /*  $getUserTempId=getUserTempId();
                DB::table('cart')
                    ->where(['user_id'=>$getUserTempId,'user_type'=>'Not-Reg'])
                    ->update(['user_id'=>$result[0]->id,'user_type'=>'Reg']);

                */
            }else{
                $status="error";
                $msg="Please enter valid password";
            }

        }else{
        $status="error";
        $msg="Please enter valid email or password";

        }
        return response()->json(['status'=>$status,'msg'=>$msg]);
      //  $request->session()->flash('error','Please enter valid login details');
       // return redirect('login/');
    }


    public function registration()
    {
        return view('front.signup');
    }


    public function registration_process(Request $request)
    {

        $valid=Validator::make($request->all(),[
            "name"=>'required',
            "email"=>'required|email|unique:users,email',
            "password"=>'required',
            "mobile"=>'required|numeric|digits:10',
       ]);

       if(!$valid->passes()){
            return response()->json(['status'=>'error','error'=>$valid->errors()->toArray()]);
       }else{
            $rand_id=rand(111111111,999999999);
            $user = new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->mobile=$request->mobile;
            $user->status=1;
            $user->role_id=3;
            $user->email_verified_at=date('Y-m-d h:i:s');
            $user->rand_id=$rand_id;
            $user->created_at=date('Y-m-d h:i:s');
            $user->updated_at=date('Y-m-d h:i:s');


            $check = $user->save();
            if($check){
                /*
                $data=['name'=>$request->name,'rand_id'=>$rand_id];
                $user['to']=$request->email;
                Mail::send('front/email_verification',$data,function($messages) use ($user){
                    $messages->to($user['to']);
                    $messages->subject('Email Id Verification');
                });
                */
                return response()->json(['status'=>'success','msg'=>"Registration successfully. Please check your email id for verification"]);
            }

       }
    }

    public function email_verification($id)
    {

    }

    public function forgot_password()
    {

    }

    public function forgot_password_change($id)
    {

    }

    public function forgot_password_change_process()
    {

    }



    public static function accessBy(Request $request, $rank='user')
	{
		// code...
		if($request->session()->has('RANK'))
		{
			return false;
		}

		$logged_in_rank = $request->session->get('rank');

		$RANK['super_admin'] = ['super_admin','admin','user'];
		$RANK['admin']       = ['admin','user'];
		$RANK['user'] 	     = ['user'];

		if(!isset($RANK[$logged_in_rank]))
		{
			return false;
		}

		if(in_array($rank,$RANK[$logged_in_rank]))
		{
			return true;
		}

		return false;
	}

}
