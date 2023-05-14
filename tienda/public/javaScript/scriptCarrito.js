function removeItem(productId) {

}

function updateTotalPrice() {
    let totalPrice = 0;
    let tableRows = document.querySelectorAll("#cart-table tbody tr");
    tableRows.forEach(row => {
        let quantityInput = row.querySelector("input[type='number']");
        let priceCell = row.querySelector("td:nth-child(3)");
        let quantity = quantityInput.value;
        let price = priceCell.textContent.replace("$", "");
        totalPrice += quantity * price;
    });
    let totalPriceElement = document.getElementById("total-price");
    totalPriceElement.textContent = "Total: $" + totalPrice.toFixed(2);
}

let quantityInputs = document.querySelectorAll("input[type='number']");
quantityInputs.forEach(input => {
    input.addEventListener("change", updateTotalPrice);
});




const bar = document.getElementById("bar");
const close = document.getElementById("close");
const nav = document.getElementById("navbar");
var mainImg = document.getElementById("mainImg")
var  smalling = document.getElementsByClassName("small-img");

if(bar){
    bar.addEventListener("click", ()=>{
        nav.classList.add("active");
    })
}

if(close){
    close.addEventListener("click", ()=>{
        nav.classList.remove("active");
    })
}

smalling[0].onclick = function(){
    mainImg.src = smalling[0].src;
}
smalling[1].onclick = function(){
    mainImg.src = smalling[1].src;
}
smalling[2].onclick = function(){
    mainImg.src = smalling[2].src;
}
smalling[3].onclick = function(){
    mainImg.src = smalling[3].src;
}