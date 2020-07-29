function pesquisa(pesquisa) {
    const urlArray = $(pesquisa).attr('url').split('/')
    urlArray.splice(5)

    const inputVal = $(pesquisa).val()

    url = `${urlArray.join('/')}/${inputVal}`

    $.ajax({
        url: url,
        type: 'get',
        data: {
            inputPesquisa: inputVal
        },

        success: (data) => {
            $(pesquisa).attr('typeInput') == 'produto' ? contPesquisa = pesquisa_produto : ''
            $(pesquisa).attr('typeInput') == 'produto' ? inputHiddenVenda = produto_venda : ''
            console.log(data)
            $(contPesquisa).html('')

            data.forEach(produto => {
                let rowProduto = `<div class="produto-pesquisa" id="${produto.id}">${produto.nome}</div>`
                $(contPesquisa).append(rowProduto)
            });

            $('.produto-pesquisa').each((i, produtoPesq) => {
                $(produtoPesq).on('click', () => {
                    $(pesquisa).val($(produtoPesq).html())
                    $(produto_venda).val($(produtoPesq).attr('id'))
                })
            })
        }
    })

}
$('#pesquisa_produto').keydown(function () {
    pesquisa(this)
})

$(document).ready(function () {
    
    $('#fornecedor').multiselect();
    
});
