// === Tambahan: Navbar aktif saat diklik ===
$(document).ready(function () {
  // Tambah class 'active' saat klik menu navbar
  $('.navbar-nav .nav-link').on('click', function () {
    $('.navbar-nav .nav-link').removeClass('active');
    $(this).addClass('active');
  });

  // Tambah class 'active' saat scroll halaman
  $(window).on('scroll', function () {
    var scrollPos = $(document).scrollTop();

    $('.navbar-nav .nav-link').each(function () {
      var currLink = $(this);
      var refElement = $(currLink.attr("href"));

      if (
        refElement.position().top <= scrollPos + 100 &&
        refElement.position().top + refElement.height() > scrollPos + 100
      ) {
        $('.navbar-nav .nav-link').removeClass("active");
        currLink.addClass("active");
      }
    });
  });
});

// Smooth scrolling
$('.navbar-nav .nav-link').on('click', function (e) {
  if (this.hash !== "") {
    e.preventDefault();
    var hash = this.hash;
    $('html, body').animate({
      scrollTop: $(hash).offset().top - 70
    }, 800);
  }
});


// Fungsi searchMovie sudah sesuai, tidak diubah
function searchMovie () {
    $('#movie-list').html('');
    
    $.ajax({
        url: 'https://omdbapi.com/',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey' : '1f5ce9aa',
            's': $('#search-input').val()
        },
        success: function (result) {
            if (result.Response == "True") {
                let movies = result.Search;

                $.each(movies, function (i, data) {
                    $('#movie-list').append(`
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <img class="card-img-top" src="`+ data.Poster +`" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">`+ data.Title +`</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">`+ data.Year +`</h6>
                                    <a href="#" class="card-link see-detail" data-toggle="modal" data-target="#exampleModal" data-id="`+ data.imdbID +`" >See Detail</a>
                                </div>
                            </div>
                        </div>
                    `)
                })

                $('#search-input').val('');

            } else {
                $('#movie-list').html(`
                    <div class="col">
                        <h1 class="text-center">`+ result.Error +`</h1>
                    </div>
                `);
            }
        }
    });
}

// Trigger search saat klik tombol atau enter
$('#search-button').on('click', function() {   
    searchMovie();
});

$('#search-input').on('keyup', function (e) {
    if (e.keyCode == 13) {
        searchMovie();
    }
});

// Detail modal film
$('#movie-list').on('click', '.see-detail', function() {
    $.ajax({
        url: 'http://omdbapi.com/',
        dataType: 'json',
        type: 'get',
        data: {
            'apikey': '1f5ce9aa',
            'i': $(this).data('id'),
        },
        success: function (movie){
            if (movie.Response === "True") {
                $('.modal-body').html(`
                    <div class ="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="`+ movie.Poster +`" class="img-fluid">
                            </div>

                            <div class="col-md-8">
                                <ul class="list-group">
                                    <li class="list-group-item"><h3>`+ movie.Title +`</h3></li>
                                    <li class="list-group-item">Released: `+ movie.Released +`</li>
                                    <li class="list-group-item">Genre: `+ movie.Genre +`</li>                                    
                                    <li class="list-group-item">Director: `+ movie.Director +`</li>                                    
                                    <li class="list-group-item">Actors: `+ movie.Actors +`</li>                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                `)
            }
        }
    });
});



