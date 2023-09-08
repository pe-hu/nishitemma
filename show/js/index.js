'use strict'

const indexHead = document.querySelector('head');
const indexTitle = document.createElement('title');
const ogTitle = document.createElement('meta');
indexTitle.textContent = thisTitle;
ogTitle.setAttribute("property", "og:title");
ogTitle.setAttribute("content", thisTitle);
indexHead.appendChild(indexTitle);
indexHead.appendChild(ogTitle);
const indexDescription = document.createElement('meta');
const ogDescription = document.createElement('meta');
indexDescription.setAttribute("name", "description");
indexDescription.setAttribute("content", thisDate + ' | ' + thisDescription + ' | ' + thisDoor);
ogDescription.setAttribute("property", "og:description");
ogDescription.setAttribute("content", thisDate + ' | ' + thisDescription + ' | ' + thisDoor);
indexHead.appendChild(indexDescription);
indexHead.appendChild(ogDescription);

const indexIcon = document.createElement("link");
indexIcon.rel = "icon";
indexIcon.href = favicon;
indexHead.appendChild(indexIcon);

document.addEventListener("DOMContentLoaded", function () {
    const dataTime = document.querySelector('#date');
    dataTime.textContent = thisDate;
    dataTime.setAttribute("data-time", thisDatetime);
    document.querySelector('#title').textContent = thisTitle;
    document.querySelector('#description').textContent = thisDescription;
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
});
