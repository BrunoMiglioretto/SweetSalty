<?php
// Verifica se foi feita alguma busca
// Caso contrario, redireciona o visitante pra home
if (!isset($_GET['consulta'])) {
  header("Location: /");
  exit;
}
// Conecte-se ao MySQL antes desse ponto
// Salva o que foi buscado em uma variável
$busca = mysql_real_escape_string($_GET['consulta']);
// ============================================
// Monta outra consulta MySQL para a busca
$sql = "SELECT * FROM `noticias` WHERE (`ativa` = 1) AND ((`titulo` LIKE '%".$busca."%') OR ('%".$busca."%')) ORDER BY `cadastro` DESC";
// Executa a consulta
$query = mysql_query($sql);
// ============================================
// Começa a exibição dos resultados
echo "<ul>";
while ($resultado = mysql_fetch_assoc($query)) {
  $titulo = $resultado['titulo'];
  $texto = $resultado['texto'];
  $link = '/noticia.php?id=' . $resultado['id'];
  
  echo "<li>";
    echo "<a href='{$link}'>";
      echo "<h3>{$titulo}</h3>"
      echo "<p>{$texto}</p>"
    echo "</a>";
  echo "</li>";
}
echo "</ul>";