<!-- Page Content -->
<div class="container">
    <div class="col-md-4 col-md-offset-2" >
        <?php if ($erros):  ?>
            <div class="alert alert-warning">
                <ul>
                    <?php echo $erros;  ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($sucesso):  ?>
            <div class="alert alert-success">
                <?php echo $sucesso;  ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="card col-md-3 my-2">
        <h5 class="card-header" id=""><?php echo $subtitulo ?></h5>
    </div>
    <div class="col-md-6">
        <form action="add" name="form_add" method="post" class="border rounded">

            <div class="form-group">
                <label for="name">Nome Completo</label>
                <input type="text" class="form-control" r equired="" name="name" id="name" placeholder="Nome Completo" value="<?=set_value('name')?>">
            </div>

            <div class="form-group">
                <label for="numero">Celular</label>
                <input type="text" name="numero" data-mask="(00) 0000-0000" class="form-control phone-ddd-mask" size="10" id="numero" placeholder="Ex.: (00) 0000-0000" value="<?=set_value('numero')?>">
            </div>
            <div class="form-group">
                <label for="birthday">Data de Nascimento</label>
                <input type="text" class="form-control date-time-mask"  data-mask="00/00/0000" name="birthday" id="birthday" placeholder="Ex.: 00/00/0000 00:00:00" value="<?=set_value('birthday')?>">
            </div>
            <div class="form-group ">
                <label for="datetime">Data atual</label>
                <input type="text" readonly class="form-control" id="datetime" name="datetime" value="<?php echo date("m/d/y"); ?>" >    
            </div>

            <div class="modal-footer">
                <a href="<?php echo base_url('')?>" class="btn btn-primary" >Voltar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>

