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
        const pdf = document.querySelector("#pdf")
        thisRecipe.addEventListener('click', () => {
            dialog.showModal()
            pdf.src = recipe.www
        }, false);
    }
}