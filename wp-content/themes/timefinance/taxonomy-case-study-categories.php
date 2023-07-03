<?php
/**
 * CASE STUDIES CATEGORY PAGE
 *
 * @package TIMEFINANCE
 */

$case_studies_title = get_field( 'case_studies_title', 'option' );
$case_studies_select_tag = get_field( 'case_studies_select_tag', 'option' );
$case_studies_content    = get_field( 'case_studies_content', 'option' );
$case_studies_view_all_button    = get_field( 'case_studies_view_all_button', 'option' );
?>
<section class="case-studies-category">
	<div class="container">
		<div class="row">
			<div class="col-9">
				<?php
				if ( ! empty( $case_studies_title ) ) {
					echo '<' . esc_attr( $case_studies_select_tag ) . ' class="section-title h-4">' . esc_html( $case_studies_title ) . '</' . esc_attr( $case_studies_select_tag ) . '>';
				}
				echo $case_studies_content; //phpcs:ignore
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
						'taxonomy' => 'case-study-categories',
					);
					$categories = get_categories( $args );

					foreach ( $categories as $category ) {
						?>
						<li class="case-study-cat-list">
							<a href="<?php echo get_category_link( $category->term_id ); //phpcs:ignore ?>"><?php echo $category->name; ?> </a>
						</li>
						<?php
					}
					?>
					<li class="case-study-cat-list">
						<?php
						if ( $case_studies_view_all_button && ! empty( $case_studies_view_all_button['url'] ) && ! empty( $case_studies_view_all_button['title'] ) ) {
							$link_url    = $case_studies_view_all_button['url'];
							$link_title  = $case_studies_view_all_button['title'];
							$link_target = $case_studies_view_all_button['target'] ? $case_studies_view_all_button['target'] : '_self';
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
			<div class="col-9 case-studies-wrapper">
				<div class="row row-cols-1 row-cols-lg-2">
					<?php
					while ( have_posts() ) {
						the_post();
						$read_more_button = get_field( 'read_more_button' );
						?>
						<div class="col text-center">
							<div class="case-study-box">
								<div class="case-study-image">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="case-study-content">
									<div class="case-study-date">
										<?php
										echo get_the_date( 'm F Y', get_the_ID() );
										echo wp_strip_all_tags( get_the_term_list( get_the_ID(), 'case-study-categories', ' ', ', ', ' ' ) ); //phpcs:ignore
										?>
									</div>
									<div class="case-study-title">
										<a href="<?php echo get_the_permalink(); //phpcs:ignore ?>"><?php echo get_the_title(); //phpcs:ignore ?></a>
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
