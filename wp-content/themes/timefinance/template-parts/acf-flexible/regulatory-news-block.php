<?php
/**
 * REGULATORY NEWS BLOCK
 *
 * @package TIMEFINANCE
 */

$main_title      = get_sub_field( 'title' );
$select_tag      = get_sub_field( 'select_tag' );
$content         = get_sub_field( 'content' );
$view_all_button = get_sub_field( 'view_all_button' );
$section_id      = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'regulatory-news-block-' );

if ( ! empty( $main_title ) || ! empty( $content ) ) {
	?>
	<section class="regulatory-news-block" id="<?php echo $section_id; //phpcs:ignore ?>">
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
<section class="regulatory-news-filter-block">
	<div class="container">
		<div class="row align-items-start">
			<div class="col col-lg-3 col-md-7 filter-post-left d-none d-md-block">
				<div class="cat-filter">
					<?php echo esc_html( 'FILTER POSTS:' ); ?>
				</div>
				<ul>
					<?php
					$args       = array(
						'taxonomy' => 'regulatory-news-categories',
					);
					$categories = get_categories( $args );

					foreach ( $categories as $category ) {
						?>
						<li class="regulatory-news-cat-list">
							<a href="<?php echo get_category_link( $category->term_id ); //phpcs:ignore ?>"><?php echo $category->name; ?> </a>
						</li>
						<?php
					}
					if ( $view_all_button && ! empty( $view_all_button['url'] ) && ! empty( $view_all_button['title'] ) ) {
						?>
						<li class="regulatory-news-cat-list">
							<?php
							$link_url    = $view_all_button['url'];
							$link_title  = $view_all_button['title'];
							$link_target = $view_all_button['target'] ? $view_all_button['target'] : '_self';
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
						'taxonomy' => 'regulatory-news-categories',
					);
					$categories = get_categories( $args );

					foreach ( $categories as $category ) {
						?>
						<li class="regulatory-news-cat-list">
							<a href="<?php echo get_category_link( $category->term_id ); //phpcs:ignore ?>"><?php echo $category->name; ?> </a>
						</li>
						<?php
					}
					if ( $view_all_button && ! empty( $view_all_button['url'] ) && ! empty( $view_all_button['title'] ) ) {
						?>
						<li class="regulatory-news-cat-list">
							<?php
							$link_url    = $view_all_button['url'];
							$link_title  = $view_all_button['title'];
							$link_target = $view_all_button['target'] ? $view_all_button['target'] : '_self';
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
			<div class="col col-lg-9 col-md-12 regulatory-news-wrapper">
				<div class="row row-cols-1 row-cols-md-2">
					<?php
					$args = array(
						'post_type'   => 'regulatory-news',
						'post_status' => 'publish',
						'orderby'     => 'post_date',
					);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) {
						$loop->the_post();
						$read_more   = get_field( 'read_more' );
						$upload_file = get_field( 'upload_file' );
						?>
						<div class="col text-center">
							<div class="regulatory-news-box">
								<?php
								if ( get_the_post_thumbnail() ) {
									?>
									<div class="regulatory-news-image">
										<?php the_post_thumbnail(); ?>
									</div>
									<?php
								}
								?>
								<div class="regulatory-news-content">
									<?php
									if ( get_the_date() ) {
										?>
										<div class="regulatory-news-date">
											<?php echo get_the_date( 'm F Y', get_the_ID() ); ?>
										</div>
										<?php
									}
									if ( get_the_title() ) {
										?>
										<div class="regulatory-news-title">
											<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
										</div>
										<?php
									}
									if ( ! empty( $read_more ) ) {
										?>
										<a class="read-more btn" href="<?php echo $upload_file['url']; //phpcs:ignore ?>"><?php echo esc_html( $read_more ); ?></a>
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

