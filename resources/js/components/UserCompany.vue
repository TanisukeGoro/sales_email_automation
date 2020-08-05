<template>
  <div class="card-body">
    <h6 class="heading-small text-muted mb-4">ユーザー企業情報</h6>

    <div class="pl-lg-4">
      <div class="form-group">
        <label class="form-control-label" for="input-company_name">会社名</label>

        <input
          id="input-company_name"
          v-model="form.company_name"
          type="text"
          name="company_name"
          class="form-control form-control-alternative"
          :class="{ 'is-invalid': errors.company_name }"
          placeholder="株式会社example"
          autofocus
        />

        <span class="invalid-feedback" role="alert">
          <strong v-if="errors.company_name">{{ errors.company_name[0] }}</strong>
        </span>
      </div>

      <div class="form-group">
        <label class="form-control-label" for="input-address">会社所在地</label>
        <input
          id="input-address"
          v-model="form.company_address"
          type="text"
          name="address"
          class="form-control form-control-alternative"
          :class="{ 'is-invalid': errors.company_address }"
          placeholder="会社所在地"
        />

        <span class="invalid-feedback" role="alert">
          <strong v-if="errors.company_address">{{ errors.company_address[0] }}</strong>
        </span>
      </div>

      <div class="form-group">
        <label class="form-control-label" for="input-employees-number">従業員数</label>
        <input
          id="input-employees-number"
          v-model="form.maximum_employees"
          type="number"
          name="employees-number"
          class="form-control form-control-alternative"
          :class="{ 'is-invalid': errors.maximum_employees }"
          placeholder="755"
        />

        <span class="invalid-feedback" role="alert">
          <strong v-if="errors.employees">{{ errors.maximum_employees[0] }}</strong>
        </span>
      </div>

      <div class="form-group">
        <label class="form-control-label" for="input-contact-email">お問い合わせメールアドレス</label>

        <input
          id="input-contact-email"
          v-model="form.contact_email"
          type="text"
          name="contact-email"
          class="form-control form-control-alternative"
          :class="{ 'is-invalid': errors.contact_email }"
          placeholder="example@example.com"
        />

        <span class="invalid-feedback" role="alert">
          <strong v-if="errors.contact_email">{{ errors.contact_email[0] }}</strong>
        </span>
      </div>

      <div class="form-group">
        <label class="form-control-label" for="input-hp-url">ホームページURL</label>

        <input
          id="input-hp-url"
          v-model="form.hp_url"
          type="text"
          name="hp-url"
          class="form-control form-control-alternative"
          :class="{ 'is-invalid': errors.hp_url }"
          placeholder="https://example.com"
        />

        <span class="invalid-feedback" role="alert">
          <strong v-if="errors.hp_url">{{ errors.hp_url[0] }}</strong>
        </span>
      </div>

      <div class="form-group">
        <label class="form-control-label" for="input-representative">代表者名</label>
        <input
          id="input-representative"
          v-model="form.representative_name"
          type="text"
          name="representative"
          class="form-control form-control-alternative"
          :class="{ 'is-invalid': errors.representative_name }"
          placeholder="代表者名"
        />

        <span class="invalid-feedback" role="alert">
          <strong v-if="errors.representative_name">{{ errors.representative_name[0] }}</strong>
        </span>
      </div>

      <div class="form-group">
        <label class="form-control-label" for="input-representative-phone-number">代表者電話番号</label>
        <input
          id="input-representative-phone-number"
          v-model="form.representative_phone_number"
          type="text"
          name="representative-phone-number"
          class="form-control form-control-alternative"
          :class="{ 'is-invalid': errors.representative_phone_number }"
          placeholder="ハイフン(-)は不要"
        />

        <span class="invalid-feedback" role="alert">
          <strong v-if="errors.representative_phone_number">{{ errors.representative_phone_number[0] }}</strong>
        </span>
      </div>

      <div class="form-group">
        <label class="form-control-label" for="input-business-description">事業内容</label>

        <textarea
          id="input-business-description"
          v-model="form.company_business_description"
          name="business-description"
          class="form-control form-control-alternative"
          :class="{ 'is-invalid': errors.company_business_description }"
          rows="12"
          placeholder="事業内容"
        />

        <span class="invalid-feedback" role="alert">
          <strong v-if="errors.company_business_description">{{ errors.company_business_description[0] }}</strong>
        </span>
      </div>

      <div class="form-group">
        <label class="form-control-label" for="input-company-profile">会社概要</label>

        <textarea
          id="input-company-profile"
          v-model="form.company_profile"
          name="company-profile"
          class="form-control form-control-alternative"
          :class="{ 'is-invalid': errors.company_profile }"
          rows="12"
          placeholder="会社概要"
        />

        <span class="invalid-feedback" role="alert">
          <strong v-if="errors.company_profile">{{ errors.company_profile[0] }}</strong>
        </span>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary mt-4" @click="changeUserCompany">変更</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'UserProfile',
  data() {
    return {
      form: {
        company_name: '',
        company_address: '',
        maximum_employees: '',
        company_business_description: '',
        company_profile: '',
        contact_email: '',
        hp_url: '',
        representative_name: '',
        representative_phone_number: ''
      },
      errors: ''
    }
  },
  watch: {
    $route: {
      async handler() {
        await this.configure()
      },
      immediate: true
    }
  },
  methods: {
    async configure() {
      const response = await axios.get(`/profile/info`)

      if (response.status == 200) {
        const data = response.data.user_company
        this.form.company_name = data.company_name
        this.form.company_address = data.company_address
        this.form.maximum_employees = data.maximum_employees
        this.form.company_business_description = data.company_business_description
        this.form.company_profile = data.company_profile
        this.form.contact_email = data.contact_email
        this.form.hp_url = data.hp_url
        this.form.representative_name = data.representative_name
        this.form.representative_phone_number = data.representative_phone_number
      }
    },
    async changeUserCompany() {
      var params = this.form

      const response = await axios.put(`/profile/user-company`, params)

      if (response.status == 500) {
        window.alert('予期せぬエラーが起こりました')
      }

      if (response.status == 422) {
        this.errors = response.data.errors
      }

      if (response.status == 200) {
        this.errors = ''
        window.alert('条件を保存しました')
      }
    }
  }
}
</script>
