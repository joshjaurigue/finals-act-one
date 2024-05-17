<template>
  <div>
    <!-- Navigation Bar -->
    <nav class="nav-bar">
      <div class="nav-container">
        <span class="nav-brand">ForumApp</span>
        <ul class="nav-links">
          <li class="nav-item">
            <router-link class="nav-link" to="/">Login</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/register">Register</router-link>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Login Form -->
    <div class="container mt-5 col-3">
      <div class="row">
        <h4>Enter your email and password</h4>
        <form @submit.prevent="loginUser" class="col-12">
          <div class="form-group mt-3">
            <input type="email" class="form-control" id="email" v-model="email" placeholder="Enter email" required @input="clearErrors">
            <small class="text-danger" v-if="errors">{{ errors }}</small>
          </div>
          <div class="form-group mt-3">
            <input type="password" class="form-control" id="password" v-model="password" placeholder="Password" required @input="clearErrors">
          </div>
          <button type="submit" class="btn btn-primary mt-3 w-100">Login</button>
        </form>
      </div>
      <div class="row">
        <div class="col-12">
            <p class="mt-3 text-left">Don't have an account? <router-link to="/register">Register here!</router-link></p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      email: '',
      password: '',
      errors: null
    };
  },
  methods: {
    async loginUser() {
      try {
        // Call the login API endpoint using Axios
        const response = await axios.post(this.$root.$data.apiUrl + '/login', {
          email: this.email,
          password: this.password
        });
        if (response.status === 201) {
          // Successful login, handle token storage and redirection
          localStorage.setItem('token', response.data.token);
          this.$router.push('/home');
        }
      } catch (error) {
        // Handle login error, show error message to the user
        this.errors = error.response.data.message;
      }
    },
    clearErrors() {
      // Clear error message for the specified field
      this.errors = null;
    }
  }
};
</script>

<style scoped>
/* Navigation Bar Styles */
.nav-bar {
  background-color: #f8f9fa;
  padding: 1em;
  border-bottom: 1px solid #dee2e6;
}

.nav-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.nav-brand {
  font-size: 1.5em;
  font-weight: bold;
}

.nav-links {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  gap: 1em;
}

.nav-item {
}

.nav-link {
  text-decoration: none;
  color: #007bff;
}

.nav-link:hover {
  text-decoration: underline;
}

/* Other Styles */
.container {
  margin-top: 5em;
}

.form-group {
  margin-top: 1em;
}

.btn {
  margin-top: 1em;
  width: 100%;
}

.text-danger {
  color: #dc3545;
}
</style>
