<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use session;
use App;
class AdminLoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest:admin', ['except' => ['logout']]);
  }

  public function showLoginForm()
  {
    $this->Header();
    return view('auth.admin-login');
  }

  public function login(Request $request)
  {
    $this->Header();
    // Validate the form data
      $this->validate($request, [
      'email'   => 'required|email',
      'password' => 'required|min:6'
    ]);
    // Attempt to log the user in
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
      // if successful, then redirect to their intended location

      return redirect()->intended(route('admin.dashboard'));
    }

    session()->flash('errorlogin' ,'Please  Your Email or password!!!');

    // if unsuccessful, then redirect back to the login with the form data
    return redirect()->back()->withInput($request->only('email', 'remember'));
  }

  public function logout()
  {
    $this->Header();
      Auth::guard('admin')->logout();
      return redirect()->route('admin.login');
  }
   public function Header(){

        $strlanguage=Session('strlanguage')==null?"en":session('strlanguage');
        App::setLocale($strlanguage); 
    }

    public function ChangeLanguage($language)
    {
        Session(['strlanguage' => $language]);
        return Redirect::back();
    }

}
