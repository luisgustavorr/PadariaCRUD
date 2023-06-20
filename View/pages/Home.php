<fundo>
    <div class="modal_adicionar_produto">
        <div id="close_modal_adicionar_produto" class="icon_container">
        <i class="fa-solid fa-xmark"></i>
        </div>
        <h3>Adicionar Produto</h3>
        <div class="flex">
            <form enctype="multipart/form-data" method="POST" id="form_add_produto">
            <div class="input_box">
            <label for="">Nome</label>
            <input type="text"  class="input_add_produto" id="input_nome" name="input_nome" placeholder="Nome do produto..." require>
            </div>
            <div class="input_box">
            <label for="">Peso</label>
            <input type="text"  class="input_add_produto"name="input_peso" id="input_peso" placeholder="Peso do produto..." require>
            </div>
            <div class="input_box">
            <label for="">Preço</label>
            <input type="text"  class="input_add_produto"name="input_preco" id="input_preco"placeholder="Preço do produto..." require>
            </div>
            <div class="input_box">
            <label id="img_icon_father" for="input_img"><i class="fa-solid fa-image"></i></label>
            <input type="file" name="input_img" id="input_img" require>
            </div>
        </div>
        <button id="add_produto_button" class="adicionar">Adicionar</button>
        </form>
    </div>
</fundo>
<div class="flex">
            <aside class="carrinho">
            <h3>Seu Carrinho</h3>
            <article id="lista_carrinho">
            </article>
            </aside>
            </div>
        <div class="bottom_part">
       
            <h3>Nossas Especialidades</h3>
            <div class="especialidades_box">
               <?php \Models\HomeModel::imprimirCards()?>
            </div>
        </div>
    </div>
    <script>
function mascaraMoeda(campo, evento) {
  var tecla = evento ? evento.which : window.event.keyCode;
  var valor = campo.value.replace(/[^\d]+/gi, '').split('').reverse();
  var resultado = [];
  var mascara = "##.###.###,##".split('').reverse();

  for (var x = 0, y = 0; x < mascara.length; x++) {
    if (mascara[x] !== '#') {
      resultado.push(mascara[x]);
    } else {
      if (valor[y] !== undefined) {
        resultado.push(valor[y]);
        y++;
      }
    }
  }

  campo.value = resultado.reverse().join('');
}

    </script>
        <script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

        <script src="<?php echo INCLUDE_PATH?>js/home.js"></script>

</body>

</html>
