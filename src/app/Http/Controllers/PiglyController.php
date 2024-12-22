<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\CurrentWeightRequest;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PiglyController extends Controller
{
    //トップページ画面表示
    public function index()
    {
        // 現在のログインユーザーを取得
        $user = Auth::user();

        $weightTarget = $user->weightTarget;

        $latestWeightLog = $user->weightLogs()->latest('date')->first();

        $weightLogs = $user->weightLogs()->orderBy('date', 'desc')->get();


        // ユーザー情報をビューに渡す
        return view('dashboard', compact('user', 'weightTarget', 'latestWeightLog', 'weightLogs'));
    }

    //ログインのアカウントはこちらボタンで、新規アカウント登録画面に遷移
    public function getRegister()
    {
        return view('auth.register');
    }

    //ログインのログインボタンで、dashboardに遷移
    public function postLogin(LoginRequest $request)
    {

        if (Auth::attempt($request->only('email', 'password'))) {
            // セッションを再生成してセッション固定攻撃を防ぐ
            session()->regenerate();
            // ダッシュボードにリダイレクト
            return view('dashboard');
        }

        return back()->withErrors([
            'email' => 'ログイン情報が正しくありません。',
        ]);
    }


    //step1のログインはこちらボタンで、ログイン画面に遷移
    public function getLogin()
    {
        return view('auth.login');
    }

    //step1の次に進むボタンで、新規体重登録画面に遷移
    public function postRegister(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 自動ログイン
        Auth::login($user);
        session()->regenerate();
        return view('auth.current_weight');
    }

    //Step2のアカウント作成ボタンで、dashboardに遷移
    public function CurrentWeight(CurrentWeightRequest $request)
    {
        // 現在のユーザー（前のステップで登録されたユーザー）
        $user = User::find(auth()->id()); // 認証されたユーザーを取得

        // 目標体重を保存
        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $request->target_weight,
        ]);

        // 現在の体重を保存
        WeightLog::create([
            'user_id' => $user->id,
            'date' => now(), // 現在の日付を登録
            'weight' => $request->weight,
            'calories' => 0, // 初期値（任意で変更可能）
            'exercise_time' => '00:00:00', // 初期値（任意で変更可能）
            'exercise_content' => '', // 初期値（任意で変更可能）
        ]);

        // 管理画面にリダイレクト
        return redirect('dashboard');
    }

    //全てのフォームのログアウトボタンで、ログイン画面に遷移
    public function logout(Request $request)
    {
        // ユーザーをログアウト
        Auth::logout();

        // セッションを無効化
        $request->session()->invalidate();

        // セッションのCSRFトークンを再生成
        $request->session()->regenerateToken();

        // ログインページへリダイレクト
        return redirect('/login');
    }

    //全てのフォームの目標設定ボタンで、目標設定画面に遷移
    public function getSettingWeight()
    {
        return view('target_weight');
    }

    //dashboardのえんぴつボタンで、情報更新画面に遷移
    public function getUpdateData()
    {
        return view('update');
    }
    //dashboardの追加ボタンで、追加画面に遷移（モーダル）
}
