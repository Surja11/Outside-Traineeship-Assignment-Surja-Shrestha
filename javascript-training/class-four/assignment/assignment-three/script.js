const app = document.getElementById('app');
const boxContainer = document.getElementById('boxContainer');

app.style.margin = "20px";

boxContainer.style.display = "flex";
boxContainer.style.flexWrap = 'wrap';

const colors = ['red','blue','purple','green','beige', 'black', 'yellow','orange','brown', 'cornflowerblue','cyan', 'magenta', 'cadetblue','forestgreen', 'indigo', 'gray','darkblue','deepskyblue']

 btn = document.createElement('button');

setTimeout(()=>{
 btn.textContent = "Add Box";
 btn.style.fontSize = "20px";
 btn.style.padding = "15px 40px";
 btn.style.backgroundColor  = "red";
 btn.style.color = "white";
btn.style.border = "none";
btn.style.cursor = "pointer";
 app.appendChild(btn);
},2000)


const observer = new MutationObserver((mutations)=>{
mutations.forEach((mutation)=>{
    mutation.target.addEventListener('click',()=>{
        const box = document.createElement('div');
        box.style.width= "400px";
        box.style.height = '400px';
        box.style.backgroundColor = colors[Math.floor(Math.random()*colors.length)];
        box.style.margin="20px";
        box.style.padding = "20px";
        boxContainer.appendChild(box);
    })
})
})

observer.observe(app, {
    childList: true,
})
