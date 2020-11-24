<!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
                integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
                crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="css/page_cadastro.css">
                <title>CONTROLE DE COMODATOS</title>

                <script>
                 function validaSenha(){
                     senha = document.getElementById('input_password1').value;
                     senha_confirm = document.getElementById('input_password2').value;

                     if(senha != senha_confirm){ 
                       $('#alert_pass').show();
                       $('.close').click(function(){
                           $('#alert_pass').hide();
                       })
                      
                       return false;
                     }
                     return true;
                 }
                </script>    
         </head>


         <body>
         
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
         integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
         crossorigin="anonymous"></script>
        
        
         <!-- ------------------INICIO DO CONTEUDO-------------------->
       
            <div class="container-fluid" id="content">
                <div class="col align-self-center" id="column">    
                    <div class="row align-items-center" id="row">
                        <img src="img/logo_hrpa.png" id="logo">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" data-toggle="collapse" id="alert_pass" style="display: none;">
                                As senhas não coincidem
                                <button type="button" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> 
                            </div>

                          
                    </div>
                    
                    <div class="row align-items-center" id="row">
                        <h4 id="title-form">Cadastro</h4>
                   
                        <form id="form" method="POST" action="db/valida_cadastro.php">
                            <div class="form-group">
                                <input type="text" class="form-control" id="input_nome" placeholder="Nome" maxlength="20" name="input_nome" required/>
                            </div>
                            
                            <div class="form-group">
                                <input type="text" class="form-control" id="input_sobrenome" placeholder="Sobrenome"  maxlength="20" name="input_sobrenome"  required/>
                            </div>
                        
                            <div class="form-group">
                                <input type="text" class="form-control" id="input_username" placeholder="Usuário" maxlength="20" input="input_username" name="input_username" required/>
                            </div>
                        
                            <div class="form-group">
                                <small class="form-text text-muted" id="info-password">Crie uma senha de no Mínimo 8 caracteres</small>
                                <input type="password" 
                                class="form-control" 
                                id="input_password1"
                                name="input_password1" 
                                placeholder="Senha" 
                                minlength="8"
                                required/>
                            </div>

                            <div class="form-group">
                                <input type="password" 
                                class="form-control" 
                                id="input_password2" 
                                placeholder="Repita a Senha" 
                                minlength="8" 
                                required/>
                            </div>

                        
                            <div class="row m" id="row-buttons">
                                <div class="col py-3 px-lg-1" id="column-buttons">
                                    <button type="submit" class="btn btn-primary" onclick=" return validaSenha()">Cadastrar</button>
                                </div>
                                <div class="col py-3 px-lg-1" id="column-buttons">
                                    <button type="button" class="btn btn-primary" onclick="window.location.href='index.php'">Voltar</button>
                                </div>
                            </div>

                        </form>
                    
                        <small class="form-text text-muted" id="info-rodape">Tecnologia da Informação - HRPA/ASELC 2020</small>
                    </div>
                </div>
            </div>

               
        </body>
</html>
