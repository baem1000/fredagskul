<?php
/**
 * Baskonfiguration för WordPress.
 *
 * Denna fil används av wp-config.php-genereringsskript under installationen.
 * Du behöver inte använda webbplatsen, du kan kopiera denna fil direkt till
 * "wp-config.php" och fylla i värdena.
 *
 * Denna fil innehåller följande konfigurationer:
 *
 * * Inställningar för MySQL
 * * Säkerhetsnycklar
 * * Tabellprefix för databas
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL-inställningar - MySQL-uppgifter får du från ditt webbhotell ** //
/** Namnet på databasen du vill använda för WordPress */
define('DB_NAME', 'fredagskul');

/** MySQL-databasens användarnamn */
define('DB_USER', 'root');

/** MySQL-databasens lösenord */
define('DB_PASSWORD', '');

/** MySQL-server */
define('DB_HOST', 'localhost');

/** Teckenkodning för tabellerna i databasen. */
define('DB_CHARSET', 'utf8mb4');

/** Kollationeringstyp för databasen. Ändra inte om du är osäker. */
define('DB_COLLATE', '');

/**#@+
 * Unika autentiseringsnycklar och salter.
 *
 * Ändra dessa till unika fraser!
 * Du kan generera nycklar med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan när som helst ändra dessa nycklar för att göra aktiva cookies obrukbara, vilket tvingar alla användare att logga in på nytt.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%jzebaI;IsN,vB+qDR>q/!h;iwX s|`Nwya!.Yp9b/A(d7tWz*{vj=pI)l_GL{*D');
define('SECURE_AUTH_KEY',  '$.4?ezO50sb 0Arq{:C:!;u!)wQ}EO`RR_UahP-(w^oOhXj`;*2TaOny=OU6X7}_');
define('LOGGED_IN_KEY',    'SYPizq9IB7[#60Eaw;Ks%RitnEEZb{zy|wcN<43h&9, %g+`(v7xFNIw90iR-r[_');
define('NONCE_KEY',        'V4eMA(l2|!^:4u1Q9z|F[T*N<2KX{`[ev!^|d|P6Cd<iq2q]204+A4|<L$<@D1 1');
define('AUTH_SALT',        '.96T};LbZ`~dsw/T-yLvyM! 6OFcupLkQeZS[-uMgGV_+}Z??cu(mqR[M.V?O/px');
define('SECURE_AUTH_SALT', '2nm&`k M#u#-f.a~}^l_Djgh6X(r6^re?Fw^_}fI|+jWE=2yL*6CjY)p:9b/z?d$');
define('LOGGED_IN_SALT',   'fGJxJD@3.*jTw#8]ivZ1&8M`CpoONe2a0zP~5B+x%e:Z9KY9[W/Zgm>:-!46_s^B');
define('NONCE_SALT',       '7g9lr_t~XrKh>+w7KMuG-lBC6A`}Q2caw=*:S0+hCh,oIfNoy/Rmx5<Roq3p{GGS');

/**#@-*/

/**
 * Tabellprefix för WordPress Databasen.
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 * prefix. Endast siffror, bokstäver och understreck!
 */
$table_prefix  = 'wp_fredagskul';

/** 
 * För utvecklare: WordPress felsökningsläge. 
 * 
 * Ändra detta till true för att aktivera meddelanden under utveckling. 
 * Det är rekommderat att man som tilläggsskapare och temaskapare använder WP_DEBUG 
 * i sin utvecklingsmiljö. 
 *
 * För information om andra konstanter som kan användas för felsökning, 
 * se dokumentationen. 
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */ 
define('WP_DEBUG', false);

/* Det var allt, sluta redigera här! Blogga på. */

/** Absoluta sökväg till WordPress-katalogen. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Anger WordPress-värden och inkluderade filer. */
require_once(ABSPATH . 'wp-settings.php');

define('FS_METHOD','direct');