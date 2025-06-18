<?php
/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cms_1_57567f9c9a32' );

/** Database username */
define( 'DB_USER', 'user_1_57567f9c9a32' );

/** Database password */
define( 'DB_PASSWORD', 'c670bb78ade70787' );

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

define('AUTH_KEY',         '8bca8ba1ab7e07863d5794545f23c362b31b2076e4de0bd6c07c1aca35ce239e');
define('SECURE_AUTH_KEY',  '7a9bb5edcc2faee143d9653d7d28843ace7b38e57cadef32aa8fbf662699859a');
define('LOGGED_IN_KEY',    '41b8d62b4b437334d5ddf20ade6fa5684f09a7a9c834cc96d93357a43aa1141b');
define('NONCE_KEY',        '32d9d8a6f5cad8b1ca0715ac3ce9f9c96f98eef66d793f3aca750bf710147ec8');
define('AUTH_SALT',        '2de7435f3ce8f69d9acaec4323af4329deb49b848bf681170fa37bcee4ee64a6');
define('SECURE_AUTH_SALT', '016824b6cf294dba09be1274ca864c73e8af8cd1e6a003ac884f2bc2aa994293');
define('LOGGED_IN_SALT',   'df28c3784973bc0730dc24d1a483fde122a6e8eacf13c9a285a30ad82f7dfaeb');
define('NONCE_SALT',       'f990b01812407e2e1b0959f6265a9df328d2672be1cd3f90cc0338237838da09');

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
