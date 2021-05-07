
<?php
$data = $productClass->getDataProduct($productId);
// echo "<pre>";
// print_r($data);
// echo "</pre><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr>";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $data['product']['empreendimento'];?> - [<?php echo $data['instance'];?>]</title>
	<!-- CSS only -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- JS, Popper.js, and jQuery -->
	<script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ ); ?>assets/jquery.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ ); ?>assets/panzoom.js"></script>

</head>
<body>
	<div class="container-fluid">
		<header class="row">
			<div class="col-sm">
		      	<input id="range-input" class="zoom-range" type="range" min="0.1" max="4" step="0.1" value="1">
		    </div>
		    <div class="col-sm">
		      <div class="logo">
		      	<img src="https://d2ekoxv2nglxjj.cloudfront.net/_uploads/companies/<?php echo $data['instance'];?>/configurations/brandLogo.png?v=<?php echo date('Ymdh');?>" alt="Logo" class="img-fluid">
		      </div>
		    </div>
			<div class="col-sm">
		      <p class="details">
		      	<b>Empreendimento:</b> <?php echo $data['product']['empreendimento'];?><br/>
				<b>Próxima Sincronização:</b> <?php echo $data['nextUpdate']; ?><br/>
		      </p>
		    </div>
		</header>
		<section class="panzoom-parent">
			<div id="panzoom">
				<?php foreach($data['units'] AS $u):?>
					<div class="unity <?php echo $u['situacao_unidade'] ?>" style="top: <?php echo $u['coord_y'] ?>px; left: <?php echo $u['coord_x']  ?>px;"><?php echo preg_replace("/[^0-9]/", "", $u['numero_unidade']); ?></div>
				<?php endforeach;?>
				<img src="<?php echo $data['product']['imagem_implantacao'];?>" alt="">
			</div>
		</section>
	</div>
<script>
	$(document).ready(function() {
		///ZOOM
        ///ZOOM
        ///ZOOM
        ///ZOOM
        $("#panzoom").panzoom({
            scale: 1,
            minScale: 0.45,
            maxScale: 1.5,
            $zoomRange: $(".zoom-range")
        });
    });
</script>
<style>
	.panzoom-parent{
		margin: -15px !important;
	}
	#panzoom{
		position: relative;
		z-index: 1;
		height: 95vh;
		/*width: 80;*/
	}
	.unity.available{ background: #4EDB54; }
	.unity.sale{ background: #ff081c; }
	.unity.reserved{ background: #FB8120; }
	.unity{
		cursor: pointer;
		position: absolute;
		background: #4EDB54;
		height: 21px;
		width: 21px;
		line-height: 21px;
		top: 418px;
		left: 726px;
		border-radius: 50%;
		text-align: center;
		font-size: 11px;
	}
	header{
		position: relative;
		z-index: 10;
		background: white;
		height: 50px;
		text-align: center;
		-webkit-box-shadow: -1px 4px 30px -8px rgba(0,0,0,0.75);
		-moz-box-shadow: -1px 4px 30px -8px rgba(0,0,0,0.75);
		box-shadow: -1px 4px 30px -8px rgba(0,0,0,0.75);
	}
	header .logo{
		display: inline-block;
		width: 200px;
		padding: 10px;
		background: white;
		-webkit-box-shadow: -1px 4px 30px -8px rgba(0,0,0,0.75);
		-moz-box-shadow: -1px 4px 30px -8px rgba(0,0,0,0.75);
		box-shadow: -1px 4px 30px -8px rgba(0,0,0,0.75);
	}

	.details{
		font-size: 12px;
		padding-top: 5px;
	}

	/** INPUT RANGE **/
	/** INPUT RANGE **/
	/** INPUT RANGE **/

	input[type=range] {
		margin-top: 21px!important;
	  width: 100%;
	  margin: 7.3px 0;
	  background-color: transparent;
	  -webkit-appearance: none;
	}
input[type=range]:focus {
  outline: none;
}
input[type=range]::-webkit-slider-runnable-track {
  background: rgba(29, 113, 169, 0.78);
  border: 0.2px solid #010101;
  border-radius: 1.3px;
  width: 100%;
  height: 11.4px;
  cursor: pointer;
}
input[type=range]::-webkit-slider-thumb {
  margin-top: -7.5px;
  width: 16px;
  height: 26px;
  background: #ffffff;
  border: 0.7px solid #00001e;
  border-radius: 50px;
  cursor: pointer;
  -webkit-appearance: none;
}
input[type=range]:focus::-webkit-slider-runnable-track {
  background: #2180bf;
}
input[type=range]::-moz-range-track {
  background: rgba(29, 113, 169, 0.78);
  border: 0.2px solid #010101;
  border-radius: 1.3px;
  width: 100%;
  height: 11.4px;
  cursor: pointer;
}
input[type=range]::-moz-range-thumb {
  width: 16px;
  height: 26px;
  background: #ffffff;
  border: 0.7px solid #00001e;
  border-radius: 50px;
  cursor: pointer;
}
input[type=range]::-ms-track {
  background: transparent;
  border-color: transparent;
  border-width: 8.2px 0;
  color: transparent;
  width: 100%;
  height: 11.4px;
  cursor: pointer;
}
input[type=range]::-ms-fill-lower {
  background: #196293;
  border: 0.2px solid #010101;
  border-radius: 2.6px;
}
input[type=range]::-ms-fill-upper {
  background: rgba(29, 113, 169, 0.78);
  border: 0.2px solid #010101;
  border-radius: 2.6px;
}
input[type=range]::-ms-thumb {
  width: 16px;
  height: 26px;
  background: #ffffff;
  border: 0.7px solid #00001e;
  border-radius: 50px;
  cursor: pointer;
  margin-top: 0px;
  /*Needed to keep the Edge thumb centred*/
}
input[type=range]:focus::-ms-fill-lower {
  background: rgba(29, 113, 169, 0.78);
}
input[type=range]:focus::-ms-fill-upper {
  background: #2180bf;
}
/*TODO: Use one of the selectors from https://stackoverflow.com/a/20541859/7077589 and figure out
how to remove the virtical space around the range input in IE*/
@supports (-ms-ime-align:auto) {
  /* Pre-Chromium Edge only styles, selector taken from hhttps://stackoverflow.com/a/32202953/7077589 */
  input[type=range] {
    margin: 0;
    /*Edge starts the margin from the thumb, not the track as other browsers do*/
  }
}

</style>
</body>
</html>