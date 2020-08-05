<template>
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between align-items-center">
            <p class="mb-0">該当件数{{ propsApproaches.length }}件</p>
            <div>
              <a href="approach-folders/create" class="btn btn-primary">追加</a>
              <div class="dropdown col-4 text-right">
                <button
                  id="dropdownMenuButton"
                  class="btn btn-outline-primary btn-sm dropdown-toggle"
                  type="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  ーーー
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">企業名</a>
                  <a class="dropdown-item" href="#">営業フェーズ</a>
                  <a class="dropdown-item" href="#">契約確度</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">企業名</th>
                <th scope="col">営業フェーズ</th>
                <th scope="col">契約確度</th>
                <th scope="col">担当者名</th>
                <th scope="col">担当者 E-Mail</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="approach in propsApproaches" :key="approach.id">
                <td>
                  <a :href="url + '/' + approach.id">{{ approach.company.name }}</a>
                </td>
                <td>{{ approach.phase_label || '----' }}</td>
                <td>{{ approach.possibility_label || '---' }}</td>
                <td>{{ approach.staff != null ? approach.staff : '' }}</td>
                <td>{{ approach.email != null ? approach.email : '' }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ApproachesIndex',
  props: {
    propsApproaches: {
      type: Array,
      default: () => {}
    }
  },
  data() {
    return {
      url: location.pathname
    }
  },
  created() {}
}
</script>
