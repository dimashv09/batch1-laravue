<?php 
if (isset($_SESSION['notification'])) { ?>
    <div class="alert alert-info" role="alert">
        <strong><?= $_SESSION['notification']; ?></strong> <br>
        <a href="" class="btn btn-danger btn-sm mt-3">Jangan tampilkan lagi.</a>
    </div>
<?php } ?>