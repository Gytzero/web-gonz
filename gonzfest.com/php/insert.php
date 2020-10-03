<?php
	date_default_timezone_set('Asia/Jakarta');
	require('/home/gonzfest/connect.php');

	echo 'Please Wait';

	if(isset($_POST["btnSubmit"])){
		$empty_data = array();

		// INPUT VARIABLE
		$sekolah = trim(filter_input(INPUT_POST, 'namaSekolah'));
		$kelas = trim(filter_input(INPUT_POST, 'kelas'));
		$lomba = trim(filter_input(INPUT_POST, 'lomba'));
		$pj = trim(filter_input(INPUT_POST, 'penanggungJawab'));

		$noHP1 = filter_input(INPUT_POST, 'noHP1');
		$noHP2 = filter_input(INPUT_POST, 'noHP2');
		$idLine1 = trim(filter_input(INPUT_POST, 'idLine1'));
		$idLine2 = trim(filter_input(INPUT_POST, 'idLine2'));
		$eMail1 = trim(filter_input(INPUT_POST, 'eMail1'));
		$eMail2 = trim(filter_input(INPUT_POST, 'eMail2'));
		$peserta = filter_input(INPUT_POST, 'peserta');
		// INPUT VARIABLE END


		// EMPTY CHECK
		if(empty($kelas)){
			$empty_data[] = 'Lomba';
		}
		if(empty($lomba)){
			$empty_data[] = 'Lomba';
		}
		if(empty($noHP1)){
			$empty_data[] = 'Nomor Handphone';
		}
		if(empty($idLine1)){
			$empty_data[] = 'ID Line';
		}
		if(empty($eMail1)){
			$empty_data[] = 'Email';
		}
		if(empty($peserta)){
			$empty_data[] = 'Nama Peserta';
		}
		// EMPTY CHECK END

		// IMAGES CHECK
		$UploadOk = true;
		$errors = array();
		if(isset($_FILES["photos"]) && isset($_FILES["kartu"]) && isset($_FILES["sks"]) && isset($_FILES["bukti"])){
			$errors = array();
			$uploadedFiles = array();
			$extension = array("jpeg","jpg","png","JPEG","JPG","PNG","pdf","PDF","doc","DOC","docx","DOCX","");
			$bytes = 1024;
			$KB = 1024;
			$totalBytes = 1000 * $bytes * $KB;
			// foreach($_FILES["photos"]["tmp_name"] as $key=>$tmp_name){
			// 	$temp = $_FILES["photos"]["tmp_name"][$key];
			// 	$name = $_FILES["photos"]["name"][$key];

			// 	if($_FILES["photos"]["size"][$key] > $totalBytes){
			// 		array_push($errors, "File foto melebihi 1MB");
			// 		$UploadOk = false;
			// 	}
			// 	$ext = pathinfo($name, PATHINFO_EXTENSION);
			// 	if(in_array($ext, $extension) == false){
			// 		array_push($errors, "Format file foto salah(jpeg, jpg, atau png)");
			// 		$UploadOk = false;
			// 	}
			// }

			// foreach($_FILES["kartu"]["tmp_name"] as $key=>$tmp_name){
			// 	$temp = $_FILES["kartu"]["tmp_name"][$key];
			// 	$name = $_FILES["kartu"]["name"][$key];

			// 	if($_FILES["kartu"]["size"][$key] > $totalBytes){
			// 		array_push($errors, "File kartu pelajar melebihi 1MB");
			// 		$UploadOk = false;
			// 	}
			// 	$ext = pathinfo($name, PATHINFO_EXTENSION);
			// 	if(in_array($ext, $extension) == false){
			// 		array_push($errors, "Format file kartu pelajar salah(jpeg, jpg, atau png)");
			// 		$UploadOk = false;
			// 	}
			// }

			foreach($_FILES["sks"]["tmp_name"] as $key=>$tmp_name){
				$temp = $_FILES["sks"]["tmp_name"][$key];
				$name = $_FILES["sks"]["name"][$key];

				if($_FILES["sks"]["size"][$key] > $totalBytes){
					array_push($errors, "File surat keterangan sekolah melebihi 10MB");
					$UploadOk = false;
				}
				$ext = pathinfo($name, PATHINFO_EXTENSION);
				if(in_array($ext, $extension) == false){
					array_push($errors, "Format file surat keterangan sekolah salah(jpeg, jpg, atau png)");
					$UploadOk = false;
				}
			}

			// foreach($_FILES["bukti"]["tmp_name"] as $key=>$tmp_name){
			// 	$temp = $_FILES["bukti"]["tmp_name"][$key];
			// 	$name = $_FILES["bukti"]["name"][$key];

			// 	if($_FILES["bukti"]["size"][$key] > $totalBytes){
			// 		array_push($errors, "File bukti keterangan pembayaran melebihi 1MB");
			// 		$UploadOk = false;
			// 	}
			// 	$ext = pathinfo($name, PATHINFO_EXTENSION);
			// 	if(in_array($ext, $extension) == false){
			// 		array_push($errors, "Format file bukti keterangan pembayaran salah(jpeg, jpg, atau png)");
			// 		$UploadOk = false;
			// 	}
			// }
		}
		// IMAGES CHECK END



		// DATABASE INPUT
		if(empty($empty_data) && $UploadOk == true){
			$query = "INSERT INTO informasi (Sekolah, Kategori, Lomba, Penanggungjawab, NomorHandphone_1, NomorHandphone_2, LINE_1, LINE_2, Email_1, Email_2, Nama_Peserta, tanggal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
			$today = date("Y-m-d H:i:s");
			$stmt = mysqli_prepare($conn, $query);
			mysqli_stmt_bind_param($stmt, "sssssssssss", $sekolah, $kelas, $lomba, $pj, $noHP1, $noHP2 , $idLine1, $idLine2, $eMail1, $eMail2, $peserta);


			// if(isset($_FILES["photos"])){
			// 	$uploadedFiles = array();
			// 	$UploadFolder = "/home/gonzfest/Foto/PasFoto";
			// 	$cnt = 1;

			// 	foreach($_FILES["photos"]["tmp_name"] as $key=>$tmp_name){
			// 		$temp = $_FILES["photos"]["tmp_name"][$key];
			// 		$name = $_FILES["photos"]["name"][$key];
			// 		// Pushing files to directory
			// 		if($UploadOk == true){
			// 			move_uploaded_file($temp,$UploadFolder."/pas_foto=".$kelas."_".$sekolah."_".$lomba."-".$cnt."(".$today.")".".".$ext);
			// 			$cnt++;
			// 			array_push($uploadedFiles, $name);
			// 		}
			// 	}
			// }

			// if(isset($_FILES["kartu"])){
			// 	$uploadedFiles = array();
			// 	$UploadFolder = "/home/gonzfest/Foto/KartuPelajar";
			// 	$cnt = 1;

			// 	foreach($_FILES["kartu"]["tmp_name"] as $key=>$tmp_name){
			// 		$temp = $_FILES["kartu"]["tmp_name"][$key];
			// 		$name = $_FILES["kartu"]["name"][$key];

			// 		if($UploadOk == true){
			// 			move_uploaded_file($temp,$UploadFolder."/kartu_pelajar=".$kelas."_".$sekolah."_".$lomba."-".$cnt."(".$today.")".".".$ext);
			// 			$cnt++;
			// 			array_push($uploadedFiles, $name);
			// 		}
			// 	}
			// }

			if(isset($_FILES["sks"])){
				$uploadedFiles = array();
				$UploadFolder = "/home/gonzfest/Foto/SuratKeteranganSekolah";
				$cnt = 1;

				foreach($_FILES["sks"]["tmp_name"] as $key=>$tmp_name){
					$temp = $_FILES["sks"]["tmp_name"][$key];
					$name = $_FILES["sks"]["name"][$key];
					$ext = pathinfo($name, PATHINFO_EXTENSION);

					// Pushing files to directory
					if($UploadOk == true){
						move_uploaded_file($temp,$UploadFolder."/sks=".$kelas."_".$sekolah."_".$lomba."-".$cnt."(".$today.").".$ext);
						$cnt++;
						array_push($uploadedFiles, $name);
					}
				}
			}

			// if(isset($_FILES["bukti"])){
			// 	$uploadedFiles = array();
			// 	$UploadFolder = "/home/gonzfest/Foto/BuktiPembayaran";
			// 	$cnt = 1;

			// 	foreach($_FILES["bukti"]["tmp_name"] as $key=>$tmp_name){
			// 		$temp = $_FILES["bukti"]["tmp_name"][$key];
			// 		$name = $_FILES["bukti"]["name"][$key];

			// 		// Pushing files to directory
			// 		if($UploadOk == true){
			// 			move_uploaded_file($temp,$UploadFolder."/bukti_pembayaran=".$kelas."_".$sekolah."_".$lomba."-".$cnt."(".$today.")".".".$ext);
			// 			$cnt++;
			// 			array_push($uploadedFiles, $name);
			// 		}
			// 	}
			// }


			// CLOSE THE CONNECTION
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
			mysqli_close($conn);
			header('Location: ../redirect.html');
		}else{
			echo	'Jika Anda mencapai halaman ini maka registrasi online Anda gagal dan belum kami terima.<br>';
			echo	'Mohon coba kembali atau hubungi kami untuk mendapatkan bantuan.<br><br>';
			foreach($errors as $err){
				echo $err;
				echo '<br>';
			}
			echo '<br><br>Klik ';
			echo '<a href="../registration.html">DISINI</a>';
			echo ' untuk kembali ke halaman registrasi.';
		}
		// DATABASE INPUT END


	}
?>
