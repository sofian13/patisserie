function openLoginPage() {
    document.querySelector(".reg").classList.remove("show-page");
    document.querySelector(".login").classList.add("show-page");
    document.getElementById("login-action").classList.add("show");
    document.getElementById("reg-action").classList.remove("show");
}

function openRegPage() {
    document.querySelector(".reg").classList.add("show-page");
    document.querySelector(".login").classList.remove("show-page");
    document.getElementById("reg-action").classList.add("show");
    document.getElementById("login-action").classList.remove("show");
}

$(document).ready(function() {
    var zindex = 10;

    $("div.card").click(function(e) {
        e.preventDefault();

        var isShowing = false;

        if ($(this).hasClass("show")) {
            isShowing = true;
        }

        if ($("div.cards").hasClass("showing")) {
            // a card is already in view
            $("div.card.show").removeClass("show");

            if (isShowing) {
                // this card was showing - reset the grid
                $("div.cards").removeClass("showing");
            } else {
                // this card isn't showing - get in with it
                $(this).css({ zIndex: zindex }).addClass("show");
            }

            zindex++;
        } else {
            // no cards in view
            $("div.cards").addClass("showing");
            $(this).css({ zIndex: zindex }).addClass("show");

            zindex++;
        }
    });
});