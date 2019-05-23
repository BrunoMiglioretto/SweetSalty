

itensGraficoPizzaProdutos = new Array;
itensGraficoPizzaClientes = new Array;

grafico = "pizzaProdutos";



function modalPizzaProdutos() {
    grafico = "pizzaProdutos";
    $('#modalPizzaProdutos').modal();
}

function modalPizzaClientes() {
    grafico = "pizzaClientes";
    $('#modalPizzaClientes').modal();
}


function adicionarItem(idCardapio, nomeCardapio) {

    
    let botao = $(`#botaoItem${idCardapio}`);

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
    $("#caixaDeItensGraficoPizzaProdutos").append(`<button type='button' class='list-group-item list-group-item-action' value='${idCardapio}' id='item${idCardapio}'>${nomeCardapio}</button>`);

    $(`#item${idCardapio}`).click(function() {
        let idCardapio = $(this).val();
        $(`#caixaDeItensGraficoPizzaProdutos #item${idCardapio}`).remove();
        
        let itensGrafico = escolhaListaItens(grafico);
        removerItemGrafico(idCardapio, itensGrafico);

        addPrimaryBtn($(`#botaoItem${idCardapio}`));
    });
}

function removerItemLista(idCardapio) {
    $(`#caixaDeItensGraficoPizzaProdutos #item${idCardapio}`).remove();
}






// ------------------------ ADD/REMOVE item gráfico ------------------------ //

function addItemGrafico(idCardapio, itensGrafico) {
    let i = 0;

    while(1) {
        if(itensGrafico.length == 0 || itensGrafico[i] == undefined){
            itensGrafico[i] = idCardapio;
            return;
        }
        else 
            i++;
    }

    return itensGrafico;
    
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
}

function alertaDataInvalida() {
    console.log("Data invalida");
}

function alertaSemItensVendidos() {
    console.log("Sem itens vendidos");
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
