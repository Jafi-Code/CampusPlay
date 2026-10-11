/* =========================================================
   CampusPlay - Interactive Features
   --------------------------------------------------------
   1. Mobile navigation toggle
   2. Mobile dropdown behaviour
   3. Back-to-top button
   4. PWA install prompt
   5. Sport search and filter  (sports.php only)
   6. Contact form validation  (contact.php only)
   ========================================================= */

(function () {
  "use strict";

  document.addEventListener("DOMContentLoaded", init);

  function init() {
    setupMobileNav();
    setupMobileDropdowns();
    setupBackToTop();
    setupPWAInstall();
    setupSportFilter();
    setupContactForm();
  }

  /* ---------------------------------------------------------
       1. Mobile navigation
       Toggles the main nav open and closed on small screens.
       --------------------------------------------------------- */
  function setupMobileNav() {
    const toggle = document.getElementById("navToggle");
    const nav = document.getElementById("mainNav");
    if (!toggle || !nav) return;

    toggle.addEventListener("click", () => {
      const isOpen = nav.classList.toggle("open");
      toggle.setAttribute("aria-expanded", String(isOpen));
    });

    // Close the nav when a link is tapped on mobile
    nav.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", () => {
        if (window.matchMedia("(max-width: 860px)").matches) {
          nav.classList.remove("open");
          toggle.setAttribute("aria-expanded", "false");
        }
      });
    });
  }

  /* ---------------------------------------------------------
       2. Mobile dropdowns
       On desktop, dropdowns open on hover via CSS.
       On mobile, they toggle open on tap.
       --------------------------------------------------------- */
  function setupMobileDropdowns() {
    const dropdownParents = document.querySelectorAll(".has-dropdown");
    if (!dropdownParents.length) return;

    dropdownParents.forEach((parent) => {
      const trigger = parent.querySelector(":scope > a");
      if (!trigger) return;

      trigger.addEventListener("click", (event) => {
        if (!window.matchMedia("(max-width: 860px)").matches) return;
        event.preventDefault();
        parent.classList.toggle("open");
      });
    });
  }

  /* ---------------------------------------------------------
       3. Back-to-top button
       Appears once the user has scrolled past the hero.
       --------------------------------------------------------- */
  function setupBackToTop() {
    const button = document.getElementById("backToTop");
    if (!button) return;

    const threshold = 400;

    window.addEventListener(
      "scroll",
      () => {
        if (window.scrollY > threshold) {
          button.classList.add("show");
        } else {
          button.classList.remove("show");
        }
      },
      { passive: true },
    );

    button.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  /* ---------------------------------------------------------
       4. PWA install prompt
       Chromium fires beforeinstallprompt when the app meets the
       installability criteria. We capture it and show our own button.
       --------------------------------------------------------- */
  function setupPWAInstall() {
    const installButton = document.getElementById("pwaInstall");
    if (!installButton) return;

    let deferredPrompt = null;

    window.addEventListener("beforeinstallprompt", (event) => {
      event.preventDefault();
      deferredPrompt = event;
      installButton.hidden = false;
    });

    installButton.addEventListener("click", async () => {
      if (!deferredPrompt) return;
      deferredPrompt.prompt();
      const choice = await deferredPrompt.userChoice;
      if (choice.outcome === "accepted") {
        installButton.hidden = true;
      }
      deferredPrompt = null;
    });

    window.addEventListener("appinstalled", () => {
      installButton.hidden = true;
      deferredPrompt = null;
    });
  }

  /* ---------------------------------------------------------
       5. Sport search and filter  (sports.php)
       Filters sport cards by text input and category buttons.
       --------------------------------------------------------- */
  function setupSportFilter() {
    const searchInput = document.getElementById("sportSearch");
    const filterButtons = document.querySelectorAll(".filter-btn");
    const cards = document.querySelectorAll(".sport-card");
    const emptyState = document.getElementById("emptyState");
    if (!cards.length) return;

    let activeCategory = "all";
    let searchTerm = "";

    function applyFilters() {
      let visibleCount = 0;

      cards.forEach((card) => {
        const category = card.dataset.category || "all";
        const name = (card.dataset.name || "").toLowerCase();
        const matchesCategory =
          activeCategory === "all" || category === activeCategory;
        const matchesSearch = searchTerm === "" || name.includes(searchTerm);

        if (matchesCategory && matchesSearch) {
          card.style.display = "";
          visibleCount++;
        } else {
          card.style.display = "none";
        }
      });

      if (emptyState) {
        emptyState.hidden = visibleCount > 0;
      }
    }

    if (searchInput) {
      searchInput.addEventListener("input", (event) => {
        searchTerm = event.target.value.trim().toLowerCase();
        applyFilters();
      });
    }

    filterButtons.forEach((button) => {
      button.addEventListener("click", () => {
        filterButtons.forEach((b) => b.classList.remove("active"));
        button.classList.add("active");
        activeCategory = button.dataset.filter || "all";
        applyFilters();
      });
    });
  }

  /* ---------------------------------------------------------
       6. Contact form validation  (contact.php)
       Client-side feedback. The server still validates everything.
       --------------------------------------------------------- */
  function setupContactForm() {
    const form = document.getElementById("contactForm");
    if (!form) return;

    const errorBox = document.getElementById("jsError");
    if (!errorBox) return;

    form.addEventListener("submit", (event) => {
      const name = form.querySelector("#name").value.trim();
      const email = form.querySelector("#email").value.trim();
      const sport = form.querySelector("#sport").value;
      const message = form.querySelector("#message").value.trim();

      const errors = [];

      if (name.length < 2) {
        errors.push("Please enter your full name.");
      }
      if (!email.includes("@") || !email.includes(".")) {
        errors.push("Please enter a valid email address.");
      }
      if (!sport) {
        errors.push("Please select a sport.");
      }
      if (message.length < 10) {
        errors.push("Message must be at least 10 characters.");
      }

      if (errors.length) {
        event.preventDefault();
        errorBox.innerHTML = errors.map((e) => "<p>" + e + "</p>").join("");
        errorBox.hidden = false;
        errorBox.scrollIntoView({ behavior: "smooth", block: "center" });
      } else {
        errorBox.hidden = true;
      }
    });
  }
})();
