const stepOne = document.querySelector(".formbold-form-step-1");
const stepTwo = document.querySelector(".formbold-form-step-2");
const stepThree = document.querySelector(".formbold-form-step-3");

const formSubmitBtn = document.querySelector(".formbold-btn");
const formBackBtn = document.querySelector(".formbold-back-btn");

// ------------------- CHỌN LOẠI BÀI ĐĂNG -------------------
function selectType(element) {
  // Xóa trạng thái active cũ
  document
    .querySelectorAll(".post-type-card")
    .forEach((card) => card.classList.remove("active"));
  element.classList.add("active");

  // Lấy input ẩn
  const typeInput = document.getElementById("post_type");

  // Nếu thẻ có chữ “Nhặt được đồ” => đổi giá trị
  if (element.querySelector("h4").textContent.includes("Nhặt")) {
    typeInput.value = "nhat_duoc";
  } else {
    typeInput.value = "tim_do";
  }
}

window.selectType = selectType; // để dùng được trong HTML

// ------------------- UPLOAD ẢNH VÀ XEM TRƯỚC -------------------
const fileInput = document.getElementById("photos");
const preview = document.getElementById("preview");

if (fileInput && preview) {
  fileInput.addEventListener("change", (e) => {
    const file = e.target.files[0];
    if (file && file.type.startsWith("image/")) {
      const reader = new FileReader();
      reader.onload = (event) => {
        preview.innerHTML = `<img src="${event.target.result}" alt="Preview" style="max-width:100%;border-radius:10px;">`;
      };
      reader.readAsDataURL(file);
    } else {
      preview.innerHTML = "<p>Vui lòng chọn tệp ảnh hợp lệ.</p>";
    }
  });
}

// ------------------- VALIDATION FORM -------------------
const titleInput = document.getElementById("title");
const titleError = document.getElementById("title-error");

if (titleInput && titleError) {
  titleInput.addEventListener("input", () => {
    if (titleInput.value.trim().length < 5) {
      titleError.style.display = "block";
      titleInput.style.borderColor = "#d93025";
    } else {
      titleError.style.display = "none";
      titleInput.style.borderColor = "#dde3ec";
    }
  });
}

// --- Kiểm tra địa điểm ---
const addressInput = document.querySelector('input[name="district"]');
if (addressInput) {
  let addressError = addressInput.closest("div").querySelector(".form-error");
  if (!addressError) {
    addressError = document.createElement("p");
    addressError.classList.add("form-error");
    addressError.textContent = "Địa điểm phải có ít nhất 5 ký tự";
    addressInput.closest("div").appendChild(addressError);
  }

  addressInput.addEventListener("input", () => {
    if (addressInput.value.trim().length < 5) {
      addressError.style.display = "block";
      addressInput.style.borderColor = "#d93025";
    } else {
      addressError.style.display = "none";
      addressInput.style.borderColor = "#dde3ec";
    }
  });
}

// --- Ngăn submit nếu có lỗi ---
const form = document.querySelector("form");

if (form) {
  form.addEventListener("submit", (event) => {
    let valid = true;
    let messages = [];

    // --- Tiêu đề ---
    const titleInput = document.getElementById("title");
    if (!titleInput.value.trim() || titleInput.value.trim().length < 5) {
      messages.push("Tiêu đề phải có ít nhất 5 ký tự.");
      valid = false;
    }

    // --- Mô tả chi tiết ---
    const descInput = document.getElementById("message");
    if (!descInput.value.trim() || descInput.value.trim().length < 10) {
      messages.push("Mô tả chi tiết phải có ít nhất 10 ký tự.");
      valid = false;
    }

    // --- Danh mục ---
    const category = document.getElementById("category");
    if (!category.value.trim()) {
      messages.push("Vui lòng chọn danh mục.");
      valid = false;
    }

    // --- Ngày xảy ra ---
    const foundDate = document.getElementById("dob");
    if (!foundDate.value.trim()) {
      messages.push("Vui lòng chọn ngày xảy ra.");
      valid = false;
    }

    // --- Tỉnh/Thành phố ---
    const province = document.getElementById("province");
    if (!province.value.trim()) {
      messages.push("Vui lòng chọn Tỉnh/Thành phố.");
      valid = false;
    }

    // --- Địa điểm ---
    const address = document.getElementById("address");
    if (!address.value.trim() || address.value.trim().length < 5) {
      messages.push("Địa điểm phải có ít nhất 5 ký tự.");
      valid = false;
    }

    // --- Thông tin liên hệ (số điện thoại + email) ---
    const phone = document.getElementById("sdt");
    const email = document.getElementById("email");

    const phoneRegex = /^(0|\+84)[0-9]{8,12}$/;
    if (!phone.value.trim() || !phoneRegex.test(phone.value.trim())) {
      messages.push("Số điện thoại không hợp lệ.");
      valid = false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.value.trim() || !emailRegex.test(email.value.trim())) {
      messages.push("Email không hợp lệ.");
      valid = false;
    }

    // --- Nếu có lỗi thì chặn submit ---
    if (!valid) {
      event.preventDefault();
      alert("Vui lòng kiểm tra lại các lỗi sau:\n\n" + messages.join("\n"));
    }
  });
}
