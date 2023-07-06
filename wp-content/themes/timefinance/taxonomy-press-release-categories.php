<?php
/**
 * PRESS RELEASE CATEGORY PAGE
 *
 * @package TIMEFINANCE
 */

$press_release_title           = get_field( 'press_release_title', 'option' );
$press_release_select_tag      = get_field( 'press_release_select_tag', 'option' );
$press_release_content         = get_field( 'press_release_content', 'option' );
$press_release_view_all_button = get_field( 'press_release_view_all_button', 'option' );
?>
<section class="press-releases-category">
	<div class="container">
		<?php
		if ( ! empty( $press_release_title ) || ! empty( $press_release_content ) ) {
			?>
			<div class="row">
				<div class="col-9">
					<?php
					if ( ! empty( $press_release_title ) ) {
						echo '<' . esc_attr( $press_release_select_tag ) . ' class="section-title h-4">' . esc_html( $press_release_title ) . '</' . esc_attr( $press_release_select_tag ) . '>';
					}
					if ( ! empty( $press_release_content ) ) {
						echo $press_release_content; //phpcs:ignore
					}
					?>
				</div>
			</div>
			<?php
		}
		?>
		<div class="row">
			<div class="col-3">
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
					if ( $press_release_view_all_button && ! empty( $press_release_view_all_button['url'] ) && ! empty( $press_release_view_all_button['title'] ) ) {
						?>
						<li class="press-release-cat-list">
							<?php
							$link_url    = $press_release_view_all_button['url'];
							$link_title  = $press_release_view_all_button['title'];
							$link_target = $press_release_view_all_button['target'] ? $press_release_view_all_button['target'] : '_self';
							?>
							<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-link" target="<?php echo esc_attr( $link_target ); ?>">
								<?php echo esc_html( $link_title ); ?>
							</a>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
			<?php
			if ( have_posts() ) {
				?>
				<div class="col-9 press-releases-wrapper">
					<div class="row row-cols-1 row-cols-lg-2">
						<?php
						while ( have_posts() ) {
							the_post();
							$read_more_button = get_field( 'read_more_button' );
							?>
							<div class="col text-center">
								<div class="press-release-box">
									<?php
									if ( get_the_post_thumbnail() ) {
										?>
										<div class="press-release-image">
											<?php the_post_thumbnail(); ?>
										</div>
										<?php
									}
									?>
									<div class="press-release-content">
										<div class="press-release-date">
											<?php
											echo get_the_date( 'm F Y', get_the_ID() ) . ' / ' . wp_strip_all_tags( get_the_term_list( get_the_ID(), 'press-release-categories', ' ', ', ', ' ' ) ); //phpcs:ignore
											?>
										</div>
										<?php
										if ( get_the_title() ) {
											?>
											<div class="press-release-title">
												<a href="<?php echo get_the_permalink(); //phpcs:ignore ?>"><?php echo get_the_title(); //phpcs:ignore ?></a>
											</div>
											<?php
										}
										if ( get_the_content() ) {
											echo get_the_content(); //phpcs:ignore
										}
										if ( ! empty( $read_more_button ) ) {
											?>
											<div class="read-more btn">
												<a href="<?php echo get_the_permalink(); //phpcs:ignore ?>"><?php echo esc_html( $read_more_button ); ?></a>
											</div>
											<?php
										}
										?>
									</div>
								</div>
							</div>
							<?php
							wp_reset_postdata();
						}
						?>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>
