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
    <header class="cabecalho">
        <h1>Destaques: CNH Social </h1>
        <nav>
            <a href="dashboard.php">dashboard</a>
            <a href="relatorios.php">relatorios inscrições</a>
            <a href="relatorios_2.php">Percentual de inscrições</a>
        </nav>
    </header>
    <main>
        
        <section> <!-- Visão geral de inscricções -->
            <?php include 'dashboard.php' ?>
        </section>

        <h2>Relatório de inscrições</h2>
        <section> <!-- relatorio de inscrições -->
            <?php include 'relatorios.php' ?>
        </section>
        
        <h2> Percentual de Inscrições</h2>
        <section> <!-- Percentual de inscrições -->
            <?php include 'relatorios_2.php' ?>
        </section>
        
    </main>


</body>

</html>