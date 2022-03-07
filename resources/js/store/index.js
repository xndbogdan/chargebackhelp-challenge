import { createStore } from "vuex";
import createPersistedState from "vuex-persistedstate";

export default createStore({
  plugins: [createPersistedState()],
  state: {
    user: [],
    loggedIn: false,
    profile: null,
  },
  mutations: {
    setUser(state, user) {
      state.user = user;
      state.loggedIn = user !== null;
    },
    setProfile(state, profile) {
      state.profile = profile;
    }
  },
  getters: {
    getUser(state) {
      return state.user;
    },
    isLoggedIn(state) {
      return state.loggedIn;
    },
    getProfile(state) {
      return state.profile;
    }
  },
  actions: {
    setUser({ commit }, user) {
      commit("setUser", user);
    },
    logout({ commit }) {
      commit("setUser", null);
    },
    setProfile({ commit }, profile) {
      commit("setProfile", profile);
    }
  },
});