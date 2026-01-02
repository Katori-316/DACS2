
      <section id="main">
        <div class="container">
          <div class="row">
            <div class="col-9 col-12-medium">
              <div class="content">
                <!-- Content -->

                <article class="box page-content">
                  <!-- Ô tìm kiếm vật mất -->
                  <section class="search-container">
                    <div class="search-box">
                      <input
                        type="text"
                        id="searchInput"
                        placeholder="Tìm kiếm theo tiêu đề, mô tả, địa điểm..."
                        class="search-input"
                      />
                      <button id="searchBtn" class="search-btn">
                        <i class="fa fa-search"></i> Tìm kiếm
                      </button>
                    </div>

                    <div class="filter-bar">
                      <div class="filter-group">
                        <span class="dot green"></span>
                        <label>Danh mục</label>
                        <select>
                          <option>Tất cả danh mục</option>
                          <option>Giấy tờ tùy thân</option>
                          <option>Điện thoại</option>
                          <option>Ví tiền</option>
                          <option>Khác</option>
                        </select>
                      </div>

                      <div class="filter-group">
                        <span class="dot purple"></span>
                        <label>Tỉnh/Thành phố</label>
                        <select>
                          <option>Tất cả tỉnh/thành</option>
                          <option>Hà Nội</option>
                          <option>TP. Hồ Chí Minh</option>
                          <option>Đà Nẵng</option>
                          <option>Cần Thơ</option>
                        </select>
                      </div>
                      <div class="filter-group">
                       <span class="dot orange"></span> <label>Ngày đăng</label>
                       <input
                       type="date"
                        class="filter-date"
                       placeholder="dd/mm/yyyy"
                                   />
                                </div>
                    </div>
                  </section>
                </article>
              </div>
            </div>

            <div class="col-12">
              <!-- Features -->
              <section class="box features">
                <h2 class="major"><span>Nhặt được và tìm thấy</span></h2>

                <!-- ✅ Dùng grid thay vì row/col -->
                <div class="post-grid">
                  <section class="box feature">
                    <a href="#" class="image featured"
                          ><img src="<?php echo PUBLIC_URL; ?>/images/pic04.jpg" alt=""
                        /></a>
                    <h3>
                      <a href="/bai_viet/index.html">Tìm chủ nhân CCCD và Đăng ký xe mang tên Nguyễn Văn Nam</a>
                    </h3>
                    <p>
                      Sáng nay tôi có nhặt được một ví da nam màu nâu tại khu vực ngã 3 Chùa Hang.
  Bên trong có giấy tờ và một số tiền mặt <br />
                      <br />Địa chỉ: Lạng Sơn<br />Danh mục: Giấy tờ tùy thân <br />Ngày đăng: 20/10/2024
                    </p>
                  </section>

                  <section class="box feature">
                        <a href="#" class="image featured"
                              ><img src="<?php echo PUBLIC_URL; ?>/images/pic06.jpg" alt=""
                        /></a>
                    <h3>
                      <a href="/bai_viet/index.html">Ai để quên Balo Laptop màu đen tại quán Cafe Xưa 1990 không ạ?</a>
                    </h3>
                    <p>
                      Khách đi lúc 15h chiều có để quên 1 balo tại bàn số 4. Nhân viên quán đã cất
  giữ. Vui lòng quay lại quầy thu ngân để nhận<br />
                      <br />Địa chỉ: Lạng Sơn<br />Danh mục: Khác <br />Ngày đăng: 20/10/2024
                    </p>
                  </section>

                  <section class="box feature">
                    <a href="#" class="image featured"
                          ><img src="<?php echo PUBLIC_URL; ?>/images/pic05.jpg" alt=""
                        /></a>
                    <h3>
                      <a href="/bai_viet/index.html">Ai đánh rơi Apple Watch dây cao su màu trắng tại Công viên Tuổi Trẻ?</a>
                    </h3>
                    <p>
                     Chiều nay đi chạy bộ tôi thấy một chiếc đồng hồ rơi ở ghế đá gần hồ. Đồng hồ
  đang khóa mật khẩu. Ai là chủ nhân vui lòng mang điện thoại khớp với máy đến
  để nhận <br />
                      <br />Địa chỉ: Quảng Trị<br />Danh mục: Đồ vật <br />Ngày đăng: 20/10/2024
                    </p>
                  </section>

                  <section class="box feature">
                    <a href="#" class="image featured"
                          ><img src="<?php echo PUBLIC_URL; ?>/images/pic07.jpg" alt=""
                        /></a>
                    <h3>
                      <a href="/bai_viet/index.html">Nhặt được thẻ ATM Agribank mang tên Bùi Thị Lan tại Tân Lạc</a>
                    </h3>
                    <p>
                      Lúc 10h sáng nay tại cây ATM ngã ba Mãn Đức, người đi trước rút tiền xong để
  quên thẻ lại khe máy. Tôi đã giữ giúp, chủ thẻ vui lòng đọc đúng số tài khoản
  để nhận lại <br />
                      <br />Địa chỉ: Lạng Sơn<br />Danh mục: Giấy tờ tùy thân <br />Ngày đăng: 20/10/2024
                    </p>
                  </section>

                  <section class="box feature">
                    <a href="#" class="image featured"
                      ><img src="images/pic01.jpg" alt=""
                    /></a>
                    <h3>
                      <a href="/bai_viet/index.html">Tiêu đề bài viết</a>
                    </h3>
                    <p>
                      mô tả ngắn gọn về bài viết <br />
                      <br />địa chỉ tỉnh <br />danh mục <br />ngày đăng
                    </p>
                  </section>

                  <section class="box feature">
                    <a href="#" class="image featured"
                      ><img src="images/pic02.jpg" alt=""
                    /></a>
                    <h3>
                      <a href="/bai_viet/index.html">Tiêu đề bài viết</a>
                    </h3>
                    <p>
                      mô tả ngắn gọn về bài viết <br />
                      <br />địa chỉ tỉnh <br />danh mục <br />ngày đăng
                    </p>
                  </section>

                  <section class="box feature">
                    <a href="#" class="image featured"
                      ><img src="images/pic03.jpg" alt=""
                    /></a>
                    <h3>
                      <a href="/bai_viet/index.html">Tiêu đề bài viết 1</a>
                    </h3>
                    <p>
                      mô tả ngắn gọn về bài viết <br />
                      <br />địa chỉ tỉnh <br />danh mục <br />ngày đăng
                    </p>
                  </section>

                  <section class="box feature">
                    <a href="#" class="image featured"
                      ><img src="images/pic04.jpg" alt=""
                    /></a>
                    <h3>
                      <a href="/bai_viet/index.html">Tiêu đề bài viết 1</a>
                    </h3>
                    <p>
                      mô tả ngắn gọn về bài viết <br />
                      <br />địa chỉ tỉnh <br />danh mục <br />ngày đăng
                    </p>
                  </section>
                </div>

                <!-- Nút xem thêm -->
                <div class="col-12">
                  <ul class="actions">
                    <li>
                      <a href="#" class="button alt large">xem thêm bài viết</a>
                    </li>
                  </ul>
                </div>
              </section>
            </div>
          </div>
        </div>
      </section>
