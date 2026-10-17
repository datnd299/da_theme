<?php
/**
 * Tire Size Guide — MozTire
 * Explains every tire attribute shoppers filter by (width, aspect ratio, rim,
 * load index, speed rating, load range, season, service type, sidewall).
 */

dawp_page_hero([
    'title'   => 'How to Read a Tire Size',
    'eyebrow' => 'Tire Size Guide',
    'lead'    => 'Decode the numbers on your sidewall so you can choose replacement tires with confidence.',
    'image'   => 'assets/img/hero/support-hero.jpg',
    'crumb'   => 'Tire Size Guide',
]);

$speed = [
    ['Q', '99 mph', 'Winter & light-truck'],
    ['R', '106 mph', 'Light truck'],
    ['S', '112 mph', 'Passenger, SUV'],
    ['T', '118 mph', 'Passenger, minivan'],
    ['H', '130 mph', 'Sedans, crossovers'],
    ['V', '149 mph', 'Sport sedans'],
    ['W', '168 mph', 'Performance'],
    ['Y', '186 mph', 'High performance'],
];
$load = [[91, '1,356'], [94, '1,477'], [95, '1,521'], [98, '1,653'], [100, '1,764'], [102, '1,874'], [104, '1,984'], [107, '2,149'], [110, '2,337'], [112, '2,469'], [116, '2,756'], [121, '3,195']];

$speed_rows = '';
foreach ($speed as $row) {
    $speed_rows .= '<tr><td><strong>' . esc_html($row[0]) . '</strong></td><td>' . esc_html($row[1]) . '</td><td>' . esc_html($row[2]) . '</td></tr>';
}
$load_rows = '';
foreach (array_chunk($load, 2) as $pair) {
    $load_rows .= '<tr>';
    foreach ($pair as $row) {
        $load_rows .= '<td><strong>' . (int) $row[0] . '</strong></td><td>' . esc_html($row[1]) . ' lbs</td>';
    }
    $load_rows .= '</tr>';
}
?>

<div class="mz-policy mz-policy--finder">
    <div class="mz-container">
        <?php dawp_tire_finder(['id' => 'guide-tf', 'variant' => 'bar', 'title' => 'Know your size? Search it now']); ?>
    </div>
</div>

<?php
dawp_policy_body([
    [
        'id'    => 'where',
        'title' => 'Where to find your tire size',
        'html'  => '
            <ul>
                <li><strong>On the tire sidewall</strong>: the size is molded into the rubber, for example <code>225/65R17 102H</code>.</li>
                <li><strong>On the tire placard</strong>: a sticker on the driver-side door jamb (sometimes in the glove box or fuel door) lists the original size and recommended inflation pressure.</li>
                <li><strong>In your owner\'s manual</strong>, under tires or specifications.</li>
            </ul>
            <p class="mz-callout">Some vehicles use different sizes front and rear (a "staggered" setup). Check both axles before ordering.</p>',
    ],
    [
        'id'    => 'decode',
        'title' => 'Decoding P225/65R17 102H',
        'html'  => '
            <table>
                <thead><tr><th>Part</th><th>Meaning</th><th>Filter on MozTire</th></tr></thead>
                <tbody>
                    <tr><td><strong>P</strong></td><td>Service type. <em>P</em> = P-metric passenger tire, <em>LT</em> = light truck, no letter = Euro-metric.</td><td>Service Type</td></tr>
                    <tr><td><strong>225</strong></td><td>Section width in millimeters, sidewall to sidewall.</td><td>Width</td></tr>
                    <tr><td><strong>65</strong></td><td>Aspect ratio: sidewall height as a percentage of width. Lower = shorter, sportier sidewall.</td><td>Aspect Ratio</td></tr>
                    <tr><td><strong>R</strong></td><td>Radial construction, used by virtually all modern tires.</td><td>&mdash;</td></tr>
                    <tr><td><strong>17</strong></td><td>Wheel (rim) diameter in inches. Must match your wheels exactly.</td><td>Rim Diameter</td></tr>
                    <tr><td><strong>102</strong></td><td>Load index: the maximum weight each tire can carry at its maximum pressure.</td><td>Load Index</td></tr>
                    <tr><td><strong>H</strong></td><td>Speed rating: the maximum sustained speed the tire is rated for.</td><td>Speed Rating</td></tr>
                </tbody>
            </table>
            <p>Width, aspect ratio and rim diameter must match the size your vehicle calls for. Load index and speed rating should be <strong>equal to or higher than</strong> the original equipment.</p>',
    ],
    [
        'id'    => 'speed',
        'title' => 'Speed rating chart',
        'html'  => '
            <table>
                <thead><tr><th>Rating</th><th>Max speed</th><th>Typical use</th></tr></thead>
                <tbody>' . $speed_rows . '</tbody>
            </table>
            <p>Winter tires often carry a lower speed rating than the all-season tires they replace. That is normal; just drive to conditions.</p>',
    ],
    [
        'id'    => 'load',
        'title' => 'Load index chart',
        'html'  => '
            <table>
                <thead><tr><th>Index</th><th>Max load / tire</th><th>Index</th><th>Max load / tire</th></tr></thead>
                <tbody>' . $load_rows . '</tbody>
            </table>
            <p>Multiply by four to estimate the total capacity of a full set. Never choose a load index lower than your vehicle\'s placard specifies.</p>',
    ],
    [
        'id'    => 'load-range',
        'title' => 'Load range (LT and XL tires)',
        'html'  => '
            <ul>
                <li><strong>SL (Standard Load)</strong> and <strong>XL (Extra Load)</strong> apply to passenger tires. XL tires carry more weight at higher pressure.</li>
                <li><strong>Load Range C</strong> (6-ply rated), <strong>D</strong> (8-ply), <strong>E</strong> (10-ply) and <strong>F</strong> (12-ply) apply to LT tires for pickups, vans and towing.</li>
            </ul>
            <p>If your truck came with Load Range E tires, replace them with Load Range E or higher.</p>',
    ],
    [
        'id'    => 'season',
        'title' => 'Season and tire categories',
        'html'  => '
            <table>
                <thead><tr><th>Type</th><th>Best for</th></tr></thead>
                <tbody>
                    <tr><td><strong>All-Season</strong></td><td>Year-round driving in mild climates; long tread life. Often marked M+S.</td></tr>
                    <tr><td><strong>All-Weather</strong></td><td>Year-round use with real snow capability. Carries the Three-Peak Mountain Snowflake (3PMSF) symbol.</td></tr>
                    <tr><td><strong>Winter</strong></td><td>Snow, ice and temperatures below about 45&deg;F. 3PMSF rated.</td></tr>
                    <tr><td><strong>Summer / Performance</strong></td><td>Maximum dry and wet grip in warm weather; not for snow or freezing temperatures.</td></tr>
                    <tr><td><strong>Highway</strong></td><td>Quiet, efficient touring for SUVs and pickups.</td></tr>
                    <tr><td><strong>All-Terrain</strong></td><td>Mixed on-road and off-road use for trucks and SUVs.</td></tr>
                    <tr><td><strong>Mud-Terrain</strong></td><td>Aggressive off-road traction in mud and rock; louder on pavement.</td></tr>
                </tbody>
            </table>',
    ],
    [
        'id'    => 'other',
        'title' => 'Sidewall style, DOT date and tread depth',
        'html'  => '
            <ul>
                <li><strong>Sidewall:</strong> Black Sidewall (BSW), Outlined White Letters (OWL), Raised White Letters (RWL) and similar styles are cosmetic and do not affect performance.</li>
                <li><strong>DOT date code:</strong> the last four digits of the DOT number show the week and year of manufacture, e.g. <code>3425</code> = week 34 of 2025.</li>
                <li><strong>Tread depth:</strong> new tires typically have 10/32" to 12/32" of tread (more for off-road tires). Most U.S. states require replacement at 2/32", and many experts recommend replacing at 4/32" for wet-road safety.</li>
                <li><strong>Tread warranty:</strong> a manufacturer mileage warranty, such as 60,000 miles. It requires regular rotation and correct inflation.</li>
            </ul>',
    ],
    [
        'id'    => 'tips',
        'title' => 'Buying tips',
        'html'  => '
            <ol>
                <li>Match the size on your placard. Changing size can affect speedometer accuracy, clearance and safety systems.</li>
                <li>Replace tires in sets of four when possible, or at least in pairs on the same axle. Many AWD vehicles need four matching tires.</li>
                <li>Choose a season that fits where you drive most of the year.</li>
                <li>Have tires mounted and balanced by a qualified installer, and ask for an alignment check.</li>
            </ol>
            <p>Still unsure? <a href="/contact-us/">Send us your vehicle and current tire size</a> and we will help.</p>',
    ],
]);
