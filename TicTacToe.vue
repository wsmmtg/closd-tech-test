<template>
  <div id="app">
    <div class="status">{{ gameStatus }}</div>
    <button @click="resetGame">Reset</button>
    <template v-for="(row, index) in board">
      <div class="row" :key="index">
        <button
            v-for="(cell, cellIndex) in row"
            :key="cellIndex"
            class="square"
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
        ["X", "", ""],
        ["", "X", ""],
        ["", "", "X"]
      ],
      playingPlayer: "X",
      winningPlayer: null
    };
  },
  computed: {
    gameStatus() {
      if (this.winningPlayer) {
        return `${this.winningPlayer} has won the game`;
      } else {
        return `It's ${this.playingPlayer}'s time to play`;
      }
    }
  },
  methods: {
    resetGame() {
      this.board = [
        ["", "", ""],
        ["", "", ""],
        ["", "", ""]
      ];
      this.playingPlayer = 'X';
      this.winningPlayer = null;
    }
  }
};
</script>
