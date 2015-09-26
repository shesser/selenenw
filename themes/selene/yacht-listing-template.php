<?php /* Template Name: Yacht Listing */ ?>
<?php get_header(); ?>

<main class="main" role="main">
    <!-- FullWidth -->
    <aside class="full-width sidebar sidebar-top fixed">
        <!-- Refine search results -->
        <div class="search-filter">
            <div class="wrap">
                <!-- Column -->
                <div class="one-third">
                    <p>Listing Type</p>
                    <div class="checkbox">
                        <input type="checkbox" id="ch1" value="our-listing" name="listing-filter" checked="checked"/>
                        <label for="ch3">Our Listings</label>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" id="ch2" value="other-listing" name="listing-filter" />
                        <label for="ch4">All Selene Listings</label>
                    </div>
                </div>
                <!-- //Column -->

                <!-- Column -->
                <div class="one-third">
                    <p>Year built</p>
                    <div class="checkbox">
                        <input type="checkbox" id="ch3" value="less-5" name="year-filter"/>
                        <label for="ch3">Less than 5 years ago</label>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" id="ch4" value="greater-5" name="year-filter" />
                        <label for="ch4">More than 5 years ago</label>
                    </div>
                </div>
                <!-- //Column -->

                <!-- Column -->
                <div class="one-third">
                    <p>Sort by</p>
                    <div>
                        <select name="sort-filter" id="sort-filter">
                            <option selected="selected" value="0">- Select -</option>
                            <option value="price-asc">Price - ascending</option>
                            <option value="price-desc">Price - decending</option>
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

    <div class="preloader" id="yacht-listing-load" style="display: none;">
        <div>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- Results -->
    <div class="results offset"></div>
    <!-- //Results -->
</main>

<script type="text/javascript">
    jQuery(document).ready(function () {
        loadYachts();
    });
</script>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
