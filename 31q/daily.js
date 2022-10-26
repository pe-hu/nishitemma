function daily() {
    mydate = new Date();
    num = mydate.getDate() % 32;
    document.write('<img src="https://vg.pe.hu/jp/31q/img/' + num + '.jpg">');
}
