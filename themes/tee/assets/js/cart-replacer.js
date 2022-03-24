window.onload = function() {
    let variations = document.querySelectorAll('dt');

    for (let variation of variations) {
        let text = variation.innerText;
        let newText;
        if (text=="Choose a colour for your T::") {
            newText = "Colour:";
        } else if (text=="Choose a colour for your design::") {
            newText = "Design Colour:";
        } else if (text=="Choose a design:") {
            newText = "Design:";
        } else {
            newText = text.replace("::", ":");
        }
        variation.innerText = newText;
    }
}
