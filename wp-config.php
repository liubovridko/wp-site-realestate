<?php
define('WP_CACHE', true); // WP-Optimize Cache
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
define( 'DB_NAME', 'real-estate' );
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
define( 'AUTH_KEY',         '-1[y)qd^jQ:rG6ODbRjY q$}~U5l20G`:*qq@eWVG!{~EZ9*k0qg&70+.-2f:as{' );
define( 'SECURE_AUTH_KEY',  '|VYdy+a8VHb_*?*}QZl}{x3-,x![56@9n!MJ4H|o.@jKkI% ?yWi1V2YG}k8p)7]' );
define( 'LOGGED_IN_KEY',    'p<Pe5Sl FbY=(_y5tmI#OgRDD}kc0(srSmBA,:S^uPHK#MWNn<1`U|J8c(liDcU4' );
define( 'NONCE_KEY',        ']<}0.<Ny CKC;b<TZ2& jXBQi@<UID7Hka_`;+f,uRy$hC~cLS ]*!{JTBRqN`9s' );
define( 'AUTH_SALT',        '8Rde`C )KPz00xdq[xB=Pj#Zr5iK!#X)6a4i{4P^J#GpM>4:?:ZS)B6}[3~FKy|m' );
define( 'SECURE_AUTH_SALT', '>/h1jxECgjFRc]c|yxjlyK$i*9DdD~+!RLl:|Qd{&FL~PY.Pr:V6Tc8_qGVKbl+ ' );
define( 'LOGGED_IN_SALT',   'wo=0!=Wq}5-m&B@A^n.^IsUaK|a?X)FPM+EL^=C517FMk3~SL]cYQY:ugLy?7&PJ' );
define( 'NONCE_SALT',       '!c8I2Jr=|uT.[pElrr)PKYR (/mI@Uh6g4}M8ryaF$9w1.rEy}p&SMY RZDT0_;5' );
/**#@-*/
/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 're_';
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