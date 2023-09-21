'use strict'

document.addEventListener("DOMContentLoaded", function () {
    function randomHEX() {
        let code = '0123456789ABCDEF';
        let str = '#';
        for (let i = 0; i < 6; i++) {
            str += code[Math.floor(Math.random() * code.length)];
        }
        return str;
    }

    const hexAll = document.querySelectorAll('.hexColor');
    hexAll.forEach(hexEach => {
        hexEach.style.color = randomHEX()

        hexEach.addEventListener('mouseover', (event) => {
            hexEach.style.color = randomHEX()
        }, false);
    });
});