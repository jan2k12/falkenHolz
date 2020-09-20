<?php
/**
 * Grundeinstellungen für WordPress
 *
 * Zu diesen Einstellungen gehören:
 *
 * * MySQL-Zugangsdaten,
 * * Tabellenpräfix,
 * * Sicherheitsschlüssel
 * * und ABSPATH.
 *
 * Mehr Informationen zur wp-config.php gibt es auf der
 * {@link https://codex.wordpress.org/Editing_wp-config.php wp-config.php editieren}
 * Seite im Codex. Die Zugangsdaten für die MySQL-Datenbank
 * bekommst du von deinem Webhoster.
 *
 * Diese Datei wird zur Erstellung der wp-config.php verwendet.
 * Du musst aber dafür nicht das Installationsskript verwenden.
 * Stattdessen kannst du auch diese Datei als wp-config.php mit
 * deinen Zugangsdaten für die Datenbank abspeichern.
 *
 * @package WordPress
 */

// ** MySQL-Einstellungen ** //
/**   Diese Zugangsdaten bekommst du von deinem Webhoster. **/

/**
 * Ersetze datenbankname_hier_einfuegen mit dem Namen
 * mit dem Namen der Datenbank, die du verwenden möchtest.
 */
define('DB_NAME', '');

/**
 * Ersetze benutzername_hier_einfuegen
 * mit deinem MySQL-Datenbank-Benutzernamen.
 */
define('DB_USER', '');

/**
 * Ersetze passwort_hier_einfuegen mit deinem MySQL-Passwort.
 */
define('DB_PASSWORD', '');

/**
 * Ersetze localhost mit der MySQL-Serveradresse.
 */
define('DB_HOST', 'localhost');

/**
 * Der Datenbankzeichensatz, der beim Erstellen der
 * Datenbanktabellen verwendet werden soll
 */
define('DB_CHARSET', 'utf8mb4');

/**
 * Der Collate-Type sollte nicht geändert werden.
 */
define('DB_COLLATE', '');
define( 'WP_MAX_MEMORY_LIMIT', '256M' );
/**#@+
 * Sicherheitsschlüssel
 *
 * Ändere jeden untenstehenden Platzhaltertext in eine beliebige,
 * möglichst einmalig genutzte Zeichenkette.
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * kannst du dir alle Schlüssel generieren lassen.
 * Du kannst die Schlüssel jederzeit wieder ändern, alle angemeldeten
 * Benutzer müssen sich danach erneut anmelden.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'YkXIU!&8-b^U%s5Sw1!4ZccltA)fY5(1&p*uZ#NM[P>%c8b -s62n5xW[aau;Z#.');
define('SECURE_AUTH_KEY',  '+ Lpc5fbiDp(LqJ0 ?1-R+?F&[M(/$A9Qkom}lr;p6;F6B2%hItysIUZ#BkM|;ch');
define('LOGGED_IN_KEY',    'cduy-]%1mO#AqZBtOWFmqire%;p*qh@`;~6;Wv5n~#wl+s<82-&.!Zj6&0B7t75I');
define('NONCE_KEY',        '#*z2~t6%o`Vf`M:u!gb!7Duo}{R<$+GrsDn4|zt_k~ Ds#jK+)`?EDS27[(TzPP0');
define('AUTH_SALT',        ';R6(I#(.v*SFp4l&do`Ft{:N?jPMx UK+1HpxVaE{JsmLFk$gv+%UTe%N7Tmy$m_');
define('SECURE_AUTH_SALT', 'E upmwJIeP=aJ(Y1#k*Us6uHZF6|_t9:00p+l0Zk+XP&!{?)Rrw,%-B$BbgPO~[n');
define('LOGGED_IN_SALT',   'f)e|^8K f ;;Hfe#:0@;0DwikXVeq6CQm]=AUwg|eG[*o%+oV+*$oL6^++6c/%=/');
define('NONCE_SALT',       '{Z!>q#Y1a-CNK1wYO,ST@i3P} =+Z5>rk=vH8++@JK-UgJu|oh^Wu~W@SE!6?/^%');

/**#@-*/

/**
 * WordPress Datenbanktabellen-Präfix
 *
 * Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
 * verschiedene WordPress-Installationen betreiben.
 * Bitte verwende nur Zahlen, Buchstaben und Unterstriche!
 */
$table_prefix  = 'wp_';

/**
 * Für Entwickler: Der WordPress-Debug-Modus.
 *
 * Setze den Wert auf „true“, um bei der Entwicklung Warnungen und Fehler-Meldungen angezeigt zu bekommen.
 * Plugin- und Theme-Entwicklern wird nachdrücklich empfohlen, WP_DEBUG
 * in ihrer Entwicklungsumgebung zu verwenden.
 *
 * Besuche den Codex, um mehr Informationen über andere Konstanten zu finden,
 * die zum Debuggen genutzt werden können.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Das war’s, Schluss mit dem Bearbeiten! Viel Spaß beim Bloggen. */
/* That's all, stop editing! Happy blogging. */

/** Der absolute Pfad zum WordPress-Verzeichnis. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Definiert WordPress-Variablen und fügt Dateien ein.  */
require_once(ABSPATH . 'wp-settings.php');
