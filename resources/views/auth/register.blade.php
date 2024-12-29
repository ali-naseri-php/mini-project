<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم ثبت‌نام</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-form {
            width: 300px;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .register-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input:focus {
            border-color: #007BFF;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .form-footer {
            text-align: center;
            margin-top: 10px;
        }
        .form-footer a {
            color: #007BFF;
            text-decoration: none;
        }
        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<form class="register-form" action="/register" method="POST">
    @csrf
    <h2>ثبت‌نام</h2>
    <div class="form-group">
        <label for="name">نام کامل:</label>
        <input type="text" id="name" name="name" required value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="email">ایمیل:</label>
        <input type="email" id="email" name="email" required value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="password">رمز عبور:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="password_confirmation">تایید رمز عبور:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>
    <div class="form-group">
        <button type="submit">ثبت‌نام</button>
    </div>
    <div class="form-footer">
        <a href="/login">قبلاً حساب کاربری دارید؟ وارد شوید</a>
    </div>
</form>
</body>
</html>
