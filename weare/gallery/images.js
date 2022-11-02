img = new Array(
    "../../dm/img/002.jpg",
    "../../dm/img/003.jpg",
    "../../dm/img/004.jpg",
    "../../dm/img/005.jpg",
    "../../dm/img/010.jpg",
    "../../dm/img/011.jpg",
    "../../dm/img/012.jpg",
    "../../dm/img/013.jpg",
    "../../dm/img/014.jpg",
    "../../dm/img/015.jpg",
    "../../dm/img/017.jpg",
    "../../dm/img/018.jpg",
    );
count = 0;
change();

function change() {
    count++;
    if (count == img.length) count = 0;
    document.image.src = img[count];
    setTimeout("change()", 2000);
}