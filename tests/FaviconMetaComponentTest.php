<?php

// phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps

namespace InfernalMedia\LaravelFaviconGenerator\Tests;

use Illuminate\Support\Facades\Blade;
use InfernalMedia\LaravelFaviconGenerator\View\Components\FaviconMeta;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;

/**
 * @see FaviconMeta
 */
#[Group('favicon-meta')]
final class FaviconMetaComponentTest extends TestCase
{
    #[Test]
    public function it_renders_the_favicon_meta_tags(): void
    {
        $html = Blade::render('<x-favicon-meta />');

        $this->assertStringContainsString('favicon/favicon-96x96.png', $html);
        $this->assertStringContainsString('favicon/favicon.svg', $html);
        $this->assertStringContainsString('favicon/favicon.ico', $html);
        $this->assertStringContainsString('favicon/apple-touch-icon.png', $html);
        $this->assertStringContainsString('favicon/site.webmanifest', $html);
        $this->assertStringContainsString('mobile-web-app-capable', $html);
    }

    #[Test]
    public function it_honors_a_custom_output_path(): void
    {
        config(['favicon-generator.output_path' => 'icons']);

        $html = Blade::render('<x-favicon-meta />');

        $this->assertStringContainsString('icons/favicon-96x96.png', $html);
        $this->assertStringNotContainsString('favicon/favicon-96x96.png', $html);
    }
}
