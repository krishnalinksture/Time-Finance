<?php
/**
 * USP BLOCK
 *
 * @package TIMEFINANCE
 */

$select_background_color = get_sub_field( 'select_background_color' );
$main_title              = get_sub_field( 'title' );
$select_tag              = get_sub_field( 'select_tag' );
$icon_content            = get_sub_field( 'icon_content' );
$section_id              = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'usp-block-' );

?>
<section class="usp-block <?php echo $select_background_color; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php
				if ( ! empty( $main_title ) ) {
					echo '<' . esc_attr( $select_tag ) . ' class="section-title">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>';
				}
				?>
			</div>
		</div>
		<?php
		if ( have_rows( 'icon_content' ) ) {
			?>
			<div class="row">
				<?php
				while ( have_rows( 'icon_content' ) ) {
					the_row();
					$icon     = get_sub_field( 'icon' );
					$content  = get_sub_field( 'content' );
					$icon_alt = ( isset( $icon['alt'] ) && ! empty( $icon['alt'] ) ) ? $icon['alt'] : ( isset( $icon['title'] ) && ! empty( $icon['title'] ) ? $icon['title'] : '' );
					?>
					<div class="col">
						<img class="usp-icons" width="<?php echo $icon['sizes']['timefinance-desktop-width']; ?>" height="<?php echo 	$icon['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $icon['url']; ?>" srcset="<?php echo $icon['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $icon['sizes']['timefinance-mobile']; ?> 800w, <?php echo $icon['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $icon['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $icon_alt; //phpcs:ignore ?>">
						<?php echo $content; //phpcs:ignore ?>
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
