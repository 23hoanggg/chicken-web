function validateUpdateForm() {
    const fName = document.getElementById('fName').value.trim();
    const lName = document.getElementById('lName').value.trim();
    const location = document.getElementById('location').value.trim();
    const phone = document.getElementById('phone').value.trim();

    let valid = true;

    document.getElementById('fNameError').innerText = '';
    document.getElementById('lNameError').innerText = '';
    document.getElementById('locationError').innerText = '';
    document.getElementById('phoneError').innerText = '';

    if (fName === '') {
        document.getElementById('fNameError').innerText = 'Họ không được để trống.';
        valid = false;
    } else if (!/^[a-zA-Z ]*$/.test(fName)) {
        document.getElementById('fNameError').innerText = 'Họ chỉ được chứa chữ cái và khoảng trắng.';
        valid = false;
    }

    if (lName === '') {
        document.getElementById('lNameError').innerText = 'Tên không được để trống.';
        valid = false;
    } else if (!/^[a-zA-Z ]*$/.test(lName)) {
        document.getElementById('lNameError').innerText = 'Tên chỉ được chứa chữ cái và khoảng trắng.';
        valid = false;
    }

    if (location === '') {
        document.getElementById('locationError').innerText = 'Địa chỉ không được để trống.';
        valid = false;
    }

    if (phone === '') {
        document.getElementById('phoneError').innerText = 'Số điện thoại không được để trống.';
        valid = false;
    } else if (!/^[0-9]{10,15}$/.test(phone)) {
        document.getElementById('phoneError').innerText = 'Số điện thoại không hợp lệ. Phải chứa từ 10 đến 15 chữ số.';
        valid = false;
    }

    return valid;
}
