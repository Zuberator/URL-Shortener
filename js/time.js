clock()

function clock() {
    document.getElementById("clockbox").innerHTML = new Date();
}

setInterval(clock, 1000);