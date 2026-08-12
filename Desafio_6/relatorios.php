<?php
// MODULO 3

/** @var mysqli $conexao1
 *  @var array $relatorios1
 */ //usado para indicar o tipo de dado e remover o erro que se repetia nas variaveis.
require_once 'conexao.php'; // troquei para o require once para a verificação ser feita somente uma vez.
include 'consultas.php';
?>

<?php foreach ($relatorios1 as $indice => $relatorio) { ?>

    <?php $resultado = mysqli_query($conexao1, $relatorio['query']); ?>

    <h3><?= $relatorio['titulo'] ?></h3>

    <?php
    $cat = [];
    $val = [];
    while ($linha = mysqli_fetch_assoc($resultado)) {

        $av = array_values($linha);

        if (count($av) == 3) {
            $cat[] = $av[1];
            $val[] = (int)$av[2];
        } else {
            $cat[] = $av[0];
            $val[] = (int)$av[1];
        }
    }
    ?>

    <div id="chart<?= $indice ?>"></div>

    <?php if( $relatorio['tipo_grafico'] == 'pie') { ?>

    <script>
        var options = {
             chart: { type: 'pie' },
            series: <?= json_encode($val) ?>,
            labels: <?= json_encode($cat) ?>
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