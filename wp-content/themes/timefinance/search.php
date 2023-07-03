<?php
/**
 * Search Page Template.
 * The template for displaying search results pages.
 *
 * @package TIMEFINANCE
 */

$banner_title = get_field( 'banner_title', 'option' );
$search_select_tag = get_field( 'search_select_tag', 'option' );
$search_again = get_field( 'search_again', 'option' );
$find_out_more_button = get_field( 'find_out_more_button', 'option' );
?>
<section class="search-banner">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php
				if ( ! empty( $banner_title ) ) {
					echo '<' . esc_attr( $search_select_tag ) . ' class="section-title">' . esc_html( $banner_title ) . '</' . esc_attr( $search_select_tag ) . '>';
				}
				if ( is_search() ) {
					echo get_search_query();
				}
				?>
			</div>
		</div>
	</div>
</section>
<section class="search-block">
	<div class="container">
		<div class="row">
			<div class="col">
				<form id="search-again" method="get" action="<?php echo home_url('/'); //phpcs:ignore ?>" name="search-header" class="search-form-result">
					<input type="text" name="s" class="form-control" placeholder="Search again..." aria-label="Search again" aria-describedby="basic-addon2" autocomplete="off">
					<div class="input-group-append">
						<button class="btn btn-secondary" type="submit">
							<?php echo esc_html( $search_again ); ?>
						</button>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="search-title">
					<?php echo get_the_title(); //phpcs:ignore?>
				</div>
				<div class="search-excerpt">
					<?php
					if ( the_excerpt() ) {
						echo get_the_excerpt(); //phpcs:ignore
					} else {
						$_term = get_queried_object();
						if( have_rows( 'page_builder', $_term ) ):

							// Loop through rows.
							while (have_rows( 'page_builder', $_term )) : the_row();

								// Case: Paragraph layout.
								if( get_row_layout() == 'trustpilot_block' ):
									$content = get_sub_field('content');
									echo wp_trim_words( $content, 20 );
									// Do something...

								// Case: Download layout.

								endif;

							// End loop.
							endwhile;

						// No value.

						endif;
					}
					?>
				</div>
				<div class="read-more">
					<?php $page_url = get_permalink(); ?>
					<a href="<?php echo esc_url( $page_url ); ?>"><button class="btn btn-secondary"><?php echo esc_html( $find_out_more_button ); ?></button></a>
				</div>
			</div>
		</div>
	</div>
</section>
