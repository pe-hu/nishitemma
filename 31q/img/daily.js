daily();

function daily() {
    mydate = new Date();
    num = mydate.getDate();
    document.querySelector('#cover').style.backgroundImage = 'url(img/' + num + '.jpg)';
}
