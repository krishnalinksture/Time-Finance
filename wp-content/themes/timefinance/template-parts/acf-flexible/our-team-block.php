<?php
/**
 * OUR TEAM BLOCK
 *
 * @package TIMEFINANCE
 */

$main_title = get_sub_field( 'title' );
$select_tag = get_sub_field( 'select_tag' );
$content    = get_sub_field( 'content' );
$view_all    = get_sub_field( 'view_all' );
$press_release_view_all_button    = get_field( 'press_release_view_all_button', 'option' );
$section_id = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'our-team-block-' );

?>
<section class="our-team-block" id="<?php echo $section_id; //phpcs:ignore ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php
				if ( ! empty( $main_title ) ) {
					echo '<' . esc_attr( $select_tag ) . ' class="section-title h-2">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
				}
				echo $content; //phpcs:ignore
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
					?>
					<li class="our-team-cat-list">
						<?php
						if ( $view_all && ! empty( $view_all['url'] ) && ! empty( $view_all['title'] ) ) {
							$link_url    = $view_all['url'];
							$link_title  = $view_all['title'];
							$link_target = $view_all['target'] ? $view_all['target'] : '_self';
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
						<div class="col">
						<div class="our-team-box">
							<div class="our-team-image">
								<?php the_post_thumbnail(); ?>
							</div>
								<div class="our-team-conent">
									<div class="our-team-title">
										<?php echo get_the_title(); //phpcs:ignore ?>
									</div>
									<div class="role">
										<?php echo esc_html( $team_role ); ?>
									</div>
									<div class="our-team-content">
										<?php echo get_the_content(); //phpcs:ignore ?>
									</div>
									<?php
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
