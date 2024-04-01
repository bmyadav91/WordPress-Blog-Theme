<?php
get_header();
the_post();
?>

<div class="content_area container_child">
    <?php get_template_part('navbar'); ?>
    <div class="single_post_grand_parent">
        <div class="sing_post_main_parent">
            <div class="single_post_child post_content">
                <!-- The title -->
                <div class="blog_heading">
                    <h1 class="heading_txt"><?php the_title(); ?></h1>
                </div>

                <!-- The featured image -->
                <?php
                if (has_post_thumbnail()) {
                    $has_post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                    $post_thumbnail_id = get_post_thumbnail_id();
                    $post_thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
                    $post_thumbnail = "<img src='$has_post_thumbnail[0]' alt='$post_thumbnail_alt'/>";
                }
                ?>
                <div class="author_and_cates">
                    <?php
                    $author_id = get_the_author_meta('ID');
                    $author_name = get_the_author();
                    $author_link = get_author_posts_url($author_id);
                    $author_avatar = get_avatar_url($author_id, array('size' => 100));
                    ?>
                    <div class="authour_by">
                        <div class="author_profile">
                            <a href="<?php echo esc_url($author_link); ?>">
                                <img src="<?php echo $author_avatar; ?>" />
                            </a>
                        </div>
                        <div class="author_name">
                            <strong class="authour_txt"><a href="<?php echo esc_url($author_link); ?>"><?php echo esc_html($author_name); ?></a></strong>
                        </div>
                    </div>
                    <div class="category_parent">
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            foreach ($categories as $category) {
                                $category_link = get_category_link($category->term_id);
                                $category_links[] = '<a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>';
                            }
                            echo implode(' ', $category_links);
                        }
                        ?>
                    </div>
                </div>
                <div class="featured_image_container">
                    <?php
                    if (isset($post_thumbnail)) {
                        echo $post_thumbnail;
                    }
                    ?>
                </div>
                <!-- The content -->
                <div class="conent_area">
                    <?php the_content(); ?>
                </div>

                <!-- Related posts -->
                <?php include(get_template_directory() . '/templates/related_posts.php'); ?>

                <!-- comments  -->
                <div class="comments_template_inbuilt">
                    <?php comments_template(); ?>
                </div>
            </div>


            <div class="single_post_child post_side_bar sidebar_grandparent">
                <div class="sidebar_parent_one parent_sidebar">
                    <?php include(get_template_directory() . '/templates/related_posts_sidebar.php'); ?>
                </div>
                <div class="sidebar_widget_cls parent_sidebar">
                    <?php dynamic_sidebar('sidebar_widget'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer  -->
<?php get_footer(); ?>