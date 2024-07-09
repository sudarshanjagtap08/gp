<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Userloginhistory;
use Illuminate\Http\Request;
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
    public function getStatus()
    {
        $user = Auth::user();
        if ($user && $user->status == 1) {
            return 1;
        }
        return 0;
    }
    
    public function login(Request $request)
    {
        @date_default_timezone_set("Asia/Calcutta");
        $last_login_date_time = now();
        
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->status == 1) {
                $user->last_login_ip = $request->ip();
                $user->last_login_details = $this->getUserAgentDetails($request->header('User-Agent'));
                $user->last_login_date_time = $last_login_date_time;
                $user->update();
                $userloginhistory = new Userloginhistory;
                $userloginhistory->user_id = Auth::user()->id;
                $userloginhistory->last_login_ip = $request->ip();
                $userloginhistory->last_login_details = $this->getUserAgentDetails($request->header('User-Agent'));
                $userloginhistory->last_login_date_time = $last_login_date_time;
                $userloginhistory->save();
                return redirect()->intended('home');
            } else {
                Auth::logout(); 
                  return redirect()->back()->with('danger', 'User has been deactivated.');
            }
        }
    
        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
    }



    private function getUserAgentDetails($userAgent)
    {
        return $userAgent;
    }
   
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
}
