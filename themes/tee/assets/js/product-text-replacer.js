let uploadHeader = document.querySelector('.file_title_clean');
console.log(uploadHeader);

let text = uploadHeader.innerText;
let newText = text.replace('files', 'my own design');
uploadHeader.innerText = newText;
