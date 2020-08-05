<template>
  <div>
    <button
      v-if="isCheckbox && checkedList.length > 0"
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#add-approaches-modal"
    >
      保存
    </button>
    <button
      v-if="isCheckbox"
      class="btn btn-outline-primary"
      @click="
        $emit('checkbox', !isCheckbox)
        $emit('clear-checklist')
      "
    >
      キャンセル
    </button>
    <button v-if="!isCheckbox" class="btn btn-primary" @click="$emit('checkbox', !isCheckbox)">
      選択してアプローチ中リストに追加
    </button>
    <add-approaches-modal
      :checked-list="checkedList"
      @clear-checklist="
        $emit('clear-checklist')
        $emit('checkbox', false)
      "
    />
  </div>
</template>

<script>
import AddApproachesModal from './AddApproachesModal.vue'

export default {
  name: 'TheAddApproach',
  components: {
    AddApproachesModal
  },
  props: {
    checkedList: {
      type: Array,
      default: () => {}
    },
    isCheckbox: {
      type: Boolean,
      default: false
    }
  }
}
</script>
