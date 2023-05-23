<template>
  <section
    class="bg-[#4C4556] flex h-20 justify-center lg:justify-between md:justify-between w-full"
  >
    <Searchbar />

    <router-link
      to="/"
      class="h-auto w-auto hidden sm:flex md:flex lg:flex lg:"
    >
      <img src="/src/assets/images/vipapanna1.svg" alt="" class="mr-6" />
    </router-link>
  </section>
  <section style="font-family: 'Cabin', sans-serif">
    <div :style="{ backgroundImage: `url(${selectedCard.image})` }" class="text-white bg-cover bg-center">
      <router-link to="/"> "BAck ༼ つ ◕_◕ ༽つ" </router-link>
      <div class="flex flex-col pl-10 pt-14 pb-20">
        <h1 class="text-6xl">{{ selectedCard.title }}</h1>
        <h2 class="text-2xl">{{ selectedCard.rating }}</h2>
        <h2 class="text-2x1">{{ selectedCard.address }}</h2>
      </div>
    </div>

    <div
      class="grid grid-cols-1 lg:grid-cols-2 lg:gap-4 mt-10 lg:mx-20 items-center"
    >
      <FoodCard
        @click="openModal(food.food_name, food.food_image_link)"
        class="m-auto cursor-pointer"
        v-for="food in menu"
        :key="food.id"
        :FoodName="food.food_name"
        :FoodImageLink="food.food_image_link"
      />

      <Dialog
        v-model:visible="visible"
        modal
        :header="modalName"
        :style="{ width: '50vw' }"
      >
        <img :src="modalImage" alt="" />
      </Dialog>
    </div>
  </section>

  <Footer />
</template>

<script>
import Searchbar from "./Searchbar.vue";
import Footer from "./Footer.vue";
import axios from "axios";
import FoodCard from "./FoodCard.vue";
import Dialog from "primevue/dialog";

export default {
  components: { Searchbar, Footer, FoodCard, Dialog },

  computed: {
    selectedCard() {
      return this.$store.state.selectedCard;
    },
  },
  methods: {
    openModal(Name, Image) {
      this.modalName = Name;
      this.modalImage = Image;
      this.visible = true;
    },
  },
  mounted() {
    window.scroll(0, 0);

    if (this.selectedCard && this.selectedCard.id) {
      axios
        .get(
          `https://vypapanna.hybridlab.dev/cms/api/v1/restaurant/food/${this.selectedCard.id}`
        )
        .then((response) => {
          const menu = response.data.data.map((item) => ({
            food_name: item.food_name,
            food_image_link: item.food_image_link,
            food_info: item.description
          }));
          this.menu = menu;
        })
        .catch((error) => {
          console.error(error);
        });
    }
  },
  data() {
    return {
      menu: [],
      visible: false,
      modalName: "",
      modalImage: "",
    };
  },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Cabin&display=swap");
</style>
