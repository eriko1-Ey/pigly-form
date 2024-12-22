<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PiGLy - Weight Log</title>
    <link rel="stylesheet" href="{{asset('css/update.css')}}" />
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
            <h2 class="form-title">Weight Log</h2>
            <form action="#" class="weight-form">
                <div class="form-group">
                    <label for="date">日付</label>
                    <input
                        type="date"
                        id="date"
                        class="form-input"
                        value=""
                        placeholder="2024-01-01" />
                </div>
                <div class="form-group">
                    <label for="weight">体重</label>
                    <input
                        type="number"
                        id="weight"
                        class="form-input"
                        value="50.0" />
                    <span>kg</span>
                </div>
                <div class="form-group">
                    <label for="calories">摂取カロリー</label>
                    <input
                        type="number"
                        id="calories"
                        class="form-input"
                        value="1200" />
                    <span>cal</span>
                </div>
                <div class="form-group">
                    <label for="exercise-time">運動時間</label>
                    <input
                        type="time"
                        id="exercise-time"
                        class="form-input"
                        value="00:00" />
                </div>
                <div class="form-group">
                    <label for="exercise-details">運動内容</label>
                    <textarea
                        id="exercise-details"
                        class="form-input"
                        placeholder="運動内容を追加"></textarea>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-gray">戻る</button>
                    <button type="submit" class="btn btn-gradient">
                        更新
                    </button>
                    <button type="button" class="btn btn-danger">
                        削除
                    </button>
                </div>
            </form>
        </section>
    </main>
</body>

</html>