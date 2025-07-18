document.addEventListener("DOMContentLoaded", () => {
  const menuBtn = document.getElementById("menu-btn");
  const mobileMenu = document.getElementById("mobile-menu");

  menuBtn.addEventListener("click", () => {
    mobileMenu.classList.toggle("hidden");
  });

  const userMenuButton = document.getElementById("user-menu-button");
  const userDropdown = document.getElementById("user-dropdown");

  if (userMenuButton) {
    userMenuButton.addEventListener("click", (e) => {
      e.preventDefault();
      userDropdown.classList.toggle("hidden");
      const expanded = userMenuButton.getAttribute("aria-expanded") === "true";
      userMenuButton.setAttribute("aria-expanded", !expanded);
    });

    document.addEventListener("click", (e) => {
      if (
        !userMenuButton.contains(e.target) &&
        !userDropdown.contains(e.target)
      ) {
        userDropdown.classList.add("hidden");
        userMenuButton.setAttribute("aria-expanded", "false");
      }
    });
  }
});
