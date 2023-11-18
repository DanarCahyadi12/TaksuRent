const telponInput = document.getElementById('telpon')
const usernameInput = document.getElementById('username')
telponInput.addEventListener('input', function (e) {
    telponInput.value = telponInput.value.replace(/[^0-9]/g, '');

})
usernameInput.addEventListener('input', function (e) {
    usernameInput.value = usernameInput.value.replace(/[ ]/g, '');

})
