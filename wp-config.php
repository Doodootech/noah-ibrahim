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
define( 'DB_NAME', 'noah' );

/** MySQL database username */
define( 'DB_USER', 'noah' );

/** MySQL database password */
define( 'DB_PASSWORD', 'noah' );

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
define( 'AUTH_KEY',         'N7DX_zvXsQi$Y_Eub1nk0Vx7@0[B. ct3X_={-/N#p-&LoW5z@Qs`O>n90_bm@o~' );
define( 'SECURE_AUTH_KEY',  'ai_JVB/z&q?{VK=l#S%K;q?c>7:heZdO1U_-roN&Yq3ePq|I_-%^C~MZthte88|l' );
define( 'LOGGED_IN_KEY',    'n6;808S&m,*j1[B1-GT*2U6kWem?qGyTwKq6Y3BaL^aS*JRHP-]ris)!B|!DXl*B' );
define( 'NONCE_KEY',        '$Q3f4]&FC3#zj11^9>!zfajMue6a(2[]o4sjsk3iYU93wH2%i7lRkx+8R|HMpud2' );
define( 'AUTH_SALT',        'X]fyw{ap3%A #e`Va{._,rs<r$A%9sX.+:w6[wtq*RJ&8|:.:m_FTQ_289Z%]{oq' );
define( 'SECURE_AUTH_SALT', 'MUIMf-+nFYf?E]!Xn ry8,)rZ_w~@6VIjr11yC|U1#[Q]9@]endpyR{i0D<ft+sY' );
define( 'LOGGED_IN_SALT',   'oeZXQm;?uaZNtScm)R;v1H;$RHbs7Y(r4LSc)|]3#4XGQg<0P8JDhzA5FUps(LXe' );
define( 'NONCE_SALT',       'nHA:1@`GDp5|Gjti]dAWxmIseI-v?;xr#Yv]PG97[+{b_U]Y^!D%p6|TuAyJR(>l' );

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
