// JavaScript to validate email address
const emailInput = document.getElementById("email");
const emailError = document.getElementById("emailError");

emailInput.addEventListener("input", function () {
  const email = emailInput.value;
  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

  if (emailPattern.test(email)) {
    emailError.textContent = "";
  } else {
    emailError.textContent = "Please enter a valid email address.";
  }
});

// JavaScript to validate that the password and confirm password fields match
const passwordInp = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirmPassword");
const passwordError = document.getElementById("passwordError");

passwordInp.addEventListener("input", function () {
  const password = passwordInp.value;
  const confirmPassword = confirmPasswordInput.value;

  if (password === confirmPassword) {
    passwordError.textContent = "";
  } else {
    passwordError.textContent = "Passwords do not match.";
  }
});

confirmPasswordInput.addEventListener("input", function () {
  const password = passwordInput.value;
  const confirmPassword = confirmPasswordInput.value;

  if (password === confirmPassword) {
    passwordError.textContent = "";
  } else {
    passwordError.textContent = "Passwords do not match.";
  }
});

// JavaScript to toggle password visibility
const passwordInput = document.getElementById("password");
const togglePasswordIcon = document.getElementById("togglePassword");

togglePasswordIcon.addEventListener("click", function () {
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
});


