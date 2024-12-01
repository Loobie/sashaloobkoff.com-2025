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
define('DB_NAME', 'db473470206');

/** MySQL database username */
define('DB_USER', 'dbo473470206');

/** MySQL database password */
define('DB_PASSWORD', 'loobie66');

/** MySQL hostname */
define('DB_HOST', 'db473470206.db.1and1.com');

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
define('AUTH_KEY',         'g Vaac7Q?ZL_tHBiahPk^$wU~TA`/i4Bh[S0D>uB-?gdStX:m|Y^#^-f;aJ5W4=}');
define('SECURE_AUTH_KEY',  ':#!z/}2Cim@s@~~0^ruY}qHm;ZD>p]nroDFH#_$PN}<+Cu+ni,X-$KVP}}k0e#Vb');
define('LOGGED_IN_KEY',    'Ni*IL@dyx|e=H-k4}2VDa]gT+%~<H,CDu;`HWWU--r3-5R^T+<sk?qj&6}7@mG~)');
define('NONCE_KEY',        'O]=-48}XPv?R^Hf>g6k(YTjV-nIt*@#qleAH?S#.DUZ@|{p}yu|31glXCEu-DMPm');
define('AUTH_SALT',        '-~%dpIk81/c!W!}!6jQU_X/=d6@^Eo}~9;H*Ij+qRPXk~ PtX:.wCIZ1RFqV+T9R');
define('SECURE_AUTH_SALT', '~rKY7`n5HjOjcQkf=2ss)SS6#XhY-IYNxfY=Z_sR!@cQ]OV{3+M/T4TBmipJa7x}');
define('LOGGED_IN_SALT',   'uPBg0d3D:=?Ydl7/+IY-6$.^+4 [FDHcWhXsR:O-sOA9JH}7$ {+M?Nlj.`|vXT]');
define('NONCE_SALT',       'x:{9t3P@<Pth:dDbR#qWXIV$9.3R5gvH$Ym5&p%K(8P)n(&UCm1%??F1Wva+R;- ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
