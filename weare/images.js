img = new Array(
    "../dm/img/000.jpg",
    "../dm/img/006.jpg",
    "../dm/img/019.jpg",
    "../dm/img/020.jpg",
    "../dm/img/021.jpg",
    "../dm/img/022.jpg",
    "../dm/img/023.jpg",
    );
count = 0;
change();

function change() {
    count++;
    if (count == img.length) count = 0;
    document.image.src = img[count];
    setTimeout("change()", 2000);
}