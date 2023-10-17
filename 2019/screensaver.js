document.addEventListener('readystatechange', event => {
    if (event.target.readyState === 'interactive') {
        fetchHTML('../../menu.html', '#menu');
        screensaver();
    } else if (event.target.readyState === 'complete') {
        const scrollElement = document.querySelector('main ul');
        scrollElement.addEventListener('wheel', (e) => {
            if (Math.abs(e.deltaY) < Math.abs(e.deltaX)) return;
            const maxScrollLeft = scrollElement.scrollWidth - scrollElement.clientWidth;
            if (
                (scrollElement.scrollLeft <= 0 && e.deltaY < 0) ||
                (scrollElement.scrollLeft >= maxScrollLeft && e.deltaY > 0)
            )
                return;

            e.preventDefault();
            scrollElement.scrollLeft += e.deltaY;
        });
    }
});

async function fetchHTML(url = '', query = '') {
    fetch(url)
        .then(response => response.text())
        .then(innerHTML => {
            document.querySelector(query).innerHTML = innerHTML
        });
}

function screensaver() {
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
}