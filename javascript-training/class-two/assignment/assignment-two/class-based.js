// creating a User class that contains constructor and functions
export class User {
    // constructor for initializing variables at the time of object creation
    // using object destructuring and rest operator here to make sure values get assigned to right variables.
    constructor({age,...user}) {
        this.name = user.name;
        this.age = age;
        this.address = user.address;
        this.city = user.city;
    }

    // method to show User details
    // Using template strings for better and easier formatting
    showUser() {
        console.log("The user has following information:");
        console.log(`Name:${this.name} Age:${this.age} Address:${this.address} City:${this.city} `);
    }

    // function that counts down from 10 to 0. 
    // each counter decreases in time specified, if not specified takes default value which is 1000milliseconds
    countdown(sec = 1000) {

        // returning promise so that the info of user1 gets displayed after counter when promise gets resolved.
        return new Promise((resolve)=>{
            let count = 10;
            // storing intervalId so that setInterval can be cleared after count reaches 0
            let intervalId = setInterval(() => {
            console.log(count);
            count--;
            if (count < 0){
                clearInterval(intervalId);
                resolve();}
        }, sec);
        
        })
       
    }

    // creating a promise that will be resolved after 5 secon
    wait(){
    return new Promise(resolve => setTimeout(resolve, 5000));
    };

}


// asynchronous function to run the countdown and timeout to display user accordingly
export async function displayUser(users) {
  
    // using object destructuring for initializing user1 and user2
    const {user1, user2} = users;

      // run the countdown for user1
    await user1.countdown();
    // show details of user1
    user1.showUser();

    // wait for timeout of 5seconds
    await user1.wait();
    // dispaly details of user2 after 5 seconds
    user2.showUser();
}
