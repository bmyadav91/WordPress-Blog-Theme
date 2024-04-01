<div class="recent_posts">
    <div class="heading_container first_heading">
        <h3 class="heading_txt sidebar_heading">Recent Posts</h3>
    </div>

    <?php
    // Define the number of recent posts to display
    $number_of_posts = 5; // Adjust as needed

    // Query recent posts
    $args = array(
        'posts_per_page' => $number_of_posts,
    );

    $recent_posts = new WP_Query($args);

    if ($recent_posts->have_posts()) :
    ?>

    <div class="recent_post_parent">
        <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
        <div class="recent_post_child">
            <div class="img_container recent_mini_child">
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
            <div class="text_container recent_mini_child">
                <a href="<?php the_permalink(); ?>">
                    <h4 class="heading_txt"><?php echo $recent_post_title ?></h4>
                </a>
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="author_name">By <?php the_author(); ?></a>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php
    // Restore the global post object
    wp_reset_postdata();
    endif;
    ?>
</div>
