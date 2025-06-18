<?php
/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cms_25_e164da298c87' );

/** Database username */
define( 'DB_USER', 'user_25_e164da298c87' );

/** Database password */
define( 'DB_PASSWORD', '60656cfb070430c3' );

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

define('AUTH_KEY',         '07d3075cb110be9a02861f82f7ba4e174181759d7d01704433a747b3c2752310');
define('SECURE_AUTH_KEY',  '99fbed7988a4de2a6b41f59cccd310d4b3a618970c992b06d9e87abbcd5c0440');
define('LOGGED_IN_KEY',    '1134be05c4d4621267ed5d194b4a19d1c79b99d6e9e919a0d17852162bf8c616');
define('NONCE_KEY',        '79784631ad27bc0c91f90bb6032b812f9957c8747ae249b4cfccbd9b1b02e7b9');
define('AUTH_SALT',        'd840efdfe0eabbe095d43d7c65cd3d02a907dfa5a3875740489900d148232a49');
define('SECURE_AUTH_SALT', '5a71a3c95d803acbe8dfe287b153e4e21f7a1d8c9f589fdcdba508d2275d0441');
define('LOGGED_IN_SALT',   'd7d0de3e41e28df8f51b8883fc8d44ef34b8501e2032acb727c622089b6b222d');
define('NONCE_SALT',       'ffb3ae2a2668e8be8648a8c252001c096573ecb46d26b542ac15ca17963ae4a2');

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
