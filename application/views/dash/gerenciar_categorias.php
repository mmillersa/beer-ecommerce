<?= $this->session->flashdata('gravar_dados_bebidas');?>

<div>
   <button data-toggle = "collapse" data-target = "#add-categoria" class = "btn btn-adicionar"><i class = " icon-espaco fa fa-plus"></i>Adicionar nova categoria</button>
</div>

<div class = "collapse" id = "add-categoria">
    <form method = "POST" action = "/beer-ecommerce/bebida/gravar">
        <input type = "hidden" name= "tipo" value = "categoria">
        <div class = "row add-marca-div">
            <div class = "col-md-4">
                <label>Nome da categoria</label>
                <input name = "nome-categoria" type = "text" placeholder = "Informe o nome da categoria" class = "form-control" required>
            </div>

            <div class = "col-md-4">
                <label>Onde a categoria poderá ser aplicada</label>
                <select multiple='' name='bebidas[]' class='ui fluid normal dropdown' id = 'bebidas' required>
                    <option value = "whisky">Whisky's</option>
                    <option value = "cerveja">Cervejas</option>
                    <option value = "cachaca">Cachaças</option>
                    <option value = "vodka">Vodkas</option>
                </select>
            </div>

            <div class = "col-md-3">
                <label>Clique em gravar para confirmar</label>
                <input type = "submit" class = "btn btn-adicionar form-control" value = "Gravar">
            </div>
        </div>
    </form>
</div>



<div class = "filtro-bebidas">
    <p>Filtre o que deseja ver</p>
    <div class = "row row-filtro">
        <div class = "col-md-8"><input id = "filtro-categoria" class = "form-control" placeholder = "Pesquise por ID, nome ou onde é aplicada"></div>
    </div>
</div>


<div class = "bebidas">
    <table class="table table-bordered" id = "tabela-categorias">
        <thead>
            <tr class = "tr-estilo">
                <th class="text-center">Nome da categoria</th>
                <th class = "text-center">Aplicada em</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>

        <?php
        /* Listando os dados */

            /* listando as categorias de cerveja */
            foreach($dados['cervejas'] as $cerveja){
                echo "<tr>";
                echo "<td class = \"text-center\">".$cerveja['categoria_cerveja']."</td>";
                echo "<td class = \"text-center\">Cervejas</td>";

                echo "<td class = \"text-center\">
                    <button tipo = 'cerveja' nome-categoria =".str_replace(" ", "_", $cerveja['categoria_cerveja'])." id-categoria =".$cerveja['id_categoria_cerveja']." class = \"btn btn-sm btn-info editar-categoria\"><i class = \"fa fa-edit\"></i></button>
                </td>";
                echo "</tr>";
            }
            /* listando as categorias de whisky */
            foreach($dados['whiskys'] as $whisky){
                echo "<tr>";
                echo "<td class = \"text-center\">".$whisky['categoria_whisky']."</td>";
                echo "<td class = \"text-center\">Whiskys</td>";

                echo "<td class = \"text-center\">
                    <button tipo = 'whisky' nome-categoria =".str_replace(" ", "_", $whisky['categoria_whisky'])." id-categoria =".$whisky['id_categoria_whisky']." class = \"btn btn-sm btn-info editar-categoria\"><i class = \"fa fa-edit\"></i></button>
                </td>";
                echo "</tr>";
            }

            /* listando as categorias de vodka */
            foreach($dados['vodkas'] as $vodka){
                echo "<tr>";
                echo "<td class = \"text-center\">".$vodka['categoria_vodka']."</td>";
                echo "<td class = \"text-center\">Vodkas</td>";

                echo "<td class = \"text-center\">
                    <button tipo = 'vodka' nome-categoria =".str_replace(" ", "_", $vodka['categoria_vodka'])." id-categoria =".$vodka['id_categoria_vodka']." class = \"btn btn-sm btn-info editar-categoria\"><i class = \"fa fa-edit\"></i></button>
                </td>";
                echo "</tr>";
            }

            /* listando as categorias de cachaças */
            foreach($dados['cachacas'] as $cachaca){
                echo "<tr>";
                echo "<td class = \"text-center\">".$cachaca['categoria_cachaca']."</td>";
                echo "<td class = \"text-center\">Cachaças</td>";

                echo "<td class = \"text-center\">
                    <button tipo = 'cachaca' nome-categoria =".str_replace(" ", "_", $cachaca['categoria_cachaca'])." id-categoria =".$cachaca['id_categoria_cachaca']." class = \"btn btn-sm btn-info editar-categoria\"><i class = \"fa fa-edit\"></i></button>
                </td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>

</div>


</div>

</div>
</div>
</body>

</html>