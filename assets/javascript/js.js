// show search bar 
const serachicon = document.querySelector('#search_button_nav');
const search_container = document.querySelector('#searchContainer');
serachicon.addEventListener('click', function() {
    search_container.classList.toggle('show');
});

// responsive nav bar 
const mobile_nav_icon = document.querySelector("#nav_hamburg");
const mobile_nav_parent = document.querySelector(".navbar_grand_parent .navbar_mobile");
mobile_nav_icon.addEventListener('click', function() {
    mobile_nav_parent.classList.toggle('show');
});
