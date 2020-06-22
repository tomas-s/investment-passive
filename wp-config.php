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
if(file_exists(dirname(__FILE__) . '/local.php')){
	define( 'DB_NAME', 'local' );
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', 'root' );
	define( 'DB_HOST', 'localhost' );
}else{
	define( 'DB_NAME', 'u595180114_d3dZP' );

	/** MySQL database username */
	define( 'DB_USER', 'u595180114_rv8MI' );

	/** MySQL database password */
	define( 'DB_PASSWORD', 'tUNH7BwTet' );

	/** MySQL hostname */
	define( 'DB_HOST', 'mysql' );

	/** Database Charset to use in creating database tables. */
	define( 'DB_CHARSET', 'utf8' );

	/** The Database Collate type. Don't change this if in doubt. */
	define( 'DB_COLLATE', '' );
}


/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'bf rJg$5)0,>i}M;8T)>)s)/[HR!:1[/,Sr3~X!Uh8oM+BP r7<05kD$QmO`YWK/' );
define( 'SECURE_AUTH_KEY',   'H.GV)7lMh1Ouh!&w_,(>`tB:i<_:n1NfKYgb]$W!^j14|{$5DZU-?{=z4-B[0R O' );
define( 'LOGGED_IN_KEY',     '!(h./ItlV@V8IE6V~tP^!ki<O`-*4NZofB77ukpLVF3uVcDZ 6W`k1TS70Oe8KA!' );
define( 'NONCE_KEY',         '48R?!:KEs4 $eM5K/r#!fDhAVq+_]hY-b{,_-?@nW$>(e+fs|&}7S>oK&+m=)r?$' );
define( 'AUTH_SALT',         'I||H oW8[ed&&kOz~Kg<89&x+Sr(,5tL#Ic^S3f%lb|8;zgp2&A9A{iiSh{=Ft=x' );
define( 'SECURE_AUTH_SALT',  '%~#@N1QnfPt=^m=d3ou0P[Wa9f4tA>S@W`S=p#3**EEy,|u/kD7Ox0SjyefYHRs_' );
define( 'LOGGED_IN_SALT',    '*zHXa905]@)S^P|R Kcr6],S3MEEY]t^RZ@e[K_tq-zCGR0e>p35osr$Dlvf9_)k' );
define( 'NONCE_SALT',        'B]Uf*:zNV7c[6P:15c(9BoIh(}K*&SXDnLNlI{s&~YD&?^t(<hIEGBcp=sS#a#iH' );
define( 'WP_CACHE_KEY_SALT', '09p|9T`$[(+*~5RYrCrI_yh-<0>A*A;0:zgnSRU{$^9eF?^I1biP<%[}[nYh%iWf' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
