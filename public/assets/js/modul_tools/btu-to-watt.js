function setfocus() {
    document.calcform.x.focus();
}

function calc() {
    x = document.calcform.x.value;
    y = convert(x);
    y = roundresult(y);
    document.calcform.y.value = y;
}

function str2num(s) {
    s = s
        .toString()
        .trim()
        .replace(/(\d)(\s+)(?=\d)/gm, "$1+")
        .replace(/[^-()\d/*+.]/g, "");
    if (s == "") return 0;
    return Function('"use strict";return (' + s + ")")();
}

function isInt(n) {
    return Number(n) === n && n % 1 === 0;
}

function isFloat(n) {
    return Number(n) === n && n % 1 !== 0;
}

function roundresult(x) {
    y = parseFloat(x);
    y = roundnum(y, 10);
    return y;
}

function roundnum(x, p) {
    var i;
    var n = parseFloat(x);
    var m = n.toPrecision(p + 1);
    var y = String(m);
    i = y.indexOf("e");
    if (i == -1) i = y.length;
    j = y.indexOf(".");
    if (i > j && j != -1) {
        while (i > 0) {
            if (y.charAt(--i) == "0") y = removeAt(y, i);
            else break;
        }
        if (y.charAt(i) == ".") y = removeAt(y, i);
    }
    return y;
}

function removeAt(s, i) {
    s = s.substring(0, i) + s.substring(i + 1, s.length);
    return s;
}

function convert(x) {
    return x * 0.293;
}
