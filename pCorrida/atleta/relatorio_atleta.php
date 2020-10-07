 <?php
 session_start();
 if(!isset($_SESSION['autenticado'])){
     header('Location: ../login.php');
 }

// chamando os arquivos necessários do DOMPdf
require_once '../dompdf/lib/html5lib/Parser.php';
require_once '../dompdf/src/Autoloader.php';
require_once '../conexao.php';

// definindo os namespaces
Dompdf\Autoloader::register();
use Dompdf\Dompdf;

// inicializando o objeto Dompdf
$dompdf = new Dompdf();
$dompdf->set_paper("A4", "landscape");
$sql  = "select a.id, a.nome, e.nome_equipe, c.categoria, a.documento, a.info_adicionais
          FROM atleta as a
            LEFT JOIN equipe as e ON a.id_equipe = e.id
              LEFT JOIN categoria c ON a.id_categoria = c.id;";
$query = $con->query($sql);
$lista_atleta = $query->fetchAll();

// código HTML e PHP inserido no PDF
$html = ('
<style> #tabela{font-size: 10px;}</style>

<table id="tabela" class="table table-bordered">
  <tr>
<th>#</th>
     <th>Nome</th>
     <th>Equipe</th>
     <th>Categoria</th>
     <th>Identificação</th>
     <th>Informações Adicionais</th>
  </tr>
');

$html .= '<tbody>';

foreach ($lista_atleta as $item ){
  $html .= '<tr><td>'.($item['id']) . "</td>";
  $html .= '<td col-sm-6>'.($item['nome']). "</td>";
  $html .= '<td col-sm-6>'.($item['nome_equipe']). "</td>";
  $html .= '<td col-sm-6>'.($item['categoria']). "</td>";
  $html .= '<td col-sm-6>'.($item['documento']) . "</td>";
  $html .= '<td col-sm-6>'.($item['info_adicionais']) . "</td></tr>";
}

  $html .= '</tbody>';
	$html .= '</table>';

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega o HTML
	$dompdf->load_html('
			<h3 style="text-align: left;">Relatório de Atletas:</h3>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibir a página
	$dompdf->stream(
		"relatorio.pdf",
		array(
			"Attachment" => false //colocar true para fazer download
		)
		);
?>
