
/* Arquivo responsável por controlar os components front-end utilizando jQuery */
$(document).ready(function(){

    /* iniciando o dropdown */
    $(".dropdown").dropdown();

    /* efeitos do menu retrátil */
    $("#icone").click(function(){
        if($("#conteudo-nav").hasClass("hidden")){
            $("#side-bar").removeClass("col-md-1");
            $("#side-bar").addClass("col-md-4");
            $("#conteudo-nav").removeClass("hidden");
            $("#conteudo").removeClass("col-md-11");
            $("#conteudo").addClass("col-md-8");
            $("#icone").addClass("rotate");
            $("#logo").removeClass("hidden");
        }else{
            $("#side-bar").removeClass("col-md-4");
            $("#side-bar").addClass("col-md-1");
            $("#conteudo-nav").addClass("hidden");
            $("#conteudo").removeClass("col-md-8");
            $("#conteudo").addClass("col-md-11");
            $("#icone").removeClass("rotate");
            $("#logo").addClass("hidden");
        }
    })

    /* Função quick search da página de categorias */
    $('input#filtro-categoria').quicksearch('table#tabela-categorias tbody tr');

    /* Função do quick search da página de marcas */
    $('input#filtro-marca').quicksearch('table#tabela-marcas tbody tr');

    /* Função do quick search da página de fornecedores */
    $('input#filtro-fornecedor').quicksearch('table#tabela-fornecedores tbody tr');

    /* Funções do quick search da página de bebidas */
    $('input#filtro-nome').quicksearch('table#tabela-bebidas tbody tr', {
        selector: ".td-nome"
    })

    /* Função para abrir o modal da página de categorias dinâmicamente */
    $(".editar-categoria").click(function(){

        /* pegando id e nome da categoria */
        var id = $(this).attr("id-categoria");
        var nome = $(this).attr("nome-categoria").replace(/_/g, " ");
        var nome_id = $(this).attr("nome-categoria");

        var modal = "<div id = "+nome_id+id+" class= 'modal fade' tabindex='-1' role='dialog' data-backdrop = 'static'>"+
                        "<div class='modal-dialog' role='document'>"+
                            "<div class='modal-content'>"+
                                "<div class='modal-header'>"+
                                    "<h5 class='modal-title'>Editar categoria "+nome+"</h5>"+
                                    "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"+
                                    "<span aria-hidden='true'>&times;</span>"+
                                    "</button>"+
                                "</div>"+
                                "<form method = 'POST' action = '/beer-ecommerce/dash/bebida/atualizar'>"+
                                    "<div class='modal-body'>"+
                                        "<label>Nome da categoria</label>"+
                                        "<input name = 'nome-categoria' value = '"+nome+"' class = 'form-control'>"+
                                        "<input type = 'hidden' name = 'id-categoria' value = '"+id+"'>"+
                                        "<input type = 'hidden' name = 'tipo' value = 'categoria'>"+
                                    "</div>"+
                                    "<div class='modal-footer'>"+
                                    
                                        "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar janela</button>"+
                                        "<a class='btn btn-danger' href = '/beer-ecommerce/dash/bebida/apagar/categoria/"+id+"'"+">Apagar categoria</a>"+
                                        "<button type='submit' class='btn btn-primary'>Atualizar</button>"
                                    "</div>"+
                                "</form>"+
                            "</div>"+
                        "</div>"+
                    "</div>"

        /* adicionando modal ao body e abrindo-o */ 
        $("body").append(modal);
        $("#"+nome_id+id).modal("show");

    })

    /* Função para abrir o modal da página de marcas dinâmicamente */
    $(".editar-marca").click(function(){
        
        /* pegando id e nome da marca */
        var id = $(this).attr("id-marca");
        var nome = $(this).attr("nome-marca").replace(/_/g, " ");
        var nome_id = $(this).attr("nome-marca");
        

        var modal = "<div id = "+nome_id+id+" class= 'modal fade' tabindex='-1' role='dialog' data-backdrop = 'static'>"+
                        "<div class='modal-dialog' role='document'>"+
                            "<div class='modal-content'>"+
                                "<div class='modal-header'>"+
                                    "<h5 class='modal-title'>Editar marca "+nome+"</h5>"+
                                    "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"+
                                    "<span aria-hidden='true'>&times;</span>"+
                                    "</button>"+
                                "</div>"+
                                "<form method = 'POST' action = '/beer-ecommerce/dash/bebida/atualizar'>"+
                                    "<div class='modal-body'>"+
                                        "<label>Nome da marca</label>"+
                                        "<input name = 'nome-marca' value = '"+nome+"' class = 'form-control'>"+
                                        "<input type = 'hidden' name = 'id-marca' value = '"+id+"'>"+
                                        "<input type = 'hidden' name = 'tipo' value = 'marca'>"+
                                    "</div>"+
                                    "<div class='modal-footer'>"+
                                    
                                        "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar janela</button>"+
                                        "<a class='btn btn-danger' href = '/beer-ecommerce/dash/bebida/apagar/marca/"+id+"'"+">Apagar marca</a>"+
                                        "<button type='submit' class='btn btn-primary'>Atualizar</button>"
                                    "</div>"+
                                "</form>"+
                            "</div>"+
                        "</div>"+
                    "</div>"

        /* adicionando modal ao body e abrindo-o */ 
        $("body").append(modal);
        $("#"+nome_id+id).modal("show");

    })



    /* Função para controlar o click do botão de toggle do status de uma bebida */
    $(".toggle-status-bebida").change(function(){

        /* recebendo os dados */
        const id = $(this).attr("id-bebida");
        const status = $(this).attr("status");        
        /* Chamando função a partir do AJAX */
        $.ajax({
            url: '/beer-ecommerce/dash/bebida/attStatus/',
            method: 'post',
            data: { id, status }
        })
    })

    /* Função para controlar o click do botão de toggle do status de uma promoção */
    $(".toggle-status-promocao").change(function(){

        /* recebendo os dados */
        const id = $(this).attr("id-promocao");
        const status = $(this).attr("status");        
        /* Chamando função a partir do AJAX */
        $.ajax({
            url: '/beer-ecommerce/dash/promocao/attStatus/',
            method: 'post',
            data: { id, status }
        })
    })

    /* função para controlar o auto-complete de endereço */
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                    }
                })
            }
        }
    })
               

}); 
