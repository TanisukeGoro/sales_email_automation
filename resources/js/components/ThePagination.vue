<template>
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
      <li v-for="page in displayList" :key="page" class="page-item" :class="{ active: current_page == page }">
        <a
          class="page-link"
          href="#"
          @click="
            current_page = page
            searchCompany()
          "
          >{{ page }}</a
        >
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
    <!-- <the-pagination :props-data="data" @companies="companies = $event" @display="display = $event" /> -->
  </nav>
</template>

<script>
import axios from 'axios'

export default {
  name: 'ThePagination',
  props: {
    propsData: {
      type: Object,
      default: () => {}
    },
    test: {
      type: String,
      default: ''
    }
  },
  data() {
    return {
      params: {},
      companies: [],
      search_count: null,
      current_page: null,
      last_page: null,
      display: false
    }
  },
  computed: {
    isFirstPage() {
      return this.current_page === 1
    },
    isLastPage() {
      return this.currentPage === this.last_page
    },
    displayList() {
      let first = this.current_page - 4
      if (first < 1) first = 1

      let last = this.current_page + 4
      if (last > this.last_page) last = this.last_page

      const list = []
      for (let i = first; i <= last; i++) {
        list.push(i)
      }
      return list
    }
  },
  watch: {
    propsData: {
      handler() {
        console.log('this.data :>>', this.propsData)
        this.search_count = this.propsData.total
        this.current_page = this.propsData.current_page
        this.last_page = this.propsData.last_page
        this.display = true
      },
      deep: true
    },
    test() {
      console.log('this.test :>>', this.test)
    }
  },
  created() {
    //イベント名で受け取る
    global.eventHub.$on('search_company', val => {
      this.params = val.searchForm
      this.current_page = 1
      this.searchCompany()
    })
  },
  methods: {
    async configure() {
      const response = await axios.get(`company/search`)

      if (response.status == 200) {
        let data = response.data
        this.$emit('companies', data.data)
        this.search_count = data.total
        this.current_page = data.current_page
        this.last_page = data.last_page
        this.$emit('display', true)
      }
    },
    async searchCompany() {
      console.log('this.data :>>', this.data)
      this.params.page = this.current_page
      var params = this.params
      const data = {
        params
      }
      const response = await axios.get(`company/search`, data)
      console.log('response :>>', response)
      if (response.status == 200) {
        let data = response.data
        this.$emit('companies', data.data)
        this.search_count = data.total
        this.current_page = data.current_page
        this.last_page = data.last_page
        this.$emit('display', true)
      }
    }
  }
}
</script>
