<?php
/**
 * Demo blog content for the tire guide section.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

add_action('init', 'dawp_seed_blog_posts');

function dawp_seed_blog_posts() {
    if ('11' === (string) get_option('dawp_blog_seeded')) {
        return;
    }

    $category = get_category_by_slug('blog');

    if (!$category) {
        $created = wp_insert_term(__('Blog', 'dawp'), 'category', [
            'slug'        => 'blog',
            'description' => __('Tire buying guides, fitment tips, and shopping advice from Mytire.', 'dawp'),
        ]);

        if (is_wp_error($created)) {
            return;
        }

        $category_id = (int) $created['term_id'];
    } else {
        $category_id = (int) $category->term_id;
    }

    $shop_url         = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0 ? get_permalink(wc_get_page_id('shop')) : home_url('/shop/');
    $rim_size_url     = home_url('/shop-by-rim-size/');
    $brand_url        = home_url('/shop-by-brand/');
    $vehicle_type_url = home_url('/shop-by-vehicle-type/');
    $all_season_url   = get_term_link('all-season-tires', 'product_cat');
    $performance_url  = get_term_link('performance-tires', 'product_cat');

    if (is_wp_error($all_season_url)) {
        $all_season_url = $shop_url;
    }

    if (is_wp_error($performance_url)) {
        $performance_url = $shop_url;
    }

    $posts = [
        [
            'title'   => 'How to Read Tire Size Before Ordering Online',
            'slug'    => 'how-to-read-tire-size-before-ordering-online',
            'excerpt' => 'Learn how tire width, aspect ratio, rim size, load index, and speed rating work together before you order tires online.',
            'image'   => get_theme_file_uri('/assets/img/gallery/Mytire/Blog/How_to_Read_Tire Size.jpg'),
            'content' => [
                ['heading' => 'Start with the complete tire size'],
                ['p' => 'A tire size such as 225/55R17 is more than a random code. The first number is the tire width in millimeters, the second number is the sidewall profile, and the final number after the R is the rim diameter. When you shop online, all three numbers need to match the size your vehicle can safely use.'],
                ['p' => 'The easiest way to begin is to compare the sidewall code with the information on the driver door placard or owner manual. If the current tire size does not match the placard, treat that as a sign to check fitment carefully before checkout. You can also start from <a href="' . esc_url($rim_size_url) . '">Shop By Rim Size</a> when the wheel diameter is the first thing you know.'],
                ['heading' => 'Do not skip load index and speed rating'],
                ['p' => 'Load index and speed rating are usually shown after the main size, for example 97V. These markings tell you how much weight the tire is designed to carry and the speed category it supports. Choosing only by width and rim size can lead to a tire that physically fits but does not match the vehicle requirement.'],
                ['list' => [
                    'Match the full size code before comparing prices.',
                    'Keep the required load index equal to or higher than the vehicle recommendation.',
                    'Choose a speed rating that fits your vehicle and driving use.',
                    'Confirm quantity, season, and tire category before placing the order.',
                ]],
                ['p' => 'Once the size is clear, browse the main <a href="' . esc_url($shop_url) . '">tire shop</a> to compare available models. If brand preference matters, use <a href="' . esc_url($brand_url) . '">Shop By Brand</a> to review familiar tire makers after your fitment is confirmed.'],
            ],
        ],
        [
            'title'   => 'All-Season vs Performance Tires: Which One Fits Your Drive?',
            'slug'    => 'all-season-vs-performance-tires-which-one-fits-your-drive',
            'excerpt' => 'Compare comfort, wet-road confidence, tread life, steering response, and value before choosing between all-season and performance tires.',
            'image'   => get_theme_file_uri('/assets/img/gallery/Mytire/Blog/Which_One_Fits_Your_Drive.jpg'),
            'content' => [
                ['heading' => 'Choose by driving style first'],
                ['p' => 'All-season tires are built for everyday balance. They usually focus on comfort, tread life, wet-road stability, and predictable handling for commuting, errands, and family vehicles. For many drivers, they are the most practical starting point because they keep the shopping decision simple without chasing extreme performance.'],
                ['p' => 'Performance tires are aimed at sharper steering response, stronger cornering feel, and confident braking. They can be a better match for sport sedans, coupes, and drivers who care more about road feel than maximum tread life. The tradeoff is that some performance tires may wear faster or feel firmer than touring options.'],
                ['heading' => 'Where each category makes sense'],
                ['list' => [
                    'Choose all-season tires for daily comfort, mixed weather, and long-term value.',
                    'Choose performance tires when handling, steering feel, and grip matter most.',
                    'Check your vehicle type and original equipment recommendation before changing category.',
                    'Compare tire size, load index, and speed rating before comparing promotions.',
                ]],
                ['p' => 'You can browse <a href="' . esc_url($all_season_url) . '">all-season tire options</a> for practical daily use or compare sportier choices in the <a href="' . esc_url($performance_url) . '">performance tire category</a>. If you are still unsure, start in the <a href="' . esc_url($shop_url) . '">shop</a> and filter by size first so every product you review begins from the correct fitment.'],
            ],
        ],
        [
            'title'   => 'When Should You Replace Your Tires?',
            'slug'    => 'when-should-you-replace-your-tires',
            'excerpt' => 'Use tread depth, age, cracking, vibration, and uneven wear as practical signals that your next tire set may be due.',
            'image'   => get_theme_file_uri('/assets/img/gallery/Mytire/Blog/When_Should_You_Replace_Your_Tires.jpg'),
            'content' => [
                ['heading' => 'Look beyond the tread pattern'],
                ['p' => 'Tread depth is one of the clearest replacement signals. As tread gets low, wet-road grip drops and stopping distance can increase, especially during heavy rain. If your tire has worn close to the tread wear bars, it is time to compare replacements before the tire becomes a safety problem.'],
                ['p' => 'Age matters too. Rubber can harden and crack even when a vehicle is not driven often. Sidewall cracks, bulges, repeated air loss, vibration, and uneven wear are all signs that the tire should be inspected. Uneven wear can also point to alignment, inflation, or suspension issues that should be handled before installing a new set.'],
                ['heading' => 'Replacement checklist before ordering'],
                ['list' => [
                    'Check all four tires, not only the one that looks worst.',
                    'Confirm the exact tire size and rim diameter before adding products to cart.',
                    'Replace in matching pairs or full sets when your vehicle requires it.',
                    'Choose a tire category that fits your driving conditions and mileage.',
                ]],
                ['p' => 'If you already know the rim diameter, the <a href="' . esc_url($rim_size_url) . '">Shop By Rim Size</a> page can narrow your search quickly. For broader comparison, use the main <a href="' . esc_url($shop_url) . '">tire shop</a> and filter by size, brand, and category.'],
            ],
        ],
        [
            'title'   => 'How to Compare Budget, Mid-Range, and Premium Tires',
            'slug'    => 'how-to-compare-budget-mid-range-and-premium-tires',
            'excerpt' => 'Understand what separates budget, mid-range, and premium tires so you can compare real value, not just the lowest price.',
            'image'   => get_theme_file_uri('/assets/img/gallery/Mytire/Blog/How_to_Compare_Budged.jpg'),
            'content' => [
                ['heading' => 'Price is only one part of tire value'],
                ['p' => 'Budget tires can be a sensible choice for lower-mileage driving, secondary vehicles, or shoppers who need a practical replacement at a controlled cost. The important step is to compare tread pattern, wet performance, load rating, and the tire category instead of choosing by price alone.'],
                ['p' => 'Mid-range tires often give a strong balance of price, comfort, and useful tread life. Premium tires may cost more upfront, but they can bring better ride quality, lower road noise, stronger wet grip, or more advanced construction. The best choice depends on how long you plan to keep the vehicle and the roads you drive most.'],
                ['heading' => 'How to compare brands more clearly'],
                ['list' => [
                    'Start with exact tire size so every product is a real fit.',
                    'Compare tires inside the same category, such as touring, all-season, or performance.',
                    'Look at long-term value, not only the cheapest checkout price.',
                    'Use brand pages after size and category are already clear.',
                ]],
                ['p' => 'A clean comparison usually starts in <a href="' . esc_url($brand_url) . '">Shop By Brand</a>, then moves into the <a href="' . esc_url($shop_url) . '">shop</a> to confirm price, size availability, and quantity. You can also use <a href="' . esc_url($vehicle_type_url) . '">Shop By Vehicle Type</a> if you want to browse tires around how the vehicle is used.'],
            ],
        ],
        [
            'title'   => 'Shopping Tire Deals Without Choosing the Wrong Fit',
            'slug'    => 'shopping-tire-deals-without-choosing-the-wrong-fit',
            'excerpt' => 'Use tire deals wisely by confirming size, category, load rating, speed rating, and vehicle needs before chasing a promotion.',
            'image'   => get_theme_file_uri('/assets/img/gallery/Mytire/Blog/Shopping Tire_Deals_Without_Choosing_the_Wrong_Fit.jpg'),
            'content' => [
                ['heading' => 'A good deal still has to fit'],
                ['p' => 'Tire promotions are helpful only when the tire matches your vehicle. Before comparing sale prices, confirm the full tire size, rim diameter, load index, and speed rating. A lower price is not a saving if the tire is the wrong size or the wrong category for your normal driving conditions.'],
                ['p' => 'Seasonal campaigns, brand offers, and limited-time discounts can reduce the cost of a new set. The smarter approach is to filter first, then compare deals inside the group of tires that already fit. That keeps you from wasting time on products that look attractive but are not suitable for your vehicle.'],
                ['heading' => 'Deal-shopping checklist'],
                ['list' => [
                    'Filter by exact size before sorting by price.',
                    'Compare all-season, touring, and performance categories separately.',
                    'Confirm whether the promotion applies to your selected quantity.',
                    'Review brand, warranty, and delivery details before checkout.',
                ]],
                ['p' => 'Start in the <a href="' . esc_url($shop_url) . '">shop</a> for available offers, use <a href="' . esc_url($rim_size_url) . '">Shop By Rim Size</a> when diameter is your main filter, and browse <a href="' . esc_url($brand_url) . '">Shop By Brand</a> when you want to compare trusted names side by side.'],
            ],
        ],
        [
            'title'   => 'Tire Pressure Basics: Why PSI Changes Your Ride',
            'slug'    => 'tire-pressure-basics-why-psi-changes-your-ride',
            'excerpt' => 'Learn why correct tire pressure affects safety, tread wear, fuel use, and everyday ride comfort.',
            'image'   => get_theme_file_uri('/assets/img/gallery/Mytire/Blog/Tire_Pressure_Basics.jpg'),
            'content' => [
                ['heading' => 'Use the vehicle recommendation, not the sidewall maximum'],
                ['p' => 'Tire pressure should start with the vehicle placard or owner manual. The number molded on the tire sidewall is usually the maximum pressure the tire can hold, not the pressure your specific vehicle needs for daily driving.'],
                ['p' => 'Correct inflation helps the tread sit evenly on the road. Too little pressure can create heat, shoulder wear, poor fuel economy, and sluggish handling. Too much pressure can make the ride harsher and concentrate wear near the center of the tread.'],
                ['heading' => 'Check pressure when tires are cold'],
                ['list' => [
                    'Check pressure before a long drive or after the vehicle has been parked.',
                    'Use the same reliable gauge each time so readings stay consistent.',
                    'Do not ignore the spare tire if your vehicle carries one.',
                    'Recheck after big temperature changes or heavy vehicle loading.',
                ]],
                ['p' => 'A pressure check is also a good moment to look for nails, sidewall cuts, uneven tread wear, or slow leaks. If one tire keeps losing air, inspect it before ordering a replacement set so you understand whether the issue is tire damage, valve hardware, or wheel condition.'],
            ],
        ],
        [
            'title'   => 'How Often Should You Rotate Tires?',
            'slug'    => 'how-often-should-you-rotate-tires',
            'excerpt' => 'Use tire rotation to even out wear, protect tread life, and spot pressure or alignment problems early.',
            'image'   => get_theme_file_uri('/assets/img/gallery/Mytire/Blog/how_often_should_you_rotate_tires.jpg'),
            'content' => [
                ['heading' => 'Rotation helps tires wear as a set'],
                ['p' => 'Front and rear tires usually do different work. Steering, braking, vehicle weight, drive axle layout, and suspension geometry can all make one position wear faster than another. Rotation moves tires through different positions so the set has a better chance of wearing evenly.'],
                ['p' => 'Even wear matters when you shop later because it helps you replace tires on a planned schedule instead of reacting to one badly worn tire. It can also keep handling and braking more consistent across the vehicle.'],
                ['heading' => 'Use the correct pattern for the vehicle'],
                ['list' => [
                    'Follow the owner manual for rotation interval and pattern.',
                    'Directional tires must keep their rolling direction.',
                    'Staggered wheel setups may limit front-to-rear rotation.',
                    'Ask for tread depth and pressure checks during rotation.',
                ]],
                ['p' => 'If a tire technician finds cupping, feathering, or one tire wearing much faster than the others, rotation alone may not solve it. Alignment, balance, tire pressure, or worn suspension parts may need attention before a new set is installed.'],
            ],
        ],
        [
            'title'   => 'What Load Index and Speed Rating Mean on a Tire',
            'slug'    => 'what-load-index-and-speed-rating-mean-on-a-tire',
            'excerpt' => 'Understand the service description after your tire size so you do not buy a tire below your vehicle requirement.',
            'image'   => get_theme_file_uri('/assets/img/gallery/Mytire/Blog/what_load_index.jpg'),
            'content' => [
                ['heading' => 'The numbers after the size matter'],
                ['p' => 'A tire code often ends with a service description such as 94V, 105H, or 112T. The number is the load index and the letter is the speed rating. Together, they describe capability that matters after the tire already matches the basic size.'],
                ['p' => 'Load index is tied to how much weight a tire can carry. Speed rating is tied to tested speed capability and can also relate to how the tire is built. Buying below the vehicle recommendation can reduce the safety margin the vehicle was designed around.'],
                ['heading' => 'How to shop with ratings'],
                ['list' => [
                    'Find the required tire size and ratings on the placard or owner manual.',
                    'Choose the same or higher load index unless a qualified fitment source says otherwise.',
                    'Do not drop speed rating just because the tire is cheaper.',
                    'Compare ratings only after the size and tire category are correct.',
                ]],
                ['p' => 'If two tires look similar in price, check the service description before choosing. The better value is the tire that fits the size, category, load requirement, speed rating, and normal driving use without forcing a compromise.'],
            ],
        ],
        [
            'title'   => 'All-Weather, All-Season, and Winter Tires Explained',
            'slug'    => 'all-weather-all-season-and-winter-tires-explained',
            'excerpt' => 'Compare tire categories for everyday roads, mixed climates, cold weather, and seasonal driving needs.',
            'image'   => get_theme_file_uri('/assets/img/gallery/Mytire/Blog/All_weather_all_season.jpg'),
            'content' => [
                ['heading' => 'Similar names can mean different jobs'],
                ['p' => 'All-season tires are common for daily drivers because they balance comfort, tread life, wet grip, and moderate weather needs. They are a practical default for many shoppers, especially where winters are mild and driving is mostly commuting or highway use.'],
                ['p' => 'All-weather tires are often positioned between all-season and winter options. Many are designed to handle a wider cold-weather range than standard all-season tires while staying usable year-round. Dedicated winter tires are more specialized for cold temperatures, snow, and ice.'],
                ['heading' => 'Match the category to the real climate'],
                ['list' => [
                    'Use all-season tires for balanced everyday driving in mild conditions.',
                    'Consider all-weather tires when cold and wet conditions are more common.',
                    'Choose winter tires for regular snow, ice, and sustained cold weather.',
                    'Do not mix tire categories on the same vehicle unless the manufacturer allows it.',
                ]],
                ['p' => 'The best category depends on where the vehicle spends most of its miles. After choosing the category, compare exact size, load index, speed rating, tread design, and price inside that group.'],
            ],
        ],
        [
            'title'   => 'Before a Road Trip: Tire Checks Worth Doing',
            'slug'    => 'before-a-road-trip-tire-checks-worth-doing',
            'excerpt' => 'Use a simple pre-trip tire check to catch low pressure, low tread, visible damage, and fitment concerns early.',
            'image'   => get_theme_file_uri('/assets/img/gallery/Mytire/Blog/Before_a_Road_Trip.jpg'),
            'content' => [
                ['heading' => 'Inspect before the vehicle is loaded'],
                ['p' => 'A road trip adds heat, speed, passenger weight, luggage, and longer continuous driving time. That makes tire condition more important than it feels during short local trips. Check pressure, tread depth, and visible damage before the vehicle is fully loaded and before the tires are hot from driving.'],
                ['p' => 'Look for cuts, bulges, cracking, objects in the tread, uneven wear, and repeated air loss. If the vehicle has a spare, confirm that it is present, inflated, and usable. A spare that is flat or missing tools will not help much on the shoulder of a highway.'],
                ['heading' => 'Quick pre-trip checklist'],
                ['list' => [
                    'Set pressure to the vehicle recommendation while tires are cold.',
                    'Confirm tread depth is legal and suitable for wet roads.',
                    'Inspect sidewalls for cracking, cuts, or bulges.',
                    'Check the spare tire, jack, wheel lock key, and tire repair kit.',
                ]],
                ['p' => 'If the check shows worn tread or visible damage, shop before the trip instead of waiting. Ordering early gives you time to compare the right size and category without being forced into the fastest available option.'],
            ],
        ],
    ];

    $extra_content = [
        'how-to-read-tire-size-before-ordering-online' => [
            ['heading' => 'Check the tire placard before trusting the old tire'],
            ['p' => 'The tire already on the vehicle is useful information, but it should not be the only source you trust. A previous owner may have installed a different size, or a shop may have fitted a close alternative that is not ideal for your trim. The placard inside the driver door is usually the cleanest reference because it reflects the manufacturer recommendation for the vehicle.'],
            ['p' => 'If the placard lists more than one size, check which wheel package your vehicle actually has. The rim diameter must match the wheel, and the tire width and sidewall profile should stay inside a range that keeps clearance, speedometer accuracy, and ride quality where they belong.'],
            ['heading' => 'What each part of the code changes'],
            ['p' => 'Width affects the contact patch and how the tire sits on the wheel. Aspect ratio affects sidewall height, which can change comfort, steering feel, and protection against potholes. Rim diameter is fixed by the wheel itself, so a 17-inch tire cannot be installed on an 18-inch wheel even if the rest of the numbers look close.'],
            ['p' => 'Load index and speed rating are the final safety checks. For daily driving, replacing with the same or higher load index is usually the practical rule. Speed rating should also meet the vehicle recommendation, especially on sedans, crossovers, and performance-oriented trims that were engineered around a specific tire capability.'],
            ['heading' => 'Before you add to cart'],
            ['p' => 'Write down the full tire code exactly as shown, including the service description after the size. Then filter by size first, compare brands second, and only then sort by price. That order keeps the shopping process focused on tires that are genuinely suitable instead of tires that only look similar.'],
        ],
        'all-season-vs-performance-tires-which-one-fits-your-drive' => [
            ['heading' => 'Think about the roads you drive every week'],
            ['p' => 'A tire category should match your normal routine, not the most exciting drive you imagine taking once a year. If most miles are commuting, school runs, errands, and highway cruising, an all-season touring tire can feel quieter and more relaxed while still giving dependable wet-road confidence.'],
            ['p' => 'Performance tires make more sense when steering precision and grip are part of the reason you enjoy the vehicle. They often feel more immediate in lane changes and cornering, but that sharper response can come with a firmer ride, more road noise, or shorter tread life depending on the model.'],
            ['heading' => 'Weather and mileage matter'],
            ['p' => 'All-season does not mean perfect for every climate, but it does mean the tire is designed to handle a wider mix of everyday conditions. For drivers who see frequent rain, mild cold, and long highway mileage, that balance can be more valuable than maximum dry grip.'],
            ['p' => 'Performance tires can be excellent in warm, dry, and wet conditions when chosen correctly, but some are less comfortable in colder weather or heavy mileage use. If you drive a family SUV or crossover, check whether a touring, grand touring, or highway tire is a better match before jumping into a sportier category.'],
            ['heading' => 'A practical buying rule'],
            ['p' => 'Choose the tire that supports the way the vehicle is used most often. Once the category is clear, compare options inside that category by size, load rating, warranty, and price. That gives you a fairer comparison than mixing a budget touring tire against a premium performance tire and judging only by the checkout total.'],
        ],
        'when-should-you-replace-your-tires' => [
            ['heading' => 'Uneven wear tells a bigger story'],
            ['p' => 'A tire can need replacement even when part of the tread still looks usable. Wear on one shoulder may point to alignment issues, feathering can suggest suspension or rotation problems, and center wear can come from overinflation. Replacing the tires without fixing the cause can make the next set wear out faster than expected.'],
            ['p' => 'Run your hand gently over the tread and compare all four tires. If one tire feels rough, cupped, or noticeably different from the others, get it inspected before ordering. That extra step can protect your new set and make the vehicle feel smoother after installation.'],
            ['heading' => 'Age and damage are replacement signals too'],
            ['p' => 'Rubber changes over time, especially in heat, sun, and stop-and-go driving. Cracking between tread blocks or along the sidewall is a warning sign, even if the tread depth looks acceptable. Bulges, cuts, exposed cords, or repeated pressure loss should be treated as urgent inspection items.'],
            ['p' => 'Vibration is another clue. Sometimes the fix is balancing or alignment, but vibration combined with visible tire damage can point to internal issues. If the car shakes at speed or pulls after a tire impact, inspect the tires and wheels before simply continuing to drive.'],
            ['heading' => 'Plan the replacement before it becomes urgent'],
            ['p' => 'Shopping early gives you time to compare categories, brands, and prices instead of buying whatever is available in a hurry. Keep the exact size, load index, and speed rating handy, then review options that fit your vehicle and driving conditions. A planned replacement usually leads to a better tire choice and a calmer checkout.'],
        ],
        'how-to-compare-budget-mid-range-and-premium-tires' => [
            ['heading' => 'Compare tires by total value'],
            ['p' => 'The cheapest tire is not always the lowest-cost tire over time. If a tire wears quickly, rides poorly, or performs weakly in rain, the initial saving can disappear. A better comparison looks at expected tread life, wet traction, ride comfort, road noise, warranty support, and whether the tire fits the vehicle use.'],
            ['p' => 'Budget tires can still be the right answer when the vehicle is driven lightly or the shopper needs a straightforward replacement. The key is to stay realistic about tradeoffs and avoid comparing every budget model against premium tires that were built for a different performance target.'],
            ['heading' => 'When mid-range makes sense'],
            ['p' => 'Mid-range options often suit drivers who want dependable quality without paying for the most advanced construction or brand prestige. They can be especially attractive for daily commuters, compact SUVs, family vehicles, and drivers replacing a full set at once.'],
            ['p' => 'Premium tires are worth considering when the vehicle is kept long term, driven in challenging conditions, or expected to feel quiet and refined. The higher price can buy better engineering, stronger wet performance, more consistent handling, or a warranty that adds confidence over the life of the tire.'],
            ['heading' => 'Keep the comparison fair'],
            ['p' => 'Compare tires inside the same size and category first. A budget all-season touring tire, a mid-range highway tire, and a premium performance tire may all fit the rim, but they are not trying to solve the same problem. Narrow the category, then compare price, brand, and availability.'],
        ],
        'shopping-tire-deals-without-choosing-the-wrong-fit' => [
            ['heading' => 'Filter first, discount second'],
            ['p' => 'A sale price can distract from the basics. The tire still has to match the full size, load index, speed rating, and vehicle use. Filtering by fitment before looking at promotions keeps the deal list clean and prevents a low price from pulling you toward the wrong product.'],
            ['p' => 'This matters most when several sizes look similar. A tire that is close in width or rim diameter is not automatically compatible. Even small differences can affect clearance, handling, speedometer accuracy, or whether the tire can be mounted on the wheel.'],
            ['heading' => 'Read the offer details'],
            ['p' => 'Some promotions apply only to selected brands, selected quantities, or specific product lines. Others may depend on stock status, delivery location, or a minimum order value. Check those details before you compare two deals side by side so the final checkout price does not surprise you.'],
            ['p' => 'Also compare what is included beyond the tire price. Delivery, installation planning, warranty coverage, and return rules all affect the real value of the offer. A slightly higher tire price can be the better buy when the rest of the purchase is clearer and easier.'],
            ['heading' => 'Buy with a simple order of decisions'],
            ['p' => 'Confirm the fit, choose the tire category, compare trusted brands, then review discounts. That sequence keeps the decision professional and practical. You still get the benefit of promotions, but only after the tire has already earned a place on your shortlist.'],
        ],
    ];

    foreach ($posts as &$post_data) {
        if (!empty($extra_content[$post_data['slug']])) {
            $post_data['content'] = array_merge($post_data['content'], $extra_content[$post_data['slug']]);
        }
    }
    unset($post_data);

    $build_content = static function ($post_data) {
        $content = '';

        foreach ($post_data['content'] as $block) {
            if (!empty($block['heading'])) {
                $content .= '<!-- wp:heading {"level":2} --><h2>' . esc_html($block['heading']) . '</h2><!-- /wp:heading -->';
                continue;
            }

            if (!empty($block['list']) && is_array($block['list'])) {
                $content .= '<!-- wp:list --><ul>';

                foreach ($block['list'] as $item) {
                    $content .= '<li>' . esc_html($item) . '</li>';
                }

                $content .= '</ul><!-- /wp:list -->';
                continue;
            }

            if (!empty($block['p'])) {
                $content .= '<!-- wp:paragraph --><p>' . wp_kses_post($block['p']) . '</p><!-- /wp:paragraph -->';
            }
        }

        return $content;
    };

    foreach ($posts as $post_data) {
        $existing_post = get_page_by_path($post_data['slug'], OBJECT, 'post');
        $content       = $build_content($post_data);

        if ($existing_post) {
            wp_update_post([
                'ID'           => $existing_post->ID,
                'post_title'   => $post_data['title'],
                'post_excerpt' => $post_data['excerpt'],
                'post_content' => $content,
            ]);
            wp_set_post_categories($existing_post->ID, [$category_id], false);
            update_post_meta($existing_post->ID, '_dawp_blog_image', esc_url_raw($post_data['image']));
            continue;
        }

        $post_id = wp_insert_post([
            'post_title'    => $post_data['title'],
            'post_name'     => $post_data['slug'],
            'post_excerpt'  => $post_data['excerpt'],
            'post_content'  => $content,
            'post_status'   => 'publish',
            'post_type'     => 'post',
            'post_category' => [$category_id],
        ]);

        if (!is_wp_error($post_id)) {
            update_post_meta($post_id, '_dawp_blog_image', esc_url_raw($post_data['image']));
        }
    }

    update_option('dawp_blog_seeded', 11);
}
