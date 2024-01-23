<?php
/** Enable W3 Total Cache Edge Mode */
define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache

define('WP_SITEURL', 'https://galoremag.com');
define('WP_HOME', 'https://galoremag.com');
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
define('DB_NAME', 'db169544_galoremag');

/** MySQL database username */
define('DB_USER', 'db169544');

/** MySQL database password */
define('DB_PASSWORD', 'kenMeow11');

/** MySQL hostname */
define('DB_HOST', 'external-db.s169544.gridserver.com');

/** Database Charset to use in creating database tables. */
/* define('DB_CHARSET', 'utf8'); */

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
define('AUTH_KEY',         'y=rm:)#e]h3jR48,cX6M*abV~l:4l9)ZnDM<|w.1C7&K;C+sSO)=fq--l<2uogwg');
define('SECURE_AUTH_KEY',  '>JQB11RxTOllc|? PtrOO*&[tGaGPpwUNmWLR(V=ILQ3|{LM,G.ZnY-Z}US79Zv ');
define('LOGGED_IN_KEY',    '-q&OwCye6BWu3oqg6-lN>tDOU2_3yNnJ1DTVBm;%t7D1ikzMG:|Q[R5.EL0Rja3D');
define('NONCE_KEY',        '~=FMf5RM]PC(y Cojjq Pe]cK+Y#tgg*_-P;5@i 8)5+_}e|NVA%9YJ1j).>,|)n');
define('AUTH_SALT',        'P04.ivYlcm=tzc]u-ZLD<rYolJbB)]}v1uU.i5^)l0*9&6+Od*Q-FSy][NKGwsOc');
define('SECURE_AUTH_SALT', '{?Q.1n@wPACUUYcz-N2E ,j#[Be!:&i/0h]KYD%z]+d1eBYLF7/DY$sI_Zq?Ff~-');
define('LOGGED_IN_SALT',   '{T@;tpD{g+_MN!^23}v|(z+9P60,UdkweLaK#QN@2@oNR-+]Y[.YpZW0|%- G5k]');
define('NONCE_SALT',       '*b{R_;>l35Og-1s6@$]3OnL|5J+KFzV9%N,V||-Gja|R QKoKC%epNO,u9v-aqGL');

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
