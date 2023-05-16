<template>
  <section
    class="bg-[#4C4556] flex h-20 justify-center lg:justify-between md:justify-between w-full"
  >
    <Searchbar />

    <div class="h-auto w-auto hidden sm:flex md:flex lg:flex lg:">
      <img
        @click="goToHomePage"
        src="/src/assets/images/vipapanna1.svg"
        alt=""
        class="mr-6"
      />
    </div>
  </section>
  <section style="font-family: 'Cabin', sans-serif">
    <div class="text-white bg-[url('/src/assets/images/restauracia.png')]">
      <div class="flex flex-col pl-10 pt-14 pb-20">
        <h1 class="text-6xl">{{ selectedCard.title }}</h1>
        <h2 class="text-2xl">{{ selectedCard.rating }}</h2>
      </div>
    </div>

    <div
      class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 lg:gap-4 items-center justify-items-center lg:mx-20 mt-20"
    >
      <Food_Card />
      <Food_Card />
      <Food_Card />
      <Food_Card />
      <Food_Card />
    </div>
  </section>

  <h1></h1>

  <Footer />
</template>

<script>
import Searchbar from "./Searchbar.vue";
import Footer from "./Footer.vue";
import Food_Card from "./food-card.vue";

export default {
  components: { Searchbar, Footer, Food_Card },

  computed: {
    selectedCard() {
      return this.$store.state.selectedCard;
    },
  },
  mounted() {
    window.scroll(0, 0);
  },
  methods: {
    selectCard(card) {
      this.$store.commit("setSelectedCard", card);
      localStorage.setItem("selectedCardData", JSON.stringify(card));
    },
  },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Cabin&display=swap");
</style>
