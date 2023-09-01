<?php
/**
 * CASE STUDIES CATEGORY PAGE
 *
 * @package TIMEFINANCE
 */

$case_studies_title           = get_field( 'case_studies_title', 'option' );
$case_studies_select_tag      = get_field( 'case_studies_select_tag', 'option' );
$case_studies_content         = get_field( 'case_studies_content', 'option' );
$case_studies_view_all_button = get_field( 'case_studies_view_all_button', 'option' );

if ( ! empty( $case_studies_title ) || ! empty( $case_studies_content ) ) {
	?>
	<section class="case-studies-category">
		<div class="container">
			<div class="row">
				<div class="col-xl-9 col-lg-11 col-md-12">
					<?php
					if ( ! empty( $case_studies_title ) ) {
						echo '<' . esc_attr( $case_studies_select_tag ) . ' class="section-title h-4">' . esc_html( $case_studies_title ) . '</' . esc_attr( $case_studies_select_tag ) . '>';
					}
					if ( ! empty( $case_studies_content ) ) {
						echo $case_studies_content; //phpcs:ignore
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
?>
<section class="case-studies-filter-block">
	<div class="container">
		<div class="row align-items-start">
			<div class="col col-lg-3 col-md-7 filter-post-left d-none d-md-block">
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
					if ( $case_studies_view_all_button && ! empty( $case_studies_view_all_button['url'] ) && ! empty( $case_studies_view_all_button['title'] ) ) {
						?>
						<li class="case-study-cat-list">
							<?php
							$link_url    = $case_studies_view_all_button['url'];
							$link_title  = $case_studies_view_all_button['title'];
							$link_target = $case_studies_view_all_button['target'] ? $case_studies_view_all_button['target'] : '_self';
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
					<?php
					$category = get_queried_object();
					echo $category->name; //phpcs:ignore
					?>
				</button>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenuBdt">
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
					if ( $case_studies_view_all_button && ! empty( $case_studies_view_all_button['url'] ) && ! empty( $case_studies_view_all_button['title'] ) ) {
						?>
						<li class="case-study-cat-list">
							<?php
							$link_url    = $case_studies_view_all_button['url'];
							$link_title  = $case_studies_view_all_button['title'];
							$link_target = $case_studies_view_all_button['target'] ? $case_studies_view_all_button['target'] : '_self';
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
				<div class="col col-lg-9 col-md-12 case-studies-wrapper">
					<div class="row row-cols-1 row-cols-md-2">
						<?php
						while ( have_posts() ) {
							the_post();
							$read_more_button = get_field( 'read_more_button' );
							?>
							<div class="col text-center">
								<div class="case-study-box">
									<?php
									if ( get_the_post_thumbnail() ) {
										?>
										<div class="case-study-image">
											<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>
										</div>
										<?php
									}
									?>
									<div class="case-study-content">
										<div class="case-study-date">
											<?php
											echo get_the_date( 'd M Y', get_the_ID() ) . ' / ' . wp_strip_all_tags( get_the_term_list( get_the_ID(), 'case-study-categories', ' ', ', ', ' ' ) ); //phpcs:ignore
											?>
										</div>
										<?php
										if ( get_the_title() ) {
											?>
											<div class="case-study-title">
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
				<?php
			}
			?>
		</div>
	</div>
</section>
