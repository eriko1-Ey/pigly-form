<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PiGLy ログイン</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}" />
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}" />
</head>

<body>
    <div class="login_form">
        <div class="form_content">
            <h1 class="title">PiGLy</h1>
            <p class="subtitle">ログイン</p>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <label for="email">メールアドレス</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="メールを入力" />
                <div style="color:red">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>

                <label for="password">パスワード</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="パスワードを入力" />
                <div style="color:red">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>

                <button type="submit" class="submit-btn">ログイン</button>
            </form>
            <a href="/register/step1" class="login-link">アカウント作成はこちら</a>
        </div>
    </div>
</body>

</html>