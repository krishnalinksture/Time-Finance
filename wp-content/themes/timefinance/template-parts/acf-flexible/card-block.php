<?php
/**
 * CARD BLOCK
 *
 * @package TIMEFINANCE
 */

$card_content            = get_sub_field( 'card_content' );
$main_title              = get_sub_field( 'title' );
$select_tag              = get_sub_field( 'select_tag' );
$select_background_color = get_sub_field( 'select_background_color' );
$section_id              = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'card-block-' );
?>
<section class="card-block <?php echo $select_background_color; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php
				if ( ! empty( $main_title ) ) {
					echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
				}
				?>
			</div>
		</div>
		<?php
		if ( have_rows( 'card_content' ) ) {
			?>
			<div class="row row-cols-1 row-cols-lg-4">
				<?php
				while ( have_rows( 'card_content' ) ) {
					the_row();
					$card_title = get_sub_field( 'card_title' );
					$image      = get_sub_field( 'image' );
					$content    = get_sub_field( 'content' );
					$cta_button = get_sub_field( 'cta_button' );
					$image_alt  = ( isset( $image['alt'] ) && ! empty( $image['alt'] ) ) ? $image['alt'] : ( isset( $image['title'] ) && ! empty( $image['title'] ) ? $image['title'] : '' );
					?>
					<div class="col">
						<div class="card-box">
							<div class="card-image">
								<img width="<?php echo $image['sizes']['timefinance-desktop-width']; ?>" height="<?php echo 	$image['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $image['url']; ?>" srcset="<?php echo $image['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $image['sizes']['timefinance-mobile']; ?> 800w, <?php echo $image['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $image['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $image_alt; //phpcs:ignore ?>">
							</div>
							<div class="hover-card">
								<div class="hover-card-content">
									<?php
									if ( ! empty( $card_title ) ) {
										?>
										<div class="card-title">
											<?php echo esc_html( $card_title ); ?>
										</div>
										<?php
									}
									echo $content; //phpcs:ignore
									if ( $cta_button && ! empty( $cta_button['url'] ) && ! empty( $cta_button['title'] ) ) {
										$link_url    = $cta_button['url'];
										$link_title  = $cta_button['title'];
										$link_target = $cta_button['target'] ? $link['target'] : '_self';
										?>
										<a href="<?php echo esc_url( $link_url ); ?>" class="btn" target="<?php echo esc_attr( $link_target ); ?>">
											<?php echo esc_html( $link_title ); ?>
										</a>
										<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
			<?php
		}
		?>
	</div>
</section>
