<?php

// Game Rules. 
// Add more rules here
$gameRules = [
    'rock' => ['scissors'],
    'paper' => ['rock'],
    'scissors' => ['paper']
];

// Valid Moves
$moves = ['rock', 'paper', 'scissors'];

// Get player turn
function getPlayerTurn(string $player1Move, array $player2, array $gameRules): string {

    $player2Move = $player2[array_rand($player2)]; //randomize player2 moves
    //echo "{$player2Move}\n";

    if ($player1Move === $player2Move) {
        return 'draw';
    }

    return in_array($player2Move, $gameRules[$player1Move]) ? 'player1' : 'player2'; //return winner
}

/**
* @param int $rounds
* @param string $player1Move
* @param array $player2Move
* @param mixed $rules
* @return void
 */
function playRockPaperScissors(int $rounds = 100, string $player1Move = 'rock', array $player2Moves, $rules): void{

    $gameStats = [
        'player1' => 0, 
        'player2' => 0, 
        'draw' => 0
    ];
    
    // Play 100 rounds
    for ($i = 0; $i < $rounds; $i++) {

        $result = getPlayerTurn($player1Move, $player2Moves, $rules);

        $gameStats[$result]++;
    }
    
    // Display results
    echo "\nResults:\n\n";
    echo "Player 1 has {$gameStats['player1']} wins\n";
    echo "Player 2 has {$gameStats['player2']} wins\n";
    echo "Draws: {$gameStats['draw']}\n\n";
}

// Start game
playRockPaperScissors(100, 'rock', $moves, $gameRules);

?>