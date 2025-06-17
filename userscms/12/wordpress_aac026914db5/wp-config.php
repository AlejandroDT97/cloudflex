<?php
/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cms_12_aac026914db5' );

/** Database username */
define( 'DB_USER', 'user_12_aac026914db5' );

/** Database password */
define( 'DB_PASSWORD', 'SyGApUrSkd1W8h1bZpGR' );

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
define( 'AUTH_KEY',         '_r75^9jPTQ-HwN3#-fGt.&5$Ff8X^#b:(Ydh69l4j=`(V|4B(>P2P_>CKr.Yk-Q3' );
define( 'SECURE_AUTH_KEY',  '_>{4Uu58304M)nAysrgnH-t$CrlYZTIrnD=XCsl?tOp|VK<4A`+QpWGF%ln9#LSJ' );
define( 'LOGGED_IN_KEY',    'gh[*!6fV)dz;^tk]8<z0^s-tYan^|/C1~+H$)gH(#CU*q]u47w`23Q1N1*e$*|L2' );
define( 'NONCE_KEY',        '+K5Ir#|{p:W:;k}}t,V2!,kAA00y?+^yFmT:2W\HF(ayKZ}4U)|j9HCSu4q\]cN4' );
define( 'AUTH_SALT',        'fxj[*51F#pFR*QM0#mj]N;pz,3SCBW_;*wT)7yojYC&@Wa(C?{)LGM:#bV;#Aj\a' );
define( 'SECURE_AUTH_SALT', 'j<LZU9H=+A]QxrJ*W[Z6*s),bqpi!amjdbuYCv,ZkC_5f4H1rf@}wse:XShQU&j+' );
define( 'LOGGED_IN_SALT',   'G*XREH7U^T<gbjQh=O[`]2v/<1RSs9&q=*fD*v/wq{E]gjl0dO.$x>|IGM8=de$e' );
define( 'NONCE_SALT',       'Ivs3qz!+sNpi.5pa]lClMs|}=lzjRHy#}49$6)\{H?TB/}*^8Ul(}6AN~A+T{6e:' );

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
