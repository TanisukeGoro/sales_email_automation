<template>
  <div class="search-box">
    <button type="submit" class="btn btn-primary btn-block" @click="search">
      <span class="btn-inner--icon">
        <i class="ni ni-zoom-split-in" />
      </span>
      <span class="btn-inner--text">検索/並び替え</span>
    </button>
    <div class="col-md-12 p-0">
      <div class="form-group my-4">
        <span class="d-block">フリーワード</span>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="ni ni-zoom-split-in" />
            </span>
          </div>
          <input
            v-model="form.freeword"
            name="name"
            class="form-control"
            placeholder="フリーワード検索"
            type="text"
          />
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="large-category">リスト名</label>
      <select id="large-category" v-model="form.name" name="large-category" class="form-control">
        <option value>未選択</option>
        <option value="0">昇順</option>
        <option value="1">降順</option>
      </select>
    </div>
    <div class="form-group">
      <label for="middle-category">作成日</label>
      <select
        id="middle-category"
        v-model="form.createdAt"
        name="middle-category"
        class="form-control"
      >
        <option value>未選択</option>
        <option value="0">昇順</option>
        <option value="1">降順</option>
      </select>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'SaleListSideBar',
  data() {
    return {
      form: {
        freeword: '',
        name: '',
        createdAt: ''
      }
    };
  },
  methods: {
    search() {
      global.eventHub.$emit('reordering_salelist', {
        form: this.form
      });
    }
  }
};
</script>
