<?= $this->session->flashdata('gravar_dados_fornecedores');?>
<div>
   <a href = "/beer-ecommerce/dash/fornecedor/add"><button class = "btn btn-adicionar"><i class = " icon-espaco fa fa-plus"></i>Adicionar novo fornecedor</button></a>
</div>



<div class = "filtro-bebidas">
    <p>Filtre o que deseja ver</p>
    <div class = "row row-filtro">
        <div class = "col-md-8"><input id = "filtro-marca" class = "form-control" placeholder = "Pesquise o nome ou ID do fornecedor"></div>
    </div>
</div>

<div class = "bebidas">

    <table class="table table-bordered" id = "tabela-fornecedores">
            
        <thead>
            <tr class = "tr-estilo">
                <th class="text-center">ID</th>
                <th class="text-center">Nome do fornecedor</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            /* listando os dados */
            foreach($fornecedores as $fornecedor){
                echo "<tr>";
                    echo "<td class = 'text-center'>#".$fornecedor['id_fornecedor']."</td>";
                    echo "<td class = 'text-center'>".$fornecedor['nome_fornecedor']."</td>";
                    echo "
                    <td class = 'text-center'>
                        <a href = '/beer-ecommerce/dash/fornecedor/editar/".$fornecedor['id_fornecedor']."'><button class = 'btn btn-sm btn-info'><i class = 'fa fa-edit'></i></button></a>
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