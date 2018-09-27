<?= $this->session->flashdata('gravar_dados_bebidas');?>

<div class = "row">
    <div class = "col-md-2">
        <a href = "/beer-ecommerce/bebida/gerenciar_bebidas"><button class = "btn btn-voltar"><i class = " icon-espaco fa fa-chevron-circle-left"></i>Voltar</button></a>
    </div>

    <div class = "col-md-2">
        <button class = "btn btn-auxiliar"><i class = "fa fa-plus icon-espaco"></i>Adicionar ao estoque</button>
    </div>

    <div class = "col-md-2"></div>

    <div class = "col-md-4">
        <h3><?=count($estoque)." ".$bebida['nome_tipo_bebida']?> em estoque</h3>
    </div>
</div>


<div class = "estoque">
    <table class="table table-bordered" id = "tabela-marcas">
        <thead>
            <tr class = "tr-estilo">
                <th class="text-center">ID individual</th>
                <th class="text-center">Nome bebida</th>
                <th class="text-center">Remover</th>
            </tr>
        </thead>
        <tbody>
        <?php
            /* Listando os dados */

            /* listando as marcas */
            foreach($estoque as $dado){
                echo "<tr>";
                echo "<td class = \"text-center\">#".$dado['id_bebida']."</td>";
                echo "<td class = \"text-center\">".$bebida['nome_tipo_bebida']."</td>";

                echo "<td class = \"text-center\">
                    <a href = '/beer-ecommerce/bebida/apagar/estoque/".$dado['id_bebida']."'><button class = \"btn btn-sm btn-danger \"><i class = \"fa fa-trash\"></i></button></a>
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