const images = document.getElementById('loop_wrap');

let img_src = [
    "/jp/dm/img/000.jpg",
    "/jp/dm/img/001.jpg",
    "/jp/dm/img/002.jpg",
    "/jp/dm/img/003.jpg",
    "/jp/dm/img/004.jpg",
    "/jp/dm/img/005.jpg",
    "/jp/dm/img/006.jpg",
    "/jp/dm/img/007.jpg",
    "/jp/dm/img/008.jpg",
    "/jp/dm/img/009.jpg",
    "/jp/dm/img/010.jpg",
    "/jp/dm/img/011.jpg",
    "/jp/dm/img/012.jpg",
    "/jp/dm/img/013.jpg",
    "/jp/dm/img/014.jpg",
    "/jp/dm/img/015.jpg",
    "/jp/dm/img/016.jpg",
    "/jp/dm/img/017.jpg",
    "/jp/dm/img/018.jpg",
    "/jp/dm/img/019.jpg",
    "/jp/dm/img/020.jpg",
    "/jp/dm/img/021.jpg",
    "/jp/dm/img/022.jpg",
    "/jp/dm/img/023.jpg"
];

for (var i = 0; i < 2; i++) {
    for (let count = 0; count < img_src.length; count++) {
        const img_element = document.createElement('img');
        img_element.src = img_src[count];
        images.appendChild(img_element);
    }
}