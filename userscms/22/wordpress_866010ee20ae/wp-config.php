<?php
/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cms_22_866010ee20ae' );

/** Database username */
define( 'DB_USER', 'user_22_866010ee20ae' );

/** Database password */
define( 'DB_PASSWORD', 'gCpioJxPcv85PxGdL453' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/** Root Password */
define ( 'DB_ROOT_PASSWORD', 'root';

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
define( 'AUTH_KEY',         's,Xa{})(p/]8!G%i4;4%h$II8&)s&o0@Ron$A;z`3[v6c{{#zUZLK`(cc$Z>BBiR' );
define( 'SECURE_AUTH_KEY',  'K6,Z!sH}T(k[sAm42}j%:k}Ff:pYx<{\CQ~~1(\cPF(DetF5\zGLqtlaSK`~bf%^' );
define( 'LOGGED_IN_KEY',    '!t[IYdFj#6E&>E:}v,Ci|2xeC0NmU\:n1OF>h$|U\,5xPG<:&/82\$Akg90Fff8\' );
define( 'NONCE_KEY',        '`~9_Pz<d9VMN/teknxyXhMEj|m[GM7v6<W^S]M?zQtCI%]X5L&s|m#$}?yI)%]-~' );
define( 'AUTH_SALT',        '#o\O.jph,-i7?elLG`G%d/q@Bej.10a.x,E<:~>.pu-h$)wYZ?\[^HL0+Hvm^fpl' );
define( 'SECURE_AUTH_SALT', 'ik@_4,|R^ocJ}T)s(cwj/C6S(rG.1V[%8m%FJ?UEI:3GU*=u%_j%YG5Dr>+eduQQ' );
define( 'LOGGED_IN_SALT',   'VI@JQ<.N/\*y+J`XAgeMhquU+m+P4}%a%Tk;,&xbrPZt,cnyryL|olm3kuhY06Bw' );
define( 'NONCE_SALT',       'RF3SwB}1kSp\`pXNS,J;;QG]L>MO>T-~:F<(~(gUlFj1mQl^iUScurNO=K*b@f^b' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
