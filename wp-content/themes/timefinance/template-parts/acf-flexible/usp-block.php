<?php
/**
 * USP BLOCK
 *
 * @package TIMEFINANCE
 */

$default_style_background_color = get_sub_field( 'default_style_background_color' );
$style_2_background_color       = get_sub_field( 'style_2_background_color' );
$select_style                   = get_sub_field( 'select_style' );
$main_title                     = get_sub_field( 'title' );
$select_tag                     = get_sub_field( 'select_tag' );
$icon_content                   = get_sub_field( 'icon_content' );
$section_id                     = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'usp-block-' );

switch ( $select_style ) {
	case 'style-1':
		if ( ! empty( $main_title ) || have_rows( 'icon_content' ) ) {
			?>
			<section class="usp-block <?php echo $select_style . ' ' . $default_style_background_color; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
				<div class="container">
					<?php
					if ( ! empty( $main_title ) ) {
						?>
						<div class="row justify-content-center text-center">
							<div class="col">
								<?php echo '<' . esc_attr( $select_tag ) . ' class="section-title h-4">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>'; ?>
							</div>
						</div>
						<?php
					}
					if ( have_rows( 'icon_content' ) ) {
						?>
						<div class="row row-cols-1 row-cols-lg-5 row-cols-md-3 row-cols-sm-2 justify-content-center text-center">
							<?php
							while ( have_rows( 'icon_content' ) ) {
								the_row();
								$icon      = get_sub_field( 'icon' );
								$usp_title = get_sub_field( 'usp_title' );
								$content   = get_sub_field( 'content' );
								$icon_alt  = ( isset( $icon['alt'] ) && ! empty( $icon['alt'] ) ) ? $icon['alt'] : ( isset( $icon['title'] ) && ! empty( $icon['title'] ) ? $icon['title'] : '' );
								if ( ! empty( $icon ) || ! empty( $usp_title ) || ! empty( $content ) ) {
									?>
									<div class="col ups-box">
										<?php
										if ( ! empty( $icon ) ) {
											?>
											<img class="usp-icons" width="<?php echo $icon['sizes']['timefinance-desktop-width']; ?>" height="<?php echo $icon['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $icon['url']; ?>" srcset="<?php echo $icon['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $icon['sizes']['timefinance-mobile']; ?> 800w, <?php echo $icon['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $icon['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $icon_alt; //phpcs:ignore ?>">
											<?php
										}
										if ( ! empty( $usp_title ) ) {
											?>
											<div class="usp-title">
												<?php echo esc_html( $usp_title ); ?>
											</div>
											<?php
										}
										if ( ! empty( $content ) ) {
											echo $content; //phpcs:ignore
										}
										?>
									</div>
									<?php
								}
							}
							?>
						</div>
						<?php
					}
					?>
				</div>
			</section>
			<?php
		}
		break;
	case 'style-2':
		if ( ! empty( $main_title ) || have_rows( 'icon_content' ) ) {
			?>
			<section class="usp-block <?php echo $select_style . ' ' . $style_2_background_color; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
				<div class="container">
					<?php
					if ( ! empty( $main_title ) ) {
						?>
						<div class="row justify-content-center text-center">
							<div class="col">
								<?php echo '<' . esc_attr( $select_tag ) . ' class="section-title h-3">' . esc_html( $main_title ) . '</' . esc_attr( $select_tag ) . '>'; ?>
							</div>
						</div>
						<?php
					}
					if ( have_rows( 'icon_content' ) ) {
						?>
						<div class="row row-cols-1 row-cols-lg-3 justify-content-center text-center">
							<?php
							while ( have_rows( 'icon_content' ) ) {
								the_row();
								$icon      = get_sub_field( 'icon' );
								$usp_title = get_sub_field( 'usp_title' );
								$content   = get_sub_field( 'content' );
								$icon_alt  = ( isset( $icon['alt'] ) && ! empty( $icon['alt'] ) ) ? $icon['alt'] : ( isset( $icon['title'] ) && ! empty( $icon['title'] ) ? $icon['title'] : '' );
								if ( ! empty( $icon ) || ! empty( $usp_title ) || ! empty( $content ) ) {
									?>
									<div class="col">
										<?php
										if ( ! empty( $icon ) ) {
											?>
											<img class="usp-icons" width="<?php echo $icon['sizes']['timefinance-desktop-width']; ?>" height="<?php echo 	$icon['sizes']['timefinance-desktop-height']; ?>" src="<?php echo $icon['url']; ?>" srcset="<?php echo $icon['sizes']['timefinance-small-mobile']; ?> 400w, <?php echo $icon['sizes']['timefinance-mobile']; ?> 800w, <?php echo $icon['sizes']['timefinance-tablet']; ?> 1200w, <?php echo $icon['sizes']['timefinance-desktop']; ?> 2000w" sizes="50vw" alt="<?php echo $icon_alt; //phpcs:ignore ?>">
											<?php
										}
										if ( ! empty( $usp_title ) ) {
											?>
											<div class="usp-title">
												<?php echo esc_html( $usp_title ); ?>
											</div>
											<?php
										}
										if ( ! empty( $content ) ) {
											echo $content; //phpcs:ignore
										}
										?>
									</div>
									<?php
								}
							}
							?>
						</div>
						<?php
					}
					?>
				</div>
			</section>
			<?php
		}
		break;
}
