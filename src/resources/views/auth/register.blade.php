<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PiGLy 新規会員登録</title>
    <link rel="stylesheet" href="{{asset('css/register.css')}}" />
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}" />
</head>

<body>
    <div class="register_form">
        <div class="form_content">
            <h1 class="title">PiGLy</h1>
            <p class="subtitle">新規会員登録</p>
            <p class="step">STEP1 アカウント情報の登録</p>
            <form action="/register/step1" method="post">
                @csrf
                <label for="name">お名前</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="名前を入力" />
                <div style="color:red">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>

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

                <button type="submit" class="submit-btn">次に進む</button>
            </form>
            <a href="/login" class="login-link">ログインはこちら</a>
        </div>
    </div>
</body>

</html>