<?php
get_header();
?>

<div class="content_area container_child">
    <?php get_template_part('navbar'); ?>
    <div class="single_post_grand_parent">
        <div class="sing_post_main_parent">
            <div class="single_post_child post_content">
                <!-- the title  -->
                <div class="blog_heading">
                    <h1 class="heading_txt"><?php the_title(); ?></h1>
                </div>

                
                <!-- the content  -->
                <div class="conent_area">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="single_post_child post_side_bar sidebar_grandparent">
                <div class="sidebar_widget_cls parent_sidebar">
                    <?php dynamic_sidebar('sidebar_widget'); ?>
                </div>

                <div class="sidebar_parent_one parent_sidebar">
                    <?php include(get_template_directory() . '/templates/related_posts_sidebar.php'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer  -->
<?php get_footer(); ?>
