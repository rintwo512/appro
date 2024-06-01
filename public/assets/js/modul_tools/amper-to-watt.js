function setfocus() {
    document.calcform.x.focus();
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

window.addEventListener("DOMContentLoaded", function () {
    document.getElementById("calcform").onkeypress = function (e) {
        if (e.keyCode == 13) convert();
    };
});
function OnPhaseChange() {
    var iphase = document.calcform.phase.selectedIndex;
    var row0 = document.getElementById("pf0");
    var row1 = document.getElementById("pf1");
    if (iphase == 0) {
        document.calcform.pf.disabled = true;
        document.calcform.pf.style.backgroundColor = "#f0f0f0";
        row0.style.display = "none";
        row1.style.display = "none";
    } else if (iphase == 1) {
        document.calcform.pf.disabled = false;
        document.calcform.pf.style.backgroundColor = "#ffffff";
        row0.style.display = "none";
        row1.style.display = "";
    } else {
        document.calcform.pf.disabled = false;
        document.calcform.pf.style.backgroundColor = "#ffffff";
        row0.style.display = "";
        row1.style.display = "";
    }
}
function convert() {
    var x1 = document.calcform.x1.value;
    var x2 = document.calcform.x2.value;
    var iaunit = document.getElementById("aunitsel").selectedIndex;
    var ivunit = document.getElementById("vunitsel").selectedIndex;
    var iphase = document.calcform.phase.selectedIndex;
    var ivolt = document.calcform.volt.selectedIndex;
    var pf = document.calcform.pf.value;
    if (iaunit == 0) x1 /= 1000;
    if (iaunit == 2) x1 *= 1000;
    if (ivunit == 0) x2 /= 1000;
    if (ivunit == 2) x2 *= 1000;
    var w = x1 * x2;
    if (pf < 0 || pf > 1) {
        alert("Please enter power factor from 0 to 1");
        document.calcform.pf.focus();
        return;
    }
    if (iphase == 1) w *= pf;
    else if (iphase == 2) {
        if (ivolt == 0) w *= pf * Math.sqrt(3);
        else w *= pf * 3;
    }
    document.calcform.y.value = roundresult(w);
    document.calcform.y2.value = roundresult(w / 1000.0);
    document.calcform.y3.value = roundresult(1000 * w);
}
