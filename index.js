window.addEventListener('scroll', function() {
    //144 is projects start
    let home = $('#nav-content-home')[0];
    let projects = $('#nav-content-projects')[0];
    let contact = $('#nav-content-contact')[0];
    let nav = $('#nav-main')[0];

    let scroll= this.scrollY;

    if(scroll < 50) {
        nav.style.padding = "25px 0";
        $('#nav-logo').css("visibility","hidden");
        $('#nav-content').css("justify-content", "space-evenly");
        $('#nav-title').css("visibility", "visible");
        $('#nav-title').css("position", "static");
        $('#nav-content').css('padding-top', '0');
    }
    else if (scroll > 50) {
        nav.style.padding = "0";
        $('#nav-logo').css("visibility","visible");
        $('#nav-content').css("justify-content", "flex-end");
        $('#nav-content').css('padding-top', '0');
        $('#nav-title').css("visibility", "hidden");
        $('#nav-title').css("position", "absolute");
    } 
    if(scroll <= 143) {
        home.className = 'nav-selected-link';
        projects.className = '';
        contact.className = '';
    } else if (scroll >= 144 && scroll < 925) {
        home.className = '';
        projects.className = 'nav-selected-link';
        contact.className = '';

    } else if (scroll > 1000) {
        home.className = '';
        projects.className = '';
        contact.className = 'nav-selected-link';
    }
});


var images = document.getElementsByClassName("content-img");

for(var i = 0; i < images.length; i++) {

images[i].addEventListener("click", function(e) {
    $('#enlarged-background').css("visibility", "visible");
    $('#enlarged-box').css("visibility", "visible");
    $('#enlarged-img').attr("src",e.target.image);

    document.getElementById("enlarged-background").addEventListener("click", () => {
        $('#enlarged-background').css("visibility", "hidden");
        $('#enlarged-box').css("visibility", "hidden");
        document.getElementById("enlarged-background").removeEventListener("click");
    });


});
images[i].image = images[i].getAttribute("src");
}