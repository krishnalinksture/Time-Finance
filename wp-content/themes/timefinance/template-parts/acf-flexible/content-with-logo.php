<?php
/**
 * CONTENT WITH LOGO
 *
 * @package TIMEFINANCE
 */

$main_title = get_sub_field( 'title' );
$select_tag = get_sub_field( 'select_tag' );
$content    = get_sub_field( 'content' );
$logos      = get_sub_field( 'logos' );
$section_id = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'content-with-logo-' );
?>
<section class="content-with-logo" id="<?php echo $section_id; //phpcs:ignore ?>">
	<div class="container">
		<div class="row">
			<div class="col-6">
				<?php
				if ( ! empty( $main_title ) ) {
					echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
				}
				echo $content; //phpcs:ignore
				?>
			</div>
			<div class="col-6">
				<div class="row row-cols-1 row-cols-lg-3 text-center align-items-center">
					<?php
					if ( have_rows( 'logos' ) ) {
						while ( have_rows( 'logos' ) ) {
							the_row();
							$logo     = get_sub_field( 'logo' );
							$logo_alt = ( isset( $logo['alt'] ) && ! empty( $logo['alt'] ) ) ? $logo['alt'] : ( isset( $logo['title'] ) && ! empty( $logo['title'] ) ? $logo['title'] : '' );
							?>
							<div class="col logo-icon">
								<img width="<?php echo $logo['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $logo['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $logo['url']; ?>" srcset="<?php echo $logo['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $logo['sizes']['timefinance-mobile']; ?> 800w, <?php echo $logo['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $logo['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $logo_alt; //phpcs:ignore ?>">
							</div>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
