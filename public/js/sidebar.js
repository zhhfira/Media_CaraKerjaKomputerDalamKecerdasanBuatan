(() => {
  const STORAGE_KEY = "sidebar_open_menu";
  const menuItems = document.querySelectorAll(".menu-item");
  const toggles = document.querySelectorAll(".dropdown-toggle");

  // 1) Toggle dropdown dan SIMPAN state
  toggles.forEach(toggle => {
    toggle.addEventListener("click", function () {
      const parent = this.closest(".menu-item");
      const key = parent?.dataset.menu;

      // tutup dropdown lain (opsional)
      menuItems.forEach(item => {
        if(item !== parent) item.classList.remove("open");
      });

      parent.classList.toggle("open");

      // simpan menu yang sedang open
      if (key) {
        if (parent.classList.contains("open")) {
          localStorage.setItem(STORAGE_KEY, key);
        } else {
          localStorage.removeItem(STORAGE_KEY);
        }
      }
    });
  });

  // 2) Saat reload: buka dropdown sesuai localStorage
  const saved = localStorage.getItem(STORAGE_KEY);
  if(saved){
    const savedItem = document.querySelector(`.menu-item[data-menu="${saved}"]`);
    if(savedItem) savedItem.classList.add("open");
  }

  // 3) Auto aktifkan submenu berdasar URL (ini yang bikin "stay di submateri")
  const currentFile = location.pathname.split("/").pop(); // contoh: data-konsep.html

  document.querySelectorAll(".submenu a").forEach(a => {
    const href = a.getAttribute("href");
    if(!href) return;

    // cocokkan file yang sama
    if(href === currentFile){
      a.classList.add("active");

      const parent = a.closest(".menu-item");
      if(parent){
        parent.classList.add("open");
        const key = parent.dataset.menu;
        if(key) localStorage.setItem(STORAGE_KEY, key);
      }
    }
  });
})();
