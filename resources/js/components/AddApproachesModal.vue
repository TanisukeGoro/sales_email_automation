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
          <span class="delete-span">ホゲホゲ</span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-default" data-dismiss="modal">キャンセル</button>
          <button class="btn btn-outline-primary" data-dismiss="modal">削除</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'AddApproachesModal',
  props: {
    chekedItem: {
      type: Array,
      default: () => {}
    },
    isShow: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {}
  },
  computed: {
    show() {
      return this.isShow
    }
  }
}
</script>
