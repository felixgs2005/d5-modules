(function () {
  const wrappers = document.querySelectorAll(".movie-cards-wrapper");

  wrappers.forEach((wrapper) => {
    const options = wrapper.querySelectorAll(".option");

    options.forEach((option) => {
      option.addEventListener("click", function () {
        if (
          this.classList.contains("active") &&
          this.classList.contains("flipped")
        ) {
          this.classList.remove("flipped");
        } else if (this.classList.contains("active")) {
          this.classList.add("flipped");
        } else {
          options.forEach((opt) => {
            opt.classList.remove("active");
            opt.classList.remove("flipped");
          });
          this.classList.add("active");
        }
      });
    });
  });
})();
