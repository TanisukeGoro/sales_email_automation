<template>
  <div>
    <input
      type="text"
      id="input-redirect-uri"
      class="form-control form-control-alternative"
      value="発行されていません"
      readonly="readonly"
    />
    <button
      type="button"
      class="btn btn-outline-primary btn-sm position-absolute top-5 right-0"
      @click="create"
    >発行する</button>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'RedirectUri',
  data() {
    return {};
  },
  methods: {
    async create() {
      const response = await axios.post('/redirect-link');

      if (response.status == 500) {
        alert('error');
      }

      if (response.status == 200) {
        alert('発行されました！');
        location.href = '/profile';
      }
    }
  }
};
</script>
