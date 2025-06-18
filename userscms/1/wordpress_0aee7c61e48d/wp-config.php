<?php
/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cms_1_0aee7c61e48d' );

/** Database username */
define( 'DB_USER', 'user_1_0aee7c61e48d' );

/** Database password */
define( 'DB_PASSWORD', 'd450e142f6d1e6b2' );

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

define('AUTH_KEY',         '061438d19f05fdaa306b4dcc2bcdc3254141ca19d40ff99dc04873fc603133e4');
define('SECURE_AUTH_KEY',  '9e6e0db960e01794a4e750baacc3ebc6ce3db9913c8fc1a9e5d115e76b0c6337');
define('LOGGED_IN_KEY',    'e0a5ce9829b309ca544e0b11f7d2ae46cc1bcd0072e1507d43bd2a7b491c996b');
define('NONCE_KEY',        '6d5b40422de4b21433e1222c7ba70567c96603dc96521bf708f51e39ff32eac3');
define('AUTH_SALT',        'fc5f078459f5fa2f6cce49984a6baa5fea15d5430f54f93113fe89f61a56d522');
define('SECURE_AUTH_SALT', 'e16a1c1610a01ab60aa12753cfa4f98ec1e1d51aac854d5891d60767a91936ec');
define('LOGGED_IN_SALT',   '48086093a796b9fa942198768b43d8623d6f9e1162c0cb11707325dfda47c2b0');
define('NONCE_SALT',       'd532f417aab955e1fed269534ab181a5fd4a87c51ba142011afd4100800bea26');

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
