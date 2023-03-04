<?php
/**
 * Página de opções do tema.
 *
 * @package Meu Tema
 */
// Adicione um menu de opções do tema ao painel de administração
add_action( 'admin_menu', 'my_theme_options_menu' );

function my_theme_options_menu() {
	$page_title = 'Opções do Tema'; // Título da página
	$menu_title = 'Opções do Tema'; // Título do menu
	$capability = 'manage_options'; // Capacidade necessária para acessar a página
	$menu_slug = 'my_theme_options'; // Slug da página
	$function   = 'my_theme_options_page'; // Função que irá gerar o conteúdo da página
	add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function );
}

function my_theme_options_page() {
	?>
	<div class="wrap">
	<h1>Opções do Tema</h1>

	<?php
	$tab = ( isset( $_GET['tab'] ) ) ? $_GET['tab'] : 'tab1';
	?>
	<h2 class="nav-tab-wrapper">
		<?php
		$tabs = array(
			'tab1' => 'Dados',
			'tab2' => 'Objetivo',
			'tab3' => 'Educação',
			'tab4' => 'Experiência',
			'tab5' => 'Habilidades Profissionais',
			'tab6' => 'Informações Adicionais'
		);
		foreach ( $tabs as $tab_slug => $tab_title ) {
			$class = ( $tab === $tab_slug ) ? 'nav-tab nav-tab-active' : 'nav-tab';
			$url   = add_query_arg( 'tab', $tab_slug, admin_url( 'themes.php?page=my_theme_options' ) );
			echo '<a href="' . esc_url( $url ) . '" class="' . esc_attr( $class ) . '">' . esc_html( $tab_title ) . '</a>';
		}
		?>
	</h2>
</div>
<div class="box-shadow mb-3">
    <form name="form_contato" class="form-contato box-shadow pe-3 ps-3 border-2">
        <p>
            <?php
            switch ( $tab ) {
                default:
                    // Conteúdo da primeira aba
                    echo 'opção 1';
                    break;
                case 'tab2':
                    // Conteúdo da segunda aba
                    echo 'opção 2';
                    break;
                case 'tab3':
                    // Conteúdo da terceira aba3
                    echo 'opção 3';
                    break;
                case 'tab4':
                    // Conteúdo da quarta aba
                    echo 'opção 4';
                    break;
                case 'tab5':
                    // Conteúdo da quinta aba
                    echo 'opção 5';
                    break;
                case 'tab6':
                    // Conteúdo da sexta aba
                    echo 'opção 6';
                    break;
            }
            ?>
        </p>
        <button type="button" class="btn btn-primary mb-3 mt-2 btm-enviar" id="btnenviar" onclick="validarcontato()">
            Enviar
        </button>
    </form>
</div>
<?php }?>
