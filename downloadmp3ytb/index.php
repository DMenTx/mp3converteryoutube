<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Rock News</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="stile.css">
	<script type="text/javascript" src="converter.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro&display=swap" rel="stylesheet">
</head>
<body>
	<h1 class="display-3 title">Ultimas noticias do <a href="https://whiplash.net">Whiplash.net</a> e <a href="https://rollingstone.uol.com.br">Rolling Stone Uol</a></h1>
	
	<div class="modal fade" id="modalDownload" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	    	<div class="modal-header">
		        <h5 class="modal-title">Baixar</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		     </div>
		    <center>
		  		<iframe width="50%" height="60px" scrolling="no" style="border:none; margin: 2%;"></iframe>  	
		    </center>
	    </div>
	</div>
	
	  </div>
	
	<?php 
	try {
		
	$xml = array(simplexml_load_file("https://whiplash.net/feeds/news.xml"), simplexml_load_file("https://rollingstone.uol.com.br/feed"));
	$c=0;
	//var_dump($xml);
	$news = array();
	 for ($j=0; $j < count($xml); $j++) { 
		for($i=0;$i<12;$i++) {
			$nRand = rand(0, count($xml)-1);
			$link = (string) $xml[$nRand]->channel->item[$i]->link;
			$titulo = (string) $xml[$nRand]->channel->item[$i]->title;
		 	$hora = $xml[$nRand]->channel->item[$i]->pubDate;
		 	$hora  = explode(" ",$hora);
		 	$site = explode("/", $link);
		 	$news[$c] = array("link" => $link, "site" => $site[2],"title" => $titulo, "hora" => $hora[4]." em ".$hora[1]." de ".$hora[2]." de ".$hora[3]);
		 	$c += 1;
	}	
	}
	echo "
	<div class='feed'>
	<div class='card-columns'>";
	foreach ($news as $chave) {
		echo "
		<div class='card feed_c'>
	    <div class='card-body'>
	      <a href='{$chave["link"]}' target='_blank'><h5 class='card-title'>{$chave["title"]}</h5></a>
	      <p class='card-text'><small class='text-muted'>Publicado ás {$chave["hora"]} {$chave["site"]}</small></p>
	    </div>
	  </div>";
	}
	echo "</div>
	</div>";
	} catch (Exception $e ) {
		echo "O conteudo não pode ser exibido devido ao erro ".$e->getMessage() ."<br>";
	}
	?>
	<footer>
		<center>
			Powered by <a href="https://github.com/mr-dmtx">DMTX</a> 2019	
		</center>
		
	</footer>
</body>
</html>