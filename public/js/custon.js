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
            
            data.forEach(( fornecedor ) => {
                $('#fornecedor').append(`<option value="${fornecedor.id}">${fornecedor.name}</option>`)
            })
            console.log(data)
        }
    })
})