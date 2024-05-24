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
  const backBtnAcc = document.getElementById("back-button-account");
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

  // Flip Card in Contact Section
  const card = document.querySelector(".card");
  const flipToBackButton = document.getElementById("flip-to-back");
  const flipToFrontButton = document.getElementById("flip-to-front");

  if (card && flipToBackButton && flipToFrontButton) {
    flipToBackButton.addEventListener("click", function () {
      card.classList.add("flipped");
    });

    flipToFrontButton.addEventListener("click", function () {
      card.classList.remove("flipped");
    });
  }
};
