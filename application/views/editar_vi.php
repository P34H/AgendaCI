<!-- Page Content -->
<div class="container">
 <!-- <?php //echo '<pre>';
 //print_r($contato) ;
 //echo '</pre>';?> -->
 <div class="card col-md-3 my-2">
    <h5 class="card-header" id=""><?php echo $subtitulo ?></h5>
</div>
<div class="col-md-6">
    <form action="/Trabalho_Agenda/Home_co/add" name="form_add" method="post" class="border rounded">
      <div class="modal-body">
        <div class="form-group">
            <label for="name">Nome Completo</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $contato->name ;?>">
        </div>

        <div class="form-group">
            <label for="numero">Celular</label>
            <input type="text" name="numero" class="form-control" id="numero" value="<?php echo $contato->numero ;?>">
        </div>
        <div class="form-group">
            <label for="birthday">Data de Nascimento</label>
            <input type="text" class="form-control" name="birthday" id="birthday" value="<?php echo $contato->birthday ;?>">
        </div>
        <div class="form-group ">
            <label for="datetime">Data de cadastro</label>
            <input type="text" readonly class="form-control" id="datetime" name="datetime" value="<?php echo $contato->date ;?>">     
        </div>
    </div>
    <div class="modal-footer my-2 mx-2">      
        <input type="hidden" name="id" id="id" value="<?php echo $contato->id ;?>">
        <a href="<?php echo base_url('')?>" class="btn btn-primary" >Voltar</a>
        <button type="submit"  class="btn btn-primary">Salvar</button>
    </div>
</form>
</div>

