<?php
/**
 * PRESS RELEASE CATEGORY PAGE
 *
 * @package TIMEFINANCE
 */

$press_release_title = get_field( 'press_release_title', 'option' );
$press_release_select_tag = get_field( 'press_release_select_tag', 'option' );
$press_release_content    = get_field( 'press_release_content', 'option' );
$press_release_view_all_button    = get_field( 'press_release_view_all_button', 'option' );
?>
<section class="press-releases-category">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php
				if ( ! empty( $press_release_title ) ) {
					echo '<' . esc_attr( $press_release_select_tag ) . ' class="section-title h-2">' . esc_html( $press_release_title ) . '</' . esc_attr( $press_release_select_tag ) . '>';
				}
				echo $press_release_content; //phpcs:ignore
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
						'taxonomy' => 'press-release-categories',
					);
					$categories = get_categories( $args );

					foreach ( $categories as $category ) {
						?>
						<li class="press-release-cat-list">
							<a href="<?php echo get_category_link( $category->term_id ); //phpcs:ignore ?>"><?php echo $category->name; ?> </a>
						</li>
						<?php
					}
					?>
					<li class="press-release-cat-list">
						<?php
						if ( $press_release_view_all_button && ! empty( $press_release_view_all_button['url'] ) && ! empty( $press_release_view_all_button['title'] ) ) {
							$link_url    = $press_release_view_all_button['url'];
							$link_title  = $press_release_view_all_button['title'];
							$link_target = $press_release_view_all_button['target'] ? $press_release_view_all_button['target'] : '_self';
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
							<div class="press-release-box">
								<div class="press-release-image">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="press-release-conent">
									<div class="press-release-date">
										<?php
										echo get_the_date();
										echo wp_strip_all_tags( get_the_term_list( get_the_ID(), 'press-release-categories', ' ', ', ', ' ' ) ); //phpcs:ignore
										?>
									</div>
									<div class="press-release-title">
										<?php echo get_the_title(); //phpcs:ignore ?>
									</div>
									<div class="press-release-content">
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
