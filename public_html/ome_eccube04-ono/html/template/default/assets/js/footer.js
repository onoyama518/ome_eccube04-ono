document.addEventListener("DOMContentLoaded", function () {
  const navItems = document.querySelectorAll(".fixed-nav-item");
  const openFooterMenuButton = document.getElementById("open-footer-menu");
  const menuNavItem = document.querySelector('.fixed-nav-item[data-megamenu-trigger="menu"]');
  navItems.forEach(function (item) {
    item.addEventListener("click", function () {
      navItems.forEach(function (other) {
        if (other !== item) {
          other.classList.remove("active");
        }
      });
      if (!item.classList.contains("active")) {
        item.classList.add("active");
      } else {
        item.classList.remove("active");
      }
      const trigger = item.getAttribute("data-megamenu-trigger");
      const megamenus = document.querySelectorAll(".megamenu");
      megamenus.forEach(function (menu) {
        if (menu.getAttribute("data-megamenu") === trigger && item.classList.contains("active")) {
          menu.classList.add("active");
        } else {
          menu.classList.remove("active");
        }
      });
      // ヘッダーの矢印ボタンの状態を、フッターmenuタブの状態と同期
      if (openFooterMenuButton && menuNavItem) {
        if (menuNavItem.classList.contains("active")) {
          openFooterMenuButton.classList.add("active");
        } else {
          openFooterMenuButton.classList.remove("active");
        }
      }
      // const isAnyActive = Array.from(navItems).some(i => i.classList.contains("active") && i.getAttribute("data-megamenu-trigger"));
      // if (isAnyActive) {
      //   document.body.classList.add("noscroll");
      // } else {
      //   document.body.classList.remove("noscroll");
      // }
    });
  });

  // ヘッダーの「商品を探す」ボタンからフッターのmenuメガメニューを開く
  if (openFooterMenuButton && menuNavItem) {
    openFooterMenuButton.addEventListener("click", function (e) {
      e.preventDefault();
      menuNavItem.click();
    });
  }

  const titleWraps = document.querySelectorAll(".megamenu-title-wrap[data-list-trigger]");
  titleWraps.forEach(function (wrap) {
    wrap.addEventListener("click", function (e) {
      const megamenu = wrap.closest('.megamenu');
      const scopedWraps = megamenu ? megamenu.querySelectorAll('.megamenu-title-wrap[data-list-trigger]') : titleWraps;
      scopedWraps.forEach(function (other) {
        if (other !== wrap) {
          other.classList.remove('active');
        }
      });
      wrap.classList.toggle('active');
      const trigger = wrap.getAttribute('data-list-trigger');
      const scopedLists = megamenu ? megamenu.querySelectorAll('.megamenu-list[data-list]') : document.querySelectorAll('.megamenu-list[data-list]');
      scopedLists.forEach(function (list) {
        if (list.getAttribute('data-list') === trigger) {
          list.classList.toggle('active');
        } else {
          list.classList.remove('active');
        }
      });
    });
  });

  const sublistItems = document.querySelectorAll(".megamenu-item[data-sublist-trigger]");
  sublistItems.forEach(function (item) {
    item.addEventListener("click", function (e) {
      e.stopPropagation();
      const trigger = item.getAttribute('data-sublist-trigger');
      const megamenu = item.closest('.megamenu');
      const scopedSublists = megamenu ? megamenu.querySelectorAll('.megamenu-sublist[data-sublist]') : document.querySelectorAll('.megamenu-sublist[data-sublist]');
      scopedSublists.forEach(function (sublist) {
        if (sublist.getAttribute('data-sublist') === trigger) {
          sublist.classList.toggle('active');
        } else {
          sublist.classList.remove('active');
        }
      });
    });
  });

  const initialLists = ["productsfeature", "support", "userinfo"];
  initialLists.forEach(function (listName) {
    const list = document.querySelector(`.megamenu-list[data-list="${listName}"]`);
    if (list) {
      const megamenu = list.closest('.megamenu');
      const trigger = megamenu ? megamenu.querySelector(`.megamenu-title-wrap[data-list-trigger="${listName}"]`) : document.querySelector(`.megamenu-title-wrap[data-list-trigger="${listName}"]`);
      if (trigger) {
        trigger.classList.add('active');
      }
      list.classList.add('active');
    }
  });
});
