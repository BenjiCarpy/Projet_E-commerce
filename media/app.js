//Les variables d'élément
const darkCoverElt = document.querySelector("#dark_cover");

//fonction d'action
const handleClickDarkCover = function() {

    darkCoverElt.style.opacity = 0;

    setTimeout( function() {

        darkCoverElt.remove();

    }, 1000);
    
}

//Les event listener (effectue une action en cas d'événèment)
darkCoverElt.addEventListener("click" , handleClickDarkCover);