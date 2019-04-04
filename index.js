window.addEventListener('scroll', function() {
    //144 is projects start
    let home = $('#nav-content-home')[0];
    let projects = $('#nav-content-projects')[0];
    let contact = $('#nav-content-contact')[0];
    let test = $('#nav-content-test')[0];

    let scroll= this.scrollY;

    if(scroll <= 143) {
        home.className = 'nav-selected-link';
        projects.className = '';
        contact.className = '';
        test.className = '';
        console.log("FIRE");
    } else if (scroll >= 144 && scroll < 691) {
        home.className = '';
        projects.className = 'nav-selected-link';
        contact.className = '';
        test.className = '';
    } else if (scroll > 691) {
        home.className = '';
        projects.className = '';
        contact.className = 'nav-selected-link';
        test.className = '';
    }
    console.log(scroll);
});
