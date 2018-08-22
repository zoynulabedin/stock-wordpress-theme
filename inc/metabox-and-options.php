<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

function stock_theme_page_metabox( $options ) {

  $options      = array(); // remove old options
$options[]    = array(
  'id'        => 'stock_page_options',
  'title'     => 'page options',
  'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'high',
  'sections'  => array(

    array(
      'name'   => 'page_options_meta',
      'fields' => array(

        array(
          'id'    => 'enable_title',
          'type'  => 'switcher',
          'title' => 'Enable title?',
          'default'=>true,
          'desc'  => 'if you want to show page title, select yes,'
        ),
        array(
          'id'    => 'custom_title',
          'type'  => 'text',
          'title' => 'Custom title?',
          'dependency'   => array( 'enable_title', '==', 'true' ),
          'desc'  => 'if you want to show page title, select yes',
        ),
        
      ),
    ),

  ),
);
  
  //slides options
$options[]    = array(
  'id'        => 'stock_slide_options',
  'title'     => 'slide options',
  'post_type' => 'slide',
  'context'   => 'normal',
  'priority'  => 'high',
  'sections'  => array(

    array(
      'name'   => 'slide_options_meta',
      'fields' => array(

        array(
  'id'              => 'buttons',
  'type'            => 'group',
  'title'           => 'Slide buttons',
  'button_title'    => 'Add New',
  'accordion_title' => 'Add New bitton',
  'fields'          => array(
    array(
      'id'    => 'type',
      'type'  => 'select',
      'title' => 'button type',
      'desc' => 'select button',
      'options'        => array(
    'borderd'          => 'Borderd Button',
    'boxed'     => 'Boxed Button',
  		),
    ),
    array(
      'id'    => 'text',
      'type'  => 'text',
      'title' => 'button text',
      'desc' => 'type button text',
      'default' => 'Get free consultation',
    ),
    array(
      'id'    => 'link_type',
      'type'  => 'select',
      'title' => 'link type',
      'options'        => array(
	    '1'          => 'WordPress page',
	    '2'     => 'External link',
  		),
    ),
    array(
      'id'    => 'link_to_page',
      'type'  => 'select',
      'title' => 'select page',
      'options'        =>'page',
      'dependency'      =>array('link_type','==','1'),
    ),
     array(
      'id'    => 'link_to_External',
      'type'  => 'text',
      'title' => 'Type URL',
      'dependency'      =>array('link_type','==','2'),
    ),
     array(
      'id'    => 'enable_overlay',
      'type'  => 'switcher',
      'default' => true,
      'title'   =>'enable overlay?'
    ),
     array(
      'id'    => 'overlay_percentage',
      'type'  => 'text',
      'default' =>'.7',
      'title'   =>'overlay percentage',
      'desc'    =>'type overlay percentage in floading number. max value is 1.',
      'dependency'=>array('enable_overlay','==','true'),
    ),
     array(
      'id'    => 'overlay_color',
      'type'  => 'color_picker',
      'title'   =>'overlay color',
      'default'    =>'#181a1f',
      'dependency'=>array('enable_overlay','==','true'),
    ),

  ),
),
       
        
      ),
    ),

  ),
);

  return $options;

}
add_filter( 'cs_metabox_options', 'stock_theme_page_metabox' );


function stock_theme_options ($options){
  $options      = array(); // remove old options

$options [] = array(
  'name'    =>'stock_header_settings',
  'title'  =>'Header settings',
  'icon'    =>'fa fa-cog',
  'fields'  =>array(
      array(
        'id'              =>'header_iconic_boxes',
        'type'            =>'group',
        'title'           =>'Iconic boxes',
        'desc'           =>'If you want to show iconic box on Header.Add thos here',
        'button_title'    =>'Add New',
        'accordion_title' =>'Add New Field',
        'fields'          =>array(
            array(
                'id'    =>'title',
                'type'  =>'text',
                'title' =>'Title'
            ),
            array(
                'id'    =>'icon',
                'type'  =>'icon',
                'title' =>'Box Icon',
            ),
            array(
                'id'    =>'big_title',
                'type'  =>'text',
                'title' =>'Large Title',
            ),
            array(
            	'id'	=>'link',
            	'type'	=>'text',
            	'title'	=>'Box link',
            	'desc'	=>'Leave blank if you dont use link'
            )
        )
      )
  )
);
$options [] =array(
  'name'    =>'stock_social_settings',
  'title'   =>'Social Link',
  'icon'    =>'fa fa-gift',
  'fields'  =>array(
      array(
          'id'                =>'social_links',
          'type'              =>'group',
          'button_title'      =>'Add New',
          'accordion_title'   =>'Add New Links',
          'fields'            =>array(

              array(
              'id'       =>'icon',
              'type'     =>'icon',
              'title'    =>'Boxed Icon',
          ),
          array(
            'id'        =>'link',
            'type'      =>'text',
            'title'     =>'Link'
          )
        )

      )
  )
);

$options [] = array(
  'name'    =>'stock_logo_settings',
  'title'   =>'Logo Settings',
  'icon'    =>'fa fa-picture-o',
  'fields'  =>array(
      array(
        'id'          =>'enable_image_logo',
        'type'        =>'switcher',
        'title'       =>'Enable image logo?',
        'default'     =>false,
      ),
      array(
        'id'          =>'image_logo',
        'type'        =>'image',
        'title'       =>'Upload site Logo',
        'dependency'  =>array('enable_image_logo','==','true'),

      ),
      array(
      	'id'		=>'image_logo_max_heigt',
      	'type'		=>'text',
      	'title'		=>'Logo Max Height',
      	'default'	=>'100',
      	'desc'		=>'type logo heigt in number',
      	'dependency'=>array('enable_image_logo','==','true'),
      ),
      array(
          'id'        =>'logo_text',
          'type'      =>'text',
          'title'     =>'Logo Text',
          'default'   =>'Stock',
          'dependency'=>array('enable_image_logo','==','false'),
      )
  )
);
$options [] =array(
  'name'    =>'stock_typography_settings',
  'title'   =>'Typography Settings',
  'icon'    =>'fa fa-font',
  'fields'  =>array(
      array(
          'id'      =>'body_fonts',
          'type'    =>'Typography',
          'title'   =>'Body Fonts',
          'default' =>array(
              'family'  =>'Roboto',
              'variant' =>'regular',
              'font'    =>'google',
          ),
      ),
      array(
		  'id'       => 'body_fonts_variant',
		  'type'     => 'checkbox',
		  'title'    => 'Body Fonts type',
		  'options'  => array(
		    '100'  => '100',
		    '100i' => '100i',
		    '200' => '200',
		    '200i' => '200i',
		    '300'  => '300',
		    '300i'  => '300i',
		    '400'  => '400',
		    '400i'  => '400i',
		    '500'  => '500',
		    '500i'  => '500i',
		    '700'  => '700',
		    '700i'  => '700i',
		    '800'  => '800',
		    '800i'  => '800i',
		    '900'  => '900',
		    '900i'  => '900i',
		  ),
		  'default'  => array( '400', '400i','700','700i' )
		),
      array(
        'id'      =>'heading_fonts',
        'title'   =>'Heading fonts',
        'type'    =>'Typography',
        'default' =>array(
          'family'  =>'Noto Serif',
          'variant' =>'700',
          'font'    =>'google',
        )
      ),
      array(
		  'id'       => 'heading_fonts_variant',
		  'type'     => 'checkbox',
		  'title'    => 'Heading Fonts type',
		  'options'  => array(
		    '100'  => '100',
		    '100i' => '100i',
		    '200' => '200',
		    '200i' => '200i',
		    '300'  => '300',
		    '300i'  => '300i',
		    '400'  => '400',
		    '400i'  => '400i',
		    '500'  => '500',
		    '500i'  => '500i',
		    '700'  => '700',
		    '700i'  => '700i',
		    '800'  => '800',
		    '800i'  => '800i',
		    '900'  => '900',
		    '900i'  => '900i',
		  ),
		  'default'  => array( '400', '400i','700','700i' )
		),
  )
);
$options [] =array(
    'name'  =>'stock_styling_settings',
    'title' =>'Styling settings',
    'icon'  =>'fa fa-paint-brush',
    'fields' =>array(
     
      array(
          'id'          =>'theme_color',
          'type'        =>'color_picker',
          'title'       =>'Theme Color',
          'default'     =>'#1E8BC3',
          
      ),
       array(
          'id'          =>'theme_hover_color',
          'type'        =>'color_picker',
          'title'       =>'Theme Hover Color',
          'default'     =>'#1E8BC3',
          
      ),
       array(
          'id'          =>'theme_sec_color',
          'type'        =>'color_picker',
          'title'       =>'Theme Secondary Color',
          'default'     =>'#FFF334',
          
      ),
        array(
          'id'          =>'enable_preloader',
          'type'        =>'switcher',
          'title'       =>'Enable Preloader',
          'default'     =>true,
          
      ),
      array(
        'id'            =>'enable_boxed_layout',
        'type'          =>'switcher',
        'title'         =>'Enable Box Layout',
        'default'       =>false,
      ),
      array(
          'id'          =>'body_background_image',
          'type'        =>'image',
          'title'       =>'Body Background Image',
          'dependency'  =>array('enable_boxed_layout','==','true'), 
      ),
      array(
          'id'          =>'body_background_color',
          'type'        =>'color_picker',
          'title'       =>'Body Background color',
          'dependency'  =>array('enable_boxed_layout','==','true'), 
      ),
      array(
            'id'        =>'body_bg_repat',
            'type'      =>'select',
            'default'   =>'repeat',
            'options'   =>array(
                'repeat'    =>'Repeat',
                'no-repeat' =>'No Repeat',
                'cover'      =>'Cover',
            ),
            'title'     =>'Body Background Repeat',
            'dependency'=>array('enable_boxed_layout','==','true'),
      ),
      array(
          'id'          =>'body_bg_attach',
          'type'        =>'select',
          'options'     =>array(
              'scroll'   =>'Scroll',
              'fixed'    =>'Fixed',
          ),
          'title'       =>'Body Background Attachment',
          'dependency'  =>array('enable_boxed_layout','==','true'),
      )
    )
);
$options [] =array(
  'name'    =>'stock_blog_settings',
  'title'   =>'Blog Settings',
  'icon'    =>'fa fa-th',
  'fields'  =>array(
      array(
          'id'      =>'display_post_by',
          'type'    =>'switcher',
          'title'   =>'Display post by',
          'default' =>true,
          'desc'    =>'if you want to show post author. select yes'
      ),

      array(
          'id'      =>'display_post_by_date',
          'type'    =>'switcher',
          'title'   =>'Display post date',
          'default' =>true,
      ),

      array(
          'id'      =>'display_post_comment_count',
          'type'    =>'switcher',
          'title'   =>'Display comment count',
          'default' =>true,
      ),

      array(
          'id'      =>'display_post_in_category',
          'type'    =>'switcher',
          'title'   =>'Display post in category',
          'default' =>true,
      ),

      array(
          'id'      =>'display_post_tags',
          'type'    =>'switcher',
          'title'   =>'Display post in tags',
          'default' =>true,
      ),

      array(
          'id'      =>'display_post_next_previews',
          'type'    =>'switcher',
          'title'   =>'Enable Next Previews Link on sinngle post',
          'default' =>true,
      ),
  )
);
$options [] =array(
    'name'    =>'stock_footer_settings',
    'title'   =>'Footer settings',
    'icon'    =>'fa fa-cogs',
    'fields'  =>array(
        array(
            'id'    =>'footer_bg',
            'type'  =>'color_picker',
            'title' =>'Footer Background Color',
            'default'=>'#2A2D2F'
        ),
        array(
            'id'    =>'footer_text_color',
            'type'  =>'color_picker',
            'title' =>'Footer text color',
            'default'=>'#afb9c0',
        ),
         array(
            'id'    =>'footer_heading_color',
            'type'  =>'color_picker',
            'title' =>'Footer Heading color',
            'default'=>'#fff',
        ),
           array(
            'id'    =>'footer_copyright_text',
            'type'  =>'textarea',
            'title' =>'Footer Copy Right Text',
            'default'=>'Copyright@2017-Crazycafe All right reserved',
        ),
    )
);
$options [] =array(
    'name'  =>'stock_scripts_settings',
    'title' =>'Script settings',
    'icon'  =>'fa fa-code',
    'fields'=>array(
          array(
              'id'        =>'head_scripts',
              'type'      =>'textarea',
              'sanitize'  =>false,
              'title'     =>'Head scripts',
              'desc'      =>'Scripts goes before closing </ head>'
          ),
          array(
              'id'        =>'body_start_scripts',
              'type'      =>'textarea',
              'sanitize'  =>false,
              'title'     =>'Body start scripts',
              'desc'      =>'Scripts goes after closing <body> start'
          ),
           array(
              'id'        =>'body_end_scripts',
              'type'      =>'textarea',
              'sanitize'  =>false,
              'title'     =>'Footer scripts',
              'desc'      =>'Scripts goes before closing </body>'
          ),
    )
);
return $options;
}
add_filter( 'cs_framework_options', 'stock_theme_options' );
