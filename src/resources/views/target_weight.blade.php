<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PiGLy 設定変更</title>
    <link rel="stylesheet" href="{{asset('css/target_weight.css')}}" />
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}" />
</head>

<body>
    <header class="header">
        <h1 class="logo">PiGLy</h1>
        <div class="header-buttons">
            <form action="/wight_logs/goal_setting" method="get">
                @csrf
                <button class="header-btn">目標体重設定</button>
            </form>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="header-btn">ログアウト</button>
            </form>
        </div>
    </header>

    <main class="main-container">
        <section class="form-container">
            <h2 class="form-title">目標体重設定</h2>
            <form action="#" class="weight-form">
                <div class="form-group">
                    <label for="weight">体重</label>
                    <input
                        type="number"
                        id="weight"
                        class="form-input"
                        value="50.0" />
                    <span>kg</span>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-gray">戻る</button>
                    <button type="submit" class="btn btn-gradient">
                        更新
                    </button>
                </div>
            </form>
        </section>
    </main>
</body>

</html>