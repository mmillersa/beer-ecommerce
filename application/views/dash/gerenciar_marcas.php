<div>
   <button data-toggle = "collapse" data-target = "#add-marca" class = "btn btn-adicionar"><i class = " icon-espaco fa fa-plus"></i>Adicionar nova marca</button>
</div>

<div class = "collapse" id = "add-marca">
    <form>
        <div class = "row add-marca-div">
            <div class = "col-md-5">
                <input type = "text" placeholder = "Informe o nome da marca" class = "form-control">
            </div>

            <div class = "col-md-5">
                <button type = "submit" class = "btn btn-adicionar"><i class = " icon-espaco fa fa-plus"></i>Gravar</button>
            </div>
        </div>
    </form>
</div>


<div class = "filtro-bebidas">
    <p>Filtre o que deseja ver</p>
    <div class = "row row-filtro">
        <div class = "col-md-8"><input class = "form-control" placeholder = "Nome da marca"></div>

        <div class = "col-md-4"><a href = ""><button class = "btn btn-filtrar"><i class = " icon-espaco fa fa-filter"></i>Filtrar</button></a></div>
    </div>
</div>

<div class = "bebidas">

    <table class="table table-bordered">
            
        <thead>
            <tr class = "tr-estilo">
                <th class="text-center">ID</th>
                <th class="text-center">Nome da marca</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class = "text-center">#120</td>
                <td class = "text-center">C&B</td>
                <td class = "text-center">
                    <button class = "btn btn-sm btn-info"><i class = "fa fa-edit"></i></button>
                </td>
            </tr>

            <tr>
                <td class = "text-center">#113</td>
                <td class = "text-center">Lewandowisk</td>
                <td class = "text-center">
                    <button class = "btn btn-sm btn-info"><i class = "fa fa-edit"></i></button>
                </td>
            </tr>

            <tr>
                <td class = "text-center">#10</td>
                <td class = "text-center">Cavalo Branco</td>
                <td class = "text-center">
                    <a href = "/beer-ecommerce/bebida/gerenciar_bebidas/editar/1"><button class = "btn btn-sm btn-info"><i class = "fa fa-edit"></i></button></a>
                </td>
            </tr>
        </tbody>
    </table>

    </table>

</div>


</div>

</div>
</div>
</body>

</html>