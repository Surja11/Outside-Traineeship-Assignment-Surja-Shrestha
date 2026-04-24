import * as classUser from './class-based.js'
import * as functionUser from './functional-based.js'

// creating instance of User which is user1
const user1 = new classUser.User({ name: "Harry", age: 24, address: "Jhamsikhel", city: "Lalitpur" });

// creating instance of User which is user2
const user2 = new classUser.User({ name: "Ram", address: "Boudha", city: "Kathmandu" });

// creating objects for function based
const user3 = { name: "Harry", age: 24, address: "Jhamsikhel", city: "Lalitpur" };

const user4 = { name: "Ram", address: "Boudha", city: "Kathmandu" };


// run method for presenting the results well
async function runMethods(){

    console.log("class-based.js");
    // calling displayUser of class based 
    await classUser.displayUser({user1, user2});

    console.log("functional-based.js");
    functionUser.displayFunctionalUser(user3,user4);

}

runMethods();