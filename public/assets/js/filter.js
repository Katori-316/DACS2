document.addEventListener("DOMContentLoaded", function () {
  const filterToggle = document.getElementById("filterToggle");
  const filterDropdown = document.getElementById("filterDropdown");

  if (filterToggle && filterDropdown) {
    filterToggle.addEventListener("click", function (e) {
      e.stopPropagation();
      filterDropdown.classList.toggle("show");
      filterToggle.classList.toggle("active");
    });

    // Đóng dropdown khi click ra ngoài
    document.addEventListener("click", function (e) {
      if (
        !filterToggle.contains(e.target) &&
        !filterDropdown.contains(e.target)
      ) {
        filterDropdown.classList.remove("show");
        filterToggle.classList.remove("active");
      }
    });

    // Xử lý nút clear
    const btnClear = document.querySelector(".btn-clear");
    if (btnClear) {
      btnClear.addEventListener("click", function () {
        document
          .querySelectorAll(".filter-select, .filter-date")
          .forEach((el) => {
            el.value = "";
          });
        filterToggle.classList.remove("active");
      });
    }

    // Xử lý nút apply
    const applyFilter = document.getElementById("applyFilter");
    if (applyFilter) {
      applyFilter.addEventListener("click", function () {
        const category = document.querySelector(
          ".filter-select:nth-of-type(1)"
        ).value;
        const province = document.querySelector(
          ".filter-select:nth-of-type(2)"
        ).value;
        const date = document.querySelector(".filter-date").value;

        if (category || province || date) {
          filterToggle.classList.add("active");
          // Cập nhật text nút
          filterToggle.innerHTML = '<i class="fa-solid fa-filter"></i> Đã lọc';
        } else {
          filterToggle.classList.remove("active");
          filterToggle.innerHTML = '<i class="fa-solid fa-filter"></i> Bộ lọc';
        }

        filterDropdown.classList.remove("show");
        console.log("Filter applied:", { category, province, date });
      });
    }
  }
});
