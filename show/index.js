'use strict'

async function indexJSON(requestURL) {
  const request = new Request(requestURL);
  const response = await fetch(request);
  const jsonIndex = await response.text();
  const index = JSON.parse(jsonIndex);
  indexItems(index);
}

function indexItems(obj) {
  const contents = document.querySelector('#contents');
  const contentsAll = obj.contents;

  for (const content of contentsAll) {
    const contentsLi = document.createElement('li');
    contentsLi.setAttribute("class", content.org);
    contentsLi.innerHTML = `
        <time>${content.date}</time>
        <h3>${content.name}</h3>
        <small>${content.description}</small>
        <a style="display:${content.link};" href="${content.href}"></a>
        `
    contents.appendChild(contentsLi);
  }
}

indexJSON('show/index.json')

window.addEventListener("load", () => {
  let filter = document.querySelectorAll('#org input[type="radio"]')
  for (let i of filter) {
    i.addEventListener('change', () => {
      let value = i.value;
      let targets = document.querySelectorAll("#contents li");
      for (let ii of targets) {
        ii.hidden = false;
        let item_data = ii.getAttribute('class')
        if (value && value !== 'all' && value !== item_data) {
          ii.hidden = true;
        }
      }
    })
  }
})