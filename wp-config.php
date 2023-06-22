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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db-timefinance' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'mysql123' );

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
define( 'AUTH_KEY',         'KEN]gbxvGx>>>aC46$%LBL7&qY;m:P%34X:Z8=@9CYZh%kZp~GE|LZ.*aNo&g(?,' );
define( 'SECURE_AUTH_KEY',  'a<:4>:)wAi>[v 4e{wJOXDUZQ4@lt}{zpuJvex`#LI0;ap=n$+w|I`u*{3kZczc(' );
define( 'LOGGED_IN_KEY',    '$3jrJJ]TJ}jo2fp]ttMoH#)%&B`7C0:`8Y3xY{k/`8ZsS?TTZ<XpbKk(jYqGD`Bh' );
define( 'NONCE_KEY',        '_>3hg<Q:f;rC{Zj@jls9FejDSSioLkQEvb)5Pi1C(E]zwG<PH,/ AXC;wNHm^6Bg' );
define( 'AUTH_SALT',        '^oDi]^j`cM`IM,;oq)S*G5P/#zW2zhI/,(rn]?FU1#r)mgLT(~-OHJnI5VsnG@3=' );
define( 'SECURE_AUTH_SALT', 'A6)m5XB2p!0ZE Tvs^H/J1uYXY8t{Q4:>awr)[;`O.6APY.4!:mX!o%CJBXu68iW' );
define( 'LOGGED_IN_SALT',   'kE:R:o}{K0xew$M!o}+&qrMXO Iny|UUWcy_/&h+`#^qhzr)p SKK+Sr<X/ap:mh' );
define( 'NONCE_SALT',       'm82&(Gj fEI8;fi|{FN_<pn>i}t>~@g4o1,{LTfqBDK_cgm#wBrY1[I(J{M)O0x.' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'tf_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
