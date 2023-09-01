<?php
/**
 * VIDEO BLOCK
 *
 * @package TIMEFINANCE
 */

$main_title        = get_sub_field( 'title' );
$select_tag        = get_sub_field( 'select_tag' );
$select_video_type = get_sub_field( 'select_video_type' );
$youtube           = get_sub_field( 'youtube' );
$mp4               = get_sub_field( 'mp4' );
$ogg               = get_sub_field( 'ogg' );
$padding_settings  = get_sub_field( 'padding_settings' );
$section_id        = get_sub_field( 'section_id' ) ? get_sub_field( 'section_id' ) : uniqid( 'video-block-' );

?>
<section class="video-block <?php echo $padding_settings; ?>" id="<?php echo $section_id; //phpcs:ignore ?>">
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
		if ( ! empty( $select_video_type ) ) {
			?>
			<div class="row justify-content-center text-center">
				<div class="col">
					<?php
					if ( 'youtube' === $select_video_type ) {
						preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube, $match );
						$video = ( ! empty( $youtube ) ) ? '<div class="youtube-video"><iframe src="' . esc_attr( $youtube ) . '?rel=0&amp;showinfo=0&background=1&controls=0&loop=1&mute=1&playlist=' . $match[1] . '"></iframe></div>' : '';
						echo $video; //phpcs:ignore
					} else {
						?>
						<video width="320" height="240" controls>
							<?php
							if ( 'mp4' === $select_video_type ) {
								?>
								<source src="movie.mp4" type="<?php echo $mp4; //phpcs:ignore ?>">
								<?php
							}
							if ( 'ogg' === $select_video_type ) {
								?>
								<source src="movie.ogg" type="<?php echo $ogg; //phpcs:ignore ?>">
								<?php
							}
							?>
						</video>
						<?php
					}
					?>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</section>
