<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 

if(get_field('header', 'options')) { the_field('header', 'options'); }

if(get_field('custom_css')) { 
?> 
<style>
<?php the_field('custom_css'); ?>
</style>
<?php } ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if(get_field('body','options')) { the_field('body','options'); } 

if(!is_front_page()){

echo '<div class="blank-space"></div>';
echo '<header class="position-relative pt-3 pb-3 z-3 box-shadow bg-white w-100" style="top:0;left:0;">';

echo '<div class="nav">';
echo '<div class="container-fluid">';
echo '<div class="row align-items-center justify-content-md-center justify-content-end">';

echo '<div class="col-lg-4 col-3 desktop-hidden">';

echo '<a id="navToggle" class="nav-toggle">';
echo '<div>';
echo '<div class="line-1 bg-accent"></div>';
echo '<div class="line-2 bg-accent"></div>';
echo '<div class="line-3 bg-accent"></div>';
echo '</div>';
echo '</a>';

echo '</div>';

echo '<div class="col-lg-2 col-3">';
echo '<a href="' . home_url() . '">';

$logo = get_field('logo','options'); 
if($logo){
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto','style'=>'max-width:100px;']); 
}

echo '</a>';
echo '</div>';

echo '<div class="col-8">';


wp_nav_menu(array(
    'menu' => 'Primary',
    'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-between mb-0'
));


echo '</div>';
echo '<div class="col-2">';


wp_nav_menu(array(
    'menu' => 'Contact',
    'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-end mb-0'
));


echo '</div>';


// start of mobile menu
echo '<div id="navMenuOverlay" class="position-fixed z-2"></div>';
echo '<div class="col-lg-3 col-md-8 col-11 nav-items bg-white" id="navItems">';

echo '<div class="pt-5 pb-5">';
echo '<div class="close-menu">';
echo '<div>';
echo '<span id="navMenuClose" class="close h1">X</span>';
echo '</div>';
echo '</div>';
echo '<a href="' . home_url() . '">';

$logo = get_field('logo','options'); 
if($logo){
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto','style'=>'max-width:250px;']);
}

echo '</a>';
echo '</div>';

wp_nav_menu(array(
'menu' => 'primary',
'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-start mb-0'
));
echo '</div>';


echo '<div class="col-lg-3 col-md-8 col-11 nav-items bg-white pr-0 d-none" id="navItemsTwo">';
$featured_posts = get_field('navigation_menu','options');
if( $featured_posts ):
$counterSections = 0;
foreach( $featured_posts as $post ): 
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post); 
$counterSections++;
$ID = sanitize_title_with_dashes(get_the_title());

echo '<div class="col col-12 p-0 col-dropdown-menu-images overflow-h" id="section-' . $counterSections . '">';
echo '<a href="' . get_the_permalink() . '">';
the_post_thumbnail('medium',array('class'=>'w-100 dropdown-menu-images-single'));
echo '<div class="overlay position-absolute w-100 h-100"></div>';
// <!-- <div class="pt-5 pb-5 bg-gray2 position-absolute"> -->
echo '<div class="position-absolute dropdown-menu-images-content text-center w-100 text-white z-1 pl-5 pr-5">';
echo '<p class="bold text-accent-green title text-shadow" style="font-size:200%;line-height:1;">' . get_the_title() . '</p>';
echo '</div>';
// <!-- </div> -->
echo '</a>';
echo '</div>';

endforeach;
// Reset the global post object so that the rest of the page works correctly.
wp_reset_postdata();
endif; 
echo '</div>';
// end of mobile navigation


echo '</div>';
echo '</div>';
echo '</div>';

echo '</header>';




if(!is_page() && !is_front_page() && !is_single()){
echo '<section class="hero position-relative">';
$globalPlaceholderImg = get_field('global_placeholder_image','options');
if(is_page()){
if(has_post_thumbnail()){
the_post_thumbnail('full', array('class' => 'w-100 h-100 bg-img position-absolute'));
} else {
echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 h-100 bg-img position-absolute']);
}
} else {
echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 h-100 bg-img position-absolute']);
}




echo '<div class="container pt-5 pb-5 text-white text-center">';
echo '<div class="row">';
echo '<div class="col-md-12">';

if(is_page() && !is_front_page()){
echo '<h1 class="">' . get_the_title() . '</h1>';
} elseif(is_single()){
echo '<h1 class="single-title">' . single_post_title() . '</h1>';
} elseif(is_author()){
echo '<h1 class="author-title">Author: ' . get_the_author() . '</h1>';
} elseif(is_tag()){
echo '<h1 class="tag-title">' . get_single_tag_title() . '</h1>';
} elseif(is_category()){
echo '<h1 class="category-title">' . get_single_cat_title() . '</h1>';
} elseif(is_archive()){
echo '<h1 class="archive-title">' . get_archive_title() . '</h1>';
} 
elseif(!is_front_page() && is_home()){
echo '<h1 class="text-shadow">The Morgan Birgé Blog</h1>';
echo '<h2 class="text-shadow">Welcome to our little corner of the Internet. Kick your feet up and stay a while.</h2>';
}
echo '</div>';
echo '</div>';
echo '</div>';

echo '</section>';
}

}
?>