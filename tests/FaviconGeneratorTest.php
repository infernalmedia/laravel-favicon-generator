<?php

// phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps

namespace InfernalMedia\LaravelFaviconGenerator\Tests;

use Illuminate\Support\Facades\File;
use InfernalMedia\LaravelFaviconGenerator\LaravelFaviconGenerator;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;

/**
 * @see LaravelFaviconGenerator
 */
#[Group('favicon-generator')]
final class FaviconGeneratorTest extends TestCase
{
    private string $testImagePath;

    private string $outputDir;

    protected function setUp(): void
    {
        parent::setUp();

        config(['favicon-generator.output_path' => 'favicon-test']);

        $this->testImagePath = sys_get_temp_dir().'/test-favicon-source.png';
        $this->outputDir = public_path('favicon-test');

        File::deleteDirectory($this->outputDir);
    }

    protected function tearDown(): void
    {
        File::deleteDirectory($this->outputDir);
        File::delete($this->testImagePath);

        parent::tearDown();
    }

    #[Test]
    public function it_generates_favicons(): void
    {
        $this->createTestImage();

        $generatedFiles = (new LaravelFaviconGenerator)->generate($this->testImagePath);

        $this->assertNotEmpty($generatedFiles);
        $this->assertDirectoryExists($this->outputDir);
        $this->assertFileExists(public_path('favicon-test/favicon.ico'));
        $this->assertFileExists(public_path('favicon-test/favicon-96x96.png'));
        $this->assertFileExists(public_path('favicon-test/apple-touch-icon.png'));
        $this->assertFileExists(public_path('favicon-test/site.webmanifest'));
    }

    #[Test]
    public function it_throws_an_exception_when_the_source_image_is_missing(): void
    {
        $this->expectException(InvalidArgumentException::class);

        (new LaravelFaviconGenerator)->generate('/non/existent/image.png');
    }

    private function createTestImage(): void
    {
        $image = imagecreatetruecolor(100, 100);
        imagefill($image, 0, 0, imagecolorallocate($image, 255, 0, 0));
        imagepng($image, $this->testImagePath);
        imagedestroy($image);
    }
}
