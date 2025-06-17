<?php
/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cms_12_0d502e400f84' );

/** Database username */
define( 'DB_USER', 'user_12_0d502e400f84' );

/** Database password */
define( 'DB_PASSWORD', 'nuEk8teA5pfNpNyIs5Wq' );

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
define( 'AUTH_KEY',         '{-.>NQoAE**t[W_q,6n,7w!yMqi:@VatATR%$c#oA%{]2uiMTX$IbO^?IcXrB`k7' );
define( 'SECURE_AUTH_KEY',  '?EQm9)I#9sW4w.{[mkQNV&`N$jM}0X!6t8QR%[WM}$xrsh8~zQeP8IZsI_5[wv]v' );
define( 'LOGGED_IN_KEY',    'k|VhMODuY+j)|G&&8aa.p\cotT1QND1-U!`d?*(Jqwyg%r-O>lVc,>T`E#rjN#.4' );
define( 'NONCE_KEY',        'R(^M#YYAEI_qS4YKcH@g5i7P++dbO>gQY`wB[DE{)I;c+KR2ps&tEuX8:l9~G1~l' );
define( 'AUTH_SALT',        'KCrEI%9g6Sgc-OD?4mXM!FuR->z>Tmvb2ha@SYIn7Z~!vzT>g!Z7)xk$}%o+&FGb' );
define( 'SECURE_AUTH_SALT', '*s>}hVvmpZey&&[YM6o?rp)=rY9XzCjl4!R%[fHw6kKxVtDWD6YM)*pP)<+Ulp\T' );
define( 'LOGGED_IN_SALT',   'PE}lF$!d)5A#vO#k0`:w]x99C0=BTFb_s##X.X\9>PU`8bQ$PBY>4-WEf1ot=ba{' );
define( 'NONCE_SALT',       '^602Aa16g{ww|)5Ja)I{[nc0e0^?X[qROy^s7BPo:^2TWmdRuhkZ<zj|Bp[oc3g8' );

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
