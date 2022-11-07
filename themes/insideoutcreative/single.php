<?php get_header(); ?>
<section class="pt-5 pb-5 body">
<div class="container">
    <div class="row justify-content-center">
    <?php get_template_part('partials/sidebar'); ?>
        <div class="col-lg-9 col-md-12 order-lg-2 order-1">
        <p class="mb-0"><?php echo get_the_author_posts_link(); ?></p>
        <p><?php the_time('F jS, Y'); ?></p>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
        </div>
        <!-- <div class="col-lg-3"> -->
            
        <!-- </div> -->
    </div>
    <div class="row justify-content-center pt-5">
        <div class="col-md-6" id="previous">
        <small>Previous</small>
        <h3 class="h5"><?php previous_post_link(); ?></h3>
        </div>
        <div class="col-md-6 text-right" id="next">
            <small>Next</small>
        <h3 class="h5"><?php next_post_link(); ?></h3>
        </div>
    </div>
</div>
</section>
<?php get_footer(); ?>