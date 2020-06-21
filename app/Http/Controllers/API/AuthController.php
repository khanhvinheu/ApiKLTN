<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AuthController extends Controller
{
    private $apiToken;
  public function __construct()
  {
    // Unique Token
    $this->apiToken = uniqid(base64_encode(Str::random(60)));
  }
  /**
   * Client Login
   */
  public function postLogin(Request $request)
  {
    // Validations
    $rules = [
      'email'=>'required|email',
      'password'=>'required|min:3'
    ];
    $header['email']=$request->header('email');
    $header['password']=$request->header('password');
    $validator = Validator::make($header, $rules);
    //var_dump($va);
    //die();
    if ($validator->fails()) {
      // Validation failed
      return response()->json([
        'message' => $validator->messages(),
      ]);
    } else {
      // Fetch User
      $user = User::where('email',$header['email'])->first();
      if($user) {
        // Verify the password
        if( password_verify($header['password'], $user->password) ) {
          // Update Token
          $postArray = ['api_token' => $this->apiToken];
          $login = User::where('email',$header['email'])->update($postArray);
          
          if($login) {
            return response()->json([
              'code'=>200,
              'status'=>1,
              'user_id'         => $user->id,
              'email'        => $user->email,
              'access_token' => $this->apiToken,
              'message'=>'Login Success',
            ]);
          }
        } else {
          return response()->json([
            'message' => 'Invalid Password',
          ]);
        }
      } else {
        return response()->json([
          'message' => 'User not found',
        ]);
      }
    }
  }
  /**
   * Register
   */
  public function postRegister(Request $request)
  {
    // Validations
    $rules = [
      'name'     => 'required|min:3',
      'email'    => 'required|unique:users,email',
      'password' => 'required|min:3'
    ];
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
      // Validation failed
      return response()->json([
        'status'=>0,
        'message' => 'Register Failed',
      ]);
    } 
    else 
    {
      $postArray = [
        'name'      => $request->name,
        'email'     => $request->email,
        'password'  => bcrypt($request->password),
        'api_token' => $this->apiToken
      ];
      // $user = User::GetInsertId($postArray);
      $user = User::insert($postArray);
  
      if($user) {
        return response()->json([
          'status'=>1,
          'message'=>'Register Success !!',
          'name'         => $request->name,
          'email'        => $request->email,
          'access_token' => $this->apiToken,
        ]);
      } else {
        return response()->json([
          'status'=>0,
          'message' => 'Registration failed, please try again.',
        ]);
      }
    }
  }
  /**
   * Logout
   */
  public function postLogout(Request $request)
  {
    $token = $request->header('Authorization');
    $email = $request->header('email');
    $user = User::where('api_token',$token)->first();
    if($user) {
      $postArray = ['api_token' => null];
      $logout = User::where('email',$email)->update($postArray);
      if($logout) {
        return response()->json([
          'message' => 'User Logged Out',
        ]);
      }
    } else {
      return response()->json([
        'message' => 'User not found',
      ]);
    }
  }
  public function deleteUser(Request $request){
    $header['name']=$request->header('name');
        $header['email']=$request->header('email');
        $header['token']=$request->header('token');       
        $validator = Validator::make($header, [
          'email' => 'required|string|email',
          'token' => 'required',
        ]);
        if ($validator->fails()) {
            
            return response()->json(['Bad Request' => $validator->errors(), 'Code' => 401
            ], 200);
        }        
    $id = $request->route('id');
    $user = DB::table('users')->where('id', '=', $id)->delete();    
    if($user){       
        return response()->json([
           'message' => 'Successfully deleted user' ], 200);
    }
    else{       
        return response()->json(['message'=> 'Deleted fail'],401);
    }
  }
  public function listUser(Request $request){
    $header['email']=$request->header('email');
    $header['token']=$request->header('token');
    $checkmail=User::where('email',$header['email'])->first();    
      if($checkmail){
        $checktoken=User::where('api_token',$header['token'])->first();
        if($checktoken){
        $user= User::paginate(6);  
          if($user){
              return response()->json([
                'user'=>$user->items(),
                'total'=>$user->total(),
                'pageIndex'=>$user->currentPage(),
              ],200);
          }
          else{
              return response()->json([
                  'message'=>'Not user in table'
              ]);
          }
        }
        else{
          return response()->json([
            'message'=>'Sign in to display the user'
        ]);
        }
      }
      else{
        return response()->json([
          'message'=>'Sign in to display the user'
      ]);
      }
  }
  public function editUser(Request $request){ 
    $name = $request->post('name');
    $mail = $request->post('email');
    $rules = [
        'name'     => 'required|min:3',
        'email'    => 'required|unique:users,email',            
    ];
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        // Validation failed
        return response()->json([
            'mess' => $validator->messages(),
            'message'=>'Edit Failed',
            'status'=>0,               
        ]);
    }
    else{
    $id = $request->route('id');
    $header['name']=$request->header('name');
    $header['email']=$request->header('email');
    $header['token']=$request->header('token');          
    $user=User::where('api_token',$header['token'])->first();
    $email=User::where('email',$header['email'])->first();        
    
    if($user && $email){
        $mytime = Carbon::now()->format('Y-m-d H:i:s');
        $userup = DB::table('users')->where('id', $id)->update(['name' => $name,'email'=>$mail, 'updated_at' => $mytime]);
        if($userup){
        return response()->json([                
            'id' => $id,
            'name' => $name,  
            'email'=> $mail,              
            'now' => $mytime,
            'status'=>1,
            'message' => 'Successfully edited user!'
        ], 200);
        }
        else{
            return response()->json([
                'status'=>0,
                'message'=> 'User allrealy'                   
        ],401);
        }
    }
    else{
        return response()->json([
            'status'=>0,
            'message'=> 'Edit fail'
            
    ],401);
    }
} 
  }
  public function profile(Request $request)
    {       
        $email =$request->header('email');
        $token =$request->header('token');
        $user = User::where('api_token', $token)->first();
        
        if ($user) {
          $mail=User::where('email',$email)->first();
          if($mail){
            return response()->json([
                'user_id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],             
                ], 200);
          }
          else{
            return response()->json([
              'code' => 401,
              'message' => 'Mail or user not found',
          ], 401);
          }
        } else {            
            return response()->json([
                'code' => 401,
                'message' => 'User not found',
            ], 401);
        }
    }

    public function search(Request $request){
      $email =$request->header('email');
      $name =$request->header('name');
      $user=User::where('name','like','%'.$name.'%')->orWhere('email','like','%'.$email.'%')->paginate(6);      
      if($user){
        return response()->json(
          $user->items()
          
        ,200);
      }
      else{
          return response()->json([
              'message'=>'Not user in table'
          ]);
      }
    }
    public function refresh()
    {
    	return response(JWTAuth::getToken(), Response::HTTP_OK);
    }
}
