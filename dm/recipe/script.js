'use strict'

async function indexJSON(requestURL) {
    const request = new Request(requestURL);
    const response = await fetch(request);
    const jsonIndex = await response.text();
    const index = JSON.parse(jsonIndex);
    json(index);
}

function json(obj) {
    const recipeAll = obj.recipe;
    for (const recipe of recipeAll) {
        const thisRecipe = document.querySelector(`#${recipe.id}`)
        const dialog = document.querySelector("#dialog")
        const a = document.querySelector("#dialog a")

        // URLのアンカー（#以降の部分）を取得
        const urlHash = location.hash;
        if (!urlHash) {
            thisRecipe.style.pointerEvents = "none"
            thisRecipe.style.userSelect = "none"
        } else {
            // URLにアンカーがある場合
            let id = urlHash.replace('#', '')
            if (id === 'renren') {
                thisRecipe.addEventListener('click', () => {
                    dialog.showModal()
                    a.href = recipe.www
                    a.innerHTML = recipe.name
                }, false);
            } else {
                thisRecipe.style.pointerEvents = "none"
                thisRecipe.style.userSelect = "none"
            }
        }
    }
}