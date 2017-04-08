<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
define('DB_NAME', isset($_SERVER['DB_NAME'])?$_SERVER['DB_NAME']:'arviwordpress');

/** MySQL database username */
define('DB_USER', isset($_SERVER['DB_USER'])?$_SERVER['DB_USER']:'mandar_zope');

/** MySQL database password */
define('DB_PASSWORD', isset($_SERVER['DB_PASSWORD'])?$_SERVER['DB_PASSWORD']:'shraddha');

/** MySQL hostname */
define('DB_HOST', isset($_SERVER['DB_HOST'])?$_SERVER['DB_HOST']:'wordpress-arvi.cuamzal5upzt.ap-south-1.rds.amazonaws.com:3306');


/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '(Fl_CQzfmK+sUziS+X)|cX]fJuKTPs96~><</_/};;;&X9 ,~4|ZT_pNkgLsT9uk');
define('SECURE_AUTH_KEY',  '1K!N&`j$]QtH6#4%Bxd7b{^?b}H)&:(|9VpZn+6^SgY|HJcX3jE,&ZZ[qVD0[oBb');
define('LOGGED_IN_KEY',    ' dcsLCjj&Gjby}}{pE1^/07-R-DM5a;M:=LNmfWoVC#Pyo7>l~)*#>TN@.Bw5WDC');
define('NONCE_KEY',        'ZN+)|:D.284)wFL&EY?2wjAD:Sjr5~S!aWCN_]:5Hm| ^%R4Xcq_FTSCoL U.;C2');
define('AUTH_SALT',        'W&`2H{d7Bzjt6^$KDiSN& 9=Tx^Ff3j*[b~m[Kmq=0`d61CrpN3_RxT7Axk3J2B$');
define('SECURE_AUTH_SALT', ')VJc 6n)*2i2T8$_/76>c;-u5`{d=Fb~-iWwMx]L=|aHN=`E)>WkzhL3uN/at!~I');
define('LOGGED_IN_SALT',   'TL>Mu@6e-Y22l&sii-o9ln*CZE&fw{ujheC6vV~;2gc:::`Br0}HH>t<xvZY8JXl');
define('NONCE_SALT',       '?&?(nxwlr;[qv$r-<:5HL9OUUla;#ng`QY^B~]jhTHWOdbNJoEUdYr-6/ZJxZP7w');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
