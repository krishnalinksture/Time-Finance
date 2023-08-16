<?php
/**
 * PRESS RELEASES BLOCK
 *
 * @package TIMEFINANCE
 */

$main_title                    = get_sub_field( 'title' );
$select_tag                    = get_sub_field( 'select_tag' );
$content                       = get_sub_field( 'content' );
$press_release_view_all_button = get_field( 'press_release_view_all_button', 'option' );
$section_id                    = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'press-releases-block-' );

if ( ! empty( $main_title ) || ! empty( $content ) ) {
	?>
	<section class="press-releases-block" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container">
			<?php
			if ( ! empty( $main_title ) || ! empty( $content ) ) {
				?>
				<div class="row">
					<div class="col-xl-9 col-lg-11 col-md-12">
						<?php
						if ( ! empty( $main_title ) ) {
							echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
						}
						if ( ! empty( $content ) ) {
							echo $content; //phpcs:ignore
						}
						?>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</section>
	<?php
}
?>
<section class="press-release-filter-block">
	<div class="container">
		<div class="row align-items-start">
			<div class="col col-lg-3 col-md-7 filter-post-left d-none d-md-block">
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
			<div class="dropdown d-md-none">
				<div class="cat-filter">
					<?php echo esc_html( 'FILTER POSTS:' ); ?>
				</div>
				<button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuBdt" data-bs-toggle="dropdown" aria-expanded="false">
					<?php echo esc_html( 'View All' ); ?>
				</button>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenuBdt">
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
			<div class="col col-lg-9 col-md-12 press-releases-wrapper">
				<div class="row row-cols-1 row-cols-md-2">
					<?php
					$args = array(
						'post_type'   => 'press-release',
						'post_status' => 'publish',
						'orderby'     => 'post_date',
					);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) {
						$loop->the_post();
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
										$category_name = wp_strip_all_tags( get_the_term_list( get_the_ID(), 'press-release-categories', ' ', ', ', ' ' ) );
										if ( $category_name ) {
											echo get_the_date( 'm F Y', get_the_ID() ) . ' / ' . $category_name; //phpcs:ignore
										} else {
											echo get_the_date( 'm F Y', get_the_ID() ); //phpcs:ignore
										}
										?>
									</div>
									<?php
									if ( get_the_title() ) {
										?>
										<div class="press-release-title">
											<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
										</div>
										<?php
									}
									if ( get_the_excerpt() ) {
										?>
										<p><?php echo get_the_excerpt(); //phpcs:ignore ?></p>
										<?php
									}
									if ( ! empty( $read_more_button ) ) {
										?>
										<div class="read-more btn">
											<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( $read_more_button ); ?></a>
										</div>
										<?php
									} else {
										?>
										<div class="read-more btn">
											<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( 'Read More' ); ?></a>
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
		</div>
	</div>
</section>
