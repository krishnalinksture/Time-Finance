<?php
/**
 * SINGLE PRESS RELEASE
 *
 * @package TIMEFINANCE
 */

$image                             = get_field( 'image' );
$press_release_all_articles_button = get_field( 'press_release_all_articles_button', 'options' );
$image_alt                         = ( isset( $image['alt'] ) && ! empty( $image['alt'] ) ) ? $image['alt'] : ( isset( $image['title'] ) && ! empty( $image['title'] ) ? $image['title'] : '' );

?>
<section class="press-release-detail bg-grey">
	<div class="container-fluid">
		<div class="row">
			<div class="col press-release-detail-wrapper">
				<div class="image-box">
					<?php
					if ( ! empty( $image ) ) {
						?>
						<img class="press-release-images" width="<?php echo $image['sizes']['timefinance-desktop-width']; ?>" height="<?php echo 	$image['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $image['url']; ?>" srcset="<?php echo $image['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $image['sizes']['timefinance-mobile']; ?> 800w, <?php echo $image['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $image['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $image_alt; //phpcs:ignore ?>">
						<?php
					} else {
						the_post_thumbnail(); //phpcs:ignore
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-12 order-1 order-lg-0 left">
				<div class="press-release-detail-content sticky-top">
					<div class="press-release-date d-none d-lg-block">
						<?php
						$category_name = wp_strip_all_tags( get_the_term_list( get_the_ID(), 'press-release-categories', ' ', ', ', ' ' ) );
						if ( $category_name ) {
							echo get_the_date( 'm F Y', get_the_ID() ) . ' / ' . $category_name; //phpcs:ignore
						} else {
							echo get_the_date( 'm F Y', get_the_ID() ); //phpcs:ignore
						}
						?>
					</div>
					<div class="press-release-title d-none d-lg-block">
						<?php echo esc_html( get_the_title() ); ?>
					</div>
					<div class="social-icon">
						<span class="share-article"><?php echo esc_html__( 'Share this post', 'timefinance' ); ?></span>
						<a class="social-sharing-icon linkedin-in" href="//linkedin.com/shareArticle?mini=true?url=<?php the_permalink(); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="Share Us On LinkedIn"><img src="<?php echo get_template_directory_uri(); // phpcs:ignore?>/inc/assets/linkedin-white.svg"></a>
						<a class="social-sharing-icon twitter" href="//twitter.com/share?url=<?php the_permalink(); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="Share Us On Twitter"><img src="<?php echo get_template_directory_uri(); // phpcs:ignore?>/inc/assets/twitter-white.svg"></a>
					</div>
					<?php
					if ( $press_release_all_articles_button && ! empty( $press_release_all_articles_button['url'] ) && ! empty( $press_release_all_articles_button['title'] ) ) {
						$link_url    = $press_release_all_articles_button['url'];
						$link_title  = $press_release_all_articles_button['title'];
						$link_target = $press_release_all_articles_button['target'] ? $press_release_all_articles_button['target'] : '_self';
						?>
						<a href="<?php echo esc_url( $link_url ); ?>" class="btn" target="<?php echo esc_attr( $link_target ); ?>">
							<?php echo esc_html( $link_title ); ?>
						</a>
						<?php
					}
					?>
				</div>
			</div>
			<div class="col-lg-8 col-md-12 right">
				<div class="press-release-date d-lg-none">
					<?php
					$category_name = wp_strip_all_tags( get_the_term_list( get_the_ID(), 'press-release-categories', ' ', ', ', ' ' ) );
					if ( $category_name ) {
						echo get_the_date( 'm F Y', get_the_ID() ) . ' / ' . $category_name; //phpcs:ignore
					} else {
						echo get_the_date( 'm F Y', get_the_ID() ); //phpcs:ignore
					}
					?>
				</div>
				<div class="press-release-title d-lg-none">
					<?php echo esc_html( get_the_title() ); ?>
				</div>
				<?php
				$_term = get_queried_object();
				if ( have_rows( 'page_builder', $_term ) ) {
					while ( have_rows( 'page_builder', $_term ) ) {
						the_row();
						if ( get_row_layout() === 'content_block' ) {
							$content = get_sub_field( 'content' );
							echo $content; //phpcs:ignore
						}
					}
				}
				echo get_the_content(); //phpcs:ignore
				?>
			</div>
		</div>
	</div>
</section>
