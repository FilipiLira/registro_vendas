$('#continuar').on('click', (e) => {
    e.preventDefault()
    let produto = $('#pesquisa_produto').val()
    let referencia = $('#pesquisa_produto_referencia').val()
    let fornecedor = $('#fornecedor').val()

    if ((produto != '' || referencia != '') && fornecedor != '') {
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

            data.forEach((fornecedor) => {
                $('#fornecedor').append(`<option value="${fornecedor.id}">${fornecedor.name}</option>`)
            })
        }
    })


})


$('#cadastrar').on('click', (e) => {
    e.preventDefault()
    let produto = $('#produto').val()
    let fornecedor = $('#fornecedor').val()
    let data = $('#data').val()
    let cep = $('#cep').val()
    let uf = $('#uf').val()
    let cidade = $('#cidade').val()
    let bairro = $('#bairro').val()
    let rua = $('#rua').val()
    let numero = $('#numero').val()


    var _token = $('meta[name="_token"]').attr('content');

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': _token

        }

    });

    $.ajax({
        url: "/vendas/nova/cadastro",
        type: 'post',
        data: {
            type: 'ajax',
            produto: produto,
            fornecedor: fornecedor,
            data: data,
            cep: cep,
            uf: uf,
            cidade: cidade,
            bairro: bairro,
            rua: rua,
            numero: numero
        },

        success: (data) => {

            let total = 0

            let linhaTabela = ''
            data.forEach(elem => {
                total = total + elem['venda'].price
                linhaTabela += `
                    <tr idTr="${elem['venda'].id}" class="linhas-tabela">
                        <td>${elem['venda'].id}</td>
                        <td>${elem['venda'].name}</td>
                        <td>R$${elem['venda'].price},00</td>
                `
                linhaTabela += `
                        <td>`

                elem['fornecedores'].forEach((elem2, i) => {
                    
                    // if(i == elem['fornecedores'].length){
                    //     console.log('igual')
                    // }
                    if ((i != (elem['fornecedores'].length - 1)) && (elem['fornecedores'].length > 1)) {
                        linhaTabela += `${elem2.name} <span>| </span>`
                    } else {
                        linhaTabela += `${elem2.name}`
                    }

                })
                linhaTabela += `
                </td>`

                linhaTabela += `
                    <td>
                        <button idBtn="${elem['venda'].id}" class="btn btn-primary modal-btn" data-toggle="modal" data-target="modal"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </td>
                    <input type="hidden" name="" value="${elem['venda'].postal_code}">
                    <input type="hidden" name="" value="${elem['venda'].city}">
                    <input type="hidden" name="" value="${elem['venda'].neighborhood}">
                    <input type="hidden" name="" value="${elem['venda'].uf}">
                    <input type="hidden" name="" value="${elem['venda'].street}">
                    <input type="hidden" name="" value="${elem['venda'].reference}">
                </tr>
            `
            })

            let totalString = `
                <tr scope="row" colspan="3">
                    <td>Total: R$${total},00</td>
                </tr>
            `

            $('#bodyTabela').html(linhaTabela)
            $('#tabelaRodape').html(totalString)

            $('.modal-btn').each((i, elem) => {
                let idBtn = $(elem).attr('idBtn')

                $(elem).on('click', () => {

                    $('.linhas-tabela').each((i, linha) => {
                        let idTr = $(linha).attr('idTr')

                        if (idBtn == idTr) {
                            console.log('igual')

                            let filhos = $(linha).children()
                            let nome = $(filhos[1]).html()
                            let preco = $(filhos[2]).html()
                            let fornecedor = $(filhos[3]).html()
                            let cep = $(filhos[5]).val()
                            let cidade = $(filhos[6]).val()
                            let bairro = $(filhos[7]).val()
                            let uf = $(filhos[8]).val()
                            let rua = $(filhos[9]).val()
                            let referencia = $(filhos[10]).val()
                            console.log(fornecedor)

                            let conteudoModal = `
                                   <h5>Produto</h5>
                                   <hr/>
                                   <div class="row p-2">
                                        <div class="form-group col-lg-6">
                                            <label>Nome</label>
                                            <input class="form-control" type="text" name="" value="${nome}" readonly>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Preço</label>
                                            <input class="form-control" type="text" name="" value="${preco}" readonly>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Referência</label>
                                            <input class="form-control" type="text" name="" value="${referencia}" readonly>
                                        </div>
                                   </div>
                                   <h5>Entrega</h5>
                                   <hr/>
                                   <div class="row p-2">
                                        <div class="form-group col-lg-4">
                                            <label>CEP</label>
                                            <input class="form-control" type="text" name="" value="${cep}" readonly>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>UF</label>
                                            <input class="form-control" type="text" name="" value="${uf}" readonly>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Cidade</label>
                                            <input class="form-control" type="text" name="" value="${cidade}" readonly>
                                        </div>
                                   </div>
                                   <div class="row p-2">
                                        <div class="form-group col-lg-6">
                                            <label>Bairro</label>
                                            <input class="form-control" type="text" name="" value="${bairro}" readonly>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Rua</label>
                                            <input class="form-control" type="text" name="" value="${rua}" readonly>
                                        </div>
                                   </div>
                            `
                            $('.modal-body').html(conteudoModal)
                        }
                    })

                    $('#modal').fadeIn(200)

                })
            })

            $('.close').on('click', () => {
                $('#modal').fadeOut(200)
            })
        }
    })

})