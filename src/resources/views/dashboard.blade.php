<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PiGLy - ダッシュボード</title>
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}" />
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}" />
    <style>
        /* モーダルのスタイル */
        .modal {
            display: none;
            /* 初期状態は非表示 */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            text-align: center;
        }

        .modal-close {
            background: red;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    @if(Auth::check())
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
        <section class="stats">
            <div class="stat-box">
                <p>目標体重</p>
                <h2>{{ $weightTarget->target_weight ?? '未設定' }} <span>kg</span></h2>
            </div>
            <div class="stat-box">
                <p>目標まで</p>
                @if ($latestWeightLog)
                <h2>{{ $weightTarget ? $weightTarget->target_weight - $latestWeightLog->weight : '未計算' }}<span>kg</span></h2>
                @else
                <h2>未登録</h2>
                @endif
            </div>
            <div class="stat-box">
                <p>最新体重</p>
                <h2>{{ $latestWeightLog->weight ?? '未登録' }} <span>kg</span></h2>
            </div>
        </section>

        <section class="data-section">
            <div class="data-controls">
                <input
                    type="date"
                    class="date-input"
                    placeholder="年/月/日" />
                <span>~</span>
                <input
                    type="date"
                    class="date-input"
                    placeholder="年/月/日" />
                <button class="search-btn">検索</button>
                <button class="add-btn" id="open-modal-btn">データ追加</button> <!-- IDを追加 -->
            </div>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>日付</th>
                        <th>体重</th>
                        <th>食事摂取カロリー</th>
                        <th>運動時間</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2023/11/26</td>
                        <td>46.5kg</td>
                        <td>1200cal</td>
                        <td>00:15</td>
                        <form action="/weight_logs/{weightLog_id}/update" method="get">
                            @csrf
                            <td><button class="edit-btn">✏️</button></td>
                        </form>

                    </tr>
                    <!-- 他の行を追加 -->
                </tbody>
            </table>

            <div class="pagination">
                <button class="page-btn">&lt;</button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn">&gt;</button>
            </div>
        </section>
    </main>

    <!-- モーダルのHTML -->
    <div class="modal" id="data-modal">
        <div class="modal-content">
            <h2>データを追加</h2>
            <form action="/weight_logs/store" method="POST">
                @csrf
                <label for="date">日付</label>
                <input type="date" id="date" name="date" required>
                <br>
                <label for="weight">体重 (kg)</label>
                <input type="number" step="0.1" id="weight" name="weight" required>
                <br>
                <label for="calories">摂取カロリー (kcal)</label>
                <input type="number" id="calories" name="calories" required>
                <br>
                <label for="exercise_time">運動時間 (hh:mm)</label>
                <input type="time" id="exercise_time" name="exercise_time" required>
                <br>
                <button type="submit">登録</button>
                <button type="button" class="modal-close" id="close-modal-btn">閉じる</button>
            </form>
        </div>
    </div>
    @endif

    <script>
        // モーダルを開閉するJavaScript
        const openModalBtn = document.getElementById('open-modal-btn');
        const closeModalBtn = document.getElementById('close-modal-btn');
        const modal = document.getElementById('data-modal');

        // モーダルを表示
        openModalBtn.addEventListener('click', () => {
            modal.style.display = 'flex';
        });

        // モーダルを閉じる
        closeModalBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });
    </script>
</body>

</html>