let uploadHeader = document.querySelector('.file_title_clean');
console.log(uploadHeader);

let text = uploadHeader.innerText;
let newText = text.replace('files', 'my own design');
uploadHeader.innerText = newText;

let selectedVariation = document.querySelectorAll('.woo-selected-variation-items-name');
selectedVariation.forEach(variation => {
    console.log(variation);
    let selectedVariationTxt = variation.innerText;
    let newVariationTxt = selectedVariationTxt.replace(': ', '');
    variation.innerText = newVariationTxt;
});
