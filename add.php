<html>
<head>
	<title>Add Users</title>
</head>
 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="add.php" method="post" enctype="multipart/form-data">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Pegawai</td>
				<td><input type="text" name="nama_pegawai"></td>
			</tr>
			<tr> 
				<td>jabatan</td>
				<td><input type="text" name="jabatan"></td>
			</tr>
			<tr> 
				<td>alamat</td>
				<td><input type="text" name="alamat"></td>
			</tr>
            <tr> 
				<td>no_hp</td>
				<td><input type="text" name="no_hp"></td>
			</tr>
            <tr> 
				<td>gambar</td>
				<td><input type="file" name="gambar"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
    // Check If form submitted, insert form data into users table.
    include_once("koneksi.php");
	if(isset($_POST['Submit'])) {

        $query = pg_query($db_conn, "SELECT max(id_pegawai) as kodeTerbesar FROM pegawai");
        $data = pg_fetch_assoc($query);
        $kodeBarang = $data['kodeterbesar'];
        $urutan = intval($kodeBarang +1);
        // $urutan = (int) substr($kodeBarang, 3, 3);
        // $urutan++;
       // $kodeBarang = sprintf("%01s", $urutan);
        // var_dump($urutan);
        // die();

		$nama_pegawai = $_POST['nama_pegawai'];
		$jabatan = $_POST['jabatan'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        // $gambar = $_POST['gambar'];

        $upload = "files/".$_FILES['gambar']['name'];
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $upload);
        $bin_string = file_get_contents($upload);
        $hex_string = base64_encode($bin_string);
        // $mysqli->query("INSERT INTO upload(name) VALUES ('" . $hex_string . "')");
        
		// include database connection file
	
				
		// Insert user data into table
		$result =  pg_query($db_conn, "INSERT INTO pegawai VALUES('$urutan','$nama_pegawai','$jabatan','$alamat', '$no_hp', '".$hex_string."')");
		
		// Show message when user added
		echo "User added successfully. <a href='index.php'>View Users</a>";
	}
	?>
</body>
</html>