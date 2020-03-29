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
        <?php
          foreach($noticias as $n){
        ?>
        <div class="jumbotron">
          <h1><?php echo $n['titulo']?></h1>
          <p class="lead"><?php echo $n['descricao']?></p>
          <a class="btn btn-lg btn-primary" href="<?php echo base_url('noticia/'.$n['id'])?>" role="button">Editar</a>
        </div>
        <?php
          }
        ?>
      </main>

    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>	
    <script src="<?php echo site_url('assets/js/comum.js')?>"></script>
  </html>