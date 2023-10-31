<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\HrHead;
use App\Models\Seeker;
use App\Models\Supervisor;
use App\Models\TblUser;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showStaffLogin()
    {
        $data['page_title'] = 'Staff Login';
       return view('auth.stafflogin',$data);
    }

    public function staffLogin(Request $request){


        $request -> validate([
            "portal_id" => "required",
            "password" => "required",
        ]);


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://mobileapizx.blwstaffportal.org/apiauth/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('portalID' => $request->portal_id,'password' => $request->password,'apiKey' => '12RT5HWI9Y00FFG3'),
            CURLOPT_HTTPHEADER => array(
                'Cookie: ci_session=j3l2n28upmiers3l4mh53t2sort26imc'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $resp = json_decode($response);

        if($resp->status){

            $check_portal = Admin::where("blw_portal_id",$request->portal_id)->first();
            $check_email = Admin::where("email",$resp->user->emailAddress)->first();


            if(!empty($check_email)){
                $hr = HrHead::where('seeker_id',$check_email->m_id)->count();

                if($hr == 1){
                    Admin::updateOrCreate(['id' => $check_email->id], [
                        'role_id' => 7,

                    ]);
                }

                $supervisor = Supervisor::where('seeker_id',$check_email->m_id)->count();
                // dd($supervisor);
                if($supervisor == 1){
                    Admin::updateOrCreate(['id' => $check_email->id], [
                        'role_id' => 8,

                    ]);
                }

                if(\Auth::attempt(array('email' => $resp->user->emailAddress, 'password' => $request->password))){
                    $request = Auth::user();
                    return   redirect()->intended('/');
                }

            }

            if(!empty($check_portal)){

                $hr = HrHead::where('seeker_id',$check_portal->mSupervisor_id)->count();

                if($hr == 1){
                    Admin::updateOrCreate(['id' => $check_portal->id], [
                        'role_id' => 6,

                    ]);
                }

                $supervisor = Supervisor::where('seeker_id',$check_portal->m_id)->count();

                if($supervisor == 1){
                    Admin::updateOrCreate(['id' => $check_portal->id], [
                        'role_id' => 8,

                    ]);
                    dd(Auth::user()->role_id);
                }


                if(\Auth::attempt(array('email' => $resp->user->emailAddress, 'password' => $request->password))){
                    $request = Auth::user();
                    return   redirect()->intended('/');

                }

            }else{
                $name = trim($resp->user->title). ' '.trim($resp->user->firstName).' '.trim($resp->user->lastName);
                $check_portal = Seeker::where("blw_portal_id",$request->portal_id)->first();
                $portalmsnc = TblUser::where("portal_id",$request->portal_id)->first();

                if(!empty($check_portal)) {

                    $codeAcct = "AMDL";
                    $user =Admin::create([
                        'name' => $name,
                        'role_id' => '2',
                        'email' => strtolower($resp->user->emailAddress),
                        'blw_portal_id' => $resp->user->portalID,
                        'password' => Hash::make($request->password),
                        'ministry'=> $codeAcct,
                        'm_id' => $check_portal->id,
                        'avatar' => $resp->user->picturePath,
                    ]);
                    $hr = HrHead::where('seeker_id',$check_portal->m_id)->count();
                    //dd(Auth::user()->role_id);
                    if($hr == 1){
                        Admin::updateOrCreate(['id' => $user->id], [
                            'role_id' => 6,

                        ]);
                    }

                    $supervisor = Supervisor::where('seeker_id',$check_portal->m_id)->count();
                    //dd(Auth::user()->role_id);
                    if($supervisor == 1){
                        Admin::updateOrCreate(['id' => $user->id], [
                            'role_id' => 9,

                        ]);
                    }

                    if (\Auth::attempt(array('email' => $resp->user->emailAddress, 'password' => $request->password))) {
                        $request = Auth::user();
                        return redirect()->intended('/');


                    }
                }

                if(!empty($portalmsnc)) {
                    $codeAcct = "MSNC";
                    Admin::create([
                        'name' => $name,
                        'role_id' => '2',
                        'email' => strtolower($resp->user->emailAddress),
                        'blw_portal_id' => $resp->user->portalID,
                        'password' => Hash::make($request->password),
                        'ministry'=> $codeAcct,
                        'm_id' => $portalmsnc->userID,
                        'avatar' => $resp->user->picturePath,
                    ]);

                    if (\Auth::attempt(array('email' => $resp->user->emailAddress, 'password' => $request->password))) {
                        $request = Auth::user();
                        return redirect()->intended('/');

                    }
                }

            }

        }else{
            return redirect()->back()->with("message",$resp->message) ->with("type","danger");
        }

    }
}
