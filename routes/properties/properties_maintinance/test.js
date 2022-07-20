
// F`a`ctory Function for creating object
function createCircle(radius) {
    return {
        radius,
        draw: function () {
            console.log('Draw' + radius);
        }
    }
}



//Constructor Function to create object
function Circle(radius) {
    this.radius = radius;
    let defaultLocation = { x: 5, y: 10 }; // private property
    let compute = function () {          // private method
        // ......
    }
    this.draw = function () {
        // console.log('draw');
        console.log(defaultLocation);

    }

    //define Setters and getters for the private property location
    /* Object.defineProperty(this, 'location',{
        get: function(){
            return location;
        },
        set: function(value){
            location = value;
        }
    }); */
}

// Adding/Removing Methods into the prototype (the original Object)
Circle.prototype.update = function(){
    this.radius = 50;
    console.log(this.radius, 'has been updated!');
}   


// const circle = createCircle(10);
// circle.draw();
const circle = new Circle(1);
// Circle.call(1);


//Adding removing property to an  object
circle.location = { x: 5 }; // First way
circle['location'] = { y: 10 };//Second way




//Remove Object from property
delete circle.location; //First way
delete circle['location'];//second way


//first way to iterate through all properties, include/execlude functions
for (let key in circle) {
    //console.log(key); // only property
    //console.log(key, circle[key]); //all  prpoerties with values
    if (typeof circle[key] !== 'function') {
        //console.log(key, circle[key]);// view only properties

    }
}
//Checking a property existence in an object properites
if ('radius' in circle) {
    //console.log('Circle has radius');
}

//Second way to get all keys
const keys = Object.keys(circle);
// console.log(keys);





function SW() {
    let duration = 0; //Private means user can't change it without getter or setter
    this.stop = true;
    this.start = false;
    this.reset = function(){
        duration = 0;
        
    }

    //Getter for the duration
    Object.defineProperty(this, 'duration', {
        get: function(){
            return duration;
        }
    });

    this.startCount = function () {
        if (this.start == true) {
            console.error('You have to stop the counter first');
        } else {
            this.start = true;
            this.stop = false;
            setInterval(function(){duration ++}, 1000);
            console.log('counter started');
        }
    }

    this.stopCount = function () {
        if (this.stop == true) {
            console.error('You have to Start the counter first');
        } else {
            this.stop = true;
            this.start = false;

        }
    }
}

const stw = new SW();

let obj = { value: 10 }
function increase(obj) {
    obj.value++;
}


increase(obj);

// console.log(obj);
/* ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;; */
/* ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;          Net Nenja        ;;;;;;;;;;;;;;;;;;;;;;;;;; */
/* ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;      Classes Consepts     ;;;;;;;;;;;;;;;;;;;;;;;;;; */
/* ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;; */

/* 

class User{

    constructor(userName, email){
        this.userName = userName;
        this.email = email;
        this.score = 0;
    }
    login(){
        console.log(this.email, 'has logged in!');
        return this;
    }

    logout(){
        console.log(this.email, 'has logged out!')
        return this;
    }   
    updateScore(){
        this.score ++;
        console.log(this.email, ' Score is updated it is now', this.score);
        return this;
    }

}

class Admin extends User{
    //check the user 
    checkUser(user){

    }
    deleteUser(user){
        users = users.filter( u => {return u.email != user.email}) // if return true will keep the user/ flase will remove the user
    }
}
var userOne = new User("mo", 'm@mail.com');
var userTwo = new User("Ali", "ali@mail.com");



// userOne.login().updateScore().updateScore().logout(); //Method Chaining

var admin = new Admin("admin", "Mo@hjuzati.com");
var users = [userOne, userTwo, admin];
admin.deleteUser(userTwo);
console.log(users);

*/


// Building the class and inheretance with objects instead of the classes

function UserC(email, name){
    this.email = email;
    this.name = name;
    this.online = false;
}

UserC.prototype.login = function(){
    this.online = true;
    console.log(this.email, ' Has Logged IN!');
}

UserC.prototype.logout = function(){
    this.online = false;
    console.log(this.email, ' Has Logged Out!');
}

function AdminC(...args){
    // console.log(args);
    UserC.apply(this, args);
    this.role = 'super admin';
}

//Adding the User Class added methods to the admin class
AdminC.prototype = Object.create(UserC.prototype);
//Ading new Function to admin 

AdminC.deleteUser = function(user){
    usersC = usersC.filter( u =>{return u.email != user.email});
}
 

var user1 = new UserC('new@user.com', 'new');
var user2 = new UserC('mohammed@gmail.com', 'Mohammed');
var admin1 = new AdminC('Hazim@hjuzati.com', 'hazim');

usersC = [user1, user2, admin1];
// admin1.deleteUser(user2);



 



























