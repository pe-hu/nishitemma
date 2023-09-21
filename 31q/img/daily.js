daily();

function daily() {
    mydate = new Date();
    num = mydate.getDate();
    document.write('<img src="img/' + num + '.jpg">');
}
