<?php

namespace App\Console\Commands;

use DateTimeZone;
use App\Models\Timezone;
use Nette\Utils\DateTime;
use Illuminate\Console\Command;

class fillTimezones extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fill:timezones';

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
        $timezones = timezone_identifiers_list();
        foreach ($timezones as $timezone) {
            $timezoneORM = new Timezone();
            $timezoneORM->timezone_name = $timezone;
            $dateTime = new DateTime('now', new DateTimeZone($timezone));
            $timezoneORM->offset = $dateTime->getOffset();
            $timezoneORM->save();
        }
        return Command::SUCCESS;
    }
}
