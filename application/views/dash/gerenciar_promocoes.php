<?= $this->session->flashdata('gravar_dados_promocoes');?>
<div>
    <button data-toggle = "collapse" data-target = "#collapse-add-promocao"  class = "btn btn-adicionar"><i class = " icon-espaco fa fa-plus"></i>Adicionar nova promoção</button>
</div>

<div class = "collapse" id = "collapse-add-promocao">
    <form method = "POST" action = "/beer-ecommerce/dash/promocao/gravar">
        <div class = "row">
            <div class = "col-md-4">
                <label>Apelido para promoção</label>
                <input class = "form-control" placeholder = "Ex: Queima total de estoque" required>
            </div>

            <div class = "col-md-4">
                <label>Desconto aplicado (em porcentagem)</label>
                <input class = "form-control" type = "number" step="0.01" required>
            </div>

            <div class = "col-md-4">
                <label>O desconto será aplicado em:</label>
                <select multiple='' name='bebidas_desconto[]' class='ui fluid normal dropdown' id = 'bebidas_desconto' required>
                    <option value=''>Todas bebidas</option>
                    <?php
                        /* listando as bebidas */
                        foreach($bebidas as $bebida)
                            echo "<option value = '".$bebida['id_tipo_bebida']."'>".$bebida['nome_tipo_bebida']."</option>";

                    ?>
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
                    <th class = "text-center">Status</th>
                    <th class="text-center">Gerenciar</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
</div>



</div>

</div>
</div>
</body>

</html>