$(function(){
  $('.nav-item').click(function(){
  	var judul = $(this).text();
    if (judul != 'admin') {
      $('.modal').fadeIn();
    	$('#judul').text(judul);
      if (judul === 'makanan') {
        $('#isi-modal').load('home/modal/makanan.php');
      }
      else if (judul === 'minuman') {
        $('#isi-modal').load('home/modal/minuman.php');
      }
      else {
        $('#isi-modal').load('home/modal/kontak.php');
      }
    }
  });

  var awal = 0;
  while (awal < 4) {
    $('.tiap-pilihan').eq(awal).addClass('pilihan-active');
    awal++;
  }
  
  const slide_content = (jumlah) => {
    var index_muncul = $('.pilihan-active');
    var index_active = $('.tiap-pilihan').index(index_muncul);
    index_active = index_active + jumlah
    $('.pilihan-active').removeClass('pilihan-active');
    var active = 0;
    while (active < 4) {
      $('.tiap-pilihan').eq(index_active).addClass('pilihan-active');
      index_active++;
      active++;
    }
    var index_akhir = $('.tiap-pilihan').index($('.pilihan-active').last());
    return index_akhir;
  }

  $('.next').click(function(){
    var last_index = slide_content(4);
    $('.prev').removeClass('hide-row');
    if (last_index == $('.tiap-pilihan').length-1) {
      $('.next').addClass('hide-row');
    }
  });

  $('.prev').click(function(){
    var last_index = slide_content(-4);
    if (last_index != $('.tiap-pilihan').length-1) {
      $('.next').removeClass('hide-row');
    }
    if (last_index == 3) {
      $('.prev').addClass('hide-row');
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