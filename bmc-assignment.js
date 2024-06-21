//=> Solve these questions.
//======================================================================
// Problem 1: Write a function to calculate the area of a triangle.
//======================================================================

//START main function calcTriangleArea
function calcTriangleArea(options) {
    //use object for catch dimensional value
    const { a, b, c, angleL, base, height, method } = options;

    // Calculation by choice START
    // typeof is use for check right value and prevent empty value
    //when user give base and height
    if (
        method === 'baseHeight' &&
        typeof base === 'number' &&
        typeof height === 'number'
    ) {
        const calcArea = 0.5 * base * height;
        const smartArea = calcArea.toFixed(2);
        const print = 'Area : ' + smartArea;
        return print;
        //when user give 3 sides width
    } else if (
        method === 'threeSides' &&
        typeof a === 'number' &&
        typeof b === 'number' &&
        typeof c === 'number'
    ) {
        const s = (a + b + c) / 2;
        const calcArea = Math.sqrt(s * (s - a) * (s - b) * (s - c));
        const smartArea = calcArea.toFixed(2);
        const print = 'Area : ' + smartArea;
        return print;
        //when user give 2 sides and 1 angle
    } else if (
        method === 'twoS0neA' &&
        typeof a === 'number' &&
        typeof b === 'number' &&
        typeof angleL === 'number'
    ) {
        const radians = (Math.PI / 180) * angleL;
        const calcArea = 0.5 * a * b * Math.sin(radians);
        const smartArea = calcArea.toFixed(2);
        const print = 'Area : ' + smartArea;
        return print;
        //when user give same or equal width of 3 sides
    } else if (method === 'same3WidthSides' && typeof a === 'number') {
        const calcArea = (Math.sqrt(3) / 4) * a ** 2;
        const smartArea = calcArea.toFixed(2);
        const print = 'Area : ' + smartArea;
        return print;
        //when user give one 90 degree angle with base and height
    } else if (
        method === 'a90DAngle' &&
        typeof a === 'number' &&
        typeof b === 'number'
    ) {
        const calcArea = 0.5 * a * b;
        const smartArea = calcArea.toFixed(2);
        const print = 'Area : ' + smartArea;
        return print;
    }

    // If none of the methods match or give empty or others  return message
    return "Please, choose right option according your exist data and give input valid number. Don't any sign or symbol character.";
}
//END main function calcTriangleAre

//   // Test 01 : base and height
//   const area = calcTriangleArea({ base: 3, height: 4, method: 'baseHeight' });
//   // Test 02 :3 sides width
//   const area = calcTriangleArea({ a: 3, b: 4, c: 5, method: 'threeSides' });
//   // Test 03 : 2 sides and 1 angle
//   const area = calcTriangleArea({ a: 3, b: 4, angleL: 80, method: 'twoS0neA' });
//   // Test 04 : same or equal width of 3 sides
//   const area = calcTriangleArea({ a: 3, method: 'same3WidthSides' });
// // Test 05 : 90 degree angle with base and height
const area = calcTriangleArea({ a: 3, b: 4, method: 'a90DAngle' });

console.log(area);
//======================================================================
//======================================================================
// Problem 2: Write a function to convert degrees to radians.
//======================================================================

function degreesToRadians(degrees) {
    // Check idegrees is a valid number
    if (typeof degrees !== 'number' || isNaN(degrees)) {
        return 'Please provide a valid number for degrees. No need to add degree sign symbol.';
    }

    // Convert degrees to radians
    const radians = degrees * (Math.PI / 180);
    const smartRadians = radians.toFixed(2);
    const print =
        degrees + ' degrees is approximately ' + smartRadians + ' radians.';
    return print;
}

const degrees = 45;
console.log(degreesToRadians(degrees));
//======================================================================
//======================================================================
// Problem 3: Create a function calculateFactorial that takes a number and returns its factorial.
//======================================================================

// START Mother function
function calcFactNum(factNumber) {
    //need to check valid number start
    if (typeof factNumber === 'number') {
        if (factNumber < 1) {
            // default factorial number for zero "0"
            let x = factNumber;
            let mainPrint = 'The factorial number of ' + x + ' is ' + 1;
            return mainPrint;
        } else {
            // when it is not zero, pass to main function
            let x = factNumber;
            return calcFactNumSum(x);
        }
    } else {
        return 'Please provide valid numbers.';
    } //need to check valid number end

    //start child but main function
    function calcFactNumSum(x) {
        let sum = 1;
        let childPrint;

        //by for loop start
        for (i = x; i >= 1; i--) {
            sum *= i;
            childPrint = 'The factorial number of ' + x + ' is ' + sum;
        } //by for loop end

        // //by while loop start
        // while (x >= 1) {
        //   sum *= x;
        //   childPrint = 'The factorial number of ' + x + ' is ' + sum;
        //   x--;
        // } //by while loop end

        // //by d0...while loop start
        // do {
        //   sum *= x;
        //   childPrint = 'The factorial number of ' + x + ' is ' + sum;
        //   x--;
        // } while (x >= 1);
        // //by do...while loop end

        return childPrint;
    }
    //end child but main function
} // END Mother function
const number1 = 10;
console.log(calcFactNum(number1));

//======================================================================
//======================================================================
// Problem 4: Create a function isPrime that takes a number as a parameter and returns true if it's a prime number, and false otherwise.
//======================================================================
/**
 * 
 * 1st Method:
 * Each prime number can be written as 6n + 1 or 6n – 1 (with the exception of the products of indivisible numbers, for example 2, 3, 5, 7, 11), where n is a characteristic number an n > 3.
 * 
 * 2nd Method:
 * For prime numbers > 40, the below formula is applied.
 * n2 + n + 41, where n = 0, 1, 2, … .., 39
 * 
 * In order to identify, whether a number is prime number or not, we need to find the factors of that number.
 * 
 */
function isPrime(n) {
    let forPrint;
    if (n <= 1) {
        forPrint = n + ' is prime: ' + false;
        return forPrint;
    }
    
    if (n <= 3) {
        forPrint = n + ' is prime: ' + true;
        return forPrint;
    }
    
    if (n % 2 === 0 || n % 3 === 0) {
        forPrint = n + ' is prime: ' + false;
        return forPrint;
    }
    
    for (let i = 5; i * i <= n; i += 6) {
        if (n % i === 0 || n % (i + 2) === 0) {
            forPrint = n + ' is prime: ' + false;
            return forPrint;
        }
    }

    forPrint = n + ' is prime: ' + true;
    return forPrint;
}

const testNumbers = 5;
console.log(isPrime(testNumbers));
//======================================================================
//======================================================================
// Problem 5: Create a function mergeArrays that takes two arrays as parameters and returns a new array that merges both arrays.
//======================================================================

function mergeArrays(a, b) {
    if (a != '' && b != '') {
        if (a instanceof Array && b instanceof Array) {
            return a.concat(b);
        } else {
            return 'Please, make sure with valid array.';
        }
    } else {
        return 'Data is like empty or others.';
    }
}

const array1 = [1, 2, 3, 4, 9, 10];
const array2 = [4, 5, 6, 7, 8, 11, 12];
// const array1 = [];
// const array1 = [1, 2, 3, 4, 5, 6];
// const array2 = [7, 8, 9, 10, 11, 12];
const mergedArray = mergeArrays(array1, array2);
console.log(mergedArray);
//======================================================================
//======================================================================
// Problem 6: Create a function isLeapYear that takes a year as a parameter and returns "This is a leap year" if it's a leap year, and "Not Leap year" otherwise.
//======================================================================

function findLeapYear(myYear) {
    if (Number.isInteger(myYear)) {
        if ((myYear % 4 === 0 && myYear % 100 !== 0) || myYear % 400 === 0) {
            console.log(myYear + ' is a leap year.');
            return true;
        } else {
            console.log(myYear + ' is not a leap year.');
            return false;
        }
    } else {
        return 'Please, input a valid integer number.';
    }
}

console.log(findLeapYear(myYear));
//======================================================================
//======================================================================
// Problem 7: Create a function removeDuplicates that takes an array and returns a new array with duplicates removed.
//======================================================================

function removeDuplicates(myNumbers) {
    const uniqueArray = [];

    for (let i = 0; i < myNumbers.length; i++) {
        if (!uniqueArray.includes(myNumbers[i])) {
            uniqueArray.push(myNumbers[i]);
        }
    }

    return uniqueArray;
}

const originalArray = [1, 2, 2, 3, 4, 4, 5];
console.log(removeDuplicates(originalArray));

// function removeDuplicates(reArranger) {
    
//     const uniqueData = new Set(reArranger);
    
//     const finalArray = Array.from(uniqueData);

//     return finalArray;
// }


// const primaryArray = [1, 2, 2, 3, 4, 4, 5];
// console.log(removeDuplicates(primaryArray));
//======================================================================
//======================================================================
// Problem 8: Create a function convertToCelsius that takes a temperature in Fahrenheit and returns the equivalent temperature in Celsius.
//======================================================================

function convertToCelsius(fahrenheit) {
    if (fahrenheit != '' || typeof fahrenheit === 'number') {
        const celsius = ((fahrenheit - 32) * 5) / 9;
        const print =
            'The equivalent temperature of ' +
            fahrenheit +
            '°F is ' +
            celsius +
            '°C.';
        return print;
    } else {
        return 'Please, input valid number without any sign symbol.';
    }
}

const fahrenheitTemp = 68;

console.log(convertToCelsius(fahrenheitTemp));
//======================================================================
//======================================================================
// Problem 9: Write a function to find the maximum of five numbers.
//======================================================================

function findHighestValue(myNumbers) {
    let forPrint = "";
    myNumbers.sort(function (a, b){return b - a;});
    
    let storage5Num = "";
    for (let i = 0; i < 5; i++) {
        storage5Num += myNumbers[i] + ', ';
    }

    // let storage5Num = [];
    // for(let i = 0; i <5; i++){
    //     storage5Num.push(myNumbers[i]);
    // }

    //let storage5Num = myNumbers.slice(0,5);


    forPrint ='The maximum of the five numbers is:' + myNumbers[0] + '. The highest value of the five numbers is:' + storage5Num;
    return forPrint;
}

const numberStorage = [8, 15, 3, 10, 21, 5, 17];
// const numberStorage = [100, 1, 10, 11, 101, 110, 111];
console.log(findHighestValue(numberStorage));
//======================================================================
//======================================================================
// Problem 10: Create a function called evenOdd() that takes a string as a parameter. Now you have to give the output based on the total number of characters in your String. The output will be 'even' or 'odd'. [ Input: ‘JavaScript’ Output: even, Input: ‘Hello’ Output: odd]
//======================================================================

function evenOdd(myString) {
    if (myString != '') {
        let i = myString.length;
        if (i % 2 === 0) {
            let print = myString + ' length is ' + i + '. So it is even.';
            return print;
        } else {
            let print = myString + ' length is ' + i + '. So it is odd.';
            return print;
        }
    } else {
        return 'Please, input a word.';
    }
}

const myWord = 'JavaScript';
//const myWord = 'Hello';
console.log(evenOdd(myWord));
//======================================================================
//======================================================================

// => Answer any 4 questions.
//======================================================================
// 1. Explain the difference between 'if...else' and 'switch' statements for conditional logic.
//======================================================================
/**
 * (1) if...else is only for one value one position one or multiple condition checker base. But switch is use for one value multiple position single checking option.
 * (2) if...else is use for one stop run, but switch is use for multiple stop.
 * (3) if...else is use like boolean, it return one true or false. switch is also like boolean, but it is block base.
 * (4) if...else can't change his variable value. switch also can't change his variable value. But it can compare with one more value.
 * (5) if...else didn't need break or continue. But switch need break to stop and out.
 * (6) if...else is flexible for use logic. switch is not flexible.
 * (7) if...else last step is else and  switch last step is default.
 * (8) Syntax
 * if (condition) {
    //  block of code to be executed if the condition is true
  }

 *  switch(expression) {
    case x:
      // code block
      break;
    case y:
      // code block
      break;
    default:
      // code block
  }
 *(9) example:
 *  if (hour < 18) {
    greeting = "Good day";
  }

 *  switch (new Date().getDay()) {
    case 0:
      day = "Sunday";
      break;
    case 1:
      day = "Monday";
      break;
    case 2:
       day = "Tuesday";
      break;
    case 3:
      day = "Wednesday";
      break;
    case 4:
      day = "Thursday";
      break;
    case 5:
      day = "Friday";
      break;
    case 6:
      day = "Saturday";
  }
 *
 */
//======================================================================
//======================================================================
// 2. What is JavaScript, and what is its primary purpose in web development?
//======================================================================
/**
 * JavaScript is a script base programming language for published web page or software. 
 * 
 * primary purpose in web development
 * use for runtime hide and show, delete or print
 * immidiate client response
 * logical or conditional expression
 * html control
 * css control
 */
//======================================================================
//======================================================================
// 3. Explain the difference between var, let, and const when declaring variables in JavaScript.
//======================================================================
/**
 * Redeclare
 * var can but let & const can't do it.
 * 
 * Reassign
 * var & let can but const can't.
 * 
 * Hoisted
 * only can var.
 * 
 * Binds
 * only can var.
 * 
 * block / scope
 * var have no scope but let & const have scope
 * 
 * version
 * var is old version for varible declare. let & const is new version for varible declare.
 * 
 * secure
 * var is create problem for secure work. let & const solve this unsecure problem.
 * 
 */
//======================================================================
//======================================================================
// 4. Explain the concept of "scope" in JavaScript and the difference between global and local scope.
//======================================================================
/**
 * scope is like area of work or working area. it is important for variable. scope can generate limit of use of every variable.
 * 
 * 3 type scope is in JavaScript
 * block
 * function
 * global
 * 
 * 
 * difference between global and local scope
 * 
 * defination
 * when variable declare outside of function or {}, then that is global variable. and it can access from anywhere in a JavaScript program. this variable working area is called global scope.
 * 
 * when variable declare inside of function or {}, then that is local variable. and it can't access from anywhere in a JavaScript program. It access only inside in function or {}. this variable working area is called local scope.
 * 
 * function and block is the example of local scope.
 * 
 */
//======================================================================
//======================================================================

// 5. What is the difference between "null" and "undefined" in JavaScript?
//======================================================================
/**
 * undefined, means variable is declared but value isn't assigned. next time value can assigned it.
 * 
 * null, means variable is declared also value assigned but value is nothing. next time value can't assigned it. It is most interesting matter about if data type. yes, it's type is object.
 */
//======================================================================
//======================================================================
// => Assignment Deadline + Marks:
// 1. Each question value is 5 marks.
// 2. The deadline to submit your assignment is October 25, 2023, at 8:00 PM.