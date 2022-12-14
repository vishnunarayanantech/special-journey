<?php
// second day
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

define( 'DB_NAME', "shoppie" );


/** MySQL database username */

define( 'DB_USER', "root" );


/** MySQL database password */

define( 'DB_PASSWORD', "achu123" );


/** MySQL hostname */

define( 'DB_HOST', "localhost" );


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

define( 'AUTH_KEY',         'B-z^ERpL!l2^q$ItuSs$`yZ-bsgW%c3P/8y%I+5*}07Is=Fg{j&$1/]#,21%e*he' );

define( 'SECURE_AUTH_KEY',  'tDhcOwg9pqB<% U+{muZi8WlB~VPkwNCdEGYx5LYG4,TfX!.V{,AMWwKv`=bCF#w' );

define( 'LOGGED_IN_KEY',    '2T{`nNi[JbSsW,|[_w/qzhj|?H QKc8z[>5j%x$^aoM@QqJfx52H 8,]Mm%D#*5_' );

define( 'NONCE_KEY',        'fp&.HS$`hzpj0XSEPv4BW<L$l7[ Lse;x{lFYKhmc9]l<@%qpan$-[>#3u.G!j}F' );

define( 'AUTH_SALT',        '`11}h>$u}b`z7)2S[?pQftiDa)u#F6nh#T-V/O`0yT#,.!.^0VURkprOwYfC(=)c' );

define( 'SECURE_AUTH_SALT', 'S;^9]gko2Q%3LFnw?}=YITBc^tcp,G<qU|G(ANvN.1O?!`[#ZY+cj2~z(bTw2M6t' );

define( 'LOGGED_IN_SALT',   'Ot+:y:;e0z{|0fbStab[uE-yaS.{Qe/ubnbO}o<65$?W <-*/~,GHj9Ag%[c?~$N' );

define( 'NONCE_SALT',       'UB0OxTP~ ~Iq>gTL-+H7`%s%LV^lxydNM$WQZUTM{YTkP}9aIuo4Yc}!gW%^GC*<' );


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

