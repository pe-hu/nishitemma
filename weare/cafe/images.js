img = new Array(
    "../../dm/img/banhmi.jpg",
    "../../dm/img/croque.jpg",
    "../../dm/img/france.jpg",
    "../../dm/img/ginger.jpg",
    "../../dm/img/lemon.jpg",
    "../../dm/img/summer.jpg",
    "../../dm/img/tacos.jpg",
    ); //*1
count = 0;
change();

function change() {
    count++;
    if (count == img.length) count = 0;
    document.image.src = img[count];
    setTimeout("change()", 2000);
}