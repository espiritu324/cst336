/*global $*/

var randomNumber = Math.floor(Math.random() * 99) + 1;
var guessCount = 0;
var gamesWon = 0;
var gamesLost = 0;

console.log(randomNumber);

$("#reset").hide();   
$("#previousGuesses").html("Previous Guesses: ");
$("#lastResult").html("Last Result: ");
$("#guesses").html("Guesses So Far: " + guessCount); 
$("#gamesWon").html("Games Won: " + gamesWon);
$("#gamesLost").html("Games Lost: " + gamesLost);

$(".guessSubmit").on("click", checkGuess);
$("#reset").on("click", resetGame);

function checkGuess(){
    
    if(isNaN($("#guessField").val())){
        alert("You didn't enter a number!");
        $("#guessField").val("");
        $("#guessField").focus(); 
        return;
    }
    
    var userGuess = Number($("#guessField").val());
    
    if(userGuess > 99 || userGuess < 1){
        alert("Number is out of range!");
        $("#guessField").val("");
        $("#guessField").focus(); 
        return;
    }
    
    if(userGuess === randomNumber){
        $("#lastResult").html("Congrats! You got it right!");
        $("#lastResult").css("background-color", "#00c957");
        $("#lowOrHi").html("");
        gamesWon++;
        setGameOver();
    } else if(guessCount === 7) {
        $("#lastResult").html("Sorry! You lost!");
        $("#lowOrHi").html("");
        gamesLost++;
        setGameOver();
    } else {
        $("#lastResult").html("Wrong!");
        $("#lastResult").css("background-color", "#d61d1d");
        
        if(userGuess < randomNumber){
            $("#lowOrHi").html("Last guess was too low!");
        } else {
            $("#lowOrHi").html("Last guess was too high!");
        }
    }
    guessCount++;
    $("#previousGuesses").append(userGuess + " ");
    $("#guesses").html("Guesses So Far: " + guessCount);
    $("#guessField").val("");
    $("#guessField").focus(); 
}

function setGameOver(){
    $("#guessField").prop("disabled", true); // guessField.disabled = true;
    $("#guessSubmit").prop("disabled", true); // guessSubmit.disabled = true;
    $("#gamesWon").html("Games Won: " + gamesWon);
    $("#gamesLost").html("Games Lost: " + gamesLost);
    $("#reset").show();
}
function resetGame(){
    guessCount = 0;
   
    $("#reset").hide();
    $("#guessField").prop("disabled", false); // guessField.disabled = false;
    $("#guessSubmit").prop("disabled", false); // guessSubmit.disabled = false;
    $("#guessField").val("");
    $("#guessField").focus();
    $("#lastResult").css("background-color", "white");
    
    $("#previousGuesses").html("Previous Guesses: ");
    $("#lastResult").html("Last Result: ");
    $("#guesses").html("Guesses So Far: " + guessCount); 
    $("#gamesWon").html("Games Won: " + gamesWon);
    $("#gamesLost").html("Games Lost: " + gamesLost);
    randomNumber = Math.floor(Math.random() * 99) + 1;
    console.log(randomNumber);
}