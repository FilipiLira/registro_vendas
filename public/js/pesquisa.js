function pesquisa(pesquisa) {
    const urlArray = $(pesquisa).attr('url').split('/')
    urlArray.splice(5)

    const inputVal = $(pesquisa).val()

    url = `${urlArray.join('/')}/${inputVal}`

    let tipo = $(pesquisa).attr('typeInput')

    let data = [inputVal, tipo]

    $.ajax({
        url: url,
        type: 'get',
        data: {
            inputPesquisa: inputVal
        },

        success: (data) => {
            $(pesquisa).attr('typeInput') == 'produto_nome' ? contPesquisa = pesquisa_produto_container : ''
            $(pesquisa).attr('typeInput') == 'produto_nome' ? inputHiddenVenda = produto_venda : ''

            $(pesquisa).attr('typeInput') == 'produto_referencia' ? contPesquisa = pesquisa_produto_container_referencia : ''
            $(pesquisa).attr('typeInput') == 'produto_referencia' ? inputHiddenVenda = 'produto_venda_referencia' : ''

            console.log(data)
            $(contPesquisa).html('')

            data.forEach(produto => {
                let rowProduto = `<div class="produto-pesquisa" id="${produto.id}">${produto.name}</div>`
                $(contPesquisa).append(rowProduto)
            });

            $('.produto-pesquisa').each((i, produtoPesq) => {
                $(produtoPesq).on('click', () => {
                    $(pesquisa).val($(produtoPesq).html())
                    $(produto_venda).val($(produtoPesq).attr('id'))

                    $('#pesquisa_produto_container').fadeOut(200)
                    $('#pesquisa_produto_container_referencia').fadeOut(200)
                })
            })
            
        }
    })

}
$('#pesquisa_produto').keyup(function () {
    pesquisa(this)
})

$('#pesquisa_produto_referencia').keyup(function () {
   pesquisa(this)
})

