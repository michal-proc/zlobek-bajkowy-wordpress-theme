import $ from 'jquery';
import 'slick-carousel';
import AOS from 'aos';

class Star {
    constructor(canvas, ctx) {
        let size = Math.floor(Math.random() * 15) + 20;
        let [startPosX, startPosY] = this.getStartingPosition(canvas.width, canvas.height, size);
        this.startPosX = startPosX;
        this.startPosY = startPosY;
        this.size = size;
        this.currentPosX = startPosX;
        this.currentPosY = startPosY;
        this.speed = (Math.round(Math.random() * 10) + 1) / 10;
        this.limitX = canvas.width;
        this.limitY = canvas.height;
    }

    moveStar(ctx) {
        if (this.currentPosX > this.limitX || this.currentPosY > this.limitY) {
            this.currentPosX = this.startPosX;
            this.currentPosY = this.startPosY;
        }
        this.currentPosX += this.speed;
        this.currentPosY += this.speed;
        this.drawStar(ctx);
    }

    handleWindowResize(x, y) {
        this.limitX = x;
        this.limitY = y;
    }

    drawStar(ctx) {
        ctx.beginPath();
        let middleX = this.currentPosX + (this.size / 2), middleY = this.currentPosY + (this.size / 2);
        ctx.moveTo(this.currentPosX, middleY);
        ctx.quadraticCurveTo(middleX, middleY, middleX, this.currentPosY);
        ctx.quadraticCurveTo(middleX, middleY, this.currentPosX + this.size, middleY);
        ctx.quadraticCurveTo(middleX, middleY, middleX, this.currentPosY + this.size);
        ctx.quadraticCurveTo(middleX, middleY, this.currentPosX, middleY);
        ctx.closePath();
        ctx.fill();
    }

    getStartingPosition = (w, h, size) => {
        let widthPercentage = w / (w + h);
        let xAxis = (Math.random() <= widthPercentage);
        let startPosX = 0, startPosY = 0;
        if (xAxis) {
            startPosX = Math.floor(Math.random() * w);
            startPosY = -size;
        } else {
            startPosY = Math.floor(Math.random() * h);
            startPosX = -size;
        }
        return [startPosX, startPosY];
    }
}

const moveStars = (stars, canvas, ctx, gradient) => {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.globalCompositeOperation = 'source-over';
    ctx.fillStyle = gradient;
    stars.forEach(s => {
        s.moveStar(ctx);
    });

    ctx.globalCompositeOperation = 'source-in';
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    requestAnimationFrame(() => moveStars(stars, canvas, ctx));
}

var stars = [];

// Navbar
document.addEventListener('DOMContentLoaded', () => {
    let hamburger = document.querySelector('.hamburger')
    let navbar = document.querySelector('.navbar')
    hamburger.addEventListener("click", () => {
        hamburger.classList.toggle("hamburger-active")
        navbar.classList.toggle('navbar-revealed')
    })

    let footer = document.querySelector('footer');
    document.querySelector('.footer-container').style.height = (window.innerHeight - document.body.offsetHeight < 0 ? footer.offsetHeight + 200 : (window.innerHeight - document.body.offsetHeight) + footer.offsetHeight + 200) + "px";
    window.addEventListener('resize', () => {
        let footer = document.querySelector('footer');
        document.querySelector('.footer-container').style.height = (window.innerHeight - document.body.offsetHeight < 0 ? footer.offsetHeight + 200 : (window.innerHeight - document.body.offsetHeight) + footer.offsetHeight + 200) + "px";
    })


    const canvas = document.getElementById('bg-starfall');
    let clientX = window.innerWidth;
    let clientY = window.innerHeight;
    canvas.width = clientX;
    canvas.height = clientY;
    const ctx = canvas.getContext('2d');

    let gradient = ctx.createLinearGradient(0, 0, clientX, clientY);
    gradient.addColorStop(0, "#67d9fe");
    gradient.addColorStop(0.41, "#cdea7d");
    gradient.addColorStop(1, "#f98873");
    ctx.fillStyle = gradient;
    ctx.fillRect(0, 0, clientX, clientY);

    window.addEventListener('resize', () => {
        clientX = window.innerWidth;
        clientY = window.innerHeight;
        canvas.width = clientX;
        canvas.height = clientY;

        stars.forEach(s => {
            s.handleWindowResize(clientX, clientY)
        })

        gradient = ctx.createLinearGradient(0, 0, clientX, clientY);
        gradient.addColorStop(0, "#67d9fe");
        gradient.addColorStop(0.41, "#cdea7d");
        gradient.addColorStop(1, "#f98873");
        ctx.fillStyle = gradient;
    })

    for (let i = 0; i < 50; i++) {
        stars.push(new Star(canvas, ctx));
    }

    moveStars(stars, canvas, ctx, gradient);

    // Old stars
    // const numStars = 50;
    // const starsBox = document.getElementById("starMask")
    // const pageHeight = window.innerHeight;
    // const pageWidth = window.innerWidth;

    // for (let i = 0; i < numStars; i++) {
    //     let star = document.createElementNS('http://www.w3.org/2000/svg', 'g');
    //     let zeroXAxis = Math.random() < pageHeight / (pageHeight + pageWidth)
    //     let posXbase = 0, posYbase = 0, posX = 0, posY = 0;
    //     if (zeroXAxis) {
    //         posXbase = -32;
    //         posYbase = Math.floor(Math.random() * pageHeight);
    //     } else {
    //         posXbase = Math.floor(Math.random() * pageWidth);
    //         posYbase = -32;
    //     }
    //     posX = posXbase;
    //     posY = posYbase;
    //     star.setAttribute("transform", `translate(${posX}, ${posY}) scale(1.5)`)
    //     star.innerHTML = `
    //             <path
    //                 d="M12 3L13.4302 8.31181C13.6047 8.96 13.692 9.28409 13.8642 9.54905C14.0166 9.78349 14.2165 9.98336 14.451 10.1358C14.7159 10.308 15.04 10.3953 15.6882 10.5698L21 12L15.6882 13.4302C15.04 13.6047 14.7159 13.692 14.451 13.8642C14.2165 14.0166 14.0166 14.2165 13.8642 14.451C13.692 14.7159 13.6047 15.04 13.4302 15.6882L12 21L10.5698 15.6882C10.3953 15.04 10.308 14.7159 10.1358 14.451C9.98336 14.2165 9.78349 14.0166 9.54905 13.8642C9.28409 13.692 8.96 13.6047 8.31181 13.4302L3 12L8.31181 10.5698C8.96 10.3953 9.28409 10.308 9.54905 10.1358C9.78349 9.98336 9.98336 9.78349 10.1358 9.54905C10.308 9.28409 10.3953 8.96 10.5698 8.31181L12 3Z"
    //             fill="white" />
    //         `;
    //     let duration = Math.random() * 10 + 5;
    //     let jump = 100 * Math.random();
    //     let step = Math.floor(duration / 5)
    //     star.style.transition = `all ${step}s linear`
    //     setInterval(() => {
    //         if (posX > window.innerWidth || posY > window.innerHeight) {
    //             star.style.transition = 'all 0s';
    //             posX = posXbase;
    //             posY = posYbase;
    //             star.setAttribute("transform", `translate(${posX}, ${posY})  scale(1.5)`)

    //         } else {
    //             star.style.transition = `all ${step}s linear`;
    //             posX += jump
    //             posY += jump
    //             star.setAttribute("transform", `translate(${posX}, ${posY})  scale(1.5)`)
    //         }
    //     }, step * 1000)
    //     starsBox.appendChild(star);
    // }

    AOS.init({
        duration: 500,
        easing: 'ease-out-quart',
        once: true
    });
});

// Slider

$(document).ready(function () {
    if ($('.slider') !== null) {
        $('.slider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            cssEase: 'linear',
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true
        });
    }
});

// Dynamic .container padding

document.addEventListener("DOMContentLoaded", function () {
    const header = document.querySelector('header');
    const mainContent = document.querySelector('.container');

    function adjustPadding() {
        const headerHeight = header.offsetHeight;
        mainContent.style.paddingTop = headerHeight + 'px';
    }

    adjustPadding();
    window.addEventListener('resize', adjustPadding);
});