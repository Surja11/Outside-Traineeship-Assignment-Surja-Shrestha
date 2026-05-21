const inputs = document.getElementsByTagName('input');
const checkboxes = Array.from(inputs).filter(input => input.type === 'checkbox');

checkboxes.forEach((checkbox)=>{
    checkbox.addEventListener('keypress',(e)=>{
        if(e.key == "Enter"){
            e.preventDefault();
            checkbox.checked = !checkbox.checked
        }
    })
})