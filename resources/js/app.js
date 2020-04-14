import './bootstrap'
import Vue from 'vue'
import SuggestInput from './components/SuggestInput.vue'

window.Echo.channel("channel-message").listen("MessageEvent", function (data) {
  alert(data["message"]);
  window.location = '/login';
});

const newVue = (option) => new Vue(option)

document.addEventListener("DOMContentLoaded", () => {
  newVue({
    el: "#vue-app",
    components: {},
  })

  newVue({
    el: "#vue-sidebar", // コンポーネントをDOMのIDで使い分ける場合
    components: {
      SuggestInput,
    },
  })
})
