<?= $this->session->flashdata('gravar_dados_bebidas');?>

<div class = "row">
    <div class = "col-md-2">
        <a href = "/beer-ecommerce/dash/fornecedor/"><button class = "btn btn-voltar"><i class = " icon-espaco fa fa-chevron-circle-left"></i>Voltar</button></a>
    </div>

    <div class = "col-md-8">
       <h2>Editar fornecedor</h2>
    </div>
</div>


<div class = "editar-fornecedor">

<?= form_open_multipart('dash/fornecedor/gravar') ?>
    <input type = 'hidden' name = 'id_fornecedor' value = '<?= $fornecedor[0]['id_fornecedor'] ?>'>
    <input type = 'hidden' name = 'id_contato' value = '<?= $fornecedor[0]['id_contato'] ?>'>
    <input type = 'hidden' name = 'id_endereco' value = '<?= $fornecedor[0]['id_endereco'] ?>'>
    <input type = 'hidden' name = 'tipo' value = 'editar'>
    <div class = "row">
        <div class = "form-group col-md-4">
            <label>Nome do fornecedor</label>
            <input value = '<?= $fornecedor[0]['nome_fornecedor'] ?>' name = "nome_fornecedor" class = "form-control" placeholder = "Esse será o nome do fornecedor" required>
        </div>
        <div class = "form-group col-md-4">
            <label>CNPJ do fornecedor</label>
            <input value = '<?= $fornecedor[0]['cnpj_fornecedor'] ?>' name = "cnpj_fornecedor" class = "form-control" placeholder = "Essa será o CNPJ do fornecedor" required>
        </div>
        <div class = "form-group col-md-4">
            <label>E-mail do fornecedor</label>
            <input value = '<?= $fornecedor[0]['email_fornecedor'] ?>' name = "email_fornecedor" type = 'email' class = "form-control" placeholder = "Esse será o e-mail do fornecedor" required>
        </div>
    </div>

    <div class = "row">
        <div class = "form-group col-md-6">
            <label>Telefone fixo</label>
            <input value = '<?= $fornecedor[0]['numero_telefone'] ?>' name = "numero_telefone" class = "form-control" placeholder = "Esse será o telefone fixo do fornecedor" required>
        </div>
        <div class = "form-group col-md-6">
            <label>Telefone celular</label>
            <input value = '<?= $fornecedor[0]['numero_celular'] ?>' name = "numero_celular" class = "form-control" placeholder = "Esse será o telefone celular do fornecedor" required>
        </div>    
    </div>

    <div class = "row">
        <div class = "form-group col-md-4">
            <label>CEP</label>
            <input value = '<?= $fornecedor[0]['cep'] ?>' id = 'cep' name = "cep" class = "form-control" placeholder = "Esse será o CEP do fornecedor" required>
        </div>
        <div class = "form-group col-md-4">
            <label>Rua</label>
            <input value = '<?= $fornecedor[0]['rua'] ?>' id = 'rua' name = "rua" class = "form-control" placeholder = "Esse será a rua do fornecedor" required>
        </div>
        <div class = "form-group col-md-4">
            <label>Bairro</label>
            <input value = '<?= $fornecedor[0]['bairro'] ?>' id = 'bairro' name = "bairro" class = "form-control" placeholder = "Esse será o bairro do fornecedor" required>
        </div>    
    </div>

    <div class = "row">
        <div class = "form-group col-md-4">
            <label>Cidade</label>
            <input value = '<?= $fornecedor[0]['cidade'] ?>' id = 'cidade' name = "cidade" class = "form-control" placeholder = "Esse será a cidade do fornecedor" required>
        </div>
        <div class = "form-group col-md-4">
            <label>UF</label>
            <input value = '<?= $fornecedor[0]['uf'] ?>' id = 'uf' name = "uf" class = "form-control" placeholder = "Esse será a unidade federativa do fornecedor" required>
        </div>
        
        <div class = "form-group col-md-4">
            <label>Número</label>
            <input value = '<?= $fornecedor[0]['numero_endereco'] ?>' name = "numero_endereco" class = "form-control" placeholder = "Esse será o número do endereço do fornecedor" required>
        </div>    
    
    </div>

    <div class = "form-group">
        <label>Complemento</label>
        <textarea name = "complemento" class = "form-control"><?= $fornecedor[0]['complemento'] ?></textarea>
    </div>

    <div class = "center">
        <button type = "submit" class = "btn btn-adicionar">Atualizar</button>
    </div>

<?= form_close() ?>

</div>


</div>

</div>
</div>
</body>

</html>