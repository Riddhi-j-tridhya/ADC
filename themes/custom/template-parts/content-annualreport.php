<?php
/*
Template Name: Annual Report
*/

get_header();
?>

<div class="container">
    <?php if (function_exists('bcn_display')) : ?>
        <div class="breadcrumbs py-2">
            <?php bcn_display(); ?>
        </div>
    <?php endif; ?>
</div>

<style>
    body {
        margin: 0;
    }

    * {
        box-sizing: border-box;
    }

    .row>.column {
        padding: 0 8px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }

    img.hover-shadow {
        transition: 0.3s;
    }

    .hover-shadow:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .caption-container {
        text-align: center;
        background-color: black;
        padding: 2px 16px;
        color: white;
    }

    img {
        margin-bottom: -4px;
    }

    .annual-report {
        padding: 50px 0;
    }

    .annual-report .column {
        margin-bottom: 30px;
    }

    
</style>
<div class="page-banner">
    <div class="abc_container">
        <div class="row align-items-center justify-content-end">
            <div class="col-md-5 pr-5 page_banner_left py-4 py-xl-0">
                <?php
                if (have_rows('page_banner')) {
                    while (have_rows('page_banner')) {
                        the_row();
                        $page_banner_image = get_sub_field('page_banner_image');
                        $banner_title = get_sub_field('banner_title');
                        $banner_description = get_sub_field('banner_description');
                        $link = get_sub_field('link');
                        ?>
                        <div class="page_banner_detils">
                            <h2 class="page_banner_title mb-4"><?php echo $banner_title; ?></h2>
                            <p class="page_banner_dec"><?php echo $banner_description; ?></p>
                            <?php
                            if ($link) {
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="btn" data-bs-toggle="modal" data-bs-target="#popup-modal" href="#" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="col-md-7">
                <img class="w-100" src="<?php echo $page_banner_image['url']; ?>" class="hero_banner_img" alt="<?php echo $page_banner_image['alt']; ?>">
            </div>
        </div>
    </div>
</div>


<div class="annual-report">
    <div class="container">
        <div class="row" id="load-data">

    <?php fun_load_more(); ?>

				</div></div></div>

<?php
get_footer();
