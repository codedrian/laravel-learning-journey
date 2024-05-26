<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        } else {
            $betRisk = $request->input('bet');
            $money = session('money');

            if ($betRisk === 'low') {
                $lowBetPrize = rand(-25, 100);
                $currentMoney = $money + $lowBetPrize;
                session(['money' => $currentMoney]);
            } elseif ($betRisk === 'moderate') {
                $moderateBetPrize = rand(-100, 100);
            } elseif ($betRisk === 'high') {
                $highBetPrize = rand(-500, 2500);
            } elseif ($betRisk === 'severe') {
                $severeBetPrize = rand(-3000, 5000);
            }
                return response()->json($money);
        }
    }
}
