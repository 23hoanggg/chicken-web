// LOGIN FORM
function validateLoginForm() {
    let isValid = true;

    const emailInput = document.getElementById('loginEmail');
    const passwordInput = document.getElementById('loginPassword');

    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');

    if (!emailInput.value.match(/^\S+@\S+\.\S+$/)) {
        emailError.textContent = 'Email không hợp lệ';
        isValid = false;
    } else {
        emailError.textContent = '';
    }

    if (passwordInput.value.length < 6) {
        passwordError.textContent = 'Mật khẩu phải có ít nhất 6 ký tự';
        isValid = false;
    } else {
        passwordError.textContent = '';
    }

    return isValid;
}

document.getElementById('loginEmail').addEventListener('input', () => emailError.textContent = '');
document.getElementById('loginPassword').addEventListener('input', () => passwordError.textContent = '');


// SIGN UP FORM
function validateSignupForm() {
    let isValid = true;

    const fNameInput = document.getElementById('fName');
    const lNameInput = document.getElementById('lName');
    const genderInputs = document.getElementsByName('gender');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');

    const fNameError = document.getElementById('fNameError');
    const lNameError = document.getElementById('lNameError');
    const genderError = document.getElementById('genderError');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');

    if (fNameInput.value.trim() === '') {
        fNameError.textContent = 'Họ không được để trống';
        isValid = false;
    } else {
        fNameError.textContent = '';
    }

    if (lNameInput.value.trim() === '') {
        lNameError.textContent = 'Tên không được để trống';
        isValid = false;
    } else {
        lNameError.textContent = '';
    }

    if (![...genderInputs].some(input => input.checked)) {
        genderError.textContent = 'Vui lòng chọn giới tính';
        isValid = false;
    } else {
        genderError.textContent = '';
    }

    if (!emailInput.value.match(/^\S+@\S+\.\S+$/)) {
        emailError.textContent = 'Email không hợp lệ';
        isValid = false;
    } else {
        emailError.textContent = '';
    }

    if (passwordInput.value.length < 6) {
        passwordError.textContent = 'Mật khẩu phải có ít nhất 6 ký tự';
        isValid = false;
    } else {
        passwordError.textContent = '';
    }

    return isValid;
}

document.getElementById('fName').addEventListener('input', () => fNameError.textContent = '');
document.getElementById('lName').addEventListener('input', () => lNameError.textContent = '');
document.getElementById('email').addEventListener('input', () => emailError.textContent = '');
document.getElementById('password').addEventListener('input', () => passwordError.textContent = '');
document.getElementsByName('gender').forEach(input => input.addEventListener('change', () => genderError.textContent = ''));



// RESET PASSWORD
function validateResetPasswordForm() {
    const emailInput = document.getElementById('loginEmail');
    const emailError = document.getElementById('emailError');
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    emailError.textContent = '';

    if (!emailPattern.test(emailInput.value)) {
        emailError.textContent = 'Email không hợp lệ!';
        emailInput.focus();
        return false;
    }

    return true;
}


// NEW PASSWORD
function validateNewPasswordForm() {
    const password = document.getElementById('password').value;
    const passwordConfirmation = document.getElementById('password_confirmation').value;


    const passwordErrorMessage = document.getElementById('password-error');
    const confirmationErrorMessage = document.getElementById('confirmation-error');


    passwordErrorMessage.textContent = '';
    confirmationErrorMessage.textContent = '';

    let valid = true;

    if (password !== passwordConfirmation) {
        confirmationErrorMessage.textContent = 'Mật khẩu và xác nhận mật khẩu không giống nhau. Vui lòng thử lại.';
        valid = false;
    }

    if (password.length < 6) {
        passwordErrorMessage.textContent = 'Mật khẩu phải có ít nhất 6 ký tự.';
        valid = false;
    }

    return valid;
}

document.getElementById('reset-password-form').addEventListener('submit', function (event) {
    if (!validateNewPasswordForm()) {
        event.preventDefault();
    }
});



