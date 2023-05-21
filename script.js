function copyToClipboard(element) {
    var text = decodeURIComponent(element.getAttribute('data-content')).replace(/\+/g, ' ');
    navigator.clipboard.writeText(text).then(function() {
        var alertBox = document.getElementById('copy-alert');
        alertBox.style.display = 'block';
        setTimeout(function(){ alertBox.style.display = 'none'; }, 3000);
    }, function(err) {
        console.error('Async: Could not copy text: ', err);
    });
}

function showAll(text) {
    var modal = document.getElementById('modal');
    var span = document.getElementsByClassName('close-button')[0];
    var modalText = document.getElementById('modal-text');

    modal.style.display = 'block';
    // remove leading and trailing spaces and replace all instances of ' #' with '<span class="hashtag">#</span>'
    modalText.innerHTML = decodeURIComponent(text).replace(/\+/g, ' ').replace(/#(\w+)/g, '<span class="hashtag">#$1</span>').trim();

    span.onclick = function() {
        modal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
}

