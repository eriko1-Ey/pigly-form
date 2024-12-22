<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PiGLy 初期体重入力</title>
    <link rel="stylesheet" href="{{asset('css/current_weight.css')}}" />
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}" />
</head>

<body>
    <div class="new_form">
        <div class="form_content">
            <h1 class="title">PiGLy</h1>
            <p class="subtitle">新規会員登録</p>
            <p class="step">STEP2 体重データの入力</p>
            <form action="/register/step2" method="post">
                @csrf
                <label for="weight">現在の体重</label>
                <input
                    type="text"
                    id="weight"
                    name="weight"
                    placeholder="現在の体重を入力" />
                <div style="color:red">
                    @error('weight')
                    {{ $message }}
                    @enderror
                </div>

                <label for="target_weight">目標の体重</label>
                <input
                    type="text"
                    id="target_weight"
                    name="target_weight"
                    placeholder="目標の体重を入力" />
                <div style="color:red">
                    @error('target_weight')
                    {{ $message }}
                    @enderror
                </div>

                <button type="submit" class="submit-btn">
                    アカウントを作成
                </button>
            </form>
        </div>
    </div>
</body>

</html>