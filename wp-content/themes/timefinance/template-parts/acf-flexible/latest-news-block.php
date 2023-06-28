<?php
/**
 * LATEST NEWS BLOCK
 *
 * @package TIMEFINANCE
 */

$main_title  = get_sub_field( 'title' );
$select_tag  = get_sub_field( 'select_tag' );
$select_post = get_sub_field( 'select_post' );
$section_id  = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'latest-news-block-' );

?>
<section class="latest-news-block" id="<?php echo $section_id; //phpcs:ignore ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php
				if ( ! empty( $main_title ) ) {
					echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
				}
				?>
			</div>
		</div>
		<div class="row row-cols-1 row-cols-lg-3">
			<?php
			$args = array(
				'post_type'      => $select_post,
				'post_status'    => 'publish',
				'posts_per_page' => 3,
				'orderby'        => 'post_date',
			);
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) {
				$loop->the_post();
				$read_more_button = get_field( 'read_more_button' );
				?>
				<div class="col">
					<div class="latest-news-image">
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="latest-news-content-box">
						<div class="latest-news-title">
							<?php echo get_the_title(); //phpcs:ignore ?>
						</div>
							<?php echo get_the_content(); //phpcs:ignore ?>
						<div class="read-more btn">
							<a href="<?php echo get_the_permalink(); //phpcs:ignore ?>"><?php echo esc_html( $read_more_button ); ?></a>
						</div>
					</div>
				</div>
				<?php
				wp_reset_postdata();
			}
			?>
		</div>
	</div>
</section>
