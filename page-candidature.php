<?php get_header(); ?>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

    <?= the_content(); ?>	

<?php endwhile; endif; ?>

<div class="form-container">
  <?php echo do_shortcode('[contact-form-7 id="189" title="Formulaire de candidature"]'); ?>
</div>



<?php get_footer(); ?>