import Vue from 'vue'

Vue.filter('displayDate', createdAt => {
  if (createdAt == null) {
    return
  }
  const date = createdAt.split(' ')[0].split('-')
  return `${date[0]}年${date[1]}月${date[2]}日`
})
