<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <title>Manual do usuário | Sweet Salty</title>
        <link rel="icon" href="../img/logo-min.png" type="image/x-icon">
        <link href='../cliente/mesas/mesaStyle.css' rel='stylesheet'>
        <link rel="stylesheet" href="../alertifyjs/css/alertify.min.css">
        <link rel="stylesheet" href="../alertifyjs/css/themes/default.min.css">
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../alertifyjs/alertify.min.js"></script>
        <style>
            .image{
                width: 75%;
                margin: 20px;
            }
            .img{
                margin: 10px;
                width: 150px;
            }

            #nav{
                width:100%;
                height:100px;
                background:#71A140;
            }

        </style>
    </head>
    <body>

        <nav id="nav">
            <a href="../logar.php">
                <img src="../img/logo-min.png" class="img">
            </a>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-12 text-center mt-4 mb-4">
                    <h1 style="font-family: 'Raleway', sans-serif; font-size:40px;" class="trn">Manual do Usuário</h1>
                </div>
            </div>


            <div class="row">
                <div class="col-12 mb-5">
                    <div class="content-wrapper">
                        <div class="container-fluid">
                            <div id="accordion">

                            <!-- Como se cadastrar? -->

                                <div class="card">
                                    <div class="card-header" id="heading1" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1"> 
                                        <h5 class="mb-0">
                                            <button class="btn collapsed trn" style="font-size:20px;" data-toggle="collapse"  aria-expanded="false" >Como se cadastrar?</button>
                                        </h5>
                                    </div>
                                    <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordion" >
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="lead trn">1° Clique no botão "Quero me cadastrar".</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img src="../img/login-min.jpg" class="image">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="lead trn">2° Preencha todos os campos corretamente e clique em "Salvar".</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img src="../img/cadastro-min.jpg" class="image">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="lead trn">3° Para validar a sua conta, clique em "Confirmar identificação" no e-mail que enviamos para você.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img src="../img/validarCadastro-min.jpg" style="width:400px; margin: 20px;"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Como fazer login? -->

                                <div class="card">
                                    <div class="card-header" id="heading2" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2"> 
                                        <h5 class="mb-0">
                                            <button class="btn collapsed trn" style="font-size:20px;" data-toggle="collapse"  aria-expanded="false" >Como fazer login?</button>
                                        </h5>
                                    </div>
                                    <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion" >
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="lead trn">1° Alternativa: Na tela de login, preencha os campos e-mail e senha, após isso, clique em entrar.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img src="../img/loginPadrao-min.jpg" class="image">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="lead trn">2° Alternativa: Faça login com o Google clicando no botão Google.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img src="../img/loginGoogle-min.jpg" class="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Como juntar mesa? -->

                                <div class="card">
                                    <div class="card-header" id="heading3" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3"> 
                                        <h5 class="mb-0">
                                            <button class="btn collapsed trn" style="font-size:20px;" data-toggle="collapse"  aria-expanded="false" >Como juntar mesa?</button>
                                        </h5>
                                    </div>
                                    <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion" >
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="lead trn">Observação: só é possível juntar com outra mesa caso nenhuma delas tenha enviado pedidos para cozinha e a mesa esteja não esteja desocupada.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img src="../img/juntarMesas-min.jpg" class="image">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="lead trn">Pedido de junção de mesa enviado.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img src="../img/pedidoSolicitacaoJuntarMesas-min.jpg" class="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Como fazer um pedido? -->

                                <div class="card">
                                    <div class="card-header" id="heading4" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4"> 
                                        <h5 class="mb-0">
                                            <button class="btn collapsed trn" style="font-size:20px;" data-toggle="collapse"  aria-expanded="false" >Como fazer um pedido?</button>
                                        </h5>
                                    </div>
                                    <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion" >
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="lead trn">1° Clique em uma das imagens ou vá em cardápio no menu lateral.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img src="../img/cardapio-min.jpg" class="image">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="lead trn">2° Siga</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img src="../img/enviarPedido-min.jpg" class="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Como mudar de mesas? -->

                                <div class="card">
                                    <div class="card-header" id="heading5" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5"> 
                                        <h5 class="mb-0">
                                            <button class="btn collapsed trn" style="font-size:20px;" data-toggle="collapse"  aria-expanded="false" >Como mudar de mesas?</button>
                                        </h5>
                                    </div>
                                    <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion" >
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="lead trn">Observação: só é possível mudar de mesa caso a mesa esteja desocupada.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img src="../img/mudarMesa-min.jpg" class="image">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="lead trn">Irá aparecer um aviso falando que foi alterado a mesa.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img src="../img/alertMudandoMesa-min.jpg" class="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Como editar meu perfil? -->

                                <div class="card">
                                    <div class="card-header" id="heading6" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6"> 
                                        <h5 class="mb-0">
                                            <button class="btn collapsed trn" style="font-size:20px;" data-toggle="collapse"  aria-expanded="false" >Como editar meu perfil?</button>
                                        </h5>
                                    </div>
                                    <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion" >
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="lead trn">1° clique no menu lateral, clique sobre " + Mais", depois clique em Perfil.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img src="../img/editarPerfil-min.jpg" class="image">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="lead trn">Observação: Preencher todos os campos antes de salvar.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img src="../img/editarPerfilPreencherCampos-min.jpg" class="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Como visualizar os meus pedidos já feitos? -->

                                <div class="card">
                                    <div class="card-header" id="heading7" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7"> 
                                        <h5 class="mb-0">
                                            <button class="btn collapsed trn" style="font-size:20px;" data-toggle="collapse"  aria-expanded="false" >Como visualizar os meus pedidos já feitos?</button>
                                        </h5>
                                    </div>
                                    <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion" >
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="lead trn">1° Vá até o menu lateral, em seguida clique em "Pedidos Enviados".</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img src="../img/pedidosEnviadosMenu-min.jpg" class="image">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="lead trn">Listará todos os pedidos anteriormente feitos, com o situação do(s) mesmo(s).</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img src="../img/visualizarPedidosFeitos-min.jpg" class="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../dicionario/jquery.translate.js"></script>
        <script src="../dicionario/loginCadastroManualCliente.js"></script>
        <script>
            $(document).ready(function() {

                var translator = $('body').translate({lang: "<?= $_SESSION["linguagem"]?>", t: dict});
                
            });
        </script>
    </body>
</html>
