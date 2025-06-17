<?php
/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cms_12_7e2d825abdcd' );

/** Database username */
define( 'DB_USER', 'user_12_7e2d825abdcd' );

/** Database password */
define( 'DB_PASSWORD', 'VgrPClXEp5fCM1SIlRTk' );

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
define( 'AUTH_KEY',         'EdOWeX:Wrqai2,l}C.T_u_c2A,@U-%Qt%W2Sn$onsKtY&T`yd?I&p3!Hjep`c5Za' );
define( 'SECURE_AUTH_KEY',  'ehyzoHv%bw@dAZ2arD\Ah>DI*=*;pqIo?A.DgX2cvGOE!E3Q~Y>,n?VML!Qo8;uW' );
define( 'LOGGED_IN_KEY',    'wxZ~!%%k:9kO?]:96IB2,~$9(^rtXz/Ne@sHT!SSv.it>r_F%R$DZDZwNy0`CCbO' );
define( 'NONCE_KEY',        '@E}ZdQ[UqIeFahKauDtQ5w<Dy3\C/z!)<;9$C,kE\k2,/u)(7mU)9}!oC,GRiZPu' );
define( 'AUTH_SALT',        'MD|e_G1gHY8dAhn!Mg~tkzmG0y%pK_^$z/GvHprw,/_/1$Y~P>ONA>u!nGm87jE>' );
define( 'SECURE_AUTH_SALT', 'Y9)ZoQ3roX>Z.?JB|/$XanPZF_d.Pvxv?=p[TI=:;x{Vr,YXz8VUT/u>BC`ydO&h' );
define( 'LOGGED_IN_SALT',   '\1b463f3P-BGmX~neDju{K<1}7+l~yObP+m2=9n~]8lx{5eOl7%~8Yh{{{xBQbXY' );
define( 'NONCE_SALT',       '[D.Xc~1h{3saebjn1o#4BzP%MQ%35ZCuaKp,E1XW\X0K~84/=D]1GT3u2jfLHfDD' );

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
