<template>
  <div id="app">
    <div class="status">{{ gameStatus }}</div>
    <button class="reset" @click="resetGame">Reset</button>
    <template v-for="(row, rowIndex) in board">
      <div class="row" :key="rowIndex">
        <button
            class="square"
            :key="cellIndex"
            v-for="(cell, cellIndex) in row"
            @click="makeMove(rowIndex, cellIndex)"
        >
          {{ cell }}
        </button>
      </div>
    </template>
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      board: [
        ["", "", ""],
        ["", "", ""],
        ["", "", ""]
      ],
      playingPlayer: "X",
      winningPlayer: null
    };
  },
  computed: {
    gameStatus() {
      return this.winningPlayer ? `${this.winningPlayer} has won the game` : `It's ${this.playingPlayer}'s time to play`;
    }
  },
  methods: {
    makeMove(rowIndex, colIndex) {
      // if the cell hasn't been played on and we still don't have a winner we can make moves
      if (this.board[rowIndex][colIndex] === "" && !this.winningPlayer) {
        Vue.set(this.board[rowIndex], colIndex, this.playingPlayer);

        // check if we have a winner on this move or not
        this.checkWinningConditions(rowIndex, colIndex)
        ? this.winningPlayer = this.playingPlayer
        : this.playingPlayer = this.playingPlayer === "X" ? "O" : "X";
      }
    },
    checkWinningConditions(rowIndex, colIndex) {
      // check if the player wins by aligning symbols on the row
      if (this.board[rowIndex].every((cell) => cell === this.playingPlayer)) {
        return true;
      }

      // check if the player wins by aligning symbols on the column
      if (this.board.every((row) => row[colIndex] === this.playingPlayer)) {
        return true;
      }

      // the diagonal is when row is equal to column, so this is how we conditionally check the winner for this case
      if (rowIndex === colIndex && this.board.every((row, index) => row[index] === this.playingPlayer)) {
        return true;
      }

      // I noticed the diagonal on the other way is 0,2, or 1,1 or 2,0, all equal to 2,
      // that's how we'll conditionally determine winner this way and 2 - index because column is inverted from line.
      if (rowIndex + colIndex === 2 && this.board.every((row, index) => row[2 - index] === this.playingPlayer)) {
        return true;
      }

      return false;
    },
    resetGame() {
      this.board = [
        ["", "", ""],
        ["", "", ""],
        ["", "", ""]
      ];
      this.playingPlayer = "X";
      this.winningPlayer = null;
    }
  }
};

</script>

<style>
#app {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.row {
  display: flex;
}

.status {
  font-size: 2rem;
  letter-spacing: 2px;
}

.square {
  width: 50px;
  height: 50px;
}

button {
  padding: 10px;
  font-size: 1rem;
}

.reset {
  margin: 10px 0;
}
</style>