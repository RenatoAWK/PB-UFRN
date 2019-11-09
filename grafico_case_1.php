
<?php

$dbhost = 'localhost';
$dbname = 'ufrn';
$dbuser = 'root';
$dbpass = '';

try{
    $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $dbcon -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $ex){
    die($ex -> getMessage());
}


$eixoX = $_POST['eixoX'];
$eixoY = $_POST['eixoY'];
$tipoGrafico = $_POST['tipoGrafico'];
$ordenacao = $_POST['ordenacao'];

$cores = ["rgba(0,248,255,0.5)","rgba(25,25,112,0.5)","rgba(0,0,255,0.5)","rgba(75,0,130,0.5)","rgba(106,90,205,0.5)","rgba(139,0,139,0.5)",
"rgba(139,69,19,0.5)","rgba(210,105,30,0.5)","rgba(112,128,144,0.6)","rgba(0,0,0,0.5)","rgba(0,206,209,0.3)","rgba(0,255,0,0.5)","rgba(0,128,0,0.5)",
"rgba(173,255,47,0.5)","rgba(255,255,0,0.5)","rgba(240,230,140,0.5)","rgba(218,165,32,0.5)","rgba(255,69,0,0.5)","rgba(255,165,0,0.5)","rgba(250,128,114,0.5)","rgba(255,0,0,0.5)","rgba(255,127,80,0.5)","rgba(128,0,0,0.5)","rgba(0,250,154,0.5)",
"rgba(255,20,147,0.5)","rgba(220,220,220,0.8)","rgba(255,20,147,0.7)","rgba(0,255,0,0.7)","rgba(255,20,147,0.2)","rgba(255,0,0,0.6)","rgba(0,0,128,0.6)","rgba(192,192,192,0.6)","rgba(0,255,255,0.2)","rgba(0,255,0,0.2)","rgba(0,255,255,0.8)","rgba(220,220,220,0.5)","rgba(128,128,0,0.5)","rgba(0,0,128,0.4)",];


$stmt = $dbcon -> prepare("SELECT  $eixoY ,processo.ano as anoprocesso, naturezadespesa.natureza as natureza, unidade.nome_unidade as unidade
                            FROM `municipio` as municipio JOIN `unidade` as unidade ON unidade.municipios_id_municipios = municipio.id_municipio 
                            JOIN `gastosporunidade` as gastosporunidade ON gastosporunidade.unidade_id_unidade = unidade.id_unidade
                            JOIN `gastosporunidade_e_naturezadespesa` as gastosporunidade_e_naturezadespesa ON gastosporunidade_e_naturezadespesa.gastos_por_unidade_id_gastos_por_unidade = 				        							  gastosporunidade.id_gastos_por_unidade
                            JOIN `naturezadespesa` as naturezadespesa ON naturezadespesa.id_natureza_despesa = gastosporunidade_e_naturezadespesa.natureza_despesa_id_natureza_despesa
                            JOIN `empenho` as empenho ON empenho.unidade_id_unidade = unidade.id_unidade
                            JOIN `processo`as processo ON empenho.processo_id_processo = processo.id_processo
                            GROUP BY $eixoX
                            ORDER BY $eixoY $ordenacao");
$stmt -> execute();
$json = [];
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $naturezaList[] =  $natureza;
    $anoList[] =  $anoprocesso;
    $unidadeList[] =  $unidade;
    $json2[] =  (int)$valor;
}

// echo json_encode($json);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grafico Case 1</title>

    <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
                            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
                            crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Casos de Uso</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="margin-left: 400px;">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Caso um
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index.php">Listagem</a>
                    <a class="dropdown-item" href="index_grafico_case_1.php?eixoX=anoprocesso&eixoY=valor&tipoGrafico=bar">Grafico</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Caso Dois
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index_tipos_processo.php">Listagem</a>
                    <a class="dropdown-item" href="index_grafico_case_2.php?eixoX=ano&eixoY=quantidade&tipoGrafico=bar">Grafico</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Caso Três
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index_credores_acumulados.php">Listagem</a>
                    <a class="dropdown-item" href="index_grafico_case_3.php?eixoX=ano&eixoY=valor&tipoGrafico=bar">Grafico</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Caso Quatro
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index_empenho_natureza.php">Listagem</a>
                    <a class="dropdown-item" href="index_grafico_case_4.php?eixoX=natureza&eixoY=valor&tipoGrafico=bar">Grafico</a>
                </div>
            </li>
            
        </ul>
    </div>
    </nav>

    <div class="container" style="margin-top: 15px;">


        <div class="filtros">

                    <form action="grafico_case_1.php" method="post" style="display:flex; margin-left: 300px">

            <div class="form-group" style="">
                <label>Eixo X:</label> 
                <select class="form-control text"  name="eixoX" >
                    <option value="anoprocesso" >Ano</option>
                    <option value="natureza">Natureza</option>
                    <option value="unidade">unidade</option>

                </select>
            </div>

            <div class="form-group" style="margin-left:50px">
                <label>Eixo Y:</label> 
                <select class="form-control text"  name="eixoY" >
                    <option value="valor" >Valor</option>

                </select>

            </div>

            <div class="form-group" style="margin-left:50px">
                <label>Tipo-Grafico:</label> 
                <select class="form-control text"  name="tipoGrafico" >

                    <option value="line">Line</option>
                    <option value="bar">Bar</option>
                    <option value="radar">Radar</option>
                    <option value="polarArea">PolarArea</option>


                </select>

            </div>

            <div class="form-group" style="margin-left:50px">
                    <label>Ordenação:</label> 
                    <select class="form-control text"  name="ordenacao" >

                        <option value="ASC">Ascendente</option>
                        <option value="DESC">Descendente</option>

                    </select>

                </div>

            <button style="height: 40px; margin-top: 30px; margin-left: 50px;width: 100px;" type="submit" class="btn btn-primary" id="botao">Enviar</button>

            </form>


        </div>

        <div class="grafico" style="margin-top:15px;">
            <canvas id="myChart"></canvas>

            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

            <script>
            
                var ctx = document.getElementById('myChart').getContext('2d');
                var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: <?php echo json_encode($tipoGrafico);?>,

                // The data for our dataset
                data: {
                    labels: <?php if($eixoX == "anoprocesso"){
                                    echo json_encode($anoList);
                                }elseif ($eixoX == "natureza") {
                                    echo json_encode($naturezaList);
                                }else{
                                    echo json_encode($unidadeList);
                                }?>,
                    datasets: [{
                        label: "Case 1",
                        backgroundColor: <?php echo json_encode($cores);?>,
                        borderColor: <?php echo json_encode($cores);?>,
                        data: <?php echo json_encode($json2);?>
                    }]
                },

                // Configuration options go here
                options: {}
                });
                
            </script>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>