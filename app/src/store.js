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
        state.selectedCard = card
  },
},
actions: {
    fetchCards(context) {
      axios
        .get('https://vypapanna.hybridlab.dev/cms/api/v1/restaurants')
        .then(response => {
          if (Array.isArray(response.data.data)) {
            const cards = response.data.data.map(item => ({
              title: item.restaurant_name,
              rating: item.review,
              star: Math.floor(item.review)
            }))
            context.commit('setCards', cards)
          } else {
            console.error('Error fetching cards')
          }
        })
        .catch(error => {
          console.error(error)
        })
    }
  }
})

export default store