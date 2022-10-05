<?php

namespace Database\Seeders;

use App\Models\WebsiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteSetting::create([
            'site_name' => 'Laravel Blog',
            'site_logo' => 'frontend/images/logo.png',
            'site_subscribe_text' => 'Lorem ipsum dolor sit coectetur elit. Tincidu nfywjt leo mi, urna. Arcu ve isus, condimentum ut vulpate cursus por.',
            'site_contact_email' => 'abiruzzaman.molla@gmail.com',
            'site_image_bio' => 'frontend/images/logo.png',
            'site_short_bio' => 'Lorem ipsum dolor sit coectetur adiing elit. Tincidunfywjt leo mi, viearra urna. Arcu ve isus, condimentum ut vulpate cursus por turpis.',
            'site_long_bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'site_social_link_facebook' => 'https://www.facebook.com/abiruzzaman.molla/',
            'site_social_link_twitter' => 'https://twitter.com/asliabir',
            'site_social_link_instagram' => 'https://www.instagram.com/abiruzzaman.molla/',
            'site_social_link_linkedin' => 'https://www.linkedin.com/in/asliabir/'
        ]);
    }
}
