'use strict'

function indexHead() {
  const head = document.querySelector('head');
  const indexTitle = document.createElement('title');
  indexTitle.textContent = thisTitle;
  head.appendChild(indexTitle);

  const indexDescription = document.createElement('meta');
  indexDescription.setAttribute("name", "description");
  indexDescription.setAttribute("content", thisDescription);
  head.appendChild(indexDescription);

  const indexAuthor = document.createElement('meta');
  indexAuthor.setAttribute("name", "author");
  indexAuthor.setAttribute("content", "∧° ┐ | creative, community space");
  head.appendChild(indexAuthor);

  const indexEmail = document.createElement('meta');
  indexEmail.setAttribute("name", "reply-to");
  indexEmail.setAttribute("content", "we.are.pe.hu@gmail.com");
  head.appendChild(indexEmail);

  const indexIcon = document.createElement("link");
  indexIcon.rel = "icon";
  indexIcon.href = favicon;
  head.appendChild(indexIcon);
}

function indexBody() {
  const dataTime = document.querySelector('#date');
  dataTime.textContent = thisDate;
  dataTime.setAttribute("data-time", thisDatetime);
  document.querySelector('#title').textContent = thisTitle;
  document.querySelector('#description').textContent = thisDescription;
  document.querySelector('#door').textContent = thisDoor;

  dataTime.addEventListener('click', function (event) {
      let ago = new Date(thisDatetime);
      let diff = new Date().getTime() - ago.getTime();

      let progress = new Date(diff);
      if (progress.getUTCFullYear() - 1970) {
          event.target.textContent = progress.getUTCFullYear() - 1970 + '年前';
      } else if (progress.getUTCMonth()) {
          event.target.textContent = progress.getUTCMonth() + 'ヶ月前';
      } else if (progress.getUTCDate() - 1) {
          event.target.textContent = progress.getUTCDate() - 1 + '日前';
      } else if (progress.getUTCHours()) {
          event.target.textContent = progress.getUTCHours() + '時間前';
      } else if (progress.getUTCMinutes()) {
          event.target.textContent = progress.getUTCMinutes() + '分前';
      } else {
          event.target.textContent = 'たった今';
      }
  });

  const backBtn = document.createElement('button');
  backBtn.id = "backBtn"
  backBtn.className = "noprint"
  backBtn.textContent = "↵"
  backBtn.type = "button"
  backBtn.style.position = "fixed"
  backBtn.style.bottom = "0.5rem"
  backBtn.style.right = "0.5rem"
  backBtn.style.fontSize = "200%"
  backBtn.style.width = "2.5rem"
  backBtn.style.height = "2.5rem"
  document.body.appendChild(backBtn);

  backBtn.addEventListener('click', function () {
      history.back(-1);
  });
}

async function fetchHTML(url = '', query = '') {
  fetch(url)
    .then(response => response.text())
    .then(innerHTML => {
      document.querySelector(query).innerHTML = innerHTML
    });
}