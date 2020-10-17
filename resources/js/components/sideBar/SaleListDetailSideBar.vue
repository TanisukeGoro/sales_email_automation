<template>
  <div class="search-box">
    <button type="submit" class="btn btn-primary btn-block" @click="search">
      <span class="btn-inner--icon">
        <i class="ni ni-zoom-split-in" />
      </span>
      <span class="btn-inner--text">検索</span>
    </button>
    <div class="col-md-12 p-0">
      <div class="form-group my-4">
        <span class="d-block">フリーワード検索</span>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="ni ni-zoom-split-in" />
            </span>
          </div>
          <input v-model="form.freeword" name="name" class="form-control" placeholder="フリーワード検索" type="text" />
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="large-category">業種大カテゴリ</label>
      <select id="large-category" v-model="form.company_large_category_id" name="large-category" class="form-control">
        <option value>未選択</option>
        <option
          v-for="company_large_category in company_large_categories"
          :key="company_large_category.id"
          :value="company_large_category.id"
        >
          {{ company_large_category.name }}
        </option>
      </select>
    </div>
    <div class="form-group">
      <label for="middle-category">業界中カテゴリ</label>
      <select
        id="middle-category"
        v-model="form.company_middle_category_id"
        name="middle-category"
        class="form-control"
      >
        <option value>未選択</option>
        <option
          v-for="company_middle_category in company_middle_categories"
          :key="company_middle_category.id"
          :value="company_middle_category.id"
        >
          {{ company_middle_category.name }}
        </option>
      </select>
    </div>
    <div class="form-group">
      <label for="listing-stock">上場市場</label>
      <select id="listing-stock" v-model="form.listing_stock_id" name="listing-stock" class="form-control">
        <option value>未選択</option>
        <option v-for="listing_stock in listing_stocks" :key="listing_stock.id" :value="listing_stock.id">
          {{ listing_stock.name }}
        </option>
      </select>
    </div>
    <div class="col-md-12 p-0">
      <div class="form-group">
        <span class="d-block">所在地検索</span>
        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="ni ni-zoom-split-in" />
            </span>
          </div>
          <input v-model="form.address" name="address" class="form-control" placeholder="所在地検索" type="text" />
        </div>
      </div>
    </div>

    <div class="col-md-12 p-0">
      <div class="form-group">
        <span class="d-block">条件名</span>
        <div class="input-group mb-4">
          <input v-model="saleListForm.name" name="address" class="form-control" placeholder="条件名" type="text" />
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-primary btn-block" @click="updateSaleList">
      <span class="btn-inner--text">条件を変更</span>
    </button>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'SaleListDetailSideBar',
  data() {
    return {
      form: {
        freeword: '',
        company_large_category_id: '',
        company_middle_category_id: '',
        listing_stock_id: '',
        address: '',
        page: 1
      },
      saleListForm: {
        name: ''
      },
      company_large_categories: [],
      company_middle_categories: [],
      listing_stocks: []
    }
  },
  watch: {
    $route: {
      async handler() {
        //プルダウンメニュに必要な項目を取得する
        await this.configure()
        //salelist(検索条件)を取得する
        await this.getSaleList()
        //salelistを元にcompanyを取得するため、SaleListCompany.vueに投げる
        await this.search()
      },
      immediate: true
    }
  },
  methods: {
    async configure() {
      const response = await axios.get(`/configure`)

      if (response.status == 200) {
        this.company_large_categories = response.data.company_large_categories
        this.company_middle_categories = response.data.company_middle_categories
        this.listing_stocks = response.data.listing_stocks
      }
    },
    async getSaleList() {
      var index = location.pathname.split('/')[2]

      const response = await axios.get(`/api/salelist/${index}`)
      if (response.status == 200) {
        let data = response.data
        this.form.freeword = data.freeword ?? ''
        this.form.company_large_category_id = data.company_large_category_id ?? ''
        this.form.company_middle_category_id = data.company_middle_category_id ?? ''
        this.form.listing_stock_id = data.listing_stock_id ?? ''
        this.form.address = data.address ?? ''
        this.saleListForm.name = data.name ?? ''
      }
    },
    search() {
      global.eventHub.$emit('search_salelist_company', {
        searchForm: this.form
      })
    },
    async updateSaleList() {
      var params = this.form
      params.name = this.saleListForm.name

      var index = location.pathname.split('/')[2]
      const response = await axios.put(`/salelist/${index}`, params)

      console.log(response)

      if (response.status == 500) {
        window.alert('予期せぬエラーが起こりました')
      }

      if (response.status == 422) {
        window.alert('フォームに無効な値が入っています')
      }

      if (response.status == 200) {
        window.alert('条件を保存しました')
      }
    }
  }
}
</script>
