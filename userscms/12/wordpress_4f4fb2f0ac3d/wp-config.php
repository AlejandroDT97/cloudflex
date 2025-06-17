<?php
/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cms_12_4f4fb2f0ac3d' );

/** Database username */
define( 'DB_USER', 'user_12_4f4fb2f0ac3d' );

/** Database password */
define( 'DB_PASSWORD', 'Ummy5th5UyiYDz8r70ud' );

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
define( 'AUTH_KEY',         'zOOKV}KJs{S3y_j0004SCGo4Ok]RDgFcueK#(%|n?cP%S6o(e!r4DuDk1rI3=NZ4' );
define( 'SECURE_AUTH_KEY',  'K?=EfW6B`[d`2o{<bR`+X0P<8B&q$4;&(K&g2@bjs`7S=5s(>nkh3o)wkE}WC?tO' );
define( 'LOGGED_IN_KEY',    'DYa)1`i7+E*K5V*SDbTe7Iv$q3wC010cI\~dtB%[s`0tWXbmB4*6LwL5723VjWcv' );
define( 'NONCE_KEY',        'toZ0q_JSOS9S;?={XPjK*Ey>{Ni<M5M`g)]yy^j:)n><F=iA&vbJlXS2=<;3SD$_' );
define( 'AUTH_SALT',        'IDK9Dd-3Rd:64!c*X|+%l?b^]9QTE*0S#Yl!^76h!BzR<ZXLS@+l#E5rY$S1qK\}' );
define( 'SECURE_AUTH_SALT', 'vyW<EI#_2_Qf8:Natn1eg`A>ao1w3:n;D0LLq?P-pUv@RLqzc5JS>(vl?~?|%~5E' );
define( 'LOGGED_IN_SALT',   'n{fU_m(yLk$ogzPNdRqIzjl[[2@\pM_v/+){eEkFCd+QaD))(#O?PxGRpaLWJQ>l' );
define( 'NONCE_SALT',       'u:4J.2;>=D<FJrOV1eLbCdXf7+/.ohPt<cQp^-J&~*Hp%`R@rAzs|&k,_~,P2R!y' );

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
