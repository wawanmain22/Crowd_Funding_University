<script setup>
const props = defineProps({
  formType: {
    type: String,
    default: 'login', // Default to 'login'
  },
});

// Functions to handle form submission for login or register
const handleLogin = () => {
  console.log('Login Form Submitted');
};

const handleRegister = () => {
  console.log('Register Form Submitted');
};
</script>

<template>
  <!-- Display Login Form if formType is 'login' -->
  <div v-if="formType === 'login'">
    <h2 class="text-lg font-bold mb-4">Login</h2>
    <form @submit.prevent="handleLogin">
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium">Email</label>
        <input
          type="email"
          id="email"
          class="mt-1 block w-full border rounded-md p-2"
          placeholder="Email"
          required
        />
      </div>
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium">Password</label>
        <input
          type="password"
          id="password"
          class="mt-1 block w-full border rounded-md p-2"
          placeholder="Password"
          required
        />
      </div>
      <button
        type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700"
      >
        Login
      </button>
    </form>
  </div>

  <!-- Display Register Form if formType is 'register' -->
  <div v-if="formType === 'register'">
    <h2 class="text-lg font-bold mb-4">Register</h2>
    <form @submit.prevent="handleRegister">
      <div class="mb-4">
        <label for="username" class="block text-sm font-medium">Username</label>
        <input
          type="text"
          id="username"
          class="mt-1 block w-full border rounded-md p-2"
          placeholder="Username"
          required
        />
      </div>
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium">Email</label>
        <input
          type="email"
          id="email"
          class="mt-1 block w-full border rounded-md p-2"
          placeholder="Email"
          required
        />
      </div>
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium">Password</label>
        <input
          type="password"
          id="password"
          class="mt-1 block w-full border rounded-md p-2"
          placeholder="Password"
          required
        />
      </div>
      <div class="mb-4">
        <label for="confirm-password" class="block text-sm font-medium">Confirm Password</label>
        <input
          type="password"
          id="confirm-password"
          class="mt-1 block w-full border rounded-md p-2"
          placeholder="Confirm Password"
          required
        />
      </div>
      <button
        type="submit"
        class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700"
      >
        Register
      </button>
    </form>
  </div>
</template>

