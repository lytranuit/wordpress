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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/* * #@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'cl|k_`pu-$-]K{{z WJ1$M{!n~c,tJ+R+IICr%S1?!TGsA6F|0&oMhEyWYE?3P$9');
define('SECURE_AUTH_KEY', '$kU)<L/>_?74rpxqbS7L{uB{~t|ba~MWIF$?#WPQ@mud(2O8xz-l]8480qRL&6eP');
define('LOGGED_IN_KEY', '@]i+!wy>*DsKw;_{jh^3WfB(%Usk3< w}}`~~H%d<m,$ O-HnY<QwklT{lu1$<-+');
define('NONCE_KEY', 'O)q,R9qxz!yK!/$pHQlJ}OKFqTRa#m?SF+MiqrL!N@d%$,%|!MPoxD~Pj#umjm]m');
define('AUTH_SALT', 'SeR}.@tICn}pWHyVhT8XT+Xp_X~>}_&}]a+C~}O/o^$>AEK$VuRr37X7,xHZnX4u');
define('SECURE_AUTH_SALT', '+~~3K3+9;)VIsIpM<RS8w!E#E_?oai$SCt?!To;4U~vy3-I121~ch08z{s^GI~RD');
define('LOGGED_IN_SALT', '4=-.-*7n[8d3<2{L}k;>_pGO,_Dy;kzxftU,9in5P_4S0x4diVRRZdB7aC;pa2t|');
define('NONCE_SALT', 'qTaOW-Hmlx3`KwZ%a)-O BvmsmA%AI+:AZ9:U-,{Ad^Xz<|! &~=#g3-c+(URQsx');

/* * #@- */

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
// Enable WP_DEBUG mode
define('WP_DEBUG', false);

// Enable Debug logging to the /wp-content/debug.log file
define('WP_DEBUG_LOG', false);

// Disable display of errors and warnings 
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors', 0);

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define('SCRIPT_DEBUG', true);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
