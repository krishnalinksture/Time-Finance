<?php
/**
 * REGULATORY NEWS BLOCK
 *
 * @package TIMEFINANCE
 */

$main_title = get_sub_field( 'title' );
$select_tag = get_sub_field( 'select_tag' );
$content    = get_sub_field( 'content' );
$view_all_button    = get_sub_field( 'view_all_button' );
$section_id = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'regulatory-news-block-' );

?>
<section class="regulatory-news-block" id="<?php echo $section_id; //phpcs:ignore ?>">
	<div class="container">
		<div class="row">
			<div class="col-9">
				<?php
				if ( ! empty( $main_title ) ) {
					echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
				}
				echo $content; //phpcs:ignore
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
					?>
					<li class="regulatory-news-cat-list">
						<?php
						if ( $view_all_button && ! empty( $view_all_button['url'] ) && ! empty( $view_all_button['title'] ) ) {
							$link_url    = $view_all_button['url'];
							$link_title  = $view_all_button['title'];
							$link_target = $view_all_button['target'] ? $view_all_button['target'] : '_self';
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
			<div class="col-9 regulatory-news-wrapper">
				<div class="row row-cols-1 row-cols-lg-2">
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
								<div class="regulatory-news-conent">
									<div class="regulatory-news-date">
										<?php
										echo get_the_date();
										?>
									</div>
									<div class="regulatory-news-title">
										<?php echo get_the_title(); //phpcs:ignore ?>
									</div>
									<?php
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
