<?php /* Template Name: Yacht Listing */ ?>
<?php get_header(); ?>

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

    <div class="preloader" id="yacht-listing-load">
        <div>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- Results -->
    <div class="results offset" style="margin-top: 0;">

    </div>
    <!-- //Results -->
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
