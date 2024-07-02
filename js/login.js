const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

document.addEventListener("DOMContentLoaded", function() {
    const signInButton = document.getElementById('login');
    const signUpButton = document.getElementById('register');
    const signInForm = document.getElementById('sign-in-form');
    const signUpForm = document.getElementById('sign-up-form');

    function updateTitle() {
        if (signUpForm.classList.contains('active')) {
            document.title = "Sign Up";
        } else {
            document.title = "Sign In";
        }
    }

    signInButton.addEventListener('click', () => {
        signInForm.classList.add('active');
        signUpForm.classList.remove('active');
        updateTitle();
    });

    signUpButton.addEventListener('click', () => {
        signUpForm.classList.add('active');
        signInForm.classList.remove('active');
        updateTitle();
    });

    updateTitle();
});
