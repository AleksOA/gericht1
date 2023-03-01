// Header menu start
// ==============================
const munuBtn = document.getElementById('headerMenuBtn');
const menuMain = document.getElementById('headerMenuMain');
const menuItem548 = document.getElementById('menu-item-548');
const subMenu = document.querySelector('.sub-menu');



function openMenu(){
    menuItem548.classList.remove('hover');
    if(munuBtn.classList.contains('active')) {
        munuBtn.classList.remove('active');
        menuMain.classList.remove('active');
    }else {
        munuBtn.classList.add('active');
        menuMain.classList.add('active');
    }
}

function closeMenu(event){
    if(!event.target.closest('.menu-main') && !event.target.closest('.menu-btn')){
        munuBtn.classList.remove('active');
        menuMain.classList.remove('active');
    }
}

document.addEventListener('click', closeMenu);
if(munuBtn != null) {
    munuBtn.addEventListener('click', openMenu);
}



// openMenuLevel2
function openMenuLevel2() {
    subMenu.classList.add('active');
    menuMain.classList.add('active');
}

function closeMenuLevel2(event){
    if(event.target.closest('.sub-menu') || event.target.closest('.menu-btn')) {

    } else{
        subMenu.classList.remove('active');
    }

}
menuItem548.addEventListener('click', openMenuLevel2);
menuItem548.addEventListener('mouseenter', openMenuLevel2);
menuItem548.addEventListener('mouseleave', closeMenuLevel2);
subMenu.addEventListener('mouseleave', closeMenuLevel2);
menuItem548.addEventListener('touchstart', openMenuLevel2); //does not work "touchstart"
// ==============================
// Header menu finish


// Video start
//==========================
const video = document.querySelector('.video-media');
const videoButton = document.querySelector('.video_button');
const videoPlaceholder = document.querySelector('.video__placeholder');
const sectionVideoHome = document.querySelector('.video-home');

if(sectionVideoHome) {
    video.removeAttribute('controls');
}

function playVideo() {
    video.play();
}
function pauseVideo (event) {
    if(sectionVideoHome) {
        if(!event.target.closest('.video_button')){
                video.pause();
        }
    }

    if(!event.target.closest('.video-wrapper')){
        video.pause();
    }
}
if(video){document.addEventListener('click', pauseVideo);}
if(videoButton){videoButton.addEventListener('click', playVideo);}
if(video){
    video.addEventListener('play', (event) => {
        videoPlaceholder.style.display = "none";
        videoButton.style.display = 'none';
    });

    video.addEventListener('pause', (event) => {
        videoPlaceholder.style.display = "block";
        videoButton.style.display = 'block';
    });
}
// ==============================
// Section video finish


// Section Book a table start
// ==============================

const bookBtn = document.querySelector('.book__btn');
const rtbContact = document.querySelector('.rtb-contact');
const rtbFormFooter = document.querySelector('.rtb-form-footer');
const bookWrapper = document.querySelector('.book__wrapper');
const rtbDate = document.getElementById('rtb-date');
const rtbTime = document.getElementById('rtb-time');
const rtbName = document.getElementById('rtb-name');
const rtbEmail = document.getElementById('rtb-email');
const rtbPhone = document.getElementById('rtb-phone');



function setAttributeInput() {
    rtbDate.setAttribute('placeholder', '12 / 02 / 2023');
    rtbTime.setAttribute('placeholder', '11:00 AM');
    rtbName.setAttribute('placeholder', 'Name');
    rtbEmail.setAttribute('placeholder', 'Email');
    rtbPhone.setAttribute('placeholder', 'Phone');
}
function openFields() {
    rtbContact.classList.add('close');
    rtbFormFooter.classList.add('close');
    bookWrapper.classList.add('close');
}

function closeFields(event) {
    if(!event.target.closest('.book')) {
        rtbContact.classList.remove('close');
        rtbFormFooter.classList.remove('close');
        bookWrapper.classList.remove('close');
    }
}


if(bookBtn) {
    setAttributeInput();
    if(rtbContact) {

        bookBtn.addEventListener('click', openFields);
    }
}

if(bookBtn) {
    document.addEventListener('click', closeFields);
}

// ==============================
// Section Book a table finish








// Section FAQ start
// ==============================
const faqItem = document.querySelectorAll('.faq__item');

function removeActive() {
    faqItem.forEach(elem =>{
        elem.classList.remove('active');
    });
}

if(faqItem) {
    document.addEventListener('click', function (event){
        if(!event.target.closest('.faq__wrapper')) {
            removeActive();
        }
    });
    faqItem.forEach(item =>{
        item.addEventListener('click', function(){
            removeActive();
            item.classList.add('active');
        })
    })
}

// ==============================
// Section FAQ finish






// Section Emblem start
// ==============================
const emblemWrapper = document.querySelector('.emblem__wrapper');
const emblemAroundImage = document.querySelector('.emblem__around-image');

let a = 1;
function rotate_words_around_stop() {

    if(a == 0) {
        a = 1;
        return false
    }

    if(a >= 1) {
        a = 0;
        setTimeout(rotate_words_around_stop, 31)
    }

}

function rotate_words_around() {
    if (a == 0) {
        emblemAroundImage.style.transform = `rotate(0deg)`;
        return true
    }
    a = a + 1;
    emblemAroundImage.style.transform = `rotate(${a}deg)`;
    setTimeout(rotate_words_around, 30);
}

function rotate_words() {
    emblemAroundImage.style.transform = 'rotate(45deg)';
}
function rotate_words2() {
    emblemAroundImage.style.transform = 'rotate(-45deg)';
}


if(emblemWrapper != null) {
    // emblemWrapper.addEventListener('mouseenter', rotate_words);
// emblemWrapper.addEventListener('mouseleave', rotate_words2);
    emblemWrapper.addEventListener('click', rotate_words_around);

    emblemWrapper.addEventListener('mouseenter', rotate_words_around);
    emblemWrapper.addEventListener('mouseleave', rotate_words_around_stop);
    emblemWrapper.addEventListener('touchstart', rotate_words_around);
    emblemWrapper.addEventListener('touchend', rotate_words_around_stop);
}
// ==============================
// Section Emblem finish


//link pages
// ==============

const pages = document.getElementById('menu-item-548');
const elems = pages.children[0];
elems.addEventListener('click', function (event){
    event.preventDefault();
})
// ==============








