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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp' );

/** MySQL database username */
define( 'DB_USER', 'wp' );

/** MySQL database password */
define( 'DB_PASSWORD', '3Boud!nes63' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'fQyiqcpDr#8:,C6[,epxB0eSV;^yb`>D=K9_7 T<{lw5ma<SRAlm&Tq(6+p#P?Vh');
define('SECURE_AUTH_KEY',  '@u~2KSZmhdJ|z]%kdYPsPUhK#+u[,_R,y*6<WwsQGuw>#% u~3Lgu-J|}u9,vese');
define('LOGGED_IN_KEY',    'o`g>-RpAfrqRNdRq)7`GUkl7O}Z#IBxXsU^Kw%I+O6;BdmB*6Sog#cm/WD<XV<Vr');
define('NONCE_KEY',        '16)x(})@Xh s[wYf2d`Iv~Z#x<E-itb$=v-LHECPt<2Yg.B{6^PHwa<0->BZ-u4)');
define('AUTH_SALT',        'oY^E3K%JS@ovX3insl^r50>,X!@9g2FBF/-#mfs=In$(P&fy8Oxyk]xP!H>Ks+,z');
define('SECURE_AUTH_SALT', '0QbvQ#$ uK{>pi:dT<OT+|LF0vc[RXs6P wPdT-p%~D-r*)NebFL.f~zxzsrh2fg');
define('LOGGED_IN_SALT',   'y1:$IV.b*luc,E5&|SLiFKhXS?Sm_h(=7>+zn?bdM(<6.R0a@^N=pAc%Do .ABO2');
define('NONCE_SALT',       '&ELB@dy2wIe#YjV]7qp+{s~,B/IkZ)m=<GA<+&?!>H/A40c5/xGyR=!d1` Wc||m');
/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
