<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{


    // پردازش فرم ثبت‌نام
    public function register(Request $request)
    {
        // اعتبارسنجی اطلاعات وارد شده
        $validated = $request->validate([
                                            'name' => 'required|string|max:255',
                                            'email' => 'required|email|unique:users,email',
                                            'password' => 'required|string|min:6|confirmed',
                                        ]);

        // ساخت کاربر جدید
        $user = User::create([
                                 'name' => $validated['name'],
                                 'email' => $validated['email'],
                                 'password' => Hash::make($validated['password']),
                             ]);

        // ورود خودکار کاربر بعد از ثبت‌نام
        Auth::login($user);

        // هدایت به صفحه داشبورد یا صفحه اصلی
        return redirect('/')->with('success', 'ثبت نام با موفقیت انجام شد!');
    }
    // پردازش اطلاعات لاگین
    public function login(Request $request)
    {
        // اعتبارسنجی اطلاعات
        $request->validate([
                               'email' => 'required|email',
                               'password' => 'required',
                           ]);

        // تلاش برای ورود
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // ورود موفقیت‌آمیز
            return redirect()->intended('/dashboard')->with('success', 'با موفقیت وارد شدید!');
        }

        // ورود ناموفق
        return back()->withErrors([
                                      'email' => 'اطلاعات وارد شده صحیح نمی‌باشد.',
                                  ])->withInput($request->only('email'));
    }

    // خروج کاربر
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'شما با موفقیت خارج شدید!');
    }
}
