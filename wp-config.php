<?php
if ( file_exists( dirname( __FILE__ ) . '/gd-config.php' ) ) {
	require_once( dirname( __FILE__ ) . '/gd-config.php' );
	define( 'FS_METHOD', 'direct' );
	define( 'FS_CHMOD_DIR', ( 0705 & ~ umask() ) );
	define( 'FS_CHMOD_FILE', ( 0604 & ~ umask() ) );
}

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

@@define('DB_NAME', "g0hc42422672743");


/** MySQL database username */

@@define('DB_USER', "g0hc42422672743");


/** MySQL database password */

@@define('DB_PASSWORD', 'C0L(8Ne@}BO');


/** MySQL hostname */

@@define('DB_HOST', '45.40.156.50:3313');


/** Database Charset to use in creating database tables. */

@@define('DB_CHARSET', 'utf8mb4');


/** The Database Collate type. Don't change this if in doubt. */

@@define('DB_COLLATE', '');


/**#@+

 * Authentication Unique Keys and Salts.

 *

 * Change these to different unique phrases!

 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}

 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define('AUTH_KEY',         'FzJJ`_B0P0hmLA7aOe=FUVBQ2kA!2?HbVlC;{{fZSU|WZjTs%wE;*&,= SL ]<[C');

define('SECURE_AUTH_KEY',  'AoW+V8i!Yw%Y;wI,C2r$oUoUI,xeSYu`3+6?4/)[o73wp[`dFo-.QQI|P<0`yDg`');

define('LOGGED_IN_KEY',    'a6S<gJ!GhnHX|d?Oa>l{CUG2l 7!LaXV|Dyh$kR+QB_JacJtS26B@t2A&mE<vStU');

define('NONCE_KEY',        ']p4t7c>mEQ.~s.Et#J<b0z|ITx7C -p_ F hP<O[7E#61kyZ[y}:p<_+0WU:o)tt');

define('AUTH_SALT',        '=sBc43Gr<3(%cr:7CnzJYw<tBU`1dY)hE=}i2wXtPWHJa>`$nwH>,@#asUT6t>uz');

define('SECURE_AUTH_SALT', '9LO@y=3j6Es8<dHm0LVwu`ndxk2+lcLn&@vFRoz=(Wl0{/x=>iGuj.o_WRu}?_sg');

define('LOGGED_IN_SALT',   'pORmjI#|c<S/vmi>THN_smco`R(yuW 1c<T|OGDkv[79r~,)i4[J[FfKB)Iy>?Ir');

define('NONCE_SALT',       'eS/!KALY0iTs5(Pli)Oub#e!wLZGd>idS(W1RSR$Km</_z(Cxr?crD*lcE}eFXO?');


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

define('WP_DEBUG', true);


define( 'FORCE_SSL_ADMIN', true );
/* That's all, stop editing! Happy blogging. */


/** Absolute path to the WordPress directory. */

if ( !defined('ABSPATH') )

	define('ABSPATH', dirname(__FILE__) . '/');


/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');

