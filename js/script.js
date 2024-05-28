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
  const signInBtn = document.getElementById("signIn");
  if (signInBtn) {
    signInBtn.onclick = function () {
      window.location.href = "room.html";
    };
  }

  // Sidebar
  const sidebar = document.querySelector(".sidebar");
  const closeBtn = document.querySelector("#btn-sidebar-menu");
  const logOut = document.querySelector("#log_out");

  // Triple Line Button
  if (closeBtn) {
    closeBtn.addEventListener("click", function () {
      sidebar.classList.toggle("open");
      menuBtnChange();
    });
  }

  // Logic Statement for Open and Close the Sidebar
  function menuBtnChange() {
    if (sidebar.classList.contains("open")) {
      closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    } else {
      closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  }

  // Logic Statement for Logout
  if (logOut) {
    logOut.onclick = function () {
      window.location.href = "index.html";
    };
  }

  // Room Page to Test Book Room
  const testBookBtn = document.querySelectorAll(".btn-primary");
  testBookBtn.forEach((button) => {
    button.onclick = function () {
      window.location.href = "test-book.html";
    };
  });

  // Room Page to Book Room
  const bookRoomBtn = document.querySelectorAll(".btn-fillform");
  bookRoomBtn.forEach((button) => {
    button.onclick = function () {
      window.location.href = "bookroom.html";
    };
  });

  // Room Page to Room List
  const bookListBtns = document.querySelectorAll(".btn-secondary");
  bookListBtns.forEach((button) => {
    button.onclick = function () {
      window.location.href = "roomlist.html";
    };
  });

  // Room List to Room Page
  const backBtnRoomList = document.getElementById("back-button-roomlist");
  if (backBtnRoomList) {
    backBtnRoomList.onclick = function () {
      window.location.href = "room.html";
    };
  }

  // Room List to Room Desc
  const roomDescBtn = document.getElementById("item-container-1");
  if (roomDescBtn) {
    roomDescBtn.onclick = function () {
      window.location.href = "roomdesc.html";
    };
  }

  // Room Desc to Room List
  const backBtnRoomDesc = document.getElementById("back-button-roomdesc");
  if (backBtnRoomDesc) {
    backBtnRoomDesc.onclick = function () {
      window.location.href = "roomlist.html";
    };
  }

  // Room Desc to Room List
  const backBtnAcc = document.getElementById("back-button");
  if (backBtnAcc) {
    backBtnAcc.onclick = function () {
      window.location.href = "room.html";
    };
  }

  // Room Content Slider
  let next = document.querySelector(".next");
  let prev = document.querySelector(".prev");

  next.addEventListener("click", function () {
    let items = document.querySelectorAll(".item-room");
    document.querySelector(".slide-room").appendChild(items[0]);
  });

  prev.addEventListener("click", function () {
    let items = document.querySelectorAll(".item-room");
    document.querySelector(".slide-room").prepend(items[items.length - 1]); // here the length of items = 6
  });
};
