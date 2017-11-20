
$(document).ready( function() {
    $("div").slice(0, 10).show();
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $("div:hidden").slice(0, 10).slideDown();
        if ($("div:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1500);
    });
});

$('a[href=#top]').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 600);
    return false;
});

$(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
        $('.totop a').fadeIn();
    } else {
        $('.totop a').fadeOut();
    }
});


$('#searchForm').submit(function(event) {

  // Stop la propagation par défaut
  event.preventDefault();

  // Récupération des valeurs
  var $form = $(this),
       term = $form.find( "input[name='searchTwitterAccount']" ).val(),
       url = $form.attr( "../../controleur/LoadTwitterAndTweet.php" );

  // Envoie des données
  var posting = $.post( url, { searchTwitterAccount: term } );

  // Reception des données et affichage
  posting.done(function(data) {
    var content = $(data).find('#content');
    $('#result').empty().append(content);
  });

});