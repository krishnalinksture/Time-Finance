<?php
/**
 * SEARCH PAGE TEMPLATE.
 * The template for displaying search results pages.
 *
 * @package TIMEFINANCE
 */

$banner_title         = get_field( 'banner_title', 'option' );
$search_select_tag    = get_field( 'search_select_tag', 'option' );
$search_again         = get_field( 'search_again', 'option' );
$find_out_more_button = get_field( 'find_out_more_button', 'option' );

if ( ! empty( $banner_title ) || ! empty( $search_again ) || ! empty( $find_out_more_button ) ) {
	?>
	<section class="search-banner bg-purple">
		<div class="container">
			<div class="row justify-content-center text-center">
				<div class="col">
					<?php
					$allsearch = new WP_Query( "s=$s&showposts=0" );
					if ( '' === $allsearch->query['s'] ) {
						?>
						<div class="search-blank">
							<?php echo esc_html( 'Search Time Finance' ); ?>
						</div>
						<?php
					} else {
						if ( ! empty( $banner_title ) ) {
							echo '<' . esc_attr( $search_select_tag ) . ' class="section-title h-4">' . esc_html( $banner_title ) . '</' . esc_attr( $search_select_tag ) . '>';
						}
						if ( is_search() ) {
							?>
							<div class="seach-word">
								<?php echo get_search_query(); ?>
							</div>
							<div class="word-count">
								<?php
								echo $allsearch->found_posts . ' Results'; //phpcs:ignore
								?>
							</div>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
if ( have_posts() ) {
	?>
	<section class="search-block">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-9 search-wrapper">
					<div class="search-box">
						<form id="search-again" method="get" action="<?php echo home_url('/'); //phpcs:ignore ?>" name="search-header" class="search-form-result">
							<input type="text" name="s" class="form-control" placeholder="Search again..." aria-label="Search again" aria-describedby="basic-addon2" autocomplete="off">
							<div class="input-group-append">
								<button class="btn btn-green" type="submit">
									<?php echo esc_html( $search_again ); ?>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php
			if ( have_posts() ) {
				?>
				<div class="row justify-content-center">
					<div class="col-9 search-wrapper">
						<?php
						while ( have_posts() ) {
							the_post();
							?>
							<div class="search-data">
								<?php
								if ( get_the_title() ) {
									?>
									<div class="search-title">
										<?php echo get_the_title(); //phpcs:ignore?>
									</div>
									<?php
								}
								$_term = get_queried_object();
								if ( get_the_excerpt() || have_rows( 'page_builder', $_term ) ) {
									?>
									<div class="search-content">
										<?php
										if ( get_the_excerpt() ) {
											echo wp_trim_words( get_the_excerpt(), 19, ' ' ); //phpcs:ignore
										} else {
											if ( have_rows( 'page_builder', $_term ) ) {
												while ( have_rows( 'page_builder', $_term ) ) {
													the_row();
													if ( get_row_layout() === 'trustpilot_block' ) {
														$content = get_sub_field( 'content' );
														echo wp_trim_words( $content, 19, ' ' ); //phpcs:ignore
													}
												}
											}
										}
										?>
									</div>
									<?php
								}
								if ( ! empty( $find_out_more_button ) ) {
									?>
									<div class="search-read-more">
										<?php $page_url = get_permalink(); ?>
										<a href="<?php echo esc_url( $page_url ); ?>"><button class="btn btn-green"><?php echo esc_html( $find_out_more_button ); ?></button></a>
									</div>
									<?php
								}
								?>
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
	</section>
	<?php
}

