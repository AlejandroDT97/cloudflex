<?php
/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cms_12_0aa4e430694b' );

/** Database username */
define( 'DB_USER', 'user_12_0aa4e430694b' );

/** Database password */
define( 'DB_PASSWORD', 'CkoKtecAfmaxtjUPcALQ' );

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
define( 'AUTH_KEY',         'p+NNLV]:A.j%.J%aS~dQ%HhL)>6%$0>+<Y!W>8Z5CsEu#?ZK<P%!i-?m?R%2p}6T' );
define( 'SECURE_AUTH_KEY',  'I.A`ySutSc@:OKw:o.>z<qJQnA-[w^#@Vq~T#@%S2$,+6Dr)(qw,>1.k{TOImS&R' );
define( 'LOGGED_IN_KEY',    'rrx\{_8f[R6t8nz[*<F;:LIyA*:>}(9jLr!CVTu}N#z0J=S+kr-XqBQZ)BXatmTJ' );
define( 'NONCE_KEY',        '_g%EBdM^`xs~9g?]Y%2D@2!z^RxSm2Dq%KBkH-(U5C`=`xGr59yGMvI<UEgs,*]0' );
define( 'AUTH_SALT',        '}&vz+tfl2WKa}/,M<P37~45x~W`1P=?s?=u](36_gK%B$Rp!5zan~WnOY~:{E;2?' );
define( 'SECURE_AUTH_SALT', 'FkB}\HBONf:5#nt!K`Ee,nm9O,xV*O*;|~c#HGNGB]K^G?vkiA:q.>0>HYz_4ivE' );
define( 'LOGGED_IN_SALT',   'LFLWHf(y~bA8!1St89*mogYyQezFbI&-@oZ;-8ZN<q&V}Vjqb4W2HCU@H0Z}*Jyj' );
define( 'NONCE_SALT',       '?a>wF;|%FQxB{`qKed4Mki%,aqqi|.Je)|ucK`e%H1q!9;(~{~+j0(Jy}w,X.ipR' );

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
