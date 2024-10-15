<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'L42_>h@i~8fotmh5a%7p*9lj=%}~#XKtbn%ODDM%To|vyP/P5ls}It~+?hY/!UeR' );
define( 'SECURE_AUTH_KEY',  'tV&Fh4[zO?E^9b=ffsQsemPjuz5|a{qrbplB ><I-00e^ 5(Vml*T[h`(4OJtW5v' );
define( 'LOGGED_IN_KEY',    'M]CqMT_hGb<of,{aNiUyT4 b:?UN4Hj?1^}_a9,A|_0H#]Nw![7Gh5$*Z?CW*y-u' );
define( 'NONCE_KEY',        'oR+61E%6;X?ege2L2|,#+:|-jB~_!]{M0[?+z3n,_&_]~hH8[d@;J^Pgbmdekk0L' );
define( 'AUTH_SALT',        'WaWP8?^Zpn^mCP`$]y(rp>a3Z90.GfP04rrOVG/0C#-h7H=p=p@Daa*?UBR2DgA8' );
define( 'SECURE_AUTH_SALT', '2@9lb^O8UuRh[EntqsMWN;J<RUZzFbX*:|BZ{*nC&Q7GSE!dVZFUhApgC#AYI,Ag' );
define( 'LOGGED_IN_SALT',   '6J1eqk0*1F|822*^m>;r}Zf4VAJikr/3G!7[l$ofR8nVI*Eb6!r~vQJ7,A%V3@_s' );
define( 'NONCE_SALT',       'VUrnj6qzGl|<UzGjk=yBt+fbVZ^O,hN35JDh7QtM=M*$RYAcdE0sEf{7AM]#09ck' );

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
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
