<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
                integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
                crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="css/index.css">     
            
                <title>CONTROLE DE COMODATOS</title>
         </head>


         <body>

         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
         integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
         crossorigin="anonymous"></script>

         <!-- ------------------INICIO DO CONTEUDO-------------------->
         
            <div class="container-fluid" id="content">
                <div class="col align-self-center" id="column">    
                    <div class="row align-items-center" id="row">
                        <img src="img/logo_hrpa.png" id="logo">
                    </div>
                    
                    <div class="row align-items-center" id="row">
                        <h4 id="title-form">Controle de Comodatos</h4>
                   
                        <form id="form" method="POST" action="db/valida_login.php">
                            <div class="form-group">
                                <input type="text" class="form-control" id="input_username" name="input_username" placeholder="Usuário" required/>
                            </div>
                        
                            <div class="form-group">
                                <input type="password" class="form-control" id="input_password" name="input_password" placeholder="Senha" required/>
                                <small id="info-cadastro">Não tem cadastro? <a href="page_cadastro.php">Cadastre-se</a></small>
                            </div>
 
                                <button type="submit" class="btn btn-primary" id="btn-login">Entrar</button>
                      
                        </form>
                    
                        <small class="form-text text-muted" id="info-rodape">Tecnologia da Informação - HRPA/ASELC 2020</small>
                    </div>
                </div>
              <script>


            </script>    
        </body>
</html>
