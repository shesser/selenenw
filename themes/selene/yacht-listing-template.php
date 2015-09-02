<?php /* Template Name: Yacht Listing */ ?>
<?php get_header(); ?>

<?php
$html = get_yacht_listing() ;

if ( $html ) {
    $doc = new DOMDocument();
    $doc->preserveWhiteSpace = true;
    //$doc->loadHTMLFile( 'C:\xampp\htdocs\selene\wp-content\themes\selene\listing.html' );

    @$doc->loadHTML( $html );
    //echo $doc->getElementsByTagName('form')->item(0)->getNodePath(); die;
    $xpath = new DOMXpath( $doc );
    //echo $xpath->document->getElementsByTagName('form')->item(0)->getNodePath(); die;
    $rows = $xpath->query( '/html/body/table/tr/td/table/tr[3]/td/form/table/tr[2]/td/table/tr');
    //echo $rows->item(0)->getNodePath();
    //die;
}
?>

<main class="main" role="main">
    <!-- FullWidth -->
    <aside class="full-width sidebar sidebar-top fixed" style="display: none;">
        <!-- Refine search results -->
        <div class="search-filter">
            <div class="wrap">
                <!-- Column -->
                <div class="one-fourth">
                    <p>Yacht type</p>
                    <div class="checkbox">
                        <input type="checkbox" id="ch1" />
                        <label for="ch1">Motor</label>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" id="ch2" />
                        <label for="ch2">Sailing</label>
                    </div>
                </div>
                <!-- //Column -->

                <!-- Column -->
                <div class="one-fourth">
                    <p>Year built</p>
                    <div class="checkbox">
                        <input type="checkbox" id="ch3" />
                        <label for="ch3">Less than 5 years ago</label>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" id="ch4" />
                        <label for="ch4">More than 5 years ago</label>
                    </div>
                </div>
                <!-- //Column -->

                <!-- Column -->
                <div class="one-fourth">
                    <p>Berths</p>
                    <div class="checkbox">
                        <input type="checkbox" id="ch5" />
                        <label for="ch5">3 or less</label>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" id="ch6" />
                        <label for="ch6">4-6</label>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" id="ch7" />
                        <label for="ch7">6 or more</label>
                    </div>
                </div>
                <!-- //Column -->

                <!-- Column -->
                <div class="one-fourth">
                    <p>Sort by</p>
                    <div>
                        <select>
                            <option selected>Price - ascending</option>
                            <option>Price - decending</option>
                            <option>Popularity</option>
                            <option>Date</option>
                        </select>
                    </div>
                </div>
                <!-- //Column -->

                <a href="javascript:void(0)" title="Hide this box" class="filter-hide">Hide this box</a>
            </div>
        </div>
        <!-- //Refine search results -->
    </aside>
    <!-- //FullWidth -->

    <a class="filter-show" title="Show search filters" href="javascript:void(0)">+</a>

    <!-- Results -->
    <div class="results offset" style="margin-top: 0;">
        <?php foreach ( $rows as $key => $value ) {
            if( $key == 0 ) //Skipping the first row because it contains headers
                continue;
            $name_node = $xpath->query( 'td', $value )->item( 4 );
            parse_str( substr( html_entity_decode( $xpath->query( 'a', $name_node )->item( 0 )->getAttribute( 'href' ) ), 49 ), $yacht_parameters );

            $name = str_replace(array("\xC2", "\xA0"), '', trim($name_node->nodeValue));
            $length = str_replace(array("\xC2", "\xA0"), '', trim($xpath->query('td', $value)->item(3)->nodeValue));
            $built = str_replace(array("\xC2", "\xA0"), '', trim($xpath->query('td', $value)->item(5)->nodeValue));
            $price = str_replace(array("\xC2", "\xA0"), '', trim($xpath->query('td', $value)->item(6)->nodeValue));
            //$url = get_permalink() . sanitize_title( $name ) . '/' . $yacht_parameters[ 'boat_id' ] . '/' . $yacht_parameters[ 'slim' ];
            $url = get_permalink() . '#' . sanitize_title( $name );

            ?>
            <!-- Item -->
            <figure class="one-fourth item">
                <img src="<?php echo $yacht_parameters[ 'primary_photo_url' ]; ?>" alt="" />
                <figcaption>
                    <dl>
                        <dt><?php echo $name; ?></dt>
                        <dd>Built: <?php echo $built; ?></dd>
                        <dd>Length: <?php echo $length; ?></dd>
                    </dl>
                    <div class="price">Asking price  <strong><?php echo $price; ?>$</strong></div>
                    <a href="<?php echo $url; ?>" title="" class="button small gold">Read more</a>
                </figcaption>
            </figure>
            <!-- //Item -->
        <?php
        if($key > 7)
            break;
        } ?>
    </div>
    <!-- //Results -->
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
