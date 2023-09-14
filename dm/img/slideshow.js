const images = document.querySelector('#loop_wrap');

let img_src = [
  "img/000.jpg",
  "img/001.jpg",
  "img/002.jpg",
  "img/003.jpg",
  "img/004.jpg",
  "img/005.jpg",
  "img/006.jpg",
  "img/007.jpg",
  "img/008.jpg",
  "img/009.jpg",
  "img/010.jpg",
  "img/011.jpg",
  "img/012.jpg",
  "img/013.jpg",
  "img/014.jpg",
  "img/015.jpg",
  "img/016.jpg",
  "img/017.jpg",
  "img/018.jpg",
  "img/019.jpg",
  "img/020.jpg",
  "img/021.jpg",
  "img/022.jpg",
  "img/023.jpg",
];

for (let i = 0; i < 2; i++) {
  for (let count = 0; count < img_src.length; count++) {
    const img_element = document.createElement('img');
    img_element.src = img_src[count];
    images.appendChild(img_element);
  }
}
