<?php

/** @var mysqli_result $resultado */ ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
   
    <title>Dashboard</title>
</head>

<body>
    <header class="cabecalho" id="topo">
        <h1>Destaques: CNH Social </h1>
        <nav>
            <a href="#inicio">Cards</a>
            <a href="#insc">Relatório de inscrições</a>
            <a href="#perc">Percentual de inscrições</a>
        </nav>
    </header>
    <main>
        
        <section class="cards" id="inicio"> <!-- Visão geral de inscricções -->
            <?php include 'dashboard.php' ?>
        </section>

        <h2>Relatório de inscrições</h2>
        <section class="group" id="insc"> <!-- relatorio de inscrições -->
            <?php include 'relatorios.php' ?>
        </section>
        
        <h2> Percentuais de Inscrições</h2>
        <section class="percent" id="perc"> <!-- Percentual de inscrições -->
            <?php include 'relatorios_2.php' ?>
        </section>
        
    </main>
    <footer>
        <nav>
            <a href="#topo" class="bot">⇑ ⇑ ⇑</a>
        </nav>
    </footer>


</body>

</html>