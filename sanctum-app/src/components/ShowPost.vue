<template>
    <div class="container">
      <button @click="createPost" class="btn btn-primary">Create New Post</button>
      <br><br>
      <table class="table table-striped">
        <thead>
          <tr>
            <th width="25%">Title</th>
            <th width="30%">Author</th>
            <th width="20%">Created At</th>
            <th width="25%">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="post in posts" :key="post.id">
            <td>{{ post.title }}</td>
            <td>{{ post.user.name }}</td>
            <td>{{ formatDate(post.created_at) }}</td>
            <td>
              <button @click="viewPost(post.id)" class="btn btn-primary mr-2 btn-sm">View</button>
              <button @click="editPost(post.id)" class="btn btn-secondary mr-2 btn-sm">Edit</button>
              <button @click="deletePost(post.id)" class="btn btn-danger mr-2 btn-sm">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        posts: []
      };
    },
    methods: {
      // Fetch posts from server
      fetchPosts() {
        // You need to implement this method to fetch posts from your Laravel backend
      },
      // Format date
      formatDate(date) {
        return new Date(date).toLocaleString();
      },
      // Navigate to view post page
      viewPost(postId) {
        // Implement navigation logic
      },
      // Navigate to edit post page
      editPost(postId) {
        // Implement navigation logic
      },
      // Delete post
      deletePost(postId) {
        // Implement delete logic
      },
      // Create new post
      createPost() {
        // Implement navigation logic to create post page
      }
    },
    mounted() {
      // Fetch posts when the component is mounted
      this.fetchPosts();
    }
  };
  </script>
  
  <style scoped>
  .container {
    max-width: 800px;
    margin: 0 auto;
  }
  
  .btn {
    cursor: pointer;
  }
  
  .btn-primary {
    background-color: #007bff;
    color: #fff;
  }
  
  .btn-secondary {
    background-color: #6c757d;
    color: #fff;
  }
  
  .btn-danger {
    background-color: #dc3545;
    color: #fff;
  }
  </style>
  