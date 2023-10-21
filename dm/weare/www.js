'use strict'

async function indexJSON(requestURL) {
    const request = new Request(requestURL);
    const response = await fetch(request);
    const jsonIndex = await response.text();
    const index = JSON.parse(jsonIndex);
    indexMembers(index);
}

function indexMembers(obj) {
    const main = document.querySelector('main ul');
    const contentsAll = obj.contents;
    for (const content of contentsAll) {
        const li = document.createElement('li');
        li.className = "img"
        li.style.backgroundImage = `url(${content.img})`;
        main.appendChild(li);
    }
}