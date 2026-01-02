// =========================================================
// 1. DỮ LIỆU GIẢ LẬP (MOCK DATA)
// =========================================================
const usersData = [
  {
    id: 1,
    name: "Nguyễn Huệ Minh",
    avatar: "https://ui-avatars.com/api/?name=Nguyen+Van+A&background=random",
    status: "Online",
    lastMessage: "Em muốn hỏi về quy định đăng bài ạ?",
    time: "10:30",
    messages: [
      {
        type: "received",
        text: "Chào admin, cho em hỏi chút được không ạ?",
        time: "10:28",
      },
      { type: "sent", text: "Chào bạn, bạn cần hỗ trợ gì nhỉ?", time: "10:29" },
      {
        type: "received",
        text: "Em muốn hỏi về quy định đăng bài ạ?",
        time: "10:30",
      },
    ],
  },
  {
    id: 2,
    name: "Trần Thị Như Quỳnh",
    avatar: "https://ui-avatars.com/api/?name=Tran+Thi+B&background=random",
    status: "Offline (15p trước)",
    lastMessage: "Dạ em cảm ơn nhiều ạ!",
    time: "Hôm qua",
    messages: [
      { type: "received", text: "Admin ơi em tìm thấy đồ rồi.", time: "09:00" },
      {
        type: "sent",
        text: "Tuyệt vời! Bạn nhớ gỡ bài viết hoặc cập nhật trạng thái nhé.",
        time: "09:15",
      },
      { type: "received", text: "Dạ em cảm ơn nhiều ạ!", time: "09:20" },
    ],
  },
  {
    id: 3,
    name: "Lê Văn Dũng",
    avatar: "https://ui-avatars.com/api/?name=Le+Van+C&background=random",
    status: "Online",
    lastMessage: "Admin duyệt bài giúp em với",
    time: "Hôm nay",
    messages: [
      { type: "received", text: "Admin duyệt bài giúp em với", time: "11:00" },
    ],
  },
];

let currentUserId = null;
// Khai báo biến toàn cục để dùng chung, nhưng dùng 'let' để có thể gán giá trị sau
let inputElement;
let btnSendElement;

// =========================================================
// 2. KHỞI TẠO (CHẠY KHI HTML TẢI XONG)
// =========================================================
document.addEventListener("DOMContentLoaded", () => {
  // 2.1 Render danh sách user
  const listContainer = document.getElementById("user-list-container");
  if (listContainer) {
    listContainer.innerHTML = "";
    usersData.forEach((user) => {
      const userEl = document.createElement("div");
      userEl.className = "user-item";
      userEl.id = `user-item-${user.id}`;
      userEl.onclick = () => selectUser(user.id);

      userEl.innerHTML = `
            <img src="${user.avatar}" class="avatar-md">
            <div class="user-info">
                <h4>${user.name}</h4>
                <p>${user.lastMessage}</p>
            </div>
            <span class="last-time">${user.time}</span>
        `;
      listContainer.appendChild(userEl);
    });
  }

  // 2.2 Lấy Element input và nút gửi (Gán giá trị cho biến toàn cục)
  inputElement = document.getElementById("message-input");
  btnSendElement = document.getElementById("btn-send");

  // 2.3 Gán sự kiện gửi tin nhắn (Chỉ khi element tồn tại)
  if (inputElement && btnSendElement) {
    btnSendElement.onclick = handleSendMessage;

    inputElement.addEventListener("keypress", (e) => {
      if (e.key === "Enter") handleSendMessage();
    });
  }
});

// =========================================================
// 3. CÁC HÀM XỬ LÝ (FUNCTIONS)
// =========================================================

// Hàm chọn User
function selectUser(id) {
  currentUserId = id;
  const user = usersData.find((u) => u.id === id);
  if (!user) return;

  // Highlight user
  document
    .querySelectorAll(".user-item")
    .forEach((el) => el.classList.remove("active"));
  const activeItem = document.getElementById(`user-item-${id}`);
  if (activeItem) activeItem.classList.add("active");

  // Cập nhật Header
  const avatarEl = document.getElementById("chat-avatar");
  const nameEl = document.getElementById("chat-name");
  const statusEl = document.getElementById("chat-status");

  if (avatarEl) avatarEl.src = user.avatar;
  if (nameEl) nameEl.innerText = user.name;
  if (statusEl) statusEl.innerText = user.status;

  // Enable Input (Sử dụng biến toàn cục đã khai báo)
  if (inputElement) inputElement.disabled = false;
  if (btnSendElement) btnSendElement.disabled = false;

  // Render Tin nhắn
  renderMessages(user.messages);
}

// Hàm Render danh sách tin nhắn
function renderMessages(messages) {
  const chatBody = document.getElementById("chat-body");
  if (!chatBody) return;

  chatBody.innerHTML = "";

  messages.forEach((msg) => {
    appendMessageUI(msg.text, msg.type, msg.time);
  });

  scrollToBottom();
}

// Hàm thêm 1 tin nhắn vào giao diện
function appendMessageUI(text, type, time) {
  const chatBody = document.getElementById("chat-body");
  if (!chatBody) return;

  const msgDiv = document.createElement("div");
  msgDiv.className = `message ${type}`;
  msgDiv.innerHTML = `
        <div class="msg-content">${text}</div>
        <span class="msg-time">${time}</span>
    `;
  chatBody.appendChild(msgDiv);
  scrollToBottom();
}

// Hàm xử lý logic gửi tin
function handleSendMessage() {
  if (!inputElement) return;

  const text = inputElement.value.trim();
  if (!text || !currentUserId) return;

  // 1. Hiện tin nhắn (Optimistic UI)
  const now = new Date();
  const timeString =
    now.getHours() + ":" + String(now.getMinutes()).padStart(2, "0");
  appendMessageUI(text, "sent", timeString);

  // 2. Clear input
  inputElement.value = "";
  inputElement.focus();

  // 3. Giả lập Server phản hồi
  setTimeout(() => {
    appendMessageUI(
      "Cảm ơn, tôi đã nhận được tin nhắn.",
      "received",
      timeString
    );
  }, 1000);
}

// Hàm cuộn xuống cuối
function scrollToBottom() {
  const chatBody = document.getElementById("chat-body");
  if (chatBody) {
    chatBody.scrollTop = chatBody.scrollHeight;
  }
}
