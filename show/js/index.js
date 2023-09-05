'use strict'

const head = document.querySelector('head');
const dataTime = document.querySelector('#date');

dataTime.textContent = thisDate
dataTime.setAttribute("data-time", thisDatetime)
document.querySelector('#title').textContent = thisTitle
const indexTitle = document.createElement('title');
const ogTitle = document.createElement('meta');
indexTitle.textContent = thisTitle;
ogTitle.setAttribute("property", "og:title");
ogTitle.setAttribute("content", thisTitle);
head.appendChild(indexTitle);
head.appendChild(ogTitle);

document.querySelector('#description').textContent = thisDescription
document.querySelector('#door').textContent = thisDoor
const indexDescription = document.createElement('meta');
const ogDescription = document.createElement('meta');
indexDescription.setAttribute("name", "description");
indexDescription.setAttribute("content", thisDate + ' | ' + thisDescription + ' | ' + thisDoor);
ogDescription.setAttribute("property", "og:description");
ogDescription.setAttribute("content", thisDate + ' | ' + thisDescription + ' | ' + thisDoor);
head.appendChild(indexDescription);
head.appendChild(ogDescription);

dataTime.addEventListener('click', function(event) {
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
