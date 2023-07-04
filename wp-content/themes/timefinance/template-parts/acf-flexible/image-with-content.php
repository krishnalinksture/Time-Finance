<?php
/**
 * IMAGE WITH CONTENT
 *
 * @package TIMEFINANCE
 */

$content_image = get_sub_field( 'content_image' );
$section_id    = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'image-with-content-' );

if ( have_rows( 'content_image' ) ) {
	?>
	<section class="image-with-content" id="<?php echo $section_id; //phpcs:ignore ?>">
		<div class="container">
			<div class="row row-cols-1 row-cols-md-3">
				<?php
				while ( have_rows( 'content_image' ) ) {
					the_row();
					$login_title = get_sub_field( 'title' );
					$select_tag  = get_sub_field( 'select_tag' );
					$image       = get_sub_field( 'image' );
					$content     = get_sub_field( 'content' );
					$button      = get_sub_field( 'button' );
					$image_alt   = ( isset( $image['alt'] ) && ! empty( $image['alt'] ) ) ? $image['alt'] : ( isset( $image['title'] ) && ! empty( $image['title'] ) ? $image['title'] : '' );

					if ( ! empty( $image ) || ! empty( $login_title ) || ! empty( $content ) || ! empty( $button ) ) {
						?>
						<div class="col">
							<?php
							if ( ! empty( $image ) ) {
								?>
								<img class="image-bulletpoint" width="<?php echo $image['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $image['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $image['url']; ?>" srcset="<?php echo $image['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $image['sizes']['timefinance-mobile']; ?> 800w, <?php echo $image['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $image['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $image_alt; //phpcs:ignore ?>">
								<?php
							}
							if ( ! empty( $login_title ) ) {
								echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $login_title ) . '</' . esc_attr( $select_tag ) . '>';
							}
							if ( ! empty( $content ) ) {
								echo $content; //phpcs:ignore
							}
							if ( $button && ! empty( $button['url'] ) && ! empty( $button['title'] ) ) {
								$link_url    = $button['url'];
								$link_title  = $button['title'];
								$link_target = $button['target'] ? $button['target'] : '_self';
								?>
								<a href="<?php echo esc_url( $link_url ); ?>" class="btn" target="<?php echo esc_attr( $link_target ); ?>">
									<?php echo esc_html( $link_title ); ?>
								</a>
								<?php
							}
							?>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</section>
	<?php
}
