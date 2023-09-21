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

window.addEventListener("load", () => {
  let filterAll = document.querySelectorAll('#org input[type="radio"]')
  let targetAll = document.querySelectorAll("#contents li")

  filterAll.forEach(filterEach => {
    filterEach.addEventListener('change', () => {
      let value = filterEach.value

      targetAll.forEach(targetEach => {
        targetEach.style.display = "none"
        targetEach.hidden = true
        if (value == 'all') {
          targetEach.style.display = "block"
          targetEach.hidden = false
        } else {
          let thisAll = document.querySelectorAll(`#contents .${value}`)
          thisAll.forEach(thisEach => {
            thisEach.style.display = "block"
            thisEach.hidden = false
          }, false);
        }
      });
    }, false);
  });
});