<?php
$favoritas = [];
$favoritas[] = 'Azul';
$favoritas[] = 'Verde';
$favoritas[] = 'Amarelo';
$favoritas[1] = 'Roxo';
$produto = ['nome' => 'Caderno', 'preco' => 24.90, 'estoque' => 3];
$produto['estoque'] -= 2;
$filme = '{"titulo": "O Senhor dos Anéis", "ano": 2001, "diretor": "Peter Jackson"}';
$dadosFilme = json_decode($filme, true);
function h($valor) { return htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8'); }
?>
<!doctype html><html lang="pt-BR"><meta charset="utf-8"><title>Práticas - Aula 5</title><link rel="stylesheet" href="style.css"><main><h1>Arrays e JSON</h1>
<h2>Slide 6 - Cores favoritas</h2><p>Cores: <?= h(implode(', ', $favoritas)) ?>.</p><p>Total de cores: <strong><?= count($favoritas) ?></strong>.</p>
<h2>Slide 10 - Produto</h2><p>Nome: <?= h($produto['nome']) ?>.</p><p>Preço: R$ <?= h(number_format($produto['preco'], 2, ',', '.')) ?>.</p><p>Estoque após retirar 2 unidades: <?= h($produto['estoque']) ?>.</p>
<h2>Slide 12 - Filme em JSON</h2><p>Título: <?= h($dadosFilme['titulo']) ?>.</p><p>Ano: <?= h($dadosFilme['ano']) ?>.</p><footer><a href="index.php">Voltar ao início</a></footer></main></html>
