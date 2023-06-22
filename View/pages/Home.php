<fundo>
  <div class="modal_adicionar_produto">
    <div  class="icon_container">
      <i id="close_modal_adicionar_produto" class="fa-solid fa-xmark"></i>
    </div>
    <h3>Adicionar Produto</h3>
    <div class="flex">
      <form enctype="multipart/form-data" method="POST" id="form_add_produto">
        <div class="input_box">
          <label for="">Nome</label>
          <input type="text" class="input_add_produto" id="input_nome" name="input_nome" placeholder="Nome do produto..." required>
        </div>
        <div class="input_box">
          <label for="">Peso</label>
          <div class="input_elaborado">
            <input type="text" class="input_add_produto" name="input_peso" id="input_peso" placeholder="Peso do produto..." required>
            <span>g</span>
          </div>
        </div>
        <div class="input_box">
          <label for="">Preço</label>
          <div class="input_elaborado">

            <input type="text" class="input_add_produto" name="input_preco" id="input_preco" placeholder="Preço do produto..." required>
            <span>,00</span>
            </div>

        </div>
        <div class="input_box box_img_father">
          <label id="img_icon_father" for="input_img"><i class="fa-solid fa-image"></i></label>
          <input type="file" name="input_img" id="input_img">
        </div>
    </div>
    <button id="add_produto_button" class="adicionar">Adicionar</button>
    </form>
  </div>
  <!-- EDITAR -->
  <div class="modal_editar_produto">
    <div  class="icon_container">
      <i id="close_modal_editar_produto" class="fa-solid fa-xmark"></i>
    </div>
    <h3>Editar Produto</h3>
    <div class="flex">
      <form enctype="multipart/form-data" method="POST" id="form_editar_produto">
      <input type="hidden" id="old_img_name" name="old_img_name">
      <input type="hidden" id="input_id" name="input_id">

        <div class="input_box">
          <label for="">Nome</label>
          <input type="text" class="input_add_produto" id="edit_input_nome" name="input_nome" placeholder="Nome do produto..." required>
        </div>
        <div class="input_box">
          <label for="">Peso</label>
          <div class="input_elaborado">
            <input type="text" class="input_add_produto" name="input_peso" id="edit_input_peso" placeholder="Peso do produto..." required>
            <span>g</span>
          </div>
        </div>
        <div class="input_box">
          <label for="">Preço</label>
          <div class="input_elaborado">

            <input type="text" class="input_add_produto" name="input_preco" id="edit_input_preco" placeholder="Preço do produto..." required>
            <span>,00</span>
            </div>

        </div>
        <div class="input_box box_img_father">
          <label id="edit_img_icon_father" for="edit_input_img"><i class="fa-solid fa-image"></i></label>
          <input type="file" name="edit_input_img" id="edit_input_img">
        </div>
    </div>
    <button id="add_produto_button" class="adicionar">Editar</button>
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
    <?php \Models\HomeModel::imprimirCards() ?>
  </div>
</div>
</div>

<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

<script src="<?php echo INCLUDE_PATH ?>js/home.js"></script>

</body>

</html>