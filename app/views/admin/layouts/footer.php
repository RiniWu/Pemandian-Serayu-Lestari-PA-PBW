    </div> <!-- admin-content -->
    </div> <!-- admin-main -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const btn = document.getElementById('toggleSidebar');
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('adminSidebarOverlay');
            const main = document.getElementById('adminMain');
            const flash = document.querySelector('.admin-flash');
            const mobileBreakpoint = 992;
            const body = document.body;

            function setSidebarExpanded(isExpanded) {
                btn?.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
            }

            function closeMobileSidebar() {
                sidebar.classList.remove('mobile-open');
                overlay?.classList.remove('active');
                main.classList.remove('mobile-shifted');
                body.classList.remove('sidebar-open-mobile');
                setSidebarExpanded(false);
            }

            if (btn && sidebar && main) {
                btn.addEventListener('click', function() {
                    if (window.innerWidth <= mobileBreakpoint) {
                        const willOpen = !sidebar.classList.contains('mobile-open');
                        sidebar.classList.toggle('mobile-open', willOpen);
                        overlay?.classList.toggle('active', willOpen);
                        main.classList.toggle('mobile-shifted', willOpen);
                        body.classList.toggle('sidebar-open-mobile', willOpen);
                        setSidebarExpanded(willOpen);
                    } else {
                        sidebar.classList.toggle('collapsed');
                        main.classList.toggle('expanded');
                    }
                });

                document.addEventListener('click', function(event) {
                    if (window.innerWidth > mobileBreakpoint) return;

                    const clickedToggle = btn.contains(event.target);
                    const clickedSidebar = sidebar.contains(event.target);
                    const clickedOverlay = overlay?.contains(event.target);

                    if (clickedOverlay || (!clickedToggle && !clickedSidebar)) {
                        closeMobileSidebar();
                    }
                });

                window.addEventListener('resize', function() {
                    if (window.innerWidth > mobileBreakpoint) {
                        closeMobileSidebar();
                    }
                });
            }

            if (flash) {
                window.setTimeout(function() {
                    flash.classList.remove('show');
                    flash.classList.add('hide');
                    window.setTimeout(function() {
                        flash.parentElement?.remove();
                    }, 200);
                }, 4000);
            }

        });
    </script>

    </body>

    </html>
