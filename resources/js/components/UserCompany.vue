<template>
  <div class="card-body">
    <h6 class="heading-small text-muted mb-4">ユーザー企業情報</h6>

    <div class="pl-lg-4">
      <div class="form-group">
        <label class="form-control-label" for="input-company_name">会社名</label>
        <span class="d-block">{{ list.company_name ? list.company_name : '設定されていません' }}</span>
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
        <label class="form-control-label" for="input-address">会社所在地</label>
        <span class="d-block">{{ list.company_address ? list.company_address : '設定されていません' }}</span>
      </div>

      <div class="form-group">
        <label class="form-control-label" for="input-employees-number">従業員数</label>
        <span class="d-block">{{ list.maximum_employees ? list.maximum_employees + '人' : '設定されていません' }}</span>
      </div>

      <div class="form-group">
        <label class="form-control-label" for="input-representative">代表者名</label>
        <span class="d-block">{{ list.representative_name ? list.representative_name : '設定されていません' }}</span>
      </div>

      <div class="form-group">
        <label class="form-control-label" for="input-representative-phone-number">代表者電話番号</label>
        <span class="d-block">
          {{ list.representative_phone_number ? list.representative_phone_number : '設定されていません' }}
        </span>
      </div>

      <div class="form-group">
        <label class="form-control-label" for="input-business-description">事業内容</label>
        <span class="d-block">
          {{ list.company_business_description ? list.company_business_description : '設定されていません' }}
        </span>
      </div>

      <div class="form-group">
        <label class="form-control-label" for="input-company-profile">会社概要</label>
        <span class="d-block">{{ list.company_profile ? list.company_profile : '設定されていません' }}</span>
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
        contact_email: '',
        hp_url: ''
      },
      list: {
        company_name: '',
        company_address: '',
        maximum_employees: '',
        company_business_description: '',
        company_profile: '',
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
        this.list.company_name = data.company_name
        this.list.company_address = data.company_address
        this.list.maximum_employees = data.maximum_employees
        this.list.company_business_description = data.company_business_description
        this.list.company_profile = data.company_profile
        this.list.representative_name = data.representative_name
        this.list.representative_phone_number = data.representative_phone_number
        this.form.contact_email = data.contact_email
        this.form.hp_url = data.hp_url
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
