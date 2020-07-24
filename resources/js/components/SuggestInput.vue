<template>
  <div class="col-md-12 p-0">
    <div class="form-group">
      <span class="d-block">所在地検索</span>
      <div class="input-group mb-4">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="ni ni-zoom-split-in"/></span>
        </div>
        <input v-model="place" class="form-control" placeholder="所在地検索" type="text" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SuggestInput',
  data() {
    return {
      place: '東京都'
    }
  }
}
</script>
