<?php
get_header();
?>

<!-- content -->
<div class="content_area container_child">
    <?php get_template_part('navbar'); ?>
    <!-- //page not found -->
<div class="page_not_fount_grand_parent">
    <div class="page_not_found_parent">
        <h1 class="text404">404</h1>
        <h2 class="pagentfndtexthead">Page Not Found</h2>
        <p class="textcontent404">You are Trying to Access a non-existing URL.</p>
        <div class="page_not_found_child pagen_not_fount_btn_cls_div">
            <a href="<?php echo home_url(); ?>" class="goto_home_link"><button class="goto_home_btn">Go to Home</button></a>
        </div>
    </div>
</div>
</div>

<!-- footer -->
<?php get_footer(); ?>
