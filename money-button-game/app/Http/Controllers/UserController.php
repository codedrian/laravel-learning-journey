<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function showHome()
    {
        return view('home');
    }
    public function processBet(Request $request)
    {
        if (!$request->session()->has('money')) {
            session(['money' => 500]);
        }
            $betRisk = $request->input('bet');
            $money = session('money');
            $prize = 0;

            if ($betRisk === 'low') {
                $prize = rand(-25, 100);
            } elseif ($betRisk === 'moderate') {
                $prize = rand(-100, 100);
            } elseif ($betRisk === 'high') {
                $prize = rand(-500, 2500);
            } elseif ($betRisk === 'severe') {
                $prize = rand(-3000, 5000);
            }
            $totalMoney = $money + $prize;
            session(['money' => $totalMoney]);
            $submitted_at = Carbon::now('Asia/Manila')->format('l, F jS Y \a\t g:i A');

            $betResults = [
                'currentMoney' => session('money'),
                'prize' => $prize,
                'betRisk' => $betRisk,
                'submitted_at' => $submitted_at
            ];
            if ($request->session()->missing('bet_history')) {
                $request->session()->put('bet_history', []);
            }
            $request->session()->push('bet_history', $betResults);
            $betHistory = $request->session()->get('bet_history');

        return response()->json([
            'betResults' => $betResults,
            'betHistory' => $betHistory
        ]);
    }

    public function destroyBet(Request $request)
    {
        $request->session()->flush();
        return redirect()->back();
    }
}
