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
define('DB_NAME', 'pnw');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'f*Xg@$_N1aF24em&fZuXI^Xyt<CPl]MO2wb{pJkXGQ-Sre#ZLQWk$Vi++Kev,{L6');
define('SECURE_AUTH_KEY',  '?lW6nx-Av+-UojC*~jN;?I8?VUnm~.?V~0eFP0`b-x%ziduRT$%]a*}8<u YTK[z');
define('LOGGED_IN_KEY',    '@zi`| xYIfzEP3J NmdKO/Ojo5i51.ogct_iwUS:hb[[X%VdKn($#_Z}0TDB_5B!');
define('NONCE_KEY',        'bwM$VH^zVQJ(hlS!D?^zyym:@B5 JZ*)^$8.7f@HNGi.nN%ca$YI$#)Z-sGt#2Az');
define('AUTH_SALT',        'Qo<.YV]JSQP^X/3G6#Z9<6Uox$R;Z<jV1TJ|[zB8xDh.IL#9.d&=)thTus~@?Jv/');
define('SECURE_AUTH_SALT', '+l-lF>-g$TkI}_9^jnyL4$8swGgPSXGgePQdV?;vbpT;nxK:qX}!^c1CPi.F4y]S');
define('LOGGED_IN_SALT',   '<A{iq1dw<^%sN.BQlsj4JCnrlD2r`ROP7$T5bW.(.4 t:%x{)VWzR{$97=uT=[}A');
define('NONCE_SALT',       '?7B#RZGv`Io)bie[_0S>9yGzpAfI@bUg?ERQ7fF3nEqPcVhah3/Oj~[>]Lb:+E6z');

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
