const images = document.getElementById('loop_wrap');

let img_src = [
    "https://vg.pe.hu/jp/dm/img/000.jpg",
    "https://vg.pe.hu/jp/dm/img/001.jpg",
    "https://vg.pe.hu/jp/dm/img/002.jpg",
    "https://vg.pe.hu/jp/dm/img/003.jpg",
    "https://vg.pe.hu/jp/dm/img/004.jpg",
    "https://vg.pe.hu/jp/dm/img/005.jpg",
    "https://vg.pe.hu/jp/dm/img/006.jpg",
    "https://vg.pe.hu/jp/dm/img/007.jpg",
    "https://vg.pe.hu/jp/dm/img/008.jpg",
    "https://vg.pe.hu/jp/dm/img/009.jpg",
    "https://vg.pe.hu/jp/dm/img/010.jpg",
    "https://vg.pe.hu/jp/dm/img/011.jpg",
    "https://vg.pe.hu/jp/dm/img/012.jpg",
    "https://vg.pe.hu/jp/dm/img/013.jpg",
    "https://vg.pe.hu/jp/dm/img/014.jpg",
    "https://vg.pe.hu/jp/dm/img/015.jpg",
    "https://vg.pe.hu/jp/dm/img/016.jpg",
    "https://vg.pe.hu/jp/dm/img/017.jpg",
    "https://vg.pe.hu/jp/dm/img/018.jpg",
    "https://vg.pe.hu/jp/dm/img/019.jpg",
    "https://vg.pe.hu/jp/dm/img/020.jpg",
    "https://vg.pe.hu/jp/dm/img/021.jpg",
    "https://vg.pe.hu/jp/dm/img/022.jpg",
    "https://vg.pe.hu/jp/dm/img/023.jpg"
];

for (var i = 0; i < 2; i++) {
    for (let count = 0; count < img_src.length; count++) {
        const img_element = document.createElement('img');
        img_element.src = img_src[count];
        images.appendChild(img_element);
    }
}
