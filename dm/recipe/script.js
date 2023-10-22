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
        thisRecipe.addEventListener('click', () => {
            dialog.showModal()
            a.href = recipe.www
            a.innerHTML = recipe.name
        }, false);
    }
}