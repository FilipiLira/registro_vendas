$('#continuar').on('click', (e) => {
    e.preventDefault()
    let produto = $('#pesquisa_produto').val()
    let fornecedor = $('#fornecedor').val()

    if(produto != '' && fornecedor != ''){
        $('#form-venda').submit()
    }
})


$(document).ready(function () {
    url = '/fornecedor/todos'


    // $('#fornecedor').

    $.ajax({
        url: url,
        type: 'get',

        success: (data) => {
            // let res = JSON.parse(data)
            // $('.likeContSpan').each((i, elem) => {
            //     if ($(elem).attr('idPost') == res.postId) {
            //         $(elem).html(res.likes)
            //     }
            // })
            console.log(JSON.parse(data))
        }
    })
})