<template>
  <div class="row">
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
                    :data-index="sale.id"
                    :data-name="sale.name"
                    data-target="#exampleModal"
                  >削除</button>
                </td>
              </tr>
            </tbody>
          </table>

          <!-- <div
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
                  <span class="delete-span"></span>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-default" data-dismiss="modal">キャンセル</button>
                  <form class="delete-form" method="POST">
                    <input class="delete-input" type="hidden" />
                    <input class="btn btn-outline-primary" type="submit" value="削除" />
                  </form>
                </div>
              </div>
            </div>
          </div>-->
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
      display: false
    };
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
    global.eventHub.$on('reordering_salelist', val => {
      console.log(val);

      this.params = val.form;
      this.searchSaleList();
    });
  },
  methods: {
    async configure() {
      const response = await axios.get(`saleslist/search`);

      if (response.status == 200) {
        let data = response.data;
        this.salelist = data;
        this.display = true;
      }
    },
    displayDate(createdAt) {
      if (createdAt == null) {
        return;
      }

      const date = createdAt.split(' ')[0].split('-');

      return `${date[0]}年${date[1]}月${date[2]}日`;
    },
    async searchSaleList() {
      var params = this.params;
      const data = {
        params
      };
      const response = await axios.get(`saleslist/search`, data);

      console.log(response);

      if (response.status == 200) {
        let data = response.data;
        this.salelist = data;
        this.display = true;
      }
    }
  }
};
</script>
