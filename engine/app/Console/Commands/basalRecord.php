<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Record;
use Illuminate\Console\Command;

class basalRecord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basal:write';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();
        foreach ($users as $user) {
            $basalInsulinDB = $user->basalInsulin
            ->groupBy('period')
            ->map(function ($group) {
                return $group->last();
            });
            $basalInsulin = [];
            foreach($basalInsulinDB as $key => $value) {
                $basalInsulin[$key] = $value;
            }
            if ($user->isAllBasalEntered()) {
                $prevRecord = $user->lastRecord();
                $record = new Record();
                $record->user_id = $user->id;
                $record->datetime = $user->localTime();
                $userHour = $user->localTime()->format('H') != 0 ? $user->localTime()->format('H') : 24;
                $record->basal_insulin = $basalInsulin[$userHour]->value;
                $record->long_chs = 0;
                $record->fast_chs = 0;
                $record->middle_chs = 0;
                $record->bolus_insulin = 0;
                $record->physical_activity_time = 0;
                $record->physical_activity_intensity = 0;
                $record->stress_level = isset($prevRecord) ? $prevRecord->stress_level : 0;
                $record->sleep_time = 0;
                $elapsedTime = isset($prevRecord) ? now()->diffInSeconds($prevRecord->created_at) : 0;
                $record->time_since_cannula_change = isset($prevRecord) ? $prevRecord->time_since_cannula_change + $elapsedTime : 0;
                $record->save();
            }
        }
        return Command::SUCCESS;
    }
}
