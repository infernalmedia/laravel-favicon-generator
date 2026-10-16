{{-- Favicon Meta Tags Component --}}
@php
    $outputPath = trim(config('favicon-generator.output_path', 'favicon'), '/');

    $pngConfig = config('favicon-generator.favicon_types.png', []);
    $pngFilename = $pngConfig['filename'] ?? 'favicon-96x96.png';
    $pngSize = $pngConfig['size'] ?? 96;

    $svgFilename = config('favicon-generator.favicon_types.svg.filename', 'favicon.svg');
    $icoFilename = config('favicon-generator.favicon_types.ico.filename', 'favicon.ico');

    $appleConfig = config('favicon-generator.favicon_types.apple_touch_icon', []);
    $appleFilename = $appleConfig['filename'] ?? 'apple-touch-icon.png';
    $appleSize = $appleConfig['size'] ?? 180;

    $manifestFilename = config('favicon-generator.web_manifest.filename', 'site.webmanifest');

    $manifestPath = public_path("{$outputPath}/{$manifestFilename}");
    $appName = '';

    if (file_exists($manifestPath)) {
        $manifestContent = json_decode(file_get_contents($manifestPath), true);
        $appName = $manifestContent['name'] ?? config('app.name', '');
    } else {
        $appName = config('app.name', '');
    }
@endphp
<link rel="icon"
      type="image/png"
      href="{{ asset("{$outputPath}/{$pngFilename}") }}"
      sizes="{{ $pngSize }}x{{ $pngSize }}" />
<link rel="icon"
      type="image/svg+xml"
      href="{{ asset("{$outputPath}/{$svgFilename}") }}" />
<link rel="shortcut icon"
      href="{{ asset("{$outputPath}/{$icoFilename}") }}" />
<link rel="apple-touch-icon"
      sizes="{{ $appleSize }}x{{ $appleSize }}"
      href="{{ asset("{$outputPath}/{$appleFilename}") }}" />
<link rel="manifest"
      href="{{ asset("{$outputPath}/{$manifestFilename}") }}" />

{{-- Web App Title Meta Tags --}}
@if (!empty($appName))
    <meta name="application-name"
          content="{{ $appName }}" />
    <meta name="apple-mobile-web-app-title"
          content="{{ $appName }}" />
@endif
<meta name="mobile-web-app-capable"
      content="yes" />
<meta name="apple-mobile-web-app-capable"
      content="yes" />
<meta name="apple-mobile-web-app-status-bar-style"
      content="default" />
