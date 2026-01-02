document.querySelector(".search-btn").addEventListener("click", () => {
  const keyword = document
    .querySelector(".search-input")
    .value.toLowerCase()
    .trim();
  const posts = document.querySelectorAll(".post-grid .box.feature");

  posts.forEach((post) => {
    const text = post.innerText.toLowerCase();
    if (text.includes(keyword) || keyword === "") {
      post.classList.remove("hidden");
    } else {
      post.classList.add("hidden");
    }
  });
});
