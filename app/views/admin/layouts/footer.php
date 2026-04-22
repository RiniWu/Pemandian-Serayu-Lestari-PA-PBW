    </div> <!-- admin-content -->
    </div> <!-- admin-main -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const btn = document.getElementById('toggleSidebar');
            const sidebar = document.getElementById('adminSidebar');
            const main = document.getElementById('adminMain');
            const flash = document.querySelector('.admin-flash');

            if (btn && sidebar && main) {
                btn.addEventListener('click', function() {
                    sidebar.classList.toggle('collapsed');
                    main.classList.toggle('expanded');
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
