<?php

namespace Database\Seeders;

use App\Models\ShareSnippet;
use Illuminate\Database\Seeder;

class ShareSnippetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shareSnippets = [
            [
                'html_code' => '<div class="sharethis-inline-share-buttons"></div>',
                'script_code' => "<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=68d8e97a453b45b01c95af49&product=sop' async='async'></script>"
            ]
        ];

        foreach ($shareSnippets as $snippet) {
            ShareSnippet::create($snippet);
        }

        $this->command->info('Created ' . ShareSnippet::count() . ' share snippets');
    }
}
