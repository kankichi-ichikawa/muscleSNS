const state = {
  code: null
}

const mutations = {
  //エラーのステータスコード
  setCode (state, code) {
    state.code = code
  }
}

export default {
  namespaced: true,
  state,
  mutations
}