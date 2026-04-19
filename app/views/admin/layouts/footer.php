    </div> <!-- admin-content -->
    </div> <!-- admin-main -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const btn = document.getElementById('toggleSidebar');
            const sidebar = document.getElementById('adminSidebar');
            const main = document.getElementById('adminMain');

            if (btn && sidebar && main) {
                btn.addEventListener('click', function() {
                    sidebar.classList.toggle('collapsed');
                    main.classList.toggle('expanded');
                });
            }

        });
    </script>

    </body>

    </html>