<?php

namespace App\Http\Controllers;

use App\Models\BasalInsulin;
use Illuminate\Http\Request;

class dataController extends Controller
{
    public function getBasal() {
        $basalInsulinDB = auth()->user()->basalInsulin
            ->groupBy('period')
            ->map(function ($group) {
                return $group->last();
            });
        $basalInsulin = [];
        foreach($basalInsulinDB as $key => $value) {
            $basalInsulin[$key] = $value;
        }
        return $basalInsulin;
    }
    public function basal() {
        $basalInsulin = $this->getBasal();
        return view('input.basal_insulin', compact('basalInsulin'));
    }
    public function basalPost(Request $request) {
        foreach(range(1, 24) as $key => $value) {
            $oldBasal = $this->getBasal();
            if (!isset($oldBasal[$key + 1]) || $oldBasal[$key + 1]->value != $request['basal'.($key + 1)]) {
                $currentBasal = new BasalInsulin();
                $currentBasal->user_id = auth()->user()->id;
                $currentBasal->period = $key + 1;
                $currentBasal->value = $request['basal'.($key + 1)];
                $currentBasal->save();
            }
        }
        $basalInsulin = $this->getBasal();
        return view('input.basal_insulin', compact('basalInsulin'));
    }
    public function record() {
        $basalInsulin = $this->getBasal();
        if (count($basalInsulin) != 24) {
            return redirect()->route('profile.basal');
        }
        $formattedLocalTime = auth()->user()->formattedLocalTime();
        return view('input.record', ['basalInsulin' => $basalInsulin, 'userLocalTime' => $formattedLocalTime]);
    }
    public function recordPost(Request $request) {
        $record = new Record();
        $record->datetime = $request->datetime;
        $record->long_chs = $request->long_chs;
        $record->middle_chs = $request->middle_chs;
        $record->fast_chs = $request->fast_chs;
        $record->bolus_insulin = $request->bolus_insulin;
        $record->physical_activity_time = $request->physical_activity_time;
        $record->physical_activity_intensity = $request->physical_activity_intensity;
        $record->stress_level = $request->stress_level;
        $record->sleep_time = $request->sleep_time;
        if (isset($request->time_since_cannula_change)) {
            $record->time_since_cannula_change = 5;
        }
        else {

        }
        $record->comment = $request->comment;
        $record->user_id = auth()->user()->id;
        $record->save();
        return view('input.record');
    }
}
