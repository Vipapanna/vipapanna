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
      axios.all([
        axios.get('https://vypapanna.hybridlab.dev/cms/api/v1/restaurants'),
        axios.get('https://vypapanna.hybridlab.dev/cms/api/v1/restaurant/food/${restaurantId}'),
      ])

      .then(axios.spread((cardResponse, menuResponse) => {
        console.log(cardResponse);
        console.log(menuResponse);
        
        const Cards = cardResponse.data.data.map(item => ({
          id: item.id,
          title: item.restaurant_name,
          rating: item.review,
          image: item.image,
          star: Math.floor(item.review),
        }));
        
        const menu = menuResponse.data.data.map(item => ({
          title: item.name,
        }));
           
      const cards = Cards.concat(menu);
      
      context.commit('setCards', cards);
    }))
    .catch(error => {
      console.error(error);
    });
  },
    
    retrieveSelectedCard(context) {
      context.commit('retrieveSelectedCard');
    },
  },
  getters: {
    getSelectedCard: state => {
      return state.selectedCard;
    },
    getCards(state) {
      return state.cards;
    },
  },
});

store.dispatch('retrieveSelectedCard');

export default store;
