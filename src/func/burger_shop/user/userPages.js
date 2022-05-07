

// TEXT TYPING (Home page)
    var i = 0,
    text;
    text = " Otaku Burger House!"
    function typing() {
        if (i < text.length) {
            document.getElementById("text").innerHTML += text.charAt(i);
            i++;
            setTimeout(typing, 100);
        }
    }
    typing();

// TEXT TYPING (Home page)

// Carousel (Home page)
    $('.main-carousel').flickity({
        // options
        cellAlign: 'left',
        wrapAround: true,
        freeScroll: true,
        autoPlay: true
    });

    $('.bestSeller-carousel ').flickity({
        cellAlign: 'left',
        wrapAround: true,
        freeScroll: true,
        autoPlay: true
    });

// Carousel (Home page)
