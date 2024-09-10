<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ActivityLog;
use Carbon\Carbon;

class ActivityLogSeeder extends Seeder
{
    public function run()
    {
        \App\Models\ActivityLog::factory()->count(10)->create();
        ActivityLog::factory()->count(10)->create()->each(function ($log) {
            $log->created_at = Carbon::now('Asia/Jakarta');
            $log->save();
        });
    }
}
