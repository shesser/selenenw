<?php /* Template Name: Model Listing */ ?>
<?php get_header(); ?>

<main class="main" role="main">
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
    <div class="results"></div>
    <!-- //Results -->
</main>

<script type="text/javascript">
    jQuery(document).ready(function () {
        loadModels();
    });
</script>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
