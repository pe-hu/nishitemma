function daily() {
    mydate = new Date();
    num = mydate.getDate() % 32;
    document.write('<img class="center" src="https://vg.pe.hu/jp/31q/img/' + num + '.jpg">');
}

daily();
