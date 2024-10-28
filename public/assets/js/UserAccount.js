document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.account-menu li a');
    const sections = document.querySelectorAll('.account-content section');

    sections[0].style.display = 'block';
    menuItems[0].parentElement.classList.add('active');

    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();

            sections.forEach(section => {
                section.style.display = 'none';
            });

            const targetId = item.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                targetSection.style.display = 'block';
            }

            menuItems.forEach(menuItem => {
                menuItem.parentElement.classList.remove('active');
            });

            item.parentElement.classList.add('active');
        });
    });
});
