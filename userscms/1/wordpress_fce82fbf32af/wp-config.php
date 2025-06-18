<?php
/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cms_1_fce82fbf32af' );

/** Database username */
define( 'DB_USER', 'user_1_fce82fbf32af' );

/** Database password */
define( 'DB_PASSWORD', '5af2f7449118f8bb' );

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

define('AUTH_KEY',         '3d9b9ec148d1c18c5a422f631574cb9c4814dfabcf53eb02706a5f71e52b8d39');
define('SECURE_AUTH_KEY',  '73535de3919fe6233da43b0645ed998f7f3c47836bbfa8e6504a6f4c58ea6220');
define('LOGGED_IN_KEY',    'eb884b81ac5a820f97adac288f899ffed4207ad62856539f85d3476d897dd871');
define('NONCE_KEY',        '2482f0ba481f3b3d85c891208f7da36a90265e586949c50267a24e0bf215c45d');
define('AUTH_SALT',        'c576b2e1cb2488e689351e3f1adced53d8bd4ce90171cd7260162d6ba1f0a52b');
define('SECURE_AUTH_SALT', 'a621ad83ec986eeff092349d0dae73bfbe16d93f57401494add88ad83b2415ef');
define('LOGGED_IN_SALT',   '25e1c7dc49af7529423c68d2a21a01edef896d27656b8b31c74cedc7828ac026');
define('NONCE_SALT',       'd5b1c3c5b8eb263f76377520bfe0118845da0049a36803e42b55e5bcde94e4da');

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
