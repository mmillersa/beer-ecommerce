
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

    /* Função para abrir o modal da página de categorias dinâmicamente */
    $(".editar-categoria").click(function(){

        /* pegando id e nome da categoria */
        var id = $(this).attr("id-categoria");
        var nome = $(this).attr("value");
        var tipo = $(this).attr("tipo");

        var modal = "<div id = "+nome+tipo+id+" class= 'modal fade' tabindex='-1' role='dialog' data-backdrop = 'static'>"+
                        "<div class='modal-dialog' role='document'>"+
                            "<div class='modal-content'>"+
                                "<div class='modal-header'>"+
                                    "<h5 class='modal-title'>Editar categoria "+nome+"</h5>"+
                                    "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"+
                                    "<span aria-hidden='true'>&times;</span>"+
                                    "</button>"+
                                "</div>"+
                                "<div class='modal-body'>"+
                                    "<label>Nome da categoria</label>"+
                                    "<input name = 'nome-categoria' value = '"+nome+"' class = 'form-control'"+
                                "</div>"+
                                "<div class='modal-footer'>"+
                                
                                    "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>"+
                                    "<button type='button' class='btn btn-danger' data-dismiss='modal'>Apagar categoria</button>"+
                                    "<button type='button' class='btn btn-primary'>Atualizar</button>"
                                "</div>"+
                            "</div>"+
                        "</div>"+
                    "</div>"

        $("body").append(modal);

        $("#"+nome+tipo+id).modal("show");

    })

}); 
