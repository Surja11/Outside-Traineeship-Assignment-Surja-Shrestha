
    document.addEventListener('DOMContentLoaded', function () {

        const tabs = document.querySelectorAll('.dept-tabs__block');
        const panels = document.querySelectorAll('.dept-panel');

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                const target = this.dataset.tab; 

                // Removing active from all tabs and panels
                tabs.forEach(t => t.classList.remove('is-active'));
                panels.forEach(p => p.classList.remove('is-active'));

                // Adding  is-active to clicked tab
                this.classList.add('is-active');

                // Showing the matching data panel
                document.getElementById(target).classList.add('is-active');
            });
        });

    });

