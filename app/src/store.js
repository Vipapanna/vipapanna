import { createStore } from 'vuex'
import axios from 'axios'

const store = createStore({
  state: {
    cards: [],
    selectedCard: JSON.parse(localStorage.getItem('selectedCard') || '{}')
  },
  mutations: {
    setCards(state, cards) {
      state.cards = cards;
    },
    setSelectedCard(state, card) {
      state.selectedCard = card;
      localStorage.setItem('selectedCard', JSON.stringify(card));
    },

  },
  actions: {
    fetchCards(context) {
      axios
      .get('https://vypapanna.hybridlab.dev/cms/api/v1/restaurants')
      .then(response => {
        console.log(response)
        const cards = response.data.data.map(item => ({
          title: item.restaurant_name,
          image: item.restaurant_image_link,
          rating: item.review,
          star: Math.floor(item.review),
          address: item.address,
          id: item.id,
        }))
        context.commit('setCards', cards)
      })
      .catch(error => {
        console.error(error)
      })
  },

  },
  getters: {
    getSelectedCard: state => {
      return state.selectedCard;
    },
  },
});


export default store;
