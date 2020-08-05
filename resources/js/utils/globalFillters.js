import Vue from 'vue'

Vue.filter('displayDate', createdAt => {
  if (createdAt == null) {
    return
  }
  // 2020-07-29T12:00:06.000000Z を - と T でスプリット
  const date = createdAt.split(' ')[0].split(/[-T]+/)
  return `${date[0]}年${date[1]}月${date[2]}日`
})
