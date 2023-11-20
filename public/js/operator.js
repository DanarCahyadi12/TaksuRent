const usernameInput = document.getElementById('email-username')
usernameInput.addEventListener('input', function (e) {
    usernameInput.value = usernameInput.value.replace(/[ ]/g, '');

})
