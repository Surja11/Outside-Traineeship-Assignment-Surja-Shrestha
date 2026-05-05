// getting the menuIcons div so that when it is clicked, we can toggle the navbar
const menuIcons = document.getElementsByClassName('menu-icons')[0];

// getting the menu and cross icon from DOM so that we can toggle its display on click
const menu = document.getElementById('menu');
const cross = document.getElementById('cross');
const nav = document.getElementById('nav')


// invoking the throttle function when any of the menuIcons is clicked.
// Throttle function here passes an arrow function that toggles the display of menuIcons and opacity of navbar.Along with the function is also passes 500 ms time
menuIcons.addEventListener('click', throttle(()=>{
    menu.classList.toggle('is-hidden')
    cross.classList.toggle('is-hidden');
    nav.classList.toggle('is-closed');

},500)
)

// Throttle function
// Throttle allows us to invoke a function only once in a given time limit no matter how many times the even toccurs

function throttle(func, delay){
    let lastRan; 
    let intervalId;

    // here if the lastRan is not present, we run the funtion and set lastRan to present time
    // otherwise, we clear previous intervalId and setTimeout that lasts till the time defined by (delay - (date.now() - lastRan))
    return function(...args){
        if (!lastRan){
            func(...args);
            lastRan = Date.now();
        }else{
            clearTimeout(intervalId);
            intervalId = setTimeout(()=>{
                if(Date.now()-lastRan >= delay){
                    func(...args)
                    lastRan = Date.now();
                }
            }, delay - (Date.now()-lastRan))
        }
    }
}