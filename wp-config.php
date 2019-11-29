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
define( 'DB_NAME', 'milicapantovic' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'fCJN@7rRv4u5x|#J-l<nG&7vna21hpc.W/eH35=T+GqFGdoo$HK;({7OdY5s@J5H' );
define( 'SECURE_AUTH_KEY',  'CpxZ1oDz2HAxM2UQ,uLZGM!W#SK*T%wC&0d<8]iwG`JzyxoLtaR$*jZQ;R@^>,$Z' );
define( 'LOGGED_IN_KEY',    'a])U$^_30EFQ* `4s#i++<HJ4fv,Zs`7HB-t<iay9FTVc <Gf<kM31)qVbWdKFu=' );
define( 'NONCE_KEY',        '[ps<rS*r- (SekexW;g[sGyh}m2/N6~j] _Ft&HJ;BYo&t2o{AG+@Y@q_c!uzKKF' );
define( 'AUTH_SALT',        'zje`4fq~^fiTL,5wSmqh}PL-haiHw(#M2NkQ],u1k^E9-9HcK,oVn$:H<S(f:]5m' );
define( 'SECURE_AUTH_SALT', '#?+) :bKqbG[az`kdL2w}b&#v;@P!UA619Xh6fnqy@X6[_OoIivHEf|nPg3uAtX}' );
define( 'LOGGED_IN_SALT',   'Sbr[%29H3^Hz0Pm/pDz.jPMUmpe^PaD:09y.8:q0TC ~U7Y6;mA5!~,vNZ,H[eRU' );
define( 'NONCE_SALT',       'qr8+nZ/qUSeW)YGDM|H?E{v~m2rQ4&Rr%@4[@v|<T>`w.9LGzp.,p!]J_$yI Ii<' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
