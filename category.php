<?php
get_header();
?>

<!-- content -->
<div class="content_area container_child">
    <?php get_template_part('navbar'); ?>
    <div class="posts_grand_parent">
        <div class="blog_heading">
            <h1 class="heading_txt"><span class="second_span"><?php single_cat_title(); ?></span></h1>
        </div>
        <div class="posts_parent">
            <?php
            while (have_posts()) {
                the_post();
                $post_id = get_the_ID();
                $post_title = get_the_title();
                $post_excerpt = get_the_excerpt();
                $author_id = get_the_author_meta('ID');
                $author_name = get_the_author();
                $author_link = get_author_posts_url($author_id);
                $post_date = get_the_date('j M Y');

                if (has_post_thumbnail()) {
                    $has_post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                    $post_thumbnail = $has_post_thumbnail[0];
                } else {
                    $post_thumbnail = get_template_directory_uri() . '/assets/img/no_preview.jpg';
                }
                $categories = get_the_category($post_id);
                $category_links = array();
                foreach ($categories as $category) {
                    $category_link = get_category_link($category->cat_ID);
                    $category_links[] = '<a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>';
                }
                $category_output = implode(' ', $category_links);

                if (strlen($post_title) > 55) {
                    $post_title = substr($post_title, 0, 55) . '...';
                }
                if (strlen($post_excerpt) > 60) {
                    $post_excerpt = substr($post_excerpt, 0, 60) . '...';
                }
                ?>
                <div class="posts_child">
                    <a href="<?php the_permalink(); ?>">
                        <div class="img_parent">
                            <img src="<?php echo $post_thumbnail; ?>" alt="<?php echo $post_title; ?>"/>
                        </div>
                    </a>
                    <div class="post_text_content">
                        <span class="category_span"><?php echo $category_output; ?></span>
                        <a href="<?php the_permalink(); ?>">
                            <h1 class="post_title"><?php echo $post_title; ?></h1>
                        </a>
                        <div class="post_date_author">
                            <span><?php echo $post_date; ?> / </span>
                            <span><a href="<?php echo esc_url($author_link); ?>"><?php echo $author_name; ?></a></span>
                        </div>
                        <p class="short_desc"><?php echo $post_excerpt; ?></p>
                    </div>
                </div>
            <?php
            } // End of the while loop
            ?>
        </div>
    </div>
    <div class="paginations_lins_container">
        <?php echo paginate_links(); ?>
    </div>
</div>

<!-- footer -->
<?php get_footer(); ?>
