/*
$(".nav-link").on("click", function(){
    $(".nav-link").find(".active").removeClass("active");
    $(this).addClass("active");
    alert($(this).attr("class"));
});
 */

let e = document.getElementsByClassName("nav-link active");
if (e.length > 0) {
    e[0].style.color = "#b40a31";
}

/* recaptacha */
function onSubmit(token) {
    document.getElementById("msg-form").submit();
}