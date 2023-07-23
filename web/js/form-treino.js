// adicionar exercicio a lista de treino
$('.list-group-item').on('click', function() {

    var idElement = $(this).attr('id');
    var nome = $(this).children('.name').children('.nome').html();
    var peso = $(this).children('.peso').html();
    var nomePeso = nome + ' - ' + peso;

    var selecionadoDiv = $('#selecionado');
    var elementoExistente = selecionadoDiv.find('span:contains("' + nomePeso + '")');

    if (elementoExistente.length > 0) {
        elementoExistente.remove();
        $(this).removeClass('select');

    } else {
        $(this).addClass('select');
        var novoElemento = $(' <input name="Exercicio[]" value="' + idElement.replace('li', '') + '" hidden/> <span class="text-success"> <i class="fas fa-check me-1"></i> ' + nomePeso + '</span>');
        var botaoRemover = $('<button id="btn' + idElement + '" type="button" class="btn btn-outline-danger btn-sm ms-2"> <i class="fas fa-trash"></i></button>');

        botaoRemover.on('click', function() {
            novoElemento.remove();

            var IdBtn = $(this).attr('id');
            var idLi = IdBtn.replace('btn', '');
            $('#' + idLi).removeClass('select');

        });

        novoElemento.append(botaoRemover);
        selecionadoDiv.append(novoElemento);
    }

});

// fazer search na ol com os exercicios
$('#inputSearch').on('keyup', function() {
    var valorDaPesquisa = $(this).val().toLowerCase();

    if (valorDaPesquisa == '') {
        // Caso a pesquisa esteja vazia, exibir todos os itens novamente
        $('.buscar').show();
    } else {
        // Ocultar todos os itens e mostrar apenas os que correspondem à pesquisa
        $('.buscar').filter(function() {
            $(this).toggle($(this).text().toLocaleLowerCase().indexOf(valorDaPesquisa) > -1);
        });
    }
});