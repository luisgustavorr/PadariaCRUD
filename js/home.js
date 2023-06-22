$("#input_preco").mask("000.000.000.000.000", { reverse: true });
$("#input_peso").mask("000.000.000.000.000", { reverse: true });

$(".plus_minus").click(function () {
  let produto = $(this).attr("produto");
  let this_class = $(this).attr("class").split(" ");
  if (this_class.includes("plus")) {
    if ($("#lista_carrinho").children().length == 0) {
      $(".carrinho").css("display", "block");
      $(".carrinho").animate({ height: "300px" });
      var offsetTop = $("#" + produto + "_card").offset().top;
      $(".content").animate({ scrollTop: offsetTop }, 500);
    }
    if (parseInt($("#" + produto + "_quantidade").text()) == 0) {
      $("#lista_carrinho").prepend(
        '<span id="' +
          produto +
          '_carrinho_item" class="item_carrinho"><orange_text id="' +
          produto +
          '_carrinho_quantidade">1</orange_text> ' +
          $("#" + produto + "_name").text() +
          "</span>"
      );
    }

    $("#" + produto + "_quantidade").text(
      parseInt($("#" + produto + "_quantidade").text()) + 1
    );
  } else {
    if (parseInt($("#" + produto + "_quantidade").text()) - 1 < 0) return;

    $("#" + produto + "_quantidade").text(
      parseInt($("#" + produto + "_quantidade").text()) - 1
    );
    if (parseInt($("#" + produto + "_quantidade").text()) == 0) {
      $("#" + produto + "_carrinho_item").remove();
    }
    if ($("#lista_carrinho").children().length == 0) {
      $(".carrinho").animate({ height: "0" }, function () {
        $(".carrinho").css("display", "none");
      });
    }
  }
  $("#" + produto + "_carrinho_quantidade").text(
    $("#" + produto + "_quantidade").text()
  );

  $("#" + produto + "_peso").text(
    parseInt($("#" + produto + "_quantidade").text()) *
      parseInt($("#" + produto + "_peso").attr("peso")) +
      "g"
  );
  $("#" + produto + "_price").text(
    parseInt(parseInt($("#" + produto + "_quantidade").text())) *
      parseInt($("#" + produto + "_price").attr("price"))
  );

  $("#" + produto + "_card").attr("class", "product product_marked");
  if ($("#" + produto + "_quantidade").text() == 0) {
    $("#" + produto + "_card").attr("class", "product");
    $("#" + produto + "_price").text($("#" + produto + "_price").attr("price"));
    $("#" + produto + "_peso").text(
      $("#" + produto + "_peso").attr("peso") + "g"
    );
  }
});
//---------------VERIFICAR INPUT FILE -------------
$("#input_img").change(function(){
  $("#img_icon_father").css("color", "#0cff0c");
  $("#img_icon_father").css("animation", "none");

})

//---------------MODAL ADD PRODUTO--------------------
$(".add_produto").click(function () {
  $("fundo").css("display", "flex");
  $(".modal_adicionar_produto").css("display", "flex");
  var offsetTop = $(".modal_adicionar_produto").offset().top;
  $(".content").animate({ scrollTop: offsetTop-80 }, 500);
});
$("#close_modal_adicionar_produto").click(function () {
  $("fundo").css("display", "none");
  $(".modal_adicionar_produto").css("display", "none");
});

//-------------CRIAR-------------
$("#form_add_produto").submit(function (e) {
  if ($("#input_img").val() == "") {
    // alert("insira uma imagem clicando no ícone da imagem");
    $("#img_icon_father").css("color", "#ff8f00");
    $("#img_icon_father").css("animation", "pulse 0.6s infinite");
  } else {
    var formData = new FormData(this);
    $.ajax({
      type: "POST",
      url: "Models/post_receivers/adicionar_produto.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (data) {
        $(".input_add_produto").val("");
        $('#input_img').val('')

        location.reload();
      },
    });
  }

  e.preventDefault();
});
//---------------MODAL EDITAR PRODUTO--------------------
function modalEditar(info){
  $("fundo").css("display", "flex");
  $(".modal_editar_produto").css("display", "flex");
  $(".content").animate({ scrollTop: $(document).height() }, "slow");
    $("#close_modal_editar_produto").click(function () {
      $("fundo").css("display", "none");
      $(".modal_editar_produto").css("display", "none");
    });
    $('#edit_input_nome').val(info.nome)
    $('#edit_input_preco').val(info.preco)
    $('#edit_input_peso').val(info.peso)
    $('#old_img_name').val(info.img)
    $('#input_id').val(info.id)

// //-------------EDITAR-------------
$("#form_editar_produto").submit(function (e) {
  console.log($("#edit_input_img").val())

    var formData = new FormData(this);
    $.ajax({
      type: "POST",
      url: "Models/post_receivers/editar_produto.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (data) {
    
        $('#edit_input_img').val('')
        location.reload()
      },
    });
  e.preventDefault();

});
}

//----------DELETAR------------
let deletar = false;

$(".deletar_produto").click(function () {
  deletar = !deletar;

  if (deletar) {
    $(".edit")
      .removeClass("edit fa-solid fa-pen-to-square")
      .addClass("confirm_delete fa-solid fa-trash-can");
    $(this).html(
      'Clique: <i style="color:#ff8f00;" class=" fa-solid fa-trash-can"></i> para deletar'
    );
    $(this).addClass("show_description");

    $(".show_description").mouseenter(function () {
      if (!deletar) return;
      $(this).html("Ou clique aqui para cancelar");
    });

    $(".show_description").mouseleave(function () {
      if (!deletar) return;
      $(this).html(
        'Clique: <i style="color:#ff8f00;" class=" fa-solid fa-trash-can"></i> para deletar'
      );
    });

    $(".confirm_delete").click(function () {
      if (!deletar) return;

      let id = $(this).attr("produto");
      data = {
        id: id,
      };

      $.post("Models/post_receivers/deletar_produto.php", data, function (ret) {
        location.reload();
      });
    });
  } else {
    $(".confirm_delete")
      .removeClass("confirm_delete fa-solid fa-trash-can")
      .addClass("edit fa-solid fa-pen-to-square");
    $(this).text("Deletar Produto");
    $(this).removeClass("show_description");
  }
});

$('.edit').click(function(){
  if (deletar) return;
  let id = $(this).attr("produto")
  data = {
    id: id,
    action:'info'
  };

  $.post("Models/post_receivers/editar_produto.php", data, function (ret) {
    let info = JSON.parse(ret);
    modalEditar(info)
  });
})
//------------- SIDEBAR MOBILE---------
let sidebar_aberta = false
$('#mobile i').click(function(){
  sidebar_aberta = !sidebar_aberta

  if(sidebar_aberta){
      $('#sidebar').css('display','block')
      $('#sidebar').animate({height:'150px'})

  }else{
    $('#sidebar').animate({height:'0'},function(){
      $('#sidebar').css('display','none')
    })
  }
})
$('#sidebar span').click(function(){
  $('#sidebar').animate({height:'0'},function(){
    $('#sidebar').css('display','none')
  })
})