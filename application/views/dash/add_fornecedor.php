<?= $this->session->flashdata('gravar_dados_fornecedores');?>

<div class = "row">
    <div class = "col-md-2">
        <a href = "/beer-ecommerce/dash/fornecedor/"><button class = "btn btn-voltar"><i class = " icon-espaco fa fa-chevron-circle-left"></i>Voltar</button></a>
    </div>

    <div class = "col-md-8">
        <h1>Adicionar novo fornecedor</h1>
    </div>
</div>

<div class = "form-add-bebidas">

    <?= form_open_multipart('dash/fornecedor/gravar') ?>
    
        <div class = "row">
            <div class = "form-group col-md-4">
                <label>Nome do fornecedor</label>
                <input name = "nome_fornecedor" class = "form-control" placeholder = "Esse será o nome do fornecedor" required>
            </div>
            <div class = "form-group col-md-4">
                <label>CNPJ do fornecedor</label>
                <input name = "cnpj_fornecedor" class = "form-control" placeholder = "Essa será o CNPJ do fornecedor" required>
            </div>
            <div class = "form-group col-md-4">
                <label>E-mail do fornecedor</label>
                <input name = "email_fornecedor" type = 'email' class = "form-control" placeholder = "Esse será o e-mail do fornecedor" required>
            </div>
        </div>

        <div class = "row">
            <div class = "form-group col-md-6">
                <label>Telefone fixo</label>
                <input name = "numero_telefone" class = "form-control" placeholder = "Esse será o telefone fixo do fornecedor" required>
            </div>
            <div class = "form-group col-md-6">
                <label>Telefone celular</label>
                <input name = "numero_celular" class = "form-control" placeholder = "Esse será o telefone celular do fornecedor" required>
            </div>    
        </div>

        <div class = "row">
            <div class = "form-group col-md-4">
                <label>CEP</label>
                <input id = 'cep' name = "cep" class = "form-control" placeholder = "Esse será o CEP do fornecedor" required>
            </div>
            <div class = "form-group col-md-4">
                <label>Rua</label>
                <input id = 'rua' name = "rua" class = "form-control" placeholder = "Esse será a rua do fornecedor" required>
            </div>
            <div class = "form-group col-md-4">
                <label>Bairro</label>
                <input id = 'bairro' name = "bairro" class = "form-control" placeholder = "Esse será o bairro do fornecedor" required>
            </div>    
        </div>

        <div class = "row">
            <div class = "form-group col-md-4">
                <label>Cidade</label>
                <input id = 'cidade' name = "cidade" class = "form-control" placeholder = "Esse será a cidade do fornecedor" required>
            </div>
            <div class = "form-group col-md-4">
                <label>UF</label>
                <input id = 'uf' name = "uf" class = "form-control" placeholder = "Esse será a unidade federativa do fornecedor" required>
            </div>
            
            <div class = "form-group col-md-4">
                <label>Número</label>
                <input name = "numero_endereco" class = "form-control" placeholder = "Esse será o número do endereço do fornecedor" required>
            </div>    
        
        </div>

        <div class = "form-group">
            <label>Complemento</label>
            <textarea name = "complemento" class = "form-control"></textarea>
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