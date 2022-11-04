img = new Array(
    "book/000.png",
    "book/004.png",
    "book/002.png",
    "book/003.png",
    "hal/000.JPG",
    "hal/001.JPG",
);
count = 0;
change();

function change() {
    count++;
    if (count == img.length) count = 0;
    document.image.src = img[count];
    setTimeout("change()", 2000);
}