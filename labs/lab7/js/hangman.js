var selectedWord = "";
var selectedHint = "";
var board = "";
var remainingGuesses = 6;
var words = [{word: "snake", hint: "It's a reptile"},
            {word: "monkey", hint: "It's a mammal"},
            {word: "beetle", hint: "It's an insect"}];
var randomInt = Math.floor(Math.random()*words.length);   
selectedWord= words[randomInt];


var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H',
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P',
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                
window.onload=startGame();

function startGame() {
    pickWord();
    initBoard();
    updateBoard();
    createLetters();
}
function initBoard() {
    for (var letter in selectedWord) {
        board += '_ ';
    }
}
function pickWord() {
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}
function updateBoard() {
    $("#word").empty();
    
    for(var letter of board){
        $("#word").append(letter);
        $("#word").append('');
    }
    $("#word").append("<br />");
    $("#word").append("<span class = 'hint'>Hint: "+ selectedHint + "</span>");
}
function createLetters() {
    for (var letter of alphabet) {
        let letterInput = '"' + letter + '"';
        $("#letters").append("<button class='btn btn-success letter' id='" + letter + "'>" + letter + "</button>");
    }
}

function updateWord(positions, letter){
    for(var pos of positions){
        board = replaceAt(board,pos,letter);
    }
    updateBoard();
}

function replaceAt(str,index,value){
    return str.substr(0,index) + value + str.substr(index +value.length);
}

function checkLetter(letter) {
    var positions = new Array();
    
    for(var i=0;i<selectedWord.length;i++){
        if(letter==selectedWord[i]){
            positions.push(i);
        }
    }
    if(positions.length>0){
        updateWord(positions,letter);
    } else {
        remainingGuesses--;
        $("#hangImg").attr("src","img/stick_"+ (6-remainingGuesses) + ".png");
        if(remainingGuesses<=0) {
            endGame(false);
        }
    }
}

function endGame(win){
    $("#letters").hide();
    
    if(win) {
        $('#won').show();
    } else {
        $('#lost').show();
    }
}

function disableButton(btn) {
    btn.prop("disable",true);
    btn.attr("class","btn btn-danger");
}

$(".letter").click(function(){
    console.log($(this).attr("id"));
});
$(".replayBtn").on("click", function() {
    location.reload();
});
$(".letter").click(function() {
    checkLetter($(this).attr("id"));
    disableButton($(this));
});


//CHECKS
console.log(selectedWord);
