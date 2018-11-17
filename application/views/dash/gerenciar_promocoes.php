<?= $this->session->flashdata('gravar_dados_promocoes');?>
<div>
    <button data-toggle = "collapse" data-target = "#collapse-add-promocao"  class = "btn btn-adicionar"><i class = " icon-espaco fa fa-plus"></i>Adicionar nova promoção</button>
</div>


<div class = "collapse" id = "collapse-add-promocao">
    <form method = "POST" action = "/beer-ecommerce/dash/promocao/gravar">
        <input type = "hidden" name = "tipo" value = "adicionar">
        <div class = "row">
            <div class = "col-md-4">
                <label>Apelido para promoção</label>
                <input name = "apelido_promocao" class = "form-control" placeholder = "Ex: Queima total de estoque" required>
            </div>

            <div class = "col-md-4">
                <label>Desconto aplicado (em porcentagem)</label>
                <input name = "desconto" class = "form-control" type = "number" step="0.01" required>
            </div>

            <div class = "col-md-4">
                <label>O desconto será aplicado em:</label>
                <select multiple='' name='bebidas_desconto[]' class='ui fluid normal dropdown' id = 'bebidas_desconto' required>
                    <option value=''>Bebidas</option>
                    <?php foreach($bebidas as $bebida){ ?>
                        <option value = '<?= $bebida['id_bebida'] ?>'><?=$bebida['nome_bebida']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class = "center div-promocoes">
            <button type = "submit" class = "btn btn-adicionar">Gravar</button>
        </div>

    </form>
</div>

<div class = "div-promocoes">

    <table class="table table-bordered" id = "tabela-fornecedores">
            
        <thead>
            <tr class = "tr-estilo">
                <th class="text-center">ID</th>
                <th class="text-center">Apelido da promoção</th>
                <th class="text-center">Desconto</th>
                <th class = "text-center">Status</th>
                <th class="text-center">Gerenciar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($promocoes as $promocao){ ?>

            <tr>
                <td class = 'text-center'>#<?=$promocao['id_promocao']?></td>
                <td class = 'text-center td-nome'><?=$promocao['apelido_promocao']?></td>
                <td class = 'text-center td-nome'><?=$promocao['desconto']?>%</td>
    
                <td class = 'text-center'>
                    <input id-promocao = '<?=$promocao['id_promocao']?>' class = 'toggle-status-promocao' type='checkbox' data-on='Ativada' data-off='Desativada' <?=$promocao['status'] ?> data-toggle='toggle' data-onstyle='success' data-offstyle='danger' status = '<?=$promocao['status']?>'>
                </td>
                    
                <td class = 'text-center'>
                    <a href = '/beer-ecommerce/dash/promocao/editar/<?=$promocao['id_promocao']?>'><button class = 'btn btn-sm btn-info'><i class = 'fa fa-edit'></i></button></a>
                </td>

            </tr>

            <?php } ?>

        </tbody>
    </table>
</div>


</div>

</div>
</div>
</body>

</html>