$(".plus_minus").click(function () {
  let produto = $(this).attr("produto");
  let this_class = $(this).attr("class").split(" ");
  if (this_class.includes("plus")) {
    if($('#lista_carrinho').children().length == 0){
        $('.carrinho').css('display','block')
    }
    if (parseInt($("#" + produto + "_quantidade").text())  == 0) {
        $('#lista_carrinho').prepend('<span id="'+produto+'_carrinho_item" class="item_carrinho"><orange_text id="'+produto+'_carrinho_quantidade">1</orange_text> '+$('#'+produto+"_name").text()+'</span>')
    }
   
    $("#" + produto + "_quantidade").text(
        parseInt($("#" + produto + "_quantidade").text()) + 1
      ); 
} else {
    if (parseInt($("#" + produto + "_quantidade").text()) - 1 < 0) return;
   
    $("#" + produto + "_quantidade").text(
      parseInt($("#" + produto + "_quantidade").text()) - 1
    );
    if (parseInt($("#" + produto + "_quantidade").text())  == 0) {
        $("#" + produto + "_carrinho_item").remove()
    }
    if($('#lista_carrinho').children().length == 0){
        $('.carrinho').css('display','none')
    }
  }
  $("#" + produto + "_carrinho_quantidade").text($("#" + produto + "_quantidade").text())

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
