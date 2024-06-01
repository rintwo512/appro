
function calc3() {
    x1 = document.calcform.x1.value;
    x2 = document.calcform.x2.value;
    y = convert(x1, x2);
    y = roundresult(y);
    document.calcform.y.value = y;
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


 function convert(x1, x2) {
     var iphase = document.calcform.phase.selectedIndex;
     var kva = x1 * x2;
     if (iphase == 1) kva *= Math.sqrt(3);
     return kva;
 }