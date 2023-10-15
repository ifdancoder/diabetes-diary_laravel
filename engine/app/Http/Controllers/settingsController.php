<?php

namespace App\Http\Controllers;

use App\Models\Timezone;
use Illuminate\Http\Request;

class settingsController extends Controller
{
    public function settings() {
        $timezones = Timezone::all();
        return view('profile.settings', ['title' => 'Настройки', 'timezones' => $timezones]);
    }
    public function settingsPost(Request $request) {
        $user = auth()->user();
        $user->timezone_id = $request->timezone;
        $user->save();
        return redirect()->route('profile.settings');
    }
}
