<?php
// enable nav menu in appreance
register_nav_menus(
    array('NavBar'=>'NavBar')
);

// enable post thumbanil in page or post 
add_theme_support('post-thumbnails');

// enable header image 
add_theme_support('custom-header');

// enable document title 
add_theme_support('title-tag');

// register sidebar 
register_sidebar(
    array(
        'name'=>'SideBar Widget',
        'id'=>'sidebar_widget'
    )
);
?>