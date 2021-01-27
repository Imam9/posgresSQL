<?php
include 'koneksi1.php';

$query = "select * from upload";

//untuk menjalankan perinta sql
$result = $mysqli->query($query);

//untuk mendapatkan jumlah bari dari table
$num_results = $result->num_rows;

//cek jika data tidak 0
if( $num_results > 0){ 

while( $row = $result->fetch_assoc() ){

//untuk mengektrak data
    // extract($row);

    // var_dump($row);
   
    ?>
    <img src="data:image/png/jpg;base64,<?php echo $row['name']?>"     />  
    <br/>          
    <?php

}
// die();
}else{

//jika data kosong maka akan menampilkan data berikutnya
echo "Data Kosong";

}

//menutup koneksi ke database

$result->free();

$mysqli->close();

?>