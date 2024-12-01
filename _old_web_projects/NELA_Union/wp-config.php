<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'db557432640');

/** MySQL database username */
define('DB_USER', 'dbo557432640');

/** MySQL database password */
define('DB_PASSWORD', 'loobie66');

/** MySQL hostname */
define('DB_HOST', 'db557432640.db.1and1.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'E;k`lLW.6@p)$tH|7h>v^lg6u|J<spTD!.&Bx8+26S=)O&7G$,Z{N*G&wBH2l-z)');
define('SECURE_AUTH_KEY',  ':v:H50O+gI5uv7:_U;b-OM+>^;+vN6myOx%mA|;w(|fPU*$_i`AbHqeoFVd@s+]B');
define('LOGGED_IN_KEY',    'T/|uA5E2,;g d=?S2O1h5AMA7]Ps3o>2T<>3MB<x-ylu|.|B ,+bA^(XTn5fW707');
define('NONCE_KEY',        'Y<7RKr~&SkQS[tB6ZH=(]+Qs1EcdNvT%]WBIg+_AX9iE|P(LHc`J5RNF(`P|<Rz]');
define('AUTH_SALT',        'I{ 7>(]|VNaHmqu39ID4R]-2+r!@lBu~n-Tsdju`o;A[.<+.{*tB/:QW%c-t0&<Z');
define('SECURE_AUTH_SALT', 'K7(C[</2+j,;u84?_oG^HtxLR*M$g(+<k5zFwPv-r1^njj-jjVUI-c= t/:g|Jn#');
define('LOGGED_IN_SALT',   '4`|v A?3;{@r-VD%&*!4kP7J2,-_+Fha{8q^-67m7]7n^ihiK&0sAX%|Rd86~*t{');
define('NONCE_SALT',       '=1|:`DUW#GM95)}-bam %-UbM+o]b[aFjVSNE}Ndfl$<LEMzp-a7%$]i]bA06|[?');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
