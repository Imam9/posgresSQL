<?php 

// Create database connection using config file
include_once("koneksi.php");

$result = pg_query($db_conn, " SELECT  *  FROM pegawai;");
 ?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="add.php">Add New User</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>Name</th> 
        <th>Mobile</th> 
        <th>Email</th> 
        <th>Update</th>
        <th>Gambar</th>

    </tr>
    <?php  
   while($user_data = pg_fetch_assoc($result)) { ?>        
       <tr>
        <td><?php echo $user_data['nama_pegawai']?></td>
        <td><?php echo $user_data['jabatan']?></td>
        <td><?php echo $user_data['alamat']?></td>   
        <td><img width = "70%" src="data:image/png/jpg;base64,<?php echo $user_data['gambar']?>" /> </td>
        <td></td>
  <?php  }
?>
    </table>
</body>
</html>

