<?php
if(!isset($_POST['submit'])){
			exit('error');
}
include "header_detail.php";
?>
<body style="background-color: white; background:none;margin:0 auto" id="MyBody">
	<?php
	
		$sub  = (isset($_POST['submit']) ? $_POST['submit'] : '');
		$val1 = (isset($_POST['data1']) ? $_POST['data1'] : '');
		$val2 = (isset($_POST['data2']) ? $_POST['data2'] : '');
		$val3 = (isset($_POST['data3']) ? $_POST['data3'] : '');
		$val4 = (isset($_POST['data4']) ? $_POST['data4'] : '');
		$val5 = (isset($_POST['data5']) ? $_POST['data5'] : '');
		$val6 = (isset($_POST['data6']) ? $_POST['data6'] : '');
		$val7 = (isset($_POST['data7']) ? $_POST['data7'] : '');
		$val8 = (isset($_POST['data8']) ? $_POST['data8'] : '');
		
		foreach ($val1 as $key=> $value) {
			$datan1 = $val1[$sub];
			$datan2 = $val2[$sub];
			$datan3 = $val3[$sub];
			$datan4 = $val4[$sub];
			$datan5 = $val5[$sub];
			$datan6 = $val6[$sub];
			$datan7 = $val7[$sub];
			$datan8 = $val8[$sub];
		}
		$ket= $_POST['ket']; $jumlahcetak= $_POST['jumlahcetak'];
		$hasil= base64_decode($datan1);
		$hasil2= base64_decode($datan2);
		$hasil3= base64_decode($datan3);
		$hasil4= base64_decode($datan4);
		$hasil5= base64_decode($datan5);
		$hasil6= base64_decode($datan6);
		$hasil7= base64_decode($datan7);
		$hasil8= base64_decode($datan8);
		//
		$valsubmit = $datan1.','.$datan2.','.$datan3.','.$datan4.','.$datan5.','.$datan6.','.$datan7.','.$datan8;
		$exclude_array = explode(',', $valsubmit); //Explode on comma
		$exclude_array = array_filter($exclude_array, function($var){
			return (trim($var) !== ''); //Return true if not empty string
		});
		$datax = implode(",",$exclude_array);
		$array= json_decode(rawurldecode($hasil),true);
		//echo json_encode($array);
		$array2= json_decode(rawurldecode($hasil2),true);
		$array3= json_decode(rawurldecode($hasil3),true);
		$array4= json_decode(rawurldecode($hasil4),true);
		$array5= json_decode(rawurldecode($hasil5),true);
		$array6= json_decode(rawurldecode($hasil6),true);
		$array7= json_decode(rawurldecode($hasil7),true);
		$array8= json_decode(rawurldecode($hasil8),true);
		
		$total1 = 0;
		$total2 = 0;
		$total3 = 0;
		$total4 = 0;
		$total5 = 0;
		$total6 = 0;
		$total7 = 0;
		$total8 = 0;
		
	?>
	<div class="containers" style="max-width:1200px;margin:0 auto;padding:0 20px;border:1px solid #f7f7f7;background:#fff">
		<div class="row">
			
			<div class="col-md-6 col-sm-12"> 
				<h2 class="text-left" style="padding:5px; margin-bottom:0px;" id="cetak">Cetak <?=$array['modul'];?></h2>
				<div class="alerts" style="padding:5px; margin-bottom:0px;color:#fff;font-weight:bold"></div>
				<div class="noPrint">
					<button id="btn-Preview-Image" type="button" class="btn btn-warning">Capture</button>
					<a id="btn-Convert-Html2Image" class="btn btn-danger" href="#">Download Capture</a>
					<button type="button" class="btn btn-primary print" onClick="window.print()"><i class="fa fa-print" aria-hidden="true"></i> Print</button>	
				</div>
			</div>
			<div class="col-md-6 col-sm-12"> 
				<div class="lead text-right "><img src="../../images/header_logo.png" style="height:50px" alt="logo"/></div>
			</div>
		</div>
	</div>
	<div id="html-content-holder" class="containers" style="max-width:1200px;margin:0 auto;padding:20px 20px;border:1px solid #f7f7f7;background:#fff">
		<div class="row">
			<div class="col-md-3"> 
				<table class='table table-striped' >
					<tr ><td ><h4 style="padding:0px; margin-bottom:0px;">Spesifikasi</h4></td><td></td></tr>
					<tr ><td >Jumlah Cetak</td><td>: <?=$jumlahcetak . " " . $array['ket_satuan'];?></td></tr>	
					<tr><td>Jenis Kertas</td><td>: <?=$array['jenis_bahan'];?></td></tr>	
					<tr><td>Ukuran</td><td>: <?=$array['lbrcetak'] . "x". $array['tgcetak'];?> cm</td></tr>	
					<tr><td>Jumlah Warna</td><td>: <?=$array['jmlwarna'] . "/" . $array['jmlwarna2'];?></td></tr>	
					<?php	if(!empty($array['ketlam'])){	?>		
						<tr><td>Laminating</td><td>: <?=$array['ketlam'];?></td></tr>
					<?php } ?>
					<tr><td class="align-baseline">Finishing </td><td>: 
						<?php
							$spesifikasi = "Bahan : " .  $array['jenis_bahan'] . ", Ukuran : " . $array['lbrcetak'] . "x". $array['tgcetak'] . ", Jumlah Warna" . 
							$array['jmlwarna'] . "/" . $array['jmlwarna2'] . ", " . $array['ketlam'] . ", ";
							$nama_biaya = $nmfinishing1 = $nmfinishing2 = $nmfinishing3 = $nmfinishing4 =$nmfinishing5 = $nmfinishing6;
							if(!empty($array['nmfinishing1'])){
								$spesifikasi = $spesifikasi .  $array['nmfinishing1'] . ", ";
								$nmfinishing1 = $array['nmfinishing1'];
							}
							if(!empty($array['nmfinishing2'])){
								$spesifikasi = $spesifikasi .  $array['nmfinishing2'] . ", ";
								$nmfinishing2 = " | ". $array['nmfinishing2'];
							}
							if(!empty($array['nmfinishing3'])){
								$spesifikasi = $spesifikasi .  $array['nmfinishing3'] . ", ";
								$nmfinishing3 = " | ".$array['nmfinishing3'];
							}
							if(!empty($array['nmfinishing4'])){
								$spesifikasi = $spesifikasi .  $array['nmfinishing4'] . ", ";
								$nmfinishing4 = " | ".$array['nmfinishing4'];
							}
							if(!empty($array['nmfinishing5'])){
								$spesifikasi = $spesifikasi .  $array['nmfinishing5'] . ", ";
								$nmfinishing5 = " | ".$array['nmfinishing5'];
							}
							if(!empty($array['nmfinishing6'])){
								$spesifikasi = $spesifikasi .  $array['nmfinishing6'] . ", ";
								$nmfinishing6 = " | ".$array['nmfinishing6'];
							}
							$nama_biaya = $nmfinishing1 . $nmfinishing2 . $nmfinishing3 . $nmfinishing4 . $nmfinishing5 . $nmfinishing6;
							echo $nama_biaya;
						?>
					</td></tr>
					
					
					<input type="hidden" id="spesifikasi" value="<?=$spesifikasi;?>">
					
					<tr><td colspan="2">
						<?php
							$lbr_plano = $array['lbrbhan'];//$_GET['lbr_plano'];
							$tinggi_plano = $array['tgbhan'];//$_GET['tinggi_plano'];
							$lbr_pot = $array['lebarpotkertas'];//$_GET['lbr_pot'];
							$tinggi_pot = $array['tinggipotkertas'];//$_GET['tinggi_pot'];
							if ($tinggi_plano > $lbr_plano){
								$tinggi_plano	= $array['lbrbhan'];
								$lbr_plano 		=  $array['tgbhan'];
							}	
							$_potong = array('tinggicetak'=>$lbr_pot,'lebarcetak'=>$tinggi_pot,'panjangtext'=>$lbr_plano,'lebartext'=>$tinggi_plano);
							$push = array_merge($option,$_potong);
							$sync = curl($config['SITE_APIS'].'/potong/get/',json_encode($push));
							$hitpot = json_decode($sync,true);
							$hasil = json_encode($hitpot[0]['jml']);
						?>	
						<div style="padding:4px">1. Gambar Potongan Kertas <?=$array['kethitung'];?></div>
						<canvas id="myCanvas" width="<?=($lbr_plano * 10)/4;?>" height="<?=($tinggi_plano * 10)/4;?>" style="border:2px solid #5B8C2A; background-color:#E7F6D9;"></canvas>				
						
						<?php if(!empty($array2['hrgbhn'])){ 
							
							$lbr_plano2 = $array2['lbrbhan'];//$_GET['lbr_plano'];
							$tinggi_plano2 = $array2['tgbhan'];//$_GET['tinggi_plano'];
							$lbr_pot2 = $array2['lebarpotkertas'];//$_GET['lbr_pot'];
							$tinggi_pot2 = $array2['tinggipotkertas'];//$_GET['tinggi_pot'];
							if ($tinggi_plano2 > $lbr_plano2){
								$tinggi_plano2	= $array2['lbrbhan'];
								$lbr_plano2 		=  $array2['tgbhan'];
							}	
							$_potong2 = array('tinggicetak'=>$lbr_pot2,'lebarcetak'=>$tinggi_pot2,'panjangtext'=>$lbr_plano2,'lebartext'=>$tinggi_plano2);
							$push2 = array_merge($option,$_potong2);
							$sync2 = curl($config['SITE_APIS'].'/potong/get/',json_encode($push2));
							$hitpot2= json_decode($sync2,true);
							$hasil2 = json_encode($hitpot2[0]['jml']);
						?>	
						<div style="padding:4px">2. Gambar Potongan Kertas <?=$array2['kethitung'];?></div>
						<canvas id="myCanvas2" width="<?=($lbr_plano2 * 10)/4;?>" height="<?=($tinggi_plano2 * 10)/4;?>" style="border:2px solid #5B8C2A; background-color:#E7F6D9;"></canvas>
						<?php } ?>	
						
						<?php if(!empty($array3['hrgbhn'])){ 
							
							$lbr_plano3 = $array3['lbrbhan'];//$_GET['lbr_plano'];
							$tinggi_plano3 = $array3['tgbhan'];//$_GET['tinggi_plano'];
							$lbr_pot3 = $array3['lebarpotkertas'];//$_GET['lbr_pot'];
							$tinggi_pot3 = $array3['tinggipotkertas'];//$_GET['tinggi_pot'];
							if ($tinggi_plano3 > $lbr_plano3){
								$tinggi_plano3	= $array3['lbrbhan'];
								$lbr_plano3 		=  $array3['tgbhan'];
							}	
							$_potong3 = array('tinggicetak'=>$lbr_pot3,'lebarcetak'=>$tinggi_pot3,'panjangtext'=>$lbr_plano3,'lebartext'=>$tinggi_plano3);
							$push3 = array_merge($option,$_potong3);
							$sync3 = curl($config['SITE_APIS'].'/potong/get/',json_encode($push3));
							$hitpot3= json_decode($sync3,true);
							$hasil3 = json_encode($hitpot3[0]['jml']);
						?>	
						<div style="padding:4px">3. Gambar Potongan Kertas <?=$array3['kethitung'];?></div>
						<canvas id="myCanvas3" width="<?=($lbr_plano3 * 10)/4;?>" height="<?=($tinggi_plano3 * 10)/4;?>" style="border:2px solid #5B8C2A; background-color:#E7F6D9;"></canvas>
						<?php } ?>				
						
						
						<?php if(!empty($array4['hrgbhn'])){ 
							
							$lbr_plano4 = $array4['lbrbhan'];//$_GET['lbr_plano'];
							$tinggi_plano4 = $array4['tgbhan'];//$_GET['tinggi_plano'];
							$lbr_pot4 = $array4['lebarpotkertas'];//$_GET['lbr_pot'];
							$tinggi_pot4 = $array4['tinggipotkertas'];//$_GET['tinggi_pot'];
							if ($tinggi_plano4 > $lbr_plano4){
								$tinggi_plano4	= $array4['lbrbhan'];
								$lbr_plano4 		=  $array4['tgbhan'];
							}	
							$_potong4 = array('tinggicetak'=>$lbr_pot4,'lebarcetak'=>$tinggi_pot4,'panjangtext'=>$lbr_plano4,'lebartext'=>$tinggi_plano4);
							$push4 = array_merge($option,$_potong4);
							$sync4 = curl($config['SITE_APIS'].'/potong/get/',json_encode($push4));
							$hitpot4= json_decode($sync4,true);
							$hasil4 = json_encode($hitpot4[0]['jml']);
						?>	
						<div style="padding:4px">4. Gambar Potongan Kertas <?=$array4['kethitung'];?></div>
						<canvas id="myCanvas4" width="<?=($lbr_plano4 * 10)/4;?>" height="<?=($tinggi_plano4 * 10)/4;?>" style="border:2px solid #5B8C2A; background-color:#E7F6D9;"></canvas>
						<?php } ?>
						
						<?php if(!empty($array5['hrgbhn'])){ 
							
							$lbr_plano5 = $array5['lbrbhan'];//$_GET['lbr_plano'];
							$tinggi_plano5 = $array5['tgbhan'];//$_GET['tinggi_plano'];
							$lbr_pot5 = $array5['lebarpotkertas'];//$_GET['lbr_pot'];
							$tinggi_pot5 = $array5['tinggipotkertas'];//$_GET['tinggi_pot'];
							if ($tinggi_plano5 > $lbr_plano5){
								$tinggi_plano5	= $array5['lbrbhan'];
								$lbr_plano5 		=  $array5['tgbhan'];
							}	
							$_potong5 = array('tinggicetak'=>$lbr_pot5,'lebarcetak'=>$tinggi_pot5,'panjangtext'=>$lbr_plano5,'lebartext'=>$tinggi_plano5);
							$push5 = array_merge($option,$_potong5);
							$sync5 = curl($config['SITE_APIS'].'/potong/get/',json_encode($push5));
							$hitpot5= json_decode($sync5,true);
							$hasil5 = json_encode($hitpot5[0]['jml']);
						?>	
						<div style="padding:4px">5. Gambar Potongan Kertas <?=$array5['kethitung'];?></div>
						<canvas id="myCanvas5" width="<?=($lbr_plano5 * 10)/4;?>" height="<?=($tinggi_plano5 * 10)/4;?>" style="border:2px solid #5B8C2A; background-color:#E7F6D9;"></canvas>
						<?php } ?>
						<?php if(!empty($array6['hrgbhn'])){ 
							
							$lbr_plano6 = $array6['lbrbhan'];//$_GET['lbr_plano'];
							$tinggi_plano6 = $array6['tgbhan'];//$_GET['tinggi_plano'];
							$lbr_pot6 = $array6['lebarpotkertas'];//$_GET['lbr_pot'];
							$tinggi_pot6 = $array6['tinggipotkertas'];//$_GET['tinggi_pot'];
							if ($tinggi_plano6 > $lbr_plano6){
								$tinggi_plano6	= $array6['lbrbhan'];
								$lbr_plano6 		=  $array6['tgbhan'];
							}	
							$_potong6 = array('tinggicetak'=>$lbr_pot6,'lebarcetak'=>$tinggi_pot6,'panjangtext'=>$lbr_plano6,'lebartext'=>$tinggi_plano6);
							$push6 = array_merge($option,$_potong6);
							$sync6 = curl($config['SITE_APIS'].'/potong/get/',json_encode($push6));
							$hitpot6= json_decode($sync6,true);
							$hasil6 = json_encode($hitpot6[0]['jml']);
						?>	
						<div style="padding:4px">6. Gambar Potongan Kertas <?=$array6['kethitung'];?></div>
						<canvas id="myCanvas6" width="<?=($lbr_plano6 * 10)/4;?>" height="<?=($tinggi_plano6 * 10)/4;?>" style="border:2px solid #6B8C2A; background-color:#E7F6D9;"></canvas>
						<?php } ?>
						<?php if(!empty($array7['hrgbhn'])){ 
							
							$lbr_plano7 = $array7['lbrbhan'];//$_GET['lbr_plano'];
							$tinggi_plano7 = $array7['tgbhan'];//$_GET['tinggi_plano'];
							$lbr_pot7 = $array7['lebarpotkertas'];//$_GET['lbr_pot'];
							$tinggi_pot7 = $array7['tinggipotkertas'];//$_GET['tinggi_pot'];
							if ($tinggi_plano7 > $lbr_plano7){
								$tinggi_plano7	= $array7['lbrbhan'];
								$lbr_plano7 		=  $array7['tgbhan'];
							}	
							$_potong7 = array('tinggicetak'=>$lbr_pot7,'lebarcetak'=>$tinggi_pot7,'panjangtext'=>$lbr_plano7,'lebartext'=>$tinggi_plano7);
							$push7= array_merge($option,$_potong7);
							$sync7= curl($config['SITE_APIS'].'/potong/get/',json_encode($push7));
							$hitpot7= json_decode($sync7,true);
							$hasil7 = json_encode($hitpot7[0]['jml']);
						?>	
						<div style="padding:4px">7. Gambar Potongan Kertas <?=$array7['kethitung'];?></div>
						<canvas id="myCanvas7" width="<?=($lbr_plano7 * 10)/4;?>" height="<?=($tinggi_plano7 * 10)/4;?>" style="border:2px solid #7B8C2A; background-color:#E7F6D9;"></canvas>
						<?php } ?>
						<?php if(!empty($array8['hrgbhn'])){ 
							
							$lbr_plano8 = $array8['lbrbhan'];//$_GET['lbr_plano'];
							$tinggi_plano8 = $array8['tgbhan'];//$_GET['tinggi_plano'];
							$lbr_pot8 = $array8['lebarpotkertas'];//$_GET['lbr_pot'];
							$tinggi_pot8 = $array8['tinggipotkertas'];//$_GET['tinggi_pot'];
							if ($tinggi_plano8 > $lbr_plano8){
								$tinggi_plano8	= $array8['lbrbhan'];
								$lbr_plano8 		=  $array8['tgbhan'];
							}	
							$_potong8 = array('tinggicetak'=>$lbr_pot8,'lebarcetak'=>$tinggi_pot8,'panjangtext'=>$lbr_plano8,'lebartext'=>$tinggi_plano8);
							$push8= array_merge($option,$_potong8);
							$sync8= curl($config['SITE_APIS'].'/potong/get/',json_encode($push7));
							$hitpot8= json_decode($sync8,true);
							$hasil8 = json_encode($hitpot8[0]['jml']);
						?>	
						<div style="padding:4px">8. Gambar Potongan Kertas <?=$array8['kethitung'];?></div>
						<canvas id="myCanvas8" width="<?=($lbr_plano8 * 10)/4;?>" height="<?=($tinggi_plano8 * 10)/4;?>" style="border:2px solid #8B8C2A; background-color:#E8F6D9;"></canvas>
						<?php } ?>
						
						
					</td></tr>	
					
				</table>
			</div>
			<div class="col-md-4">		
				<table class='table table-striped' >
					<tr ><td colspan='2'><h4 style="padding:0px; margin-bottom:0px;">Hasil Perhitungan <?=$array['kethitung'];?></h4></td></tr>	
					<tr><td >Kertas yang dipakai</td><td>: <?=$array['jmlplano'];?> lbr <?=$array['Nm_Bhn'];?></td></tr>	
					<tr><td>Mesin yang dipakai</td><td>: <?=$array['mesin'];?></td></tr>	
					<tr><td>Jml Warna</td><td>: <?=$array['jmlwarna'] . "/" . $array['jmlwarna2'] ;?></td></tr>	
					<tr><td>Lebar Tarikan Mesin</td><td>: <?=$array['tarik'];?> cm</td></tr>	
					<tr><td>Muat</td><td>: <?=$array['muat'];?> model</td></tr>	
					<tr><td>Jumlah Set</td><td>: <?=$array['jmlset'] . " (" . $array['ketbb'] . ")";?> </td></tr>	
					<?php 
						if($array['jenismesin'] == 'PrintDigital' ){
							if($array['replat'] > 1 ){ ?>
							<tr><td>Replat</td><td>:</td></tr>	
							<?php 
							} 
							}else{
							if($array['replat'] > 1 ){ ?>
							<tr><td>Replat</td><td>: <?=rp($array['replat']) ;?> x (Replat setiap <?=$array['replatsetiap'];?> lbr)</td></tr>	
							<?php 
							} 
						}
					?>
					<tr><td>Jumlah Plat</td><td>: <?=$array['tot_plat'];?> lbr</td></tr>	
					<tr><td>Jumlah Cetak Real</td><td>: <?=$array['jmlbhn'];?> lbr</td></tr>	
					<tr><td>Insheet</td><td>: <?=$array['insheet'];?> lbr</td></tr>	
					<tr><td>Ukuran Cetak Real</td><td>: <?=$array['lebarpot'] . "x" . $array['tinggipot'];?> cm</td></tr>	
					<tr><td>Ukuran Potongan Kertas</td><td>: <?=$array['lebarpotkertas'] . "x" . $array['tinggipotkertas'];?> cm</td></tr>	
					<tr><td>Berat Kertas</td><td>: <?=$array['beratkertas'];?> Kg</td></tr>
				</table>		
				
				<?php if(!empty($array2['hrgbhn'])){ ?>
					
					<table class='table table-striped' >
						<tr ><td colspan='2'><h4 style="padding:0px; margin-bottom:0px;">Hasil Perhitungan <?=$array2['kethitung'];?></h4></td></tr>	
						<tr><td >Kertas yang dipakai</td><td>: <?=$array2['jmlplano'];?> lbr <?=$array2['Nm_Bhn'];?></td></tr>	
						
						<?php if(!empty($array2['totcetak'])){ ?>				
							<tr><td>Mesin yang dipakai</td><td>: <?=$array2['mesin'];?></td></tr>	
							<tr><td>Jml Warna</td><td>: <?=$array2['jmlwarna'] . "/" . $array2['jmlwarna2'] ;?></td></tr>	
							<tr><td>Lebar Tarikan Mesin</td><td>: <?=$array2['tarik'];?> cm</td></tr>	
							<tr><td>Muat</td><td>: <?=$array2['muat'];?> model</td></tr>	
							<tr><td>Jumlah Set</td><td>: <?=$array2['jmlset'] . " (" . $array2['ketbb'] . ")";?> </td></tr>	
							<?php 
								if($array2['jenismesin'] == 'PrintDigital' ){
									if($array2['replat'] > 1 ){ ?>
									<tr><td>Replat a</td><td>:</td></tr>	
									<?php 
									} 
									}else{
									if($array2['replat'] > 1 ){ ?>
									<tr><td>Replat a</td><td>: <?=$array2['replat'] ;?> x (Replat setiap <?=$array2['replatsetiap'];?> lbr)</td></tr>	
									<?php 
									} 
								}
							?>
							
							<tr><td>Jumlah Plat</td><td>: <?=$array2['tot_plat'];?> lbr</td></tr>	
							<tr><td>Jumlah Cetak Real</td><td>: <?=$array2['jmlbhn'];?> lbr</td></tr>
						<?php } ?>			
						<tr><td>Insheet</td><td>: <?=$array2['insheet'];?> lbr</td></tr>	
						<tr><td>Jumlah Kertas</td><td>: <?=$array2['jmlbhn'] + $array2['insheet'];?> lbr Uk. <?=$array2['lebarpotkertas'] . "x" . $array2['tinggipotkertas'];?> cm</td></tr>	
						<?php if($array2['totcetak'] > 0){ ?>				
							<tr><td>Ukuran Cetak Real</td><td>: <?=$array2['lebarpot'] . "x" . $array2['tinggipot'];?> cm</td></tr>	
						<?php } ?>				
						<tr><td>Ukuran Potongan Kertas</td><td>: <?=$array2['lebarpotkertas'] . "x" . $array2['tinggipotkertas'];?> cm</td></tr>	
						<tr><td>Berat Kertas</td><td>: <?=$array2['beratkertas'];?> Kg</td></tr>
					</table>
					
				<?php } ?>	
				
				
				<?php if(!empty($array3['hrgbhn'])){ ?>
					
					<table class='table table-striped' >
						<tr ><td colspan='2'><h4 style="padding:0px; margin-bottom:0px;">Hasil Perhitungan <?=$array3['kethitung'];?></h4></td></tr>	
						<tr><td >Kertas yang dipakai</td><td>: <?=$array3['jmlplano'];?> lbr <?=$array3['Nm_Bhn'];?></td></tr>	
						
						<?php if(!empty($array3['totcetak'])){ ?>				
							<tr><td>Mesin yang dipakai</td><td>: <?=$array3['mesin'];?></td></tr>	
							<tr><td>Jml Warna</td><td>: <?=$array3['jmlwarna'] . "/" . $array3['jmlwarna2'] ;?></td></tr>	
							<tr><td>Lebar Tarikan Mesin</td><td>: <?=$array3['tarik'];?> cm</td></tr>	
							<tr><td>Muat</td><td>: <?=$array3['muat'];?> model</td></tr>	
							<tr><td>Jumlah Set</td><td>: <?=$array3['jmlset'] . " (" . $array3['ketbb'] . ")";?> </td></tr>	
							<?php if($array3['replat'] > 1 ){ ?>
								<tr><td>Replat b</td><td>: <?=$array3['replat'] ;?> x (Replat setiap <?=$array3['replatsetiap'];?> lbr)</td></tr>	
							<?php } ?>
							
							<tr><td>Jumlah Plat</td><td>: <?=$array3['tot_plat'];?> lbr</td></tr>	
							<tr><td>Jumlah Cetak Real</td><td>: <?=$array3['jmlbhn'];?> lbr</td></tr>
						<?php } ?>			
						<tr><td>Insheet</td><td>: <?=$array3['insheet'];?> lbr</td></tr>	
						<tr><td>Jumlah Kertas</td><td>: <?=$array3['jmlbhn'] + $array3['insheet'];?> lbr Uk. <?=$array3['lebarpotkertas'] . "x" . $array3['tinggipotkertas'];?> cm</td></tr>	
						<?php if($array3['totcetak'] > 0){ ?>				
							<tr><td>Ukuran Cetak Real</td><td>: <?=$array3['lebarpot'] . "x" . $array3['tinggipot'];?> cm</td></tr>	
						<?php } ?>				
						<tr><td>Ukuran Potongan Kertas</td><td>: <?=$array3['lebarpotkertas'] . "x" . $array3['tinggipotkertas'];?> cm</td></tr>	
						<tr><td>Berat Kertas</td><td>: <?=$array3['beratkertas'];?> Kg</td></tr>
					</table>
					
				<?php } ?>			
				
				
				<?php if(!empty($array4['hrgbhn'])){ ?>
					
					<table class='table table-striped' >
						<tr ><td colspan='2'><h4 style="padding:0px; margin-bottom:0px;">Hasil Perhitungan <?=$array4['kethitung'];?></h4></td></tr>	
						<tr><td >Kertas yang dipakai</td><td>: <?=$array4['jmlplano'];?> lbr <?=$array4['Nm_Bhn'];?></td></tr>	
						
						<?php if(!empty($array4['totcetak'])){ ?>				
							<tr><td>Mesin yang dipakai</td><td>: <?=$array4['mesin'];?></td></tr>	
							<tr><td>Jml Warna</td><td>: <?=$array4['jmlwarna'] . "/" . $array4['jmlwarna2'] ;?></td></tr>	
							<tr><td>Lebar Tarikan Mesin</td><td>: <?=$array4['tarik'];?> cm</td></tr>	
							<tr><td>Muat</td><td>: <?=$array4['muat'];?> model</td></tr>	
							<tr><td>Jumlah Set</td><td>: <?=$array4['jmlset'] . " (" . $array4['ketbb'] . ")";?> </td></tr>	
							<?php if($array4['replat'] > 1 ){ ?>
								<tr><td>Replat c</td><td>: <?=$array4['replat'] ;?> x (Replat setiap <?=$array4['replatsetiap'];?> lbr)</td></tr>	
							<?php } ?>
							
							<tr><td>Jumlah Plat</td><td>: <?=$array4['tot_plat'];?> lbr</td></tr>	
							<tr><td>Jumlah Cetak Real</td><td>: <?=$array4['jmlbhn'];?> lbr</td></tr>
						<?php } ?>			
						<tr><td>Insheet</td><td>: <?=$array4['insheet'];?> lbr</td></tr>	
						<tr><td>Jumlah Kertas</td><td>: <?=$array4['jmlbhn'] + $array4['insheet'];?> lbr Uk. <?=$array4['lebarpotkertas'] . "x" . $array4['tinggipotkertas'];?> cm</td></tr>	
						<?php if($array4['totcetak'] > 0){ ?>				
							<tr><td>Ukuran Cetak Real</td><td>: <?=$array4['lebarpot'] . "x" . $array4['tinggipot'];?> cm</td></tr>	
						<?php } ?>				
						<tr><td>Ukuran Potongan Kertas</td><td>: <?=$array4['lebarpotkertas'] . "x" . $array4['tinggipotkertas'];?> cm</td></tr>	
						<tr><td>Berat Kertas</td><td>: <?=$array4['beratkertas'];?> Kg</td></tr>
					</table>
					
				<?php } ?>		
				
				<?php if(!empty($array5['hrgbhn'])){ ?>
					
					<table class='table table-striped' >
						<tr ><td colspan='2'><h4 style="padding:0px; margin-bottom:0px;">Hasil Perhitungan <?=$array5['kethitung'];?></h4></td></tr>	
						<tr><td >Kertas yang dipakai</td><td>: <?=$array5['jmlplano'];?> lbr <?=$array5['Nm_Bhn'];?></td></tr>	
						
						<?php if(!empty($array5['totcetak'])){ ?>				
							<tr><td>Mesin yang dipakai</td><td>: <?=$array5['mesin'];?></td></tr>	
							<tr><td>Jml Warna</td><td>: <?=$array5['jmlwarna'] . "/" . $array5['jmlwarna2'] ;?></td></tr>	
							<tr><td>Lebar Tarikan Mesin</td><td>: <?=$array5['tarik'];?> cm</td></tr>	
							<tr><td>Muat</td><td>: <?=$array5['muat'];?> model</td></tr>	
							<tr><td>Jumlah Set</td><td>: <?=$array5['jmlset'] . " (" . $array5['ketbb'] . ")";?> </td></tr>	
							<?php if($array5['replat'] > 1 ){ ?>
								<tr><td>Replat d</td><td>: <?=$array5['replat'] ;?> x (Replat setiap <?=$array5['replatsetiap'];?> lbr)</td></tr>	
							<?php } ?>
							
							<tr><td>Jumlah Plat</td><td>: <?=$array5['tot_plat'];?> lbr</td></tr>	
							<tr><td>Jumlah Cetak Real</td><td>: <?=$array5['jmlbhn'];?> lbr</td></tr>
						<?php } ?>			
						<tr><td>Insheet</td><td>: <?=$array5['insheet'];?> lbr</td></tr>	
						<tr><td>Jumlah Kertas</td><td>: <?=$array5['jmlbhn'] + $array5['insheet'];?> lbr Uk. <?=$array5['lebarpotkertas'] . "x" . $array5['tinggipotkertas'];?> cm</td></tr>	
						<?php if($array5['totcetak'] > 0){ ?>				
							<tr><td>Ukuran Cetak Real</td><td>: <?=$array5['lebarpot'] . "x" . $array5['tinggipot'];?> cm</td></tr>	
						<?php } ?>				
						<tr><td>Ukuran Potongan Kertas</td><td>: <?=$array5['lebarpotkertas'] . "x" . $array5['tinggipotkertas'];?> cm</td></tr>	
						<tr><td>Berat Kertas</td><td>: <?=$array5['beratkertas'];?> Kg</td></tr>
					</table>
					
				<?php } ?>			
				
				<?php if(!empty($array6['hrgbhn'])){ ?>
					
					<table class='table table-striped' >
						<tr ><td colspan='2'><h4 style="padding:0px; margin-bottom:0px;">Hasil Perhitungan <?=$array6['kethitung'];?></h4></td></tr>	
						<tr><td >Kertas yang dipakai</td><td>: <?=$array6['jmlplano'];?> lbr <?=$array6['Nm_Bhn'];?></td></tr>	
						
						<?php if(!empty($array6['totcetak'])){ ?>				
							<tr><td>Mesin yang dipakai</td><td>: <?=$array6['mesin'];?></td></tr>	
							<tr><td>Jml Warna</td><td>: <?=$array6['jmlwarna'] . "/" . $array6['jmlwarna2'] ;?></td></tr>	
							<tr><td>Lebar Tarikan Mesin</td><td>: <?=$array6['tarik'];?> cm</td></tr>	
							<tr><td>Muat</td><td>: <?=$array6['muat'];?> model</td></tr>	
							<tr><td>Jumlah Set</td><td>: <?=$array6['jmlset'] . " (" . $array6['ketbb'] . ")";?> </td></tr>	
							<?php if($array6['replat'] > 1 ){ ?>
								<tr><td>Replat e</td><td>: <?=$array6['replat'] ;?> x (Replat setiap <?=$array6['replatsetiap'];?> lbr)</td></tr>	
							<?php } ?>
							
							<tr><td>Jumlah Plat</td><td>: <?=$array6['tot_plat'];?> lbr</td></tr>	
							<tr><td>Jumlah Cetak Real</td><td>: <?=$array6['jmlbhn'];?> lbr</td></tr>
						<?php } ?>			
						<tr><td>Insheet</td><td>: <?=$array6['insheet'];?> lbr</td></tr>	
						<tr><td>Jumlah Kertas</td><td>: <?=$array6['jmlbhn'] + $array6['insheet'];?> lbr Uk. <?=$array6['lebarpotkertas'] . "x" . $array6['tinggipotkertas'];?> cm</td></tr>	
						<?php if($array6['totcetak'] > 0){ ?>				
							<tr><td>Ukuran Cetak Real</td><td>: <?=$array6['lebarpot'] . "x" . $array6['tinggipot'];?> cm</td></tr>	
						<?php } ?>				
						<tr><td>Ukuran Potongan Kertas</td><td>: <?=$array6['lebarpotkertas'] . "x" . $array6['tinggipotkertas'];?> cm</td></tr>	
						<tr><td>Berat Kertas</td><td>: <?=$array6['beratkertas'];?> Kg</td></tr>
					</table>
					
				<?php } ?>	
				
				<?php if(!empty($array7['hrgbhn'])){ ?>
					
					<table class='table table-striped' >
						<tr ><td colspan='2'><h4 style="padding:0px; margin-bottom:0px;">Hasil Perhitungan <?=$array7['kethitung'];?></h4></td></tr>	
						<tr><td >Kertas yang dipakai</td><td>: <?=$array7['jmlplano'];?> lbr <?=$array7['Nm_Bhn'];?></td></tr>	
						
						<?php if(!empty($array7['totcetak'])){ ?>				
							<tr><td>Mesin yang dipakai</td><td>: <?=$array7['mesin'];?></td></tr>	
							<tr><td>Jml Warna</td><td>: <?=$array7['jmlwarna'] . "/" . $array7['jmlwarna2'] ;?></td></tr>	
							<tr><td>Lebar Tarikan Mesin</td><td>: <?=$array7['tarik'];?> cm</td></tr>	
							<tr><td>Muat</td><td>: <?=$array7['muat'];?> model</td></tr>	
							<tr><td>Jumlah Set</td><td>: <?=$array7['jmlset'] . " (" . $array7['ketbb'] . ")";?> </td></tr>	
							<?php if($array7['replat'] > 1 ){ ?>
								<tr><td>Replat f</td><td>: <?=$array7['replat'] ;?> x (Replat setiap <?=$array7['replatsetiap'];?> lbr)</td></tr>	
							<?php } ?>
							
							<tr><td>Jumlah Plat</td><td>: <?=$array7['tot_plat'];?> lbr</td></tr>	
							<tr><td>Jumlah Cetak Real</td><td>: <?=$array7['jmlbhn'];?> lbr</td></tr>	
						<?php } ?>			
						<tr><td>Insheet</td><td>: <?=$array7['insheet'];?> lbr</td></tr>	
						<tr><td>Jumlah Kertas</td><td>: <?=$array7['jmlbhn'] + $array7['insheet'];?> lbr Uk. <?=$array7['lebarpotkertas'] . "x" . $array7['tinggipotkertas'];?> cm</td></tr>	
						<?php if($array7['totcetak'] > 0){ ?>				
							<tr><td>Ukuran Cetak Real</td><td>: <?=$array7['lebarpot'] . "x" . $array7['tinggipot'];?> cm</td></tr>	
						<?php } ?>				
						<tr><td>Ukuran Potongan Kertas</td><td>: <?=$array7['lebarpotkertas'] . "x" . $array7['tinggipotkertas'];?> cm</td></tr>	
						<tr><td>Berat Kertas</td><td>: <?=$array7['beratkertas'];?> Kg</td></tr>
					</table>
					
				<?php } ?>
				
				<?php if(!empty($array8['hrgbhn'])){ ?>
					
					<table class='table table-striped' >
						<tr ><td colspan='2'><h4 style="padding:0px; margin-bottom:0px;">Hasil Perhitungan <?=$array8['kethitung'];?></h4></td></tr>	
						<tr><td >Kertas yang dipakai</td><td>: <?=$array8['jmlplano'];?> lbr <?=$array8['Nm_Bhn'];?></td></tr>	
						
						<?php if(!empty($array8['totcetak'])){ ?>				
							<tr><td>Mesin yang dipakai</td><td>: <?=$array8['mesin'];?></td></tr>	
							<tr><td>Jml Warna</td><td>: <?=$array8['jmlwarna'] . "/" . $array8['jmlwarna2'] ;?></td></tr>	
							<tr><td>Lebar Tarikan Mesin</td><td>: <?=$array8['tarik'];?> cm</td></tr>	
							<tr><td>Muat</td><td>: <?=$array8['muat'];?> model</td></tr>	
							<tr><td>Jumlah Set</td><td>: <?=$array8['jmlset'] . " (" . $array8['ketbb'] . ")";?> </td></tr>	
							<?php if($array8['replat'] > 1 ){ ?>
								<tr><td>Replat g</td><td>: <?=$array8['replat'] ;?> x (Replat setiap <?=$array8['replatsetiap'];?> lbr)</td></tr>	
							<?php } ?>
							
							<tr><td>Jumlah Plat</td><td>: <?=$array8['tot_plat'];?> lbr</td></tr>	
							<tr><td>Jumlah Cetak Real</td><td>: <?=$array8['jmlbhn'];?> lbr</td></tr>
						<?php } ?>			
						<tr><td>Insheet</td><td>: <?=$array8['insheet'];?> lbr</td></tr>	
						<tr><td>Jumlah Kertas</td><td>: <?=$array8['jmlbhn'] + $array8['insheet'];?> lbr Uk. <?=$array8['lebarpotkertas'] . "x" . $array8['tinggipotkertas'];?> cm</td></tr>	
						<?php if($array8['totcetak'] > 0){ ?>				
							<tr><td>Ukuran Cetak Real</td><td>: <?=$array8['lebarpot'] . "x" . $array8['tinggipot'];?> cm</td></tr>	
						<?php } ?>				
						<tr><td>Ukuran Potongan Kertas</td><td>: <?=$array8['lebarpotkertas'] . "x" . $array8['tinggipotkertas'];?> cm</td></tr>	
						<tr><td>Berat Kertas</td><td>: <?=$array8['beratkertas'];?> Kg</td></tr>
					</table>
					
				<?php } ?>								
				
				
				
			</div>
			<?php 
				
				// $sqlp = mysql_query("SELECT pub FROM payment where email='$_SESSION[mailuser]'"); 
				// $pub=mysql_fetch_array($sqlp);
			?>
			<div class="col-md-5">
				<table class='table table-striped' >
					<tr ><td colspan='3'><h4 style="padding:0px; margin-bottom:0px;">Perhitungan Biaya <?=$array['kethitung'];?></h4></td></tr>
					
					<!-- Tampilkan jika level user adalah admin -->				
					<tr><td>OC (Hrg Min Rp. <?=rp($array['hargaminim']);?> 
						
						<?php
							if ($array['hargadrek'] > 0 AND $array['jenismesin']!="PrintDigital"){
								echo "- Hrg Drek " . $array['hargadrek'] . " - ";
								}else {
								echo " - ";
							} 
							echo " Jml Min " . $array['jmlminim'];
						?> 
					)</td><td style="width:5%!important">Rp.</td><td style="width:15%!important" class="text-right"><?=rp($array['totcetak']);?></td></tr>	
					
					<tr><td>Biaya Bahan (@<?=rp($array['hrgbhn']);?> x <?=$array['jmlplano'];?> )</td><td>Rp.</td><td class="text-right"><?=rp($array['totbhn']);?></td></tr>
					<?php if ($array['tot_ctp'] > 0){ ?>			
						<tr><td>Plat/CTP (@<?=rp($array['ctp']);?> x <?=$array['tot_plat'];?>)</td><td>Rp.</td><td class="text-right"><?=rp($array['tot_ctp']);?></td></tr>
					<?php } ?>		
					
					<?php if ($array['ongpot'] == 'Y'){
						if ($array['beratkertas'] == 0){ ?>
						<tr><td>Ongk. Potong Kertas</td><td>Rp.</td><td class="text-right">0</td></tr>
						<?php }else{ ?>
						<tr><td>Ongk. Potong Kertas (Min Rp. <?=rp($array['hargapotmin']);?> - Lebih <?=rp($array['hargapot']);?>)</td><td>Rp.</td><td class="text-right"><?=rp($array['ongkos_potong']);?></td></tr>	
						<?php }
					} ?>		
					
					<?php if($array['totlaminating'] > 0){ ?>
						<tr><td>Laminating (Hrg Min <?=rp($array['lamminim']);?> - Hrg Lebih <?=($array['lamlebih']);?> )</td><td>Rp.</td><td class="text-right"><?=rp($array['totlaminating']);?></td></tr>	
					<?php } ?>	
					
					
					<?php if(!empty($array['nmfinishing1'])){ ?>
						<tr>
							<td> <?php echo $array['nmfinishing1'] . " (Hrg Min" . rp($array['hrgfinishing1min']) ." - Hrg Lebih " . rp($array['hrgfinishing1lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array['finishing1']);?></td>
						</tr>
					<?php } ?>			
					
					<?php if(!empty($array['nmfinishing2'])){ ?>
						<tr>
							<td> <?php echo $array['nmfinishing2'] . " (Hrg Min" . rp($array['hrgfinishing2min']) ." - Hrg Lebih " . rp($array['hrgfinishing2lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array['finishing2']);?></td>
						</tr>
					<?php } ?>		
					
					<?php if(!empty($array['nmfinishing3'])){ ?>
						<tr>
							<td> <?php echo $array['nmfinishing3'] . " (Hrg Min" . rp($array['hrgfinishing3min']) ." - Hrg Lebih " . rp($array['hrgfinishing3lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array['finishing3']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array['nmfinishing4'])){ ?>
						<tr>
							<td> <?php echo $array['nmfinishing4'] . " (Hrg Min" . rp($array['hrgfinishing4min']) ." - Hrg Lebih " . rp($array['hrgfinishing4lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array['finishing4']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array['nmfinishing5'])){ ?>
						<tr>
							<td> <?php echo $array['nmfinishing5'] . " (Hrg Min" . rp($array['hrgfinishing5min']) ." - Hrg Lebih " . rp($array['hrgfinishing5lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array['finishing5']);?></td>
						</tr>
					<?php } ?>			
					
					<?php if(!empty($array['nmfinishing6'])){ ?>
						<tr>
							<td> <?php echo $array['nmfinishing6'] . " (Hrg Min" . rp($array['hrgfinishing6min']) ." - Hrg Lebih " . rp($array['hrgfinishing6lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array['finishing6']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array['nmfinishing7'])){ ?>
						<tr>
							<td> <?php echo $array['nmfinishing7'] . " (Hrg Min" . rp($array['hrgfinishing7min']) ." - Hrg Lebih " . $array['hrgfinishing7lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array['finishing7']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array['nmfinishing8'])){ ?>
						<tr>
							<td> <?php echo $array['nmfinishing8'] . " (Hrg Min" . rp($array['hrgfinishing8min']) ." - Hrg Lebih " . $array['hrgfinishing8lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array['finishing8']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array['nmfinishing9'])){ ?>
						<tr>
							<td> <?php echo $array['nmfinishing9'] . " (Hrg Min" . rp($array['hrgfinishing9min']) ." - Hrg Lebih " . $array['hrgfinishing9lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array['finishing9']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array['nmfinishing10'])){ ?>
						<tr>
							<td> <?php echo $array['nmfinishing10'] . " (Hrg Min" . rp($array['hrgfinishing10min']) ." - Hrg Lebih " . $array['hrgfinishing10lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array['finishing10']);?></td>
						</tr>
					<?php } ?>	
					
					
					<?php if($array['tot_lipat'] <> 0){ ?>
						<tr>
							<td> Ongkos Lipat </td><td>Rp.</td><td class="text-right"><?=rp($array['tot_lipat']);?></td>
						</tr>
					<?php } ?>	
					
					
					
					
					
					<!-- sampai sini tampilkan totalnya-->				
					
					<?php
						if ($array['ongpot'] == 'N'){
							$ongkos_potong = 0;
							}else{
							if ($array['beratkertas'] == 0){
								$ongkos_potong = 0;
								}else{
								$ongkos_potong = $array['ongkos_potong'];
							}
						}
						
						$total1 = $array['totcetak'] + $array['totbhn'] + $array['tot_ctp'] + $ongkos_potong + $array['totlaminating'] + $array['finishing1'] + $array['finishing2'] + $array['finishing3'] + $array['finishing4'] + $array['finishing5'] + $array['finishing6']+ $array['finishing7']+ $array['finishing8']+ $array['finishing9']+ $array['finishing10']+ $array['tot_lipat'];
					?>
					
					<?php if(!empty($array['hrgbhn'])){ ?>
						<tr><td>Total</td><td>Rp.</td><td  class="text-right"><?=rp($total1);?></td></tr>	
					<?php } ?>				
				</table>
				
				
				
				
				<?php
					if ($array2['ongpot'] == 'N'){
						$ongkos_potong = 0;
						}else{
						if ($array2['beratkertas'] == 0){
							$ongkos_potong = 0;
							}else{
							$ongkos_potong = $array2['ongkos_potong'];
						}
					}
					if($array['jenismesin'] == 'PrintDigital' ){
					$persen = 0;
					}else{
					$persen = $array['persen'];
					}
					$total2 = $array2['totcetak'] + $array2['totbhn'] + $array2['tot_ctp'] + $ongkos_potong + $array2['totlaminating'] + $array2['finishing1'] + $array2['finishing2'] + $array2['finishing3'] + $array2['finishing4'] + $array2['finishing5'] + $array2['finishing6']+ $array2['finishing7']+ $array2['finishing8']+ $array2['finishing9']+ $array2['finishing10']+ $array2['tot_lipat'] ;
					$subtotal = $total1 + $total2;
					$profit = $subtotal * ($persen / 100);
					$grandtotal = $subtotal + $profit;	
					
				?>			
				
				
				<?php if(!empty($array2['hrgbhn'])){ ?>
					
					<table class='table table-striped'>
						<tr><td colspan='3'><h4 style="padding:0px; margin-bottom:0px;">Perhitungan Biaya 2 <?=$array2['kethitung'];?></h4></td></tr>
						
						<?php if($array2['totcetak'] > 0){ ?>
							<tr><td>OC (Hrg Min Rp. <?=rp($array2['hargaminim']);?> 
								
								<?php if ($array2['hargadrek'] > 0 AND $array2['jenismesin']!="PrintDigital"){
									echo "- Hrg Drek " . $array2['hargadrek'] . " - ";
									}else {
									echo " - ";
								} 
								echo " Jml Min " . $array2['jmlminim'];
								?> 
							)</td><td >Rp.</td><td class="text-right"><?=rp($array2['totcetak']);?></td></tr>	
						<?php } ?>		
						
						<tr><td>Biaya Bahan (@<?=$array2['hrgbhn'];?> x <?=$array2['jmlplano'];?> )</td><td>Rp.</td><td class="text-right"><?=rp($array2['totbhn']);?></td></tr>
						<?php if ($array2['tot_ctp'] > 0){ ?>			
							<tr><td>Plat/CTP (@<?=rp($array2['ctp']);?>)</td><td>Rp.</td><td class="text-right"><?=rp($array2['tot_ctp']);?></td></tr>
						<?php } ?>		
						
						<?php if ($array2['ongpot'] == 'Y'){
							if ($array2['beratkertas'] == 0){ ?>
							<tr><td>Ongk. Potong Kertas</td><td>Rp.</td><td>0</td></tr>
							<?php }else{ ?>
							<tr><td>Ongk. Potong Kertas (Min Rp. <?=rp($array2['hargapotmin']);?> - Lebih <?=rp($array2['hargapot']);?>)</td><td>Rp.</td><td class="text-right"><?=rp($array2['ongkos_potong']);?></td></tr>	
							<?php }
						} ?>	
						
						<?php if($array2['totlaminating'] > 0){ ?>
							<tr><td>Laminating (Hrg Min <?=rp($array2['lamminim']);?> - Hrg Lebih <?=rp($array2['lamlebih']);?> )</td><td>Rp.</td><td class="text-right"><?=rp($array2['totlaminating']);?></td></tr>	
						<?php } ?>	
						
						
						<?php if(!empty($array2['nmfinishing1'])){ ?>
							<tr>
								<td> <?php echo $array2['nmfinishing1'] . " (Hrg Min" . rp($array2['hrgfinishing1min']) ." - Hrg Lebih " . rp($array2['hrgfinishing1lebih']) ." )";?>
								</td><td>Rp.</td><td class="text-right"><?=rp($array2['finishing1']);?></td>
							</tr>
						<?php } ?>			
						
						<?php if(!empty($array2['nmfinishing2'])){ ?>
							<tr>
								<td> <?php echo $array2['nmfinishing2'] . " (Hrg Min" . rp($array2['hrgfinishing2min']) ." - Hrg Lebih " . rp($array2['hrgfinishing2lebih']) ." )";?>
								</td><td>Rp.</td><td class="text-right"><?=rp($array2['finishing2']);?></td>
							</tr>
						<?php } ?>		
						
						<?php if(!empty($array2['nmfinishing3'])){ ?>
							<tr>
								<td> <?php echo $array2['nmfinishing3'] . " (Hrg Min" . rp($array2['hrgfinishing3min']) ." - Hrg Lebih " . rp($array2['hrgfinishing3lebih']) ." )";?>
								</td><td>Rp.</td><td class="text-right"><?=rp($array2['finishing3']);?></td>
							</tr>
						<?php } ?>	
						
						<?php if(!empty($array2['nmfinishing4'])){ ?>
							<tr>
								<td> <?php echo $array2['nmfinishing4'] . " (Hrg Min" . rp($array2['hrgfinishing4min']) ." - Hrg Lebih " . rp($array2['hrgfinishing4lebih']) ." )";?>
								</td><td>Rp.</td><td class="text-right"><?=rp($array2['finishing4']);?></td>
							</tr>
						<?php } ?>	
						
						<?php if(!empty($array2['nmfinishing5'])){ ?>
							<tr>
								<td> <?php echo $array2['nmfinishing5'] . " (Hrg Min" . rp($array2['hrgfinishing5min']) ." - Hrg Lebih " . rp($array2['hrgfinishing5lebih']) ." )";?>
								</td><td>Rp.</td><td class="text-right"><?=rp($array2['finishing5']);?></td>
							</tr>
						<?php } ?>			
						
						<?php if(!empty($array2['nmfinishing6'])){ ?>
							<tr>
								<td> <?php echo $array2['nmfinishing6'] . " (Hrg Min" . rp($array2['hrgfinishing6min']) ." - Hrg Lebih " . rp($array2['hrgfinishing6lebih']) ." )";?>
								</td><td>Rp.</td><td class="text-right"><?=rp($array2['finishing6']);?></td>
							</tr>
						<?php } ?>
						
						<?php if(!empty($array2['nmfinishing7'])){ ?>
							<tr>
								<td> <?php echo $array2['nmfinishing7'] . " (Hrg Min" . rp($array2['hrgfinishing7min']) ." - Hrg Lebih " . $array2['hrgfinishing7lebih'] ." )";?>
								</td><td>Rp.</td><td class="text-right"><?=rp($array2['finishing7']);?></td>
							</tr>
						<?php } ?>	
						
						<?php if(!empty($array2['nmfinishing8'])){ ?>
							<tr>
								<td> <?php echo $array2['nmfinishing8'] . " (Hrg Min" . rp($array2['hrgfinishing8min']) ." - Hrg Lebih " . $array2['hrgfinishing8lebih'] ." )";?>
								</td><td>Rp.</td><td class="text-right"><?=rp($array2['finishing8']);?></td>
							</tr>
						<?php } ?>	
						
						<?php if(!empty($array2['nmfinishing9'])){ ?>
							<tr>
								<td> <?php echo $array2['nmfinishing9'] . " (Hrg Min" . rp($array2['hrgfinishing9min']) ." - Hrg Lebih " . $array2['hrgfinishing9lebih'] ." )";?>
								</td><td>Rp.</td><td class="text-right"><?=rp($array2['finishing9']);?></td>
							</tr>
						<?php } ?>	
						
						<?php if(!empty($array2['nmfinishing10'])){ ?>
							<tr>
								<td> <?php echo $array2['nmfinishing10'] . " (Hrg Min" . rp($array2['hrgfinishing10min']) ." - Hrg Lebih " . $array2['hrgfinishing10lebih'] ." )";?>
								</td><td>Rp.</td><td class="text-right"><?=rp($array2['finishing10']);?></td>
							</tr>
						<?php } ?>	
						
						
						
						<?php if($array2['tot_lipat'] <> 0){ ?>
							<tr>
								<td> Ongkos Lipat </td><td>Rp.</td><td class="text-right"><?=rp($array2['tot_lipat']);?></td>
							</tr>
						<?php } ?>	
						
						
						
						<tr><td>Total</td><td>Rp.</td><td  class="text-right"><?=rp($total2);?></td></tr>	
					</table>
					
				<?php } ?>	
				
				
				
				<?php if(!empty($array3['hrgbhn'])){ 
					if ($array3['ongpot'] == 'N'){
						$ongkos_potong = 0;
						}else{
						if ($array3['beratkertas'] == 0){
							$ongkos_potong = 0;
							}else{
							$ongkos_potong = $array3['ongkos_potong'];
						}
					}
					if($array['jenismesin'] == 'PrintDigital' ){
					$persen = 0;
					}else{
					$persen = $array['persen'];
					}
					$total3 = $array3['totcetak'] + $array3['totbhn'] + $array3['tot_ctp'] + $ongkos_potong + $array3['totlaminating'] + $array3['finishing1'] + $array3['finishing2'] + $array3['finishing3'] + $array3['finishing4'] + $array3['finishing5'] + $array3['finishing6'] + $array3['finishing7']+ $array3['finishing8']+ $array3['finishing9']+ $array3['finishing10']+ $array3['tot_lipat'] ;
					$subtotal = $total1 + $total2 +  $total3;
					$profit = $subtotal * ($persen / 100);
					$grandtotal = $subtotal + $profit;	
					
				?>			
				
				
				
				<table class='table table-striped' >
					<tr ><td colspan='3'><h4 style="padding:0px; margin-bottom:0px;">Perhitungan Biaya <?=$array3['kethitung'];?></h4></td></tr>
					
					<?php if($array3['totcetak'] > 0){ ?>
						<tr><td>OC (Hrg Min Rp. <?=rp($array3['hargaminim']);?> 
							
							<?php if ($array3['hargadrek'] > 0 AND $array3['jenismesin']!="PrintDigital"){
								echo "- Hrg Drek " . $array3['hargadrek'] . " - ";
								}else {
								echo " - ";
							} 
							echo " Jml Min " . $array3['jmlminim'];
							?> 
						)</td><td >Rp.</td><td class="text-right"><?=rp($array3['totcetak']);?></td></tr>	
					<?php } ?>		
					
					<tr><td>Biaya Bahan (@<?=$array3['hrgbhn'];?> x <?=$array3['jmlplano'];?> )</td><td>Rp.</td><td class="text-right"><?=rp($array3['totbhn']);?></td></tr>
					<?php if ($array3['tot_ctp'] > 0){ ?>			
						<tr><td>Plat/CTP (@<?=rp($array3['ctp']);?>)</td><td>Rp.</td><td class="text-right"><?=rp($array3['tot_ctp']);?></td></tr>
					<?php } ?>		
					
					<?php if ($array3['ongpot'] == 'Y'){
						if ($array3['beratkertas'] == 0){ ?>
						<tr><td>Ongk. Potong Kertas</td><td>Rp.</td><td>0</td></tr>
						<?php }else{ ?>
						<tr><td>Ongk. Potong Kertas (Min Rp. <?=rp($array3['hargapotmin']);?> - Lebih <?=rp($array3['hargapot']);?>)</td><td>Rp.</td><td class="text-right"><?=rp($array3['ongkos_potong']);?></td></tr>	
						<?php }
					} ?>
					
					<?php if($array3['totlaminating'] > 0){ ?>
						<tr><td>Laminating (Hrg Min <?=rp($array3['lamminim']);?> - Hrg Lebih <?=rp($array3['lamlebih']);?> )</td><td>Rp.</td><td class="text-right"><?=rp($array3['totlaminating']);?></td></tr>	
					<?php } ?>	
					
					
					<?php if(!empty($array3['nmfinishing1'])){ ?>
						<tr>
							<td> <?php echo $array3['nmfinishing1'] . " (Hrg Min" . rp($array3['hrgfinishing1min']) ." - Hrg Lebih " . rp($array3['hrgfinishing1lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array3['finishing1']);?></td>
						</tr>
					<?php } ?>			
					
					<?php if(!empty($array3['nmfinishing2'])){ ?>
						<tr>
							<td> <?php echo $array3['nmfinishing2'] . " (Hrg Min" . rp($array3['hrgfinishing2min']) ." - Hrg Lebih " . rp($array3['hrgfinishing2lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array3['finishing2']);?></td>
						</tr>
					<?php } ?>		
					
					<?php if(!empty($array3['nmfinishing3'])){ ?>
						<tr>
							<td> <?php echo $array3['nmfinishing3'] . " (Hrg Min" . rp($array3['hrgfinishing3min']) ." - Hrg Lebih " . rp($array3['hrgfinishing3lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array3['finishing3']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array3['nmfinishing4'])){ ?>
						<tr>
							<td> <?php echo $array3['nmfinishing4'] . " (Hrg Min" . rp($array3['hrgfinishing4min']) ." - Hrg Lebih " . rp($array3['hrgfinishing4lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array3['finishing4']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array3['nmfinishing5'])){ ?>
						<tr>
							<td> <?php echo $array3['nmfinishing5'] . " (Hrg Min" . rp($array3['hrgfinishing5min']) ." - Hrg Lebih " . rp($array3['hrgfinishing5lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array3['finishing5']);?></td>
						</tr>
					<?php } ?>			
					
					<?php if(!empty($array3['nmfinishing6'])){ ?>
						<tr>
							<td> <?php echo $array3['nmfinishing6'] . " (Hrg Min" . rp($array3['hrgfinishing6min']) ." - Hrg Lebih " . rp($array3['hrgfinishing6lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array3['finishing6']);?></td>
						</tr>
					<?php } ?>
					
					<?php if(!empty($array3['nmfinishing7'])){ ?>
						<tr>
							<td> <?php echo $array3['nmfinishing7'] . " (Hrg Min" . rp($array3['hrgfinishing7min']) ." - Hrg Lebih " . $array3['hrgfinishing7lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array3['finishing7']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array3['nmfinishing8'])){ ?>
						<tr>
							<td> <?php echo $array3['nmfinishing8'] . " (Hrg Min" . rp($array3['hrgfinishing8min']) ." - Hrg Lebih " . $array3['hrgfinishing8lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array3['finishing8']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array3['nmfinishing9'])){ ?>
						<tr>
							<td> <?php echo $array3['nmfinishing9'] . " (Hrg Min" . rp($array3['hrgfinishing9min']) ." - Hrg Lebih " . $array3['hrgfinishing9lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array3['finishing9']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array3['nmfinishing10'])){ ?>
						<tr>
							<td> <?php echo $array3['nmfinishing10'] . " (Hrg Min" . rp($array3['hrgfinishing10min']) ." - Hrg Lebih " . $array3['hrgfinishing10lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array3['finishing10']);?></td>
						</tr>
					<?php } ?>			
					
					<?php if($array3['tot_lipat'] <> 0){ ?>
						<tr>
							<td> Ongkos Lipat </td><td>Rp.</td><td class="text-right"><?=rp($array3['tot_lipat']);?></td>
						</tr>
					<?php } ?>			
					
					
					<tr><td>Total</td><td>Rp.</td><td  class="text-right"><?=rp($total3);?></td></tr>	
				</table>
				
				<?php } ?>	
				
				
				
				<?php if(!empty($array4['hrgbhn'])){ 
					if ($array4['ongpot'] == 'N'){
						$ongkos_potong = 0;
						}else{
						if ($array4['beratkertas'] == 0){
							$ongkos_potong = 0;
							}else{
							$ongkos_potong = $array4['ongkos_potong'];
						}
					}
					if($array['jenismesin'] == 'PrintDigital' ){
					$persen = 0;
					}else{
					$persen = $array['persen'];
					}
					$total4 = $array4['totcetak'] + $array4['totbhn'] + $array4['tot_ctp'] + $ongkos_potong + $array4['totlaminating'] + $array4['finishing1'] + $array4['finishing2'] + $array4['finishing3'] + $array4['finishing4'] + $array4['finishing5'] + $array4['finishing6'] + $array4['finishing7']+ $array4['finishing8']+ $array4['finishing9']+ $array4['finishing10']+ $array4['tot_lipat'] ;
					$subtotal = $total1 + $total2 + $total3 + $total4;
					$profit = $subtotal * ($persen / 100);
					$grandtotal = $subtotal + $profit;	
					
				?>
				
				<table class='table table-striped' >
					<tr ><td colspan='2'><h4 style="padding:0px; margin-bottom:0px;">Perhitungan Biaya <?=$array4['kethitung'];?></h4></td><td></td></tr>
					
					<?php if($array4['totcetak'] > 0){ ?>
						<tr><td>OC (Hrg Min Rp. <?=rp($array4['hargaminim']);?> 
							
							<?php if ($array4['hargadrek'] > 0 AND $array4['jenismesin']!="PrintDigital"){
								echo "- Hrg Drek " . $array4['hargadrek'] . " - ";
								}else {
								echo " - ";
							} 
							echo " Jml Min " . $array4['jmlminim'];
							?> 
						)</td><td >Rp.</td><td class="text-right"><?=rp($array4['totcetak']);?></td></tr>	
					<?php } ?>		
					
					<tr><td>Biaya Bahan (@<?=$array4['hrgbhn'];?> x <?=$array4['jmlplano'];?> )</td><td>Rp.</td><td class="text-right"><?=rp($array4['totbhn']);?></td></tr>
					<?php if ($array4['tot_ctp'] > 0){ ?>			
						<tr><td>Plat/CTP (@<?=($array4['ctp']);?>)</td><td>Rp.</td><td class="text-right"><?=rp($array4['tot_ctp']);?></td></tr>
					<?php } ?>		
					
					<?php if ($array4['ongpot'] == 'Y'){
						if ($array4['beratkertas'] == 0){ ?>
						<tr><td>Ongk. Potong Kertas</td><td>Rp.</td><td>0</td></tr>
						<?php }else{ ?>
						<tr><td>Ongk. Potong Kertas (Min Rp. <?=rp($array4['hargapotmin']);?> - Lebih <?=rp($array4['hargapot']);?>)</td><td>Rp.</td><td class="text-right"><?=rp($array4['ongkos_potong']);?></td></tr>	
						<?php }
					} ?>		
					
					<?php if($array4['totlaminating'] > 0){ ?>
						<tr><td>Laminating (Hrg Min <?=rp($array4['lamminim']);?> - Hrg Lebih <?=rp($array4['lamlebih']);?> )</td><td>Rp.</td><td class="text-right"><?=rp($array4['totlaminating']);?></td></tr>	
					<?php } ?>	
					
					
					<?php if(!empty($array4['nmfinishing1'])){ ?>
						<tr>
							<td> <?php echo $array4['nmfinishing1'] . " (Hrg Min" . rp($array4['hrgfinishing1min']) ." - Hrg Lebih " . rp($array4['hrgfinishing1lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array4['finishing1']);?></td>
						</tr>
					<?php } ?>			
					
					<?php if(!empty($array4['nmfinishing2'])){ ?>
						<tr>
							<td> <?php echo $array4['nmfinishing2'] . " (Hrg Min" . rp($array4['hrgfinishing2min']) ." - Hrg Lebih " . rp($array4['hrgfinishing2lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array4['finishing2']);?></td>
						</tr>
					<?php } ?>		
					
					<?php if(!empty($array4['nmfinishing3'])){ ?>
						<tr>
							<td> <?php echo $array4['nmfinishing3'] . " (Hrg Min" . rp($array4['hrgfinishing3min']) ." - Hrg Lebih " . rp($array4['hrgfinishing3lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array4['finishing3']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array4['nmfinishing4'])){ ?>
						<tr>
							<td> <?php echo $array4['nmfinishing4'] . " (Hrg Min" . rp($array4['hrgfinishing4min']) ." - Hrg Lebih " . rp($array4['hrgfinishing4lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array4['finishing4']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array4['nmfinishing5'])){ ?>
						<tr>
							<td> <?php echo $array4['nmfinishing5'] . " (Hrg Min" . rp($array4['hrgfinishing5min']) ." - Hrg Lebih " . rp($array4['hrgfinishing5lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array4['finishing5']);?></td>
						</tr>
					<?php } ?>			
					
					<?php if(!empty($array4['nmfinishing6'])){ ?>
						<tr>
							<td> <?php echo $array4['nmfinishing6'] . " (Hrg Min" . rp($array4['hrgfinishing6min']) ." - Hrg Lebih " . rp($array4['hrgfinishing6lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array4['finishing6']);?></td>
						</tr>
					<?php } ?>
					
					<?php if(!empty($array4['nmfinishing7'])){ ?>
						<tr>
							<td> <?php echo $array4['nmfinishing7'] . " (Hrg Min" . rp($array4['hrgfinishing7min']) ." - Hrg Lebih " . $array4['hrgfinishing7lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array4['finishing7']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array4['nmfinishing8'])){ ?>
						<tr>
							<td> <?php echo $array4['nmfinishing8'] . " (Hrg Min" . rp($array4['hrgfinishing8min']) ." - Hrg Lebih " . $array4['hrgfinishing8lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array4['finishing8']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array4['nmfinishing9'])){ ?>
						<tr>
							<td> <?php echo $array4['nmfinishing9'] . " (Hrg Min" . rp($array4['hrgfinishing9min']) ." - Hrg Lebih " . $array4['hrgfinishing9lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array4['finishing9']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array4['nmfinishing10'])){ ?>
						<tr>
							<td> <?php echo $array4['nmfinishing10'] . " (Hrg Min" . rp($array4['hrgfinishing10min']) ." - Hrg Lebih " . $array4['hrgfinishing10lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array4['finishing10']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if($array4['tot_lipat'] <> 0){ ?>
						<tr>
							<td> Ongkos Lipat </td><td>Rp.</td><td class="text-right"><?=rp($array4['tot_lipat']);?></td>
						</tr>
					<?php } ?>	
					
					
					<tr><td>Total</td><td>Rp.</td><td  class="text-right"><?=rp($total4);?></td></tr>	
				</table>
				
				<?php } ?>	
				
				
				
				<?php if(!empty($array5['hrgbhn'])){ 
					
					
					if ($array5['ongpot'] == 'N'){
						$ongkos_potong = 0;
						}else{
						if ($array5['beratkertas'] == 0){
							$ongkos_potong = 0;
							}else{
							$ongkos_potong = $array5['ongkos_potong'];
						}
					}
					if($array['jenismesin'] == 'PrintDigital' ){
					$persen = 0;
					}else{
					$persen = $array['persen'];
					}
					$total5 = $array5['totcetak'] + $array5['totbhn'] + $array5['tot_ctp'] + $ongkos_potong + $array5['totlaminating'] + $array5['finishing1'] + $array5['finishing2'] + $array5['finishing3'] + $array5['finishing4'] + $array5['finishing5'] + $array5['finishing6'] + $array5['finishing7']+ $array5['finishing8']+ $array5['finishing9']+ $array5['finishing10']+ $array5['tot_lipat'] ;
					$subtotal = $total1 + $total2 + $total3 + $total4 + $total5;
					$profit = $subtotal * ($persen / 100);
					$grandtotal = $subtotal + $profit;	
					
				?>
				
				<table class='table table-striped' >
					<tr ><td colspan='2'><h4 style="padding:0px; margin-bottom:0px;">Perhitungan Biaya <?=$array5['kethitung'];?></h4></td><td></td></tr>
					
					<?php if($array5['totcetak'] > 0){ ?>
						<tr><td>OC (Hrg Min Rp. <?=rp($array5['hargaminim']);?> 
							
							<?php if ($array5['hargadrek'] > 0 AND $array5['jenismesin']!="PrintDigital"){
								echo "- Hrg Drek " . $array5['hargadrek'] . " - ";
								}else {
								echo " - ";
							} 
							echo " Jml Min " . $array5['jmlminim'];
							?> 
						)</td><td >Rp.</td><td class="text-right"><?=rp($array5['totcetak']);?></td></tr>	
					<?php } ?>		
					
					<tr><td>Biaya Bahan (@<?=$array5['hrgbhn'];?> x <?=$array5['jmlplano'];?> )</td><td>Rp.</td><td class="text-right"><?=rp($array5['totbhn']);?></td></tr>
					<?php if ($array5['tot_ctp'] > 0){ ?>			
						<tr><td>Plat/CTP (@<?=rp($array5['ctp']);?>)</td><td>Rp.</td><td class="text-right"><?=rp($array5['tot_ctp']);?></td></tr>
					<?php } ?>		
					
					<?php if ($array5['ongpot'] == 'Y'){
						if ($array5['beratkertas'] == 0){ ?>
						<tr><td>Ongk. Potong Kertas</td><td>Rp.</td><td>0</td></tr>
						<?php }else{ ?>
						<tr><td>Ongk. Potong Kertas (Min Rp. <?=rp($array5['hargapotmin']);?> - Lebih <?=rp($array5['hargapot']);?>)</td><td>Rp.</td><td class="text-right"><?=rp($array5['ongkos_potong']);?></td></tr>	
						<?php }
					} ?>	
					
					<?php if($array5['totlaminating'] > 0){ ?>
						<tr><td>Laminating (Hrg Min <?=rp($array5['lamminim']);?> - Hrg Lebih <?=rp($array5['lamlebih']);?> )</td><td>Rp.</td><td class="text-right"><?=rp($array5['totlaminating']);?></td></tr>	
					<?php } ?>	
					
					
					<?php if(!empty($array5['nmfinishing1'])){ ?>
						<tr>
							<td> <?php echo $array5['nmfinishing1'] . " (Hrg Min" . rp($array5['hrgfinishing1min']) ." - Hrg Lebih " . rp($array5['hrgfinishing1lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array5['finishing1']);?></td>
						</tr>
					<?php } ?>			
					
					<?php if(!empty($array5['nmfinishing2'])){ ?>
						<tr>
							<td> <?php echo $array5['nmfinishing2'] . " (Hrg Min" . rp($array5['hrgfinishing2min']) ." - Hrg Lebih " . rp($array5['hrgfinishing2lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array5['finishing2']);?></td>
						</tr>
					<?php } ?>		
					
					<?php if(!empty($array5['nmfinishing3'])){ ?>
						<tr>
							<td> <?php echo $array5['nmfinishing3'] . " (Hrg Min" . rp($array5['hrgfinishing3min']) ." - Hrg Lebih " . rp($array5['hrgfinishing3lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array5['finishing3']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array5['nmfinishing4'])){ ?>
						<tr>
							<td> <?php echo $array5['nmfinishing4'] . " (Hrg Min" . rp($array5['hrgfinishing4min']) ." - Hrg Lebih " . rp($array5['hrgfinishing4lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array5['finishing4']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array5['nmfinishing5'])){ ?>
						<tr>
							<td> <?php echo $array5['nmfinishing5'] . " (Hrg Min" . rp($array5['hrgfinishing5min']) ." - Hrg Lebih " . rp($array5['hrgfinishing5lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array5['finishing5']);?></td>
						</tr>
					<?php } ?>			
					
					<?php if(!empty($array5['nmfinishing6'])){ ?>
						<tr>
							<td> <?php echo $array5['nmfinishing6'] . " (Hrg Min" . rp($array5['hrgfinishing6min']) ." - Hrg Lebih " . rp($array5['hrgfinishing6lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array5['finishing6']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array5['nmfinishing7'])){ ?>
						<tr>
							<td> <?php echo $array5['nmfinishing7'] . " (Hrg Min" . rp($array5['hrgfinishing7min']) ." - Hrg Lebih " . $array5['hrgfinishing7lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array5['finishing7']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array5['nmfinishing8'])){ ?>
						<tr>
							<td> <?php echo $array5['nmfinishing8'] . " (Hrg Min" . rp($array5['hrgfinishing8min']) ." - Hrg Lebih " . $array5['hrgfinishing8lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array5['finishing8']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array5['nmfinishing9'])){ ?>
						<tr>
							<td> <?php echo $array5['nmfinishing9'] . " (Hrg Min" . rp($array5['hrgfinishing9min']) ." - Hrg Lebih " . $array5['hrgfinishing9lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array5['finishing9']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array5['nmfinishing10'])){ ?>
						<tr>
							<td> <?php echo $array5['nmfinishing10'] . " (Hrg Min" . rp($array5['hrgfinishing10min']) ." - Hrg Lebih " . $array5['hrgfinishing10lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array5['finishing10']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if($array5['tot_lipat'] <> 0){ ?>
						<tr>
							<td> Ongkos Lipat </td><td>Rp.</td><td class="text-right"><?=rp($array5['tot_lipat']);?></td>
						</tr>
					<?php } ?>			
					
					
					<!-- sampai sini tampilkan totalnya-->				
					
					<tr><td>Total</td><td>Rp.</td><td  class="text-right"><?=rp($total5);?></td></tr>	
				</table>
				
				<?php } ?>
				
				<?php if(!empty($array6['hrgbhn'])){ 
					
					
					if ($array6['ongpot'] == 'N'){
						$ongkos_potong = 0;
						}else{
						if ($array6['beratkertas'] == 0){
							$ongkos_potong = 0;
							}else{
							$ongkos_potong = $array6['ongkos_potong'];
						}
					}
					if($array['jenismesin'] == 'PrintDigital' ){
					$persen = 0;
					}else{
					$persen = $array['persen'];
					}
					$total6 = $array6['totcetak'] + $array6['totbhn'] + $array6['tot_ctp'] + $ongkos_potong + $array6['totlaminating'] + $array6['finishing1'] + $array6['finishing2'] + $array6['finishing3'] + $array6['finishing4'] + $array6['finishing5'] + $array6['finishing6'] + $array6['finishing7']+ $array6['finishing8']+ $array6['finishing9']+ $array6['finishing10'] + $array6['tot_lipat'] ;
					$subtotal = $total1 + $total2 + $total3 + $total4 + $total5 + $total6;
					$profit = $subtotal * ($persen / 100);
					$grandtotal = $subtotal + $profit;	
					
				?>
				
				<table class='table table-striped' >
					<tr ><td colspan='2'><h4 style="padding:0px; margin-bottom:0px;">Perhitungan Biaya <?=$array6['kethitung'];?></h4></td><td></td></tr>
					
					<?php if($array6['totcetak'] > 0){ ?>
						<tr><td>OC (Hrg Min Rp. <?=rp($array6['hargaminim']);?> 
							
							<?php if ($array6['hargadrek'] > 0 AND $array6['jenismesin']!="PrintDigital"){
								echo "- Hrg Drek " . $array6['hargadrek'] . " - ";
								}else {
								echo " - ";
							} 
							echo " Jml Min " . $array6['jmlminim'];
							?> 
						)</td><td >Rp.</td><td class="text-right"><?=rp($array6['totcetak']);?></td></tr>	
					<?php } ?>		
					
					<tr><td>Biaya Bahan (@<?=$array6['hrgbhn'];?> x <?=$array6['jmlplano'];?> )</td><td>Rp.</td><td class="text-right"><?=rp($array6['totbhn']);?></td></tr>
					<?php if ($array6['tot_ctp'] > 0){ ?>			
						<tr><td>Plat/CTP (@<?=rp($array6['ctp']);?>)</td><td>Rp.</td><td class="text-right"><?=rp($array6['tot_ctp']);?></td></tr>
					<?php } ?>		
					
					<?php if ($array6['ongpot'] == 'Y'){
						if ($array6['beratkertas'] == 0){ ?>
						<tr><td>Ongk. Potong Kertas</td><td>Rp.</td><td>0</td></tr>
						<?php }else{ ?>
						<tr><td>Ongk. Potong Kertas (Min Rp. <?=rp($array6['hargapotmin']);?> - Lebih <?=rp($array6['hargapot']);?>)</td><td>Rp.</td><td class="text-right"><?=rp($array6['ongkos_potong']);?></td></tr>	
						<?php }
					} ?>	
					
					<?php if($array6['totlaminating'] > 0){ ?>
						<tr><td>Laminating (Hrg Min <?=rp($array6['lamminim']);?> - Hrg Lebih <?=rp($array6['lamlebih']);?> )</td><td>Rp.</td><td class="text-right"><?=rp($array6['totlaminating']);?></td></tr>	
					<?php } ?>	
					
					
					<?php if(!empty($array6['nmfinishing1'])){ ?>
						<tr>
							<td> <?php echo $array6['nmfinishing1'] . " (Hrg Min" . rp($array6['hrgfinishing1min']) ." - Hrg Lebih " . rp($array6['hrgfinishing1lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array6['finishing1']);?></td>
						</tr>
					<?php } ?>			
					
					<?php if(!empty($array6['nmfinishing2'])){ ?>
						<tr>
							<td> <?php echo $array6['nmfinishing2'] . " (Hrg Min" . rp($array6['hrgfinishing2min']) ." - Hrg Lebih " . rp($array6['hrgfinishing2lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array6['finishing2']);?></td>
						</tr>
					<?php } ?>		
					
					<?php if(!empty($array6['nmfinishing3'])){ ?>
						<tr>
							<td> <?php echo $array6['nmfinishing3'] . " (Hrg Min" . rp($array6['hrgfinishing3min']) ." - Hrg Lebih " . rp($array6['hrgfinishing3lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array6['finishing3']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array6['nmfinishing4'])){ ?>
						<tr>
							<td> <?php echo $array6['nmfinishing4'] . " (Hrg Min" . rp($array6['hrgfinishing4min']) ." - Hrg Lebih " . rp($array6['hrgfinishing4lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array6['finishing4']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array6['nmfinishing5'])){ ?>
						<tr>
							<td> <?php echo $array6['nmfinishing5'] . " (Hrg Min" . rp($array6['hrgfinishing5min']) ." - Hrg Lebih " . rp($array6['hrgfinishing5lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array6['finishing5']);?></td>
						</tr>
					<?php } ?>			
					
					<?php if(!empty($array6['nmfinishing6'])){ ?>
						<tr>
							<td> <?php echo $array6['nmfinishing6'] . " (Hrg Min" . rp($array6['hrgfinishing6min']) ." - Hrg Lebih " . rp($array6['hrgfinishing6lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array6['finishing6']);?></td>
						</tr>
					<?php } ?>
					
					<?php if(!empty($array6['nmfinishing7'])){ ?>
						<tr>
							<td> <?php echo $array6['nmfinishing7'] . " (Hrg Min" . rp($array6['hrgfinishing7min']) ." - Hrg Lebih " . $array6['hrgfinishing7lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array6['finishing7']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array6['nmfinishing8'])){ ?>
						<tr>
							<td> <?php echo $array6['nmfinishing8'] . " (Hrg Min" . rp($array6['hrgfinishing8min']) ." - Hrg Lebih " . $array6['hrgfinishing8lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array6['finishing8']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array6['nmfinishing9'])){ ?>
						<tr>
							<td> <?php echo $array6['nmfinishing9'] . " (Hrg Min" . rp($array6['hrgfinishing9min']) ." - Hrg Lebih " . $array6['hrgfinishing9lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array6['finishing9']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array6['nmfinishing10'])){ ?>
						<tr>
							<td> <?php echo $array6['nmfinishing10'] . " (Hrg Min" . rp($array6['hrgfinishing10min']) ." - Hrg Lebih " . $array6['hrgfinishing10lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array6['finishing10']);?></td>
						</tr>
					<?php } ?>			
					
					<?php if($array6['tot_lipat'] <> 0){ ?>
						<tr>
							<td> Ongkos Lipat </td><td>Rp.</td><td class="text-right"><?=rp($array6['tot_lipat']);?></td>
						</tr>
					<?php } ?>			
					
					<tr><td>Total</td><td>Rp.</td><td  class="text-right"><?=rp($total6);?></td></tr>	
				</table>
				
				<?php } ?>	
				
				<?php if(!empty($array7['hrgbhn'])){ 
					
					
					if ($array7['ongpot'] == 'N'){
						$ongkos_potong = 0;
						}else{
						if ($array7['beratkertas'] == 0){
							$ongkos_potong = 0;
							}else{
							$ongkos_potong = $array7['ongkos_potong'];
						}
					}
					if($array['jenismesin'] == 'PrintDigital' ){
					$persen = 0;
					}else{
					$persen = $array['persen'];
					}
					$total7 = $array7['totcetak'] + $array7['totbhn'] + $array7['tot_ctp'] + $ongkos_potong + $array7['totlaminating'] + $array7['finishing1'] + $array7['finishing2'] + $array7['finishing3'] + $array7['finishing4'] + $array7['finishing5'] + $array7['finishing6'] + $array7['finishing7']+ $array7['finishing8']+ $array7['finishing9']+ $array7['finishing10'] ;
					$subtotal = $total1 + $total2 + $total3 + $total4 + $total5 + $total6 + $total7;
					$profit = $subtotal * ($persen / 100);
					$grandtotal = $subtotal + $profit;	
					
				?>
				
				<table class='table table-striped' >
					<tr ><td colspan='2'><h4 style="padding:0px; margin-bottom:0px;">Perhitungan Biaya <?=$array7['kethitung'];?></h4></td><td></td></tr>
					
					<?php if($array7['totcetak'] > 0){ ?>
						<tr><td>OC (Hrg Min Rp. <?=rp($array7['hargaminim']);?> 
							
							<?php if ($array7['hargadrek'] > 0 AND $array7['jenismesin']!="PrintDigital"){
								echo "- Hrg Drek " . $array7['hargadrek'] . " - ";
								}else {
								echo " - ";
							} 
							echo " Jml Min " . $array7['jmlminim'];
							?> 
						)</td><td >Rp.</td><td class="text-right"><?=rp($array7['totcetak']);?></td></tr>	
					<?php } ?>		
					
					<tr><td>Biaya Bahan (@<?=$array7['hrgbhn'];?> x <?=$array7['jmlplano'];?> )</td><td>Rp.</td><td class="text-right"><?=rp($array7['totbhn']);?></td></tr>
					<?php if ($array7['tot_ctp'] > 0){ ?>			
						<tr><td>Plat/CTP (@<?=rp($array7['ctp']);?>)</td><td>Rp.</td><td class="text-right"><?=rp($array7['tot_ctp']);?></td></tr>
					<?php } ?>		
					
					<?php if ($array7['ongpot'] == 'Y'){
						if ($array7['beratkertas'] == 0){ ?>
						<tr><td>Ongk. Potong Kertas</td><td>Rp.</td><td>0</td></tr>
						<?php }else{ ?>
						<tr><td>Ongk. Potong Kertas (Min Rp. <?=rp($array7['hargapotmin']);?> - Lebih <?=rp($array7['hargapot']);?>)</td><td>Rp.</td><td class="text-right"><?=rp($array7['ongkos_potong']);?></td></tr>	
						<?php }
					} ?>	
					
					<?php if($array7['totlaminating'] > 0){ ?>
						<tr><td>Laminating (Hrg Min <?=rp($array7['lamminim']);?> - Hrg Lebih <?=rp($array7['lamlebih']);?> )</td><td>Rp.</td><td class="text-right"><?=rp($array7['totlaminating']);?></td></tr>	
					<?php } ?>	
					
					
					<?php if(!empty($array7['nmfinishing1'])){ ?>
						<tr>
							<td> <?php echo $array7['nmfinishing1'] . " (Hrg Min" . rp($array7['hrgfinishing1min']) ." - Hrg Lebih " . rp($array7['hrgfinishing1lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array7['finishing1']);?></td>
						</tr>
					<?php } ?>			
					
					<?php if(!empty($array7['nmfinishing2'])){ ?>
						<tr>
							<td> <?php echo $array7['nmfinishing2'] . " (Hrg Min" . rp($array7['hrgfinishing2min']) ." - Hrg Lebih " . rp($array7['hrgfinishing2lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array7['finishing2']);?></td>
						</tr>
					<?php } ?>		
					
					<?php if(!empty($array7['nmfinishing3'])){ ?>
						<tr>
							<td> <?php echo $array7['nmfinishing3'] . " (Hrg Min" . rp($array7['hrgfinishing3min']) ." - Hrg Lebih " . rp($array7['hrgfinishing3lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array7['finishing3']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array7['nmfinishing4'])){ ?>
						<tr>
							<td> <?php echo $array7['nmfinishing4'] . " (Hrg Min" . rp($array7['hrgfinishing4min']) ." - Hrg Lebih " . rp($array7['hrgfinishing4lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array7['finishing7']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array7['nmfinishing5'])){ ?>
						<tr>
							<td> <?php echo $array7['nmfinishing5'] . " (Hrg Min" . rp($array7['hrgfinishing5min']) ." - Hrg Lebih " . rp($array7['hrgfinishing5lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array7['finishing5']);?></td>
						</tr>
					<?php } ?>			
					
					<?php if(!empty($array7['nmfinishing6'])){ ?>
						<tr>
							<td> <?php echo $array7['nmfinishing6'] . " (Hrg Min" . rp($array7['hrgfinishing6min']) ." - Hrg Lebih " . rp($array7['hrgfinishing6lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array7['finishing6']);?></td>
						</tr>
					<?php } ?>
					
					<?php if(!empty($array7['nmfinishing7'])){ ?>
						<tr>
							<td> <?php echo $array7['nmfinishing7'] . " (Hrg Min" . rp($array7['hrgfinishing7min']) ." - Hrg Lebih " . $array7['hrgfinishing7lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array7['finishing7']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array7['nmfinishing8'])){ ?>
						<tr>
							<td> <?php echo $array7['nmfinishing8'] . " (Hrg Min" . rp($array7['hrgfinishing8min']) ." - Hrg Lebih " . $array7['hrgfinishing8lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array7['finishing8']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array7['nmfinishing9'])){ ?>
						<tr>
							<td> <?php echo $array7['nmfinishing9'] . " (Hrg Min" . rp($array7['hrgfinishing9min']) ." - Hrg Lebih " . $array7['hrgfinishing9lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array7['finishing9']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array7['nmfinishing10'])){ ?>
						<tr>
							<td> <?php echo $array7['nmfinishing10'] . " (Hrg Min" . rp($array7['hrgfinishing10min']) ." - Hrg Lebih " . $array7['hrgfinishing10lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array7['finishing10']);?></td>
						</tr>
					<?php } ?>	
					
					
					<tr><td>Total</td><td>Rp.</td><td  class="text-right"><?=rp($total7);?></td></tr>	
				</table>
				
				<?php } ?>	
				
				<?php if(!empty($array8['hrgbhn'])){ 
					
					
					if ($array8['ongpot'] == 'N'){
						$ongkos_potong = 0;
						}else{
						if ($array8['beratkertas'] == 0){
							$ongkos_potong = 0;
							}else{
							$ongkos_potong = $array8['ongkos_potong'];
						}
					}
					if($array['jenismesin'] == 'PrintDigital' ){
					$persen = 0;
					}else{
					$persen = $array['persen'];
					}
					$total8 = $array8['totcetak'] + $array8['totbhn'] + $array8['tot_ctp'] + $ongkos_potong + $array8['totlaminating'] + $array8['finishing1'] + $array8['finishing2'] + $array8['finishing3'] + $array8['finishing4'] + $array8['finishing5'] + $array8['finishing6'] + $array8['finishing7']+ $array8['finishing8']+ $array8['finishing9']+ $array8['finishing10'];
					$subtotal = $total1 + $total2 + $total3 + $total4 + $total5 + $total6 + $total7 + $total8;
					$profit = $subtotal * ($persen / 100);
					$grandtotal = $subtotal + $profit;	
					
				?>
				
				<table class='table table-striped'>
					<tr><td colspan='2'><h4 style="padding:0px; margin-bottom:0px;">Perhitungan Biaya <?=$array8['kethitung'];?></h4></td></tr>
					
					<?php if($array8['totcetak'] > 0){ ?>
						<tr><td>OC (Hrg Min Rp. <?=rp($array8['hargaminim']);?> 
							
							<?php if ($array8['hargadrek'] > 0 AND $array8['jenismesin']!="PrintDigital"){
								echo "- Hrg Drek " . $array8['hargadrek'] . " - ";
								}else {
								echo " - ";
							} 
							echo " Jml Min " . $array8['jmlminim'];
							?> 
						)</td><td >Rp.</td><td class="text-right"><?=rp($array8['totcetak']);?></td></tr>	
					<?php } ?>		
					
					<tr><td>Biaya Bahan (@<?=$array8['hrgbhn'];?> x <?=$array8['jmlplano'];?> )</td><td>Rp.</td><td class="text-right"><?=rp($array8['totbhn']);?></td></tr>
					<?php if ($array8['tot_ctp'] > 0){ ?>			
						<tr><td>Plat/CTP (@<?=rp($array8['ctp']);?>)</td><td>Rp.</td><td class="text-right"><?=rp($array8['tot_ctp']);?></td></tr>
					<?php } ?>		
					
					<?php if ($array8['ongpot'] == 'Y'){
						if ($array8['beratkertas'] == 0){ ?>
						<tr><td>Ongk. Potong Kertas</td><td>Rp.</td><td>0</td></tr>
						<?php }else{ ?>
						<tr><td>Ongk. Potong Kertas (Min Rp. <?=rp($array8['hargapotmin']);?> - Lebih <?=rp($array8['hargapot']);?>)</td><td>Rp.</td><td class="text-right"><?=rp($array8['ongkos_potong']);?></td></tr>	
						<?php }
					} ?>	
					
					<?php if($array8['totlaminating'] > 0){ ?>
						<tr><td>Laminating (Hrg Min <?=rp($array8['lamminim']);?> - Hrg Lebih <?=rp($array8['lamlebih']);?> )</td><td>Rp.</td><td class="text-right"><?=rp($array8['totlaminating']);?></td></tr>	
					<?php } ?>	
					
					
					<?php if(!empty($array8['nmfinishing1'])){ ?>
						<tr>
							<td> <?php echo $array8['nmfinishing1'] . " (Hrg Min" . rp($array8['hrgfinishing1min']) ." - Hrg Lebih " . rp($array8['hrgfinishing1lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array8['finishing1']);?></td>
						</tr>
					<?php } ?>			
					
					<?php if(!empty($array8['nmfinishing2'])){ ?>
						<tr>
							<td> <?php echo $array8['nmfinishing2'] . " (Hrg Min" . rp($array8['hrgfinishing2min']) ." - Hrg Lebih " . rp($array8['hrgfinishing2lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array8['finishing2']);?></td>
						</tr>
					<?php } ?>		
					
					<?php if(!empty($array8['nmfinishing3'])){ ?>
						<tr>
							<td> <?php echo $array8['nmfinishing3'] . " (Hrg Min" . rp($array8['hrgfinishing3min']) ." - Hrg Lebih " . rp($array8['hrgfinishing3lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array8['finishing3']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array8['nmfinishing4'])){ ?>
						<tr>
							<td> <?php echo $array8['nmfinishing4'] . " (Hrg Min" . rp($array8['hrgfinishing4min']) ." - Hrg Lebih " . rp($array8['hrgfinishing4lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array8['finishing4']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array8['nmfinishing5'])){ ?>
						<tr>
							<td> <?php echo $array8['nmfinishing5'] . " (Hrg Min" . rp($array8['hrgfinishing5min']) ." - Hrg Lebih " . rp($array8['hrgfinishing5lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array8['finishing5']);?></td>
						</tr>
					<?php } ?>			
					
					<?php if(!empty($array8['nmfinishing6'])){ ?>
						<tr>
							<td> <?php echo $array8['nmfinishing6'] . " (Hrg Min" . rp($array8['hrgfinishing6min']) ." - Hrg Lebih " . rp($array8['hrgfinishing6lebih']) ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array8['finishing6']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array8['nmfinishing7'])){ ?>
						<tr>
							<td> <?php echo $array8['nmfinishing7'] . " (Hrg Min" . rp($array8['hrgfinishing7min']) ." - Hrg Lebih " . $array8['hrgfinishing7lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array8['finishing7']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array8['nmfinishing8'])){ ?>
						<tr>
							<td> <?php echo $array8['nmfinishing8'] . " (Hrg Min" . rp($array8['hrgfinishing8min']) ." - Hrg Lebih " . $array8['hrgfinishing8lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array8['finishing8']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array8['nmfinishing9'])){ ?>
						<tr>
							<td> <?php echo $array8['nmfinishing9'] . " (Hrg Min" . rp($array8['hrgfinishing9min']) ." - Hrg Lebih " . $array8['hrgfinishing9lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array8['finishing9']);?></td>
						</tr>
					<?php } ?>	
					
					<?php if(!empty($array8['nmfinishing10'])){ ?>
						<tr>
							<td> <?php echo $array8['nmfinishing10'] . " (Hrg Min" . rp($array8['hrgfinishing10min']) ." - Hrg Lebih " . $array8['hrgfinishing10lebih'] ." )";?>
							</td><td>Rp.</td><td class="text-right"><?=rp($array8['finishing10']);?></td>
						</tr>
					<?php } ?>	
					
					
					<tr><td>Total</td><td>Rp.</td><td  class="text-right"><?=rp($total8);?></td></tr>	
				</table>
				
				<?php } 
				$hrgsatuan = ceil($grandtotal / $jumlahcetak);
				if($array['modul']=='amplop_jadi'){
					$Nama_Harga = "Harga/Box";
					}else{
					$Nama_Harga = "Harga Satuan";
				}
				if($array['jenismesin'] == 'PrintDigital' ){
					$persen = 0;
					}else{
					$persen = $array['persen'];
					}
					// echo $array['jenismesin'];
				?>	
				
				<table class='table table-striped'>
					<tr><td>Total Biaya</td><td style="width:5%!important">Rp.</td><td  style="width:15%!important" class="text-right"><?=rp($subtotal);?></td></tr>	
					<tr><td>Persentase Profit = <?=rp($persen);?> %</td><td>Rp.</td><td class="text-right"><?=rp($profit);?></td></tr>	
					<tr><td><h4 style="padding:0px; margin-bottom:0px;"><?=$Nama_Harga;?></h4></td><td>Rp.</td><td  class="text-right"><?=rp($hrgsatuan);?></td></tr>
					<tr><td><h4 style="padding:0px; margin-bottom:0px;">Total Jual</h4></td><td>Rp.</td><td  class="text-right"><?=rp($grandtotal);?></td></tr>
				</table>
				
				
				
				<!--end-->
			</div>  
			
		</div> <!-- /container -->
		<table class='table table-striped'>
			<tr><td>Keterangan : Ongk. = Ongkos | OPK = ongkos potong kertas | AP = Art Paper | AC = Art Carton</td></tr>
		</table>
	</div> <!-- /container -->
	<!--div class="containers" style="border:1px solid #f7f7f7;background:#fff"-->
	<div id="html-content-holder" class="containers" style="max-width:1200px;margin:0 auto;padding:20px 20px;border:1px solid #f7f7f7;background:#fff">
		<div class="row">
			<div id="editor"></div>
			<div id="previewImage"></div>
		</div> <!-- /row -->
	</div> <!-- /container -->
	<script>
		var total = '<?=$hrgsatuan;?>';
		var jmlh = '<?=$jumlahcetak;?>';
		var spesifikasi = '<?=$spesifikasi;?>';
		$('#totalh').val(total);
		$('#jmlh').val(jmlh);
		var koor = <?php echo json_encode($hitpot[0]['koor']);?>;
		var tinggi_plano = <?php echo $tinggi_plano;?>;
		var lbr_plano = <?php echo $lbr_plano ;?>;
		var lbr_pot = <?php echo $lbr_pot ;?>;
		var tinggi_pot = <?php echo $tinggi_pot ;?>;
		var hasil = <?php echo $hasil ;?>;
		window.onload = draw(koor,tinggi_plano,lbr_plano,lbr_pot,tinggi_pot,hasil,'myCanvas');
		
		<?php if(!empty($array2['hrgbhn'])){  ?>
			
			var koor2 = <?php echo json_encode($hitpot2[0]['koor']);?>;
			var tinggi_plano2 = <?php echo $tinggi_plano2;?>;
			var lbr_plano2 = <?php echo $lbr_plano2 ;?>;
			var lbr_pot2 = <?php echo $lbr_pot2 ;?>;
			var tinggi_pot2 = <?php echo $tinggi_pot2 ;?>;
			var hasil2 = <?php echo $hasil2 ;?>;
			window.onload = draw(koor2,tinggi_plano2,lbr_plano2,lbr_pot2,tinggi_pot2,hasil2,'myCanvas2');
			
		<?php } ?>
		
		<?php if(!empty($array3['hrgbhn'])){  ?>
			
			var koor3 = <?php echo json_encode($hitpot3[0]['koor']);?>;
			var tinggi_plano3 = <?php echo $tinggi_plano3;?>;
			var lbr_plano3 = <?php echo $lbr_plano3 ;?>;
			var lbr_pot3 = <?php echo $lbr_pot3 ;?>;
			var tinggi_pot3 = <?php echo $tinggi_pot3 ;?>;
			var hasil3 = <?php echo $hasil3 ;?>;
			window.onload = draw(koor3,tinggi_plano3,lbr_plano3,lbr_pot3,tinggi_pot3,hasil3,'myCanvas3');
			
		<?php } ?>
		
		<?php if(!empty($array4['hrgbhn'])){  ?>
			
			var koor4 = <?php echo json_encode($hitpot4[0]['koor']);?>;
			var tinggi_plano4 = <?php echo $tinggi_plano4;?>;
			var lbr_plano4 = <?php echo $lbr_plano4 ;?>;
			var lbr_pot4 = <?php echo $lbr_pot4 ;?>;
			var tinggi_pot4 = <?php echo $tinggi_pot4 ;?>;
			var hasil4 = <?php echo $hasil4 ;?>;
			window.onload = draw(koor4,tinggi_plano4,lbr_plano4,lbr_pot4,tinggi_pot4,hasil4,'myCanvas4');
			
		<?php } ?>
		
		<?php if(!empty($array5['hrgbhn'])){  ?>
			
			var koor5 = <?php echo json_encode($hitpot5[0]['koor']);?>;
			var tinggi_plano5 = <?php echo $tinggi_plano5;?>;
			var lbr_plano5 = <?php echo $lbr_plano5 ;?>;
			var lbr_pot5 = <?php echo $lbr_pot5 ;?>;
			var tinggi_pot5 = <?php echo $tinggi_pot5 ;?>;
			var hasil5 = <?php echo $hasil5 ;?>;
			window.onload = draw(koor5,tinggi_plano5,lbr_plano5,lbr_pot5,tinggi_pot5,hasil5,'myCanvas5');
			
		<?php } ?>
		
		<?php if(!empty($array6['hrgbhn'])){  ?>
			
			var koor6 = <?php echo json_encode($hitpot6[0]['koor']);?>;
			var tinggi_plano6 = <?php echo $tinggi_plano6;?>;
			var lbr_plano6 = <?php echo $lbr_plano6 ;?>;
			var lbr_pot6 = <?php echo $lbr_pot6 ;?>;
			var tinggi_pot6 = <?php echo $tinggi_pot6 ;?>;
			var hasil6 = <?php echo $hasil6 ;?>;
			window.onload = draw(koor6,tinggi_plano6,lbr_plano6,lbr_pot6,tinggi_pot6,hasil6,'myCanvas6');
			
		<?php } ?>
		<?php if(!empty($array7['hrgbhn'])){  ?>
			
			var koor7 = <?php echo json_encode($hitpot7[0]['koor']);?>;
			var tinggi_plano7 = <?php echo $tinggi_plano7;?>;
			var lbr_plano7 = <?php echo $lbr_plano7 ;?>;
			var lbr_pot7 = <?php echo $lbr_pot7 ;?>;
			var tinggi_pot7 = <?php echo $tinggi_pot7 ;?>;
			var hasil7 = <?php echo $hasil7 ;?>;
			window.onload = draw(koor7,tinggi_plano7,lbr_plano7,lbr_pot7,tinggi_pot7,hasil7,'myCanvas7');
			
		<?php } ?>
		
		<?php if(!empty($array8['hrgbhn'])){  ?>
			
			var koor8 = <?php echo json_encode($hitpot8[0]['koor']);?>;
			var tinggi_plano8 = <?php echo $tinggi_plano8;?>;
			var lbr_plano8 = <?php echo $lbr_plano8 ;?>;
			var lbr_pot8 = <?php echo $lbr_pot8 ;?>;
			var tinggi_pot8 = <?php echo $tinggi_pot8 ;?>;
			var hasil8 = <?php echo $hasil8 ;?>;
			window.onload = draw(koor8,tinggi_plano8,lbr_plano8,lbr_pot8,tinggi_pot8,hasil8,'myCanvas8');
			
		<?php } ?>
	</script>
	<?php
		include "footer_detail.php";
	?>
</body>
</html>