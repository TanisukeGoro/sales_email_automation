<template>
  <div v-if="display" class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <p class="mb-0">テンプレート一覧</p>
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">テンプレート名</th>
                <th scope="col">作成日</th>
                <th scope="col" />
              </tr>
            </thead>
            <tbody>
              <tr v-for="template in templates" :key="template.id">
                <td>
                  <a :href="`template/${template.id}`">{{ template.name }}</a>
                </td>
                <td>{{ displayDate(template.created_at) }}</td>
                <td class="text-right">
                  <button
                    type="button"
                    class="delete-btn btn btn-outline-primary"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    @click="deleteForm.template = template"
                  >
                    削除
                  </button>
                </td>
              </tr>
              <tr v-if="templates.length == 0">
                <td>
                  <span>営業先リストがありません</span>
                </td>
              </tr>
            </tbody>
          </table>

          <div
            id="exampleModal"
            class="modal fade"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <span class="delete-span">{{ `${deleteForm.template.name}のテンプレートを削除しますか？` }}</span>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-default" data-dismiss="modal">キャンセル</button>
                  <button class="btn btn-outline-primary" data-dismiss="modal" @click="deleteSaleList()">削除</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer py-4">
          <nav class="d-flex justify-content-end" aria-label="..." />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'Template',
  data() {
    return {
      params: {},
      templates: [],
      display: false,
      deleteForm: {
        template: {}
      }
    }
  },
  watch: {
    $route: {
      async handler() {
        await this.sortTemplate()
      },
      immediate: true
    }
  },
  created() {
    //イベント名で受け取る
    global.eventHub.$on('sort_template', val => {
      this.params = val.form
      this.sortTemplate()
    })
  },
  methods: {
    displayDate(createdAt) {
      if (createdAt == null) {
        return
      }

      const date = createdAt.split(' ')[0].split('-')

      return `${date[0]}年${date[1]}月${date[2]}日`
    },
    async sortTemplate() {
      var params = this.params
      const data = {
        params
      }
      const response = await axios.get(`/api/template/sort`, data)

      if (response.status == 200) {
        let data = response.data
        this.templates = data
        this.display = true
      }
    },
    async deleteSaleList() {
      var params = this.params
      const data = {
        params
      }
      const response = await axios.delete(`template/${this.deleteForm.template.id}`, data)

      if (response.status == 200) {
        const templates = this.templates.filter(template => template.id != this.deleteForm.template.id)
        this.templates = templates
        this.deleteForm.template = {}
      } else {
        window.alert('エラーが発生しました。')
      }
    }
  }
}
</script>
