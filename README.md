# Lucky 7 Game in PHP

The **Lucky 7** game is a dice game where you bet on the outcome of two dice. You can choose to bet that the result will be **Below 7**, **Exactly 7** (Lucky 7), or **Above 7**. The game includes options to reset or continue, so you can play multiple rounds without losing your balance unless you choose to reset.

## How to Play

1. **Starting Balance**: The game starts with an initial balance of **100 Rs**.
2. **Place a Bet**:
   - Click on the **Play** button to begin.
   - **10 Rs** will be deducted from your balance.
3. **Choose Your Bet**:
   - Select one of the following options:
     - **Below 7**: Bet that the sum of two dice will be less than 7.
     - **Lucky 7**: Bet that the sum will be exactly 7.
     - **Above 7**: Bet that the sum will be more than 7.
4. **Roll Dice**:

   - Click on the **Roll Dice** button to roll two dice.
   - The total of both dice is calculated to determine if you win or lose based on your bet.

5. **Winning Conditions**:

   - **Below 7**: If the total is less than 7, you win **20 Rs**.
   - **Lucky 7**: If the total is exactly 7, you win **30 Rs**.
   - **Above 7**: If the total is more than 7, you lose the bet amount.
   - Messages display the result: "Congratulations! You Win!" or "You Lost!"

6. **Game Options**:
   - **Continue**: Continue the game with your current balance, placing another bet.
   - **Reset and Continue**: Reset the balance back to **100 Rs** and restart the game.

## Installation

1. Clone this repository or download the source code:
   ```bash
   git clone https://github.com/ravibhalgami/lucky7-game
   ```
