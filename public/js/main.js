function initSidebar() {
    // Remove old event listeners by cloning the sidebar
    const sidebar = document.querySelector("#sidebar");
    if (!sidebar) return;

    // 🧹 To prevent duplicate listeners:
    const newSidebar = sidebar.cloneNode(true);
    sidebar.parentNode.replaceChild(newSidebar, sidebar);

    let sidebarItems = newSidebar.querySelectorAll(".sidebar-item.has-sub");
    for (let i = 0; i < sidebarItems.length; i++) {
        let sidebarItem = sidebarItems[i];
        let link = sidebarItem.querySelector(".sidebar-link");
        if (!link) continue;

        link.addEventListener("click", function (e) {
            e.preventDefault();
            let submenu = sidebarItem.querySelector(".submenu");

            // ensure submenu display logic is consistent
            if (submenu.style.display === "none" || submenu.style.display === "") {
                submenu.style.display = "block";
                submenu.classList.add("active");
            } else {
                submenu.style.display = "none";
                submenu.classList.remove("active");
            }

            slideToggle(submenu, 300);
        });
    }

    // Burger / hide buttons
    newSidebar.querySelector(".burger-btn")?.addEventListener("click", () => {
        newSidebar.classList.toggle("active");
    });
    newSidebar.querySelector(".sidebar-hide")?.addEventListener("click", () => {
        newSidebar.classList.toggle("active");
    });

    // Perfect Scrollbar
    if (typeof PerfectScrollbar === "function") {
        const container = newSidebar.querySelector(".sidebar-wrapper");
        new PerfectScrollbar(container, { wheelPropagation: false });
    }

}
