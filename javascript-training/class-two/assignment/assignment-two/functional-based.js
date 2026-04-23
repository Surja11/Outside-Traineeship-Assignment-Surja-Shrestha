

export const user1 = { name: "Harry", age: 24, address: "Jhamsikhel", city: "Lalitpur" };
export const user2 = { name: "Ram", address: "Boudha", city: "Kathmandu" };

// showUser(user1) using rest operator;
export function showUser({name,age,...user }) {
    // using template string to display user details
    console.log(`name:${name} age:${age} address:${user.address} city:${user.city}`);
}

// countdown from 10 to 0
export function countdown(sec = 1000) {

    // returning promise so that when we call showUser, it runs only after promise is resolved or rejected
    return new Promise((resolve) => {
        let count = 10;

        // storing intervalId so that when the count reaches 0, we can stop the countdown
        let intervalId = setInterval(() => {
            console.log(count);
            count--;
            if (count < 0) 
            {
                clearInterval(intervalId);
                // promise is resolved when we reach countdown 0
                resolve();
            }
        }, sec);
    })
}

// return a promise so that we can show user2 after 5 seconds
export function wait()
{ return new Promise((resolve)=>setTimeout(resolve, 5000))};

// asynchronous function that runs coundown and timeout operations
// using object destructuring
// export async function displayUser({user1, user2}) {

//     // call the countdown function
//     await countdown();
//     // after countdown display the details of user1
//     showUser(user1);

//     // wait for 5 seconds
//     await wait();
//     // display the details of user2
//     showUser(user2)
// }

// displayUser({user1,user2});


// using promise chaining, call the countdown and after it resolves show user1 and then call wait,and only after wait resolves show user2 
countdown().then( ()=>{ 
    showUser(user1);
    return wait();})
    .then(()=>{
    showUser(user2);})
    .catch((err)=>{
    console.log("Something went wrong"+err);
    });