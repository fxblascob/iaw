<?php
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
define( 'DB_NAME', 'wpress' );

/** Database username */
define( 'DB_USER', 'wpress' );

/** Database password */
define( 'DB_PASSWORD', 'wpress' );

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
define( 'AUTH_KEY',         '^f_^TW)C BES=+BiOSLWjvNHbJ=6(pt-qAPC85w9n`d_G&QWl8&j >Kf>=Qqp=*%' );
define( 'SECURE_AUTH_KEY',  'b*9{LB`i5lTI*2<epMN,4,h:-CwAh-6>%}C2yb6F),(bH>i6E0`1^.y2?!ldS|?H' );
define( 'LOGGED_IN_KEY',    '9]{ay8 S4IQ{(& Y49S5`Q(bxyA-1>Lk@T3B&o*{#qogpS7:`<me`vqeLx<_.6c ' );
define( 'NONCE_KEY',        '0e+h.CRBPQVgC`E:dh1mO+c,n$=_)3mU?w3Sldiyc[5z_i}cL`dl!^2rOBm+n~Ub' );
define( 'AUTH_SALT',        '^L=<~a?Rvigp%!*}Afq?wQQCLRA2v1g]JD(OQ*d%r8i<;3/%+8?K9t^y%/[8$b4p' );
define( 'SECURE_AUTH_SALT', '/o=~{3xs8~u+p*kgw_nj2U4Va4zwS{( ,a%nFJA&<kQxrODr7QHfT,b&t?x*6s]T' );
define( 'LOGGED_IN_SALT',   'LD5m{(HMQYi jWD&U(kF!~sl?}33P$#ZOU2`|}zvS|nIDR`wCCo[X^ml8iId@?r-' );
define( 'NONCE_SALT',       '3YQcQ&>M&M =,@-*]=5k.<BChC$h%?70gWXyn.pZq;1T^vz.w$0<!=&O{0fFp8]6' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
