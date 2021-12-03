<?php require_once('../../Connections/openjournal.php'); ?>
<?php
session_start();
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_openjournal, $openjournal);
$query_buku = "SELECT * FROM buku";
$buku = mysql_query($query_buku, $openjournal) or die(mysql_error());
$row_buku = mysql_fetch_assoc($buku);
$totalRows_buku = mysql_num_rows($buku);

mysql_select_db($database_openjournal, $openjournal);
$query_ebook = "SELECT * FROM ebook";
$ebook = mysql_query($query_ebook, $openjournal) or die(mysql_error());
$row_ebook = mysql_fetch_assoc($ebook);
$totalRows_ebook = mysql_num_rows($ebook);

mysql_select_db($database_openjournal, $openjournal);
$query_jurnal = "SELECT * FROM jurnal";
$jurnal = mysql_query($query_jurnal, $openjournal) or die(mysql_error());
$row_jurnal = mysql_fetch_assoc($jurnal);
$totalRows_jurnal = mysql_num_rows($jurnal);

mysql_select_db($database_openjournal, $openjournal);
$query_anggota = "SELECT * FROM anggota WHERE id_anggota = '".$_SESSION['MM_IdAnggota']."' ";
$anggota = mysql_query($query_anggota, $openjournal) or die(mysql_error());
$row_anggota = mysql_fetch_assoc($anggota);
$totalRows_anggota = mysql_num_rows($anggota);

mysql_select_db($database_openjournal, $openjournal);
$query_bi_corner = "SELECT * FROM bi_corner";
$bi_corner = mysql_query($query_bi_corner, $openjournal) or die(mysql_error());
$row_bi_corner = mysql_fetch_assoc($bi_corner);
$totalRows_bi_corner = mysql_num_rows($bi_corner);

mysql_select_db($database_openjournal, $openjournal);
$query_member = "SELECT * FROM anggota";
$member = mysql_query($query_member, $openjournal) or die(mysql_error());
$row_member = mysql_fetch_assoc($member);
$totalRows_member = mysql_num_rows($member);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>library.globalmulia.ac.id</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Bootstrap 3 template for corporate business" />
	<!-- css -->
	<link href="../../css/bootstrap.min.css" rel="stylesheet" />
	<link href="../../plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />
	<link href="../../css/cubeportfolio.min.css" rel="stylesheet" />
	<link href="../../css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../datatables/datatables.css">
    <link rel="stylesheet" href="../../Flexigrid-master/css/flexigrid.pack.css" />

	<!-- Theme skin -->
	<link id="t-colors" href="../../skins/default.css" rel="stylesheet" />

	<!-- boxed bg -->
	<link id="bodybg" href="../../bodybg/bg1.css" rel="stylesheet" type="text/css" />

	<!-- =======================================================
    Theme Name: Sailor
    Theme URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
	======================================================= -->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
}
-->
</style>
<style>
.komentar {
    border: 1px solid #5cb85c;
	border-radius :4px;
    width: 350px;
    height: 200px;
    overflow: scroll;
}
</style>
	
    <script src="../../chat/dist/js/jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
        $("#formku").validate();
    });
    </script> 
    
    <style type="text/css">
    label.error {
        color: red;
        padding-left: .5em;
    }
    </style>
    
    <script type="text/javascript">
    x=0;
    $(document).ready(function(){
       $(".komentar").scroll(function(){
        $("span").text(x+=1);
       }); 
    });
    </script>
</head>

<body>



	<div id="wrapper">
		<!-- start header -->
		<header>
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<ul class="topleft-info">
								<li>Selamat Datang, <?php echo htmlentities($row_anggota['nm_anggota'], ENT_COMPAT, 'utf-8');; ?></li>
							</ul>
						</div>
                        <div id="google_translate_element" align="right"></div><script type="text/javascript">
							function googleTranslateElementInit() {
							  new google.translate.TranslateElement({pageLanguage: 'id'}, 'google_translate_element');
							}
							</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        <div class="col-md-6 hide">
					  <div id="sb-search" class="sb-search">
								<form>
									<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search" title="Click to start searching"></span>
								</form>
						  </div>
                            
						</div>
					</div>
				</div>
			</div>
            
            <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
             <div class="modal-dialog" style="width:700px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Informasi Buku Perpustakaan</h4>
                    </div>
                    <div class="modal-body">
                      
					<p>&nbsp;</p>
                    </div>
                </div>
            </div>
         </div>
         
       <div class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><br>
						<img src="../../img/library.png" alt="img/library.png" width="300" height="62" />
					</div>
					<div class="navbar-collapse collapse ">
						<ul class="nav navbar-nav">
							<li><a href="../index.php">Beranda</a></li>
				      		<li class="active"><a href="../koleksi.php">Data Koleksi</a></li>
							<li><a href="../pendukung.php">Data Pendukung</a></li>
							<li><a href="../anggota.php">Anggota</a></li>
                            <li><a href="../transaksi.php">Transaksi</a></li>
                          	<li><a href="../index.php">Logout</a></li>
						</ul>
					</div>
				</div>
		  </div>
		</header>
		
		
	  <section id="content"> 
		  <div class="container">
			  <div class="row">
					<div >
						<a href="../buku/index.php" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
                        <h4>Form Import Data</h4>
                        <hr>
                        
                        <form method="post" action="" enctype="multipart/form-data">
                        	<a href="Format.xlsx" class="btn btn-default"><span class="glyphicon glyphicon-download"></span>
                            	Download Format
                            </a>
                            <br><br>
                            
                            <input type="file" name="file" class="pull-left"> &nbsp;
                            
                            <button type="submit" name="preview" class="btn btn-success btn-sm">
                            	<span class="glyphicon glyphicon-eye-open"></span> Preview</button>
                        </form>
                        <hr>
                        
                        <?php
			// Jika user telah mengklik tombol Preview
			if(isset($_POST['preview'])){
				//$ip = ; // Ambil IP Address dari User
				$nama_file_baru = 'data.xlsx';
				
				// Cek apakah terdapat file data.xlsx pada folder tmp
				if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
					unlink('tmp/'.$nama_file_baru); // Hapus file tersebut
				
				$tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
				$tmp_file = $_FILES['file']['tmp_name'];
				
				// Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
				if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
					// Upload file yang dipilih ke folder tmp
					// dan rename file tersebut menjadi data{ip_address}.xlsx
					// {ip_address} diganti jadi ip address user yang ada di variabel $ip
					// Contoh nama file setelah di rename : data127.0.0.1.xlsx
					move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);
					
					// Load librari PHPExcel nya
					require_once 'PHPExcel/PHPExcel.php';
					
					$excelreader = new PHPExcel_Reader_Excel2007();
					$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
					$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
					
					// Buat sebuah tag form untuk proses import data ke database
					echo "<form method='post' action='import.php'>";
					
					// Buat sebuah div untuk alert validasi kosong
					echo "<div class='alert alert-danger' id='kosong'>
					Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
					</div>";
					
					echo "<table class='table table-bordered'>
					<tr>
						<th colspan='16' class='text-center'>Preview Data</th>
					</tr>
					<tr>
						<th>id_anggota</th>
						<th>id_identitas</th>
						<th>nm_anggota</th>
						<th>jk</th>
						<th>sts_kampus</th>
						<th>telp</th>
						<th>id_prodi</th>
						<th>thaka</th>
						<th>status</th>
						<th>email</th>
						<th>username</th>
						<th>password</th>
						<th>level</th>
						<th>tgl_reg</th>
						<th>foto</th>
						<th>barcode</th>
					</tr>";
					
					$numrow = 1;
					$kosong = 0;
					foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
						// Ambil data pada excel sesuai Kolom
						$id_anggota = $row['A']; 
						$id_identitas = $row['B']; 
						$nm_anggota = $row['C'];
						$jk = $row['D']; 
						$sts_kampus = $row['E'];
						$telp = $row['E'];
						$id_prodi = $row['E'];
						$thaka = $row['E'];
						$status = $row['E'];
						$email = $row['E'];
						$username = $row['E'];
						$password = $row['E'];
						$level = $row['E'];
						$tgl_reg = $row['E'];
						$foto = $row['E'];
						$barcode = $row['E'];
						
						// Cek jika semua data tidak diisi
						if(empty($id_anggota) && empty($id_identitas) && empty($nm_anggota) && empty($jk) && empty($sts_kampus) && empty($telp) && empty($id_prodi) && empty($thaka) && empty($status) && empty($email) && empty($username) && empty($password) && empty($level) && empty($tgl_reg) && empty($foto) && empty($barcode))
							continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
						
						// Cek $numrow apakah lebih dari 1
						// Artinya karena baris pertama adalah nama-nama kolom
						// Jadi dilewat saja, tidak usah diimport
						if($numrow > 1){
							// Validasi apakah semua data telah diisi
							$id_anggota_td = ( ! empty($id_anggota))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$id_identitas_td = ( ! empty($id_identitas))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
							$nm_anggota_td = ( ! empty($nm_anggota))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
							$jk_td = ( ! empty($jk))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
							$sts_kampus_td = ( ! empty($sts_kampus))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
							$telp_td = ( ! empty($telp))? "" : " style='background: #E07171;'";
							$id_prodi_td = ( ! empty($id_prodi))? "" : " style='background: #E07171;'";
							$thaka_td = ( ! empty($thaka))? "" : " style='background: #E07171;'";
							$status_td = ( ! empty($status))? "" : " style='background: #E07171;'";
							$email_td = ( ! empty($email))? "" : " style='background: #E07171;'";
							$username_td = ( ! empty($username))? "" : " style='background: #E07171;'";
							$password_td = ( ! empty($password))? "" : " style='background: #E07171;'";
							$level_td = ( ! empty($level))? "" : " style='background: #E07171;'";
							$tgl_reg_td = ( ! empty($tgl_reg))? "" : " style='background: #E07171;'";
							$foto_td = ( ! empty($foto))? "" : " style='background: #E07171;'";
							$barcode_td = ( ! empty($barcode))? "" : " style='background: #E07171;'";
							
							
							// Jika salah satu data ada yang kosong
							if(empty($id_anggota) or empty($id_identitas) or empty($nm_anggota) or empty($jk) or empty($sts_kampus) or empty($telp) or empty($id_prodi) or empty($thaka) or empty($status) or empty($email) or empty($username) or empty($password) or empty($level) or empty($tgl_reg) or empty($foto) or empty($barcode)){																																																																								  							$kosong++;																																																																						 							 }																																																																																						
							
							echo "<tr>";
							echo "<td".$id_anggota_td.">".$id_anggota."</td>";
							echo "<td".$id_identitas_td.">".$id_identitas."</td>";
							echo "<td".$nm_anggota_td.">".$nm_anggota."</td>";
							echo "<td".$jk_td.">".$jk."</td>";
							echo "<td".$sts_kampus_td.">".$sts_kampus."</td>";
							echo "<td".$telp_td.">".$telp."</td>";
							echo "<td".$id_prodi_td.">".$id_prodi."</td>";
							echo "<td".$thaka_td.">".$thaka."</td>";
							echo "<td".$status_td.">".$status."</td>";
							echo "<td".$email_td.">".$email."</td>";
							echo "<td".$username_td.">".$username."</td>";
							echo "<td".$password_td.">".$password."</td>";
							echo "<td".$level_td.">".$level."</td>";
							echo "<td".$tgl_reg_td.">".$tgl_reg."</td>";
							echo "<td".$foto_td.">".$foto."</td>";
							echo "<td".$barcode_td.">".$barcode."</td>";
							echo "</tr>";
						}
						
						$numrow++; // Tambah 1 setiap kali looping
					}
					
					echo "</table>";
					
					// Cek apakah variabel kosong lebih dari 1
					// Jika lebih dari 1, berarti ada data yang masih kosong
					if($kosong > 1){
					?>	
						<script>
						$(document).ready(function(){
							// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
							$("#jumlah_kosong").html('<?php echo $kosong; ?>');
							
							$("#kosong").show(); // Munculkan alert validasi kosong
						});
						</script>
					<?php
					}else{ // Jika semua data sudah diisi
						echo "<hr>";
						
						// Buat sebuah tombol untuk mengimport data ke database
						echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
					}
					
					echo "</form>";
				}else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
					// Munculkan pesan validasi
					echo "<div class='alert alert-danger'>
					Hanya File Excel 2007 (.xlsx) yang diperbolehkan
					</div>";
				}
			}
			?>
				   </div>
	           </div>
	      </div>
            <div class="container">
            	<div class="row">
                	<div class="col-lg-12">
                    <hr>
                    </div>
                </div>
</div>        
						
                <!-- clients -->
				<div class="container">
				<div class="row">
					<div class="col-xs-6 col-md-2 aligncenter client">
						<img alt="logo" src="../../img/clients/bi corner.png" class="img-responsive" />
					</div>

					<div class="col-xs-6 col-md-2 aligncenter client">
						<img alt="logo" src="../../img/clients/siamakku.png" class="img-responsive" />
			    </div>

					<div class="col-xs-6 col-md-2 aligncenter client">
						<img alt="logo" src="../../img/clients/elearning.png" class="img-responsive" />
			    </div>

					<div class="col-xs-6 col-md-2 aligncenter client">
						<img alt="logo" src="../../img/clients/perpust.png" class="img-responsive" />
			    </div>

					<div class="col-xs-6 col-md-2 aligncenter client">
						<img alt="logo" src="../../img/clients/alfatih.png" class="img-responsive" />
			    </div>
					<div class="col-xs-6 col-md-2 aligncenter client">
						<img alt="logo" src="" class="img-responsive" />
					</div>

				</div>
				</div>
</div>
                        
  </section>

		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-3 col-lg-3">
						<div class="widget">
							<h4>Informasi Alamat </h4>
							<address>
					<strong>Library.globalmulia.ac.id</strong><br>
					 Jl. Untung Suropati, Kp. Cibereum<br>
                     Ds. Mekarmukti, Kec. Cikarang Utara<br> 
                     Bekasi 17530</address>
							<p>
								<i class="icon-phone"></i> (021) 29083769 <br>
								<i class="icon-envelope-alt"></i> admin.library@globalmulia.ac.id
							</p>
						</div>
					</div>
					<div class="col-sm-3 col-lg-3">
				  <div class="widget">
							<h4>Informasi</h4>
							<ul class="link-list">
								<li><a href="#">Kegiatan</a></li>
								<li><a href="#">UKMK Global Mulia</a></li>
								<li><a href="#">Pusat Pelatihan</a></li>
								<li><a href="#">Career center</a></li>
							</ul>
						</div>

					</div>
					<div class="col-sm-3 col-lg-3">
				  <div class="widget">
							<h4>Integrasi</h4>
							<ul class="link-list">
								<li><a href="#">simakku.globalmulia.ac.id</a></li>
								<li><a href="#">elearning.globalmulia.ac.id</a></li>
                                <li><a href="#">elibrary.globalmulia.ac.id</a></li>
								<li><a href="#">BI Corner</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-lg-3">
				  <div class="widget">
							<h4>Newsletter</h4>
							<p>Ruang ini masih tahap recondisi, mohon maaf belum bisa digunakan </p>
							<div class="form-group multiple-form-group input-group">
								<input type="email" name="email" class="form-control">
								<span class="input-group-btn">
                            <button type="button" class="btn btn-theme btn-add">Subscribe</button>
                        </span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="sub-footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="copyright">
								<p>&copy; library.globalmulia.ac.id - All Right Reserved</p>
								<div class="credits">
									<!--
                    All the links in the footer should remain intact. 
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Sailor
                  -->
									<a href="https://bootstrapmade.com/bootstrap-business-templates/">Bootstrap Business Templates</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
					  <ul class="social-network">
								<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	<!-- Placed at the end of the document so the pages load faster -->
	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/modernizr.custom.js"></script>
	<script src="../../js/jquery.easing.1.3.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../plugins/flexslider/jquery.flexslider-min.js"></script>
	<script src="../../plugins/flexslider/flexslider.config.js"></script>
	<script src="../../js/jquery.appear.js"></script>
	<script src="../../js/stellar.js"></script>
	<script src="../../js/classie.js"></script>
	<script src="../../js/uisearch.js"></script>
	<script src="../../js/jquery.cubeportfolio.min.js"></script>
	<script src="../../js/google-code-prettify/prettify.js"></script>
	<script src="../../js/animate.js"></script>
	<script src="../../js/custom.js"></script>
     <script src="../../owlcarousel/owl.carousel.js"></script>
    <script src="../../owlcarousel/owl.carousel.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
	<script src="../../datatables/js/bootstrap.min.js"></script>
    <script src="../../datatables/js/jquery.dataTables.min.js"></script>
    <script src="../../Flexigrid-master/js/flexigrid.pack.js"></script>

   <script type="text/javascript">
       $(document).ready(function(){
		$('#myTable').DataTable();
	  });
    </script>
    
    <script language="javascript">
	  function tanya() {
		 if (confirm ("Apakah Anda yakin akan menghapus data ini ?")) {
	 return true;
	  } else {
	   return false;
	  }
    }
	</script>
<script>
	// ini menyiapkan dokumen agar siap grak :)
	$(document).ready(function(){
		// yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
		$('.view_data').click(function(){
			// membuat variabel id, nilainya dari attribut id pada button
			// id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
			var id = $(this).attr("id");
			
			// memulai ajax
			$.ajax({
				url: 'ulogin.php',	// set url -> ini file yang menyimpan query tampil detail data siswa
				method: 'post',		// method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
				data: {id:id},		// nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
				success:function(data){		// kode dibawah ini jalan kalau sukses
					$('#anggota').html(data);	// mengisi konten dari -> <div class="modal-body" id="data_siswa">
					$('#myModal').modal("show");	// menampilkan dialog modal nya
				}
			}); 
		});
	});
	</script>


</body>

</html>
<?php
mysql_free_result($buku);

mysql_free_result($ebook);

mysql_free_result($jurnal);

mysql_free_result($anggota);

mysql_free_result($bi_corner);

mysql_free_result($member);
?>
