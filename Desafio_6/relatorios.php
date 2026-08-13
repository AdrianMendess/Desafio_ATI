<?php
// MODULO 3

/** @var mysqli $conexao1
 *  @var array $relatorios1
 */ //usado para indicar o tipo de dado e remover o erro que se repetia nas variaveis.
require_once 'conexao.php'; // troquei para o require once para a verificação ser feita somente uma vez.
include 'consultas.php';
?>

<?php foreach ($relatorios1 as $indice => $relatorio) { // loop com variaveis para pegar o indice e o relatorio em cada volta percorrendo um por um. 

     $resultado = mysqli_query($conexao1, $relatorio['query']); // Executa a query  utilizando a conexão especifica e as querys que armazenei no array de consultas.php.
    
    echo "<h3>" . $relatorio['titulo'] . "</h3>";

   
    $cat = []; // Armazenar a chave que será a categoria do grafico.
    $val = []; //  Armazenar o valor que será usado no grafico.

    while ($linha = mysqli_fetch_assoc($resultado)) { // Percorre cada query e tranforma os resultados em um array.

        $av = array_values($linha); // Indexa o array em ordem, substituindo a chave usada na query, para indices apontando para o valor.

        if (count($av) == 3) { // Se o array gerado da consulta tiver 3 chaves, ele vai usar chaves diferentes para cada tipo de grafico.
            $cat[] = $av[1];
            $val[] = (int)$av[2]; // pesquisei solução para um bug e precisei definir os valores como inteiros e não strings.
        } else {
            $cat[] = $av[0];
            $val[] = (int)$av[1];
        }
    }
    ?>

    <div id="chart<?= $indice ?>"></div>

    <?php if ($relatorio['tipo_grafico'] == 'pie') { ?>

        <script>
            var options = {
                chart: {
                    type: 'pie',
                    height: 500,
                    width: 500
                },
                series: <?= json_encode($val) ?>,
                labels: <?= json_encode($cat) ?>,
            };

            var chart = new ApexCharts(document.querySelector("#chart<?= $indice ?>"), options);
            chart.render();
        </script>

    <?php } else { ?>

        <script>
            var categorias = <?= json_encode($cat) ?>;
            var valores = <?= json_encode($val) ?>;
            var options = {
                chart: {
                    type: '<?= $relatorio["tipo_grafico"] ?>'
                },
                series: [{
                    name: 'Total',
                    data: valores
                }],
                xaxis: {
                    categories: categorias
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart<?= $indice ?>"), options);
            chart.render();
        </script>

    <?php } ?>
<?php } ?>