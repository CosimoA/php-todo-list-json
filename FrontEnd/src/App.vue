<script>
import axios from 'axios';

export default {
  data() {
    return {
      todoArray: null,
      newTask: '',
    };
  },
  mounted() {
    axios.get('http://localhost/todoApi.php')
      .then(response => {
        this.todoArray = response.data;
        console.log('Dati: ', this.todoArray);
      })
      .catch(error => {
        console.error('Errore durante il recupero dei dati:', error);
      });
  },

  methods: {
    pushNewTask() {
      axios.post('http://localhost/pushApi.php', { text: this.newTask })
        .then(response => {
          this.todoArray = response.data;
          console.log('Nuovo compito aggiunto con successo:', this.todoArray);
        })
        .catch(error => {
          console.error('Errore durante l\'aggiunta del nuovo compito:', error);
        });
    },

    toggleTaskStatus(task) {
      axios.post('http://localhost/delApi.php', { id: task.id, fatto: task.fatto })
        .then(res => {
          this.todoArray = res.data;
        })
        .catch(error => {
          console.error('Error updating task status:', error);
        });
    },

    eliminaTask(taskId) {
      axios.post('http://localhost/eliminaTask.php', { id: taskId })
        .then(res => {
          this.todoArray = res.data;
        })
        .catch(error => {
          console.error('Errore durante l\'eliminazione del task:', error);
        });
    },

  }
}
</script>


<template>
  <div>
    <h1>Todo App: {{ todoArray ? todoArray.length : 0 }}</h1>
    <form @submit.prevent="pushNewTask">
      <input v-model="newTask" placeholder="Nuovo Task" />
      <button type="submit">Aggiungi</button>
    </form>
    <ul>
      <li v-for="task in todoArray" :key="task.id">
        <input type="checkbox" @change="toggleTaskStatus(task)" v-model="task.fatto" />
        <span :class="{ 'fatto': task.fatto }">{{ task.title }}</span>
        <span class="elimina" @click="eliminaTask(task.id)">✖</span>
      </li>
    </ul>
  </div>
</template>

<style lang="scss" scoped>
.fatto {
  text-decoration: line-through;
}

.elimina {
  cursor: pointer;
  color: #949494;
  font-size: 18px;
  margin-left: 5px;
  transition: color 0.3s ease-in-out;
}

.elimina:hover {
  color: #d32f2f;
}
</style>