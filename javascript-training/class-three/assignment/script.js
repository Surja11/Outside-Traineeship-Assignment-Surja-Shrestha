 let itemsCount = 0;
    console.log(itemsCount);




    window.addEventListener("load", () => {

        document.getElementById("modal").style.display = "block";
        document.getElementsByClassName("overlay")[0].style.display = "block";
        setTimeout(() => {
            document.getElementById("modal").style.display = "none";
            document.getElementsByClassName("overlay")[0].style.display = "none";
        }, 1000);

    })

    function timeout(action, sec) {
        setTimeout(() => {
            action.style.display = "none";
        }, sec)
    }
    const crossIcon = document.getElementsByClassName('cross')[0];
    const clearBtn = document.getElementsByClassName('btn--clear')[0];
    const toast = document.getElementById('toast');
    const searchBox = document.getElementById('search');


    let intervalId;
 
    const foundItems = document.getElementsByClassName('found-items')[0];
    function debounce() {
    clearTimeout(intervalId);

    intervalId = setTimeout(() => {
        const searchValue = searchBox.value.trim().toLowerCase();
        const arrayItems = Array.from(document.getElementsByClassName('list-items'));

        let matchCount = 0;

        arrayItems.forEach((item) => {
            const card = item.closest('.list-card');
            if (item.textContent.toLowerCase().includes(searchValue)) {
                card.style.display = 'flex';
                matchCount++;
            } else {
                card.style.display = 'none';
            }
        });

       
        if (matchCount === 0 && arrayItems.length > 0) {
            foundItems.textContent = 'No items found!';
            foundItems.style.display = 'block';
        } else {
            foundItems.style.display = 'none';
        }

    }, 500);
}

    searchBox.addEventListener("input",debounce);
    crossIcon.addEventListener('click', () => {
        document.getElementById("modal").style.display = "none";
    })

    const listBox = document.getElementsByClassName('list')[0];
        const unorderedList = document.createElement('ul');


    document.getElementsByClassName('count')[0].textContent = itemsCount;
    const addBtn = document.getElementsByClassName('btn--add')[0];
    addBtn.addEventListener('click', () => {
        const addItem = document.getElementById('add-items');
        const item = addItem.value.trim();
        listBox.appendChild(unorderedList);


        if (item) {
            listBox.style.display = "block";
            const listCard = document.createElement('div');
            const listItem = document.createElement('li');
            const removeBtn = document.createElement('button');
            const prefix = '--';


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


            unorderedList.appendChild(listCard);
            listCard.appendChild(listItem);
            listCard.appendChild(removeBtn);
            addItem.value = '';
            clearBtn.removeAttribute('disabled');
            console.log('hi');
            console.log(itemsCount);

            itemsCount++;
            document.getElementsByClassName('count')[0].textContent = itemsCount;
            toast.style.display = "block";
            toast.textContent = "Item Added!";
            timeout(toast, 2000);
        }

        const taskList = document.getElementsByClassName('list-card');
        const taskArray = Array.from(taskList);
        console.log(taskArray);
        taskArray.forEach((task) => {
            task.addEventListener("mouseenter", () => {
                console.log("mouseenter worked");
                task.style.backgroundColor = "gray";
                task.style.cursor = "pointer";
            });
            task.addEventListener("mouseleave", () => {
                console.log("mouseleave happened");
                task.style.backgroundColor = "rgb(233, 231, 231)";
            })
        })

    })
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



    clearBtn.addEventListener('click', () => {
        listBox.innerHTML = '';
        toast.textContent = "All Items Cleared!";
        timeout(toast, 2000);
        itemsCount = 0;
        document.getElementsByClassName('count')[0].textContent = itemsCount;
        clearBtn.setAttribute('disabled', true);
    })