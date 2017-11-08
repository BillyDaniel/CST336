

$(".Sort").on("click", function() {
    var numbers=[];
    numbers.push(document.getElementById("one").value);
    numbers.push(document.getElementById("two").value);
    numbers.push(document.getElementById("three").value);
    numbers.sort();
    console.log(numbers[0]);
    console.log(numbers[1]);
    console.log(numbers[2]);


    console.log(document.getElementById("one").value);
    console.log(document.getElementById("two").value);
    console.log(document.getElementById("three").value);

    if(numbers[0]<1 || numbers[2]>50){
        document.getElementById("check").innerHTML = "Error Numbers Are Not From 1 and 50!";
        document.getElementById("sortedArray").innerHTML = "";
        return;
    }
    if(numbers[0]==numbers[1] && numbers[1]==numbers[2]){
        document.getElementById("check").innerHTML = "All Numbers are equal";
    }
    else{
        document.getElementById("check").innerHTML = "The biggest number is " + numbers[2];
    }
    
    document.getElementById("sortedArray").innerHTML = "The numbers in ascending order are: " + numbers[0] + ", " + numbers[1] + ", "  + numbers[2];
    
    
});