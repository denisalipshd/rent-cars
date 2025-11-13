document.addEventListener("DOMContentLoaded", () => {
    const navbar = document.querySelector("nav");
    const hamburger = document.querySelector("#hamburger");
    const navMobile = document.querySelector("#nav-mobile");
    const navLink = document.querySelectorAll("nav li a");
    const currentPage = window.location.pathname;
    const rentNowBtn = document.querySelectorAll(".rentNowBtn");
    const rentNowModal = document.getElementById("rentModal");
    const closeModal = document.getElementById("closeModal");

    // Navbar transparent di halaman utama
    if (currentPage === "/") {
        navbar.classList.add("bg-transparent");
        navbar.classList.remove("bg-white", "shadow-sm");

        hamburger.addEventListener("click", function () {
            navbar.classList.add("bg-white");
        });

        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) {
                navbar.classList.add("bg-white", "shadow-sm");
            } else {
                navbar.classList.remove("bg-white", "shadow-sm");
            }
        });
    } else {
        navbar.classList.add("bg-white", "shadow-sm");
    }

    // Hamburger
    hamburger.addEventListener("click", function () {
        navMobile.classList.toggle("opacity-0");
        navMobile.classList.toggle("pointer-events-none");
        navMobile.classList.toggle("-translate-y-full");
        navMobile.classList.toggle("translate-y-0");
    });

    // Highlight link aktif
    navLink.forEach((link) => {
        const href = link.getAttribute("href");
        if (href === currentPage) {
            link.classList.add("text-blue-400");
        } else {
            link.classList.remove("text-blue-400");
        }
    });

    // Swiper
    const swiper = new Swiper(".mySwiper", {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });

    // Rent Modal Elements
    const carId = rentNowModal.querySelector("#carId");
    const carImg = rentNowModal.querySelector("img");
    const carName = rentNowModal.querySelector(".carName");
    const carInfo = rentNowModal.querySelector(".carInfo");
    const carPrice = rentNowModal.querySelector(".carPrice");
    const pickupInput = rentNowModal.querySelector("#pickup_date");
    const returnInput = rentNowModal.querySelector("#return_date");

    // Rent Now Button
    rentNowBtn.forEach((btn) => {
        btn.addEventListener("click", () => {
            const id = btn.dataset.id;
            const name = btn.dataset.name;
            const thumbnail = btn.dataset.thumbnail;
            const price = parseInt(btn.dataset.price);
            const seats = btn.dataset.seats;
            const fuel = btn.dataset.fuel;
            const transmission = btn.dataset.transmission;

            // Isi modal
            carId.value = id;
            carImg.src = thumbnail;
            carName.textContent = name;
            carInfo.innerHTML = `
                <span><i class="fa-solid fa-wheelchair text-blue-500"></i> ${seats} Seats</span> |
                <span><i class="fa-solid fa-gas-pump text-blue-500"></i> ${fuel}</span> |
                <span><i class="fa-solid fa-gear text-blue-500"></i> ${transmission}</span>
            `;
            carPrice.textContent = `Rp ${price.toLocaleString("id-ID")} /day`;

            // Simpan harga ke modal
            rentNowModal.dataset.price = price;

            // Tampilkan modal
            rentNowModal.classList.remove("hidden");
            rentNowModal.classList.add("flex");
        });
    });

    // Tutup modal
    closeModal.addEventListener("click", () => {
        rentNowModal.classList.add("hidden");
        rentNowModal.classList.remove("flex");
    });

    // Hitung total harga saat tanggal berubah
    pickupInput.addEventListener("change", handleDateChange);
    returnInput.addEventListener("change", handleDateChange);

    function handleDateChange() {
        const pickupDate = pickupInput.value;
        const returnDate = returnInput.value;
        const pricePerDay = parseInt(rentNowModal.dataset.price || 0);

        if (pickupDate && returnDate) {
            const start = new Date(pickupDate);
            const end = new Date(returnDate);
            const diffDays = Math.ceil((end - start) / (1000 * 60 * 60 * 24));

            const totalPrice = diffDays > 0 ? diffDays * pricePerDay : 0;

            console.log(`Lama sewa: ${diffDays} hari`);
            console.log(`Total harga: Rp ${totalPrice.toLocaleString("id-ID")}`);

            carPrice.textContent = `Rp ${totalPrice.toLocaleString("id-ID")} /day`;
            rentNowModal.querySelector("#totalPrice").value = totalPrice;
        }
    }
});
