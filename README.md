# Aula 5 - Desenvolvimento Web 2

Projeto PHP que resolve as práticas e exercícios dos slides 6, 10, 12, 17, 25, 27, 33, 36 e 38. Os arquivos `diario.md` e `notas.txt` começam vazios e são preenchidos pelo usuário.

## Como executar

1. Instale PHP 8 com a extensão `mbstring` (ou use XAMPP/WAMP).
2. Na pasta `aula5_php`, execute `php -S localhost:8000` e abra `http://localhost:8000` no navegador. No XAMPP, coloque a pasta em `htdocs` e abra `http://localhost/aula5_php/`.
3. A pasta precisa permitir escrita para que o diário e o cadastro de notas salvem os dados. A consulta ViaCEP requer internet.

## Onde está cada atividade

- `praticas.php`: cores, produto e filme em JSON.
- `cep.php`: resposta completa do ViaCEP percorrida com `foreach`.
- `leitura.php`: conteúdo do arquivo de exemplo e leitura linha a linha em tabela.
- `diario_adicionar.php` e `diario_ver.php`: duas páginas para gravar e consultar `diario.md`.
- `notas_adicionar.php` e `notas_ver.php`: cadastro e consulta; cada aluno fica em uma linha de `notas.txt`, no formato `nome,nota1,nota2,nota3`.

A atividade cita https://www.w3schools.com/php/php_file.asp como material de apoio sobre manipulação de arquivos.
