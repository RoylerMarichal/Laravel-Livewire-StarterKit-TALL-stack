<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'app_name' => config('app.name'),
            'title_one' => __('messages.main_title'),
            'subtitle_one' => __('messages.submain_title'),
        ]);
    }
}
