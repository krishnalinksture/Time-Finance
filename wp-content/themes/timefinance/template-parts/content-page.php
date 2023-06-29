<?php
/**
 * CONTENT Page Layouts.
 *
 * @package TIMEFINANCE
 */

$_term = get_queried_object();
if ( get_the_content() ) {
	?>
	<section class="main-content-wrap single-content-page">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</section>
	<?php
}

if ( have_rows( 'page_builder', $_term ) ) {
	while ( have_rows( 'page_builder', $_term ) ) {
		the_row();
		$layout_section = get_row_layout();

		switch ( $layout_section ) {
			case 'homepage_hero':
			case 'inner_page_hero':
			case 'inner_page_hero_small':
			case 'left_right_content_image':
			case 'trustpilot_block':
			case 'featured_content_image':
			case 'usp_block':
			case 'image_bulletpoint_groups':
			case 'video_block':
			case 'centred_content_image_gallery':
			case 'cta_block':
			case 'card_block':
			case 'large_card_block':
			case 'case_study_block':
			case 'faqs_block':
			case 'office_locations_block':
			case 'contact_block':
			case 'latest_news_block':
			case 'press_releases_block':
			case 'time_blog_block':
			case 'regulatory_news_block':
			case 'case_studies_custom_post_block':
			case 'resources_block':
			case 'our_team_block':
				$template_name = str_replace( '_', '-', $layout_section );
				get_template_part( 'template-parts/acf-flexible/' . $template_name );
				break;
			default:
				break;
		}
	}
}
