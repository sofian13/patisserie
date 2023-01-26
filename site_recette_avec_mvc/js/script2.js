$(document).ready(function() {
    var zindex = 10;

    $("div.card").click(function(e) {
        e.preventDefault();

        var isShowing = false;

        if ($(this).hasClass("show")) {
            isShowing = true
        }

        if ($("div.cards").hasClass("showing")) {
            // a card is already in view
            $("div.card.show")
                .removeClass("show");

            if (isShowing) {
                // this card was showing - reset the grid
                $("div.cards")
                    .removeClass("showing");
            } else {
                // this card isn't showing - get in with it
                $(this)
                    .css({ zIndex: zindex })
                    .addClass("show");

            }

            zindex++;

        } else {
            // no cards in view
            $("div.cards")
                .addClass("showing");
            $(this)
                .css({ zIndex: zindex })
                .addClass("show");

            zindex++;
        }

    });



});


const divs = document.querySelectorAll('.card-actions');

const buttons = document.querySelectorAll('.btns');
buttons.forEach(button => {
    button.addEventListener('click', event => {
        const card = event.target.closest('.card');
        const id = card.getAttribute('data-id');
        window.location.href = `./Vues/recipe/voir.php?id=${id}`;


    });
});




const button = document.querySelectorAll('.btn');
button.forEach(button => {
    button.addEventListener('click', event => {
        const card = event.target.closest('.card');
        const id = card.getAttribute('data-id');
        window.location.href = `index.php?url=Admin/supprimerRecette&id=${id}`;


    });
});