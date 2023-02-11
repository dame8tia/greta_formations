
<?php get_template_part('template-part-module'); ?>

<?php get_template_part('template-part-tab'); ?>

<?php wp_reset_postdata();?>
<?php
    $query = new WP_Query(
        [
        'post_type'=> 'page',
        'name'=>'dao'       
        ]
    );

    while($query->have_posts()): $query->the_post();?>
    <div class="col">
    <h1><?= the_title(); ?></h1>
    <?= the_content(); ?>
    <?php endwhile;?>

    <?php wp_reset_postdata();?>
    

<?php get_footer(); ?>