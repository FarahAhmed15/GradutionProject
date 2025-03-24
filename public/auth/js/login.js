document.getElementById('loginForm').addEventListener('submit', function(event) {
    // event.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    document.getElementById('emailError').textContent = '';
    document.getElementById('passwordError').textContent = '';


    if (!validateEmail(email)) {
        document.getElementById('emailError').textContent = 'Please enter a valid email address.';
        return;
    }


    const passwordError = validatePassword(password);
    if (passwordError) {
        document.getElementById('passwordError').textContent = passwordError;
        return;
    }

    // alert('Login successful!');
});

function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

function validatePassword(password) {
    
    if (password.length < 6) {
        return 'Password must be at least 6 characters long.';
    }

  
    if (!/[A-Z]/.test(password)) {
        return 'Password must contain at least one uppercase letter.';
    }

    // التحقق من وجود رقم
    if (!/[0-9]/.test(password)) {
        return 'Password must contain at least one number.';
    }

    // التحقق من وجود حرف خاص
    if (!/[!@#$_^&*]/.test(password)) {
        return 'Password must contain at least one special character (!@#$_^&*).';
    }

    // إذا كانت كلمة المرور صحيحة
    return '';
}


document.getElementById('forgotPasswordLink').addEventListener('click', function(event) {
    event.preventDefault(); // منع تحميل الصفحة
    document.getElementById('forgotPasswordModal').style.display = 'flex'; // إظهار النموذج
});


document.getElementById('closeModal').addEventListener('click', function() {
    document.getElementById('forgotPasswordModal').style.display = 'none'; 
});

window.addEventListener('click', function(event) {
    if (event.target === document.getElementById('forgotPasswordModal')) {
        document.getElementById('forgotPasswordModal').style.display = 'none'; 
    }
});


document.getElementById('verifyButton').addEventListener('click', function() {
    const email = document.getElementById('verificationEmail').value;
    if (email) {
        alert(`Verification code sent to ${email}`); 
        document.getElementById('forgotPasswordModal').style.display = 'none'; 
    } else {
        alert("Please enter your email."); 
    }
});