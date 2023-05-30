<template>
    <div v-if="isLoading" class="fixed inset-0 flex items-center justify-center bg-black z-50">
      <img src="/src/assets/images/vipapannaText.svg"/>
    </div>
  <section id="mainpage">
    <section
      class="bg-[#4C4556] flex h-auto justify-center lg:justify-between md:justify-between w-full"
    >
      <router-link
        to="/"
        class="h-auto w-auto hidden sm:flex md:flex lg:flex lg:ml-3 lg:mr-0"
      >
        <img
          src="/src/assets/images/vipapanna1.svg"
          alt=""
          class="cursor-pointer"
        />
      </router-link>
      <Searchbar class="my-4" />
    </section>

    <div class="items-center flex">
      <h1 class="text-5xl ml-4 my-6 font-bold text-[#4C4556]">Top ponuky:</h1>
    </div>

    <section class="w-full overflow-auto">
      <section>
        <div
          class="flex whitespace-nowrap overflow-auto scrollbar-hide"
          ref="container"
        >
          <img
            v-for="featured in featured"
            @click="selectCard(featured)"
            :key="featured"
            :src="featured.image"
            class="lg:h-96 h-56 self-center rounded-lg m-4"
            alt=""
          />
          <h1>{{ featured.image }}</h1>
        </div>

        <button
          class="opacity-40 lg:absolute lg:top-64 lg:left-8 px-4 py-2 h-12 w-12 first-letter: bg-gray-200 text-gray-700 font-semibold rounded-full mt-4 z-1"
          @click="scroll(-600)"
        >
          «
        </button>
        <button
          class="opacity-40 lg:absolute lg:top-64 lg:right-8 px-4 py-2 h-12 w-12 bg-gray-200 text-gray-700 font-semibold rounded-full mt-4"
          @click="scroll(600)"
        >
          »
        </button>
      </section>

      <section class="my-14">
        <div class="flex items-center justify-center flex-col mb-8">
          <div class="flex flex-row justify-center items-center">
            <p>lokacias</p>
            <div @click="showLocation = !showLocation" class="cursor-pointer">
              <img
                class="h-12"
                src="/src/assets/images/map-marker.svg"
                alt=""
              />
            </div>
          </div>
          <div v-if="showLocation">
            <location />
          </div>
        </div>

        <section class="grid lg:grid-cols-4 md:grid-cols-3 gap-8 lg:mx-1">
          <Card
            class="m-auto cursor-pointer"
            @click="selectCard(card)"
            v-for="card in cards"
            :key="card"
            :title="card.title"
            :image="card.image"
            :rating="card.rating"
            :star="card.star"
          />
        </section>
      </section>
    </section>

    <Footer />
  </section>
</template>

<script>
import Searchbar from "./Searchbar.vue";
import Footer from "./Footer.vue";
import Backbtn from "./Backbtn.vue";
import Card from "./Card.vue";
import Location from "./location.vue";

export default {
  components: { Searchbar, Backbtn, Card, Location, Footer },

  computed: {
    cards() {
      return this.$store.state.cards;
    },
    featured() {
      return this.$store.state.featured;
    },
  },
  async mounted() {
    await this.$store.dispatch("fetchCards")
      .then(() => {
        this.isLoading = false;
      })
      .catch((error) => {
        console.error("Error fetching cards:", error);
      });
  },
  methods: {
    scroll(amount) {
      this.$refs.container.scrollBy({
        left: amount,
        behavior: "smooth",
      });
    },
    reload() {
      window.location.reload();
    },
    selectCard(card) {
      this.$store.commit("setSelectedCard", card);
      this.$router.push({ name: "RestaurantPage" });
    },
  },

  data() {
    return {
      showLocation: false,
      isLoading: true,
    };
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Cabin&display=swap");
</style>
