const container = document.getElementById("container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");
const registerForm = document.getElementById("registerForm");
const loginForm = document.getElementById("loginForm");

// Debounce function for better performance
function debounce(func, wait) {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
}

// Toggle between login and register forms
registerBtn.addEventListener("click", () => {
  container.classList.add("active");
  clearAllErrors();
  // Scroll to top of form
  const signUpForm = document.querySelector(".sign-up form");
  if (signUpForm) {
    signUpForm.scrollTop = 0;
  }
});

loginBtn.addEventListener("click", () => {
  container.classList.remove("active");
  clearAllErrors();
  // Scroll to top of form
  const signInForm = document.querySelector(".sign-in form");
  if (signInForm) {
    signInForm.scrollTop = 0;
  }
});

// Utility functions for validation
function showError(elementId, message) {
  const errorElement = document.getElementById(elementId);
  const inputElement = document.getElementById(elementId.replace("Error", ""));

  if (errorElement && inputElement) {
    errorElement.textContent = message;
    inputElement.classList.add("error");
  }
}

function clearError(elementId) {
  const errorElement = document.getElementById(elementId);
  const inputElement = document.getElementById(elementId.replace("Error", ""));

  if (errorElement && inputElement) {
    errorElement.textContent = "";
    inputElement.classList.remove("error");
  }
}

function clearAllErrors() {
  const errorElements = document.querySelectorAll(".error-message");
  const inputElements = document.querySelectorAll(".container input");

  errorElements.forEach((element) => {
    element.textContent = "";
  });

  inputElements.forEach((input) => {
    input.classList.remove("error");
  });
}

// Validation functions
function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(email);
}

function validatePassword(password) {
  // Minimum 6 characters, at least one letter and one number
  const re = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{6,}$/;
  return re.test(password);
}

function validateName(name) {
  // Name should be at least 2 characters and contain only letters and spaces
  const re = /^[a-zA-ZÀ-ỹ\s]{2,}$/;
  return re.test(name.trim());
}

// Register form validation
registerForm.addEventListener("submit", function (e) {
  e.preventDefault();
  let isValid = true;

  // Validate name
  const name = document.getElementById("regName").value.trim();
  if (!name) {
    showError("nameError", "Vui lòng nhập họ và tên");
    isValid = false;
  } else if (!validateName(name)) {
    showError("nameError", "Tên phải có ít nhất 2 ký tự và chỉ chứa chữ cái");
    isValid = false;
  } else {
    clearError("nameError");
  }

  // Validate email
  const email = document.getElementById("regEmail").value.trim();
  if (!email) {
    showError("emailError", "Vui lòng nhập email");
    isValid = false;
  } else if (!validateEmail(email)) {
    showError("emailError", "Email không hợp lệ");
    isValid = false;
  } else {
    clearError("emailError");
  }

  // Validate password
  const password = document.getElementById("regPassword").value;
  if (!password) {
    showError("passwordError", "Vui lòng nhập mật khẩu");
    isValid = false;
  } else if (password.length < 6) {
    showError("passwordError", "Mật khẩu phải có ít nhất 6 ký tự");
    isValid = false;
  } else if (!validatePassword(password)) {
    showError("passwordError", "Mật khẩu phải chứa ít nhất 1 chữ cái và 1 số");
    isValid = false;
  } else {
    clearError("passwordError");
  }

  // Validate confirm password
  const confirmPassword = document.getElementById("regConfirmPassword").value;
  if (!confirmPassword) {
    showError("confirmPasswordError", "Vui lòng xác nhận mật khẩu");
    isValid = false;
  } else if (password !== confirmPassword) {
    showError("confirmPasswordError", "Mật khẩu xác nhận không khớp");
    isValid = false;
  } else {
    clearError("confirmPasswordError");
  }

  if (isValid) {
    // Here you would typically send data to server
    alert("Đăng ký thành công!");
    // Reset form
    registerForm.reset();
    clearAllErrors();
    // Switch to login form
    container.classList.remove("active");
  }
});

// Login form validation
loginForm.addEventListener("submit", function (e) {
  e.preventDefault();
  let isValid = true;

  // Validate email
  const email = document.getElementById("loginEmail").value.trim();
  if (!email) {
    showError("loginEmailError", "Vui lòng nhập email");
    isValid = false;
  } else if (!validateEmail(email)) {
    showError("loginEmailError", "Email không hợp lệ");
    isValid = false;
  } else {
    clearError("loginEmailError");
  }

  // Validate password
  const password = document.getElementById("loginPassword").value;
  if (!password) {
    showError("loginPasswordError", "Vui lòng nhập mật khẩu");
    isValid = false;
  } else if (password.length < 6) {
    showError("loginPasswordError", "Mật khẩu phải có ít nhất 6 ký tự");
    isValid = false;
  } else {
    clearError("loginPasswordError");
  }

  if (isValid) {
    // Here you would typically send data to server
    alert("Đăng nhập thành công!");
    // Reset form
    loginForm.reset();
    clearAllErrors();
  }
});

// Real-time validation with debounce
const debouncedValidation = debounce(function () {
  // Validation logic for real-time checking
}, 300);

document.getElementById("regName").addEventListener(
  "input",
  debounce(function () {
    const name = this.value.trim();
    if (name && !validateName(name)) {
      showError("nameError", "Tên phải có ít nhất 2 ký tự và chỉ chứa chữ cái");
    } else {
      clearError("nameError");
    }
  }, 300)
);

document.getElementById("regEmail").addEventListener(
  "input",
  debounce(function () {
    const email = this.value.trim();
    if (email && !validateEmail(email)) {
      showError("emailError", "Email không hợp lệ");
    } else {
      clearError("emailError");
    }
  }, 300)
);

document.getElementById("regPassword").addEventListener(
  "input",
  debounce(function () {
    const password = this.value;
    if (password && password.length < 6) {
      showError("passwordError", "Mật khẩu phải có ít nhất 6 ký tự");
    } else if (password && !validatePassword(password)) {
      showError(
        "passwordError",
        "Mật khẩu phải chứa ít nhất 1 chữ cái và 1 số"
      );
    } else {
      clearError("passwordError");
    }
  }, 300)
);

document.getElementById("regConfirmPassword").addEventListener(
  "input",
  debounce(function () {
    const password = document.getElementById("regPassword").value;
    const confirmPassword = this.value;
    if (confirmPassword && password !== confirmPassword) {
      showError("confirmPasswordError", "Mật khẩu xác nhận không khớp");
    } else {
      clearError("confirmPasswordError");
    }
  }, 300)
);

// Add smooth transition effect
document.querySelectorAll("input").forEach((input) => {
  input.addEventListener("focus", function () {
    this.parentElement.style.transform = "translateY(-2px)";
  });

  input.addEventListener("blur", function () {
    this.parentElement.style.transform = "translateY(0)";
  });
});
