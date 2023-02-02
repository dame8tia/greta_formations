<?php get_header(); ?>

<p class="">Single</p>

  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
	
	<article class="post">
		<?php if ( has_post_thumbnail() ): ?>
			<div class="post__thumbnail">
				<?php the_post_thumbnail('thumbnail'); ?>
			</div>
		<?php endif; ?>

		<h1><?php the_title(); ?></h1>

		<div class="post__meta">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
			<div class= "row">
				<div class="col-sm-6">
					Publié le <?php the_date(); ?>
					par <?php the_author(); ?>
				</div>
				<div class="col-sm-6">
					Dans la catégorie <?php the_category(); ?>
					</br>
					Avec les étiquettes <?php the_tags(); ?>
				</br>
				</div>
			</div>
		</div>

		<div class="post__content">
			<div class="row">
				<div class="col-sm-6">
					<?php the_content(); ?>
				</div>
			</div>
	  	</div>
	</article>

<?php endwhile; endif; ?>
<?php get_footer(); ?>

<!--  <img src="<?php /* the_post_thumbnail_url();  */?>" alt="" width=100px height=100px> -->
