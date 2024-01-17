<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Staff;
use App\Models\TblDept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{


    public function showStaffLogin()
    {
        if(session('staff')){
            return redirect()->route('admin');
        }
        return view('auth.stafflogin');
    }

    public function showAdminLogin()
    {
        if(session('admin')){
            if(session('role')== 'admin'){
                return redirect()->route('dashboard');
            }
            elseif(session('role')== 'director'){
                return redirect()->route('directorsHome');
            }
            elseif(session('role')== 'sdm'){
                return redirect()->route('sdmHome');
            }
        }
        return view('auth.admin_login');
    }

    public function authorizeLogin(Request $request)
    {

        $accessToken = $request->accessToken;
        $profile = $this->fetchKcProfile($accessToken)->profile;
//        dd($profile);
        $image =$profile->user->avatar_url;
        $phone = $profile->phone_number;
        $username = $profile->user->username;
        $phone = str_replace('+', '', $phone);

        $verified = Admin::where('username', $username)->first();

        if($verified){
            $verified->kc_token = md5(time(). uniqid());
            $verified->avatar = $image;
            $verified->phone= $phone;
            $verified->save();
            return redirect()->route('admin.login',$verified->kc_token);
        } else {
            return redirect()->route('login')->with('error', 'Record Not Found');
        }

    }

    private function fetchKcProfile($accessToken)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://connect.kingsch.at/api/profile',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $accessToken
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);

    }


    public function successfulLogin($token)
    {
        $admin = Admin::where('kc_token', $token)->firstOrFail();
        $admin->kc_token = null;

        Session::put('admin', $admin);
        Session::put('role', $admin->role()->name);

        // Redirect based on user's role
        switch ($admin->role()->name) {
            case 'admin':
                return redirect('/admin');
                break;

            case 'director':
                return redirect('/director');
                break;

            case 'sdm':
                return redirect('/sdm');
                break;

            case 'hr':
                return redirect('/hr');
                break;

            case 'finance':
                return redirect('/finance');
                break;

            case 'supervisor':
                return redirect('/supervisor');
                break;

            // ... Other role cases ...

            default:
                return redirect('/home');
                break;
            }

    }

    public function logout()
    {
        session()->flush();
        return to_route('login');
    }

    public function verifyKC($phone)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.joinkingschat.com/api/v1/barcode/+' . $phone . '/exists',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true) ?? false;

    }


}
