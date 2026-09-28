<?php
$url = 'https://viacep.com.br/ws/14784326/json/';
$resposta = @file_get_contents($url, false, stream_context_create(['http' => ['timeout' => 5]]));
$dados = $resposta === false ? null : json_decode($resposta, true);
?>
<!doctype html><html lang="pt-BR"><meta charset="utf-8"><title>ViaCEP - foreach</title><link rel="stylesheet" href="style.css"><main><h1>Slide 25 - Resposta do ViaCEP</h1>
<?php if (!is_array($dados) || isset($dados['erro'])): ?><p class="alerta">Não foi possível obter esse CEP agora. Confira a conexão com a internet e tente atualizar a página.</p>
<?php else: ?><table><thead><tr><th>Chave</th><th>Valor</th></tr></thead><tbody><?php foreach ($dados as $chave => $valor): ?><tr><td><?= htmlspecialchars((string)$chave, ENT_QUOTES, 'UTF-8') ?></td><td><?= htmlspecialchars(is_scalar($valor) ? (string)$valor : json_encode($valor, JSON_UNESCAPED_UNICODE), ENT_QUOTES, 'UTF-8') ?></td></tr><?php endforeach; ?></tbody></table><?php endif; ?>
<footer><a href="index.php">Voltar ao início</a></footer></main></html>
