<?php
/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cms_21_109c49903ce2' );

/** Database username */
define( 'DB_USER', 'user_21_109c49903ce2' );

/** Database password */
define( 'DB_PASSWORD', '5youQZgJXpv1aHwuNcCD' );

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
define( 'AUTH_KEY',         '!D~jiQ$mt>,xcBg>%bXc47F)LE[WeW_teEb[DvGB9_Ln9`MY>#Ih.btchj{CF#@B' );
define( 'SECURE_AUTH_KEY',  'yhc4/#16LVP8_?w_O%#y8vsdbzz0cJj>FR|{O~Yj#+fhnWI_[_WyHv}qWOy}$U!&' );
define( 'LOGGED_IN_KEY',    ';a7SccF=6k?Yw4}i~oxYE$?#wOnz.r:{xJ/5#[FJXA4bD`H9.2q@UU\N)rfA]jr`' );
define( 'NONCE_KEY',        '()WH2&e<nsTpn}EGa(jR`(#a4[U`H\C%Fh2g7i+M1x!UCf[oxXm[_\g)XO46b4w%' );
define( 'AUTH_SALT',        '(?mMSAX4?[QL}ve_P\-W$=TkT?C]/k(vkAAs&MbU@t/A{/Y82(tOn2zJvNc1]V4[' );
define( 'SECURE_AUTH_SALT', 'CtuY\kX!?%*$k>_,wm$6#+M8;]c2Uo&Qq]k%i21FO$M]TC@MJqh7,w=IDHxw$Aj+' );
define( 'LOGGED_IN_SALT',   'pMF4r]S~4\U}[Un)~$nSr*paG!vj:v,O7Rm9]?7A;7CVe~4:Eq_FBc1f[[HoXqeN' );
define( 'NONCE_SALT',       '}Lb9rsD<-M*NhTahH-,XHr\sC$l-`,|.ane+!?&xfS`>}rFx)Tb~&e}S9+s$+&y*' );

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
