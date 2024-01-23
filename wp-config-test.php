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
/** The name of the database for WordPress */
define('DB_NAME', 'localhost');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
 define('AUTH_KEY',         'im?h+TwS$5^hQ<&l<Np@||IRSqc!8eGUjX )I}Owc-Kk:X43nJMqD]* D[.GdA2o');
 define('SECURE_AUTH_KEY',  '8!MPI{uft7@|C:+0=b; kl2+1-E [WE]cN-8u[+O0/-%*+Bm[Da.:/`uWb[>O?v?');
 define('LOGGED_IN_KEY',    '(Rj#^:$&?ndzk7{2%w[|.I%q}ZF6&CzdI)YSF4(6P^)up@D0VKTIH:%@S$W.C^ru');
 define('NONCE_KEY',        '8;+,]C//1u_Pp]@8=@>>L`>K_vO[+qBxDsiKh5G~ir>z[7MTd,(ffFO%1ok|UF <');
 define('AUTH_SALT',        'f!]S>KNTi7>2L1g`u-X)rh5Q0_z al6ZP/eroE2WEih)h}<sqg;Z)UPH,htB{zyZ');
 define('SECURE_AUTH_SALT', 'Hzup^oKky2,f~2/!%Zk.),Zqh(HCIONdRr$*ytw>k7JQD6OeNcg^=y}i8mXpIr2s');
 define('LOGGED_IN_SALT',   'MjctIqctMqES??QMaDp,tAbv96uAnne%p<n|l-V}|oJb3^PJ[3c0;VlJg)2_6$ME');
 define('NONCE_SALT',       'clJD_z+Bi{g<^5,emZURz*|GZV/Ilt5Dpg-+VRX=/##x}s8w]gOmGL>#@l-%tim,');

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
