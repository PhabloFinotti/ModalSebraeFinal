<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'userwebquantica_sebrae' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'userwebquantica_sebrae' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '6z8wkCe5Gv6h' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'cp3.sh15.net' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'u`Z6=}B&;k9!ylnlIH?k@]*x*12y%HW(BNLNaV=azBg?!lcMh,#BXCh6e2VemYPu' );
define( 'SECURE_AUTH_KEY',  'Pk?Fbm`kfJ.7/03bn-HW@ptvMExg5|drG*AI1KrcHQAHCYv4lZpW|5mg$7mVo9^O' );
define( 'LOGGED_IN_KEY',    '5&=cC%C0JUp?w_XCTb QWPG-56MF[CNxNNB4N|]Jv2|RtqZAWsBt&O2#ydzRi6#r' );
define( 'NONCE_KEY',        'g*|e]qe>#nE2O~IM0K Ixi5rK6`>`I1~CM2?>_L}b.SkE-T:7,X I>3Ob2%t<>m[' );
define( 'AUTH_SALT',        '{{[8zd#u w86m;IAnj`PSbiFf&LxfwpJ%XXd4w*`r-v9_jMiF22[iD;r A`V(_BI' );
define( 'SECURE_AUTH_SALT', '2tKL>_x [RQ>^9XAT[|G~ /vkB9B(Td<826}ttrl?o)(h^4`>P[(B?(C#;2`+prI' );
define( 'LOGGED_IN_SALT',   '$8EgV>P-6Or20K*xrlkF-!39-%@LP&054>em9ov9 _4Xa.BKwTnBAeDX. p7~pTn' );
define( 'NONCE_SALT',       'dv;b}<7*<lvzZY>J5*Oy2At&JN5)qi|,|/K`r|vd!CneX7^3U3Rf8x&<.^O:$?>~' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'seb_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
