const bar = document.getElementById("bar");
const close = document.getElementById("close");
const nav = document.getElementById("navbar");
var mainImg = document.getElementById("mainImg")
var smalling = document.getElementsByClassName("small-img");

if (bar) {
    bar.addEventListener("click", () => {
        nav.classList.add("active");
    })
}

if (close) {
    close.addEventListener("click", () => {
        nav.classList.remove("active");
    })
}

smalling[0].onclick = function () {
    mainImg.src = smalling[0].src;
}
smalling[1].onclick = function () {
    mainImg.src = smalling[1].src;
}
smalling[2].onclick = function () {
    mainImg.src = smalling[2].src;
}
smalling[3].onclick = function () {
    mainImg.src = smalling[3].src;
}

// function nComentario(){
//     let li = document.createElement("li");
//     let valoringresado = document.getElementById("nuevoComentario").value;
//     let text = document.createTextNode(valoringresado);
//     li.appendChild(text);

//     if(valoringresado ===""){
//         alert("Ingrese un comentario")
//     }else{
//         document.getElementById("comentarios").appendChild(li);
//     }
//     document.getElementById("nuevoComentario").value="",
//     li.className="comentario"

//     let borrar = document.createElement("p");
//     borrar.innerHTML=("Borrar");
//     borrar.className="close";
//     li.appendChild(borrar);

//     let close = document.getElementsByClassName("close");
//     let i;
//     for(i=0;i<close.length;i++){
//         close[i].onclick=function(){
//             let div =this.parentElement;
//             this.style.display ="none";
//         }
//     }
// }