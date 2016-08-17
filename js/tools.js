function reset() {
    var elem = document.body;
    if (elem.className.match(/(?:^|\s)width--sidebar(?!\S)/))
        elem.className = '';
}

function hide() {
    var body = document.body;

    if (body.className.match(/(?:^|\s)width--sidebar(?!\S)/))
        body.className = '';
    else
        body.className = 'width--sidebar';
}

function buttonHover() {
    this.src = "img/delete2.png";
}