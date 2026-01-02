const chatButton = document.getElementById("chat-button");
const chatBox = document.getElementById("chat-box");
const sendBtn = document.getElementById("send-btn");
const messageInput = document.getElementById("message-input");
const chatMessages = document.getElementById("chat-messages");
const chatIconDiv = chatButton.querySelector(".chat-icon");
const chatIcon = chatIconDiv.querySelector("i");

let chatOpen = false;

// --- Toggle mở / đóng hộp chat ---
chatButton.addEventListener("click", () => {
  chatOpen = !chatOpen;
  chatBox.classList.toggle("hidden", !chatOpen);

  chatIconDiv.classList.add("rotate");
  setTimeout(() => chatIconDiv.classList.remove("rotate"), 400);

  chatIcon.className = chatOpen ? "fi fi-rs-cross-small" : "fi fi-rs-comments";
});

// --- Gửi tin nhắn khi bấm nút hoặc nhấn Enter ---
sendBtn.addEventListener("click", sendMessage);
messageInput.addEventListener("keypress", (e) => {
  if (e.key === "Enter") sendMessage();
});

function sendMessage() {
  const text = messageInput.value.trim();
  if (!text) return;

  // Hiển thị tin nhắn người dùng
  appendMessage(text, "user");
  messageInput.value = "";

  // --- Nếu người dùng gõ tin nhắn thủ công (không chọn câu hỏi mẫu) ---
  setTimeout(() => {
    appendMessage(
      "💬 Bạn vui lòng chờ giây lát, chúng tôi sẽ hỗ trợ bạn ngay.",
      "bot"
    );
  }, 800);

  // (Tùy chọn) Lưu tin nhắn vào server nếu bạn đã có PHP backend
  /*
  fetch("message.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "message=" + encodeURIComponent(text),
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.status !== "ok") {
        appendMessage("⚠️ Lỗi: " + data.message, "bot");
      }
    })
    .catch((err) => appendMessage("❌ Lỗi kết nối: " + err.message, "bot"));
  */
}

// --- Hàm hiển thị tin nhắn ---
function appendMessage(text, type) {
  const msg = document.createElement("div");
  msg.classList.add("message", type);

  const avatar = document.createElement("div");
  avatar.classList.add("avatar");
  avatar.textContent = type === "user" ? "🧑" : "🤖";

  const bubble = document.createElement("div");
  bubble.classList.add("bubble");
  bubble.textContent = text;

  if (type === "user") {
    msg.appendChild(bubble);
    msg.appendChild(avatar);
  } else {
    msg.appendChild(avatar);
    msg.appendChild(bubble);
  }

  chatMessages.appendChild(msg);
  chatMessages.scrollTop = chatMessages.scrollHeight;
}

// --- Câu hỏi - câu trả lời mẫu ---
const faqAnswers = {
  "Nếu có thông tin về đồ thất lạc, tôi sẽ được liên lạc bằng cách nào?":
    "📞 Bạn sẽ được liên hệ qua số điện thoại hoặc email mà bạn đã cung cấp khi đăng bài. Vui lòng đảm bảo thông tin liên hệ luôn chính xác nhé!",
  "Bài đăng tìm đồ của tôi sẽ được chia sẻ trên những nền tảng nào?":
    "🌐 Hiện tại, bài đăng của bạn được hiển thị trên trang LoFo và các kênh mạng xã hội đối tác của chúng tôi.",
  "Nhặt được đồ, tôi nên làm gì để trả lại chủ nhân nhanh chóng?":
    "💡 Bạn có thể đăng bài trong mục 'Nhặt được và tìm thấy' kèm mô tả, hình ảnh, và địa điểm nhặt được. Hệ thống sẽ giúp kết nối bạn với chủ nhân nhanh hơn.",
  "Làm thế nào để bài đăng tìm đồ của tôi hiệu quả hơn?":
    "📸 Hãy thêm hình ảnh rõ nét, mô tả chi tiết và chọn đúng danh mục vật phẩm. Bài đăng càng cụ thể thì người khác càng dễ giúp bạn hơn!",
};

// --- Khi nhấn vào nút câu hỏi nhanh ---
document.querySelectorAll(".quick-btn").forEach((btn) => {
  btn.addEventListener("click", () => {
    const question = btn.textContent.trim();

    // Hiển thị câu hỏi của người dùng
    appendMessage(question, "user");

    // Sau 0.8s bot trả lời tương ứng
    setTimeout(() => {
      const answer =
        faqAnswers[question] ||
        "Xin lỗi, tôi chưa có câu trả lời cho câu hỏi này.";
      appendMessage(answer, "bot");
    }, 800);
  });
});
