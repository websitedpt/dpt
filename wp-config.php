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
define('DB_NAME', 'xediendpt');
/** MySQL database username */
define('DB_USER', 'root'); 
//admin:xediendpt pas:Xediendpt@24/09/2019
/** MySQL database password */
define('DB_PASSWORD', '');
/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'B^TSlT))- `$$[(A;7 |#]SD=d9I/0{W-,l_<zWK=x_:U?*eI4s*wwRea4$4tMQq');
define('SECURE_AUTH_KEY',  'l1W]@+`!k05o]x?xW!V+!UqC*~n01&|[}+Mx.$^Z+QX%`9Fm~+Y?lGgn0>=r$|r,');
define('LOGGED_IN_KEY',    '}O|~yG@K:{YESJ;3jVi4:I41~(s:/d|t+ZLlS!eRX|AL##/cy?*Zz?}&!<$/=%#o');
define('NONCE_KEY',        '1-:Mo}Kz/mtdFk!`??&%QnH7j[Bk&rv7Y|aqx&R6O|W9BKZS/Ela#2zj wz)pM+%');
define('AUTH_SALT',        'z-kwiE&3wqP3]xp-xjqZCU&t%btYs^;SkN#hY2dSvs;0sCil33%-=4>Vu#9t+8E,');
define('SECURE_AUTH_SALT', 'kFMwUMnLL}I4P+LSEQm]MK^&!USQTYp}49L)/`g6|69il)[!#n(3s~#aJU;-#Cf:');
define('LOGGED_IN_SALT',   '-xHcoUo|Qy +uG@B%}[EAa+p`DxJn*jG0[y+6_03]o5 RYeg|,pGIU4+^AZ!QmKU');
define('NONCE_SALT',       'D$+cl$)[-.Fg|};0YB{}%o=9]V2.59j-[}dlf^`g7?2BZ/Xh^qv|-@<(SM]I$YB8');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'xediendpttbl_';

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
define('WP_DEBUG', false);
/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
