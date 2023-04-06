$(document).ready(function () {
    $("#header_ul_li").click(function () {

        const menuItems = document.querySelectorAll('nav ul li');

        menuItems.forEach(item => {
            item.addEventListener('click', function () {
                // Remove the active class from the previously clicked item
                const activeItem = document.querySelector('nav ul li.active');
                if (activeItem) {
                    activeItem.classList.remove('active');
                    activeItem.querySelector('a').classList.remove('active_text');
                }

                // Add the active class to the clicked item
                this.classList.add('active');
                this.querySelector('a').classList.add('active_text');
            });
        });


    });
});