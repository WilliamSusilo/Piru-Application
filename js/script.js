// The Fiture for Navigate into Different Page
window.onload = function () {
  // Splash Screen
  const loadingPage = document.querySelector(".loading-page");
  const logoName = document.querySelector(".logo-name");

  if (loadingPage) {
    gsap.fromTo(
      loadingPage,
      { opacity: 1 },
      {
        opacity: 0,
        display: "none",
        duration: 1.5,
        delay: 3.5,
      }
    );
  }

  if (logoName) {
    gsap.fromTo(
      logoName,
      {
        y: 50,
        opacity: 0,
      },
      {
        y: 0,
        opacity: 1,
        duration: 2,
        delay: 0.5,
      }
    );
  }

  // Snow Effect on Website
  const snow = document.querySelector(".signin");
  if (snow) {
    snowFall.snow(snow, {
      round: true,
      minSize: 1,
      maxSize: 7,
      shadow: true,
      flakeCount: 20,
      flakeColor: "white",
    });
  }

  // Welcome Text in SignIn Page
  const openModalButtons = document.querySelectorAll("[data-modal-target]");
  const closeModalButtons = document.querySelectorAll("[data-close-button]");
  const overlay = document.getElementById("overlay");

  if (openModalButtons) {
    openModalButtons.forEach((button) => {
      button.addEventListener("click", () => {
        const modal = document.querySelector(button.dataset.modalTarget);
        if (modal) {
          openModal(modal);
        }
      });
    });
  }

  if (overlay) {
    overlay.addEventListener("click", () => {
      const modals = document.querySelectorAll(".modal.active");
      if (modals) {
        modals.forEach((modal) => {
          if (modal) {
            closeModal(modal);
          }
        });
      }
    });
  }

  if (closeModalButtons) {
    closeModalButtons.forEach((button) => {
      button.addEventListener("click", () => {
        const modal = button.closest(".modal");
        if (modal) {
          closeModal(modal);
        }
      });
    });
  }

  function openModal(modal) {
    if (modal) {
      modal.classList.add("active");
      overlay.classList.add("active");
    }
  }

  function closeModal(modal) {
    if (modal) {
      modal.classList.remove("active");
      overlay.classList.remove("active");
    }
  }

  // Login to Room Page
  // const signInBtn = document.getElementById("signIn");
  // if (signInBtn) {
  //   signInBtn.onclick = function () {
  //     window.location.href = "room.html";
  //   };
  // }

  // Sidebar Toggle Logic
  function toggleSidebarClass() {
    const sidebar = document.querySelector(".sidebar");
    if (window.innerWidth <= 1380 && sidebar.classList.contains("open")) {
      sidebar.classList.remove("open");
      menuBtnChange();
    }
  }

  // Initial check for sidebar
  toggleSidebarClass();

  // Add event listener for window resize
  window.addEventListener("resize", toggleSidebarClass);

  // Sidebar
  const sidebar = document.querySelector(".sidebar");
  const closeBtn = document.querySelector("#btn-sidebar-menu");
  const logOut = document.querySelector("#log_out");
  const navList = document.querySelector(".sidebar .nav-list");

  // Triple Line Button
  if (closeBtn) {
    closeBtn.addEventListener("click", function () {
      sidebar.classList.toggle("open");
      menuBtnChange();
    });
  }

  const buttonKeluar = document.querySelector(".sidebar a.button-keluar");
  buttonKeluar.addEventListener("click", function () {
    navList.classList.toggle("side");
    menuBtnChange();
  });

  // Logic Statement for Open and Close the Sidebar
  function menuBtnChange() {
    if (sidebar.classList.contains("open")) {
      closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    } else {
      closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  }

  // Logic Statement for Logout
  // if (logOut) {
  //   logOut.onclick = function () {
  //     window.location.href = "index.html";
  //   };
  // }

  // Room Page to Test Book Room
  const testBookBtn = document.querySelectorAll(".booking");
  testBookBtn.forEach((button) => {
    button.onclick = function () {
      window.location.href = "test-book.php";
    };
  });

  // Test Book Room to Book Room
  const bookRoomBtn = document.querySelectorAll(".btn-fillform");
  bookRoomBtn.forEach((button) => {
    button.onclick = function () {
      window.location.href = "bookroom.php";
    };
  });

  // Room Page to Room List
  const bookListBtns = document.querySelectorAll(".listroom");
  bookListBtns.forEach((button) => {
    button.onclick = function () {
      window.location.href = "roomlist.php";
    };
  });

  // Room Desc to Room List
  const backBtnRoomDesc = document.getElementById("back-button-roomdesc");
  if (backBtnRoomDesc) {
    backBtnRoomDesc.onclick = function () {
      window.location.href = "roomlist.php";
    };
  }

  // Room List to Room Desc
  const roomDescBtn = document.getElementById("item-container-1");
  if (roomDescBtn) {
    roomDescBtn.onclick = function () {
      window.location.href = "roomdesc.php";
    };
  }
};
