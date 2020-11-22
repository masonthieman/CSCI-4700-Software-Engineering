<?php

namespace App\Http\Controllers\Auth;

use Mail;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\PasswordSetRequest;
use App\Mail\PasswordResetRequested;
use App\Models\EmployeeAuth;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Authenticate the given login request
     *
     * @param Illuminate\Http\Request $request
     * @return mixed
     */
    public function authenticate(Request $request)
    {
        $email = $request->input("email");
        $password = $request->input("password");
        if (Auth::attempt(credentials($email, $password))) {
            return redirect()->route("home");
        }
        return back()->with("failed", true);
    }

    /**
     * Log the user out of the current session
     *
     * @return mixed
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route("home");
    }

    /**
     * Send a password reset request
     *
     * @return mixed
     */
    public function requestPasswordReset(PasswordResetRequest $request)
    {
        $employeeAuth = EmployeeAuth::where("email", $request->input("email"))
                                    ->where("is_active", 1)->first();
        if ($employeeAuth) {
            $employee     = $employeeAuth->employee;
            $resetRequest = PasswordReset::createRequest($employee);
            Mail::to($request->input("email"))
                ->queue(new PasswordResetRequested($employee, $resetRequest));
        }
        // PasswordReset::create()
        return back()->with("sent", true);
    }

    /**
     *  Set the new password for the employee
     *
     * @return mixed
     */

    public function setPassword(PasswordSetRequest $request, string $token)
    {
        $resetRequest = PasswordReset::fetch($token);
        if (!$resetRequest || !$resetRequest->employee->auth->is_active)
            return redirect()->route("home");
        $auth = $resetRequest->employee->auth;
        $auth->password = $request->input("password");
        $auth->save();
        $resetRequest->delete();
        return redirect()->route("login");
    }

    /**
     * Login page has been requested
     *
     * @return mixed
     */
    public function index()
    {
        return view("login");
    }

    /**
     * Forgot password page has been requested
     *
     * @return mixed
     */
    public function forgotPassword()
    {
        return view("forgot-password");
    }

    /**
     * The reset password page has been requested
     *
     * @return mixed
     */
    public function resetPassword(string $token)
    {
        $resetRequest = PasswordReset::fetch($token);
        if (!$resetRequest || !$resetRequest->employee->auth->is_active)
            return redirect()->route("home");
        return view("reset-password");
    }
}
