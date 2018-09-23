<div>
    <a href = "/beer-ecommerce/bebida/gerenciar_bebidas"><button class = "btn btn-voltar"><i class = " icon-espaco fa fa-chevron-circle-left"></i>Voltar</button></a>
</div>


<div class = "form-add-bebidas">

    <form>
        <div class = "form-group">
            <label>Nome da bebida</label>
            <input class = "form-control" placeholder = "Esse será o nome que aparecerá para os clientes" required>
        </div>
        <div class = "form-group">
            <label>Quantidade de Ml's</label>
            <input type = 'number' class = "form-control" placeholder = "Essa será a quantidade de Ml's do produto" required>
        </div>
        
        <div class = "form-group">
            <label>Preço unitário</label>
            <input type = 'number' class = "form-control" placeholder = "Esse será o preço que será cobrado" required>
        </div>
        <div class = "form-group">
            <label>Teor alcoolico</label>
            <input type = 'number' class = "form-control" placeholder = "Esse será o teor alcoolico que aparecerá para os clientes" required>
        </div>
        <div class = "form-group">
            <label>Tipo de bebida</label>
            <select  class = "form-control" required>
                <option>Cerveja</option>
                <option>Whisky</option>
                <option>Vodka</option>
                <option>Cachaça</option>
            </select>
        </div>
        <div class = "form-group">
            <label>Marca</label>
            <select class = "form-control" required>
                <option>Skol</option>
                <option>Bhrama</option>
                <option>LW</option>
            </select>
        </div>

        <div class = "form-group">
            <label>Descrição</label>
            <textarea type = 'number' class = "form-control" placeholder = "Essa será a descrição que aparecerá para os clientes" required rows= '15'></textarea>
        </div>

        <div class = "form-group">
            <label>Selecione as 4 imagens que serão apresentadas junto com o produto</label>
            <input type = 'file' class = "form-control" placeholder = "" required>
            <input type = 'file' class = "form-control" placeholder = "" required>
            <input type = 'file' class = "form-control" placeholder = "" required>
            <input type = 'file' class = "form-control" placeholder = "" required>
        </div>

        <div class = "center">
            <button type = "submit" class = "btn btn-adicionar">Gravar</button>
        </div>
    </form>

</div>

</div>

</div>
</div>
</body>

</html>