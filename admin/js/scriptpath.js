$(function(){
  $('.nav-item').click(function(){
  	var judul = $(this).text();
    console.log(judul);
    if (judul !== 'home') {
      $('.modal').fadeIn();
      $('#judul').text(judul);
      if (judul === 'login') {
        $('#isi-modal').load('modal/login.php');
      } else if (judul === 'daftar') {
        $('#isi-modal').load('modal/daftar.php');
      }
    }
  });

  $('.tutup-modal').click(function(){
  	$('.modal').fadeOut();
  });

  $('button').click(function(e){
  	var select = $('select').val();
    if (select === '') {
      e.preventDefault();
      alert('Pilih menu dahulu.');
    }
  });
});