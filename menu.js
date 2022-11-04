const btn = document.getElementById('btn');
const box = document.querySelector('body');

let btnToggleclass = function (close) {
    close.classList.toggle('open');
}

btn.addEventListener('click', function () {
    btnToggleclass(box);
}, false);

$('a[href^="#"]').click(function () {
    let speed = 500; //スクロールスピード
    let href = $(this).attr("href");
    let target = $(href == "#" || href == "" ? 'html' : href);
    let position = target.offset().top;
    $("html, body").animate({
        scrollTop: position
    }, speed, "swing");
    return false;
});