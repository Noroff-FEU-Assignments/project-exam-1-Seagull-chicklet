<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'Kxm4/sAyK*&4hh.H@6r#AJnsXJ11zB:9QwF&;d!?t/{.f;Ku|lAQ&~g5x&R,`KNm' );
define( 'SECURE_AUTH_KEY',   '/}}<NyI+p@|SZ^7HB^vkMgaYP2&)[?/09o8g4FE-:P>`N-x26Gg<isu 0AVBYjg[' );
define( 'LOGGED_IN_KEY',     'S2V;Ot>cr$V/xAe4L*MW_&{-XWD_L+_Z!kR!Dy^mgz@fyD{_Sv<stCm2Av;rZT^V' );
define( 'NONCE_KEY',         'a~wx [qpsktV0O)2ug{9PTAY5kS+`+T}%2etc%$IBze$1u:G*I^wVw&R3=s!)t=]' );
define( 'AUTH_SALT',         'Yr96$YlbstxOfRRP&+=iCk8uu[^9vFl9nrZz@e`r<utyBz_dC!#Q2RW!qRvm,Qny' );
define( 'SECURE_AUTH_SALT',  '<9qd_0[iyA?c,$~s<1eFwu:CR}r&yeYV+i[a<6Zf}=rcj2XZp05/@;N,qwCw):pJ' );
define( 'LOGGED_IN_SALT',    '{vj<6Q8MS<E84Q>jP@YbtdW<8Y^%QIyO/+D|p]+@>6p5e5c8wq#*Jj?A=/y^T.{j' );
define( 'NONCE_SALT',        'jDDbryLzrMbu_IAg@qW5f!WLi0%=DJIB.{aZej<niQ6T8)@9vK3.HB|Fp`=wpgp-' );
define( 'WP_CACHE_KEY_SALT', 'a ]~o%EmT.<8|$)70*!3e!H7VnqaI$h;qacTUjDDN(*esb!m~EUbPr|,]%|]-TTY' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
