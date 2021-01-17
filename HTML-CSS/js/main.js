/**
 * Change the visibility of an element
 * @param {Node} img the element to change or hide
 * @param {Node} btn the clicked button
 */
function toggleDisplay(img, btn) {
    if (img.classList.contains("show")) {
        img.classList.remove("show");
        img.classList.add("hide");
        btn.innerHTML = 'Afficher';
    }
    else {
        img.classList.remove("hide");
        img.classList.add("show");
        btn.innerHTML = 'Masquer';
    }
}



/* Wait for the HMTL page */
document.addEventListener("DOMContentLoaded", function (event) {

    // Get all the cards with the this two child elements {0: img, 1: card-body}
    var cards = document.querySelectorAll(".card");

    for (let i = 0; i < cards.length; i++) {

        /* Get the image of the card */
        // The image element is the first child node of a card
        let img = cards[i].children[0];

        /* Get the button "Afficher" of a card */
        // The button is a child of the second child node of the card
        let btn = cards[i].children[1].getElementsByClassName("btn-toggle")[0];

        btn.addEventListener("click", (e) => {
            e.preventDefault();
            toggleDisplay(img, btn);
        });
    }

});