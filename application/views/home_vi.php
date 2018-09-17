<!-- Page Content -->
<div class="container col-md-12 border">

  <div class="row">
   <div class="card col-md-3 my-2 mx-2">
    <h5 class="card-header" id=""><?php echo $subtitulo ?></h5>  
  </div>
</div>
<div class="">
  <a href="<?php echo base_url('Cadastro_co/add')?>" class="mx-2 btn btn-primary my-2">Novo Contato</a>
  <form class=" form-row" action="" method="post">
    <input type="text" class="mx-2 col-md-2 form-control" id="Pesquisar" name="PesqPrimeiro" placeholder="Pesq. Primeiro nome">
    <input type="text" class="mx-2 col-md-2 form-control" id="Pesquisar" name="PesqUltimo" placeholder="Pesq. Ultimo nome">
    <button class="btn btn-secondary" href="<?php echo base_url('')?>">Pesquisar</button>
  </form>
</div>
<div class="mx-auto col-md-10 border border-primary rounded">
  <form>
  </form>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nome Completo</th>
        <th scope="col">Celular</th>
        <th scope="col">Data de nascimento</th>
        <th scope="col">Data de Cadastro</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($M_contatos as $contatos) {
        ?>
        <tr>
          <th scope="row"><?php echo $contatos->id ;?></th>
          <td><?php echo $contatos->name ;?></td>
          <td><?php echo $contatos->numero ;?></td>
          <td><?php echo $contatos->birthday ;?></td>
          <td><?php echo $contatos->date;?></td>
          <td> <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Opções
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
              <a class="dropdown-item" href="<?php echo base_url('Home_co/Editar/'.$contatos->id)?>">Editar</a>
              <a class="dropdown-item" href="<?php echo base_url('Home_co/Apagar/'.$contatos->id)?>">Deletar</a>
            </div>
          </div></td>

        </tr>
        <?php   
      } 
      ?>
    </tbody>
  </table>

</div>