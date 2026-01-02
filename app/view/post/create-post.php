
    <div class="dangbai-container">
      <h5 class="h5">Đăng bài mới</h5>
      <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
          <form
            action="create-post.php"
            method="POST"
            enctype="multipart/form-data"
          >
            <div class="formbold-form-step-1 active">
              <h3 class="formbold-form-label">
                Chọn loại bài đăng <span class="required">*</span>
              </h3>
              <input
                type="hidden"
                id="post_type"
                name="post_type"
                value="tim_do"
              />

              <div class="post-type-container">
                <div class="post-type-card active" onclick="selectType(this)">
                  <div class="icon">🔍</div>
                  <div class="text">
                    <h4>Tìm đồ thất lạc</h4>
                    <p>Đăng bài để tìm kiếm món đồ bạn bị mất</p>
                  </div>
                </div>

                <div class="post-type-card" onclick="selectType(this)">
                  <div class="icon">📍</div>
                  <div class="text">
                    <h4>Nhặt được đồ</h4>
                    <p>Đăng bài về món đồ bạn nhặt được</p>
                  </div>
                </div>
              </div>
              <br />
              <div class="formbold-input-group">
                <label for="title" class="formbold-form-label">
                  Tiêu đề <span class="required">*</span>
                </label>
                <input
                  type="text"
                  id="title"
                  name="title"
                  placeholder="Nhập tiêu đề bài viết"
                  class="formbold-form-input"
                  oninput="validateTitle()"
                  required
                />
                <p id="title-error" class="form-error">
                  Tiêu đề phải có ít nhất 5 ký tự
                </p>

                <div class="form-hint">
                  <strong>Hướng dẫn:</strong> Tiêu đề nên ngắn gọn và rõ
                  ràng.<br />
                  <em
                    >VD: Rơi ví/giấy tờ tuỳ thân Nguyễn Văn A 1996 rơi ở Hà
                    Nội.</em
                  >
                  <br />
                  <em>Nhặt được giấy tờ Nguyễn Văn B tại Hà Nội</em>
                </div>
              </div>
              <br />
              <div class="formbold-input-group">
                <label for="message" class="formbold-form-label"
                  >Mô tả chi tiết <span class="required">*</span></label
                >
                <textarea
                  rows="5"
                  name="message"
                  id="message"
                  placeholder="Mô tả món đồ bị mất hoặc nhặt được..."
                  class="formbold-form-input"
                ></textarea>
                <div class="form-hint">
                  <strong>Lưu ý:</strong> <br />
                  <p>
                    Che thông tin nhạy cảm trước khi tải ảnh lên (CMND, thẻ ngân
                    hàng, địa chỉ,...).
                  </p>
                  <p>Chỉ hiển thị thông tin cần thiết để nhận dạng.</p>
                </div>
              </div>
              <br />
              <div class="formbold-input-group">
                <label for="photos" class="formbold-form-label"
                  >Tải ảnh của bạn</label
                >
                <input
                  type="file"
                  name="photos"
                  id="photos"
                  class="formbold-form-input"
                  accept="image/*"
                  multiple
                />
                <div id="preview" style="margin-top: 10px"></div>

                <div class="formbold-input-flex">
                  <div>
                    <br />
                    <label for="category" class="formbold-form-label"
                      >Danh mục <span class="required">*</span></label
                    >
                    <select id="category" name="category_id" required>
                      <option value="">Chọn danh mục...</option>
                      <option value="1">Ví/Giấy tờ tùy thân</option>
                      <option value="2">Thú cưng/Petwear</option>
                      <option value="3">Tìm người mất tích</option>
                      <option value="4">Thiết bị điện tử</option>
                      <option value="5">Phương tiện giao thông</option>
                      <option value="6">Đồ dùng gia đình</option>
                    </select>

                    <script>
                      new Choices("#category", {
                        searchEnabled: true,
                        placeholder: true,
                        placeholderValue: "Chọn danh mục...",
                        itemSelectText: "",
                      });
                    </script>
                  </div>
                  <div>
                    <br />
                    <label for="dob" class="formbold-form-label"
                      >Ngày xảy ra <span class="required">*</span></label
                    >
                    <input
                      type="date"
                      name="found_date"
                      id="dob"
                      class="formbold-form-input"
                    />
                  </div>
                </div>

                <div class="formbold-input-flex">
                  <div>
                    <label for="province" class="formbold-form-label">
                      Tỉnh/Thành phố <span class="required">*</span>
                    </label>
                    <select id="province" name="city">
                      <option value="">Chọn Tỉnh/Thành phố</option>
                      <option value="hanoi">Hà Nội</option>
                      <option value="hcm">TP. Hồ Chí Minh</option>
                      <option value="haiphong">Hải Phòng</option>
                      <option value="danang">Đà Nẵng</option>
                      <option value="cantho">Cần Thơ</option>

                      <option value="angiang">An Giang</option>
                      <option value="baria-vungtau">Bà Rịa - Vũng Tàu</option>
                      <option value="bacgiang">Bắc Giang</option>
                      <option value="backan">Bắc Kạn</option>
                      <option value="baclieu">Bạc Liêu</option>
                      <option value="bacninh">Bắc Ninh</option>
                      <option value="bentre">Bến Tre</option>
                      <option value="binhdinh">Bình Định</option>
                      <option value="binhduong">Bình Dương</option>
                      <option value="binhphuoc">Bình Phước</option>
                      <option value="binhthuan">Bình Thuận</option>
                      <option value="caobang">Cao Bằng</option>
                      <option value="daklak">Đắk Lắk</option>
                      <option value="daknong">Đắk Nông</option>
                      <option value="dienbien">Điện Biên</option>
                      <option value="dongnai">Đồng Nai</option>
                      <option value="dongthap">Đồng Tháp</option>
                      <option value="gialai">Gia Lai</option>
                      <option value="hagiang">Hà Giang</option>
                      <option value="hanam">Hà Nam</option>
                      <option value="hatinh">Hà Tĩnh</option>
                      <option value="haiduong">Hải Dương</option>
                      <option value="haugiang">Hậu Giang</option>
                      <option value="hoabinh">Hòa Bình</option>
                      <option value="hungyen">Hưng Yên</option>
                      <option value="khanhhoa">Khánh Hòa</option>
                      <option value="kiengiang">Kiên Giang</option>
                      <option value="kontum">Kon Tum</option>
                      <option value="laihieu">Lai Châu</option>
                      <option value="lamdong">Lâm Đồng</option>
                      <option value="langson">Lạng Sơn</option>
                      <option value="laocai">Lào Cai</option>
                      <option value="longan">Long An</option>
                      <option value="namdinh">Nam Định</option>
                      <option value="nghean">Nghệ An</option>
                      <option value="ninhbinh">Ninh Bình</option>
                      <option value="ninhthuan">Ninh Thuận</option>
                      <option value="phutho">Phú Thọ</option>
                      <option value="phuyen">Phú Yên</option>
                      <option value="quangbinh">Quảng Bình</option>
                      <option value="quangnam">Quảng Nam</option>
                      <option value="quangngai">Quảng Ngãi</option>
                      <option value="quangninh">Quảng Ninh</option>
                      <option value="quangtri">Quảng Trị</option>
                      <option value="soctrang">Sóc Trăng</option>
                      <option value="sonla">Sơn La</option>
                      <option value="taynin">Tây Ninh</option>
                      <option value="thaibinh">Thái Bình</option>
                      <option value="thainguyen">Thái Nguyên</option>
                      <option value="thanhhoa">Thanh Hóa</option>
                      <option value="thue-thienhue">Thừa Thiên Huế</option>
                      <option value="tiengiang">Tiền Giang</option>
                      <option value="travinh">Trà Vinh</option>
                      <option value="tuyenquang">Tuyên Quang</option>
                      <option value="vinhlong">Vĩnh Long</option>
                      <option value="vinhphuc">Vĩnh Phúc</option>
                      <option value="yenbai">Yên Bái</option>
                    </select>

                    <script>
                      new Choices("#province", {
                        searchEnabled: true,
                        placeholder: true,
                        placeholderValue: "Chọn tỉnh/thành phố...",
                        itemSelectText: "",
                      });
                    </script>
                  </div>
                  <div>
                    <label for="dob" class="formbold-form-label"
                      >Địa điểm <span class="required">*</span></label
                    >
                    <input
                      type="text"
                      name="district"
                      id="address"
                      placeholder="Địa chỉ cụ thể (nếu có)"
                      class="formbold-form-input"
                    />
                    <p id="title-error" class="form-error">
                      Địa điểm phải có ít nhất 5 ký tự
                    </p>
                  </div>
                </div>
              </div>
              <div class="formbold-input-flex">
                <div>
                  <label for="contact" class="formbold-form-label">
                    Thông tin liên hệ <span class="required">*</span>
                  </label>
                  <input
                    type="text"
                    name="contact_phone"
                    id="sdt"
                    placeholder="0987 654 321 hay +84 123 456 789"
                    class="formbold-form-input"
                  />
                  <p class="form-error">Vui lòng nhập số điện thoại hợp lệ</p>
                </div>

                <div>
                  <label for="email" class="formbold-form-label">
                    <br />
                  </label>
                  <input
                    type="text"
                    name="contact_email"
                    id="email"
                    placeholder="abc@gmail.com"
                    class="formbold-form-input"
                  />
                  <p class="form-error">Vui lòng nhập email hợp lệ</p>
                </div>
              </div>

              <div class="formbold-form-btn-wrapper">
                <button type="submit" class="formbold-btn">Đăng bài</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
