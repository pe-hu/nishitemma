'use strict'

async function indexJSON(requestURL) {
  const request = new Request(requestURL);
  const response = await fetch(request);
  const jsonIndex = await response.text();
  const index = JSON.parse(jsonIndex);
  indexHead(index);
  indexORG(index);
  indexItems(index);
}

function indexHead(obj) {
  const head = document.querySelector('head');
  const indexTitle = document.createElement('title');
  indexTitle.textContent = obj['title'];
  head.appendChild(indexTitle);

  const indexDescription = document.createElement('meta');
  indexDescription.setAttribute("name", "description");
  indexDescription.setAttribute("content", obj['description']);
  head.appendChild(indexDescription);

  const indexAuthor = document.createElement("meta");
  indexAuthor.setAttribute("name", "author");
  indexAuthor.setAttribute("content", obj['author']);
  head.appendChild(indexAuthor);

  const indexEmail = document.createElement("meta");
  indexEmail.setAttribute("name", "reply-to");
  indexEmail.setAttribute("content", obj['email']);
  head.appendChild(indexEmail);

  const iconCC = document.createElement("link");
  iconCC.rel = "icon";
  iconCC.type = "image/png";
  iconCC.href = obj['icon'];
  head.appendChild(iconCC);
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

async function fetchHTML(url = '', query = '') {
  fetch(url)
    .then(response => response.text())
    .then(innerHTML => {
      document.querySelector(query).innerHTML = innerHTML
    });
}

window.onload = function () {
  let filter = document.querySelectorAll('#org label')
  let targets = document.querySelectorAll("#contents li")

  //****** for all select ******
  filter.forEach(i => {
    i.addEventListener('click', () => {
      let value = i.getAttribute('for')
      //*** for each target ***
      targets.forEach(ii => {
        //*** delete hidden class ***
        ii.classList.remove('hidden')
        ii.hidden = false
        //*** check target every select ***
        let thisData = ii.getAttribute('data-org')
        //*** set hidden class ***
        if (value !== 'all' && value !== thisData) {
          ii.classList.add('hidden')
          ii.hidden = true
        }
      });
    }, false);
  });
};