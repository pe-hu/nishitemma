'use strict'

async function indexJSON(requestURL) {
    const request = new Request(requestURL);
    const response = await fetch(request);
    const jsonIndex = await response.text();
    const index = JSON.parse(jsonIndex);
    indexMembers(index);
}

function indexMembers(obj) {
    const main = document.querySelector('main ul')
    const contentsAll = obj.contents;
    const dialog = document.querySelector("#dialog")
    const section = document.querySelector("#dialog section")

    for (const content of contentsAll) {
        const li = document.createElement('li')
        li.className = "img"
        li.style.backgroundImage = `url(${content.img})`
        main.appendChild(li);
        li.addEventListener('click', () => {
            section.id = content.id
            section.innerHTML = `
            <img src="${content.img}">
            <img src="${content.id}/001.png">
            <img src="${content.id}/002.png">
            <img src="${content.id}/003.png">
            <img src="${content.id}/004.png">
            <img src="${content.id}/005.png">
            <img src="${content.id}/006.png">
            <img src="${content.id}/007.png">
            <img src="${content.id}/008.png">
            <img src="${content.id}/009.png">
            `
            dialog.showModal()

            // URLのアンカー（#以降の部分）を取得
            const urlHash = location.hash;
            const www = document.querySelector("#dialog a")
            if (!urlHash) {
                www.textContent = "Sample"
            } else {
                // URLにアンカーがある場合
                let id = urlHash.replace('#', '')
                if (id === 'download') {
                    www.href = content.www
                    www.textContent = "Download"
                    www.setAttribute("target", "_blank")
                } else {
                    www.textContent = "Sample"
                }
            }
        }, false);
    }
}