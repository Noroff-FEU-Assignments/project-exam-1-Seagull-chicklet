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
define( 'AUTH_KEY',          '-c5vCmh,^g}hucgly3sni0ZX,yUvi3XB%)1jQTCQg|TJU5xvFq9T*2{v`0|`XHb_' );
define( 'SECURE_AUTH_KEY',   'lqHvbvQ yq:rnf,zp+&1O.#$a~5g?U}AVSYYc#8X)Pdu7Cs%VZLcE>i4[F&<~nw`' );
define( 'LOGGED_IN_KEY',     'oPznac=}MCwm,,!sn9%]7]Zl4c/Bz&6IYQ;@v5P;qK&~]}}o:Wh]<vM?&7QdZDJ.' );
define( 'NONCE_KEY',         'jg-75o:U`TiyhwQA~gEeoj[d_3>.}J7rTPJf]]#BWXa|Z1o?[qUUcW_C}IAPU24;' );
define( 'AUTH_SALT',         'y7K xE&bIGd pMIc~xhk4uB9/NjBp7>6IGAPNWQb6h/m.mZek^8~U7f>5s|ew;[w' );
define( 'SECURE_AUTH_SALT',  'GyK^z><+y@@qt+n&B o3?wgz>)km}ZRPti|*.w39b4z]CKBm;/%encOO.Qa9?IxO' );
define( 'LOGGED_IN_SALT',    'C$R2P)=2y]*?HUBvA_h5JK}-$k2bQ.K6ydjGa`qzG!CfC>4UkZ{cJD!(}3b%arJ*' );
define( 'NONCE_SALT',        'Wzu8ZE|C1]{%MvxP20NhOpeE76_(0$}&xk9#&ZQCwU[/A.=#(MX(R*>OW>[rkM1g' );
define( 'WP_CACHE_KEY_SALT', '}&ti/y:G8z~F1D|;WqF6i&*;TQ5$f4=]A@phGDB_IqX(=H)YMS#<J>7)`cB)wj#0' );


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
