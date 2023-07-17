<?php
/**
 * OUR TEAM BLOCK
 *
 * @package TIMEFINANCE
 */

$main_title                    = get_sub_field( 'title' );
$select_tag                    = get_sub_field( 'select_tag' );
$content                       = get_sub_field( 'content' );
$view_all                      = get_sub_field( 'view_all' );
$press_release_view_all_button = get_field( 'press_release_view_all_button', 'option' );
$section_id                    = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'our-team-block-' );

?>
<section class="our-team-block" id="<?php echo $section_id; //phpcs:ignore ?>">
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
<section class="our-team-filter-block">
	<div class="container">
		<div class="row align-items-start">
			<div class="col col-lg-3 col-md-7 filter-post-left d-none d-md-block">
				<div class="cat-filter">
					<?php echo esc_html( 'FILTER POSTS:' ); ?>
				</div>
				<ul>
					<?php
					$args       = array(
						'taxonomy' => 'our-teams-categories',
					);
					$categories = get_categories( $args );

					foreach ( $categories as $category ) {
						?>
						<li class="our-team-cat-list">
							<a href="<?php echo get_category_link( $category->term_id ); //phpcs:ignore ?>"><?php echo $category->name; ?> </a>
						</li>
						<?php
					}
					if ( $view_all && ! empty( $view_all['url'] ) && ! empty( $view_all['title'] ) ) {
						?>
						<li class="our-team-cat-list">
							<?php
							$link_url    = $view_all['url'];
							$link_title  = $view_all['title'];
							$link_target = $view_all['target'] ? $view_all['target'] : '_self';
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
					<?php echo esc_html( 'Teams' ); ?>
				</button>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenuBdt">
				<?php
					$args       = array(
						'taxonomy' => 'our-teams-categories',
					);
					$categories = get_categories( $args );

					foreach ( $categories as $category ) {
						?>
						<li class="our-team-cat-list">
							<a href="<?php echo get_category_link( $category->term_id ); //phpcs:ignore ?>"><?php echo $category->name; ?> </a>
						</li>
						<?php
					}
					if ( $view_all && ! empty( $view_all['url'] ) && ! empty( $view_all['title'] ) ) {
						?>
						<li class="our-team-cat-list">
							<?php
							$link_url    = $view_all['url'];
							$link_title  = $view_all['title'];
							$link_target = $view_all['target'] ? $view_all['target'] : '_self';
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
			<div class="col col-lg-9 col-md-12 our-team-wrapper">
				<div class="row row-cols-1 row-cols-lg-2">
					<?php
					$args = array(
						'post_type'   => 'our-teams',
						'post_status' => 'publish',
						'orderby'     => 'post_date',
					);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) {
						$loop->the_post();
						$team_role = get_field( 'role' );
						$mail      = get_field( 'mail' );
						$linked_in = get_field( 'linked_in' );
						?>
						<div class="col text-center">
							<div class="our-team-box">
								<?php
								if ( get_the_post_thumbnail() ) {
									?>
									<div class="our-team-image">
										<?php the_post_thumbnail(); ?>
									</div>
									<?php
								}
								?>
								<div class="our-team-conent-box">
									<?php
									if ( get_the_title() ) {
										?>
										<div class="our-team-title">
											<?php echo get_the_title(); //phpcs:ignore ?>
										</div>
										<?php
									}
									if ( ! empty( $team_role ) ) {
										?>
										<div class="role">
											<?php echo esc_html( $team_role ); ?>
										</div>
										<?php
									}
									if ( get_the_content() ) {
										echo get_the_content(); //phpcs:ignore
									}
									if ( $mail && ! empty( $mail['url'] ) && ! empty( $mail['title'] ) ) {
										$link_url    = $mail['url'];
										$link_title  = $mail['title'];
										$link_target = $mail['target'] ? $mail['target'] : '_self';
										?>
										<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-link" target="<?php echo esc_attr( $link_target ); ?>">
											<?php echo esc_html( $link_title ); ?>
										</a>
										<?php
									}
									if ( $linked_in && ! empty( $linked_in['url'] ) && ! empty( $linked_in['title'] ) ) {
										$link_url    = $linked_in['url'];
										$link_title  = $linked_in['title'];
										$link_target = $linked_in['target'] ? $linked_in['target'] : '_self';
										?>
										<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-link" target="<?php echo esc_attr( $link_target ); ?>">
											<?php echo esc_html( $link_title ); ?>
										</a>
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
