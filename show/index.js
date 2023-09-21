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
  let target = document.querySelectorAll("#contents li")

  filter.forEach(i => {
    i.addEventListener('change', () => {
      let value = i.value

      target.forEach(ii => {
        ii.hidden = true
        if (value == 'all') {
          ii.hidden = false
        } else {
          let thisAll = document.querySelectorAll(`#contents li.${value}`)
          thisAll.forEach(iii => {
            iii.hidden = false
          }, false)
        }
      })
    }, false)
  })
})