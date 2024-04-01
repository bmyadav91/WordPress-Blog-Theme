<div class="navbar_grand_parent">
    <div class="navbar_parent nav_bar_desk">
        <div class="navbar_child nav_child_one">
            <strong class="logo_heading_txt"><a href="<?php echo home_url(); ?>"><?php $site_title = get_bloginfo('name');
echo $site_title; ?></a></strong>
        </div>
        <div class="navbar_child nav_child_two">
            <?php wp_nav_menu(array('theme_location' => 'NavBar', 'menu_class' => 'navbar_one')); ?>
            <div class="icons_cls">
                <i class="bi bi-search" id="search_button_nav"></i>
                <i class="bi bi-list" id="nav_hamburg"></i>
            </div>
        </div>
    </div>
    <div class="search_bar_container" id="searchContainer">
        <form class="search_form" method="get">
            <input class="search_bar_inp_cls" placeholder="Search Here..." name="s" maxlength="100"/>
            <button><i class="bi bi-search"></i></button>
        </form>
    </div>
    <div class="navbar_mobile">
        <div class="navbar_child">
            <?php wp_nav_menu(array('NavBar'=>'NavBar', 'menu_class'=>'navbar_one')); ?>
        </div>
    </div>
</div>