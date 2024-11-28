var text = "Berikut Daftar Kamar di Asrama"
var output = document.getElementById("titlekamar")

var i = 0
function typeWriter(){
    if (i < text.length){
        output.textContent += text.charAt(i);
        i++
        setTimeout(typeWriter, 50);
    }
}

typeWriter()