// getting box1 and box2 from dom
const box1 = document.getElementById('box1');
const box2 = document.getElementById('box2');

// creating an object of IntersectionObserver that takes a callback and object that specifies root, rootMargin and threshold.
const observer = new IntersectionObserver((entries)=>{
    
    // looping over the entries, here the entries are the observed elements that just had a change. (in this case it consist of element that crossed 0.6 threshold at this point)
    entries.forEach((entry)=>{

        // if the entry is visible in the viewport(viewport here because we have assigned root as null, we make it opaque and rotate them)
        if (entry.isIntersecting){
           
                entry.target.style.opacity = "1";
                entry.target.style.transform = "rotate(90deg)";

            // since box1 should be rotating only once, we unobserve it right after making it opaque
            if (entry.target===box1){
                observer.unobserve(box1);
            }
        }else{
            // if the box2 has left viewport, we reset the opacity and transformation. This causes the animation to be triggered each time box2 appears on the viewport
            if(entry.target===box2){
                entry.target.style.opacity = "0";
                entry.target.style.transform = "rotate(0deg)";
            }
        }
    })
},
{
    // root: null uses browsers viewport
    root:null,
    
    rootMargin : '0px', //no expansion or shrinking of the viewport boundary

    threshold: 0.6, //the code inside entry.isIntersecting triggers as soon as 60% of our box arrives or leaves the viewport

})


// this line observers box1 and box2
observer.observe(box1);
observer.observe(box2);