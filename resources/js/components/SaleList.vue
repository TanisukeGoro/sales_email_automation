<template>
  <div class="row" v-if="display">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <p class="mb-0">営業先リスト一覧</p>
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">営業先リスト名</th>
                <th scope="col">作成日</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="sale in salelist" :key="sale.id">
                <td>
                  <a :href="`salelist/${sale.id}`">{{ sale.name }}</a>
                </td>
                <td>{{ displayDate(sale.created_at) }}</td>
                <td class="text-right">
                  <button
                    type="button"
                    class="delete-btn btn btn-outline-primary"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    @click="deleteForm.sale = sale"
                  >削除</button>
                </td>
              </tr>
              <tr v-if="salelist.length == 0">
                <td>
                  <span>営業先リストがありません</span>
                </td>
              </tr>
            </tbody>
          </table>

          <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <span class="delete-span">{{`${deleteForm.sale.name}のテンプレートを削除しますか？`}}</span>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-default" data-dismiss="modal">キャンセル</button>
                  <button
                    class="btn btn-outline-primary"
                    @click="deleteSaleList()"
                    data-dismiss="modal"
                  >削除</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer py-4">
          <nav class="d-flex justify-content-end" aria-label="..."></nav>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'SaleList',
  data() {
    return {
      params: {},
      salelist: [],
      display: false,
      deleteForm: {
        sale: {}
      }
    };
  },
  watch: {
    $route: {
      async handler() {
        await this.sortSaleList();
      },
      immediate: true
    }
  },
  created() {
    //イベント名で受け取る
    global.eventHub.$on('sort_salelist', val => {
      this.params = val.form;
      this.sortSaleList();
    });
  },
  methods: {
    displayDate(createdAt) {
      if (createdAt == null) {
        return;
      }
      const date = createdAt.split(' ')[0].split('-');
      return `${date[0]}年${date[1]}月${date[2]}日`;
    },
    async sortSaleList() {
      var params = this.params;
      const data = {
        params
      };
      const response = await axios.get(`/api/saleslist/sort`, data);

      if (response.status == 200) {
        let data = response.data;
        this.salelist = data;
        this.display = true;
      }
    },
    async deleteSaleList() {
      var params = this.params;
      const data = {
        params
      };
      const response = await axios.delete(`salelist/${this.deleteForm.sale.id}`, data);

      if (response.status == 200) {
        const salelist = this.salelist.filter(salelist => salelist.id != this.deleteForm.sale.id);
        this.salelist = salelist;
        this.deleteForm.sale = {};
      } else {
        window.alert('エラーが発生しました。');
      }
    }
  }
};
</script>
