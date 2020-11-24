<?php

    session_start();

    if($_SESSION["login"] != 1){

    echo "Usuário não está logado. Direcionando para a página de login.";
    header('Location: index.php');

    exit; 
}

?>


<!DOCTYPE html>

<html>
    <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" 
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" 
            crossorigin="anonymous">

            <link rel="stylesheet" type="text/css" href="css/home.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

            <script type="text/javascript" src="js/conteudo_mask.js"></script>
            <script type="text/javascript" src="js/options.js"></script>

            <title>CONTROLE DE COMODATOS</title>

            <script>
                function abrirModal(){
                    $('#modal-solic-item').modal()
                }
            </script>
        
    </head>

    <body>

                
              <!-- MODAL PARA CADASTRO DE ITEM -->

              <div class="modal fade" id="modal-cad-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Inserir Item no Estoque</h5>
                          
                            <!--CORPO DO MODAL --> 

                            <!--CADASTRO DO EQUIPAMENTO-->    
                        </div>
                                <div class="modal-body">
                                    <form id="form-cad-item" action="db/valida_cad_equip.php"  method="POST">
                                        <div class="form-group"> 
                                            <label for="exampleFormControlInput1">Item</label>
                                                <input type="text" 
                                                class="form-control" 
                                                id="exampleFormControlInput1" 
                                                maxlength="50" 
                                                name="item"
                                                required 
                                                /> 
                                        </div>

                                        <label for="exampleFormControlInput1">Quantidade</label>
                                            <input type="tel" 
                                            class="form-control" 
                                            id="exampleFormControlInput1" 
                                            maxlength="3" 
                                            name="quantidade"
                                            placeholder="Apenas numeros"
                                            onkeypress="return ApenasNumeros(event,this);"
                                            required 
                                            />

                                            <label for="exampleFormControlInput1">Marca</label>
                                            <input type="text" 
                                            class="form-control" 
                                            id="exampleFormControlInput1" 
                                            maxlength="50" 
                                            name="marca"
                                            onkeypress="return ApenasLetras(event,this);"
                                            required 
                                            /> 

                                            <?php
                                                include("db/connection.php");
                                                $query = $connection->query("SELECT nm_forn FROM tb_fornecedor");
                                                ?>  

                                            <label for="exampleFormControlInput1">Fornecedor</label>
                                            <select class="form-control" name="fornecedor">
                                                <option>Selecione o Fornecedor</option>
                                                  <?php
                                                       $result = "select nm_forn from tb_fornecedor";
                                                       $resultado = mysqli_query($connection, $result);

                                                       while($row = mysqli_fetch_assoc($resultado)) {
                                                           echo '<option value="'.$row['nm_forn'].'">'.$row['nm_forn'].'</option>';
                                                       }
                                                    ?>
                                            </select>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>

            <!-- MODAL PARA CADASTRO DE RECEBIMENTO DE ITEM-->

            <div class="modal fade" id="modal-receb-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Recebimento de Itens</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                               
                                </button>
                        </div>
                            <div class="modal-body">
                                <form id="form-receb-item" action="db/valida_receb_item.php"  method="POST">
                                    
                                <label for="exampleFormControlInput1">Fornecedor</label>
                                            <select class="form-control" name="fornecedor">
                                                <option>Selecione o Fornecedor</option>
                                                  <?php
                                                       $result = "select nm_forn from tb_fornecedor";
                                                       $resultado = mysqli_query($connection, $result);

                                                       while($row = mysqli_fetch_assoc($resultado)) {
                                                           echo '<option value="'.$row['nm_forn'].'">'.$row['nm_forn'].'</option>';
                                                       }
                                                    ?>
                                            </select>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Item</label>
                                            <select class="form-control" name="equipamento">
                                                <option>Selecione o Item</option>
                                                  <?php
                                                       $result = "select nm_equipamento, marca from tb_equipamentos";
                                                       $resultado = mysqli_query($connection, $result);

                                                       while($row = mysqli_fetch_assoc($resultado)) {
                                                           echo '<option value="'.$row['nm_equipamento'].'">'.$row['nm_equipamento'].' - '.$row['marca'].'</option>';
                                                       }
                                                    ?>
                                            </select>
                                        </div>

                                        <label for="exampleFormControlInput1">Quantidade</label>
                                            <input type="tel" 
                                            class="form-control" 
                                            id="exampleFormControlInput1" 
                                            maxlength="3" 
                                            name="quantidade"
                                            placeholder="Apenas numeros"
                                            onkeypress="return ApenasNumeros(event,this);"
                                            required 
                                            />
                               
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary" id="submit" data-toggle="modal" data-target="#modal-rel-solic">Cadastrar</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>


         
          <!--MODAL DE CADASTRO DE SOLICITAÇÃO DE ITENS-->

          <div class="modal fade" id="modal-solic-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Solicitar Itens</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                               
                                </button>
                        </div>
                            <div class="modal-body">
                                <form id="form-cad-item" action="db/valida_cad_solic_item.php"  method="POST">
                                    
                                <label for="exampleFormControlInput1">Fornecedor</label>
                                            <select class="form-control" name="fornecedor">
                                                <option>Selecione o Fornecedor</option>
                                                  <?php
                                                       $result = "select nm_forn from tb_fornecedor";
                                                       $resultado = mysqli_query($connection, $result);

                                                       while($row = mysqli_fetch_assoc($resultado)) {
                                                           echo '<option value="'.$row['nm_forn'].'">'.$row['nm_forn'].'</option>';
                                                       }
                                                    ?>
                                            </select>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Item</label>
                                            <select class="form-control" name="equipamento">
                                                <option>Selecione o Item</option>
                                                  <?php
                                                       $result = "select nm_equipamento, marca from tb_equipamentos";
                                                       $resultado = mysqli_query($connection, $result);

                                                       while($row = mysqli_fetch_assoc($resultado)) {
                                                           echo '<option value="'.$row['nm_equipamento'].'">'.$row['nm_equipamento'].' - '.$row['marca'].'</option>';
                                                       }
                                                    ?>
                                            </select>
                                        </div>

                                        <label for="exampleFormControlInput1">Quantidade</label>
                                            <input type="tel" 
                                            class="form-control" 
                                            id="exampleFormControlInput1" 
                                            maxlength="3" 
                                            name="quantidade"
                                            placeholder="Apenas numeros"
                                            onkeypress="return ApenasNumeros(event,this);"
                                            required 
                                            />

                                        <label for="exampleFormControlInput1">Tipo de Solicitação</label>
                                                <select class="form-control" id="tipo_solic" name="tipo_solic" onchange="verificaCampo(this.value)">
                                                    <option value="1 - Defeito">Suprir Falta - Defeito</option>
                                                    <option value="2 - Aumentar Estoque" selected>Aumentar Estoque</option>
                                                    <option value ="3 - Criar Estoque">Criar estoque</option>
                                                </select>    

                                        <label for="exampleFormControlInput1">Defeito</label>
                                            <input type="text" 
                                            class="form-control" 
                                            id="defeito" 
                                            maxlength="80" 
                                            name="defeito"
                                            value=" "
                                            disabled
                                            required
                                            onkeypress="return ApenasLetras(event,this);"
                                        />

                                        <label for="exampleFormControlInput1">Setor</label>
                                            <input type="text" 
                                            class="form-control" 
                                            id="setor" 
                                            maxlength="60" 
                                            name="setor"
                                            required
                                            onkeypress="return ApenasLetras(event,this);"
                                        />
                               
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary" id="submit" data-toggle="modal" data-target="#modal-rel-solic">Cadastrar</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>

            
    <!-- MODAL PARA CADASTRO DE FORNECEDOR -->

            <div class="modal fade" id="modal-cad-fornecedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cadastrar Fornecedor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                               
                                </button>
                        </div>
                            <div class="modal-body">
                                <form id="form-cad-emp" action="db/valida_cad_emp.php"  method="POST">
                                    <label for="exampleFormControlInput1">Nome do Fornecedor</label>
                                        <input type="text" 
                                        class="form-control" 
                                        id="name-empresa" 
                                        maxlength="40" 
                                        name="name-empresa"
                                        required
                                        placeholder="Insira somente letras"
                                        onkeypress="return ApenasLetras(event,this);"
                                        />

                                    <label for="exampleFormControlInput1">CNPJ</label>
                                        <input type="tel" 
                                        class="form-control" 
                                        name="cnpj" 
                                        id="cnpj"
                                        maxlength="18"
                                        onkeyup="mascara(this,cnpjEmp);"
                                        />
                                        
                                    <label for="exampleFormControlInput1">Responsável</label>
                                        <input type="text" 
                                        class="form-control" 
                                        id="exampleFormControlInput1" 
                                        maxlength="40" 
                                        name="resp-empresa"
                                        placeholder="Insira somente letras"
                                        onkeypress="return ApenasLetras(event,this);"
                                        required/>

                                        <label for="exampleFormControlInput1">Telefone</label>
                                        <input type="tel" 
                                        class="form-control" 
                                        name="telefone-emp" 
                                        id="telefone-emp"
                                        maxlength="15"
                                        onkeyup="mascara(this,mtel);"/>

                                        <label for="exampleFormControlInput1">Email</label>
                                        <input type="email" 
                                        class="form-control" 
                                        id="email-emp" 
                                        maxlength="40" 
                                        name="email-emp"
                                        />

                                        <label for="exampleFormControlInput1">Observação</label>
                                        <textarea 
                                        class="form-control" 
                                        id="obs-emp" 
                                        maxlength="100" 
                                        name="obs-emp">
                                        </textarea>
                                                    
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </form>    
                    </div>
                </div>
            </div>

            
              <!-- MODAL PARA HISTÓRICO DE SOLITICAÇÃO E RECEBIMENTO DE ITEM -->

              <div class="modal fade" id="modal-hist-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Histórico de Solicitações e Recebimentos</h5>
                                <!--CORPO DO MODAL --> 

                                <!--CONSULTA SOLICITAÇÃO-->    
                            </div>
                                <div class="modal-body">
                                    <form id="form-hist-item" action="pdf_hist.php"  method="POST">
                                        <div class="form-group"> 
                                            <label for="exampleFormControlInput1">Desde</label>
                                                <input type="date" 
                                                name="data-inicio"
                                                required 
                                                />
                                                
                                                <label for="exampleFormControlInput1">Até</label>
                                                <input type="date" 
                                                name="data-fim"
                                                required 
                                                /> 
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn-primary">Consultar</button>
                                        </div>
                                    </form>
                                </div>       
                    </div>
                 </div>
            </div>
                                                                         

    <!---------------------------------------------------------------------------------------------------------------------------------->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <ul class="nav flex-column">
                                <p>Bem-vindo(a),</p>
                                    <p><?php echo $_SESSION['nome'];?> <?php echo $_SESSION['sobrenome'];?><p>
                                  
                                <li class="nav-item">
                                    <a class="nav-link" href="#modal-cad-item" data-toggle="modal"><i class="fas fa-box"></i>Inserir Item no Estoque</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#modal-receb-item" data-toggle="modal"><i class="fas fa-clipboard-check"></i>Recebimento de Item</a>
                                </li>
                    
                                <li class="nav-item">
                                    <a class="nav-link" href="#modal-solic-item" data-toggle="modal"><i class="fas fa-hand-holding"></i>Solicitação de Item</a>
                                </li>
                    
                                <li class="nav-item">
                                    <a class="nav-link" href="#modal-cad-fornecedor" data-toggle="modal"><i class="fas fa-dolly"></i>Inserir Novo Fornecedor</a>
                                </li>
  
                                <li class="nav-item">
                                    <a class="nav-link" href="#modal-hist-item" data-toggle="modal"><i class="fas fa-chart-bar"></i>Histórico de Solicitações e Recebimentos</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="logoff.php"><i class="fas fa-sign-out-alt"></i>Sair</a>
                                </li>
                            </ul>
                        </nav>  
                    </div>
                </div>                             
            </div>
            
            <div class="container" id="container-dash">
                    <div class="row">
                        <div class="col">
                            <div class="table">
                             <p>Ultimos Produtos Recebidos</p>
                                <?php 
                            

                            $list = "SELECT nm_equipamento, qtd_equipamento, date_cad_receb FROM tb_receb_item LIMIT 4";
                            $search = mysqli_query($connection, $list);

                            echo '<table>';

                            echo '<tr>';

                            echo '<td id="title-table">Equipamento</td>';

                            echo '<td id="title-table">Quantidade</td>';

                            echo '<td id="title-table">Data</td>';
                            
                            echo '</tr>';

                            while($registro = mysqli_fetch_assoc($search)){
                                echo '<tr>';

                                echo '<td>'.$registro["nm_equipamento"].'</td>';
                                
                                echo '<td>'.$registro["qtd_equipamento"].'</td>'; //Nome do autor

                                echo '<td>'.$registro["date_cad_receb"].'</td>'; //Nome do Gênero
                                
                                echo '</tr>';
                                }
                                echo '</table>';
        
                            ?>
                            </div>
                        </div>

                        <div class="col">
                            <div class="table">
                            <p>Ultimos Produtos Solicitados</p>
                            <?php 
                            
                            $list = "SELECT nm_equipamento, qtd_equipamento, date_cad_solic FROM tb_solic_item LIMIT 3";
                            $search = mysqli_query($connection, $list);
                            
                            echo '<table>';

                            echo '<tr>';

                            echo '<td id="title-table">Equipamento</td>';

                            echo '<td id="title-table">Quantidade</td>';

                            echo '<td id="title-table">Data</td>';
                            
                            echo '</tr>';

                            while($registro = mysqli_fetch_assoc($search)){
                                echo '<tr>';

                                echo '<td>'.$registro["nm_equipamento"].'</td>';
                                
                                echo '<td>'.$registro["qtd_equipamento"].'</td>'; //Nome do autor

                                echo '<td>'.$registro["date_cad_solic"].'</td>'; //Nome do Gênero
                                
                                echo '</tr>';
                                }
                                echo '</table>';
        
                         ?>  
                            </div>           
                        </div>
                </div><!--FIM DA LINHA-->

                <div class="row" id="row-graphic">
                    <div clas="col" id="column-graphic">
                                <?php

                              $query = "SELECT nm_equipamento, qtd_equipamento FROM tb_solic_item GROUP BY nm_equipamento";
                              $result = mysqli_query($connection, $query);

                                ?>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load('current', {'packages':['corechart']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {

                            var data = google.visualization.arrayToDataTable([
                            ['Equipamento', 'Quantidade'],
                                <?php
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "['".$row["nm_equipamento"]."',".$row["qtd_equipamento"]."],";
                                    }
                                ?>
                            ]);

                            var options = {
                            title: 'Comparativo Itens Solicitados'
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                            chart.draw(data, options);
                            }
                        </script>
  
                        <div id="piechart" style="width: 50%px; height: 100%;"></div>
  
                    </div>
                </div><!--FIM DA SEGUNDA LINHA-->
            </div><!--FIM DO CONTAINER DASH-->
        </div><!--FIM DO CONTAINER FLUID-->
            <!-- JS, JQUERY DO BOOTSTRAP-->                                            
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
            crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 
            crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
            crossorigin="anonymous"></script>
    </body>

</html>    