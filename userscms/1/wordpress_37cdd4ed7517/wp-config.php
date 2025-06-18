<?php
/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cms_1_37cdd4ed7517' );

/** Database username */
define( 'DB_USER', 'user_1_37cdd4ed7517' );

/** Database password */
define( 'DB_PASSWORD', '7956c6a38cc6389a' );

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

define('AUTH_KEY',         'e67b1a399fa4e749f98b4d2539c527a073133c9519ee9b538a000cd196111463');
define('SECURE_AUTH_KEY',  '3b34ab1b08be6ef2911516f68c79ca4206f9e85f594692717c8cd5e3daff5d62');
define('LOGGED_IN_KEY',    '7e1742c728db652d5453dafdf490fa015562d66f2f32605828e6c776a0cdfccd');
define('NONCE_KEY',        'a3d770dcced1bc230a5a1e16c867041b0467bdd7eaebfa10ca3949933c09b406');
define('AUTH_SALT',        '1132ddfb894320fad0629226d4b1e9e938cef796d9be1504fcdd0694e8dfa234');
define('SECURE_AUTH_SALT', 'c237de724b40a517752c05956089d0f4a0e55835a0b7a59fe0aefe5be775e970');
define('LOGGED_IN_SALT',   '3f8940c1509dddc0d2078e7f7fb060931d86d9f19c0d281157f5c283e740ece7');
define('NONCE_SALT',       '9dbc81b124d19ea42e853bafdeb9caff12d3c2b0a7262a8e804a86fdde45c25b');

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
