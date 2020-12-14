/*Variables*/
let showNavBtn = document.getElementById('show-nav-btn');
let navbarOverlay = document.getElementById('navbar-overlay');
let nav = document.getElementById('nav');
let opened = false;

let lastRun = null;
let reviews = document.getElementById('reviews');
let loadingSpinner = document.getElementById('loading-spinner');

let scrollBtn = document.getElementById("scroll-btn");

getReviewerData();
getReviewerData();
getReviewerData();

showNavBtn.addEventListener('click', () => {
    if (opened) {
        closeNavbar();
    } else {
        openNavbar();
    }

}, false)

navbarOverlay.addEventListener('click', () => {
    if (opened) {
        closeNavbar();
    }
}, false)

window.addEventListener('scroll', (event) => {
    if (elementInViewport(loadingSpinner)) {
        loadingSpinner.classList.add('animation-loadReviews');
        loadReview();
    }

    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollBtn.classList.add('animation-showScrollBtn')
        scrollBtn.classList.remove('animation-hideScrollBtn')
        scrollBtn.style.display = "block";
    } else {
        scrollBtn.classList.remove('animation-showScrollBtn')
        scrollBtn.classList.add('animation-hideScrollBtn')
        scrollBtn.style.display = "none";
    }
});

scrollBtn.addEventListener('click', () => {
    document.body.scrollIntoView({ behavior: "smooth" });
    document.documentElement.scrollIntoView({ behavior: "smooth" });
}, false)

function openNavbar() {
    nav.classList.add('animation-showNavBar')
    nav.classList.remove('animation-hideNavBar')
    navbarOverlay.style.display = 'grid';
    navbarOverlay.classList.add('animation-showNavBarOverlay')
    navbarOverlay.classList.remove('animation-hideNavBarOverlay')
    opened = true;
}

function closeNavbar() {
    nav.classList.remove('animation-showNavBar')
    nav.classList.add('animation-hideNavBar')
    navbarOverlay.classList.remove('animation-showNavBarOverlay')
    navbarOverlay.classList.add('animation-hideNavBarOverlay')
    navbarOverlay.style.display = 'none';
    opened = false;
}

function loadReview() {
    if (lastRun == null || new Date().getTime() - lastRun > 1000) {
        getReviewerData();
    }
    lastRun = new Date().getTime();
}

async function getReviewerData() {
    const userResponse = await fetch('https://randomuser.me/api?results=1');
    const userJson = await userResponse.json();
    const name = userJson.results[0].name.first + " " + userJson.results[0].name.last;
    const picture = userJson.results[0].picture.medium;

    const reviewResponse = await fetch('https://www.randomtext.me/api/gibberish/p-1/40-100');
    const reviewJson = await reviewResponse.json();
    const reviewMessage = reviewJson.text_out;

    createReview({ name, picture, reviewMessage });
}

function createReview(reviewerData) {
    const review = `<div class="review" id="review"><div class="reviewer" id="reviewer"><img src="${reviewerData.picture}" alt="Reviewers profile photo" class="reviewer-photo" id="reviewer-photo"><h3 class="reviewer-name" id="reviewer-name">${reviewerData.name}</h3></div><p class="lorem sm">${reviewerData.reviewMessage}</p></div>`;
    reviews.innerHTML += review;
    loadingSpinner.classList.remove('animation-loadReviews');
}

function elementInViewport(el) {
    var top = el.offsetTop;
    var left = el.offsetLeft;
    var width = el.offsetWidth;
    var height = el.offsetHeight;

    while (el.offsetParent) {
        el = el.offsetParent;
        top += el.offsetTop;
        left += el.offsetLeft;
    }

    return (
        top < (window.pageYOffset + window.innerHeight) &&
        left < (window.pageXOffset + window.innerWidth) &&
        (top + height) > window.pageYOffset &&
        (left + width) > window.pageXOffset
    );
}