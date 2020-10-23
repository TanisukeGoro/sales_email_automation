<template>
  <div class="row">
    <div class="col-1 p-0">
      <span v-if="isShowBeforeButton" class="btn btn-outline-primary mx-2 mt-3 d-block" @click="beforeComapany()">
        <i class="fas fa-angle-left" />
      </span>
    </div>
    <div class="col-10 p-0">
      <div class="card bg-secondary shadow pb-4">
        <div class="card-header bg-white border-0">
          <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0">企業詳細</h3>
            <div class="d-flex justify-content-between align-items-center">
              <button class="btn btn-primary" data-toggle="modal" data-target="#add-approaches-modal">
                リストに追加
              </button>
              <add-approaches-modal
                :checked-list="checkedList"
                @clear-checklist="
                  $emit('clear-checklist')
                  $emit('checkbox', false)
                "
              />
            </div>
          </div>
        </div>
        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">会社名：</span>
          <span class="col-8">{{ !!company.name ? company.name : '登録されてません' }}</span>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">法人番号：</span>
          <span class="col-8">{{ !!company.code ? company.code : '登録されてません' }}</span>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">上場：</span>
          <span class="col-8">{{
            !!company.listing_stock.name ? company.listing_stock.name : '登録されてません'
          }}</span>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">業種大カテゴリ：</span>
          <span class="col-8">{{
            !!company.company_large_category.name ? company.company_large_category.name : '登録されてません'
          }}</span>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">業界中カテゴリ：</span>
          <span class="col-8">{{
            !!company.company_middle_category.name ? company.company_middle_category.name : '登録されてません'
          }}</span>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">住所：</span>
          <span class="col-8">{{ !!company.address ? company.address : '登録されてません' }}</span>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">従業員数：</span>
          <span class="col-8">{{ !!company.maximum_employees ? company.maximum_employees : '登録されてません' }}</span>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">HP：</span>

          <a v-if="!!company.top_url" class="col-8" :href="company.top_url" target="_blank">
            <i class="fas fa-external-link-alt" />
          </a>

          <span v-if="!company.top_url" class="col-8">登録されていません</span>
        </div>

        <div class="px-4 pt-5 row">
          <span class="ml-xl-4 col-3">お問い合わせURL：</span>

          <a v-if="!!company.form_url" class="col-8" :href="company.form_url" target="_blank">
            <i class="fas fa-external-link-alt" />
          </a>

          <span v-else class="col-8">登録されていません</span>
        </div>
      </div>
    </div>
    <div v-if="isShowAfterButton" class="col-1 p-0" @click="afterComapany()">
      <span class="btn btn-outline-primary mx-2 mt-3 d-block">
        <i class="fas fa-angle-right" />
      </span>
    </div>
  </div>
</template>

<script>
import AddApproachesModal from './AddApproachesModal.vue'

export default {
  components: {
    AddApproachesModal
  },
  props: {
    companies: {
      type: Array,
      required: true,
      default: () => ({ count: 0 })
    }
  },
  data() {
    return {
      company: '',
      companyIndex: '',
      companyCount: 0,
      isShowBeforeButton: true,
      isShowAfterButton: true,
      checkedList: []
    }
  },
  watch: {
    $route: {
      async handler() {
        await this.getCompany()
      },
      immediate: true
    }
  },
  methods: {
    async getCompany() {
      const that = this
      const path = location.pathname.split('/')[2]
      console.log('path :>>', path)
      this.companyCount = this.companies.length

      this.company = this.companies.filter(function(company, index) {
        if (company.id == path) {
          that.companyIndex = index
        }
        return company.id == path
      })[0]

      this.checkedList = [this.company.id]
      console.log('this.checkedList :>>', this.checkedList)

      this.isShowBeforeButton = !(this.companyIndex < 1)
      this.isShowAfterButton = !(this.companyIndex >= this.companyCount - 1)
    },
    beforeComapany() {
      if (this.companyIndex > 0) {
        this.isShowBeforeButton = true
        this.isShowAfterButton = true
        this.companyIndex -= 1

        this.company = this.companies[this.companyIndex]

        history.replaceState('', '', `/companies/${this.company.id}`)
        this.checkedList = [this.company.id]
        console.log('this.checkedList :>>', this.checkedList)

        if (this.companyIndex < 1) {
          this.isShowBeforeButton = false
        }
      }
    },
    afterComapany() {
      if (this.companyIndex < this.companyCount - 1) {
        this.isShowBeforeButton = true
        this.isShowAfterButton = true
        this.companyIndex += 1

        this.company = this.companies[this.companyIndex]

        history.replaceState('', '', `/companies/${this.company.id}`)
        this.checkedList = [this.company.id]
        console.log('this.checkedList :>>', this.checkedList)

        if (this.companyIndex >= this.companyCount - 1) {
          this.isShowAfterButton = false
        }
      }
    }
  }
}
</script>
