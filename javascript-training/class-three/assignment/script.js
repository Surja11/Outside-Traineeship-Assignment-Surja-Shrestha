// declaring the itemsCount as 0 
let itemsCount = 0;
console.log(itemsCount);

// declaring intervalId for clearing timeout
let intervalId;

// eventListener that pops up the welcome modal 1 second after the window loads
window.addEventListener("load", () => {

 
    // after 1 sec, make both modal and overlay display to none.
    setTimeout(() => {
        document.getElementById("modal").style.display = "block";
        document.getElementsByClassName("overlay")[0].style.display = "block";
    }, 1000);

})

// getting elements from dom
const crossIcon = document.getElementsByClassName('cross')[0];
const clearBtn = document.getElementsByClassName('btn--clear')[0];
const toast = document.getElementById('toast');
const searchBox = document.getElementById('search');
const foundItems = document.getElementsByClassName('found-items')[0];
const listBox = document.getElementsByClassName('list')[0];
const unorderedList = document.createElement('ul');
const addBtn = document.getElementsByClassName('btn--add')[0];

// append unorderedList to listBox
listBox.appendChild(unorderedList);


// timeout function to be used for toast events
function timeout(action, sec) {
    setTimeout(() => {
        action.style.display = "none";
    }, sec)
}

// debounce function that searches the input after 1 sec of input halt 
function debounce() {
    clearTimeout(intervalId);

    intervalId = setTimeout(() => {
// taking the searchbox's value
        const searchValue = searchBox.value.trim().toLowerCase();
        // making an array from all the items of the list present
        const arrayItems = Array.from(document.getElementsByClassName('list-items'));

        // declaring a matchCount to keep track of no items found
        let matchCount = 0;

        // looping through the list items and checking if it contains the search value
        arrayItems.forEach((item) => {
            const card = item.closest('.list-card');
            // if it contains the search value displaying it and increasing the matchCount.
            if (item.textContent.toLowerCase().includes(searchValue)) {
                card.style.display = 'flex';
                matchCount++;
            } else {
                // if not, display set to none, so that user only sees the value that matches the search values
                card.style.display = 'none';
            }
        });

        // if matchCount is equal to 0, show no items found
        if (matchCount === 0 && arrayItems.length > 0) {
            foundItems.textContent = 'No items found!';
            foundItems.style.borderWidth="1px";
            foundItems.style.borderColor = "gray";
            foundItems.style.borderStyle = "dashed";
            foundItems.style.padding = "12px";
            foundItems.style.fontSize = "20px";
            foundItems.style.width = "48%";
            foundItems.style.textAlign = "center";
            foundItems.style.display = 'block';
            

        } else {
            foundItems.style.display = 'none';
        }

    }, 500);
}

// calling input eventlistener that runs debounce on input
searchBox.addEventListener("input", debounce);

// adding eventListener that sets display of welcome modal to none when clicked cross icon
crossIcon.addEventListener('click', () => {
    document.getElementById("modal").style.display = "none";
    document.getElementsByClassName('overlay')[0].style.display = "none";
})

// setting the itemscount
document.getElementsByClassName('count')[0].textContent = itemsCount;

//adding click eventListener to button so that items get added to the list
addBtn.addEventListener('click', () => {
    // take the input element that adds items
    const addItem = document.getElementById('add-items');
    // set value of the add item element to constant item
    const item = addItem.value.trim();

// if item is present, create li and button element and style them and place it in another div container
    if (item) {
        // set display of listBlock to block
        listBox.style.display = "block";
        const listCard = document.createElement('div');
        const listItem = document.createElement('li');
        const removeBtn = document.createElement('button');
        const prefix = '--';

// setting css
        listCard.style.width = "100%";
        listCard.style.borderStyle = "dashed";
        listCard.style.borderWidth = "1px";
        listCard.style.borderCollapse = "black";
        listCard.style.borderRadius = "10px";
        listCard.style.padding = "15px 5px 15px 25px";
        listCard.style.margin = "8px 0";
        listCard.style.display = "flex";
        listCard.style.justifyContent = "space-between";
        listCard.style.alignItems = "center";
        listCard.classList.add("list-card");

        removeBtn.textContent = 'Remove';
        removeBtn.classList.add("btn");
        removeBtn.style.padding = "8px 15px";


        listItem.textContent = `${prefix}${item}${prefix}`;
        listItem.style.listStyleType = "none";
        listItem.style.fontSize = "20px";
        listItem.classList.add('list-items');

// add the created elements as child
        unorderedList.appendChild(listCard);
        listCard.appendChild(listItem);
        listCard.appendChild(removeBtn);

        addItem.value = '';
        clearBtn.removeAttribute('disabled');
        // console.log('hi');
        console.log(itemsCount);

        itemsCount++;
        document.getElementsByClassName('count')[0].textContent = itemsCount;
        toast.style.display = "block";
        toast.textContent = "Item Added!";
        timeout(toast, 2000);
    }

    // get taskList and loop over it to give hover effects
    const taskList = document.getElementsByClassName('list-card');
    const taskArray = Array.from(taskList);
    console.log(taskArray);
    // use mouseenter and mouseover to give hover like effects
    taskArray.forEach((task) => {
        // on mouseenter, changing bg-color to gray
        task.addEventListener("mouseenter", () => {
            console.log("mouseenter worked");
            task.style.backgroundColor = "gray";
            task.style.cursor = "pointer";
        });
        // on mouseleave, reverting the backgroundColor
        task.addEventListener("mouseleave", () => {
            console.log("mouseleave happened");
            task.style.backgroundColor = "rgb(233, 231, 231)";
        })
    })

})

// event delegation to remove elements from the list
unorderedList.addEventListener('click', (e) => {

    if (e.target.classList.contains('btn') && e.target.textContent === 'Remove') {
        e.target.parentElement.remove();
        itemsCount--;
        document.getElementsByClassName('count')[0].textContent = itemsCount;
        toast.style.display = "block";
        toast.textContent = "Item Removed!";
        timeout(toast, 2000);

        if (unorderedList.children.length === 0) {
            listBox.style.display = "none";
            clearBtn.setAttribute('disabled', true);
        }
    }
})


// click eventListener on click to remove all items and make the button disabled
clearBtn.addEventListener('click', () => {
    listBox.innerHTML = '';
    toast.textContent = "All Items Cleared!";
    timeout(toast, 2000);
    itemsCount = 0;
    document.getElementsByClassName('count')[0].textContent = itemsCount;
    clearBtn.setAttribute('disabled', true);
})