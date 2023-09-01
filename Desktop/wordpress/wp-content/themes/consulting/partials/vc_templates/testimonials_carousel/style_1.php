<?php

wp_enqueue_script( 'slick' );
wp_enqueue_style( 'slick' );

if ( ! empty( $style ) ) {
	$css_class .= ' ' . esc_attr( $style );
}

$args = array(
	'post_type'      => 'stm_testimonials',
	'posts_per_page' => $count,
);

if ( 'all' !== $category ) {
	$args['stm_testimonials_category'] = $category;
}

if ( $per_row ) {
	$css_class .= ' per_row_' . $per_row;
} else {
	$per_row = 1;
}

if ( $disable_carousel ) {
	$css_class .= ' disable_carousel';
}

if ( empty( $thumb_size ) ) {
	$thumb_size = '350x350';
}
if ( stm_check_layout( 'layout_ankara' ) ) {
	$thumb_size = '200x200';
}

$testimonials = new WP_Query( $args );
$id           = uniqid( 'partners_carousel_' );

$autoplay_carousel_js = 'false';
if ( 'yes' === ! empty( $autoplay_carousel ) && $autoplay_carousel ) {
	$autoplay_carousel_js = 'true';
}
?>
<?php if ( $testimonials->have_posts() ) : ?>
	<div class="<?php echo esc_attr( $css_class ); ?>" id="<?php echo esc_attr( $id ); ?>">
		<?php
		while ( $testimonials->have_posts() ) :
			$testimonials->the_post();
			if ( stm_check_layout( 'layout_14' ) || stm_check_layout( 'layout_kyiv' ) || stm_check_layout( 'layout_lyon' ) && ! $disable_carousel ) :
				?>
				<div class="testimonial">
					<?php $author_photo = consulting_get_image( get_post_thumbnail_id(), $thumb_size ); ?>
					<div class="image">
						<?php if ( $link['url'] ) : ?>
							<a href="<?php echo esc_url( $link['url'] ); ?>">
								<?php echo wp_kses_post( consulting_filtered_output( $author_photo ) ); ?>
							</a>
							<?php
						else :
							echo wp_kses_post( consulting_filtered_output( $author_photo ) );
							?>
						<?php endif; ?>
					</div>
					<div class="info">
						<?php
						$position = get_post_meta( get_the_ID(), 'testimonial_position', true );
						$company  = get_post_meta( get_the_ID(), 'testimonial_company', true );
						?>

						<div class="heading_font"><?php the_excerpt(); ?></div>
						<h4 class="no_stripe">
							<?php if ( $link['url'] ) : ?>
								<a href="<?php echo esc_url( $link['url'] ); ?>">
									<?php the_title(); ?>
								</a>
								<?php
							else :
								the_title();
							endif;
							?>
						</h4>
						<?php if ( $position ) : ?>
							<span class="position"><?php echo esc_html( $position ); ?>, </span>
							<?php
						endif;
						if ( $company ) :
							?>
							<span class="company"><?php echo esc_html( $company ); ?></span>
						<?php endif; ?>
					</div>
				</div>
				<?php
			elseif ( ( stm_check_layout( 'layout_15' )
					|| stm_check_layout( 'layout_18' )
					|| stm_check_layout( 'layout_stockholm' )
					|| stm_check_layout( 'layout_osaka' )
					|| stm_check_layout( 'layout_budapest' )
					|| stm_check_layout( 'layout_barcelona' ) ) && ! $disable_carousel ) :
				?>
				<?php
				$bg_image  = get_post_meta( get_the_id(), 'testimonial_bg_img', true );
				$video_url = get_post_meta( get_the_id(), 'testimonial_video_url', true );
				$position  = get_post_meta( get_the_ID(), 'testimonial_position', true );
				$company   = get_post_meta( get_the_ID(), 'testimonial_company', true );

				if ( empty( $bg_image ) ) {
					$bg_image = '';
				} else {
					$bg_image = wp_get_attachment_image_src( $bg_image, 'full' );
					if ( ! empty( $bg_image[0] ) ) {
						$bg_image = 'style="background-image:url(' . $bg_image[0] . ')"';
					} else {
						$bg_image = '';
					}
				}
				?>
				<div class="testimonial" <?php echo wp_kses_post( sanitize_text_field( $bg_image ) ); ?>>
					<div class="info">
						<div class="container">
							<?php if ( ! empty( $video_url ) ) : ?>
								<a data-fancybox href="<?php echo esc_attr( $video_url ); ?>" class="stm_video_url stm_fancy-iframe"></a>
							<?php endif; ?>
							<div class="stm_testimonial_excerpt"><i><?php the_excerpt(); ?></i></div>
							<h4 class="no_stripe">
								<?php if ( $link['url'] ) : ?>
									<a href="<?php echo esc_url( $link['url'] ); ?>">
										<?php the_title(); ?>
									</a>
									<?php
								else :
									the_title();
								endif;
								?>
							</h4>
							<?php if ( $position ) : ?>
								<span class="position"><?php echo esc_html( $position ); ?>, </span>
								<?php
							endif;
							if ( $company ) :
								?>
								<span class="company"><?php echo esc_html( $company ); ?></span>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php else : ?>
				<div class="testimonial">
					<?php
					$author_photo = consulting_get_image( get_post_thumbnail_id(), $thumb_size );
					?>
					<div class="image">
						<?php if ( $link['url'] ) : ?>
							<a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo wp_kses_post( consulting_filtered_output( $author_photo ) ); ?></a>
							<?php
						else :
							echo wp_kses_post( consulting_filtered_output( $author_photo ) );
							endif;
						?>
					</div>
					<div class="info">
						<h4 class="no_stripe">
							<?php if ( $link['url'] ) : ?>
								<a href="<?php echo esc_url( $link['url'] ); ?>">
									<?php the_title(); ?>
								</a>
								<?php
							else :
								the_title();
							endif;
							?>
						</h4>
						<?php
						$position = get_post_meta( get_the_ID(), 'testimonial_position', true );
						$company  = get_post_meta( get_the_ID(), 'testimonial_company', true );
						if ( stm_check_layout( 'layout_8' ) || stm_check_layout( 'layout_10' ) ) :
							$author_info   = array();
							$author_info[] = $position;
							$author_info[] = $company;
							if ( ! empty( $author_info ) ) :
								?>
								<div class="position"><?php echo wp_kses_post( join( ', ', $author_info ) ); ?></div>
								<?php
							endif;
							else :
								if ( $position ) :
									?>
								<div class="position"><?php echo esc_html( $position ); ?></div>
									<?php
								endif;
								if ( $company ) :
									?>
								<div class="company"><?php echo esc_html( $company ); ?></div>
									<?php
								endif;
							endif;
							the_excerpt();
							?>
					</div>
				</div>
				<?php
			endif;
			endwhile;
		?>
	</div>
	<?php if ( ! $disable_carousel ) : ?>
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				"use strict";
				var <?php echo esc_attr( $id ); ?> = $("#<?php echo esc_attr( $id ); ?>");
				var slickRtl = false;

				if ($('body').hasClass('rtl')) {
					slickRtl = true;
				}

				<?php
				$opt = 'arrows: false,';
				if ( ! $disable_carousel_arrows ) {
					$opt  = 'arrows: true,';
					$opt .= 'prevArrow:"<div class=\"slick_prev\"><i class=\"fa fa-chevron-left\"></i></div>",';
					$opt .= 'nextArrow: "<div class=\"slick_next\"><i class=\"fa fa-chevron-right\"></i></div>",';
				}
				?>

				<?php echo esc_attr( $id ); ?>.
				slick({
					rtl: slickRtl,
					dots: <?php echo ( stm_check_layout( 'layout_ankara' ) ) ? 'true' : 'false'; ?>,
					infinite: true,
					<?php echo consulting_filtered_output( $opt ); // phpcs:ignore ?>
					autoplaySpeed: 5000,
					autoplay: <?php echo esc_js( $autoplay_carousel_js ); ?>,
					slidesToShow: <?php echo esc_js( $per_row ); ?>,
					cssEase: "cubic-bezier(0.455, 0.030, 0.515, 0.955)",
					responsive: [
						{
							breakpoint: 769,
							settings: {
								slidesToShow: 1
							}
						}
					]
				});
			});
		</script>
		<?php
	endif;
	endif;
wp_reset_postdata();
?>
