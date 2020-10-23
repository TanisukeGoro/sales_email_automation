<template>
  <div class="card-body">
    <h6 class="heading-small text-muted mb-4">プロフィール情報</h6>

    <div class="pl-lg-4">
      <div class="form-group has-denger">
        <label class="form-control-label" for="input-name">名前</label>
        <input
          id="input-name"
          v-model="form.name"
          type="text"
          name="name"
          class="form-control form-control-alternative"
          :class="{ 'is-invalid': errors.name }"
          placeholder="名前"
          autofocus
        />
        <span class="invalid-feedback" role="alert">
          <strong v-if="errors.name">{{ errors.name[0] }}</strong>
        </span>
      </div>

      <div class="form-group">
        <label class="form-control-label" for="input-email">メールアドレス</label>
        <input
          id="input-email"
          v-model="form.email"
          type="email"
          name="email"
          class="form-control form-control-alternative"
          :class="{ 'is-invalid': errors.email }"
          placeholder="example@example.com"
        />

        <span class="invalid-feedback" role="alert">
          <strong v-if="errors.email">{{ errors.email[0] }}</strong>
        </span>
      </div>

      <div class="form-group">
        <label class="form-control-label" for="input-facebook">Facebook</label>
        <input
          id="input-facebook"
          v-model="form.facebook"
          type="facebook"
          name="facebook"
          class="form-control form-control-alternative"
          :class="{ 'is-invalid': errors.facebook }"
          placeholder="Facebook"
        />

        <span class="invalid-feedback" role="alert">
          <strong v-if="errors.facebook">{{ errors.facebook[0] }}</strong>
        </span>
      </div>

      <div class="form-group">
        <label class="form-control-label" for="input-linkedin">LinkedIn</label>
        <input
          id="input-linkedin"
          v-model="form.linkedin"
          type="linkedin"
          name="linkedin"
          class="form-control form-control-alternative"
          :class="{ 'is-invalid': errors.linkedin }"
          placeholder="LinkedIn"
        />

        <span class="invalid-feedback" role="alert">
          <strong v-if="errors.linkedin">{{ errors.linkedin[0] }}</strong>
        </span>
      </div>

      <div class="form-group">
        <label class="form-control-label" for="input-official-position">役職名</label>

        <input
          id="input-official-position"
          v-model="form.official_position"
          type="text"
          name="official-position"
          class="form-control form-control-alternative"
          :class="{ 'is-invalid': errors.official_position }"
          placeholder="人事部"
        />

        <span class="invalid-feedback" role="alert">
          <strong v-if="errors.official_position">{{ errors.official_position[0] }}</strong>
        </span>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary mt-4" @click="changeUserProfile">変更</button>
      </div>
    </div>
    <hr class="my-4" />
    <h6 class="heading-small text-muted mb-4">パスワード</h6>

    <div class="pl-lg-4">
      <div class="form-group">
        <label class="form-control-label" for="input-current-password">現在のパスワード</label>
        <input
          id="input-current-password"
          v-model="passwordForm.old_password"
          type="password"
          name="old_password"
          class="form-control form-control-alternative"
          :class="{ 'is-invalid': errors.old_password }"
          placeholder="現在のパスワード"
        />
        <span class="invalid-feedback" role="alert">
          <strong v-if="errors.old_password">{{ errors.old_password[0] }}</strong>
        </span>
      </div>
      <div class="form-group">
        <label class="form-control-label" for="input-password">新しいパスワード</label>
        <input
          id="input-password"
          v-model="passwordForm.password"
          type="password"
          name="password"
          class="form-control form-control-alternative"
          :class="{ 'is-invalid': errors.password }"
          placeholder="新しいパスワード"
        />

        <span class="invalid-feedback" role="alert">
          <strong v-if="errors.password">{{ errors.password[0] }}</strong>
        </span>
      </div>
      <div class="form-group">
        <label class="form-control-label" for="input-password-confirmation">確認用パスワード</label>
        <input
          id="input-password-confirmation"
          v-model="passwordForm.password_confirmation"
          type="password"
          name="password_confirmation"
          class="form-control form-control-alternative"
          :class="{ 'is-invalid': errors.password_confirmation }"
          placeholder="確認用パスワード"
        />

        <span class="invalid-feedback" role="alert">
          <strong v-if="errors.password_confirmation">{{ errors.password_confirmation[0] }}</strong>
        </span>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary mt-4" @click="changePassword">変更</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'UserProfile',
  data() {
    return {
      form: {
        name: '',
        email: '',
        facebook: '',
        linkedin: '',
        official_position: '',
      },
      passwordForm: {
        old_password: '',
        password: '',
        password_confirmation: '',
      },
      errors: '',
    };
  },
  watch: {
    $route: {
      async handler() {
        await this.configure();
      },
      immediate: true,
    },
  },
  methods: {
    async configure() {
      const response = await axios.get(`/profile/info`);

      if (response.status == 200) {
        const data = response.data;
        this.form.name = data.name;
        this.form.email = data.email;
        this.form.facebook = data.facebook;
        this.form.linkedin = data.linkedin;
        this.form.official_position = data.official_position;
      }
    },
    async changeUserProfile() {
      var params = this.form;

      const response = await axios.put(`/profile/user`, params);

      if (response.status == 500) {
        window.alert('予期せぬエラーが起こりました');
      }

      if (response.status == 422) {
        this.errors = response.data.errors;
      }

      if (response.status == 200) {
        this.errors = '';
        window.alert('プロフィールを変更しました！');
      }
    },

    async changePassword() {
      var params = this.passwordForm;

      const response = await axios.put(`/profile/password`, params);

      if (response.status == 500) {
        window.alert('予期せぬエラーが起こりました');
      }

      if (response.status == 422) {
        this.errors = response.data.errors;
      }

      if (response.status == 200) {
        this.passwordForm.old_password = '';
        this.passwordForm.password = '';
        this.passwordForm.password_confirmation = '';
        this.errors = '';
        window.alert('パスワードを変更しました！');
      }
    },
  },
};
</script>
