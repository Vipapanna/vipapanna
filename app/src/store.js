import { createStore } from 'vuex'
import axios from 'axios'

const store = createStore({
  state: {
    cards: [],
    selectedCard: null,
  },
  mutations: {
    setCards(state, cards) {
      state.cards = cards;
    },
    setSelectedCard(state, card) {
      state.selectedCard = card;
      localStorage.setItem('selectedCard', JSON.stringify(card));
    },
    retrieveSelectedCard(state) {
      const card = JSON.parse(localStorage.getItem('selectedCard'));
      if (card) {
        state.selectedCard = card;
      }
    },
  },
  actions: {
    fetchCards(context) {
      axios
        .get('https://vypapanna.hybridlab.dev/cms/api/v1/restaurants')
        .then(response => {
          const cards = response.data.data.map(item => ({
            title: item.restaurant_name,
            rating: item.review,
            star: Math.floor(item.review)
          }))
          context.commit('setCards', cards)
        })
        .catch(error => {
          console.error(error)
        })
    },
    retrieveSelectedCard(context) {
      context.commit('retrieveSelectedCard');
    },
  },
  getters: {
    getSelectedCard: state => {
      return state.selectedCard;
    },
  },
});

store.dispatch('retrieveSelectedCard');

export default store;
