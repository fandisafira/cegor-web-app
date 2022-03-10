$(function(){
	$('.nav-item').click(function(){
		$('#isi-modal').fadeIn();
		var judul = $(this).text();
		$('.nav-item').removeClass('active');
		$(this).addClass('active');
		if (judul === 'makanan') {
			$("#isi-modal").load("modal/tablemenu_makanan.php");
		} else if (judul === 'minuman'){
			$("#isi-modal").load("modal/tablemenu_minuman.php");
		} else if (judul === 'tambah'){
			$("#isi-modal").load("tambah.html");
		} else {
			$("#isi-modal").load("modal/table_pesanan.php");
		}
	});

	var awal_menu = 0;
  while (awal_menu < 4) {
    $('.baris-menu').eq(awal_menu).addClass('baris-active');
    awal_menu++;
  }

  var awal_pesanan = 0;
  while (awal_pesanan < 5) {
    $('.baris-pesanan').eq(awal_pesanan).addClass('baris-active');
    awal_pesanan++;
  }

  const slide_content = (jumlah) => {
    var index_muncul = $('.baris-active');
    var index_active = $('.baris-data').index(index_muncul);
    index_active = index_active + jumlah
    $('.baris-active').removeClass('baris-active');
    var active = 0;
    if (jumlah == 4 || jumlah == -4) {
      while (active < 4) {
        $('.baris-data').eq(index_active).addClass('baris-active');
        index_active++;
        active++;
      }
    } else {
      while (active < 5) {
        $('.baris-data').eq(index_active).addClass('baris-active');
        index_active++;
        active++;
      }
    }
    
    var index_akhir = $('.baris-data').index($('.baris-active').last());
    return index_akhir;
  }

  $('.next-menu').click(function(){
    var last_index = slide_content(4);
    $('.prev-menu').removeClass('hide-row');
    if (last_index == $('.baris-data').length-1) {
      $('.next-menu').addClass('hide-row');
    }
  });

  $('.prev-menu').click(function(){
    var last_index = slide_content(-4);
    if (last_index != $('.baris-data').length-1) {
      $('.next-menu').removeClass('hide-row');
    }
    if (last_index == 3) {
      $('.prev-menu').addClass('hide-row');
    }
  });

  $('.next-pesanan').click(function(){
    var last_index = slide_content(5);
    $('.prev-pesanan').removeClass('hide-row');
    if (last_index == $('.baris-data').length-1) {
      $('.next-pesanan').addClass('hide-row');
    }
  });

  $('.prev-pesanan').click(function(){
    var last_index = slide_content(-5);
    if (last_index != $('.baris-data').length-1) {
      $('.next-pesanan').removeClass('hide-row');
    }
    if (last_index == 4) {
      $('.prev-pesanan').addClass('hide-row');
    }
  });

	$('.tambah-form').click(function(){
		var judulForm = $(this).find('h2').text();
		// console.log(judulForm);
		if (judulForm === 'makanan') {
			$("#isi-modal").load("modal/tambahform_makanan.php");
		} else {
			$("#isi-modal").load("modal/tambahform_minuman.php");
		}
	});

	$('.brand').click(function(){
		$('#isi-modal').fadeOut();
  });
});