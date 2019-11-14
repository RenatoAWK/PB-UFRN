<?php 

    include 'conexao.php';

    $group_get = $_POST['group'];
    $ano = $_POST['ano'];
    $sort = $_POST['sort'];
    $ordem = $_POST['ordem'];

    $group = "GROUP BY $group_get";  
    $having = "HAVING anoprocesso = $ano";
    $orderBy = "ORDER BY $ordem $sort";
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
            <h4>Gasto anual de cada unidade</h4>
        </center>
        

        <div class="container" style="max-width: 1650px;">
        
            <div class="filtros" style=" margin-top: 100px;">

            <form action="gasto_anual.php" method="post" style="display:flex; margin-left: 300px">

                <div class="form-group" style="">
                    <label>Ordenar po:</label> 
                    <select class="form-control text"  name="group" >
                        <option value="nomeunidade" >Municipio</option>
                        <option value="naturezanome" >Natureza</option>
                    </select>
                </div>

                <div class="form-group" style="margin-left:50px">
                    <label>Ordem:</label> 
                    <select class="form-control text"  name="ordem" >

                        <option value="nomeunidade" >Alfabetica - municipio</option>
                        <option value="naturezanome" >Alfabetica - natureza</option>
                        <option value="valor">Valor</option>

                    </select>

                </div>

                <div class="form-group" style="margin-left:50px">
                    <label>Ano:</label> 
                    <select class="form-control text"  name="ano" >

                        <option >2015</option>
                        <option >2016</option>
                        <option >2017</option>
                        <option >2018</option>


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
                        <th scope="col">Nome</th>
                        <th scope="col">Sigla</th>
                        <th scope="col">Municipio</th>
                        <th scope="col">valor</th>
                        <th scope="col">natureza</th>
                        <th scope="col">Ano</th>
                    </tr>
                </thead>
                <tbody >
                    
                    <?php 
                    include 'conexao.php';

                    $sql = "SELECT municipio.nome as municipio,unidade.nome_unidade as nomeunidade, SUM(gastosporunidade.valor) as valor , naturezadespesa.natureza as naturezanome, unidade.sigla as sigla, processo.ano as anoprocesso
                    FROM `municipio` as municipio JOIN `unidade` as unidade ON unidade.municipios_id_municipios = municipio.id_municipio 
                          JOIN `gastosporunidade` as gastosporunidade ON gastosporunidade.unidade_id_unidade = unidade.id_unidade
                          JOIN `gastosporunidade_e_naturezadespesa` as gastosporunidade_e_naturezadespesa ON gastosporunidade_e_naturezadespesa.gastos_por_unidade_id_gastos_por_unidade = gastosporunidade.id_gastos_por_unidade
                          JOIN `naturezadespesa` as naturezadespesa ON naturezadespesa.id_natureza_despesa = gastosporunidade_e_naturezadespesa.natureza_despesa_id_natureza_despesa
                          JOIN `empenho` as empenho ON empenho.unidade_id_unidade = unidade.id_unidade
                          JOIN `processo`as processo ON empenho.processo_id_processo = processo.id_processo
                          $group
                          $having
                          $orderBy"
                          ;

                    $busca = mysqli_query($conexao, $sql);

                    while ($unidades = mysqli_fetch_array($busca)){

                        $municipio = $unidades['municipio'];
                        $nonomeunidademe = $unidades['nomeunidade'];
                        $valor = number_format( $unidades['valor']);
                        $natureza = $unidades['naturezanome'];
                        $sigla = $unidades['sigla'];
                        $ano = $unidades['anoprocesso'];
                    ?>
 
                    <tr>
                        <td class="texto"><?php  echo $nonomeunidademe ?></td>              
                        <td class="texto"><?php  echo $sigla ?></td>              
                        <td class="texto"><?php  echo $municipio ?></td>              
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