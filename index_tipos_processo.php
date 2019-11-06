<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Case Two</title>

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

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 70px;">
                <a class="navbar-brand" style="margin-left: 550px;" href="index.php">Case One <span class="sr-only"></span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index_tipos_processo.php">Case two <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Case three</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Case Four</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Case Five</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Case Six   </a>
                        </li>
                    </ul>
                </div>
            </nav>

        <div class="container" style="max-width: 1650px;">
        
            <div class="filtros" style=" margin-top: 100px;">
        

                <form action="tipos_processo.php" method="post" style="display:flex; margin-left: 300px">

                <div class="form-group" style="">
                    <label>Agrupar po:</label> 
                    <select class="form-control text"  name="group" >
                        <option value="tipo" >Tipo</option>
                        <option value="assunto">Assunto</option>

                    </select>
                </div>

                <div class="form-group" style="margin-left:50px">
                    <label>Ordem:</label> 
                    <select class="form-control text"  name="ordem" >

                        <option value="tipo" >Alfabetica - Tipo</option>
                        <option value="assunto" >Alfabetica - Assunto</option>
                        <option value="Ano">Ano</option>
                        <option value="Quantidade">Quantidade</option>

                    </select>

                </div>

                <div class="form-group" style="margin-left:50px">
                    <label>Ano:</label> 
                    <select class="form-control text"  name="ano" >

                    <?php 
                    include 'conexao.php';

                    $sql = "SELECT DISTINCT processo.ano as ano
                    FROM  `tipoprocesso` as tipoprocesso JOIN `processo` as processo ON processo.tipoProcesso_id_tipo_processo = tipoprocesso.id_tipo_processo";

                    $busca = mysqli_query($conexao, $sql);

                    while ($anos = mysqli_fetch_array($busca)){

                        $ano = $anos['ano'];

                    ?>
 
                    <option value="ano"><?php echo $ano ?></option>

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

                        <th scope="col">Tipo</th>
                        <th scope="col">Assunto</th>
                        <th scope="col">Qualidade</th>
                        <th scope="col">Quantidade</th>

                    </tr>
                </thead>
                <tbody >
                    
                    <?php 

                    include 'conexao.php';

                    $sql = "SELECT tipoprocesso.tipo as tipo, processo.assunto as assunto, processo.ano as ano, COUNT(tipo) as quantidade
                    FROM  `tipoprocesso` as tipoprocesso JOIN `processo` as processo ON processo.tipoProcesso_id_tipo_processo = tipoprocesso.id_tipo_processo
                    GROUP BY tipo
                    LIMIT 50
                    ";

                    $busca = mysqli_query($conexao, $sql);

                    while ($tipos = mysqli_fetch_array($busca)){

                        $tipo = $tipos['tipo'];
                        $assunto = $tipos['assunto'];
                        $ano = $tipos['ano'];
                        $quantidade = $tipos['quantidade'];

                    ?>
 
                    <tr>
                        <td class="texto"><?php  echo $tipo ?></td>              
                        <td class="texto"><?php  echo $assunto ?></td>              
                        <td class="texto"><?php  echo $ano ?></td>              
                        <td class="texto"><?php  echo $quantidade ?></td>              
            
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