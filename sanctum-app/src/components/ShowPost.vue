<template>
  <div class="container">
    <h1>{{ post.title }}</h1>
    <p><strong>Author:</strong> {{ post.user.name }}</p>
    <p><strong>Created At:</strong> {{ formatDate(post.created_at) }}</p>
    <p>{{ post.body }}</p>
    <router-link :to="{ name: 'edit', params: { id: post.id } }" class="btn btn-primary">Edit</router-link>
    <button @click="deletePost" class="btn btn-danger">Delete</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'PostShow',
  data() {
    return {
      post: {},
    };
  },
  created() {
    this.fetchPost();
  },
  methods: {
    fetchPost() {
      const postId = this.$route.params.id;
      axios.get(`/api/posts/${postId}`)
        .then(response => {
          this.post = response.data;
        })
        .catch(error => {
          console.error("There was an error fetching the post:", error);
        });
    },
    formatDate(date) {
      const options = { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
      return new Date(date).toLocaleDateString('en-US', options);
    },
    deletePost() {
      if (confirm('Are you sure you want to delete this post?')) {
        axios.delete(`/api/posts/${this.post.id}`)
          .then(response => {
            this.$router.push({ name: 'posts' });
          })
          .catch(error => {
            console.error("There was an error deleting the post:", error);
          });
      }
    },
  },
};
</script>

<style scoped>
.container {
  padding: 20px;
}
</style>
