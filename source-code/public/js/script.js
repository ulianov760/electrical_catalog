document.addEventListener("DOMContentLoaded", function () {
const icon = document.getElementById("icon");
const popup = document.getElementById("sign_in");
const close = document.getElementById("sign_close");
function showPopup() {
    popup.style.display = "inline-block";
}
function hidePopup() {
    popup.style.display = "none";
}
icon.addEventListener("click", showPopup);
close.addEventListener("click", hidePopup);
popup.addEventListener("click", function (event) {
        if (event.target === popup) {
            popup.style.display = "none";
        }
    });
});
