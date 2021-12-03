@extends('layouts.backend')
@section('content')

<!--<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Import  Transaksi</a>
			</div>
		</div>
	</nav>
	<div class="container">
	
		<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ url('loadplan/import') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
		@csrf
		@if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
		@if (session('error'))
                                <div class="alert alert-error">
                                    {{ session('error') }}
                                </div>
                            @endif
							<label for="">Import File Transaksi</label><br>
							<label for="">File (.xls dan .xlsx)</label>
			<input type="file" name="file"  required="required"/>    <p class="text-danger">{{ $errors->first('file') }}</p>
			<br>
                                <button class="btn btn-primary btn-sm">Upload</button>
                
		</form>
	</div>-->
	 <!-- Content -->
	 <div style="padding: 0 15px;">
      <!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->
      <a href="index.php" class="btn btn-danger pull-right">
        <span class="glyphicon glyphicon-remove"></span> Cancel
      </a>
      
      <h3>Form Import Data</h3>
      <hr>
      
      <!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
      <form method="get" action="download" enctype="multipart/form-data">
                        	<a href="/download" class="btn btn-default">
													<span class="glyphicon glyphicon-download"></span>
                            	Download Format
                            </a>
                        <br><br>
        
        <!-- 
        -- Buat sebuah input type file
        -- class pull-left berfungsi agar file input berada di sebelah kiri
        -->
        <input type="file" name="file" class="pull-left">
        
        <button type="submit" name="preview" class="btn btn-success btn-sm">
          <span class="glyphicon glyphicon-eye-open"></span> Preview
        </button>
      </form>
      
      <hr>
      
      <!-- Buat Preview Data -->
      <?php
      // Jika user telah mengklik tombol Preview
      if(isset($_POST['preview'])){
        $nama_file_baru = 'data.xlsx';
        
        // Cek apakah terdapat file data.xlsx pada folder tmp
        if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
          unlink('tmp/'.$nama_file_baru); // Hapus file tersebut
        
        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
        $tmp_file = $_FILES['file']['tmp_name'];
        // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
        if($ext == "xlsx"){
          // Upload file yang dipilih ke folder tmp
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
            <th colspan='5' class='text-center'>Preview Data</th>
          </tr>
          <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
            <th>Alamat</th>
          </tr>";
          
          $numrow = 1;
          $kosong = 0;
          foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
            // Ambil data pada excel sesuai Kolom
            $nis = $row['A']; // Ambil data NIS
            $nama = $row['B']; // Ambil data nama
            $jenis_kelamin = $row['C']; // Ambil data jenis kelamin
            $telp = $row['D']; // Ambil data telepon
            $alamat = $row['E']; // Ambil data alamat
            
            // Cek jika semua data tidak diisi
            if(empty($nis) && empty($nama) && empty($jenis_kelamin) && empty($telp) && empty($alamat))
              continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
            
            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if($numrow > 1){
              // Validasi apakah semua data telah diisi
              $nis_td = ( ! empty($nis))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
              $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
              $jk_td = ( ! empty($jenis_kelamin))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
              $telp_td = ( ! empty($telp))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
              $alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
              
              // Jika salah satu data ada yang kosong
              if(empty($nis) or empty($nama) or empty($jenis_kelamin) or empty($telp) or empty($alamat)){
                $kosong++; // Tambah 1 variabel $kosong
              }
              
              echo "<tr>";
              echo "<td".$nis_td.">".$nis."</td>";
              echo "<td".$nama_td.">".$nama."</td>";
              echo "<td".$jk_td.">".$jenis_kelamin."</td>";
              echo "<td".$telp_td.">".$telp."</td>";
              echo "<td".$alamat_td.">".$alamat."</td>";
              echo "</tr>";
            }
            
            $numrow++; // Tambah 1 setiap kali looping
          }
          
          echo "</table>";
          
          // Cek apakah variabel kosong lebih dari 0
          // Jika lebih dari 0, berarti ada data yang masih kosong
          if($kosong > 0){
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
	@endsection