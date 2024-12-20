<template>
  <div id="app">
    <div class="status">{{ gameStatus }}</div>
    <button class="reset" @click="resetGame">Reset</button>
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
