
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
    /* /efeitos do menu retrátil */


    /* controlando collapse página alertar */

    $("#check-email-pessoal").click( function(){
        if( $(this).is(':checked')) $(".meu-email").collapse("show");
        else $(".meu-email").collapse("hide")
    });

    $("#check-email-sistema").click( function(){
        if( $(this).is(':checked')) $(".meu-email").collapse("hide");
        else $(".meu-email").collapse("show")
    });


    /* / controlando collapse página alertar */

    /* efeito collapse data de treinamento (novo treinamento) */

    $("#check-treino").click( function(){
        if( $(this).is(':checked')) $(".data-treinamento").collapse("show");
        else $(".data-treinamento").collapse("hide")
    });

    $("#check-ver-treinamento").click( function(){
        if( $(this).is(':checked')) $(".data-treinamento-ver-treinamento").collapse("show");
        else $(".data-treinamento-ver-treinamento").collapse("hide")
    });

    $("#check-ver-treinamento2").click( function(){
        if( $(this).is(':checked')) $(".data-treinamento-ver-treinamento").collapse("hide");
        else $(".data-treinamento-ver-treinamento").collapse("show")
    });

    /* /efeito collapse data de treinamento (novo treinamento) */


    /* botoões toggle ativar/desativar categoria */

    $(".toggle-categoria").change(function(){
        var id = $(this).attr("id")[1];
        var status = $(this).attr("status") == 1 ? 0 : 1;
        
        $.ajax({
            url: '../backend/update_delete.class.php',
            method: 'post',
            data: { tipo: 'status_categoria', id, status }
        })
    })
    
    /* /botoões toggle ativar/desativar categoria */

    /* botoões toggle ativar/desativar unidade */

    $(".toggle-unidade").change(function(){
        var id = $(this).attr("id")[1];
        var status = $(this).attr("status") == 1 ? 0 : 1;
        
        $.ajax({
            url: '../backend/update_delete.class.php',
            method: 'post',
            data: { tipo: 'status_unidade', id, status }
        })
    })
    
    /* /botoões toggle ativar/desativar unidade */

    /* botoões toggle ativar/desativar setor */

    $(".toggle-setor").change(function(){
        var id = $(this).attr("id")[1];
        var status = $(this).attr("status") == 1 ? 0 : 1;
        
        $.ajax({
            url: '../backend/update_delete.class.php',
            method: 'post',
            data: { tipo: 'status_setor', id, status }
        })
    })
    
    /* /botoões toggle ativar/desativar setor */


    /* controlando collapses da página de configurações */

    $("#btn-collapse-unidades").click(function(){


        if($("#collapse-setores").hasClass('show') || $("#collapse-categorias").hasClass('show') ){

            $('#collapse-setores').collapse('hide');
            $('#collapse-categorias').collapse('hide');
            $('#collapse-unidades').collapse('show');

        }else{
            if($('#collapse-unidades').hasClass('show')){
                $('#collapse-unidades').collapse('hide');
            }else{
                $('#collapse-unidades').collapse('show');
            }      
        }
    })


    $("#btn-collapse-categorias").click(function(){

        if($("#collapse-unidades").hasClass('show') || $("#collapse-setores").hasClass('show')){
            
            $('#collapse-unidades').collapse('hide');
            $('#collapse-setores').collapse('hide');
            $('#collapse-categorias').collapse('show');

        }else{
            if($('#collapse-categorias').hasClass('show')){
                $('#collapse-categorias').collapse('hide');
            }else{
                $('#collapse-categorias').collapse('show');
            }      
        }
    })

    $("#btn-collapse-setores").click(function(){

        if($("#collapse-unidades").hasClass('show') || $("#collapse-categorias").hasClass('show')){
            
            $('#collapse-unidades').collapse('hide');
            $('#collapse-categorias').collapse('hide');
            $('#collapse-setores').collapse('show');

        }else{
            if($('#collapse-setores').hasClass('show')){
                $('#collapse-setores').collapse('hide');
            }else{
                $('#collapse-setores').collapse('show');
            }      
        }
    })


    /* /controlando collapses da página de configurações */

    /* controlando collapses da página de gerenciamento de mídias */
    
    $("#btn-collapse-imagens").click(function(){


        if($("#collapse-videos").hasClass('show') || $("#collapse-pdfs").hasClass('show') ){
            
            $('#collapse-videos').collapse('hide');
            $('#collapse-pdfs').collapse('hide');
            $('#collapse-imagens').collapse('show');

        }else{
            if($('#collapse-imagens').hasClass('show')){
                $('#collapse-imagens').collapse('hide');
            }else{
                $('#collapse-imagens').collapse('show');
            }      
        }
    })


    $("#btn-collapse-videos").click(function(){

        if($("#collapse-imagens").hasClass('show') || $("#collapse-pdfs").hasClass('show')){
            
            $('#collapse-imagens').collapse('hide');
            $('#collapse-pdfs').collapse('hide');
            $('#collapse-videos').collapse('show');

        }else{
            if($('#collapse-videos').hasClass('show')){
                $('#collapse-videos').collapse('hide');
            }else{
                $('#collapse-videos').collapse('show');
            }      
        }
    })

    $("#btn-collapse-pdfs").click(function(){

        if($("#collapse-videos").hasClass('show') || $("#collapse-imagens").hasClass('show')){
            
            $('#collapse-imagens').collapse('hide');
            $('#collapse-videos').collapse('hide');
            $('#collapse-pdfs').collapse('show');

        }else{
            if($('#collapse-pdfs').hasClass('show')){
                $('#collapse-pdfs').collapse('hide');
            }else{
                $('#collapse-pdfs').collapse('show');
            }      
        }
    })

    /* /controlando collapses da página de gerenciamento de mídias */

    /* controlando o textarea */

    $(".can-selected").click(function(){

        /* verify whick command will be executed */
        var command = $(this).attr("id");

        /* verify if selected class exists */
        if ($(this).hasClass("selected")) {
            document.execCommand(command, false, true);
            $(this).removeClass("selected");
        }else{
            document.execCommand(command, false, true);
            $(this).addClass("selected");
        }
    })

    $(".font").click(function(){
        
        /* verify the font size */
        var size = $(this).attr("id");

        if ($(this).hasClass("selected")) {
            document.execCommand("fontSize", false, 3);
            $(this).removeClass("selected");
        }else{
            document.execCommand("fontSize", false, size);
            $(this).addClass("selected");
            
            $(".panel").children().each(function(index, value){
                if($(this).hasClass("font") && $(this).attr("id") != size){
                    $(this).removeClass("selected");
                }
            })
        }
    })

    $(".align").click(function(){
        
        /* verify the command */
        var command = $(this).attr("id");

        if ($(this).hasClass("selected")) {
            document.execCommand(command, false, true);
            $(this).removeClass("selected");
        }else{
            document.execCommand(command, false, true);
            $(this).addClass("selected");
            
            $(".panel").children().each(function(index, value){
                if($(this).hasClass("align") && $(this).attr("id") != command){
                    $(this).removeClass("selected");
                }
            })
        }

    })

    /* inserir imagem em um textarea */
    $(document).on("click", ".file-preview-image", function () {
        /* selecionando a imagem */
        var src = $(this).attr("src");
        $("#textarea").append("<br><image class = 'file-textarea' src = '"+src+"'></img><br>");
  
    });

    /* inserir um vídeo em um textarea */
    $(document).on("click", ".demo", function () {
        /* selecionando o vídeo */
        var src = $(this).attr("src");
        $("#textarea").append("<br><center><video class = 'file-textarea' controls src = '"+src+"'><source type = 'video/mp4' src ='"+src+"'></source></video></center><br>");
    
    });

    /* inserir um pdf em um textarea */
    $(document).on("click", ".file-preview-frame", function () {
        /*selecionando o pdf */
        var id = $(this).attr("id");
        var elem = $("#"+id).find(".pdf");
        if(elem.length){
            var src = $(this).find("object").attr("data");
            $("#textarea").append("<center><a class = 'href-pdf' href = '"+src+"'>Ver PDF em tela cheia</a></center>");
            $("#textarea").append("<center><object data='" +src+ "' type='application/pdf' width='70%' height='400px'></object></center><br>");
        }
    
    });


    /* /controlando o textarea */
    
    /* controlando formulários de criar novo treinamento */

    $("#enviar-form").click(function(){

        var titulo_treinamento = $("#titulo-treinamento").val();
        var pessoas = $("#pessoas").val();
        var setor = $("#setor").val();
        var categoria = $("#categoria").val();
        var data_final = $("#data_final").val();
        var descricao = $("#textarea").html();
        var senha = $("#senha_treinamento").val();

        $.ajax({
            url: "../backend/insert.class.php",
            method: 'post',
            data: {tipo: "novo_treinamento", titulo_treinamento, pessoas, setor, categoria,
                  data_final, descricao, senha},
            success: function(data){
                window.location= data;
            }
        })
    })

    $("#ver-previa").click(function(){
        var descricao = $("#textarea").html();
        /* adicionando na sessão */
        $.ajax({
            url: "../backend/previa_sessao.php",
            method: 'post',
            data: {conteudo: descricao},
            success: function(){
                window.open(
                    "../components/home.php?page=previa",
                    '_blank'
                );
            }
        })
    
    })

    /* / controlando formulários de criar novo treinamento */

    /* controle de redirecionamento para página do treinamento */

    $(".ver-detalhes-treinamento").click(function(){
        var id = $(this).attr("id");
        window.location = "../components/home.php?page=ver_treinamento&id="+id;
    })

    $(".verificar-senha-treinamento").click(function(){
        /* guardando o id do treinamento e a senha informada */
        var id_treinamento = $(this).attr("treinamento");
        var senha = $("#senha-requerida-treinamento"+id_treinamento).val();
        /* requisição para verificar se a senha é igual */

        $.ajax({
            url: "../backend/receive.class.php",
            method: "post",
            data: {id_treinamento, tipo: "verificar_senha_treinamento", senha},
            success: function(data){
                window.location = data;
            }
        })
    })

    $('.config').click(function () {
        window.location = $(this).attr('href');
    });
   
    $("#check-password").change(function(){
        
        if($("#change-password").attr("type") == 'password')
            $("#change-password").attr("type", "text");
        else
            $("#change-password").attr("type", "password");
    })

    /* /controle de redirecionamento para página do treinamento */

    /* controle de filtros */

    $("#filtrar").click(function(){
        window.location = "home.php?page=treinamentos&setor="+$("#setor-selected").val()+"&user="+($("#filtro").val());
    })

    $("#filtro_usuario").click(function(){
        window.location = "home.php?page=meus_funcionarios&user="+$("#filtro-meus-usuarios").val();

    })

    /* /controle de filtros */

    /* controle dos popovers */

    $("#popover_meus_usuarios").popover({ trigger: "hover focus" });
    
    /* /controle dos popovers */

    /* controlando clique em cima das divs de notificações */
    
    $("#popover_meus_usuarios").click(function(){
        window.location = "home.php?page=meus_funcionarios";
    })

    $(".meus_treinamentos_cadastrados").click(function(){
        
    })


    /* / controlando clique em cima das divs de notificações */
}); 
