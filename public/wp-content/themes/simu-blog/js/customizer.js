/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );



  //Header menubar Bg
  wp.customize("simublog_header_menubar_color", function (value) {
    value.bind(function (to) {
      $(".header_style_2 .header-menu-area .header-main-menu").css("background", to);
    });
  });
  




  //Header background Bg
  wp.customize("simublog_header_background", function (value) {
    value.bind(function (to) {
      $(".breadcrumbs_section::before").css("background", to);
    });
  });
  //body background Bg
  wp.customize("simublog_body_color", function (value) {
    value.bind(function (to) {
      $("body").css("background", to);
    });
  });



  //Blog Bg
  wp.customize("simublog_blog_color", function (value) {
    value.bind(function (to) {
      $(".blog_style2").css("background", to);
    });
  });

  //Footer Bg
  wp.customize("simublog_footer_color", function (value) {
    value.bind(function (to) {
      $(".footer_style2").css("background", to);
    });
  });

  //Footer bottom Bg
  wp.customize("simublog_footer_bottom_color", function (value) {
    value.bind(function (to) {
      $(".footer_style2 .footer-copyright").css("background", to);
    });
  });

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );
}( jQuery ) );
