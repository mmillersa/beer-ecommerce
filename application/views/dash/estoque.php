<?= $this->session->flashdata('gravar_dados_bebidas');?>


<div class = "row">
    <div class = "col-md-2">
        <a href = "/beer-ecommerce/dash/bebida/editar/<?=$bebida['id_bebida']?>"><button class = "btn btn-voltar"><i class = " icon-espaco fa fa-chevron-circle-left"></i>Voltar</button></a>
    </div>

    <div class = "col-md-2">
        <button data-toggle = "collapse" data-target = "#collapse-estoque" class = "btn btn-auxiliar"><i class = "fa fa-plus icon-espaco"></i>Adicionar ao estoque</button>
    </div>

    <div class = "col-md-1"></div>

    <div class = "col-md-2">
        <button data-toggle = "collapse" data-target = "#collapse-remove" class = "btn btn-voltar"><i class = "fa fa-trash icon-espaco"></i>Remover do estoque</button>
    </div>

    <div class = "col-md-1"></div>

    <div class = "col-md-4">
        <h3><?= $bebida['qtd_estoque']?> em estoque</h3>
    </div>
</div>

<div class = "collapse" id = "collapse-estoque">
    <form method = "POST" action = "/beer-ecommerce/dash/bebida/gravar">
        <input type = "hidden" name = 'tipo' value = "estoque-add">
        <input type = "hidden" name = 'id_bebida' value = "<?=$bebida['id_bebida']?>">
        <input type = "hidden" name = 'qtd_estoque' value = "<?=$bebida['qtd_estoque']?>">

        <div class = "form-group div-add-estoque">
            <label>Quantidade de <?=$bebida['nome_bebida']?> que deseja adicionar ao estoque</label>

            <div class = "row">
                <div class = "col-md-4">
                    <input class = "form-control" name = "quantidade-add-estoque" type = "number">
                </div>

                <div class = "col-md-4">
                    <button type = 'submit' class = "btn btn-auxiliar">Adicionar</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class = "collapse" id = "collapse-remove">
    <form method = "POST" action = "/beer-ecommerce/dash/bebida/gravar">
        <input type = "hidden" name = 'tipo' value = "estoque-remove">
        <input type = "hidden" name = 'id_bebida' value = "<?=$bebida['id_bebida']?>">
        <input type = "hidden" name = 'qtd_estoque' value = "<?=$bebida['qtd_estoque']?>">

        <div class = "form-group div-add-estoque">
            <label>Quantidade de <?=$bebida['nome_bebida']?> que deseja remover do estoque</label>

            <div class = "row">
                <div class = "col-md-4">
                    <input class = "form-control" name = "quantidade-remove-estoque" type = "number">
                </div>

                <div class = "col-md-4">
                    <button type = 'submit' class = "btn btn-voltar">Remover</button>
                </div>
            </div>
        </div>
    </form>
</div>

</div>

</div>
</div>
</body>

</html>