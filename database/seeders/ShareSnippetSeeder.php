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
                'script_code' => <<<'JS'
// ShareThis Script - Add to your site
// This script enables ShareThis social sharing functionality
JS,
                'html_code' => <<<'HTML'
<!-- ShareThis BEGIN -->
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=68d8e97a453b45b01c95af49&product=sop' async='async'></script>
<div class="sharethis-inline-share-buttons"></div>
<!-- ShareThis END -->
HTML,
                'active' => true,
            ],
            [
                'script_code' => <<<'JS'
// Alternative ShareThis configuration
// You can customize the ShareThis buttons appearance and functionality
(function() {
    // ShareThis initialization
    if (typeof window !== 'undefined' && window.document) {
        // Additional ShareThis customization can go here
        console.log('ShareThis loaded');
    }
})();
JS,
                'html_code' => <<<'HTML'
<!-- ShareThis Inline Share Buttons -->
<div class="sharethis-inline-share-buttons" style="text-align: center; margin: 20px 0;"></div>
HTML,
                'active' => true,
            ],
            [
                'script_code' => <<<'JS'
// Custom ShareThis with event tracking
document.addEventListener('DOMContentLoaded', function() {
    // Track ShareThis events
    if (typeof sharethis !== 'undefined') {
        sharethis.addEventListener('click', function(data) {
            console.log('Social share:', data.platform);
            // You can add analytics tracking here
        });
    }
});
JS,
                'html_code' => <<<'HTML'
<!-- ShareThis with Custom Styling -->
<div class="sharethis-inline-share-buttons" style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap;"></div>
HTML,
                'active' => false,
            ],
        ];

        foreach ($shareSnippets as $snippet) {
            ShareSnippet::create($snippet);
        }

        // Note: Only using specific ShareThis configurations, no random factory data

        $this->command->info('Created '.ShareSnippet::count().' share snippets');
    }
}
