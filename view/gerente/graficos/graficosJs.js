

itensGraficoPizzaProdutos = new Array;
itensGraficoPizzaClientes = new Array;
itensGraficoColunaProdutos = new Array;
itensGraficoLinhaProdutos = new Array;

grafico = "pizzaProdutos";



function modalPizzaProdutos() {
    grafico = "pizzaProdutos";
    $('#modalPizzaProdutos').modal();
}

function modalPizzaClientes() {
    grafico = "pizzaClientes";
    $('#modalPizzaClientes').modal();
}

function modalColunaProdutos() {
    grafico = "colunaProdutos";
    $('#modalColunaProdutos').modal();
}

function modalLinhaProdutos() {
    grafico = "linhaProdutos";
    $('#modalLinhaProdutos').modal();
}


function adicionarItem(idCardapio, nomeCardapio) {

    if(grafico == "colunaProdutos")
        botao = $(`#botaoItemColuna${idCardapio}`);
    else if(grafico == "linhaProdutos")
        botao = $(`#botaoItem${idCardapio}`);


    if(botao.html() == "Adicionar") {

        let itensGrafico = escolhaListaItens(grafico);
        
        addItemGrafico(idCardapio, itensGrafico);
        addItemLista(idCardapio, nomeCardapio);
        addSecondaryBtn(botao);

        attArrayItens(itensGrafico, grafico);
    } else {

        let itensGrafico = escolhaListaItens(grafico);

        removerItemGrafico(idCardapio, itensGrafico);
        removerItemLista(idCardapio);
        addPrimaryBtn(botao);

        attArrayItens(itensGrafico, grafico);
    }

}



function escolhaListaItens(grafico) {
    switch(grafico) {
        case "pizzaProdutos":
            return itensGraficoPizzaProdutos;
        case "pizzaClientes":
            return itensGraficoPizzaClientes;
        case "colunaProdutos":
            return itensGraficoColunaProdutos;
        case "linhaProdutos":
            return itensGraficoLinhaProdutos;
    }
}

// ------------------------ Atualiza Array gráficos ------------------------ //

function attArrayItens(itensGrafico, grafico) {
    switch(grafico) {
        case "pizzaProdutos":
            itensGraficoPizzaProdutos = itensGrafico;
            break;
        case "pizzaClientes":
            itensGraficoPizzaClientes = itensGrafico;
            break;
        case "colunaProdutos":
            itensGraficoColunaProdutos = itensGrafico;
            break;
        case "linhaProdutos":
            itensGraficoLinhaProdutos = itensGrafico;
    }
}






// ------------------------ Atualiza botão da tabela ------------------------ //


function addPrimaryBtn(botao) {

    botao.removeClass("btn-secondary");
    botao.addClass( "btn-primary" );
    botao.html("Adicionar");
}

function addSecondaryBtn(botao) {

    botao.removeClass("btn-primary");
    botao.addClass( "btn-secondary" );
    botao.html("Remover");
}







// ------------------------ ADD/REMOVE item lista ------------------------ //

function addItemLista(idCardapio, nomeCardapio) {
    if(grafico == "colunaProdutos")
        $("#caixaDeItensGraficoColunaProdutos").append(`<button type='button' class='list-group-item list-group-item-action' value='${idCardapio}' id='item${idCardapio}'>${nomeCardapio}</button>`);
    else
        $("#caixaDeItensGraficoLinhaProdutos").append(`<button type='button' class='list-group-item list-group-item-action' value='${idCardapio}' id='item${idCardapio}'>${nomeCardapio}</button>`);

    $(`#item${idCardapio}`).click(function() {
        let idCardapio = $(this).val();
        if(grafico == "colunaProdutos"){
            $(`#caixaDeItensGraficoColunaProdutos #item${idCardapio}`).remove();
            let itensGrafico = escolhaListaItens(grafico);
            removerItemGrafico(idCardapio, itensGrafico);
            addPrimaryBtn($(`#botaoItemColuna${idCardapio}`));
        }
        else{
            $(`#caixaDeItensGraficoLinhaProdutos #item${idCardapio}`).remove();
            let itensGrafico = escolhaListaItens(grafico);
            removerItemGrafico(idCardapio, itensGrafico);
            addPrimaryBtn($(`#botaoItem${idCardapio}`));
        }

    });
}

function removerItemLista(idCardapio) {
    $(`#caixaDeItensGraficoColunaProdutos #item${idCardapio}`).remove();
}






// ------------------------ ADD/REMOVE item gráfico ------------------------ //

function addItemGrafico(idCardapio, asdf) {
    let i = 0;

    let itensGrafico = escolhaListaItens(grafico);

    while(1) {
        if(itensGrafico.length == 0 || itensGrafico[i] == undefined){
            itensGrafico[i] = idCardapio;
            return;
        }
        else 
            i++;
    }

    attArrayItens(itensGrafico, grafico);
    
}

function removerItemGrafico(idCardapio, itensGrafico) {
    let i = 0;

    while(1) {
        if(itensGrafico[i] == idCardapio){
            itensGrafico[i] = undefined;
            return;
        }else
            i++;
    }

    return itensGrafico;
}

// ------------------------ gráfico ------------------------ //

function gerarGrafico() {

    switch(grafico) {
        case "pizzaProdutos":
            gerarGraficoPizzaProdutos();
            break;
        case "pizzaClientes":
            gerarGraficoPizzaClientes();
            break;
        default:
            console.log("Gráfico não inclementado");
    }

    /* Verifica se tem item selecionado */

    // let itensGrafico = escolhaListaItens(grafico);
    // let itensGraficoTamanho = 0;

    // for(let i = 0; i < itensGrafico.length; i++){
    //     if(itensGrafico[i] != undefined)
    //         itensGraficoTamanho++;
    // }
    
    // if(itensGraficoTamanho < 2){
    //     alertaSemItens();
    //     return;
    // }

    
    // switch(grafico) {
    //     case "pizzaProdutos":
    //         gerarGraficoPizzaProdutos(dataComeco);
    //         break;
    //     case "pizzaClientes":
    //         console.log("Gerar grafico clientes");
    //         break;
    // }
}

// ------------------------ Alertas ------------------------ //

function alertaSemItens() {
    console.log("Sem itens suficientes selecionados");
    alertify.alert("").setting({
        transition : "zoom",
        title : "Sem item(s)",
        message : "Sem itens suficientes selecionados",
        movable : false
    });
}

function alertaDataInvalida() {
    console.log("Data invalida");
    alertify.alert("").setting({
        transition : "zoom",
        title : "Data invalida",
        message : "A data selecionada é invalida",
        movable : false
    });
}

function alertaSemItensVendidos() {
    console.log("Sem itens vendidos");
    alertify.alert("").setting({
        transition : "zoom",
        title : "Sem itens vendidos",
        message : "Nenhum item do campo selecionado foi vendido desde a data definida",
        movable : false
    });
}



// ------------------------ Especificações do s gráficos ------------------------ //


// -- Gráfico de pizza -- //

function gerarGraficoPizzaProdutos() {
    conjunto = $("input[name=radioItemGraficoPizzaProduto]:checked").val();

    if(conjunto != "categorias")
        conjunto = $("#subCategoriaPizzaProdutos").val();
    

    formaDataEscolha = $("input[name=radioDataComeco]:checked").val();
    let d = new Date();

    if(formaDataEscolha == "select") {
        
        dataEscolha = $("#selectDataComeco").val();
        
        switch(dataEscolha) {
            case "hoje":
                d.setDate(d.getDate());
                break;
            case "semana":
                d.setDate(d.getDate() - 7);
                break;
            case "mes":
                d.setMonth(d.getMonth() - 1);
                break;
            case "bimestre":
                d.setMonth(d.getMonth() - 2);
                break;
            case "trimestre":
                d.setMonth(d.getMonth() - 3);
                break;
        }
    } else {
        let dataInput = $("#radioItemGraficoPizzaProduto").val();

        if(dataInput == "") {
            alertaDataInvalida();
            return;
        }

        d = new Date();
        d.setDate(d.getDate() + 1);
    }

    dataComeco = `${d.getFullYear()}/${d.getMonth() + 1}/${d.getDate()}`;


    $.ajax({
        url : "../../controller/gerenteController/graficoController/graficoPizzaProdutosController.php",
        method : "POST",
        data : {
            conjunto : conjunto,
            dataComeco : dataComeco
        }
    }).done(function(n) {
        if((JSON.parse(n)).data == null)
            alertaSemItensVendidos();
        else
            graficoPizza(n);
    });
}




function gerarGraficoPizzaClientes() {
    escolhaDado = $("input[name=radioClientes]:checked").val();
    if(escolhaDado == "cadastros") {
        $.ajax({
            url : "../../controller/gerenteController/graficoController/graficoPizzaClientesController/graficoPizzaClientesCadastroController.php"
        }).done(function(n) {
            graficoPizza(n);
        });
    } else {
        faixaEtaria = $("#faixaEtaria").val();
        $.ajax({
            url : "../../controller/gerenteController/graficoController/graficoPizzaClientesController/graficoPizzaClientesFaixaEtariaController.php",
            method : "POST",
            data : {
                faixaEtaria : faixaEtaria
            }
        }).done(function(n) {
            graficoPizza(n);
        });
    }
}



function gerarGraficoColunaProdutos() {

    formaDataEscolha = $("input[name=inputColunaProdutosDataComeco]:checked").val();
    let d = new Date();

    if(formaDataEscolha == "select") {
        
        dataEscolha = $("#selectColunaProdutosDataComeco").val();
        
        switch(dataEscolha) {
            case "hoje":
                d.setDate(d.getDate());
                break;
            case "semana":
                d.setDate(d.getDate() - 7);
                break;
            case "mes":
                d.setMonth(d.getMonth() - 1);
                break;
            case "bimestre":
                d.setMonth(d.getMonth() - 2);
                break;
            case "trimestre":
                d.setMonth(d.getMonth() - 3);
                break;
        }
    } else {
        let dataInput = $("#dataColunaProdutos").val();

        if(dataInput == "") {
            alertaDataInvalida();
            return;
        }

        d = new Date();
        d.setDate(d.getDate() + 1);
    }

    dataComeco = `${d.getFullYear()}/${d.getMonth() + 1}/${d.getDate()}`;

    console.log(itensGraficoColunaProdutos);

    $.ajax({
        url : "../../controller/gerenteController/graficoController/graficoColunaProdutosController.php",
        method : "POST",
        data : {
            itens : itensGraficoColunaProdutos,
            dataComeco : dataComeco
        }
    }).done(function(n) {
        console.log(n);
        if((JSON.parse(n)).data == null)
            alertaSemItensVendidos();
        else
            graficoColuna(n);
    });
}

function gerarGraficoLinhaProdutos() {
    $.ajax({
        url : "../../controller/gerenteController/graficoController/graficoLinhaProdutosController.php",
        method : "POST",
        data : {
            itens : itensGraficoLinhaProdutos,
        }
    }).done(function(n) {
        graficoLinha(n);
    });
}

// ------------------------ Google Charts ------------------------ //

google.charts.load('current', {'packages':['corechart']});

function graficoPizza(dados) {
    let itens = JSON.parse(dados);
    let legenda = "[";
    let i = 0;


    while(i < Object.keys(itens.data).length) {
        legenda += `["${itens.data[i].nome}",`;
        if((i + 1) < Object.keys(itens.data).length)
            legenda += `${itens.data[i].quantidade}],`;
        else
            legenda += `${itens.data[i].quantidade}]`;
        i++;
    }

    legenda += "]";

    jsonLegenda = JSON.parse(legenda);

    var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows(jsonLegenda);

        var options = {'title': itens.titulo,
                       'width':400,
                       'height':300};

        var chart = new google.visualization.PieChart(document.getElementById('graficoPizza'));
        chart.draw(data, options);
}


function graficoColuna(dados) {

    
    let itens = JSON.parse(dados);
    let legenda = "[[\"Produto\", \"Vendas\"],";
    let i = 0;

    while(i < Object.keys(itens.data).length) {
        legenda += `["${itens.data[i].nome}",`;
        if((i + 1) < Object.keys(itens.data).length)
            legenda += `${itens.data[i].quantidade}],`;
        else
            legenda += `${itens.data[i].quantidade}]`;
        i++;
    }

    legenda += "]";

    console.log(legenda);
    
    jsonLegenda = JSON.parse(legenda);

    var data = google.visualization.arrayToDataTable(jsonLegenda);

    var options = {
        title: itens.titulo,
        'width':500,
        'height':300
    };

    var chart = new google.visualization.ColumnChart(
        document.getElementById('graficoColuna'));

    chart.draw(data, options);
}


function graficoLinha(dados) {
    console.log(dados);

    var data = new google.visualization.DataTable();
    data.addColumn('number', 'X');
    data.addColumn('number', 'Dogs');
    data.addColumn('number', 'Cats');

    data.addRows([
        [0, 0, 0],    [1, 10, 5],   [2, 23, 15],  [3, 17, 9],   [4, 18, 10],  [5, 9, 5]
        // [6, 11, 3],   [7, 27, 19],  [8, 33, 25],  [9, 40, 32],  [10, 32, 24], [11, 35, 27],
        // [12, 30, 22], [13, 40, 32], [14, 42, 34], [15, 47, 39], [16, 44, 36], [17, 48, 40],
        // [18, 52, 44], [19, 54, 46], [20, 42, 34], [21, 55, 47], [22, 56, 48], [23, 57, 49],
        // [24, 60, 52], [25, 50, 42], [26, 52, 44], [27, 51, 43], [28, 49, 41], [29, 53, 45],
        // [30, 55, 47], [31, 60, 52], [32, 61, 53], [33, 59, 51], [34, 62, 54], [35, 65, 57],
        // [36, 62, 54], [37, 58, 50], [38, 55, 47], [39, 61, 53], [40, 64, 56], [41, 65, 57],
        // [42, 63, 55], [43, 66, 58], [44, 67, 59], [45, 69, 61], [46, 69, 61], [47, 70, 62],
        // [48, 72, 64], [49, 68, 60], [50, 66, 58], [51, 65, 57], [52, 67, 59], [53, 70, 62],
        // [54, 71, 63], [55, 72, 64], [56, 73, 65], [57, 75, 67], [58, 70, 62], [59, 68, 60],
        // [60, 64, 56], [61, 60, 52], [62, 65, 57], [63, 67, 59], [64, 68, 60], [65, 69, 61],
        // [66, 70, 62], [67, 72, 64], [68, 75, 67], [69, 80, 72]
    ]);

    var options = {
        hAxis: {
            title: 'Semanas',
            logScale: true
        },
        vAxis: {
            title: 'Vendas',
            logScale: false
        },
        colors: ['#a52714', '#097138']
    };

    var chart = new google.visualization.LineChart(document.getElementById('graficoLinha'));
    chart.draw(data, options);
}
