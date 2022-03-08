// Hide or show address forms
let editLinks = document.getElementsByClassName('checkout-edit');
const shipping = document.getElementById('tee-checkout-shipping');
const billing = document.getElementById('tee-checkout-billing');
let x=0;

for (let link of editLinks) {
    link.addEventListener('click', (e)=>{
        if(x==1) {
            shipping.classList.toggle('tee-hidden');
        } else {
            billing.classList.toggle('tee-hidden');
        }
    });
    x++;
}