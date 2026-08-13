<?php
// MODULO 4

/** @var mysqli $conexao1
 *  @var array $relatorios2
 */ //usado para indicar o tipo de dado e remover o erro que se repetia nas variaveis.

require_once 'conexao.php';
include 'consultas.php';
?>

<?php foreach ($relatorios2 as $indice => $relatorio) {

    $resultado = mysqli_query($conexao1, $relatorio['query']);

    echo "<h3>" . $relatorio['titulo'] . "</h3>";

    $cat = [];
    $val = [];
    while ($linha = mysqli_fetch_assoc($resultado)) {

        $av = array_values($linha);

        if (count($av) == 3) {
            $cat[] = $av[1];
            $val[] = (float)$av[2];
        } else {
            $cat[] = $av[0];
            $val[] = (float)$av[1];
        }
    }
?>

    <div id="chart2_<?= $indice ?>"></div>

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

            var chart = new ApexCharts(document.querySelector("#chart2_<?= $indice ?>"), options);
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
                },
                dataLabels: {
                    formatter: function(val) {
                        return val + '%';
                    }
                }

            }

            var chart = new ApexCharts(document.querySelector("#chart2_<?= $indice ?>"), options);
            chart.render();
        </script>

    <?php } ?>
<?php } ?>