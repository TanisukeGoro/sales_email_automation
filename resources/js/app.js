import './bootstrap'
import Vue from 'vue'
import SuggestInput from './components/SuggestInput.vue'
import CompanyList from './components/CompanyList.vue'
import CompanyDetail from './components/CompanyDetail.vue'
import SaleList from './components/SaleList.vue'
import RedirectUri from './components/RedirectUri.vue'
import SaleListCompany from './components/SaleListCompany.vue'
import Profile from "./components/Profile.vue"
import UserProfile from "./components/UserProfile.vue"
import UserCompany from "./components/UserCompany.vue"
import ApproachFoldersIndex from './components/ApproachFolders/index.vue'
import ApproachesIndex from './components/Approaches/index.vue'

//予約後のtemplateと被らないようにsを付けている
import Templates from './components/Template.vue'

import SideBar from './components/sideBar/SideBar.vue'
import TemplateSideBar from './components/sideBar/TemplateSideBar.vue'
import SaleListSideBar from './components/sideBar/SaleListSideBar.vue'
import SaleListDetailSideBar from './components/sideBar/SaleListDetailSideBar.vue'
window.Echo.channel('channel-message').listen('MessageEvent', function (data) {
  alert(data['message'])
  window.location = '/login'
})

const newVue = option => new Vue(option)

//親子関係にないコンポーネント間でイベントの受け渡しが出来る.
//https://qiita.com/Yorinton/items/a0144c34e4edb0777493#12%E5%85%84%E5%BC%9F%E3%82%B3%E3%83%B3%E3%83%9D%E3%83%BC%E3%83%8D%E3%83%B3%E3%83%88%E9%96%93%E3%81%A7%E3%81%AE%E3%83%87%E3%83%BC%E3%82%BF%E3%81%AE%E3%82%84%E3%82%8A%E5%8F%96%E3%82%8A
global.eventHub = new Vue()

document.addEventListener('DOMContentLoaded', () => {
  newVue({
    el: '#vue-app',
    components: {
      CompanyList,
      CompanyDetail,
      SaleList,
      RedirectUri,
      SaleListCompany,
      Templates,
      Profile,
      UserProfile,
      UserCompany,
      ApproachFoldersIndex,
      ApproachesIndex
    }
  })

  newVue({
    el: '#vue-sidebar', // コンポーネントをDOMのIDで使い分ける場合
    components: {
      SuggestInput,
      SideBar,
      TemplateSideBar,
      SaleListSideBar,
      SaleListDetailSideBar
    }
  })
})
