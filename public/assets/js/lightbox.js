/**
 * LIGHTBOX - Galeri Fasilitas Pemandian Serayu Lestari
 * File: public/assets/js/lightbox.js
 */

const CONFIG = {
  animasiDurasi: 300,
  swipeThreshold: 50,
};

let lightboxData = {
  gambar: [],
  judul: "",
  deskripsi: "",
  indexFoto: 0,
  indexFasilitas: 0,
};

const overlay = document.getElementById("lightbox-overlay");
const imgElement = document.getElementById("lightbox-img");
const judulElement = document.getElementById("lightbox-judul");
const deskripsiElement = document.getElementById("lightbox-deskripsi");
const currentElement = document.getElementById("lightbox-current");
const totalElement = document.getElementById("lightbox-total");
const thumbnailsContainer = document.getElementById("lightbox-thumbnails");

function bukaLightbox(indexFasilitas, judul, deskripsi, gambarArray) {
  if (!gambarArray || gambarArray.length === 0) {
    gambarArray = ["assets/images/img1.jpg"];
  }

  lightboxData = {
    gambar: gambarArray,
    judul: judul,
    deskripsi: deskripsi,
    indexFoto: 0,
    indexFasilitas: indexFasilitas,
  };

  judulElement.textContent = judul;
  deskripsiElement.textContent = deskripsi;
  totalElement.textContent = gambarArray.length;

  generateThumbnails();
  tampilkanFoto(0);

  overlay.classList.add("active");
  document.body.style.overflow = "hidden";
}

function tutupLightbox(event) {
  if (
    !event ||
    event.target === overlay ||
    event.target.closest(".lightbox-close")
  ) {
    overlay.classList.remove("active");
    document.body.style.overflow = "auto";

    setTimeout(() => {
      imgElement.src = "";
      thumbnailsContainer.innerHTML = "";
    }, CONFIG.animasiDurasi);
  }
}

function tampilkanFoto(index) {
  const { gambar } = lightboxData;

  if (index < 0) {
    index = gambar.length - 1;
  } else if (index >= gambar.length) {
    index = 0;
  }

  lightboxData.indexFoto = index;
  currentElement.textContent = index + 1;

  imgElement.style.opacity = "0";

  const newImg = new Image();
  newImg.onload = function () {
    imgElement.src = gambar[index];
    imgElement.style.opacity = "1";
  };
  newImg.onerror = function () {
    imgElement.src = "assets/images/img1.jpg";
    imgElement.style.opacity = "1";
  };
  newImg.src = gambar[index];

  updateActiveThumbnail(index);
}

function gantiFoto(arah) {
  const newIndex = lightboxData.indexFoto + arah;
  tampilkanFoto(newIndex);
}

function generateThumbnails() {
  const { gambar, judul } = lightboxData;

  thumbnailsContainer.innerHTML = "";

  gambar.forEach((src, index) => {
    const thumb = document.createElement("img");
    thumb.src = src;
    thumb.alt = `${judul} - Foto ${index + 1}`;
    thumb.loading = "lazy";
    thumb.onclick = () => tampilkanFoto(index);

    if (index === 0) {
      thumb.classList.add("active");
    }

    thumbnailsContainer.appendChild(thumb);
  });
}

function updateActiveThumbnail(activeIndex) {
  const thumbnails = thumbnailsContainer.querySelectorAll("img");
  thumbnails.forEach((thumb, index) => {
    thumb.classList.toggle("active", index === activeIndex);
  });

  const activeThumb = thumbnails[activeIndex];
  if (activeThumb) {
    activeThumb.scrollIntoView({
      behavior: "smooth",
      inline: "center",
      block: "nearest",
    });
  }
}

// Keyboard Navigation
document.addEventListener("keydown", function (e) {
  if (!overlay.classList.contains("active")) return;

  switch (e.key) {
    case "Escape":
      tutupLightbox();
      break;
    case "ArrowLeft":
      e.preventDefault();
      gantiFoto(-1);
      break;
    case "ArrowRight":
      e.preventDefault();
      gantiFoto(1);
      break;
  }
});

// Touch/Swipe Support
let touchStartX = 0;
let touchEndX = 0;

overlay.addEventListener("touchstart", handleTouchStart, { passive: true });
overlay.addEventListener("touchend", handleTouchEnd, { passive: true });

function handleTouchStart(e) {
  touchStartX = e.changedTouches[0].screenX;
}

function handleTouchEnd(e) {
  touchEndX = e.changedTouches[0].screenX;
  handleSwipe();
}

function handleSwipe() {
  const diff = touchStartX - touchEndX;

  if (Math.abs(diff) > CONFIG.swipeThreshold) {
    if (diff > 0) {
      gantiFoto(1);
    } else {
      gantiFoto(-1);
    }
  }
}

// Preload
function preloadGambarFasilitas() {
  const cards = document.querySelectorAll(".fasilitas-card");
  cards.forEach((card) => {
    const onclickAttr = card.getAttribute("onclick");
    if (onclickAttr) {
      const match = onclickAttr.match(/\[(.*?)\]/);
      if (match) {
        try {
          const gambarList = JSON.parse("[" + match[1] + "]");
          if (gambarList[0]) {
            const img = new Image();
            img.src = gambarList[0];
          }
        } catch (e) {}
      }
    }
  });
}

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", preloadGambarFasilitas);
} else {
  preloadGambarFasilitas();
}
