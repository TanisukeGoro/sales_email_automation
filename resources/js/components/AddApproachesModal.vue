<template>
  <div
    id="add-approaches-modal"
    class="modal fade"
    tabindex="-1"
    role="dialog"
    aria-labelledby="add-approaches-modal"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <form @submit.prevent>
            <span class="delete-span">保存先 アプローチ中企業リスト</span>
            <v-select
              v-model="selected"
              class="style-chooser"
              label="title"
              :options="options"
              dir="ja"
              :reduce="options => options.id"
              placeholder="リスト名"
              @search="onSearch"
            />
            <div v-if="nullExcept" class="error">
              <small class="small text-red">※リストを選択してください。</small>
            </div>
            <div class="mt-5 text-right">
              <button
                type="button"
                label="title"
                class="btn btn-outline-danger"
                data-dismiss="modal"
                @click="$emit('clear-checklist')"
              >
                キャンセル
              </button>
              <button type="submit" class="btn btn-primary" @click="postApproaches()">
                保存
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css'

export default {
  name: 'AddApproachesModal',
  components: {
    vSelect
  },
  props: {
    checkedList: {
      type: Array,
      default: () => {}
    }
  },
  data() {
    return {
      selected: null,
      options: [],
      isShow: false,
      nullExcept: false
    }
  },
  computed: {
    show() {
      return this.isShow
    }
  },
  watch: {
    selected() {
      this.nullExcept = false
    }
  },
  async created() {
    const response = await axios.get('/api/approach-folders')
    this.options = response.data.folders
  },
  methods: {
    async onSearch(search, loading) {
      loading(true)
      const response = await axios.get(`/api/approach-folders?q=${escape(search)}`)
      this.options = response.data.folders
      loading(false)
    },
    async postApproaches() {
      if (this.selected == null) return (this.nullExcept = true)
      const response = await axios.post(`/api/approach-folders/${this.selected}`, {
        companies: this.checkedList.map(i => ({ company_id: i }))
      })
      console.log('response :>>', response)
      window.jQuery('#add-approaches-modal').modal('hide')
    }
  }
}
</script>

<style>
.style-chooser .vs__search::placeholder {
  color: #8898aa;
}
</style>
