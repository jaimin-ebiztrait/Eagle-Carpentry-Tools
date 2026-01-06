<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAuthToken;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Http\Request;
use App\Models\OtpVerification;
use Illuminate\Support\Facades\Mail;
use Hash;
use App\Models\Faq;
use App\Models\CmsPages;
use App\Models\ContactUs;
use App\Models\Admin;
use App\Models\UserNotification;
use App\Models\Notifications;
use App\Models\Vistor;


class ApiController extends Controller
{

    public function register(Request $request)
    {
        $rules = array(
            'email'    => 'unique:users,email'
        );
       $validator  = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $detail['code'] = 401;
            $detail['status'] = 'error';
            $detail['message'] = 'This email id is already registered.';
            $detail['data'] = [];
            return response()->json($detail);
        }
        $otpVerifcation = OtpVerification::where('email',$request->email)->first();

            if (!empty($otpVerifcation)){
                if($otpVerifcation->status == 1){
                        $detail['code'] = 401;
                        $detail['status'] = 'error';
                        $detail['message'] = 'Email id is not verified';
                        $detail['data'] = [];
                        return response()->json($detail);
                }else{
                        $user = User::create([
                        'first_name' => @$request->firstName,
                        'last_name' => @$request->lastName,
                        'mobile' => @$request->mobile,
                        'email' => @$request->email,
                        'password' => bcrypt($request->password),
                        'device_token' => @$request->deviceToken,
                        ]);

                        // return $user;

                        if(isset($user->id)){
                            $accessToken = Str::random(64);
                            $token_qry = UserAuthToken::updateOrCreate([
                                'user_id' => $user->id,
                                'email' => $request->email
                            ],
                            [
                                'token' => $accessToken
                            ]);

                            // return $token_qry;
                            if(!isset($token_qry->id)){
                                $detail['code'] = 401;
                                $detail['status'] = 'error';
                                $detail['message'] = 'User token not generated.';
                                $detail['data'] = [];
                                return response()->json($detail);
                            }
                            // $user_detail = User::findOrFail($user);

                            $detail['code'] = 200;
                            $detail['status'] = 'success';
                            $detail['message'] = 'Registration completed';
                            $detail['data'] = array(
                                                'accessToken' => $accessToken,
                                                'userId' => @$user->id,
                                                'firstName' => @$user->first_name,
                                                'lastName' => @$user->last_name,
                                                'mobile' => @$user->mobile,
                                                'email' => @$user->email,
                                                'profile' => @$user->image,
                                            );
                            $del = OtpVerification::where('email', $request->email)->delete();     
                            return response()->json($detail);
                        }
                        else{
                            $detail['code'] = 401;
                            $detail['status'] = 'error';
                            $detail['message'] = 'Error in registering user.';
                            $detail['data'] = [];
                            return response()->json($detail);
                        }
                }
            }else{
                $detail['code'] = 401;
                $detail['status'] = 'error';
                $detail['message'] = 'Kindly register from signup page';
                $detail['data'] = [];
                return response()->json($detail);
            }
    }

    public function sendEmail(Request $request)
    {
        $rules = array(
            'email'    => 'unique:users,email'
        );
       $validator  = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $detail['code'] = 401;
            $detail['status'] = 'error';
            $detail['message'] = 'This email id is already registered';
            return response()->json($detail);
        }

    	$email = $request->email;
        $code = rand(10000, 99999);
            OtpVerification::create([
	            'email' => $email,
	            'code' => $code,
	            'status' => '1'
        	]);

        	Mail::send('emails.verify-user', ['otp' => $code], function ($message) use ($request)
                {
                    $message->from('test@gmail.com', 'help');
                    $message->subject("Account Verification ");
                    $message->to($request->email);
                });  

        	   $detail['code'] = 200;
        	   $detail['status'] = 'success';
        	   $detail['message'] = 'Otp Sent to Email Id Successfully';
        	   return response()->json($detail);
       
    }
      
    public function verifyEmail(Request $request)
    {
        $email = $request->email;
        $code = $request->otp;
    	$otpVerifcation = OtpVerification::where('email', $email)
                        ->orderBy('id', 'DESC')->first();
             	
        if (isset($otpVerifcation->id)) {
		        if($code == $otpVerifcation->code){
		            OtpVerification::whereId($otpVerifcation->id)->update(['status' => '0']);	
		           	$detail['code'] = 200;
		            $detail['status'] = 'success';
		            $detail['message'] = 'Email id verified.';
		            return response()->json($detail);
                }else{
                    $detail['code'] = 401;
		            $detail['status'] = 'error';
		            $detail['message'] = 'Incorrect otp or email id.';
		            return response()->json($detail);
		        }
       	}else{
			$detail['code'] = 401;
            $detail['status'] = 'error';
            $detail['message'] = 'Please follow registration process from beginning.';
            return response()->json($detail);
       	}
       
    }

    public function login(Request $request)
    {
        $email = $request->email;
    	$user = User::where('email',$email)->first();
        	if (isset($user->id)){
				if ($user->is_active == 1) {
					$detail['code'] = 401;
	                $detail['status'] = 'error';
	                $detail['message'] = 'This user is blocked. Please contact Admin.';
	                return response()->json($detail);
           		}
			    

                if (Hash::check($request->password, $user->password)){

		           $user_id = $user->id;
				   $accessToken = Str::random(64);
		            UserAuthToken::updateOrCreate([
		                  'user_id' => $user_id,
                          'email' => $request->email
                        ],
		                [
							'token' => $accessToken
		                ]);

					    if (!empty($user->image)) {
			                $image = asset($user->path . '/' . $user->image);
			            } else {
			               $image = "";
			            }

			            $detail['code'] = 200;
					    $detail['status'] = 'success';
					    $detail['message'] = 'Login successfully';
					    $detail['data'] = array(
					                    'accessToken' => @$accessToken,
					                    'userId' => @$user_id,
					                    'firstName' => @$user->first_name,
					                    'lastName' => $user->last_name,
					                    'mobile' => @$user->mobile,
					                    'email' => @$user->email,
					                    'profile' => @$image,
					                    'deviceToken' => @$user->device_token,
					                    );
						return response()->json($detail);
           		}else{
						$detail['code'] = 401;
	                	$detail['status'] = 'error';
	               	    $detail['message'] = 'Invalid login credentials.';
                        $detail['data'] = "";
	                    return response()->json($detail);

           		}

        	}else{
				$detail['code'] = 401;
	            $detail['status'] = 'error';
	            $detail['message'] = 'Invalid login credentials';
	            return response()->json($detail);
	       }
        
    }

    public function getProfile(Request $request)
    {
        $user_id = $request->userId;
        $token = $request->header('token');
        
        $authcheck = $this->AuthCheck($token, $user_id);

        if(!empty($authcheck)){
            $authcheck['data'] = [];
            return response()->json($authcheck);
        }
            // else {

                $user_data = User::where('id', $user_id)->first();
                
                if (!empty($user_data)) {
                    if (empty($user_data->image)){
                        $profile_image = "";
                    }
                    else{
                        $profile_image = asset($user_data->path . '/' . $user_data->image);
                    }

                    $detail['code'] = 200;
                    $detail['status'] = 'success';
                    $detail['message'] = 'Profile fetched successfully';
                    $detail['data'] = array(
                        'userId' => $user_data->id,
                        'fullName' => @$user_data->first_name . ' ' . $user_data->last_name,
                        'emailId' => @$user_data->email,
                        'mobile' => @$user_data->mobile,
                        'profilePic' => @$profile_image,
                        'deviceToken' => @$user_data->device_token,
                        );
                    return response()->json($detail);
                }else{
                    $detail['code'] = 401;
                    $detail['status'] = 'error';
                    $detail['message'] = 'No record found';
                    $detail['data'] = "";
                    return response()->json($detail);
                }
            // }
      
    }

    public function editProfile(Request $request)
    {
        $user_id = $request->userId;
        $token =$request->header('token'); 
        
        $authcheck = $this->AuthCheck($token, $user_id);

        if(!empty($authcheck)){
            $authcheck['data'] = [];
            return response()->json($authcheck);
        }
            // else{
                // if (!empty($request->profile)) {
                //         $path = "public/uploads/user_profile";
                //         $fielname = time() . '_' . $request->file('profile')->getClientOriginalName();
                //         $file = $request->file('profile');
                //         $file->move($path, $fielname);
                    
                // }else{
                //         $check_image  = User::whereId($user_id)->first();
                //         $fielname = $check_image->image;
                //         $path = $check_image->path;
                       
                // }
                if ($request->hasFile('profile')) {
                    $path = "uploads/user_profile";
                    $filename = time() . '_' . $request->file('profile')->getClientOriginalName();
                    $file = $request->file('profile');
                    $file->move($path, $filename);

                    User::where('id', $user_id)->update([
                        'image' => $filename,
                        'path' => $path
                    ]);
                }
                    $data = User::where('id', $user_id)
                    ->update([
                        'first_name' => @$request->firstName,
                        'last_name' => @$request->lastName,
                        'mobile' => @$request->mobile,
                        // 'image' => @$filename,
                        // 'path' => @$path
                    ]);

                    $user_data = User::whereId($user_id)->first();
                    $detail['code'] = 200;
                    $detail['status'] = 'success';
                    $detail['message'] = 'User profile updated successfully';
                    $detail['data'] = array(
                            // 'fullName' => @$user_data->first_name . ' ' . $user_data->last_name,
                            // 'mobile' => @$user_data->mobile,
                            // 'image' =>@$user_data->image == "" ? "" : asset($user_data->path . "/" . $user_data->image),
                            'userId' => $user_data->id,
                            'fullName' => @$user_data->first_name . ' ' . $user_data->last_name,
                            'emailId' => @$user_data->email,
                            'mobile' => @$user_data->mobile,
                            'profilePic' => @$profile_image,
                            'deviceToken' => @$user_data->device_token,
                        );
                    return response()->json($detail);
            // }
    }

    public function changePassword(Request $request)
    {
        $user_id = $request->userId;
        $token = $request->header('token');
        $old = $request->old_password;
        $new = $request->new_password;
        
        $authcheck = $this->AuthCheck($token, $user_id);

        if(!empty($authcheck)){
            return response()->json($authcheck);
        }
            // else{
                    $pasword = User::whereId($user_id)->value('password');

                    if (Hash::check($old, $pasword)) {
                        $user_details = User::whereId($user_id)
                            ->update(['password' => bcrypt($new)]);
                        $detail['code'] = 200;
                        $detail['status'] = 'success';
                        $detail['message'] = 'Password changed successfully';
                        return response()->json($detail);
                    }else{

                        $detail['code'] = 401;
                        $detail['status'] = 'error';
                        $detail['message'] = 'Old password does not match';
                        return response()->json($detail);
                    }
            // }
    }

    public function forgotPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
            if(isset($user->id)) {
                $otp = rand(100000, 999999);
                $token_user =  User::where('id',$user->id)->update(['remember_token' => $otp]);
                $to_email = $request->email;
                $name = $user->first_name.''.$user->last_name;
                Mail::send('emails.reset-password',['name'=>$name,'otp' =>$otp], function ($message) use ($request)
                {
                    $message->from('test@gmail.com', 'help');
                    $message->subject("Reset Password Mail");
                    $message->to($request->email);
                });
                $detail['code'] = 200;
                $detail['status'] = 'success';
                $detail['message'] = 'Otp has been sent to register email.';
                return response()->json($detail);
            }else{

                $detail['code'] = 401;
                $detail['status'] = 'error';
                $detail['message'] = 'This email does not exists';
                return response()->json($detail);
            }

    }

    public function changeForgetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->where('remember_token',$request->otp)->first();
            if (!empty($user)) {
                          
                $update_qry = User::whereId($user->id)->update([
                                    'remember_token' => null,
                                    'password' =>bcrypt($request->password),
                                    ]);
                if($update_qry > 0){
                    $detail['code'] = 200;
                    $detail['status'] = 'success';
                    $detail['message'] = 'New password set successfully';
                    // $detail['data'] = $user->id;
                    return response()->json($detail);
                }
                else{
                    $detail['code'] = 401;
                    $detail['status'] = 'error';
                    $detail['message'] = 'New password not saved.';
                    // $detail['data'] = [];
                    return response()->json($detail);
                }
                    
            }else{
                    $detail['code'] = 401;
                    $detail['status'] = 'error';
                    $detail['message'] = 'Incorrect otp';
                    // $detail['data'] = [];
                    return response()->json($detail);
                }
    }

    public function faqList(Request $request)
    {
        $user_id = $request->userId;
        $token = $request->header('token');
        
        $authcheck = $this->AuthCheck($token, $user_id);

        if(!empty($authcheck)){
            $authcheck['data'] = [];
            return response()->json($authcheck);
        }
        else{
                $list = Faq::whereNull('deleted_at')->orderBy('question', 'ASC')
                        ->select('id', 'question', 'answer')
                        ->get();

                $detail['code'] = 200;
                $detail['status'] = 'success';
                $detail['message'] = 'Faq list get successfully';
                $detail['data'] =  $list;
                return response()->json($detail);
            }       

    }

    public function addContact(Request $request)
    {

        $user_id = $request->userId;
        $token = $request->header('token');
        
        $authcheck = $this->AuthCheck($token, $user_id);

        if(!empty($authcheck)){
            return response()->json($authcheck);
        }

        // else{
                    $contact_us = ContactUs::create([
                        'user_id' => @$user_id,
                        'full_name' => @$request->fullName,
                        'email' => @$request->email,
                        'mobile' => @$request->mobile,
                        'subject' => @$request->subject,
                        'message' => @$request->message
                    ]);

                    $detail['code'] = 200;
                    $detail['status'] = 'success';
                    $detail['message'] = 'We have received you communication and will cotact you soon.';
                    return response()->json($detail);
        //}       
    }  

    public function cmsPage(Request $request){

        $user_id = $request->userId;
        $token = $request->header('token');
       
        $authcheck = $this->AuthCheck($token, $user_id);

        if(!empty($authcheck)){
            return response()->json($authcheck);
        }

        // else{
            $pages = CmsPages::where('page_title','LIKE', '%'.$request->title.'%')->first();
                if (!empty($pages)) {
                        $data = array(
                                "pageTitle"=> $pages->page_title,
                                "detail"=>  $pages->content,
                        );
                        $detail['code'] = 200;
                        $detail['status'] = "success";
                        $detail['message'] = 'Page fetched successfully';
                        $detail['data'] =  @$data;
                        return response()->json($detail);
                }else{
                        $detail['code'] = 401;
                        $detail['status'] = "error";
                        $detail['message'] = 'No data found';
                        $detail['data'] = [];
                        return response()->json($detail);
                    }
        // }       
       
    }

    public function sendNotification(Request $request)
    {
        $user_id = $request->userId;
        $token = $request->header('token');
       
        $authcheck = $this->AuthCheck($token, $user_id);

        if(!empty($authcheck)){
            return response()->json($authcheck);
        }

        // else{
                
                $device_token = User::where('id','!=',$user_id)->whereNotNull('device_token')->pluck('device_token');
               
                $SERVER_API_KEY = 'AAAAIOoGEIQ:APA91bHAGfre5kz_4zlPcxYOHeka0zoeDhNUVkeNZf39hH-sR27ce9nnpydqoC5xDIgfVybtuZeR2S1XyaFHdKJLZq_1YhugudjMppZVCTL7iCSuW39jG4-aJS0quSbpg4lFbFJ3fgGb';
                $data = [
                        "registration_ids" => $device_token, // for multiple device ids
                        "notification" => [
                            "title" => $request->title,
                            "body" => $request->body,
                        ]
                       
                    ];


                $dataString = json_encode($data);

                    $headers = [
                        'Authorization: key=' . $SERVER_API_KEY,
                        'Content-Type: application/json',
                    ];

                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

                    $response = curl_exec($ch);
                    curl_close($ch);

                    $detail['code'] = 200;
                    $detail['status'] = "success";
                    $detail['message'] = 'Notification sent successfully';
                    // $detail['data'] = @$response;
                    return response()->json($detail);
        //}       
                
    }  

    public function getNotificationList(Request $request)
    {
        $user_id = $request->userId;
        $token = $request->header('token');
        $authcheck = $this->AuthCheck($token, $user_id);

        if(!empty($authcheck)){
            return response()->json($authcheck);
        }
            $list = UserNotification::join('notifications','notifications.id','=','user_notifications.notif_id')
            ->where('user_notifications.user_id',$user_id)
            ->where('seen', 0)
            ->select('user_notifications.id as userNotifId', 'notifications.title', 'notifications.message', 'notifications.created_at as notificationDate' )
            ->get();

                if (count($list) > 0){  

                        $detail['code'] = 200;
                        $detail['status'] = 'success';
                        $detail['message'] = 'Notifications list get successfully';
                        $detail['data'] =  $list;
                        return response()->json($detail);
                }else{
                        $detail['code'] = 401;
                        $detail['status'] = "error";
                        $detail['message'] = 'No data found';
                        $detail['data'] = [];
                        return response()->json($detail);
                }
    }



    public function notifSeen(Request $request){
        // mark all unread notifications as read by user.
        // return $request->header('token');
        $user_id = $request->userId;
        $token = $request->header('token');
        $authcheck = $this->AuthCheck($token, $user_id);
        // return $authcheck;
        if(!empty($authcheck)){
            return response()->json($authcheck);
        }

        $check_notif = UserNotification::where('user_id', $user_id)->where('seen', 0)->count();

        if($check_notif <= 0){
            $detail['code'] = 401;
            $detail['status'] = "error";
            $detail['message'] = 'No notifications found to be cleared.';
            return response()->json($detail);
        }

        $mark_read = UserNotification::where('user_id', $user_id)->where('seen', 0)
                    ->update([
                        'seen' => 1,
                    ]);
        if($mark_read){
            $detail['code'] = 200;
            $detail['status'] = "success";
            $detail['message'] = 'Notifications cleared successfully.';
            return response()->json($detail);
        }
        else{
            $detail['code'] = 401;
            $detail['status'] = "error";
            $detail['message'] = 'Notifications not cleared.';
            return response()->json($detail);
        }
    } 

    public function vistor(Request $request){
        //dd($request);
        $user_id = $request->userId;
        $token = $request->header('token');
        $authcheck = $this->AuthCheck($token, $user_id);
        
        if(!empty($authcheck)){
            return response()->json($authcheck);
        }

        Vistor::create([
                        'user_id' => @$user_id,
                        'page_name' => @$request->pageName,
                        'count' => @$request->count,
                        'current_date' => @$request->date,
                        
                        ]);
        $detail['code'] = 200;
        $detail['status'] = "success";
        $detail['message'] = 'Vistor save successfully.';
        return response()->json($detail);


    }

    public function authCheck($token, $user_id){
        $resp = array();
        $is_active = User::whereId($user_id)->value('is_active');
        if($is_active == '1') {
            $detail['code'] = 401;
            $detail['status'] = 'error';
            $detail['message'] = 'This user account is blocked. Please contact Admin.';
            return $detail;
        }
        if (empty($token)) {
            $detail['code'] = 401;
            $detail['status'] = 'error';
            $detail['message'] = 'Unauthorized! Access denied.';
            return $detail;
        }
        $access_token = UserAuthToken::where('user_id', $user_id)->value('token');
        if ($token != $access_token) {
            $detail['code'] = 401;
            $detail['status'] = 'error';
            $detail['message'] = 'Invalid token or token expired';
            return $detail;
        }
        return array_filter($resp);
    }

    
}
