function format(x) { // returns hh from h
    if (x < 10) {
        x = "0" + x;
    }
    return x;
}

function clock() {
    var now = new Date();
    var h = now.getHours();
    var m = now.getMinutes();
    var s = now.getSeconds();
    h = format(h);
    m = format(m);
    s = format(s);
    document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
    var t = setTimeout(clock, 500);
}

function clockAlert() {
    alert(document.getElementById('clock').innerHTML);
}