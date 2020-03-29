<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Notícias</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php
      echo "\n". link_tag('assets/css/theme.css');
    ?>
  </head>
	<body>

        <?php echo $navBar;?>

        <main role="main" class="container">
        <form name="formNoticia" id="formNoticia" action="<?php echo base_url('noticia')?>">
            <input type="hidden" name="idNoticia" id="idNoticia" value="<?php echo @$idNoticia; ?>" />
            <div class="form-group">
                <label for="tituloNoticia">Título notícia</label>
                <input type="text" class="form-control" id="titutlo" name="titulo" value="<?php echo @$noticia['titulo'];?>" placeholder="Ex: Vaga para desenvolvedor">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3"><?php echo @$noticia['descricao'];?></textarea>
            </div>
            <button type="submit" class="btn btn-success">Publicar</button>
            <?php if($idNoticia){?>
              <button type="button" id="deletar" class="btn btn-danger">Deletar notícia</button>
            <?php } ?>
            </form>
        </main>

    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>	
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>	
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="<?php echo site_url('assets/js/comum.js')?>"></script>
    <script src="<?php echo site_url('assets/js/noticia.js')?>"></script>
</html>