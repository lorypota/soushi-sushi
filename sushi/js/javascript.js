//Arrow to go to the top of the page
arrowUp = document.getElementById("arrowUp"); //Gets the button
body = document.getElementsByTagName("body")[0]; //Gets the body

//When the user scrolls down 70px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction()
{
    if ((document.body.scrollTop > 100 || document.documentElement.scrollTop > 100))
    {
        arrowUp.style.display = "block";
    }
    else
    {
        arrowUp.style.display = "none";
    }
}

//When the user clicks on the button, scroll to the top of the document
function topFunction()
{
    document.body.scrollTop = 0; //For Safari
    document.documentElement.scrollTop = 0; //For Chrome, Firefox, IE and Opera
}


//Modal to insert images
var img; //Array that contains all the images
var modal; //Modal
var modalImg; //Modal image
var captionText; //Modal text
var currentIndex = 0; //Index of the image

var firstplus = true; //To solve the bug which shows the first arrow on the right

function startModalImg()
{
    img = document.getElementsByClassName("clickable-image"); //Selects all clickable images
    modal = document.getElementById("modal-img-zoom"); //Selects the modal
    modalImg = document.getElementById("modal-img"); //Selects the image of the modal
    captionText = document.getElementById("caption"); //Selects the caption of the modal

    //Checks the clicks per image
    for (i = 0; i < img.length; i++)
    {
        img[i].onclick = function() {
        setModalImg(this);
        }
    }

    //Selects the x
    var x = document.getElementById("modal-close");

    //Closes the modal when x is clicked
    if(x!=null)
    {
        x.onclick = function()
        { 
            modal.style.display = "none"; //Hides the modal that shows the image
            if(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100)
                arrowUp.style.display = "block"; //Shows the arrow to go to the top of the page
            body.style.overflow = "visible"; //Sets overflow of the page to visible to allow scrolling      
        }
    }
}

//Increments the selected index
function plusModalImg(index)
{
    if(currentIndex+index > img.length-1)
    {
        currentIndex=0;
    }
    else if(currentIndex+index < 0)
    {
        currentIndex = img.length-1
    }
    else currentIndex += index;

    modal.style.display = "block"; //Shows the modal
    modalImg.src = img[currentIndex].src;
    captionText.innerHTML = img[currentIndex].alt;
}

//Sets the modal based on the element
function setModalImg(setimg)
{
    arrowUp.style.display = "none"; //Shows the arrow to go to the top of the page
    modal.style.display = "block"; //Shows modal
    body.style.overflow = "hidden"; //Sets overflow of the page to hidden to prevent scrolling
    modalImg.src = setimg.src;
    captionText.innerHTML = setimg.alt;
    for (i = 0; i < img.length; i++)
    {
        if(img[i] == setimg)
        currentIndex = i;
    }
}

//Pop-Up button
//Gets the pop-up button
var popup = document.getElementsByClassName("popup");
var random = document.getElementById("random");
var account = document.getElementById("account");

//Gets the button that opens the popup
var buttonLogin = document.getElementById("loginButton");
var buttonRegister = document.getElementById("registerButton")
var buttonAccount = document.getElementById("accountButton");

//Gets the <div> that closes the modal
var spanLogin = document.getElementsByClassName("close-login")[0];
var spanRegister = document.getElementsByClassName("close-register")[0];
var spanRandom = document.getElementsByClassName("close-random")[0];
var spanAccount = document.getElementsByClassName("close-account")[0];

function buttonLoginFunc()
{
    popup[0].style.display = "block"; //Shows the popup
    arrowUp.style.display = "none"; //Hides the arrow to go to the top of the page
    body.style.overflow = "hidden"; //Sets overflow of the page to hidden to prevent scrolling
}

if(buttonLogin != null)
{
    buttonLogin.onclick = function()
    {
        buttonLoginFunc();
    }
}

function buttonRegisterFunc()
{
    popup[1].style.display = "block"; //Shows the popup
}

buttonRegister.onclick = function()
{
    buttonRegisterFunc();
}

function openRandom()
{
    random.style.display = "block"; //Shows the popup
}

if(spanRandom != null)
{
    spanRandom.onclick = function()
    {
        random.style.display = "none"; //Hides the popup
    }
}

// When the user clicks on x, close the modal
spanLogin.onclick = function()
{
    popup[0].style.display = "none"; //Hides the popup
    if(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100)
        arrowUp.style.display = "block"; //Shows the arrow to go to the top of the page
    body.style.overflow = "visible"; //Sets overflow of the page to visible to allow scrolling
}

spanRegister.onclick = function()
{
    popup[1].style.display = "none"; //Hides the popup
}

if(buttonAccount != null)
{
    buttonAccount.onclick = function(){
        account.style.display = "block";
        arrowUp.style.display = "none"; //Hides the arrow to go to the top of the page
        body.style.overflow = "hidden"; //Sets overflow of the page to hidden to prevent scrolling
    }
}

if(spanAccount != null)
{
    spanAccount.onclick = function(){
        account.style.display="none";
        if(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100)
            arrowUp.style.display = "block"; //Shows the arrow to go to the top of the page
        body.style.overflow = "visible"; //Sets overflow of the page to visible to allow scrolling
    }
}