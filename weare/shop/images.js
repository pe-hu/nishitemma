img = new Array(
    "https://64.media.tumblr.com/83fdc5d7771e6ed5489f069cd94a26fb/7622c702447acdef-91/s2048x3072/16e24d32671968051c01008478ad3ff9f40ab4fb.jpg",
    "https://64.media.tumblr.com/1bcb5903cb30e8e3fd5355db6818262d/7622c702447acdef-86/s2048x3072/3ff2a6f544d7bf84fbb57ec206210a5efd9fb41d.jpg",
    "https://64.media.tumblr.com/e249a487bf8cfde927f89dbae7c1979b/7622c702447acdef-6a/s2048x3072/c5b2a115940525c60a299e8a7724f169a652c922.jpg",
    "https://64.media.tumblr.com/8a17faf8ea07c14d3f9f3584ef99e932/7622c702447acdef-e8/s2048x3072/889c03d0b3eea85f9b094285a2efcd5f01bac509.jpg",
    "../../shop/bg.jpeg",
    );
count = 0;
change();

function change() {
    count++;
    if (count == img.length) count = 0;
    document.image.src = img[count];
    setTimeout("change()", 2000);
}