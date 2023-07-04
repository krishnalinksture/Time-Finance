<?php
/**
 * REGULATORY NEWS CATEGORY PAGE
 *
 * @package TIMEFINANCE
 */

$regulatory_news_title           = get_field( 'regulatory_news_title', 'option' );
$regulatory_news_select_tag      = get_field( 'regulatory_news_select_tag', 'option' );
$regulatory_news_content         = get_field( 'regulatory_news_content', 'option' );
$regulatory_news_view_all_button = get_field( 'regulatory_news_view_all_button', 'option' );
?>
<section class="regulatory-news-category">
	<div class="container">
		<?php
		if ( ! empty( $regulatory_news_title ) || ! empty( $regulatory_news_content ) ) {
			?>
			<div class="row">
				<div class="col-9">
					<?php
					if ( ! empty( $regulatory_news_title ) ) {
						echo '<' . esc_attr( $regulatory_news_select_tag ) . ' class="section-title h-4">' . esc_html( $regulatory_news_title ) . '</' . esc_attr( $regulatory_news_select_tag ) . '>';
					}
					if ( ! empty( $regulatory_news_content ) ) {
						echo $regulatory_news_content; //phpcs:ignore
					}
					?>
				</div>
			</div>
			<?php
		}
		?>
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
					if ( $regulatory_news_view_all_button && ! empty( $regulatory_news_view_all_button['url'] ) && ! empty( $regulatory_news_view_all_button['title'] ) ) {
						?>
						<li class="regulatory-news-cat-list">
							<?php
							$link_url    = $regulatory_news_view_all_button['url'];
							$link_title  = $regulatory_news_view_all_button['title'];
							$link_target = $regulatory_news_view_all_button['target'] ? $regulatory_news_view_all_button['target'] : '_self';
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
				<div class="col-9 regulatory-news-wrapper">
					<div class="row row-cols-1 row-cols-lg-2">
						<?php
						while ( have_posts() ) {
							the_post();
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
										<div class="regulatory-news-date">
											<?php echo get_the_date( 'm F Y', get_the_ID() ); ?>
										</div>
										<?php
										if ( get_the_title() ) {
											?>
											<div class="regulatory-news-title">
												<a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); //phpcs:ignore ?></a>
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
				<?php
			}
			?>
		</div>
	</div>
</section>
