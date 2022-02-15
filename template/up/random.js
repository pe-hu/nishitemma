const contents = [
    '<img src="/jp/up/img/001.png">',
    '<img src="/jp/up/img/002.png">',
    '<img src="/jp/up/img/003.png">',
    '<img src="/jp/up/img/004.png">',
    '<img src="/jp/up/img/005.png">',
    '<img src="/jp/up/img/006.png">',
    '<img src="/jp/up/img/007.png">',
    '<img src="/jp/up/img/008.png">',
  ];
  
  function randomContents(contentsArray) {
      var contents = contentsArray[Math.floor(Math.random() * contentsArray.length)];
      console.log(contents);
      return contents
  };
  
  function sentenceGenerator() {
      var sentence = `${randomContents(contents)}`;
      document.querySelector('.random').innerHTML = sentence;
  };
  
  window.setInterval(function(){
      sentenceGenerator();
  }, 500);
  
  sentenceGenerator();