img = new Array(
    "https://d2w9rnfcy7mm78.cloudfront.net/4329920/large_020e96ac2be1cd8566d1c40d90b22120.jpg?1558668721",
    "https://d2w9rnfcy7mm78.cloudfront.net/4329843/large_02662da1bd36d9e08cc4e65033ee1c9c.jpg?1558667368",
    "https://d2w9rnfcy7mm78.cloudfront.net/4329849/large_eb3dc58ab72bc18add9b55103647592e.jpg?1558667499"); //*1
count = 0;
change();

function change() {
    count++;
    if (count == img.length) count = 0;
    document.image.src = img[count];
    setTimeout("change()", 2000);
}