<!DOCTYPE html>
<html lang="pt-br">
    <head>
      <meta charset="utf-8">
      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link rel="icon" href="../img/logo.png" type="image/x-icon">
      <title>Manual do usuário | Sweet Salty</title>
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
                  border:1px solid black;
              }
              .image{
                 width: 100%;
                 height: 50%; 
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
                    <img src="../img/login.jpg" class="image">
                    <img src="../img/cadastro.jpg" class="image">
                  </div>
                </div>

                <div class="group" style="background-color: white">
                  <h1>Como fazer login?</h1>
                  <div>
                    <img src="../img/loginPadrao.jpg" class="image">
                    <img src="../img/loginGoogle.jpg" class="image">
                  </div>
                </div>

                <div class="group" style="background-color: white">
                  <h1>Section 3</h1>
                  <div>
                  </div>
                </div>

                <div class="group" style="background-color: white">
                  <h1>Section 4</h1>
                  <div>
                    
                  </div>
                </div>

              </div>
            </div>
          <div class="col-0 col-sm-0 col-md-0  col-lg-1" ></div>
        </div>
      </div>
    </body>
</html>
