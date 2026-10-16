<?php

// phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps

namespace InfernalMedia\LaravelFaviconGenerator\Tests;

use Illuminate\Support\Facades\File;
use InfernalMedia\LaravelFaviconGenerator\Commands\LaravelFaviconGeneratorCommand;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;

/**
 * @see LaravelFaviconGeneratorCommand
 */
#[Group('favicon-generator-command')]
final class FaviconGeneratorCommandTest extends TestCase
{
    private string $testImagePath;

    private string $outputDir;

    protected function setUp(): void
    {
        parent::setUp();

        config(['favicon-generator.output_path' => 'favicon-test']);

        $this->testImagePath = sys_get_temp_dir().'/test-favicon-command-source.png';
        $this->outputDir = public_path('favicon-test');

        File::deleteDirectory($this->outputDir);

        $image = imagecreatetruecolor(100, 100);
        imagefill($image, 0, 0, imagecolorallocate($image, 0, 128, 255));
        imagepng($image, $this->testImagePath);
        imagedestroy($image);
    }

    protected function tearDown(): void
    {
        File::deleteDirectory($this->outputDir);
        File::delete($this->testImagePath);

        parent::tearDown();
    }

    #[Test]
    public function it_generates_favicons_via_the_artisan_command(): void
    {
        $this->artisan('favicon:generate', [
            'source' => $this->testImagePath,
            '--name' => 'Test App',
            '--short-name' => 'Test',
            '--theme-color' => '#000000',
            '--background-color' => '#ffffff',
        ])->assertSuccessful();

        $this->assertFileExists(public_path('favicon-test/favicon.ico'));
        $this->assertFileExists(public_path('favicon-test/site.webmanifest'));

        $manifest = json_decode(file_get_contents(public_path('favicon-test/site.webmanifest')), true);
        $this->assertSame('Test App', $manifest['name']);
        $this->assertSame('Test', $manifest['short_name']);
        $this->assertSame('#000000', $manifest['theme_color']);
    }

    #[Test]
    public function it_fails_when_the_source_file_does_not_exist(): void
    {
        $this->artisan('favicon:generate', [
            'source' => '/non/existent/image.png',
        ])->assertFailed();
    }
}
