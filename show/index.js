'use strict'

async function indexJSON(requestURL) {
  const request = new Request(requestURL);
  const response = await fetch(request);
  const jsonIndex = await response.text();
  const index = JSON.parse(jsonIndex);
  indexORG(index);
  indexItems(index);
}

function indexORG(obj) {
  const navORG = document.querySelector('#org');
  const orgAll = obj.org;

  for (const orgEach of orgAll) {
    const inputORG = document.createElement('input');
    const labelORG = document.createElement('label');

    inputORG.setAttribute("type", "radio");
    inputORG.setAttribute("name", "org");
    inputORG.id = orgEach.id;
    inputORG.value = orgEach.id;
    labelORG.setAttribute("for", orgEach.id);
    labelORG.classList.add(orgEach.id);
    labelORG.innerHTML = orgEach.name;

    navORG.appendChild(inputORG);
    navORG.appendChild(labelORG);
  }
}

function indexItems(obj) {
  const contents = document.querySelector('#contents');
  const contentsAll = obj.contents;

  for (const content of contentsAll) {
    const contentsLi = document.createElement('li');
    contentsLi.setAttribute("data-org", content.org);
    contentsLi.innerHTML = `
        <time>${content.date}</time>
        <h3>${content.name}</h3>
        <small>${content.description}</small>
        <a style="display:${content.link};" href="${content.href}"></a>
        `
    contents.appendChild(contentsLi);
  }
}