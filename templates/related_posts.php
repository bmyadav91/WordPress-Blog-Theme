<?php
// Get the current post ID
$current_post_id = get_the_ID();

// Get the categories of the current post
$categories = get_the_category($current_post_id);

if (!empty($categories)) {
    // Get the first category (assuming a post is assigned to one category)
    $current_category = $categories[0]->slug;

    // Define the number of recent posts to display
    $number_of_posts = 4; // Adjust as needed

    // Query recent posts from the current category, excluding the current post
    $args = array(
        'category_name' => $current_category,
        'post__not_in' => array($current_post_id),
        'posts_per_page' => $number_of_posts,
    );

    $recent_posts = new WP_Query($args);

    if ($recent_posts->have_posts()) :
?>
        <div class="related_posts_grand_parent">
            <div class="heading_container">
                <h3 class="heading_txt">Related Posts</h3>
            </div>
            <div class="related_post_parent">
                <?php while ($recent_posts->have_posts()) :
                    $recent_posts->the_post();
                ?>
                    <div class="related_post_child">
                        <div class="recent_img_container">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('full');
                                }
                                $recent_post_title = get_the_title();
                                if (strlen($recent_post_title) > 60) {
                                    $recent_post_title = substr($recent_post_title, 0, 55) . "...";
                                }
                                ?>
                            </a>
                        </div>
                        <div class="recent_post_text">
                            <h4 class="heading_txt"><a href="<?php the_permalink(); ?>"><?php echo $recent_post_title ?></a></h4>
                            <span class="author_name_with_link">By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="author_link"><?php the_author(); ?></a></span>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php
        // Restore the global post object
        wp_reset_postdata();
    endif;
}
?>
