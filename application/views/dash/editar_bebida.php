<?= $this->session->flashdata('gravar_dados_bebidas');?>
<?php echo "<pre>",print_r($bebida,1), "</pre>"; ?>
<?php echo "<pre>",print_r($categorias,1), "</pre>"; ?>

<div>
    <a href = "/beer-ecommerce/bebida/gerenciar_bebidas"><button class = "btn btn-voltar"><i class = " icon-espaco fa fa-chevron-circle-left"></i>Voltar</button></a>
</div>

<div class = "form-add-bebidas">

    <?= form_open_multipart('bebida/gravar') ?>

        <input type = "hidden" name = "tipo" value = "bebida"> 
        <div class = "form-group">
            <label>Nome da bebida</label>
            <input value = "<?= $bebida['nome_tipo_bebida'];?>" name = "nome_tipo_bebida" class = "form-control" placeholder = "Esse será o nome que aparecerá para os clientes" required>
        </div>
        <div class = "form-group">
            <label>Quantidade de Ml's</label>
            <input value = "<?= $bebida['ml'];?>" name = "ml" type = 'number' class = "form-control" placeholder = "Essa será a quantidade de Ml's do produto" required>
        </div>
        
        <div class = "form-group">
            <label>Preço unitário</label>
            <input value = "<?= $bebida['preco_bebida'];?>" name = "preco_bebida" step="0.01" type = 'number' class = "form-control" placeholder = "Esse será o preço que será cobrado" required>
        </div>
        <div class = "form-group">
            <label>Teor alcoolico</label>
            <input value = "<?= $bebida['teor_alcoolico'];?>" name = "teor_alcoolico" step="0.01" type = 'number' class = "form-control" placeholder = "Esse será o teor alcoolico que aparecerá para os clientes" required>
        </div>
        <div class = "form-group">
            <label>Tipo de bebida</label>
            <select name = "tipo_bebida" class = "form-control" required>
                <option <?php echo $bebida['tipo_bebida'] == "Cerveja" ? "selected" : "" ?> value = 'Cerveja'>Cerveja</option>
                <option <?php echo $bebida['tipo_bebida'] == "Whisky" ? "selected" : "" ?> value = 'Whisky'>Whisky</option>
                <option <?php echo $bebida['tipo_bebida'] == "Vodka" ? "selected" : "" ?> value = 'Vodka'>Vodka</option>
                <option <?php echo $bebida['tipo_bebida'] == "Cachaça" ? "selected" : "" ?> value = 'Cachaça'>Cachaça</option>
            </select>
        </div>
        <div class = "form-group">
            <label>Marca</label>
            <select name = "marca" class = "form-control" required>
                <?php
                    foreach($marcas as $marca){
                        echo "<option ";
                        echo ($bebida['id_marca'] == $marca['id_marca']) ? " selected " : ""; 
                        echo "value = '".$marca['id_marca']."'>".$marca['nome_marca']."</option>";
                    }         
                ?>
            </select>
        </div>

        <div class = "form-group">
            <label>Adicione categorias à essa bebida</label>
            <select multiple='' name='categorias[]' class='ui fluid normal dropdown' id = 'categorias' required>
                <option value=''>Categorias</option>
                <?php
                    /* função simples para verificae se a categoria está adicionada à bebida */
                    function if_in_bebidas($id, $bebida){
                        foreach($bebida['categorias'] as $key => $value)
                            if($value['id_categoria'] == $id) return true;
                        return false;
                    }
                    foreach($categorias as $categoria => $value){

                        if(if_in_bebidas($value['id_categoria'], $bebida))
                            echo "<option selected value = '".$value['id_categoria']."'>".$value ['descricao_categoria']."</option>";
                    
                        else
                            echo "<option value = '".$value['id_categoria']."'>".$value['descricao_categoria']."</option>";     
                    }        
                ?>
            </select>
        </div>

        <div class = "form-group">
            <label>Quantidade inicial em estoque (digite 0 caso não tenha em estoque ainda)</label>
            <input name = "estoque" class = "form-control" required type = "number" placeholder = "Quantidade em estoque">
        </div>

        <div class = "form-group">
            <label>Descrição</label>
            <textarea name = "descricao_bebida" type = 'number' class = "form-control" placeholder = "Essa será a descrição que aparecerá para os clientes" required rows= '15'></textarea>
        </div>

        <div class = "form-group">
            <label>Selecione as 4 imagens que serão apresentadas junto com o produto</label>
            <input name = "img1" type = 'file' class = "form-control" required>
            <input name = "img2" type = 'file' class = "form-control" required>
            <input name = "img3" type = 'file' class = "form-control" required>
            <input name = "img4" type = 'file' class = "form-control" required>
        </div>

        <div class = "center">
            <button type = "submit" class = "btn btn-adicionar">Gravar</button>
        </div>
        
        <?= form_close() ?> 

</div>

</div>

</div>
</div>
</body>

</html>