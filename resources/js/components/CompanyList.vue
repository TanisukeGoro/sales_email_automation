<template>
  <div v-if="display" class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <p class="mb-0">該当件数{{ search_count }}件</p>
            </div>
            <div class="dropdown col-4 text-right">
              <button
                id="dropdownMenuButton"
                class="btn btn-outline-primary btn-sm dropdown-toggle"
                type="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >ーーー</button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">上場区分</a>
                <a class="dropdown-item" href="#">従業員数</a>
                <a class="dropdown-item" href="#">業種大カテゴリ</a>
                <a class="dropdown-item" href="#">業種中カテゴリ</a>
              </div>
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">上場区分</th>
                <th scope="col">企業名</th>
                <th scope="col">業種大カテゴリ</th>
                <th scope="col">業種中カテゴリ</th>
                <th scope="col">従業員数</th>
                <th scope="col">所在地</th>
                <th scope="col">ホームページ</th>
                <th scope="col">お問い合わせページ</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="company in companies" :key="company.id">
                <td>{{ company.listing_stock.name }}</td>
                <td>
                  <a v-if="company.form_url" :href="company.form_url">{{ company.name }}</a>
                  <span v-else>{{ company.name }}</span>
                </td>
                <td>{{ company.company_large_category_id != null ? company.company_large_category.name : '' }}</td>
                <td>{{ company.company_middle_category_id != null ? company.company_middle_category.name : '' }}</td>
                <td>{{ company.n_employees != null ? company.n_employees : '' }}</td>
                <td>{{ company.address != null ? company.address : '' }}</td>
                <td>
                  <a href target="_blank">{{ company.top_url != null ? company.top_url : '' }}</a>
                </td>
                <td class="text-center">
                  <a v-if="company.form_url" :href="company.form_url" target="_blank">
                    <i class="fas fa-external-link-alt" />
                  </a>
                  <i v-else class="fas fa-external-link-alt" />
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- pagination -->
        <nav aria-label="Page navigation example">
          <ul class="pagination my-4 d-flex justify-content-center">
            <li v-if="!isFirstPage" class="page-item">
              <a
                class="page-link"
                href="#"
                aria-label="Previous"
                @click="
                  current_page -= 1
                  searchCompany()
                "
              >
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li
              v-for="page in displayList"
              :key="page"
              class="page-item"
              :class="{ active: current_page == page }"
            >
              <a
                class="page-link"
                href="#"
                @click="
                  current_page = page
                  searchCompany()
                "
              >{{ page }}</a>
            </li>
            <li v-if="!isLastPage" class="page-item">
              <a
                class="page-link"
                href="#"
                aria-label="Next"
                @click="
                  current_page += 1
                  searchCompany()
                "
              >
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'CompanyList',
  data() {
    return {
      params: {},
      companies: [],
      search_count: null,
      current_page: null,
      last_page: null,
      display: false
    };
  },
  computed: {
    isFirstPage() {
      return this.current_page === 1;
    },
    isLastPage() {
      return this.currentPage === this.last_page;
    },
    displayList() {
      let first = this.current_page - 4;
      if (first < 1) first = 1;

      let last = this.current_page + 4;
      if (last > this.last_page) last = this.last_page;

      const list = [];
      for (let i = first; i <= last; i++) {
        list.push(i);
      }
      return list;
    }
  },
  watch: {
    $route: {
      async handler() {
        await this.configure();
      },
      immediate: true
    }
  },
  created() {
    //イベント名で受け取る
    global.eventHub.$on('search_company', val => {
      this.params = val.searchForm;
      this.current_page = 1;
      this.searchCompany();
    });
  },
  methods: {
    async configure() {
      const response = await axios.get(`company/search`);

      if (response.status == 200) {
        let data = response.data;
        this.companies = data.data;
        this.search_count = data.total;
        this.current_page = data.current_page;
        this.last_page = data.last_page;
        this.display = true;
      }

      console.log(response.data);
    },
    async searchCompany() {
      this.params.page = this.current_page;
      var params = this.params;
      const data = {
        params
      };
      const response = await axios.get(`company/search`, data);

      console.log(response);

      if (response.status == 200) {
        let data = response.data;
        this.companies = data.data;
        this.search_count = data.total;
        this.current_page = data.current_page;
        this.last_page = data.last_page;
        this.display = true;
      }
    }
  }
};
</script>
