'use strict'

async function indexJSON(requestURL) {
    const request = new Request(requestURL);
    const response = await fetch(request);
    const jsonIndex = await response.text();
    const index = JSON.parse(jsonIndex);
    indexMembers(index);
}

function indexMembers(obj) {
    const members = document.querySelector('#members');
    const contentsAll = obj.members;
    for (const content of contentsAll) {
        const button = document.createElement('button');
        button.setAttribute("type", "button");
        button.textContent = content.name;
        members.appendChild(button);
        button.addEventListener('click', () => {
            const weare = document.querySelector('#weare');
            weare.textContent = content.name;
            const description = document.querySelector('#description');
            description.innerHTML = `
            I'm <i>${content.as}</i>
            `
        }, false);
    }
}