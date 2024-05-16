<template>
    <div class="container">
      <h1>Create New Post</h1>
      <form @submit.prevent="submitForm" class="post-form">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" v-model="title" id="title" name="title">
        </div>
        <div class="form-group">
          <label for="content">Content</label>
          <textarea class="form-control" v-model="body" id="body" name="body" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        title: '',
        body: ''
      };
    },
    methods: {
      async submitForm() {
        try {
          const response = await axios.post('/api/posts', {
            title: this.title,
            body: this.body
          });
          console.log('Post created:', response.data);
          // Optionally, you can navigate to a different page or show a success message here
        } catch (error) {
          console.error('Error creating post:', error);
          // Handle errors here, such as showing an error message to the user
        }
      }
    }
  };
  </script>
  
  <style scoped>
  .container {
    margin-top: 20px;
  }
  
  .post-form {
    max-width: 500px;
    margin: 0 auto;
  }
  
  .form-group {
    margin-bottom: 20px;
  }
  
  label {
    font-weight: bold;
  }
  
  .btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
  }
  
  .btn-primary:hover {
    background-color: #0056b3;
  }
  </style>
  