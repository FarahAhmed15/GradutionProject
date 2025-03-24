document.getElementById('registerForm').addEventListener('submit', function(event) {
    // event.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value; // تأكد من أن الـ id مطابقة

    document.getElementById('nameError').textContent = '';
    document.getElementById('emailError').textContent = '';
    document.getElementById('passwordError').textContent = '';
    document.getElementById('confirmPasswordError').textContent = '';


    if (name.trim() === '') {
        document.getElementById('nameError').textContent = 'Name is required.';
        return;
    }

    if (!validateEmail(email)) {
        document.getElementById('emailError').textContent = 'Please enter a valid email address.';
        return;
    }

    // التحقق من صحة كلمة المرور
    const passwordError = validatePassword(password);
    if (passwordError) {
        document.getElementById('passwordError').textContent = passwordError;
        return;
    }

    // التحقق من تطابق كلمة المرور
    if (password !== confirmPassword) {
        document.getElementById('confirmPasswordError').textContent = 'Passwords do not match.';
        return;
    }

    // إذا كانت جميع البيانات صحيحة
    // alert('Registration successful!');
});

function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

function validatePassword(password) {
    // التحقق من طول كلمة المرور
    if (password.length < 6) {
        return 'Password must be at least 6 characters long.';
    }


    if (!/[A-Z]/.test(password)) {
        return 'Password must contain at least one uppercase letter.';
    }

 
    if (!/[0-9]/.test(password)) {
        return 'Password must contain at least one number.';
    }

  
    if (!/[!@#$_^&*]/.test(password)) {
        return 'Password must contain at least one special character (!@#$_^&*).';
    }

 
    return '';
}
