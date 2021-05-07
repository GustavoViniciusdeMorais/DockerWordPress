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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

/** MySQL hostname */
define( 'DB_HOST', '172.19.0.2' );

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
define( 'AUTH_KEY',         '~YfR=O0pTu`|C~b%2G%P/KQqI/1oxnrVt*^<Hb%4}7GNDqsR/%?Eu#UE^uZY6IV^' );
define( 'SECURE_AUTH_KEY',  'M<i  h/20P5}DN87N>^N2cbqhNm(y)oQ{J)ZK9q/fYY8WgGn*a-[`ah.N9:lTMyU' );
define( 'LOGGED_IN_KEY',    'nSF&~goGMe{#0N,]->fPIa_%EBd4X1^%t||)yQCY!&e5J>05${}KWQ9PfateBn*8' );
define( 'NONCE_KEY',        ':!GY$|T_3^$U4^g5rlHQOL+bqr<7*eU=g`+]3:iNL6WS,0+qC ;{e:9@!/N9%~d1' );
define( 'AUTH_SALT',        'pe`N[KpLNrN{hk3w(FtogM/)&<e6SJ%/`G f1Kn6S,&%kq`)KnED,%XggPZOg^G(' );
define( 'SECURE_AUTH_SALT', ']bZ(Ep`HG|mt0IvQ./A:<{bTLD5S*y<4={YkV-3$uuEo^d|*&(h!Cd0I;^Vh+d6i' );
define( 'LOGGED_IN_SALT',   'D<6Xtmq=l4zm2rP)@C-Ag^uWlLx(NB@ZC[ YQ%Fh!y+bm/dvwIv:fWP|VQ^GSFh(' );
define( 'NONCE_SALT',       ' .yqJb3Mjp+*R@A9f)}UBidFQh4euYxD.!+}#86k(l+8aV4j}oSFeQMt-uX~UFzv' );

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
