<!DOCTYPE html>
<html lang="pt-br">
    <head>
      <meta charset="utf-8">
      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <title>Manual do usuário | Sweet Salty</title>
      <link rel="icon" href="../img/logo.png" type="image/x-icon">
      <link href='../cliente/mesas/mesaStyle.css' rel='stylesheet'>
      <link rel="stylesheet" href="../alertifyjs/css/alertify.min.css">
      <link rel="stylesheet" href="../alertifyjs/css/themes/default.min.css">
      <script src="../vendor/jquery/jquery.min.js"></script>
      <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="../alertifyjs/alertify.min.js"></script>
          <script>
            $( function() {
              $( "#accordion" )
                .accordion({
                  header: "> div > h1"
                })
                .sortable({
                  axis: "y",
                  handle: "h1",
                  stop: function( event, ui ) {
                    // IE doesn't register the blur when sorting
                    // so trigger focusout handlers to remove .ui-state-focus
                    ui.item.children( "h1" ).triggerHandler( "focusout" );
           
                    // Refresh accordion to handle new order
                    $( this ).accordion( "refresh" );
                  }
                });
            } );
          </script>
          <style>
              .ui-state-active{
                  background-color:#71a140;
                  border:1px solid #71a140;
              }
              .image{
                margin:0% 10%;
                 width: 80%;
                 height: 65vh; 
              }

              @media screen and (max-width: 1000px){
                img.image {
                  margin:0% 0%;
                  width: 80vw;
                  height: 65vh; 
                }
              }

              @media screen and (min-width: 590px) and (max-width: 750px){
                img.image {
                  margin:0% 0%;
                  width: 70vw;
                  height: 65vh; 
                }
              }

              @media screen and (max-width: 590px){
                img.image {
                  margin:0% 0%;
                  width: 90vw;
                  height: 65vh; 
                }
              }
          </style>
    </head>
    <body style="background-color:#FFF">
      <div class="topo">
          <p class="titulo">Manual do usuário</p>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-0 col-sm-0  col-md-0  col-lg-1"></div>
            <div class="col-12  col-sm-12  col-md-12  col-lg-10">
              <div id="accordion">

                <div class="group">
                  <h1>Como se cadastrar?</h1>
                    <div>
                      <p class="p-div">1° Clique no botão "Quero me cadastrar"</p>
                      <img src="../img/login.jpg" class="image">
                      <p class="p-div">2° Clique no botão "Preencha todos os campos corretamente"</p>
                      <img src="../img/cadastro.jpg" class="image">
                      <!-- p class="p-div">Valide seu cadastro indo na caixa de e-mails.</p>
                      <img src="../img/validarCadastro.jpg" class="image"> -->
                    </div>
                </div>

                <div class="group" style="background-color: white">
                  <h1>Como fazer login?</h1>
                    <div>
                      <p class="p-div">1° alternativa: Preencha os campos e clique em entrar.</p>
                      <img src="../img/loginPadrao.jpg" class="image">
                      <p class="p-div">2° alternativa: Faça login com o Google clicando no botão Google.</p>
                      <img src="../img/loginGoogle.jpg" class="image">
                    </div>
                </div>

                <div class="group" style="background-color: white">
                  <h1>Como fazer um pedido?</h1>
                    <div>
                      <p class="p-div">1° Clique em uma das imagens ou vá em cardápio no menu lateral.</p>
                      <img src="../img/cardapio.jpg" class="image">
                      <p class="p-div">2° Siga a sequência para fazer um pedido: Cardápio => Bebidas => Suco de laranja => adicionar. Após ter adicionado, vá em pedidos e clique em Enviar para cozinha."</p>
                      <img src="../img/enviarPedido.jpg" class="image">
                    </div>
                </div>

                <div class="group" style="background-color: white">
                  <h1>Como juntar mesas?</h1>
                    <div>
                       <p class="p-div">Observação: só é possível juntar com uma mesa caso não tenha feito nenhum pedido e a mesas esteja ocupada.</p>
                      <img src="../img/juntarMesas.jpg" class="image">
                      <p class="p-div">Pedido de junção de mesa enviado.</p>
                      <img src="../img/pedidoSolicitacaoJuntarMesas.jpg" class="image">
                    </div>
                </div>

                <div class="group" style="background-color: white">
                  <h1>Como mudar de mesas?</h1>
                    <div>
                        <p class="p-div">Observação: só é possível mudar de mesa caso a mesa esteja desocupada.</p>
                      <img src="../img/mudarMesa.jpg" class="image">
                      <p class="p-div">Pedido de junção de mesa enviado.</p>
                      <img src="../img/alertMudandoMesa.jpg" class="image">
                    </div>
                </div>

                <div class="group" style="background-color: white">
                  <h1>Como editar meu perfil?</h1>
                    <div>
                        <p class="p-div">1° clique no menu lateral, clique sobre " + Mais", depois clique em Perfil.</p>
                      <img src="../img/editarPerfil.jpg" class="image">
                      <p class="p-div">Observação: Preencher todos os campos antes de salvar.</p>
                      <img src="../img/editarPerfilPreencherCampos.jpg" class="image">
                    </div>
                </div>
              
               <div class="group" style="background-color: white">
                <h1>Como visualizar os meus pedidos já feitos?</h1>
                  <div>
                    <p>1° Vá até o menu lateral, em seguida clique em "Pedidos Enviados".</p>
                    <img src="../img/pedidosEnviadosMenu.jpg" class="image">
                    <p class="p-div">Listará todos os pedidos anteriormente feitos, com o situação do(s) mesmo(s).</p>
                    <img src="../img/visualizarPedidosFeitos.jpg" class="image">
                  </div>
              </div>
              </div><!-- accordion -->
            </div>  <!-- meio -->
          <div class="col-0 col-sm-0 col-md-0  col-lg-1" ></div>
        </div><!-- row -->
      </div> <!-- container -->
    </body>
</html>
