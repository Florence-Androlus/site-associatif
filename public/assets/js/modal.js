// Get the modal
var biographyModal = document.getElementById('biographyModal');
var elected1Modal = document.getElementById('elected1Modal');
var elected2Modal = document.getElementById('elected2Modal');

// Get the button that opens the modal
var biographyBtn = document.getElementById("biographyBtn");
var elected1Btn = document.getElementById("elected1Btn");
var elected2Btn = document.getElementById("elected2Btn");

// Get the <span> element that closes the modal
var biographySpan = document.getElementById("biographyClose");
var elected1Span = document.getElementById("elected1Close");
var elected2Span = document.getElementById("elected2Close");

// When the user clicks the button, open the modal 
biographyBtn.onclick = function() {
    biographyModal.style.display = "block";
}
elected1Btn.onclick = function() {
    elected1Modal.style.display = "block";
}
elected2Btn.onclick = function() {
    elected2Modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
biographySpan.onclick = function() {
    biographyModal.style.display = "none";
}
elected1Span.onclick = function() {
    elected1Modal.style.display = "none";
}
elected2Span.onclick = function() {
    elected2Modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == biographyModal) {
        biographyModal.style.display = "none";
    }
    if (event.target == elected1Modal) {
        elected1Modal.style.display = "none";
    }
    if (event.target == elected2Modal) {
        elected2Modal.style.display = "none";
    }
}