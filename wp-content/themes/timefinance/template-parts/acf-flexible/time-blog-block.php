<?php
/**
 * TIME BLOG BLOCK
 *
 * @package TIMEFINANCE
 */

$main_title = get_sub_field( 'title' );
$select_tag = get_sub_field( 'select_tag' );
$content    = get_sub_field( 'content' );
$time_blog_view_all_button    = get_field( 'time_blog_view_all_button', 'option' );
$section_id = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'time-blog-block-' );

?>
<section class="time-blog-block" id="<?php echo $section_id; //phpcs:ignore ?>">
	<div class="container">
		<div class="row">
			<div class="col-9">
				<?php
				if ( ! empty( $main_title ) ) {
					echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
				}
				echo $content; //phpcs:ignore
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<div class="cat-filter">
					<?php echo esc_html( 'FILTER POSTS:' ); ?>
				</div>
				<ul>
					<?php
					$args       = array(
						'taxonomy' => 'category',
					);
					$categories = get_categories( $args );

					foreach ( $categories as $category ) {
						?>
						<li class="time-blog-cat-list">
							<a href="<?php echo get_category_link( $category->term_id ); //phpcs:ignore ?>"><?php echo $category->name; ?> </a>
						</li>
						<?php
					}
					?>
					<li class="time-blog-cat-list">
						<?php
						if ( $time_blog_view_all_button && ! empty( $time_blog_view_all_button['url'] ) && ! empty( $time_blog_view_all_button['title'] ) ) {
							$link_url    = $time_blog_view_all_button['url'];
							$link_title  = $time_blog_view_all_button['title'];
							$link_target = $time_blog_view_all_button['target'] ? $time_blog_view_all_button['target'] : '_self';
							?>
							<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-link" target="<?php echo esc_attr( $link_target ); ?>">
								<?php echo esc_html( $link_title ); ?>
							</a>
							<?php
						}
						?>
					</li>
				</ul>
			</div>
			<div class="col-9 time-blog-wrapper">
				<div class="row row-cols-1 row-cols-lg-2">
					<?php
					$args = array(
						'post_type'   => 'post',
						'post_status' => 'publish',
						'orderby'     => 'post_date',
					);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) {
						$loop->the_post();
						$read_more_button = get_field( 'read_more_button' );
						?>
						<div class="col text-center">
							<div class="time-blog-box">
								<div class="time-blog-image">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="time-blog-content">
									<div class="time-blog-date">
										<?php
										echo get_the_date( 'm F Y', get_the_ID() );
										echo wp_strip_all_tags( get_the_term_list( get_the_ID(), 'category', ' ', ', ', ' ' ) ); //phpcs:ignore
										?>
									</div>
									<div class="time-blog-title">
										<?php echo get_the_title(); //phpcs:ignore ?>
									</div>
										<?php echo get_the_content(); //phpcs:ignore ?>
									<div class="read-more btn">
										<a href="<?php echo get_the_permalink(); //phpcs:ignore ?>"><?php echo esc_html( $read_more_button ); ?></a>
									</div>
								</div>
							</div>
						</div>
						<?php
						wp_reset_postdata();
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
