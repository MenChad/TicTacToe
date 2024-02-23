<?php
system('clear');
$array = array( 1,"hello",2,"world",3, "hola",4, "mundo");
    // position du tableau
    // echo sizeof($array) . "\n" ;  
    // echo count($array) . "\n" ;

    // echo $array[1];


    $myArray = [];  // Creation d'un tableau vide

    // Rajouter une valeur à son tableau
    array_push($myArray, "First value");
    array_push($myArray, "Second value");
    
    // Afficher le tableau 
    //print_r($myArray);
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*Tic Tac Toe */



// Initialize the Board 
$plateau = array(
    array('-', '-', '-'),
    array('-', '-', '-'),
    array('-', '-', '-')
);


$Player1 = 'X';

// This function Display the Board
function Afficher($plateau)
{
    for ($ligne = 0; $ligne < 3; $ligne++) {
        for ($col = 0; $col < 3; $col++) {
            echo $plateau[$ligne][$col] . " ";
        }
        echo "\n";
    }
}
//This function checks if all condition required to Win a play
function Win($plateau , $Player1) {

    //Checks the Winner in line
    for ($ligne = 0; $ligne < 3; $ligne ++){
    if ($plateau [$ligne][0] == $Player1 && $plateau[$ligne][1]== $Player1 && $plateau[$ligne][2] == $Player1){
        return true;
   }
}


   //Checks the Winner in column
   for ($col = 0; $col  < 3; $col  ++){
    if ($plateau [0][$col] == $Player1 && $plateau [1][$col]== $Player1 && $plateau [2][$col]== $Player1){
        return true;
   }
}
   //Checks the Winner in diagonal
    if($plateau [0][0] == $Player1 && $plateau [1][1] == $Player1 && $plateau [2][2] == $Player1) {
        return true;
    }
    if($plateau [0][2] == $Player1 && $plateau [1][1]== $Player1 && $plateau [2][0]== $Player1) {
        return true;
    }
    return false ;
}
//check if the game is a draw
function Draw($plateau){
    for ($ligne = 0; $ligne < 3; $ligne++) {
        for ($col = 0; $col < 3; $col++) {
            if ($plateau[$ligne][$col] == '-') {
                return false;
            }
        }
    }
    return true;
}




while (true) {
    Afficher($plateau);

    // player choose his move
    $input = readline("Player $Player1, à ton tour (ligne[1-3] column[1-3]): ");
    $move = explode(' ', $input);
    $ligne = intval($move[0]) - 1;
    $col = intval($move[1]) - 1;




    //check the input of the player
   if ($ligne < 0 || $ligne > 2 || $col < 0 || $col > 2 || $plateau[$ligne][$col] != '-') {
    echo "Ce choix est invalide \n" ;
    continue;
   }

   $plateau[$ligne][$col] = $Player1;


    // Display winning message for the player whose one the game
       if (Win($plateau, $Player1)) {
        Afficher($plateau);
        echo "Le joueur " . $Player1 . " est gagnant\n";
        break;
    }

    // Display a message if the game is a draw
    if (Draw($plateau)) {
        Afficher($plateau);
        echo "C'est une égalité!\n";
        break;
    }

    //Change from player1 to player2
    $Player1 = ($Player1 == "X") ? "O" : "X";
    }

?>
