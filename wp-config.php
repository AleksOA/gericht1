<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_gericht' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'cLqgU1TH[wXuP+P7WGj{Wr3aCQ:>Oj5dIhZ eQ)/3S6?MZC:5Ty0Mi]ZX(9%rp2-' );
define( 'SECURE_AUTH_KEY',  'u4XBp;p]->> H?]T#(7+=qCM*8:){0Z%yubs=g?$%iB#SBb7SqS.<Kdt]zNO!kdQ' );
define( 'LOGGED_IN_KEY',    'h8R%-MT,H+9loJvf?71|Lp(V2XsKkl1Ho;og}~nmE~Q{xb?WxilZMaZA[:Lnlkv.' );
define( 'NONCE_KEY',        ',xl+Ry|W36D<A~jZMEr4@E:iAV[Uw|}IR:c]XA%?arXGp29[(QqE7@)Oy9|aD1d5' );
define( 'AUTH_SALT',        'Yg.AM43`K<sn;4__51#A:1+&HAZiOU9|GfKiNcY>v.F&]%gR/^`6i8sNX}/X5#Z+' );
define( 'SECURE_AUTH_SALT', '_-ockZ94zB(cT:,M/7FwbkNa@_[I[xJGMyDCTAwS}t8<VX:!6[OrDC27AkPBJ2;H' );
define( 'LOGGED_IN_SALT',   '[,6>i.V8b?Tr|b)1!NcDgLtn~G0J@<w@;L$eWX;|Y#4^ur71n.[F>y`v}%UEpLb9' );
define( 'NONCE_SALT',       'j_Sn4+Q;|jm$:FmGbnw X!rr9R!CKS F:QZlb_j5hm-!B+A#!q9vI[[]gY~WHh41' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
