$(document).ready(() => {

    
    
   

    $(".products").css("display", "none")
console.log("dfdf")

let initialId = $(".product-categories .clicked").attr("data-id");
$(".products[data-category=" + initialId + "]").css("display", "flex")
})





let showCategory = event => {
    let id = $(event.target).attr("data-id");

    $(".product-categories button").removeClass("clicked")
    $(event.target).addClass("clicked");


    $(".products").css("display", "none")
    $(".products[data-category=" + id + "]").css("display", "flex")
}


