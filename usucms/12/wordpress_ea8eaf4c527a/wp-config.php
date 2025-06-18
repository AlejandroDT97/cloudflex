<?php
/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cms_12_ea8eaf4c527a' );

/** Database username */
define( 'DB_USER', 'user_12_ea8eaf4c527a' );

/** Database password */
define( 'DB_PASSWORD', 'b8017ced359c6bac' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/** Root Password */
define( 'DB_ROOT_PASSWORD', 'root' );

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

define('AUTH_KEY',         'b7e582d8abb590be888d3384c706e4f6aad92a10367d1db123e656969bbef185');
define('SECURE_AUTH_KEY',  '09854d15c2e3da17986934cb647757f3ba4f3dee9f2563208465da5019da3754');
define('LOGGED_IN_KEY',    'e934ed9fdda62538f9422f71b1b266935dbbaac491f4db90b0006532dfd210ac');
define('NONCE_KEY',        '57f067cc7cf1aaba227f8e734cbc19eaf368680d69d9385207550a68b1ed3007');
define('AUTH_SALT',        '6a9bed0449eae5d2757b8faa527dedfcc96b9d920d66230190a51956d8146fcf');
define('SECURE_AUTH_SALT', '7ec7914d38c972c5d93df22c699a23c2f4732eee6664017dfe01fdcbc8aceef3');
define('LOGGED_IN_SALT',   '9e7eb03ebb8c2ede87c54a86b08ecd05ebdc7a0451ef3139a914830d0688c006');
define('NONCE_SALT',       '6447f61be99f68e4f81bddbf708468350dc3461b8027984bbd37c2ae7b8d9494');

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
