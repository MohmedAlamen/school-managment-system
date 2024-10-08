<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // إذا تم تسجيل الدخول بنجاح، يمكنك إعادة توجيه المستخدم
            return redirect()->intended('home'); // يمكنك تغيير 'home' إلى الصفحة التي تريد إعادة توجيه المستخدم إليها
        }

        // إذا كانت معلومات الاعتماد غير صحيحة، ارجع إلى نموذج تسجيل الدخول مع رسالة خطأ
        return back()->withErrors([
            'email' => 'معلومات الاعتماد غير صحيحة.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login'); // إعادة توجيه إلى صفحة تسجيل الدخول بعد تسجيل الخروج
    }
}
