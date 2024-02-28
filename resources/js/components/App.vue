
 
<template>
  <h3>Hallo</h3>
  <ul>
    <li v-for="post in nehad" :key="post.id">
      {{ post.title }}
      {{ post.body }}
    </li>
  </ul>
  <button @click="handelMutition">Click</button>
</template>

<script setup>
import { ref, onMounted } from "vue";
const nehad = ref([]);

onMounted(() => {
  fetch("http://localhost/graphql", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      query: `
            query {
       posts {
       data {
         id
       title
       body
      }
      } }`,
    }),
  })
    .then((res) => res.json())
    .then((result) => {
      console.log(result);
      nehad.value = result.data.posts.data;
    })
    .catch((error) => console.error("Error:", error));
});

function handelMutition() {
  fetch("http://localhost/graphql", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      query: `
      mutation {
  createPostResolver(user_id:1, title:"hallo vue", body:"hallo lorem vue") {
      id
    title
  body
  }
}`,
    }),
  })
    .then((res) => res.json())
    .then((result) => {
      // console.log(result);
      alert('post has been created')
    })
    .catch((error) => console.error("Error:", error));
}
</script>