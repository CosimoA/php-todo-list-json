<script>
// import HelloWorld from './components/HelloWorld.vue'
import axios from "axios";

export default {
  data() {
    return {
      todoArray: [],
    }
  },
  mounted() {
    axios.get("http://localhost/todoApi.php").then((res) => {
      this.todoArray = res.data;
      console.log("Mie API: ", this.todoArray);
    });
  },
};
</script>

<template></template>

<style lang="scss" scoped></style>
