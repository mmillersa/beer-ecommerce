<?= $this->session->flashdata('gravar_dados_bebidas');?>

<div class = "row">
    <div class = "col-md-2">
        <a href = "/beer-ecommerce/dash/bebida/gerenciar_bebidas"><button class = "btn btn-voltar"><i class = " icon-espaco fa fa-chevron-circle-left"></i>Voltar</button></a>
    </div>

    <div class = "col-md-8">
        <h1>Adicionar nova bebida</h1>
    </div>
</div>

<div class = "form-add-bebidas">

    <?= form_open_multipart('dash/bebida/gravar') ?>

        <input type = "hidden" name = "tipo" value = "bebida">
        <input type = "hidden" name = "acao_bebida" value = "gravar"> 
        <div class = "form-group">
            <label>Nome da bebida</label>
            <input name = "nome_tipo_bebida" class = "form-control" placeholder = "Esse será o nome que aparecerá para os clientes" required>
        </div>
        <div class = "form-group">
            <label>Quantidade de Ml's</label>
            <input name = "ml" type = 'number' class = "form-control" placeholder = "Essa será a quantidade de Ml's do produto" required>
        </div>
        
        <div class = "form-group">
            <label>Preço unitário</label>
            <input name = "preco_bebida" step="0.01" type = 'number' class = "form-control" placeholder = "Esse será o preço que será cobrado" required>
        </div>
        <div class = "form-group">
            <label>Teor alcoolico</label>
            <input name = "teor_alcoolico" step="0.01" type = 'number' class = "form-control" placeholder = "Esse será o teor alcoolico que aparecerá para os clientes" required>
        </div>
        <div class = "form-group">
            <label>Tipo de bebida</label>
            <select name = "tipo_bebida" class = "form-control" required>
                <option value = 'Cerveja'>Cerveja</option>
                <option value = 'Whisky'>Whisky</option>
                <option value = 'Vodka'>Vodka</option>
                <option value = 'Cachaça'>Cachaça</option>
            </select>
        </div>
        <div class = "form-group">
            <label>Marca</label>
            <select name = "marca" class = "form-control" required>
                <?php
                    foreach($marcas as $marca)
                        echo "<option value = '".$marca['id_marca']."'>".$marca['nome_marca']."</option>";            
                ?>
            </select>
        </div>

        <div class = "form-group">
            <label>Adicione categorias à essa bebida</label>
            <select multiple='' name='categorias[]' class='ui fluid normal dropdown' id = 'categorias' required>
                <option value=''>Categorias</option>
                <?php
                    foreach($categorias as $categoria)
                        echo "<option value = '".$categoria['id_categoria']."'>".$categoria['descricao_categoria']."</option>";            
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