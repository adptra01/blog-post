<?php

namespace Database\Factories;

use App\Models\ShareSnippet;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShareSnippetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShareSnippet::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'script_code' => $this->generateShareThisScript(),
            'html_code' => $this->generateShareThisHTML(),
            'active' => fake()->boolean(80), // 80% chance of being active
        ];
    }

    /**
     * Generate ShareThis script code.
     */
    private function generateShareThisScript(): string
    {
        return <<<'JS'
// ShareThis Configuration Script
// Initialize ShareThis with custom settings
(function() {
    var sharethisConfig = {
        property: 'custom-property-id',
        product: 'inline-share-buttons'
    };

    if (typeof window !== 'undefined') {
        window.sharethisConfig = sharethisConfig;
    }
})();
JS;
    }

    /**
     * Generate ShareThis HTML placement code.
     */
    private function generateShareThisHTML(): string
    {
        return <<<'HTML'
<!-- ShareThis Share Buttons -->
<div class="sharethis-inline-share-buttons" style="margin: 20px 0; text-align: center;"></div>
HTML;
    }

    /**
     * Indicate that the snippet should be active.
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'active' => true,
        ]);
    }

    /**
     * Indicate that the snippet should be inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'active' => false,
        ]);
    }
}
