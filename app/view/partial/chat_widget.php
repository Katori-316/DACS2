<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <title>Chat Hỗ Trợ</title>
    <link
      rel="stylesheet"
      href="https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css"
    />
  </head>
  <body>
    <!-- Nút chat -->
    <div id="chat-button">
      <div class="chat-icon">
        <i class="fi fi-rs-comments"></i>
      </div>
    </div>

    <!-- Hộp chat -->
    <div id="chat-box" class="hidden">
      <div class="chat-header">
        <span>Hỗ trợ khách hàng</span>
      </div>

      <!-- Phần nội dung hội thoại (gồm cả câu hỏi gợi ý) -->
      <div id="chat-messages">
        <div id="quick-questions">
          <p class="quick-title">Câu hỏi thường gặp</p>
          <button class="quick-btn">
            Nếu có thông tin về đồ thất lạc, tôi sẽ được liên lạc bằng cách nào?
          </button>
          <button class="quick-btn">
            Bài đăng tìm đồ của tôi sẽ được chia sẻ trên những nền tảng nào?
          </button>
          <button class="quick-btn">
            Nhặt được đồ, tôi nên làm gì để trả lại chủ nhân nhanh chóng?
          </button>
          <button class="quick-btn">
            Làm thế nào để bài đăng tìm đồ của tôi hiệu quả hơn?
          </button>
        </div>
      </div>

      <!-- Ô nhập tin nhắn -->
      <div class="chat-input">
        <input type="text" name="message" id="message-input" placeholder="Nhập tin nhắn..." />
        <button id="send-btn">Gửi</button>
      </div>
    </div>

  </body>
</html>
