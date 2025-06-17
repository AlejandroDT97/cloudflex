<?php
/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cms_12_ed21940e57d5' );

/** Database username */
define( 'DB_USER', 'user_12_ed21940e57d5' );

/** Database password */
define( 'DB_PASSWORD', 'FnPewsLp3UguWXEpK9s0' );

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
define( 'AUTH_KEY',         'w7a:UYC_cgh~Zw@vzyOw,K,FFMc^q7DP>~Q)a/IC?}i09[Z\T{dID!7y]YmX/V?v' );
define( 'SECURE_AUTH_KEY',  'g]7@NfTrD<JY|<OU<#/GpQNSQ:U3!h7g?r7]l5*8pb334o/~^XNYPLK-{4C4;[ft' );
define( 'LOGGED_IN_KEY',    '&3mwHV*S>Zo.djyNfai2[8Kj?8>DQf/sQ+3*J?(WPrUh_6]6kubX`oxxZ+,w?xmN' );
define( 'NONCE_KEY',        'zJ_ey)SK0_0^ArewTG,0C$C~@C<uR8n|x-z!bXVE]=BjMK#CpTk9\47PcY?7%Vg\' );
define( 'AUTH_SALT',        'hSj3B56y]wASnus@tYcv+1}d^cgHXMz!#OZLonOx),B6nA!XA)&Vtii>+_%:<d0}' );
define( 'SECURE_AUTH_SALT', 'L=\ool#.fe|3tNV@f5_:;m2dC\Fy?T[OwYOg,x|H`1khyjlVq2:x<$:^at@1RN>N' );
define( 'LOGGED_IN_SALT',   '9_~(-h#S}h-uNTE|D/!/uOXX&_|r[=b8s.qi.%C#Q>:r{6YW?*,!YC$4=S%m3Z[c' );
define( 'NONCE_SALT',       'eN?!G;{H0z.+9t,hpS2r?j[hg:0ovIk&FZc9`txAd0Yv*=P6bNF+mK005qQkN05>' );

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
