'use strict'

function indexBody() {
    const thisTitle = document.querySelector('title').textContent
    document.querySelector('#title').textContent = thisTitle;

    const thisDescription = document.querySelector('meta[name="description"]').content;
    document.querySelector('#description').textContent = thisDescription;

    const dataTime = document.querySelector('#date');
    dataTime.textContent = thisDate;
    dataTime.setAttribute("data-time", thisDatetime);
    document.querySelector('#door').textContent = thisDoor;

    dataTime.addEventListener('click', function (event) {
        let ago = new Date(thisDatetime);
        let diff = new Date().getTime() - ago.getTime();

        let progress = new Date(diff);
        if (progress.getUTCFullYear() - 1970) {
            event.target.textContent = progress.getUTCFullYear() - 1970 + '年前';
        } else if (progress.getUTCMonth()) {
            event.target.textContent = progress.getUTCMonth() + 'ヶ月前';
        } else if (progress.getUTCDate() - 1) {
            event.target.textContent = progress.getUTCDate() - 1 + '日前';
        } else if (progress.getUTCHours()) {
            event.target.textContent = progress.getUTCHours() + '時間前';
        } else if (progress.getUTCMinutes()) {
            event.target.textContent = progress.getUTCMinutes() + '分前';
        } else {
            event.target.textContent = 'たった今';
        }
    });

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
}

window.addEventListener("load", (event) => {
    document.querySelector('#print h3 a').textContent = location.href
    document.querySelector('#print h3 a').href = location.href
});