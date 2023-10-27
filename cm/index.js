'use strict'

document.addEventListener('readystatechange', event => {
    if (event.target.readyState === 'interactive') {
        indexJSON('index.json');
    } else if (event.target.readyState === 'complete') {
        //
    }
});

async function indexJSON(requestURL) {
    const request = new Request(requestURL);
    const response = await fetch(request);
    const jsonIndex = await response.text();
    const index = JSON.parse(jsonIndex);
    indexMembers(index);
}

function indexMembers(obj) {
    const all = document.querySelector('#members')
    const dialog = document.querySelector("#dialog")
    const h2 = document.querySelector('#name')

    const contents = obj.members;
    for (const i of contents) {
        const as = document.createElement('p')
        as.innerHTML = `<u>${i.as}</u><br>`
        all.appendChild(as);
        const members = i.list;
        for (const ii of members) {
            const button = document.createElement('button')
            button.setAttribute("type", "button");
            button.textContent = ii.name;
            as.appendChild(button);
            button.addEventListener('click', () => {
                const section = document.querySelector("#dialog section")
                h2.textContent = ii.name
                section.innerHTML = ""
                if (ii.note) {
                    const note = ii.note;
                    for (const iii of note) {
                        const p = document.createElement('p')
                        p.innerHTML = `
                        <a href="${iii.url}">${iii.title}</a><br>
                        <small>${iii.description}</small>
                        `
                        section.appendChild(p);
                    }
                }
                dialog.showModal()
            }, false);
        }
    }
}