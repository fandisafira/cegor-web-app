<?php
require "../functions.php";

$minuman = query("SELECT * FROM minuman");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<div class="menu-pilihan">
  <?php $i = 1; ?>
	<?php foreach($minuman as $menu) : ?>
    <div class="tiap-pilihan">
      <h3><?= $menu['nama_minuman']; ?></h3>
      <img src="img/<?= $menu['gambar_minuman']; ?>">
      <p>Rp.<?= $menu['harga_minuman']; ?></p>
    </div>
      <?php $i++; ?>
  <?php endforeach; ?>
</div>
<!-- edited -->
<div class="rows">
  <div class="row">
    <div class="prev hide-row">
      &lt;
    </div>
  </div>
  <div class="row">
    <div class="next">
      &gt;
    </div>
  </div>
</div>
<script src="home/js/script.js"></script>
<script>
  if($(".tiap-pilihan").length < 5){
    $(".next").addClass("hide-row");
  }
</script>
<!-- edited -->