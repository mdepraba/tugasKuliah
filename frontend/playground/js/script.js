const body = document.querySelector('body'),
sidebar = body.querySelector('nav'),
toggle = body.querySelector(".toggle"),
searchBtn = body.querySelector(".search-box"),
modeSwitch = body.querySelector(".toggle-switch"),
modeText = body.querySelector(".mode-text");

toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("closed");
})

// searchBtn.addEventListener("click" , () =>{
//     sidebar.classList.remove("closed");
// })

// sidebar on active
$(".menu-links a").on("click", function() {
    $(".menu-links").find(".active").removeClass("active");
    $(this).parent().addClass("active");
});

// tables
new DataTable('#table', {
    scrollX: true,
    scrollY: '50vh',
    paging: false,          // halaman table, no scrolling
    scrollCollapse: false,  // collapse saat data sedikit
    info: false             // info halaman
});

// $('#table').DataTable({
//     dom: 'frtip' 
// });