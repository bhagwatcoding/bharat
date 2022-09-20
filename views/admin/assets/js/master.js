let main = qs('.main');
if ((localStorage.nav_mode == 1) && window.innerWidth > 600) {
    Toogle(main, 'big-main');
};
on('click', qs('#colpse_menu'), () => {
    Toogle(main, 'big-main');
    if (window.innerWidth > 600) {
        localStorage.nav_mode = localStorage.nav_mode == 1?  0 : 1;
    }
});

// /  for active page Start
let navLink = qsa('.navbar .nav a');
let splitUrl = location.href;
navLink.forEach(e => {
    if (e.href == splitUrl) { Toogle(e, 'active'); }
});
//  for active page end
