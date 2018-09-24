<div>
    <a href = "/beer-ecommerce/bebida/add_bebida"><button class = "btn btn-adicionar"><i class = " icon-espaco fa fa-plus"></i>Adicionar nova bebida</button></a>
</div>


<div class = "filtro-bebidas">
    <p>Filtre o que deseja ver</p>
    <div class = "row row-filtro">
        <div class = "col-md-3"><input class = "form-control" placeholder = "Nome do produto"></div>
        <div class = "col-md-3">
            <select class = "form-control">
                <option>Todos os preços</option>
                <option value = "10">Abaixo de R$ 10,00</option>
                <option value = "25">Abaixo de R$ 25,00</option>
                <option value = "50">Abaixo de R$ 50,00</option>
                <option value = "100">Abaixo de R$ 100,00</option>
                <option value = "200">Abaixo de R$ 200,00</option>
                <option value = "500">Abaixo de R$ 500,00</option>
                <option value = "1000">Abaixo de R$ 1000,00</option>
            </select>
        </div>
        <div class = "col-md-3">
            <select class = "form-control">
                <option>Todos os teores alcoolicos</option>
                <option value = "5">Abaixo de 5%</option>
                <option value = "10">Abaixo de 10%</option>
                <option value = "20">Abaixo de 20%</option>
                <option value = "30">Abaixo de 30%</option>
                <option value = "40">Abaixo de 40%</option>
                <option value = "50">Abaixo de 50%</option>
                <option value = "70">Abaixo de 70%</option>
            </select>
        </div>
        <div class = "col-md-3">
            <select class = "form-control">
                <option>Todos ML's</option>
                <option value = "200">Abaixo de 200ml</option>
                <option value = "300">Abaixo de 300ml</option>
                <option value = "400">Abaixo de 400ml</option>
                <option value = "500">Abaixo de 500ml</option>
                <option value = "700">Abaixo de 700ml</option>
                <option value = "1000">Abaixo de 1000ml</option>
                <option value = "2000">Abaixo de 2000ml</option>
            </select>
        </div>
    </div>

    <div class = "row row-filtro">
        <div class = "col-md-3">   
            <select class = "form-control">
                <option>Todas as marcas</option>
                <option value = "skol">Skol</option>
                <option value = "bud">Budweiser</option>
            </select>
        </div>
        <div class = "col-md-3">   
            <select class = "form-control">
                <option>Qualquer quantidad em estoque</option>
                <option value = "0">Nenhum(a) em estoque</option>
                <option value = "10">Menos que 10 em estoque</option>
                <option value = "20">Menos que 20 em estoque</option>
                <option value = "50">Menos que 50 em estoque</option>
                <option value = "100">Menos que 100 em estoque</option>
                <option value = "200">Menos que 200 em estoque</option>
                <option value = "500">Menos que 500 em estoque</option>
                <option value = "600">Mais que 500 em estoque</option>

            </select>
        </div>
        <div class = "col-md-3">   
            <select class = "form-control">
                <option>Todos tipos</option>
                <option value = "cerveja">Cerveja</option>
                <option value = "vodka">Vodka</option>
                <option value = "whisky">Whisky</option>
                <option value = "cachaca">Cachaça</option>
            </select>
        </div>

        <div class = "col-md-3"><a href = ""><button class = "btn btn-filtrar"><i class = " icon-espaco fa fa-filter"></i>Filtrar</button></a></div>
    </div>
</div>

<div class = "bebidas">

    <table class="table table-bordered">
            
        <thead>
            <tr class = "tr-estilo">
                <th class="text-center">ID</th>
                <th class="text-center">Nome</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Preço</th>
                <th class = "text-center">ML's</th>
                <th class="text-center">Teor alc.</th>
                <th class="text-center">Marca</th>
                <th class="text-center">Em estoque</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class = "text-center">#123</td>
                <td class = "text-center">Caixa Skol Chops</td>
                <td class = "text-center">Cerveja</td>
                <td class = "text-center">R$ 21,20</td>
                <td class = "text-center">349</td>
                <td class = "text-center">4,6%</td>
                <td class = "text-center">Skol</td>
                <td class = "text-center">190</td>
                <td class = "text-center">
                    <button class = "btn btn-sm btn-info"><i class = "fa fa-edit"></i></button>
                </td>
            </tr>

            <tr>
                <td class = "text-center">#113</td>
                <td class = "text-center">Lewandowisk</td>
                <td class = "text-center">Vodka</td>
                <td class = "text-center">R$ 180,00</td>
                <td class = "text-center">1000</td>
                <td class = "text-center">47%</td>
                <td class = "text-center">LWA</td>
                <td class = "text-center">7</td>
                <td class = "text-center">
                    <button class = "btn btn-sm btn-info"><i class = "fa fa-edit"></i></button>
                </td>
            </tr>

            <tr>
                <td class = "text-center">#10</td>
                <td class = "text-center">Cavalo Branco</td>
                <td class = "text-center">Whisky</td>
                <td class = "text-center">R$ 50,20</td>
                <td class = "text-center">965</td>
                <td class = "text-center">45%</td>
                <td class = "text-center">CB</td>
                <td class = "text-center">13</td>
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