let timedelay = 0;
function delayCheck() {
    if (timedelay == 25) {
        $('.screensaver').fadeIn();
        timedelay = 1;
    }
    timedelay = timedelay + 1;
}

$(document).mousemove(function () {
    $('.screensaver').fadeOut();
    timedelay = 5;
    clearInterval(_delay);
    _delay = setInterval(delayCheck, 500);
});

_delay = setInterval(delayCheck, 500)