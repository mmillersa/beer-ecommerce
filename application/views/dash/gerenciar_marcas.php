<?= $this->session->flashdata('gravar_dados_bebidas');?>

<div>
   <button data-toggle = "collapse" data-target = "#add-marca" class = "btn btn-adicionar"><i class = " icon-espaco fa fa-plus"></i>Adicionar nova marca</button>
</div>

<div class = "collapse" id = "add-marca">
    <form method = 'POST' action = '/beer-ecommerce/bebida/gravar'>
        <div class = "row add-marca-div">
            <div class = "col-md-5">
                <input name = 'nome-marca' type = "text" placeholder = "Informe o nome da marca" class = "form-control">
                <input type = 'hidden' name = 'tipo' value = 'marca'>
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
        <div class = "col-md-8"><input id = "filtro-marca" class = "form-control" placeholder = "Pesquise o nome ou ID da marca"></div>
    </div>
</div>

<div class = "bebidas">

    <table class="table table-bordered" id = "tabela-marcas">
            
        <thead>
            <tr class = "tr-estilo">
                <th class="text-center">ID</th>
                <th class="text-center">Nome da marca</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php
            /* Listando os dados */

            /* listando as marcas */
            foreach($dados as $dado){
                echo "<tr>";
                echo "<td class = \"text-center\">#".$dado['id_marca']."</td>";
                echo "<td class = \"text-center\">".$dado['nome_marca']."</td>";

                echo "<td class = \"text-center\">
                    <button nome-marca =".str_replace(" ", "_", $dado['nome_marca'])." id-marca =".$dado['id_marca']." class = \"btn btn-sm btn-info editar-marca\"><i class = \"fa fa-edit\"></i></button>
                </td>";
                echo "</tr>";
            }

        ?>
        </tbody>
    </table>

    </table>

</div>


</div>

</div>
</div>
</body>

</html>