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

$('.close').on('click', ( ) => {
    $('#modal').fadeOut(200)
})