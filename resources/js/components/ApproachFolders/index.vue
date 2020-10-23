<template>
  <div v-if="display" class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between align-items-center">
            <p class="mb-0">アプローチ中リスト</p>
            <a href="approach-folders/create" class="btn btn-primary">リスト作成</a>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">リスト名</th>
                <th scope="col">更新日</th>
                <th scope="col" />
              </tr>
            </thead>
            <tbody>
              <tr v-for="folder in approachFolders" :key="folder.id">
                <td>
                  <a :href="`approach-folders/${folder.id}/approaches`">{{ folder.title }}</a>
                </td>
                <td>{{ folder.updated_at | displayDate }}</td>
                <td class="text-right">
                  <button
                    type="button"
                    class="delete-btn btn btn-outline-primary"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    @click="deleteForm = folder"
                  >
                    削除
                  </button>
                </td>
              </tr>
              <tr v-if="approachFolders.length == 0">
                <td>
                  <span>アプローチリストを作成してみましょう</span>
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
                  <span class="delete-span">{{ `${deleteForm.title}のアプローチ中リストを削除しますか？` }}</span>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-default" data-dismiss="modal">キャンセル</button>
                  <button class="btn btn-outline-primary" data-dismiss="modal" @click="deleteFolder()">削除</button>
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
import '../../utils/globalFillters'

export default {
  name: 'ApproachFoldersIndex',
  props: {
    propsFolders: {
      type: [Object, Array],
      default: () => {}
    }
  },
  data() {
    return {
      params: {},
      display: true,
      approachFolders: [],
      deleteForm: {
        folder: {}
      }
    }
  },
  watch: {
    propsFolders() {
      Object.assign(this.approachFolders, this.propsFolders)
    }
  },
  created() {
    Object.assign(this.approachFolders, this.propsFolders)
  },
  methods: {
    async deleteFolder() {
      const response = await axios.delete(`approach-folders/${this.deleteForm.id}`)
      if (response.status == 200) {
        const approachFolders = this.approachFolders.filter(approachFolders => approachFolders.id != this.deleteForm.id)
        this.approachFolders = approachFolders
        this.deleteForm = {}
      } else {
        window.alert('エラーが発生しました。')
      }
    }
  }
}
</script>
