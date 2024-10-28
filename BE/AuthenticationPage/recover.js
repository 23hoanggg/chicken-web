const recoverButton = document.getElementById('recoverTab');
const cancelButton = document.getElementById('cancelTab');
const signInDiv = document.getElementById('signIn');
const recoverDiv = document.getElementById('recoverPassword');

recoverButton.addEventListener('click', function (event) {
    event.preventDefault();
    signInDiv.style.display = 'none';
    recoverDiv.style.display = 'block';
});

cancelButton.addEventListener('click', function (event) {
    event.preventDefault();
    recoverDiv.style.display = 'none';
    signInDiv.style.display = 'block';
});
