// select the div with id= app
const app = document.getElementById('app');

// select the div with id = boxContainer
const boxContainer = document.getElementById('boxContainer');

// give the app div margin 20px so that it aligns with boxes in boxContainer
app.style.margin = "20px";

// using styles to make the boxContainer flex and allowing it to wrap
boxContainer.style.display = "flex";
boxContainer.style.flexWrap = 'wrap';

// creating an array of colors to assign to the boxes
const colors = ['red', 'blue', 'purple', 'green', 'beige', 'black', 'yellow', 'deepskyblue']

// creating a button which can be later appended to app div
let btn = document.createElement('button');

// creating index variable that we can use for assigning colors to the boxes
let i = 0;

// selectColor fucntion to assign colors to boxes
function selectColor() {

    // if we reach to the end of colors array, reseting the index to 0 so that we can assign colors from the beginning
    if (i >= colors.length) {
        i = 0;
    }

    return colors[i++];

}


// set timeout to add the button after 2000 milliseconds
setTimeout(() => {

    // adding textContent to the button
    btn.textContent = "Add Box";

    // adding font size of the button with js
    btn.style.fontSize = "20px";

    // adding padding to the button
    btn.style.padding = "15px 40px";

    // adding color and background-color to the button
    btn.style.backgroundColor = "red";
    btn.style.color = "white";

    // removing border of the button
    btn.style.border = "none";

    // changing the cursor on button to pointer
    btn.style.cursor = "pointer";

    // appending the button to the app div
    app.appendChild(btn);
}, 2000)


// creating mutationObserver object, that adds click eventListener to the child of app div(button) so that upon clicking it we can se0 boxes on boxContainer
const observer = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {

        // here we check if in the added node we have a node that is strictly equal to btn, if so we assign click eventlistener such that upon clicking the button a box is formed at the boxContainer.
        mutation.addedNodes.forEach(
         (node) => {
                if (node === btn) {
                    node.addEventListener(
                        'click', () => {
                            // on click of button, we create a div and assign styles to it and finally append it to the boxContainer
                            const box = document.createElement('div');
                            box.style.width = "400px";
                            box.style.height = '400px';
                            box.style.backgroundColor = selectColor();
                            box.style.margin = "20px";
                            box.style.padding = "20px";
                            boxContainer.appendChild(box);
                        })
                }
            }
        )
    })


})

// this observes the app container for its direct child being added or removed
observer.observe(app, {
    childList: true,
})
