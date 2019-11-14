<?php 

    include 'conexao.php';

    $group_get = $_POST['group'];
    $ano = $_POST['ano'];
    $sort = $_POST['sort'];
    $ordem = $_POST['ordem'];

    $group = "GROUP BY $group_get";  
    $having = "HAVING ano = $ano";
    $orderBy = "ORDER BY $ordem $sort";

    echo $orderBy;
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Case one</title>

        <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
                                integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
                                crossorigin="anonymous">

        <style type="text/css">
            .text{
                text-align: center;
            }

        </style>

    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 100px;background: lavender !important;">
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
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Caso Cinco
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index_valor_saldo.php">Listagem</a>
                    <a class="dropdown-item" href="index_grafico_case_5.php?eixoX=credor&eixoY=diferenca&tipoGrafico=bar">Grafico</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Caso Seis
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index_processos_acumulados.php">Listagem</a>
                    <a class="dropdown-item" href="index_grafico_case_6.php?eixoX=tipo&eixoY=valor&tipoGrafico=bar">Grafico</a>
                </div>
            </li>
            
        </ul>
    </div>
    </nav>

        <center style="margin-top: 15px">
            <h4>Maiores valores de credores acumudalos</h4>
        </center>

        <div class="container" style="max-width: 1650px;">
        
            <div class="filtros" style=" margin-top: 20px;">
            

            <form action="credores_acumulados.php" method="post" style="display:flex; margin-left: 300px">

            <div class="form-group" style="">
                <label>Agrupar po:</label> 
                <select class="form-control text"  name="group" >
                    <option value="credor" >credor</option>

                </select>
            </div>

            <div class="form-group" style="margin-left:50px">
                <label>Ordem:</label> 
                <select class="form-control text"  name="ordem" >

                    <option value="credor" >Alfabetica - credor</option>
                    <option value="natureza" >Alfabetica - natureza</option>
                    <option value="valor">Valor</option>

                </select>

            </div>

            <div class="form-group" style="margin-left:50px">
                <label>Ano:</label> 
                <select class="form-control text"  name="ano" >

                    <?php 
                    include 'conexao.php';

                    $sql = "SELECT DISTINCT empenho.ano as ano
                    FROM  `empenho` as empenho";

                    $busca = mysqli_query($conexao, $sql);

                    while ($anos = mysqli_fetch_array($busca)){

                        $ano = $anos['ano'];

                    ?>

                    <option ><?php echo $ano ?></option>

                    <?php } ?>



                </select>

            </div>

            <div class="form-group" style="margin-left:50px">
                <label>Sort:</label> 
                <select class="form-control text"  name="sort" >

                    <option value="ASC" >Ascendente</option>
                    <option value="DESC" >Descendente</option>

                </select>

            </div>

            <button style="height: 40px; margin-top: 30px; margin-left: 50px;width: 100px;" type="submit" class="btn btn-primary" id="botao">Enviar</button>

            </form>
        
        </div>
        
        <table class="table" style="margin-top: 50px;border-radius:15px; border: 2px solid #f3f3f3;" >
                <thead class="black white-text"  style="background-color:#007bff; color: #fff">
                    <tr>
                        <th scope="col">Credor</th>
                        <th scope="col">Natureza</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ano</th>
                    </tr>
                </thead>
                <tbody >
                    
                    <?php 
                    include 'conexao.php';

                    $sql = "SELECT empenho.credor as credor, SUM(empenho.valor_empenho) as valor, empenho.natureza as natureza, empenho.ano as ano FROM `empenho` as empenho
                            $group
                            $having
                            $orderBy";


                    $busca = mysqli_query($conexao, $sql);

                    while ($credores = mysqli_fetch_array($busca)){

                        $credor = $credores['credor'];
                        $valor = number_format( $credores['valor']);
                        $natureza = $credores['natureza'];
                        $ano = $credores['ano'];
                    ?>
 
                    <tr>
                        <td class="texto"><?php  echo $credor ?></td>              
                        <td class="texto"><?php  echo $valor ?></td>              
                        <td class="texto"><?php  echo $natureza ?></td>              
                        <td class="texto"><?php  echo $ano ?></td>                         
                    </tr>

                    <?php } ?>
                </tbody>
            </table>
        
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>