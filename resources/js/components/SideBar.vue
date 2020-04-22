<template>
  <div class="search-box">
    <button type="submit" class="btn btn-primary btn-block" @click="search">
      <span class="btn-inner--icon">
        <i class="ni ni-zoom-split-in"></i>
      </span>
      <span class="btn-inner--text">検索</span>
    </button>
    <div class="col-md-12 p-0">
      <div class="form-group my-4">
        <span class="d-block">フリーワード検索</span>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="ni ni-zoom-split-in"></i>
            </span>
          </div>
          <input
            name="name"
            class="form-control"
            placeholder="フリーワード検索"
            type="text"
            v-model="form.name"
          />
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="large-category">業種大カテゴリ</label>
      <select
        name="large-category"
        class="form-control"
        id="large-category"
        v-model="form.large_category"
      >
        <option value>未選択</option>
        <option
          v-for="company_large_category in company_large_categories"
          :key="company_large_category.id"
          :value="company_large_category.id"
        >{{ company_large_category.name }}</option>
      </select>
    </div>
    <div class="form-group">
      <label for="middle-category">業界中カテゴリ</label>
      <select
        name="middle-category"
        class="form-control"
        id="middle-category"
        v-model="form.middle_category"
      >
        <option value>未選択</option>
        <option
          v-for="company_middle_category in company_middle_categories"
          :key="company_middle_category.id"
          :value="company_middle_category.id"
        >{{ company_middle_category.name }}</option>
      </select>
    </div>
    <div class="form-group">
      <label for="listing-stock">上場市場</label>
      <select
        name="listing-stock"
        class="form-control"
        id="listing-stock"
        v-model="form.listing_stock"
      >
        <option value>未選択</option>
        <option
          v-for="listing_stock in listing_stocks"
          :key="listing_stock.id"
          :value="listing_stock.id"
        >{{ listing_stock.name }}</option>
      </select>
    </div>
    <div class="col-md-12 p-0">
      <div class="form-group">
        <span class="d-block">所在地検索</span>
        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="ni ni-zoom-split-in"></i>
            </span>
          </div>
          <input
            name="address"
            class="form-control"
            placeholder="所在地検索"
            type="text"
            v-model="form.address"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SideBar',
  data() {
    return {
      form: {
        name: '',
        large_category: '',
        middle_category: '',
        listing_stock: '',
        address: '',
        page: 1
      },
      company_large_categories: [],
      company_middle_categories: [],
      listing_stocks: []
    };
  },
  methods: {
    async configure() {
      const response = await axios.get(`/api/sidebar`);

      if (response.status == 200) {
        this.company_large_categories = response.data.company_large_categories;
        this.company_middle_categories = response.data.company_middle_categories;
        this.listing_stocks = response.data.listing_stocks;
      }
    },
    search() {
      eventHub.$emit('search_company', {
        searchForm: this.form
      });
    }
  },
  watch: {
    $route: {
      async handler() {
        await this.configure();
      },
      immediate: true
    }
  }
};
</script>
