<?= $this->session->flashdata('gravar_dados_promocoes');?>
<div class = "row">
    <div class = "col-md-2">
        <a href = "/beer-ecommerce/dash/promocao"><button class = "btn btn-voltar"><i class = " icon-espaco fa fa-chevron-circle-left"></i>Voltar</button></a>
    </div>
</div>


<div>

 <form method = 'POST' action = '/beer-ecommerce/dash/promocao/gravar'>
    <input type = 'hidden' name = 'id_promocao' value = "<?= $promocao['promocao'][0]['id_promocao'] ?>">
    <input type = 'hidden' name = 'tipo' value = 'atualizar'>
    <div class = 'row div-promocoes'>
        <div class = 'col-md-6'>
            <label>Apelido da promoção</label>
            <input name = 'apelido_promocao' value = "<?= $promocao['promocao'][0]['apelido_promocao'] ?>" class = 'form-control'>
        </div>
    
        <div class = 'col-md-6'>
            <label>Desconto</label>
            <input type = 'number' step = '0.01' name = 'desconto'  value = "<?= $promocao['promocao'][0]['desconto'] ?>" class = 'form-control'>
        </div>
    </div>

    <div class = "row div-promocoes">
        <div class = "col-md-12">
            <label>Bebidas com desconto aplicado</label>
            <select multiple='' name='bebidas_desconto[]' class='ui fluid normal dropdown' id = 'bebidas_desconto' required>
                <option value=''>Promoções</option>
                <?php
                    /* função simples para verificae se a categoria está adicionada à bebida */
                    function if_in_promocoes($bebida, $promocao){
                        foreach($promocao['relacoes'] as $key)
                            if($key['id_tipo_bebida'] == $bebida && $promocao['promocao'][0]['id_promocao'] == $key['id_promocao']) return true;
                        return false;
                    }
                    foreach($bebidas as $bebida){

                        if(if_in_promocoes($bebida['id_tipo_bebida'], $promocao))
                            echo "<option selected value = '".$bebida['id_tipo_bebida']."'>".$bebida ['nome_tipo_bebida']."</option>";
                    
                        else
                            echo "<option value = '".$bebida['id_tipo_bebida']."'>".$bebida['nome_tipo_bebida']."</option>";     
                    }        
                ?>
            </select>
        </div>
    </div>
    <div class='center div-promocoes'>
        <button type='submit' class='btn btn-adicionar'>Atualizar</button>
    </div>
</form>

</div>


</div>

</div>
</div>
</body>

</html>