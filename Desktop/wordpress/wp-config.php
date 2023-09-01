<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wp_stage' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9fam?Xm_k|uRT6  oWa(XnIn |,iT.HI~05t/xz$e#4k{JL}2[dtqc[0x)C-.Jvf' );
define( 'SECURE_AUTH_KEY',  'Wi_M*{>Li=p#I}tw#f&_#Jib}P[/fSWgKzuJd4#N/)Y](N}{,MAnoa2`W!:!B08q' );
define( 'LOGGED_IN_KEY',    'P+CjjLh{K0-u*<LkIDv^vW%5?>Y^M9q^.na(0q,-<!p fL0?{{wD6zM<^]8/+Cc>' );
define( 'NONCE_KEY',        '+y1#ic%}9Whoc=$Io;8zOj/38,AGi`7.@[A<na1nJDcP,RB-6%i:WFLBN[UStbq{' );
define( 'AUTH_SALT',        'l87[Z&zxp@A;-v8hqV5gntvl|,lgI-XL6s `.2no#fT6EGp0&G!^&5Qi.9`%f=,N' );
define( 'SECURE_AUTH_SALT', 'Ay55bWN_y=#xp{aVes.aU{G!Z2s78%z%*CkzE[J}*W/xozm:F#.A0L~{TTzE#wUj' );
define( 'LOGGED_IN_SALT',   'B(t;yF*kCS1XMZ8AKb2CPUIG,T:?T~)kh`{>=Qyw]vLWBVprfSD?h(Lq _](>8p+' );
define( 'NONCE_SALT',       '&NA~cwL)S)NnEu99F`Nr9gJH&cTr;2T)b|Tl.tVe >{lD-h_=idF;RUF*(]zC}5`' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
