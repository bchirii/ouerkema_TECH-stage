<?php

$post_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = array(
	'post_type'      => 'stm_portfolio',
	'posts_per_page' => $posts_per_page,
	'paged'          => $post_paged,
);

if ( 'all' !== $category ) {
	$args['stm_portfolio_category'] = $category;
}

$portfolio = new WP_Query( $args );

$count_posts     = wp_count_posts( 'stm_portfolio' );
$published_posts = $count_posts->publish;

wp_enqueue_script( 'isotope' );
wp_enqueue_script( 'packery' );
wp_enqueue_script( 'imagesloaded' );
$css_class .= ' ' . $style;
if ( $masonry_grid ) {
	$css_class .= ' masonry-grid';
}
$i = 0;

$categories = get_terms( 'stm_portfolio_category' );

?>

<?php if ( $portfolio->have_posts() ) : ?>
	<div class="portfolio_box<?php echo esc_attr( $css_class ); ?>">
		<?php if ( $category_filter_enable ) : ?>
			<ul class="category_filter">
				<li class="active stm_secondary_text_color">
					<a href="#all" class="stm_base_text_color"><?php esc_html_e( 'All', 'consulting' ); ?></a>
				</li>
				<?php foreach ( $categories as $category ) : ?>
					<li class="stm_secondary_text_color">
						<a href="#<?php echo esc_attr( $category->slug ); ?>" class="stm_base_text_color"><?php echo esc_attr( $category->name ); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		<div class="stm_portfolio_grid<?php echo esc_attr( $css_class ); ?>">
			<?php
			while ( $portfolio->have_posts() ) :
				$portfolio->the_post();
				set_query_var( 'i', $i );
				set_query_var( 'masonry_grid', $masonry_grid );
				get_template_part( 'partials/vc_templates/portfolio/' . $style );
				$i ++;
				$post_cat = wp_get_post_terms( get_the_ID(), 'stm_portfolio_category' );
				endwhile;
				wp_reset_postdata();
			?>
		</div>
		<?php
		if ( $pagination_enable && ! $load_more_enable ) {
			consulting_paging_nav( 'paging_view_posts-list', $portfolio );
		}
		if ( 'all' !== $category ) :
			if ( $load_more_enable && $posts_per_page < $post_cat[0]->count ) :
				?>
			<div class="portfolio_btn_box">
				<div class="portfolio_btn_loading vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-rounded vc_btn3-style-outline vc_btn3-icon-left vc_btn3-color-theme_style_2"><?php esc_html_e( 'loading...', 'consulting' ); ?></div>
				<a href="#" data-page="1" data-load="<?php echo intval( $posts_per_page ); ?>" data-category="<?php echo esc_attr( $category ); ?>" data-style="<?php echo esc_attr( $style ); ?>" class="portfolio_load_more_btn vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-rounded vc_btn3-style-outline vc_btn3-icon-left vc_btn3-color-theme_style_2">
					<i class="fa fa-refresh vc_btn3-icon" aria-hidden="true"></i> <?php esc_html_e( 'load more', 'consulting' ); ?>
				</a>
			</div>
				<?php
			endif;
		else :
			if ( $load_more_enable && $posts_per_page < $published_posts ) :
				?>
			<div class="portfolio_btn_box">
				<div class="portfolio_btn_loading vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-rounded vc_btn3-style-outline vc_btn3-icon-left vc_btn3-color-theme_style_2"><?php esc_html_e( 'loading...', 'consulting' ); ?></div>
				<a href="#" data-page="1" data-load="<?php echo intval( $posts_per_page ); ?>" data-category="<?php echo esc_attr( $category ); ?>" data-style="<?php echo esc_attr( $style ); ?>" class="portfolio_load_more_btn vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-rounded vc_btn3-style-outline vc_btn3-icon-left vc_btn3-color-theme_style_2">
					<i class="fa fa-refresh vc_btn3-icon" aria-hidden="true"></i> <?php esc_html_e( 'load more', 'consulting' ); ?>
				</a>
			</div>
				<?php
			endif;
		endif;
		?>
	</div>
<?php endif; ?>
<script type="text/javascript">
	jQuery(document).ready(function ($) {
		var $container = $(".stm_portfolio_grid");
		var originLeft = true;
		if ($("body").hasClass("rtl")) {
			originLeft = false;
		}
		$container.isotope({
			layoutMode: "packery",
			itemSelector: ".item",
			transitionDuration: "0.7s",
			gutter: 10,
			isOriginLeft: originLeft,
			<?php if ( ! empty( $works_count_visible ) ) : ?>
			filter: function () {
				return $(this).index() < <?php echo esc_js( intval( $works_count_visible ) ); ?>
			}
			<?php endif; ?>
		});
		$container.imagesLoaded().progress(function () {
			$container.isotope("layout");
		});
		$container.isotope("layout");

		$(document).on("click", ".portfolio_load_more_btn", function (e) {
			e.preventDefault();
			var page = $(this).attr("data-page");
			var load_by = $(this).attr("data-load");
			var category = $(this).attr('data-category');
			var style = $(this).attr('data-style');
			const style_number = parseInt(style.replace(/[^\d]/g, ''));

			$.ajax({
				url: ajaxurl,
				type: "POST",
				dataType: "json",
				data: "&page=" + page + "&load_by=" + load_by + "&category=" + category + "&style=" + style_number + "&action=stm_ajax_load_portfolio&security=" + stm_ajax_load_portfolio,
				context: this,
				beforeSend: function (data) {
					$(this).parent().addClass("portfolio_posts_loading");
				},
				success: function (data) {
					$(this).parent().removeClass("portfolio_posts_loading");
					if (data.html) {
					var $items = $(data.html);
						$(".stm_portfolio_grid").append($items).isotope("appended", $items, false);
						stm_sort_portfolio();
					}
					$(this).attr("data-page", data.new_page);
					if (!data.load_more) {
						$(this).remove();
						$(".portfolio_btn_box").remove();
					}
				}
			});
		});

		function stm_sort_portfolio() {
			// Init Isotope
			if ($(".stm_portfolio").length) {
				$(".stm_portfolio").isotope({
				itemSelector: ".item",
					layoutMode: "packery"
				});
			}
		}

		if ($container.closest('.vc_tta').length > 0) {
			$('.vc_tta-tab > a').on('click', function () {
				setTimeout(function () {
					$container.isotope("layout");
					stm_sort_portfolio();
				}, 300);
			})
		}

		$('.portfolio_box .category_filter a').on('click', function () {
			var i = 0;
			$(this).closest('ul').find('li.active').removeClass('active');
			$(this).parent().addClass('active');
			var sort = $(this).attr('href');
			sort = sort.substring(1);
			<?php if ( empty( $works_count_visible ) ) : ?>
			$container.isotope({
			filter: '.' + sort
			});
			<?php else : ?>
			$container.isotope({
				filter: function () {
					if ($(this).hasClass(sort) && i < <?php echo esc_js( intval( $works_count_visible ) ); ?>) {
						i++;
						return $(this);
					}
				}
			});
			<?php endif; ?>
			return false;
		});
	});
</script>
