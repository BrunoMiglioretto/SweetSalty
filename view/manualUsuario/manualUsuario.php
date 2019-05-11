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
            };
        </style>
    </head>
     <body style="background-color:#FFF">
        <div class="topo">
            <p class="titulo">Manual do usuário</p>
        </div>
        <div id="accordion">
          <div class="group">
            <h1>Como se cadastrar?</h1>
            <div>
              <p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
            </div>
          </div>
          <div class="group" style="background-color: white">
            <h1>Section 2</h1>
            <div>
              <p>Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In suscipit faucibus urna. </p>
            </div>
          </div>
          <div class="group" style="background-color: white">
            <h1>Section 3</h1>
            <div>
              <p>Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui. </p>
              <ul>
                <li>List item one</li>
                <li>List item two</li>
                <li>List item three</li>
              </ul>
            </div>
          </div>
          <div class="group" style="background-color: white">
            <h1>Section 4</h1>
            <div>
              <p>Cras dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia mauris vel est. </p><p>Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
            </div>
          </div>
        </div>
    </body>
</html>
