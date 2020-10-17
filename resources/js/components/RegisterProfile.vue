<template>
  <div v-if="isDisplay" class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
      <div class="card shadow">
        <div class="card-body px-lg-5 py-lg-5">
          <div class="text-center text-muted mb-4">新規登録</div>

          <div v-if="page == 1" class="form-group">
            <span class="text-red">{{ error.company_name }}</span>
            <div class="input-group input-group-alternative mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-building"></i></span>
              </div>
              <input v-model="form.company_name" class="form-control" placeholder="会社名" type="text" required />
            </div>
          </div>

          <div v-if="page == 1" class="form-group">
            <span class="text-red">{{ error.official_position }}</span>
            <div class="input-group input-group-alternative mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-cubes"></i></span>
              </div>
              <input v-model="form.official_position" class="form-control" placeholder="役職" type="text" required />
            </div>
          </div>

          <div v-if="page == 1" class="form-group">
            <span class="text-red">{{ error.facebook }}</span>
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fab fa-facebook"></i></span>
              </div>
              <input v-model="form.facebook" class="form-control" placeholder="Facebook" type="text" required />
            </div>
          </div>

          <div v-if="page == 1" class="form-group">
            <span class="text-red">{{ error.linkedin }}</span>
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
              </div>
              <input v-model="form.linkedin" class="form-control" placeholder="LinkedIn" type="text" required />
            </div>
          </div>

          <div v-if="page == 2" class="form-group">
            <span class="text-red">{{ error.company_address }}</span>
            <div class="input-group input-group-alternative mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
              </div>
              <input v-model="form.company_address" class="form-control" placeholder="会社住所" type="text" required />
            </div>
          </div>

          <div v-if="page == 2" class="form-group">
            <span class="text-red">{{ error.maximum_employees }}</span>
            <div class="input-group input-group-alternative mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-users"></i></span>
              </div>
              <input
                v-model="form.maximum_employees"
                class="form-control"
                placeholder="従業員数"
                type="number"
                required
              />
            </div>
          </div>

          <div v-if="page == 2" class="form-group">
            <span class="text-red">{{ error.company_large_category_id }}</span>
            <div class="input-group input-group-alternative mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
              </div>
              <select
                id="large-category"
                v-model="form.company_large_category_id"
                name="large-category"
                class="form-control"
              >
                <option value>業種大カテゴリ</option>
                <option
                  v-for="company_large_category in company_large_categories"
                  :key="company_large_category.id"
                  :value="company_large_category.id"
                >
                  {{ company_large_category.name }}
                </option>
              </select>
            </div>
          </div>

          <div v-if="page == 2" class="form-group">
            <span class="text-red">{{ error.company_middle_category_id }}</span>
            <div class="input-group input-group-alternative mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
              </div>
              <select
                id="middle-category"
                v-model="form.company_middle_category_id"
                name="middle-category"
                class="form-control"
              >
                <option value>業種中カテゴリ</option>
                <option
                  v-for="company_middle_category in company_middle_categories"
                  :key="company_middle_category.id"
                  :value="company_middle_category.id"
                >
                  {{ company_middle_category.name }}
                </option>
              </select>
            </div>
          </div>

          <div v-if="page == 3" class="form-group">
            <span class="text-red">{{ error.company_representative_name }}</span>
            <div class="input-group input-group-alternative mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-signature"></i></span>
              </div>
              <input
                v-model="form.company_representative_name"
                class="form-control"
                placeholder="代表者名"
                type="text"
                required
              />
            </div>
          </div>

          <div v-if="page == 3" class="form-group">
            <span class="text-red">{{ error.company_representative_phone_number }}</span>
            <div class="input-group input-group-alternative mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
              </div>
              <input
                v-model="form.company_representative_phone_number"
                class="form-control"
                placeholder="代表者電話番号"
                type="text"
                required
              />
            </div>
          </div>

          <div v-if="page == 3" class="form-group">
            <span class="text-red">{{ error.hp_adress }}</span>
            <div class="input-group input-group-alternative mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-file"></i></span>
              </div>
              <input v-model="form.hp_adress" class="form-control" placeholder="ホームページURL" type="text" required />
            </div>
          </div>

          <div v-if="page == 3" class="form-group">
            <span class="text-red">{{ error.company_contact_email }}</span>
            <div class="input-group input-group-alternative mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-envelope"></i></span>
              </div>
              <input
                v-model="form.company_contact_email"
                class="form-control"
                placeholder="お問い合わせメールアドレス"
                type="text"
                required
              />
            </div>
          </div>

          <div v-if="page == 4" class="form-group">
            <span class="text-red">{{ error.company_profile }}</span>
            <div class="input-group input-group-alternative mb-3">
              <div class="pt-1">
                <span class="input-group-text"><i class="far fa-file-alt"></i></span>
              </div>
              <textarea
                v-model="form.company_profile"
                placeholder="会社概要"
                class="form-control"
                rows="8"
                required
              ></textarea>
            </div>
          </div>

          <div v-if="page == 4" class="form-group">
            <span class="text-red">{{ error.business_description }}</span>
            <div class="input-group input-group-alternative mb-3">
              <div class="pt-1">
                <span class="input-group-text"><i class="far fa-file-alt"></i></span>
              </div>
              <textarea
                v-model="form.business_description"
                placeholder="事業内容"
                class="form-control"
                rows="8"
                required
              ></textarea>
            </div>
          </div>

          <div v-if="page == 5" class="mb-3">
            <span class="">会社名</span>
            <div class="">
              <span>{{ form.company_name }}</span>
            </div>
          </div>
          <div v-if="page == 5" class="mb-3">
            <span class="">役職</span>
            <div class="">
              <span>{{ form.official_position }}</span>
            </div>
          </div>
          <div v-if="page == 5" class="mb-3">
            <span class="">Facebook</span>
            <div class="">
              <span>{{ form.facebook != '' ? form.facebook : '未入力' }}</span>
            </div>
          </div>
          <div v-if="page == 5" class="mb-3">
            <span class="">LinkedIn</span>
            <div class="">
              <span>{{ form.linkedin != '' ? form.linkedin : '未入力' }}</span>
            </div>
          </div>
          <div v-if="page == 5" class="mb-3">
            <span class="">会社住所</span>
            <div class="">
              <span>{{ form.company_address }}</span>
            </div>
          </div>
          <div v-if="page == 5" class="mb-3">
            <span class="">従業員数</span>
            <div class="">
              <span>{{ form.maximum_employees }}人</span>
            </div>
          </div>
          <div v-if="page == 5" class="mb-3">
            <span class="">業種大カテゴリ</span>
            <div class="">
              <span>{{ company_large_categories[form.company_large_category_id - 1].name }}</span>
            </div>
          </div>
          <div v-if="page == 5" class="mb-3">
            <span class="">業種中カテゴリ</span>
            <div class="">
              <span>{{ company_middle_categories[form.company_middle_category_id - 1].name }}</span>
            </div>
          </div>
          <div v-if="page == 5" class="mb-3">
            <span class="">代表者名</span>
            <div class="">
              <span>{{ form.company_representative_name }}</span>
            </div>
          </div>

          <div v-if="page == 5" class="mb-3">
            <span class="">代表者電話番号</span>
            <div class="">
              <span>{{ form.company_representative_phone_number }}</span>
            </div>
          </div>

          <div v-if="page == 5" class="mb-3">
            <span class="">ホームページURL</span>
            <div class="">
              <span>{{ form.hp_adress }}</span>
            </div>
          </div>

          <div v-if="page == 5" class="mb-3">
            <span class="">お問い合わせメールアドレス</span>
            <div class="">
              <span>{{ form.company_contact_email }}</span>
            </div>
          </div>

          <div v-if="page == 5" class="mb-3">
            <span class="">会社概要</span>
            <div class="">
              <span>{{ form.company_profile }}</span>
            </div>
          </div>

          <div v-if="page == 5" class="mb-3">
            <span class="">事業内容</span>
            <div class="">
              <span>{{ form.business_description }}</span>
            </div>
          </div>

          <div class="text-center">
            <button v-if="page != 1" @click="page -= 1" type="submit" class="btn btn-primary mt-4">戻る</button>
            <button v-if="page == 1" @click="clickPage1Button()" type="submit" class="btn btn-primary mt-4">
              次へ
            </button>
            <button v-if="page == 2" @click="clickPage2Button()" type="submit" class="btn btn-primary mt-4">
              次へ
            </button>
            <button v-if="page == 3" @click="clickPage3Button()" type="submit" class="btn btn-primary mt-4">
              次へ
            </button>
            <button v-if="page == 4" @click="clickPage4Button()" type="submit" class="btn btn-primary mt-4">
              確認
            </button>
            <button v-if="page == 5" @click="clickPage5Button()" type="submit" class="btn btn-primary mt-4">
              登録
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

const emptyErrorMessage = '値を入力してください';

export default {
  data() {
    return {
      form: {
        company_name: '',
        official_position: '',
        facebook: '',
        linkedin: '',
        company_address: '',
        maximum_employees: '',
        company_large_category_id: '',
        company_middle_category_id: '',
        company_representative_name: '',
        company_representative_phone_number: '',
        hp_adress: '',
        company_contact_email: '',
        business_description: '',
        company_profile: '',
      },
      error: {
        company_name: '',
        official_position: '',
        facebook: '',
        linkedin: '',
        company_address: '',
        maximum_employees: '',
        company_large_category_id: '',
        company_middle_category_id: '',
        company_representative_name: '',
        company_representative_phone_number: '',
        hp_adress: '',
        company_contact_email: '',
        business_description: '',
        company_profile: '',
      },
      isError: false,
      isDisplay: false,
      page: 1,
      company_large_categories: [],
      company_middle_categories: [],
      listing_stocks: [],
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
      const response = await axios.get(`/configure`);

      if (response.status == 200) {
        this.company_large_categories = response.data.company_large_categories;
        this.company_middle_categories = response.data.company_middle_categories;
        this.listing_stocks = response.data.listing_stocks;
        this.isDisplay = true;
      }
    },
    clickPage1Button() {
      this.error.company_name = this.form.company_name == '' ? emptyErrorMessage : '';
      this.error.official_position = this.form.official_position == '' ? emptyErrorMessage : '';

      if (this.form.company_name != '' && this.form.official_position != '') {
        this.page = 2;
      }
    },
    clickPage2Button() {
      this.error.company_address = this.form.company_address == '' ? emptyErrorMessage : '';
      this.error.maximum_employees = this.form.maximum_employees == '' ? emptyErrorMessage : '';
      this.error.company_large_category_id = this.form.company_large_category_id == '' ? emptyErrorMessage : '';
      this.error.company_middle_category_id = this.form.company_middle_category_id == '' ? emptyErrorMessage : '';
      this.error.maximum_employees = this.form.maximum_employees > 0 ? '' : '適当な人数を指定して下さい';

      if (
        this.form.company_address != '' &&
        this.form.maximum_employees != '' &&
        this.form.company_large_category_id != '' &&
        this.form.company_middle_category_id != ''
      ) {
        this.page = 3;
      }
    },
    clickPage3Button() {
      this.error.company_representative_name = this.form.company_representative_name == '' ? emptyErrorMessage : '';
      this.error.company_representative_phone_number =
        this.form.company_representative_phone_number == '' ? emptyErrorMessage : '';
      this.error.hp_adress = this.form.hp_adress == '' ? emptyErrorMessage : '';
      this.error.company_contact_email = this.form.company_contact_email == '' ? emptyErrorMessage : '';
      this.error.company_contact_email = !this.validateEmail(this.form.company_contact_email)
        ? 'メールアドレスの形式が適当ではありません'
        : '';

      if (
        this.form.company_representative_name != '' &&
        this.form.company_representative_phone_number != '' &&
        this.form.hp_adress != '' &&
        this.form.company_contact_email != '' &&
        this.validateEmail(this.form.company_contact_email)
      ) {
        this.page = 4;
      }
    },
    clickPage4Button() {
      // this.error.business_description = this.form.business_description == '' ? emptyErrorMessage : '';
      // this.error.company_profile = this.form.company_profile == '' ? emptyErrorMessage : '';

      // if (this.form.business_description != '' && this.form.company_profile != '') {
      this.page = 5;
      // }
    },
    async clickPage5Button() {
      var params = this.form;

      const response = await axios.post(`/register/profile`, params);

      if (response.status == 500) {
        window.alert('予期せぬエラーが起こりました');
      }

      if (response.status == 422) {
        window.alert('フォームに無効な値が入っています');
      }

      if (response.status == 200) {
        window.alert('条件を保存しました');
      }
    },
    validateEmail(email) {
      // emailの正規表現
      const regexp = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
      return regexp.test(email) ? true : false;
    },
  },
};
</script>
