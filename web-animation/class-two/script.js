 // selecting all the boxContainers which contains boxes to be animated at once.
    const boxContainers = Array.from(document.querySelectorAll(".box-container"));

    // selecting the textContainers so it can be animated when appeared in viewport
    const textContainers = Array.from(document.querySelectorAll(".text-container"));


    // queue that makes sure animation happens one container at a time
    let transformedQueue = [];
    // flag to make sure only animation on multiple box container donot happen at once
    let isAnimating = false;

    function checkQueue() {

      // if other container is animating or there is the queue is empty return
      if (isAnimating || transformedQueue.length === 0) return;

      //set animating flag to true
      isAnimating = true;

      // take the first container in queue
      const containerIndex = transformedQueue.shift();
      const container = boxContainers[containerIndex];

      // if an already animated container calls checkQueue,  make the flag false and call checkQueue again for grabbing next container in queue
      if (container.dataset.animated === "true") {
        isAnimating = false;
        checkQueue();
        return;
      }

      // set animated dataset to true
      container.dataset.animated = "true";

      // take all the boxes of the box container and add the class for animation
      const boxes = Array.from(container.querySelectorAll(".box"));
      boxes.forEach((box) => box.classList.add("box-animation"));


      // taking lastBox and adding transitionend listener to it, so that after it ends we can all checkQueue again to animate next container in queue
      const lastBox = boxes[boxes.length - 1];
      lastBox.addEventListener(
        "transitionend",
        (e) => {
          if (e.propertyName !== "transform") return;
          isAnimating = false;
          checkQueue();
        },
        { once: true },
      );
    }


    //   intersection observer that checks if the boxContainer arrived in the viewport
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const index = boxContainers.indexOf(entry.target);

            // Add to queue if not already there or animated
            if (
              !transformedQueue.includes(index) &&
              entry.target.dataset.animated !== "true"
            ) {
              transformedQueue.push(index);
              transformedQueue.sort((a, b) => a - b); // sorting the queue
            }

            checkQueue();
          }
        });
      },
      { root: null, rootMargin: "0px", threshold: 0 },
    );


    // intersection observer that observes text-containers as it appears on screen so that they can be animated
    const textObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("text-animation");
            textObserver.unobserve(entry.target); 
          }
        });
      },
      { root: null, rootMargin: "0px", threshold: 0.3 }
    );


    //   observing each box containers and text containers
    boxContainers.forEach((boxContainer) => observer.observe(boxContainer));
    textContainers.forEach((container) => textObserver.observe(container));
