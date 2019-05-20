function modalPizzaProdutos() {
    $('#modalPizza').modal();
}

function modalPizzaClientes() {
    console.log("modalClientes");
}


function adicionarItem(idCardapio, nomeCardapio) {

    
    
    let botao = $(`#botaoItem${idCardapio}`);

    if(botao.html() == "Adicionar") {

        addSecondaryBtn(botao);

        $("#caixaDeItensGraficoPizzaProdutos").append(`<button type='button' class='list-group-item list-group-item-action' value='${idCardapio}' id='item${idCardapio}'>${nomeCardapio}</button>`);

        $(`#item${idCardapio}`).click(function() {
            let idCardapio = $(this).val();
            $(`#caixaDeItensGraficoPizzaProdutos #item${idCardapio}`).remove();

            addPrimaryBtn($(`#botaoItem${idCardapio}`));
        });

    } else {
        addPrimaryBtn(botao);
        $(`#caixaDeItensGraficoPizzaProdutos #item${idCardapio}`).remove();
    }


}










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
