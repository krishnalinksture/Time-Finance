<?php
/**
 * OUR TEAM CATEGORY PAGE
 *
 * @package TIMEFINANCE
 */

$our_team_title = get_field( 'our_team_title', 'option' );
$our_team_select_tag = get_field( 'our_team_select_tag', 'option' );
$our_team_content    = get_field( 'our_team_content', 'option' );
?>
<section class="our-teams-category">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php
				if ( ! empty( $our_team_title ) ) {
					echo '<' . esc_attr( $our_team_select_tag ) . ' class="section-title h-4">' . esc_html( $our_team_title ) . '</' . esc_attr( $our_team_select_tag ) . '>';
				}
				echo $our_team_content; //phpcs:ignore
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
				</ul>
			</div>
			<div class="col-9 our-team-wrapper">
				<div class="row row-cols-1 row-cols-lg-2">
					<?php
					while ( have_posts() ) {
						the_post();
						$team_role = get_field( 'role' );
						$mail      = get_field( 'mail' );
						$linked_in = get_field( 'linked_in' );
						?>
						<div class="col text-center">
						<div class="our-team-box">
							<div class="our-team-image">
								<?php the_post_thumbnail(); ?>
							</div>
								<div class="our-team-conent-box">
									<div class="our-team-title">
										<?php echo get_the_title(); //phpcs:ignore ?>
									</div>
									<div class="role">
										<?php echo esc_html( $team_role ); ?>
									</div>
										<?php echo get_the_content(); //phpcs:ignore ?>
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
