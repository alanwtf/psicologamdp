const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');

    burger.addEventListener('click', () => {
        //Nav animation
        nav.classList.toggle('nav-active');
        //Burger animation
        burger.classList.toggle('toggle');
        console.log("HOLA");
    });
}

const app = () => {
    navSlide();
}

app();




