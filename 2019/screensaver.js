(function () {
    const sec = 31;
    const events = ['keydown', 'mousemove', 'scroll', 'wheel', 'click'];
    const screensaver = document.querySelector('#screensaver');
    let timeoutId;

    // タイマー設定
    function setTimer() {
        timeoutId = setTimeout(start, sec * 1000);
    }

    // スクリーンセーバー起動
    function start() {
        screensaver.style.opacity = 1;
    }

    // イベント設定
    function setEvents(func) {
        let len = events.length;
        while (len--) {
            addEventListener(events[len], func, false);
        }
    }

    function reset() {
        clearTimeout(timeoutId);
        setTimer();
        screensaver.style.opacity = 0;
    }

    setTimer();
    setEvents(reset);
})();