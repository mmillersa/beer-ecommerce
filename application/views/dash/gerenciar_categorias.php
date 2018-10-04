<?= $this->session->flashdata('gravar_dados_bebidas');?>

<div>
   <button data-toggle = "collapse" data-target = "#add-categoria" class = "btn btn-adicionar"><i class = " icon-espaco fa fa-plus"></i>Adicionar nova categoria</button>
</div>

<div class = "collapse" id = "add-categoria">
    <form method = "POST" action = "/beer-ecommerce/dash/bebida/gravar">
        <input type = "hidden" name= "tipo" value = "categoria">
        <div class = "row add-marca-div">
            <div class = "col-md-4">
                <label>Nome da categoria</label>
                <input name = "nome-categoria" type = "text" placeholder = "Informe o nome da categoria" class = "form-control" required>
            </div>

            <div class = "col-md-5">
                <label>Clique em gravar para confirmar</label>
                <input type = "submit" class = "btn btn-adicionar form-control" value = "Gravar">
            </div>
        </div>
    </form>
</div>



<div class = "filtro-bebidas">
    <p>Filtre o que deseja ver</p>
    <div class = "row row-filtro">
        <div class = "col-md-8"><input id = "filtro-categoria" class = "form-control" placeholder = "Pesquise por nome ou onde é aplicada"></div>
    </div>
</div>


<div class = "bebidas">
    <table class="table table-bordered" id = "tabela-categorias">
        <thead>
            <tr class = "tr-estilo">
                <th class="text-center">ID da categoria</th>
                <th class = "text-center">Nome categoria</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>

        <?php
            /* Listando os dados */

            /* listando as categorias */
            foreach($dados as $dado){
                echo "<tr>";
                echo "<td class = \"text-center\">#".$dado['id_categoria']."</td>";
                echo "<td class = \"text-center\">".$dado['descricao_categoria']."</td>";

                echo "<td class = \"text-center\">
                    <button nome-categoria =".str_replace(" ", "_", $dado['descricao_categoria'])." id-categoria =".$dado['id_categoria']." class = \"btn btn-sm btn-info editar-categoria\"><i class = \"fa fa-edit\"></i></button>
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