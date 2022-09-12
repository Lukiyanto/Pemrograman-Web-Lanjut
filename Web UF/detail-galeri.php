<?php include 'header.php' ?>

<div class="section">
    <div class="container">
        
        <?php
            $galeri   = mysqli_query($koneksi, "SELECT * FROM galeri WHERE id = '".$_GET['id']."' ");
    
            if(mysqli_num_rows($galeri) == 0){
                echo "<script>window.location = 'index.php'</script>";
            }
            
            $s          = mysqli_fetch_object($galeri);
        ?>

        <h3 class="text-center"><?= $s->keterangan ?></h3>
        <small>Dibuat pada <?= date('d/m/Y', strtotime($s->created_at)) ?></small>
        <img src="uploads/galeri/<?= $s->foto ?>" width="100%" class="image" style="margin-top: 5px;">
        <?= $s->keterangan ?>
    </div>

</div>

<?php include 'footer.php' ?>