<?php
if ( ! function_exists( 'stock_google_fonts_url' ) ) :
/**
 * Register Google fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function stock_google_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $body_fonts_variant = cs_get_option('body_fonts_variant');
    $body_fonts_variant_procesed = implode(',', $body_fonts_variant);
    $body_subsets   = ':'.$body_fonts_variant_procesed.'';


    $body_font = cs_get_option('body_fonts')['family'];
    $body_font .= $body_subsets ;

     $heading_fonts_variant = cs_get_option('heading_fonts_variant');
    $heading_fonts_variant_procesed = implode(',', $heading_fonts_variant);
    $heading_subsets   = ':'.$heading_fonts_variant_procesed.'';


    $heading_font = cs_get_option('heading_fonts')['family'];
    $heading_font .= $heading_subsets;

    /* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== esc_html_x( 'on', 'Karla font: on or off', 'textdomain' ) ) {
        $fonts[] = $body_font;
    }

    /* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== esc_html_x( 'on', 'Lato font: on or off', 'textdomain' ) ) {
        $fonts[] = $heading_font;
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
        ), 'https://fonts.googleapis.com/css' );

    }

    return $fonts_url;
}
endif;


/**
 * Enqueue scripts and styles.
 */
function stock_prefix_scripts() {

    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( 'stock-google-fonts', stock_google_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'stock_prefix_scripts' );

function stock_custom_style() {
    wp_enqueue_style(
        'stock-custom-style',
        get_template_directory_uri() . '/assets/css/custom-style.css'
    );
        $body_font = cs_get_option('body_fonts')['family'];
        $body_fonts_variant = cs_get_option('body_fonts')['variant'];
        $heading_font = cs_get_option('heading_fonts')['family'];
        $heading_fonts_variant = cs_get_option('heading_fonts')['variant'];

        $enable_boxed_layout = cs_get_option('enable_boxed_layout');
        $body_background_color = cs_get_option('body_background_color');
        $body_background_image = cs_get_option('body_background_image');
        $body_background_image_array = wp_get_attachment_image_src($body_background_image,'large',false);
        $body_bg_repat = cs_get_option('body_bg_repat');
        $body_bg_attach = cs_get_option('body_bg_attach');
        $footer_bg = cs_get_option('footer_bg');
        $footer_text_color = cs_get_option('footer_text_color');
        $footer_heading_color = cs_get_option('footer_heading_color');
        $theme_color = cs_get_option('theme_color');
        $theme_hover_color = cs_get_option('theme_hover_color');
        $theme_sec_color = cs_get_option('theme_sec_color');
        $custom_css = '
            body{font-family:'.$body_font.';font-weight:'.$body_fonts_variant.';
               
            }
            h1,h2,h3,h4,h5,h6{
    font-family:'.$heading_font.';font-weight:'.$heading_fonts_variant.'}
        ';
        if($enable_boxed_layout==true){
                if(!empty($body_background_color)){
                    $custom_css .='
                        body {background-color:'.$body_background_color.'}
                    ';
                }
                  if(!empty($body_background_image)){
                    $custom_css .='
                        body {background-image:url('.$body_background_image_array[0].')}
                    ';
                }
                  if(!empty($body_bg_repat)){
                    $custom_css .='
                        body {background-repeat:'.$body_bg_repat.'}
                    ';
                }
                  if(!empty($body_bg_attach)){
                    $custom_css .='
                        body {background-attachment:'.$body_bg_attach.'}
                    ';
                }
          }
          if(!empty($footer_bg)){
                    $custom_css .='
                        .site-footer {background-color:'.$footer_bg.'}
                    ';
                }

          if(!empty($footer_text_color)){
                    $custom_css .='
                        .site-footer .widget a{color:'.$footer_text_color.'}
                    ';
                }
          if(!empty($footer_heading_color)){
                    $custom_css .='
                        .site-footer h4.widget-title {color:'.$footer_heading_color.'}
                    ';
                }
            if(!empty($theme_color)){
                    $custom_css .='
                        .stock-cart span, .stock-slides .owl-nav div:hover i.fa, .stock-breadcum-area, .stock-breadcum-area:after, a.stock-readmore-btn, .entry-content .page-links a, .mainmenu li ul, .preloader-wrapper, .stock-service-box:hover
 .stock-service-icon:after, input[type="submit"], button[type="submit"], .vc_wp_custommenu li a:before, ul.stock-project-shorting li:before, .stock-cta-theme-2 {background-color:'.$theme_color.'}

                        .stock-cart, .stock-contact-box i.fa, a.stock-contact-box i.fa, .stock-stat-box h1, .stock-project-shorting-2 li.active {color:'.$theme_color.'}
                    ';
                }

             if(!empty($theme_sec_color)){
                    $custom_css .='
                        .borderd-btn:after {background-color:'.$theme_sec_color.'}
                    ';
                }



        wp_add_inline_style( 'stock-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'stock_custom_style' );