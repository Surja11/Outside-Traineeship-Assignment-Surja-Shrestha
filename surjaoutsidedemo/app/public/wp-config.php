<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',          ')P =qE3n;Rns.F[V.tf4X=o15Wo:s=m&WnzC*rA~vt$xd&Io)9Kd=gpVi|Rbq85Z' );
define( 'SECURE_AUTH_KEY',   '6Ff/lIGMp0A}llyjW$=>w9.eRS^BK;svBJwQ[5G,C)Z#O7SV)o@@OsY[+uC0IO&a' );
define( 'LOGGED_IN_KEY',     'EfKR:8XE4 ]>~Cvsw@vxYSTi :rrnT#~_x!S[22Lj`I{F!}3>;sIR_#Ph>dVveUO' );
define( 'NONCE_KEY',         'AgYs|e;jg=_0{@D1WGYz,>Vyuc)VUQrU-(U&<lGw(ol{#L(x]U{b3O,{yK7oTyVr' );
define( 'AUTH_SALT',         'ArHbC:z`rWVxC6D#s+>]61o~I[AL(Q5S(9T0.wR{11b:c9Ic;ggSZ8=Y]wBX~ptm' );
define( 'SECURE_AUTH_SALT',  'P_*P-nTiZM(vlgW^?:VrwSn><6SOpif5;swffyT,vN@BerZzF,H+3RPzv%EWsKQ/' );
define( 'LOGGED_IN_SALT',    '/>FcXOml`=6x}7UzOk9!5{`]7FY4-2|^}*-{zYdPM9H83U!tY1-;AEf**;S~y1k(' );
define( 'NONCE_SALT',        '-@{.RXrsS!6xYh1XD2jmdrzhL|<X/oMeQbN=MGuy16B^>pXDpwm!sO+VQM:iXD_X' );
define( 'WP_CACHE_KEY_SALT', '-rVyIP4YCW?xB=hDJ54Z_egSvpS7Oi10=^&W1/Gdp);A!xM2?EpeMk{)`Wj[ eCI' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
