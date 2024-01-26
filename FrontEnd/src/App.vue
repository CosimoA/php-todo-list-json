<script>
import axios from 'axios';

export default {
  data() {
    return {
      todoArray: [],
      newTask: '',
    };
  },
  mounted() {
    axios.get('http://localhost/todoApi.php')
      .then(res => {
        this.todoArray = res.data;
        console.log(this.todoArray);
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  },
  methods: {
    pushNewTask() {
      console.log("hello: " + this.newTask);

    }
  }
}
</script>

<template>
  <div>
    <h1>Todo App: {{ todoArray.length }}</h1>
    <form @submit.prevent="pushNewTask">
      <input v-model="newTask" placeholder="Nuovo Task" />
      <button type="submit">Aggiungi</button>
    </form>
    <ul>
      <li v-for="task in todoArray" :key="task.id">
        <input type="checkbox" />
        {{ task.title }}
      </li>
    </ul>
  </div>
</template>

<style lang="scss" scoped></style>
