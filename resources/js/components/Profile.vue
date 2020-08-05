<template>
  <div class="col-xl-8 order-xl-1">
    <div class="card bg-secondary shadow">
      <div class="card-header bg-white border-0">
        <div class="align-items-center d-flex justify-content-between">
          <h3 class="mb-0">プロフィール変更</h3>
          <div class="btn-box">
            <button
              type="submit"
              class="btn mb-0"
              :class="[!isProfile ? 'btn-outline-primary' : 'btn-primary']"
              @click="isProfile = true"
            >
              プロフィール
            </button>
            <button
              type="submit"
              class="btn btn-primary mb-0"
              :class="[isProfile ? 'btn-outline-primary' : 'btn-primary']"
              @click="isProfile = false"
            >
              ユーザー企業
            </button>
          </div>
        </div>
      </div>
      <user-profile v-show="isProfile" />
      <user-company v-show="!isProfile" />
    </div>
  </div>
</template>

<script>
import UserProfile from './UserProfile.vue'
import UserCompany from './UserCompany.vue'

export default {
  name: 'Profile',
  components: {
    UserProfile,
    UserCompany
  },
  data() {
    return {
      isProfile: true
    }
  }
}
</script>
