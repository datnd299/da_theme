<?php
/**
 * One-off image prep for the USWS product photos.
 *
 * Drop the raw studio shots in as:
 *   assets/img/hero.jpeg
 *   assets/img/cat/classic.jpeg
 *   assets/img/cat/elegant.jpeg
 *
 * Then run inside the WP container (host has no imagemagick):
 *   docker cp scripts/knockout-images.php wpxx-wp-1:/tmp/knockout-images.php
 *   docker exec wpxx-wp-1 php /tmp/knockout-images.php
 *
 * Output: transparent-background WebP cutouts (white bg knocked out, resized,
 * trimmed) written next to the source as .webp. Delete the .jpeg afterwards.
 * Requires the ext-imagick PHP extension.
 */

$dir = dirname(__DIR__) . '/assets/img';
if (!is_dir($dir)) {
    // Inside the container the theme is mounted here.
    $dir = '/var/www/html/wp-content/themes/da_theme/assets/img';
}

$jobs = [
    ['src' => "$dir/hero.jpeg",        'dst' => "$dir/hero.webp",        'max' => 1100, 'fuzz' => 0.11],
    ['src' => "$dir/cat/classic.jpeg", 'dst' => "$dir/cat/classic.webp", 'max' => 900,  'fuzz' => 0.11],
    ['src' => "$dir/cat/elegant.jpeg", 'dst' => "$dir/cat/elegant.webp", 'max' => 900,  'fuzz' => 0.12],
];

$range = Imagick::getQuantumRange();
$q = $range['quantumRangeLong'] ?? $range['quantumRangeFloat'];

foreach ($jobs as $j) {
    if (!file_exists($j['src'])) {
        echo "skip (no source): {$j['src']}\n";
        continue;
    }

    $im = new Imagick($j['src']);
    $im->setImageColorspace(Imagick::COLORSPACE_SRGB);

    $w = $im->getImageWidth();
    $h = $im->getImageHeight();
    if (max($w, $h) > $j['max']) {
        if ($w >= $h) {
            $im->resizeImage($j['max'], 0, Imagick::FILTER_LANCZOS, 1);
        } else {
            $im->resizeImage(0, $j['max'], Imagick::FILTER_LANCZOS, 1);
        }
    }

    $im->setImageAlphaChannel(Imagick::ALPHACHANNEL_ACTIVATE);
    $im->borderImage('white', 1, 1);

    $fuzz = $q * $j['fuzz'];
    $cw = $im->getImageWidth();
    $ch = $im->getImageHeight();
    $seeds = [];
    for ($x = 0; $x < $cw; $x += 15) {
        $seeds[] = [$x, 0];
        $seeds[] = [$x, $ch - 1];
    }
    for ($y = 0; $y < $ch; $y += 15) {
        $seeds[] = [0, $y];
        $seeds[] = [$cw - 1, $y];
    }
    foreach ($seeds as $pt) {
        $im->floodFillPaintImage('transparent', $fuzz, 'rgb(255,255,255)', $pt[0], $pt[1], false);
    }

    $im->shaveImage(1, 1);

    $im->blurImage(0, 0.6, Imagick::CHANNEL_ALPHA);
    $im->levelImage(0.45 * $q, 1.0, 0.80 * $q, Imagick::CHANNEL_ALPHA);
    $im->despeckleImage();

    $im->setImageBackgroundColor(new ImagickPixel('transparent'));
    $im->trimImage(0.25 * $q);
    $im->setImagePage(0, 0, 0, 0);
    $pad = (int) round(max($im->getImageWidth(), $im->getImageHeight()) * 0.03);
    $im->borderImage('transparent', $pad, $pad);
    $im->setImagePage(0, 0, 0, 0);

    $im->setImageFormat('webp');
    $im->setOption('webp:method', '6');
    $im->setImageCompressionQuality(82);
    $im->stripImage();
    $im->writeImage($j['dst']);

    printf(
        "%s -> %dx%d %dKB\n",
        basename($j['dst']),
        $im->getImageWidth(),
        $im->getImageHeight(),
        round(filesize($j['dst']) / 1024)
    );
    $im->clear();
}
