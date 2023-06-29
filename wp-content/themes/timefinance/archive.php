<?php
/**
 * ARCHIVE PAGE
 *
 * @package TIMEFINANCE
 */

$time_blog_title = get_field( 'time_blog_title', 'option' );
$time_blog_select_tag = get_field( 'time_blog_select_tag', 'option' );
$time_blog_content    = get_field( 'time_blog_content', 'option' );
$time_blog_view_all_button    = get_field( 'time_blog_view_all_button', 'option' );

?>
<section class="time-blog-category">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php
				if ( ! empty( $time_blog_title ) ) {
					echo '<' . esc_attr( $time_blog_select_tag ) . ' class="section-title h-2">' . esc_html( $time_blog_title ) . '</' . esc_attr( $time_blog_select_tag ) . '>';
				}
				echo $time_blog_content; //phpcs:ignore
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
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
			<div class="col-8">
				<div class="row">
					<?php
					while ( have_posts() ) {
						the_post();
						$read_more_button = get_field( 'read_more_button' );
						?>
						<div class="col">
							<div class="time-blog-box">
								<div class="time-blog-image">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="time-blog-conent">
									<div class="time-blog-date">
										<?php
										echo get_the_date();
										echo wp_strip_all_tags( get_the_term_list( get_the_ID(), 'category', ' ', ', ', ' ' ) ); //phpcs:ignore
										?>
									</div>
									<div class="time-blog-title">
										<?php echo get_the_title(); //phpcs:ignore ?>
									</div>
									<div class="time-blog-content">
										<?php echo get_the_content(); //phpcs:ignore ?>
									</div>
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
