import { createStore } from "vuex";

export default createStore({
  state: {
    user: [],
    loggedIn: false,
  },
  mutations: {
    setUser(state, user) {
      state.user = user;
    }
  },
  getters: {
    getUser(state) {
      return state.user;
    }
  }
});