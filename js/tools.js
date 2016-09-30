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

function deleteCom() {
    if (confirm("Are you sure you want to delete this comment ?")) {
        document.load('script/delete-com.php');
    }
    else {
    }
}

function formSubmit() {
	document.getElementById('zdp').submit();
}
