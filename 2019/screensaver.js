(function () {
    const sec = 31;
    const events = ['keydown', 'mousemove', 'scroll', 'wheel', 'touchstart', 'click'];
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

const backBtn = document.createElement('button');
backBtn.id = "backBtn"
backBtn.className = "noprint"
backBtn.textContent = "↵"
backBtn.type = "button"
backBtn.style.position = "fixed"
backBtn.style.bottom = "0.5rem"
backBtn.style.right = "0.5rem"
backBtn.style.fontSize = "200%"
backBtn.style.width = "2.5rem"
backBtn.style.height = "2.5rem"
document.body.appendChild(backBtn);

backBtn.addEventListener('click', function () {
    history.back(-1);
});