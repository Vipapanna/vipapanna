import { createStore } from 'vuex';
import axios from 'axios';

const store = createStore({
  state: {
    cards: [],
    featured: [],
    selectedCard: JSON.parse(localStorage.getItem('selectedCard') || '{}'),
  },
  mutations: {
    setCards(state, cards) {
      state.cards = cards;
    },
    setSelectedCard(state, card) {
      state.selectedCard = card;
      localStorage.setItem('selectedCard', JSON.stringify(card));
    },
    setFeatured(state, featured){
      state.featured = featured;
    }  
  },
  actions: {
    fetchCards(context) {
      axios
        .get('https://vypapanna.hybridlab.dev/cms/api/v1/restaurants')
        .then(response => {
          const cards = response.data.all.map(item => ({
            title: item.restaurant_name,
            image: item.restaurant_image_link,
            rating: item.review,
            star: Math.floor(item.review),
            address: item.address,
            id: item.id,
          }));
          const featured = response.data.featured.map(item => ({
            title: item.restaurant_name,
            image: item.restaurant_image_link,
            rating: item.review,
            star: Math.floor(item.review),
            address: item.address,
            id: item.id,
          }));

          context.commit('setCards', cards);
          context.commit('setFeatured', featured);
        })
        .catch(error => {
          console.error(error);
        });
    },
  },
  getters: {
    getSelectedCard: state => {
      return state.selectedCard;
    },
  },
});

export default store;
