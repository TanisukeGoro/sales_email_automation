import './bootstrap'
import Vue from 'vue'
import SuggestInput from './components/SuggestInput.vue'
import RedirectUri from "./components/RedirectUri.vue"

const newVue = option => new Vue(option)

document.addEventListener('DOMContentLoaded', () => {
  newVue({
    el: '#vue-app',
    components: {
      RedirectUri
    }
  })

  newVue({
    el: '#vue-sidebar', // コンポーネントをDOMのIDで使い分ける場合
    components: {
      SuggestInput,
    }
  })
})
